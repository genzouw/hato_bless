USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_SEISAN_DATA_IDOU]    Script Date: 07/31/2014 11:49:36 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[SP_SEISAN_DATA_IDOU]
AS
BEGIN
	DECLARE
		 @SCHEMANM					varchar(100)	-- 退避用DBスキーマ名
		,@W_SQL_WKTBL_ENT			varchar(2000)	-- 一時テーブル登録SQL
		,@W_SQL_JUCHUKIHON_ENT		varchar(8000)	-- 受注データ退避SQL
		,@W_SQL_JUCHUKIHON_DEL		varchar(8000)	-- 受注データ削除SQL
		,@W_SEISANKIJUN_YY			numeric(1,0)	-- 精算移動基準年数
		,@W_SEISAN_KISHU			char(2)			-- 期首
		,@W_SEISAN_GETSUJI_YMD		char(8)			-- 月次年月日
		,@W_SEISAN_GETSUJI_MM		char(2)			-- 月次月
		,@W_SEISAN_GETSUJI_MM_SR	char(6)			-- 月次年月(検索用)	
		,@W_SAVE_YM					char(6)			-- DB退避年月
		,@W_TABLE_NM				varchar(100)	-- テーブル名称
	    ,@PRINT_MSG					varchar(3000)	-- メッセージ
		,@RET						INT				-- 戻り値：正常終了
		,@RET9						INT				-- 戻り値：異常終了		
;

		SET @SCHEMANM				= '[HATO_KAKO_DATA]'	-- 退避用DBスキーマ名
		SET @W_SQL_WKTBL_ENT		= ''			-- 一時テーブル登録SQL
		SET @W_SQL_JUCHUKIHON_ENT	= ''			-- 受注データ退避SQL
		SET @W_SQL_JUCHUKIHON_DEL	= ''			-- 受注データ削除SQL
		SET @W_SEISANKIJUN_YY		= 0				-- 精算移動基準年数
		SET @W_SEISAN_KISHU			= ''			-- 期首
		SET @W_SEISAN_GETSUJI_YMD	= ''			-- 月次年月日
		SET @W_SEISAN_GETSUJI_MM	= ''			-- 月次月
		SET @W_SEISAN_GETSUJI_MM_SR = ''			-- 月次年月(検索用)
		SET @W_SAVE_YM				= ''			-- DB退避年月
		SET @W_TABLE_NM				= ''			-- テーブル名称
	    SET @PRINT_MSG				= ''			-- メッセージ
		SET @RET					= 0				-- 戻り値：正常終了
		SET @RET9					= 9				-- 戻り値：異常終了		

		-- 登録・削除対象テーブル一覧作成
		DECLARE @ENDDLT_TABLE AS TABLE(TABLE_NAME VARCHAR(100))
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_KAKUTEI')		-- 精算確定
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_MEISAI')		-- 精算明細
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_CREDIT')		-- 精算クレジット
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_KOBAT')			-- 精算小鳩
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_JUCHU')			-- 精算受注
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_HACHU')			-- 精算発注
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_CRT_TESURYO')	-- 精算クレジット手数料
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_KBT_TESURYO')	-- 精算小鳩手数料
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_TEIGAKU')		-- 精算定額
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_SONOTA_HIYOU')	-- 精算その他費用
		INSERT INTO @ENDDLT_TABLE VALUES ('T_SEISAN_SOUSAI')		-- 精算相殺


--====================================================================================
-- データ移動コントロールマスタより精算移動基準年数・精算期首を取得
--====================================================================================
BEGIN
	SELECT
		@W_SEISANKIJUN_YY = M_DATA_IDOU_CONTROLE.SEISAN_NEN
		,@W_SEISAN_KISHU = M_DATA_IDOU_CONTROLE.SEISAN_KISYU
	FROM
		M_DATA_IDOU_CONTROLE
	WHERE
		DELETE_FLG = '0'
	;	

	-- データ移動コントロールマスタに1レコード以外が登録されている場合、処理中断する。
	IF @@ROWCOUNT <> 1 BEGIN
		SET @PRINT_MSG = ' '
		SET @PRINT_MSG = ' データ移動コントロールマスタに1レコードだけ登録してください '
		PRINT @PRINT_MSG

		RETURN @RET;
	END	

END

----====================================================================================
---- 月次コントロール.年月を取得し、月次月と期首の比較を行う
----====================================================================================
--BEGIN
----月次年月取得
--SET @W_SEISAN_GETSUJI_MM_SR = LEFT(CONVERT(CHAR, DATEADD(MONTH, -1, GETDATE()),112), 6)

--	-- 月次コントロールから直近の月次年月を取得
--	SELECT TOP 1
--		@W_SEISAN_GETSUJI_YM = M_GETUJI_CTL.年月
--	FROM
--		M_GETUJI_CONTROL AS M_GETUJI_CTL
--	WHERE
--		M_GETUJI_CTL.年月 = @W_SEISAN_GETSUJI_MM_SR
--;

---- 月次コントロール.年月の月次月を取得
--SET @W_SEISAN_GETSUJI_MM = SUBSTRING(CONVERT(CHAR, DATEADD(MONTH, -1, @W_SEISAN_GETSUJI_YM+'01'),112), 5, 2)
--END

--====================================================================================
-- 精算管理テーブル.精算月を取得し、精算月と期首の比較を行う
--====================================================================================
BEGIN
	-- 精算管理テーブルから精算月-1(月次締済)を取得(取得フォーマット:yyyymmdd)
	SELECT 
		@W_SEISAN_GETSUJI_YMD = CONVERT(CHAR, DATEADD(MONTH, -1, M_SEISAN_KRI.SEISAN_TUKI+'01'),112)
	FROM
		M_SEISAN_KANRI AS M_SEISAN_KRI
;

	-- 精算管理テーブル.精算月の月次月を取得(取得フォーマット:mm)
	SET @W_SEISAN_GETSUJI_MM = SUBSTRING(@W_SEISAN_GETSUJI_YMD, 5, 2)
END


-- 精算管理テーブルから取得した月次月と期首を比較し、月次月と期首が等しくない場合は処理中断
IF NOT @W_SEISAN_GETSUJI_MM = @W_SEISAN_KISHU BEGIN
	SET @PRINT_MSG = ' '
	SET @PRINT_MSG = '月次月と期首が一致していない為、精算データ移動処理を中断します。' 
	PRINT @PRINT_MSG
	
	-- 処理中断
	RETURN @RET;
END

--====================================================================================
-- 取得した精算移動基準年数から退避DBに格納する為の年月を算出
--====================================================================================
SET @W_SAVE_YM = LEFT(CONVERT(CHAR, DATEADD(YEAR, -@W_SEISANKIJUN_YY, @W_SEISAN_GETSUJI_YMD), 112),6)

--====================================================================================
-- 精算データ移動処理
--====================================================================================
-- トランザクション開始 --
Begin Transaction

BEGIN
	-- 処理対象テーブル取得
	DECLARE CUR_JUCHU_TBL CURSOR FOR
		SELECT  TABLE_NAME
		FROM	@ENDDLT_TABLE
;

END

--カーソルオープン
OPEN CUR_JUCHU_TBL

FETCH CUR_JUCHU_TBL
INTO @W_TABLE_NM

WHILE @@FETCH_STATUS = 0 BEGIN

--====================================================================================
-- 精算系テーブルデータ移動処理(本番DB→退避DB)
--====================================================================================
BEGIN TRY
	 --本番DBから退避用DBにデータをINSERT
	SET @W_SQL_JUCHUKIHON_ENT = ' '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + 'INSERT INTO ' 
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' ' + @SCHEMANM + '.[dbo].'+ @W_TABLE_NM
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' SELECT * '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' FROM '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' ' + @W_TABLE_NM
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' WHERE '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + '   SEIKYU_YM < '+ @W_SAVE_YM
		
	EXEC(@W_SQL_JUCHUKIHON_ENT)
	
	SET @PRINT_MSG = ' '
	SET @PRINT_MSG = ' ' + @W_TABLE_NM + ' データ登録完了 ' 
	PRINT @PRINT_MSG

END TRY
BEGIN CATCH
	
	SET @PRINT_MSG = ' '
	SET @PRINT_MSG = ' ' + @W_TABLE_NM + ' 登録異常終了 ' 
	PRINT @PRINT_MSG
	
	-- ロールバック --
	Rollback Transaction
	RETURN ERROR_NUMBER();		--　異常終了時、戻り値にエラーコードを返す
END CATCH

--====================================================================================
-- 精算系テーブルデータ削除処理(本番DB)
--====================================================================================
BEGIN TRY
	-- 本番DBのデータ退避後、本番DBのデータを削除
	SET @W_SQL_JUCHUKIHON_DEL = ' ' 
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + ' DELETE ' 
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + ' FROM '
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + '    ' + @W_TABLE_NM
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + ' WHERE '
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + '   SEIKYU_YM < '+ @W_SAVE_YM

	EXEC(@W_SQL_JUCHUKIHON_DEL)

	SET @PRINT_MSG = ' '
	SET @PRINT_MSG = ' ' + @W_TABLE_NM + ' データ削除完了 ' 
	PRINT @PRINT_MSG

END TRY
BEGIN CATCH
	SET @PRINT_MSG = ' '
	SET @PRINT_MSG = ' ' + @W_TABLE_NM + ' 削除異常終了 ' 
	PRINT @PRINT_MSG
	
	-- ロールバック --
	Rollback Transaction
	RETURN ERROR_NUMBER();		--　異常終了時、戻り値にエラーコードを返す
END CATCH

FETCH CUR_JUCHU_TBL
INTO @W_TABLE_NM

END

-- カーソルクローズ
CLOSE CUR_JUCHU_TBL
DEALLOCATE CUR_JUCHU_TBL

-- トランザクション終了 --
Commit Transaction

RETURN @RET;

END
;









GO

