USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_JUCHU_DATA_IDOU]    Script Date: 07/31/2014 11:44:44 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

ALTER PROCEDURE [dbo].[SP_JUCHU_DATA_IDOU]
AS
BEGIN
	DECLARE
		 @SCHEMANM				varchar(100)		-- 退避用DBスキーマ名
		,@W_SQL_WKTBL_ENT		varchar(2000)		-- 一時テーブル登録SQL
		,@W_SQL_JUCHUKIHON_ENT	varchar(8000)		-- 受注データ退避SQL
		,@W_SQL_JUCHUKIHON_DEL	varchar(8000)		-- 受注データ削除SQL
		,@W_JUCHUKIJUN_MM		numeric(2,0)		-- 受注基準月度
		,@W_JUCHUKIJUN_YMD		char(8)				-- 受注基準年月日
		,@W_SAVE_MM				char(6)				-- DB退避年月
		,@W_TABLE_NM			varchar(100)		-- テーブル名称
	    ,@PRINT_MSG				VARCHAR(3000)		-- メッセージ
		,@RET					INT					-- 戻り値：正常終了
		,@RET9					INT					-- 戻り値：異常終了
		
;

		SET @SCHEMANM				= '[HATO_KAKO_DATA]'	-- 退避用DBスキーマ名
		SET @W_SQL_WKTBL_ENT		= ''			-- 一時テーブル登録SQL
		SET @W_SQL_JUCHUKIHON_ENT	= ''			-- 受注データ退避SQL
		SET @W_SQL_JUCHUKIHON_DEL	= ''			-- 受注データ削除SQL
		SET @W_JUCHUKIJUN_MM		= 0				-- 受注基準月度
		SET @W_JUCHUKIJUN_YMD		= ''			-- 受注基準年月日
		SET @W_SAVE_MM				= ''			-- DB退避年月
	    SET @PRINT_MSG				= ''			-- メッセージ
	    SET @W_TABLE_NM				= ''			-- テーブル名称
		SET @RET					= 0				-- 戻り値：正常終了
		SET @RET9					= 9				-- 戻り値：異常終了

		-- 登録・削除対象テーブル一覧作成
		DECLARE @ENDDLT_TABLE AS TABLE(TABLE_NAME VARCHAR(100))
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_KIHON')			-- 受注基本
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_HOJO')			-- 受注補助
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_SYOSAI')			-- 受注詳細
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_GYOMU')			-- 受注業務
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_KOBATO')			-- 受注小鳩
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_TEHAI')			-- 受注手配
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_RYOKIN')			-- 受注料金
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_RYOKIN_M')		-- 受注料金明細
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_SASHIZU')		-- 受注指図
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_SASHIZU_M')		-- 受注指図明細
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_KAGU')			-- 受注家具
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_IRAI_OPTION')	-- 受注依頼オプション
		INSERT INTO @ENDDLT_TABLE VALUES ('T_JUCHU_TEHAI_SYOSAI')	-- 受注手配詳細

--====================================================================================
-- 精算管理テーブルから精算月(受注)を取得
--====================================================================================
BEGIN
	-- 精算管理テーブルから精算月(受注)-1(月次締済)を取得(取得フォーマット:yyyymmdd)
	SELECT 
		@W_JUCHUKIJUN_YMD = CONVERT(CHAR, DATEADD(MONTH, -1, M_SEISAN_KRI.SEISAN_TUKI_JUCHU+'01'),112)
	FROM
		M_SEISAN_KANRI AS M_SEISAN_KRI
;

END

--====================================================================================
-- データ移動コントロールマスタより受注基準月度を取得
--====================================================================================
BEGIN
	SELECT
		@W_JUCHUKIJUN_MM = ISNULL(M_DATA_IDOU_CONTROLE.JUCHU_TUKI, 0)
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

--====================================================================================
-- 取得した受注基準月度から退避DBに格納する為の年月を算出
--====================================================================================
SET @W_SAVE_MM = LEFT(CONVERT(CHAR, DATEADD(MONTH, -@W_JUCHUKIJUN_MM,@W_JUCHUKIJUN_YMD), 112),6)

--====================================================================================
-- 退避データの受付番号を格納する為の一時テーブルを作成
--====================================================================================
	--ワーク初期化
	if exists(select * from tempdb..sysobjects where id=object_id('tempdb..#WK_JUCHU_UKETSUKE_NOTBL')) 
	BEGIN drop table #WK_JUCHU_UKETSUKE_NOTBL END

	CREATE TABLE #WK_JUCHU_UKETSUKE_NOTBL
	(
		UKETSUKE_NO		char(8) COLLATE Japanese_CI_AS		-- 受付番号
--		,PRIMARY KEY (UKETSUKE_NO)
	)

--====================================================================================
-- 受注基本テーブルの受付番号を一時テーブルに格納
--====================================================================================
BEGIN TRY
	SET @W_SQL_WKTBL_ENT = ' '
	SET @W_SQL_WKTBL_ENT = @W_SQL_WKTBL_ENT + 'INSERT INTO #WK_JUCHU_UKETSUKE_NOTBL '
	SET @W_SQL_WKTBL_ENT = @W_SQL_WKTBL_ENT + 'SELECT '
	SET @W_SQL_WKTBL_ENT = @W_SQL_WKTBL_ENT + '	T_JUCHU_KIHON.UKETSUKE_NO	'
	SET @W_SQL_WKTBL_ENT = @W_SQL_WKTBL_ENT + 'FROM	'
	SET @W_SQL_WKTBL_ENT = @W_SQL_WKTBL_ENT + '	T_JUCHU_KIHON '
	SET @W_SQL_WKTBL_ENT = @W_SQL_WKTBL_ENT + 'WHERE														'
	SET @W_SQL_WKTBL_ENT = @W_SQL_WKTBL_ENT + ' LEFT(T_JUCHU_KIHON.UKETSUKE_DT, 6) <= ' + @W_SAVE_MM

	EXEC (@W_SQL_WKTBL_ENT)
	
	SET @PRINT_MSG = ' '
	SET @PRINT_MSG = ' WK_JUCHU_UKETSUKE_NOTBL(受付番号テーブル(一時テーブル))登録完了 ' 
	PRINT @PRINT_MSG
	
END TRY
BEGIN CATCH
	SET @PRINT_MSG = ' '
	SET @PRINT_MSG = ' 受付番号テーブル(一時テーブル)登録異常終了 '
	PRINT @PRINT_MSG
	RETURN ERROR_NUMBER();		--　異常終了時、戻り値にエラーコードを返す
END CATCH


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
-- 受注系テーブルデータ移動処理(本番DB→退避DB)
--====================================================================================
BEGIN TRY
	-- 本番DBから退避用DBにデータをINSERT
	SET @W_SQL_JUCHUKIHON_ENT = ' '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + 'INSERT INTO ' 
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' ' + @SCHEMANM + '.[dbo].'+ @W_TABLE_NM
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' SELECT * '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' FROM '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' ' + @W_TABLE_NM + ' AS JUCHU_TBL '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' WHERE '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + ' JUCHU_TBL.UKETSUKE_NO IN ( '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + '							SELECT '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + '									WK_JUCHU_UKETSUKE_NO.UKETSUKE_NO  '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + '							FROM '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + '									#WK_JUCHU_UKETSUKE_NOTBL AS WK_JUCHU_UKETSUKE_NO '
	SET @W_SQL_JUCHUKIHON_ENT = @W_SQL_JUCHUKIHON_ENT + '						   ) '
		
	EXEC(@W_SQL_JUCHUKIHON_ENT)

	SET @PRINT_MSG = ' '
	SET @PRINT_MSG = ' ' + @W_TABLE_NM + ' データ移行完了 ' 
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
-- 受注手配詳細テーブルデータ削除処理(本番DB)
--====================================================================================
BEGIN TRY
	-- 本番DBのデータ退避後、本番DBのデータを削除
	SET @W_SQL_JUCHUKIHON_DEL = ' ' 
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + ' DELETE ' 
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + ' FROM '
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + '    ' + @W_TABLE_NM + ' '
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + ' WHERE '
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + '           UKETSUKE_NO IN  ( '
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + '								SELECT '
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + '									WK_JUCHU_UKETSUKE_NO.UKETSUKE_NO '
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + '								FROM '
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + '									#WK_JUCHU_UKETSUKE_NOTBL AS WK_JUCHU_UKETSUKE_NO '
	SET @W_SQL_JUCHUKIHON_DEL = @W_SQL_JUCHUKIHON_DEL + '							) '

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

