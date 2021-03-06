USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_JUCHU_KENSAKU_OTHER]    Script Date: 07/31/2014 11:45:50 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO



CREATE PROCEDURE [dbo].[SP_JUCHU_KENSAKU_OTHER](
	@IN_SESSION_ID       AS CHAR(30),
	@IN_SOSHIKI_CD       AS CHAR(5),
	@IN_SOSHIKI_KBN      AS CHAR(1),
	@IN_KOKYAKUMEI       AS VARCHAR(40),
	@IN_KOKYAKUMEI_KANA  AS VARCHAR(40),
	@IN_HOJIN_CD         AS CHAR(9),
	@IN_JUCHU_STS_CD     AS VARCHAR(8),
	@IN_TEHAI_STS_CD     AS VARCHAR(5),
	@IN_MITSUMORI_DATE_F AS CHAR(8),
	@IN_MITSUMORI_DATE_T AS CHAR(8),
	@IN_SAGYO_DATE_F     AS CHAR(8),
	@IN_SAGYO_DATE_T     AS CHAR(8),
	@IN_SAGYO_DATE_OP    AS CHAR(2),
	@IN_TORI_KBN_OP      AS CHAR(1),
	@IN_CENTER_OP        AS CHAR(2)
)
AS
DECLARE
	@ERR                 INT,
	@DCNT                INT,
	@V_KOKYAKUMEI        VARCHAR(40),
	@V_KOKYAKUMEI_KANA   VARCHAR(40),
	@C_HOJIN_CD          CHAR(9),
	@V_JUCHU_STS_CD      VARCHAR(8),
	@V_TEHAI_STS_CD      VARCHAR(5),
	@C_MITSUMORI_DATE_F  CHAR(8),
	@C_MITSUMORI_DATE_T  CHAR(8),
	@C_SAGYO_DATE_F      CHAR(8),
	@C_SAGYO_DATE_T      CHAR(8),
	@C_SAGYO_DATE_OP     CHAR(2),
	@C_TORI_KBN_OP       CHAR(1),
	@C_CENTER_OP         CHAR(2),
	@C_UKETSUKE_NO       CHAR(8),
	@C_SOSHIKI_CD        CHAR(5),
	@I_INS_FLG           INT,
	@RCNT                INT
	
BEGIN

	SET @ERR = 0
	SET @DCNT = 0

	SET @V_KOKYAKUMEI       = ''+RTRIM(@IN_KOKYAKUMEI)
	SET @V_KOKYAKUMEI_KANA  = ''+RTRIM(@IN_KOKYAKUMEI_KANA)
	SET @C_HOJIN_CD         = ''+RTRIM(@IN_HOJIN_CD)
	SET @V_JUCHU_STS_CD     = ''+RTRIM(@IN_JUCHU_STS_CD)
	SET @V_TEHAI_STS_CD     = ''+RTRIM(@IN_TEHAI_STS_CD)
	SET @C_MITSUMORI_DATE_F = ''+RTRIM(@IN_MITSUMORI_DATE_F)
	SET @C_MITSUMORI_DATE_T = ''+RTRIM(@IN_MITSUMORI_DATE_T)
	SET @C_SAGYO_DATE_F     = ''+RTRIM(@IN_SAGYO_DATE_F)
	SET @C_SAGYO_DATE_T     = ''+RTRIM(@IN_SAGYO_DATE_T)
	SET @C_SAGYO_DATE_OP    = ''+RTRIM(@IN_SAGYO_DATE_OP)
	SET @C_TORI_KBN_OP      = ''+RTRIM(@IN_TORI_KBN_OP)
	SET @C_CENTER_OP        = ''+RTRIM(@IN_CENTER_OP)

	IF RTRIM(@V_KOKYAKUMEI) != '' SET @V_KOKYAKUMEI = @V_KOKYAKUMEI+'%'
	IF RTRIM(@V_KOKYAKUMEI_KANA) != '' SET @V_KOKYAKUMEI_KANA = @V_KOKYAKUMEI_KANA+'%'

	--検索結果データを削除する
	DELETE W_COM_KENSAKU_RES
		WHERE SESSION_CD = @IN_SESSION_ID



-- ======================================================================================== --
--                              Str 2010/07/06 削除 SYS_Ohki
-- ======================================================================================== --
/*
PRINT @V_KOKYAKUMEI      
PRINT @V_KOKYAKUMEI_KANA 
PRINT @C_HOJIN_CD        
PRINT @V_JUCHU_STS_CD    
PRINT @V_TEHAI_STS_CD    
PRINT @C_MITSUMORI_DATE_F
PRINT @C_MITSUMORI_DATE_T
PRINT @C_SAGYO_DATE_F    
PRINT @C_SAGYO_DATE_T    
PRINT @C_SAGYO_DATE_OP   
PRINT @C_TORI_KBN_OP     
PRINT @C_CENTER_OP       
*/
----
----	DECLARE  CUR01  CURSOR  FOR
----		SELECT	JS1.UKETSUKE_NO,
----				JS1.SOSHIKI_CD
----			FROM
----				(
----				SELECT	DISTINCT
----						JS.UKETSUKE_NO,
----						JS.SOSHIKI_CD,
----						JK.KOKYAKUMEI,
----						JK.KOKYAKUMEI_KANA,
----						JK.HOJIN_CD,
----						JK.JUCHU_STS_CD,
----						JS.TEHAI_STS_CD,
----						JK.TORIATSUKAI_KBN
----					FROM
----						T_JUCHU_SYOSAI JS
----						INNER JOIN T_JUCHU_KIHON JK
----						ON (JK.UKETSUKE_NO = JS.UKETSUKE_NO)
----					WHERE
----						JS.SOSHIKI_CD  = @IN_SOSHIKI_CD
----					AND	JS.DELETE_FLG  = '0'
----					AND	JK.DELETE_FLG  = '0'
----					AND	(--他センター関連
----							(SUBSTRING(@C_CENTER_OP,1,1) = '0')
----						OR	(SUBSTRING(@C_CENTER_OP,1,1) = '1' AND JS.IRAISAKI_SOSHIKI_CD IS NOT NULL)	--他センター一括
----						)
----				UNION
----				SELECT	DISTINCT
----						JS.UKETSUKE_NO,
----						JS.SOSHIKI_CD,
----						JK.KOKYAKUMEI,
----						JK.KOKYAKUMEI_KANA,
----						JK.HOJIN_CD,
----						JK.JUCHU_STS_CD,
----						JS.TEHAI_STS_CD,
----						JK.TORIATSUKAI_KBN
----					FROM
----						T_JUCHU_SYOSAI JS
----						INNER JOIN T_JUCHU_KIHON JK
----						ON (JK.UKETSUKE_NO = JS.UKETSUKE_NO)
----						LEFT JOIN M_SOSHIKI MS1
----							LEFT JOIN M_SOSHIKI MS2
----							ON (MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD)
----						ON (MS1.SOSHIKI_CD = JS.SOSHIKI_CD)
----					WHERE
----						JS.DELETE_FLG         = '0'
----					AND	JK.DELETE_FLG         = '0'
----					AND	JS.IRAI_SHUBETSU_CD   = '0'
----					AND	(MS2.JYOBU_SOSHIKI_CD = @IN_SOSHIKI_CD OR MS1.JYOBU_SOSHIKI_CD = @IN_SOSHIKI_CD)
----					AND	(--他センター分含む
----							(@IN_SOSHIKI_KBN IN ('1','2') AND JK.TORIATSUKAI_KBN = '10')	--連合会、本部
----						OR	(@IN_SOSHIKI_KBN NOT IN ('1','2'))								--連合会、本部以外
----						)
----					AND   SUBSTRING(@C_CENTER_OP,2,1) = '1'
----					) JS1
----			WHERE
----				(--顧客名
----					(RTRIM(@V_KOKYAKUMEI)  = '')
----				OR	(RTRIM(@V_KOKYAKUMEI) != '' AND JS1.KOKYAKUMEI LIKE @V_KOKYAKUMEI)
----				)
----			AND	(--顧客名カナ
----					(RTRIM(@V_KOKYAKUMEI_KANA)  = '')
----				OR	(RTRIM(@V_KOKYAKUMEI_KANA) != '' AND JS1.KOKYAKUMEI_KANA LIKE @V_KOKYAKUMEI_KANA)
----				)
----			AND	(--法人コード
----					(RTRIM(@C_HOJIN_CD) = '')
----				OR	(RTRIM(@C_HOJIN_CD) != '' AND JS1.HOJIN_CD = @C_HOJIN_CD)
----				)
----			AND	(--進行状況
----					(@V_JUCHU_STS_CD = '00000000')					--指定無し
----				OR	(SUBSTRING(@V_JUCHU_STS_CD,1,1) = '1' AND JS1.JUCHU_STS_CD = '01')		--TEL問合せ
----				OR	(SUBSTRING(@V_JUCHU_STS_CD,2,1) = '1' AND JS1.JUCHU_STS_CD = '02')		--見積依頼
----				OR	(SUBSTRING(@V_JUCHU_STS_CD,3,1) = '1' AND JS1.JUCHU_STS_CD = '03')		--見積完了
----				OR	(SUBSTRING(@V_JUCHU_STS_CD,4,1) = '1' AND JS1.JUCHU_STS_CD = '04')		--成約
----				OR	(SUBSTRING(@V_JUCHU_STS_CD,5,1) = '1' AND JS1.JUCHU_STS_CD = '05')		--配送完了
----				OR	(SUBSTRING(@V_JUCHU_STS_CD,6,1) = '1' AND JS1.JUCHU_STS_CD = '11')		--前キャンセル
----				OR	(SUBSTRING(@V_JUCHU_STS_CD,7,1) = '1' AND JS1.JUCHU_STS_CD = '12')		--後キャンセル
----				OR	(SUBSTRING(@V_JUCHU_STS_CD,8,1) = '1' AND JS1.JUCHU_STS_CD = '90')		--不成約
----				)
----			AND	(--手配状況
----					(@V_TEHAI_STS_CD = '00000')					--指定無し
----				OR	(SUBSTRING(@V_TEHAI_STS_CD,1,1) = '1' AND JS1.TEHAI_STS_CD = '0')		--手配無し
----				OR	(SUBSTRING(@V_TEHAI_STS_CD,2,1) = '1' AND JS1.TEHAI_STS_CD = '1')		--未手配
----				OR	(SUBSTRING(@V_TEHAI_STS_CD,3,1) = '1' AND JS1.TEHAI_STS_CD = '2')		--手配中
----				OR	(SUBSTRING(@V_TEHAI_STS_CD,4,1) = '1' AND JS1.TEHAI_STS_CD = '3')		--手配完了
----				OR	(SUBSTRING(@V_TEHAI_STS_CD,5,1) = '1' AND JS1.TEHAI_STS_CD = '4')		--作業完了
----				)
----			AND	(--取扱区分
----					(@C_TORI_KBN_OP  = '0')										--全取扱区分
----				OR	(@C_TORI_KBN_OP  = '1' AND JS1.TORIATSUKAI_KBN != '40')		--引越・事務所移転・生活関連
----				OR	(@C_TORI_KBN_OP != '1' AND JS1.TORIATSUKAI_KBN  = '40')		--一般輸送
----				)
----			ORDER BY JS1.UKETSUKE_NO DESC
----
----	OPEN  CUR01
----	FETCH  NEXT FROM CUR01 INTO
----		@C_UKETSUKE_NO,
----		@C_SOSHIKI_CD     
----	WHILE (@@FETCH_STATUS = 0)
----	BEGIN
----
----		SET @I_INS_FLG = 1
----
----		--見積日
----		IF RTRIM(@C_MITSUMORI_DATE_F) != '' OR RTRIM(@C_MITSUMORI_DATE_T) != ''
----		BEGIN
----			IF RTRIM(@C_MITSUMORI_DATE_F) = ''
----				SET @C_MITSUMORI_DATE_F = '00000101'
----
----			IF RTRIM(@C_MITSUMORI_DATE_T) = ''
----				SET @C_MITSUMORI_DATE_T = '99991231'
----
----			SELECT @RCNT = COUNT(1)
----				FROM
----					T_JUCHU_TEHAI JT
----					INNER JOIN T_JUCHU_TEHAI_SYOSAI JTS
----					ON (JTS.UKETSUKE_NO = JT.UKETSUKE_NO
----					AND JTS.SOSHIKI_CD  = JT.SOSHIKI_CD
----					AND JTS.TEHAI_SEQ   = JT.TEHAI_SEQ
----					AND JTS.DELETE_FLG  = '0')
----				WHERE JT.UKETSUKE_NO       = @C_UKETSUKE_NO
----				AND   JT.SOSHIKI_CD        = @C_SOSHIKI_CD
----				AND   JT.TEHAI_SHUBETSU_CD = '01'
----				AND   JT.DELETE_FLG        = '0'
----				AND   JTS.SAGYO_DT         BETWEEN @C_MITSUMORI_DATE_F AND @C_MITSUMORI_DATE_T
----
----			IF @RCNT > 0 AND @I_INS_FLG = 1
----				SET @I_INS_FLG = 1
----			ELSE
----				SET @I_INS_FLG = 0
----		END
----
----		--作業日、積日指定、卸日指定
----		IF RTRIM(@C_SAGYO_DATE_F) != '' OR RTRIM(@C_SAGYO_DATE_T) != '' OR @C_SAGYO_DATE_OP != '00'
----		BEGIN
----
----			IF RTRIM(@C_SAGYO_DATE_F) = ''
----				SET @C_SAGYO_DATE_F = '00000101'
----
----			IF RTRIM(@C_SAGYO_DATE_T) = ''
----				SET @C_SAGYO_DATE_T = '99991231'
----
----			SELECT @RCNT = COUNT(1)
----				FROM
----					T_JUCHU_GYOMU JG
----				WHERE
----					JG.UKETSUKE_NO  = @C_UKETSUKE_NO
----				AND	JG.DELETE_FLG   = '0'
----				AND	JG.SAGYO_DT     BETWEEN @C_SAGYO_DATE_F AND @C_SAGYO_DATE_T
----				AND	(
----						(@C_SAGYO_DATE_OP     = '00')
----					OR	(SUBSTRING(@C_SAGYO_DATE_OP,1,1) = '1' AND JG.GYOMU_KBN = '1')
----					OR	(SUBSTRING(@C_SAGYO_DATE_OP,2,1) = '1' AND JG.GYOMU_KBN = '2')
----					)
----			IF @RCNT > 0 AND @I_INS_FLG = 1
----				SET @I_INS_FLG = 1
----			ELSE
----				SET @I_INS_FLG = 0
----		END
----
------PRINT @I_INS_FLG
----
----		IF @I_INS_FLG = 1
----		BEGIN
----			SET @DCNT = @DCNT + 1
----
----			INSERT INTO W_COM_KENSAKU_RES(
----						SESSION_CD,
----						UKETSUKE_NO,
----						SOSHIKI_CD
----						)
----				VALUES	(
----						@IN_SESSION_ID,
----						@C_UKETSUKE_NO,
----						@C_SOSHIKI_CD
----						)
----			IF @@ERROR != 0
----			BEGIN
----				SET @ERR = @@ERROR
----				GOTO SP_KENSAKU_OTHER1_EXIT_LOOP
----			END
----
----			--３０１件目まで登録する
----			IF @DCNT = 301
----			BEGIN
----				GOTO SP_KENSAKU_OTHER1_EXIT_LOOP
----			END
----		END
----
----		FETCH  NEXT FROM CUR01 INTO
----			@C_UKETSUKE_NO,
----			@C_SOSHIKI_CD 
----	END
----
----SP_KENSAKU_OTHER1_EXIT_LOOP:
----	--  ｶｰｿﾙCLOSE
----	CLOSE CUR01
----	--  ｶｰｿﾙ削除
----	DEALLOCATE CUR01
----
----	WAITFOR DELAY '00:02:01.000'
----
-- ======================================================================================== --
--                              End 2010/07/06 削除 SYS_Ohki
-- ======================================================================================== --



		-- ======================================================================================== --
		--                              Str 2010/07/06 追加 SYS_Ohki
		-- ======================================================================================== --
		----------------------------------------------------------------------------------------------
		--見積日設定
		----------------------------------------------------------------------------------------------
		DECLARE @MITSUMORI_FLG AS CHAR(1)
		SET @MITSUMORI_FLG = '0'
		
		IF RTRIM(@C_MITSUMORI_DATE_F) != '' OR RTRIM(@C_MITSUMORI_DATE_T) != ''
		BEGIN
			
			IF RTRIM(@C_MITSUMORI_DATE_F) = ''
			BEGIN
				SET @C_MITSUMORI_DATE_F = '00000101'
			END

			IF RTRIM(@C_MITSUMORI_DATE_T) = ''
			BEGIN
				SET @C_MITSUMORI_DATE_T = '99991231'
			END
			
			-- 見積日を指定している
			SET @MITSUMORI_FLG = '1' 
			
		END
		
		----------------------------------------------------------------------------------------------
		--作業日、積日指定、卸日指定
		----------------------------------------------------------------------------------------------
		DECLARE @SAGYO_FLG AS CHAR(1)
		SET @SAGYO_FLG = '0'
		
		IF RTRIM(@C_SAGYO_DATE_F) != '' OR RTRIM(@C_SAGYO_DATE_T) != '' OR @C_SAGYO_DATE_OP != '00'
		BEGIN
			
			IF RTRIM(@C_SAGYO_DATE_F) = ''
			BEGIN
				SET @C_SAGYO_DATE_F = '00000101'
			END

			IF RTRIM(@C_SAGYO_DATE_T) = ''
			BEGIN
				SET @C_SAGYO_DATE_T = '99991231'
			END
			
			-- 作業日を指定している
			SET @SAGYO_FLG = '1' 
			
		END
		
		
		
		
		
		
		;WITH JS1
		AS (
		SELECT	JS1.UKETSUKE_NO,
				JS1.SOSHIKI_CD,
				JS1.KOKYAKUMEI,
				JS1.KOKYAKUMEI_KANA,
				JS1.HOJIN_CD,
				JS1.JUCHU_STS_CD,
				JS1.TEHAI_STS_CD,
				JS1.TORIATSUKAI_KBN
		FROM (
				
				-------------------------------------------------------------------------------------------------
				SELECT	DISTINCT
						JS.UKETSUKE_NO,
						JS.SOSHIKI_CD,
						JK.KOKYAKUMEI,
						JK.KOKYAKUMEI_KANA,
						JK.HOJIN_CD,
						JK.JUCHU_STS_CD,
						JS.TEHAI_STS_CD,
						JK.TORIATSUKAI_KBN
				FROM
						T_JUCHU_SYOSAI JS INNER JOIN T_JUCHU_KIHON JK ON (JK.UKETSUKE_NO = JS.UKETSUKE_NO)
				WHERE
					JS.SOSHIKI_CD  = @IN_SOSHIKI_CD
				AND	JS.DELETE_FLG  = '0'
				AND	JK.DELETE_FLG  = '0'
				AND	(--他センター関連
					(SUBSTRING(@C_CENTER_OP,1,1) = '0')
					OR	
					(SUBSTRING(@C_CENTER_OP,1,1) = '1' AND JS.IRAISAKI_SOSHIKI_CD IS NOT NULL)	--他センター一括
					)
				-------------------------------------------------------------------------------------------------
				
				UNION 
				
				-------------------------------------------------------------------------------------------------
				SELECT	DISTINCT
						JS.UKETSUKE_NO,
						JS.SOSHIKI_CD,
						JK.KOKYAKUMEI,
						JK.KOKYAKUMEI_KANA,
						JK.HOJIN_CD,
						JK.JUCHU_STS_CD,
						JS.TEHAI_STS_CD,
						JK.TORIATSUKAI_KBN
				FROM
						T_JUCHU_SYOSAI JS INNER JOIN T_JUCHU_KIHON JK ON (JK.UKETSUKE_NO = JS.UKETSUKE_NO)  
										   LEFT JOIN M_SOSHIKI MS1 
										   LEFT JOIN M_SOSHIKI MS2 ON (MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD)  ON (MS1.SOSHIKI_CD = JS.SOSHIKI_CD) 
				WHERE
					JS.DELETE_FLG         = '0'
				AND	JK.DELETE_FLG         = '0'
				AND	JS.IRAI_SHUBETSU_CD   = '0'
				AND	(MS2.JYOBU_SOSHIKI_CD = @IN_SOSHIKI_CD OR MS1.JYOBU_SOSHIKI_CD = @IN_SOSHIKI_CD)
				AND	(--他センター分含む
				(@IN_SOSHIKI_KBN IN ('1','2') AND JK.TORIATSUKAI_KBN = '10')		--連合会、本部
				OR	
				(@IN_SOSHIKI_KBN NOT IN ('1','2'))									--連合会、本部以外
				)
				AND   SUBSTRING(@C_CENTER_OP,2,1) = '1'
				-------------------------------------------------------------------------------------------------
				
			) JS1

				
				
		WHERE
				(--顧客名
					(RTRIM(@V_KOKYAKUMEI)  = '')
				OR	(RTRIM(@V_KOKYAKUMEI) != '' AND JS1.KOKYAKUMEI LIKE @V_KOKYAKUMEI)
				)
			AND	(--顧客名カナ
					(RTRIM(@V_KOKYAKUMEI_KANA)  = '')
				OR	(RTRIM(@V_KOKYAKUMEI_KANA) != '' AND JS1.KOKYAKUMEI_KANA LIKE @V_KOKYAKUMEI_KANA)
				)
			AND	(--法人コード
					(RTRIM(@C_HOJIN_CD) = '')
				OR	(RTRIM(@C_HOJIN_CD) != '' AND JS1.HOJIN_CD = @C_HOJIN_CD)
				)
			AND	(--進行状況
					(@V_JUCHU_STS_CD = '00000000')					--指定無し
				OR	(SUBSTRING(@V_JUCHU_STS_CD,1,1) = '1' AND JS1.JUCHU_STS_CD = '01')		--TEL問合せ
				OR	(SUBSTRING(@V_JUCHU_STS_CD,2,1) = '1' AND JS1.JUCHU_STS_CD = '02')		--見積依頼
				OR	(SUBSTRING(@V_JUCHU_STS_CD,3,1) = '1' AND JS1.JUCHU_STS_CD = '03')		--見積完了
				OR	(SUBSTRING(@V_JUCHU_STS_CD,4,1) = '1' AND JS1.JUCHU_STS_CD = '04')		--成約
				OR	(SUBSTRING(@V_JUCHU_STS_CD,5,1) = '1' AND JS1.JUCHU_STS_CD = '05')		--配送完了
				OR	(SUBSTRING(@V_JUCHU_STS_CD,6,1) = '1' AND JS1.JUCHU_STS_CD = '11')		--前キャンセル
				OR	(SUBSTRING(@V_JUCHU_STS_CD,7,1) = '1' AND JS1.JUCHU_STS_CD = '12')		--後キャンセル
				OR	(SUBSTRING(@V_JUCHU_STS_CD,8,1) = '1' AND JS1.JUCHU_STS_CD = '90')		--不成約
				)
			AND	(--手配状況
					(@V_TEHAI_STS_CD = '00000')					--指定無し
				OR	(SUBSTRING(@V_TEHAI_STS_CD,1,1) = '1' AND JS1.TEHAI_STS_CD = '0')		--手配無し
				OR	(SUBSTRING(@V_TEHAI_STS_CD,2,1) = '1' AND JS1.TEHAI_STS_CD = '1')		--未手配
				OR	(SUBSTRING(@V_TEHAI_STS_CD,3,1) = '1' AND JS1.TEHAI_STS_CD = '2')		--手配中
				OR	(SUBSTRING(@V_TEHAI_STS_CD,4,1) = '1' AND JS1.TEHAI_STS_CD = '3')		--手配完了
				OR	(SUBSTRING(@V_TEHAI_STS_CD,5,1) = '1' AND JS1.TEHAI_STS_CD = '4')		--作業完了
				)
			AND	(--取扱区分
					(@C_TORI_KBN_OP  = '0')										--全取扱区分
				OR	(@C_TORI_KBN_OP  = '1' AND JS1.TORIATSUKAI_KBN != '40')		--引越・事務所移転・生活関連
				OR	(@C_TORI_KBN_OP != '1' AND JS1.TORIATSUKAI_KBN  = '40')		--一般輸送
				)
		)



		INSERT INTO W_COM_KENSAKU_RES
		SELECT SESSION_ID , UKETSUKE_NO , SOSHIKI_CD ,GETDATE()
		FROM   (
				SELECT ROW_NUMBER() OVER(ORDER BY UKETSUKE_NO DESC) ROWNUM , @IN_SESSION_ID SESSION_ID , UKETSUKE_NO ,   JS1.SOSHIKI_CD
				FROM   JS1
				WHERE  (	
							-- ========================================================================= --
							-- 見積日指定時の条件
							-- ========================================================================= --
							(@MITSUMORI_FLG = '0') -- ←見積日の指定無し
							OR 
							EXISTS(SELECT * FROM T_JUCHU_TEHAI JT INNER JOIN T_JUCHU_TEHAI_SYOSAI JTS
		       								ON (    JTS.UKETSUKE_NO = JT.UKETSUKE_NO
											AND 	JTS.SOSHIKI_CD  = JT.SOSHIKI_CD
											AND 	JTS.TEHAI_SEQ   = JT.TEHAI_SEQ
											AND 	JTS.DELETE_FLG  = '0')
							   	   WHERE JT.UKETSUKE_NO       = JS1.UKETSUKE_NO
							       AND   JT.SOSHIKI_CD        = JS1.SOSHIKI_CD
							       AND   JT.TEHAI_SHUBETSU_CD = '01'
							       AND   JT.DELETE_FLG        = '0'
							       AND   JTS.SAGYO_DT         BETWEEN @C_MITSUMORI_DATE_F AND @C_MITSUMORI_DATE_T)
						)
						AND
						(
							-- ========================================================================= --
							-- 作業日指定時の条件
							-- ========================================================================= --
							(@SAGYO_FLG = '0') -- ←作業日の指定無し
							OR
							EXISTS (SELECT * FROM T_JUCHU_GYOMU JG
									WHERE JG.UKETSUKE_NO  = JS1.UKETSUKE_NO
									AND	  JG.DELETE_FLG   = '0'
									AND	  JG.SAGYO_DT     BETWEEN @C_SAGYO_DATE_F AND @C_SAGYO_DATE_T
									AND	(
											(@C_SAGYO_DATE_OP     = '00')
										OR	(SUBSTRING(@C_SAGYO_DATE_OP,1,1) = '1' AND JG.GYOMU_KBN = '1')
										OR	(SUBSTRING(@C_SAGYO_DATE_OP,2,1) = '1' AND JG.GYOMU_KBN = '2')
										)
								   )
						)
				) RETURN_TB
		WHERE 
		ROWNUM <= 301


		OPTION(RECOMPILE)
		-- ======================================================================================== --
		--                              End 2010/07/06 追加 SYS_Ohki
		-- ======================================================================================== --
		
		RETURN @ERR

END


GO

