USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0221]    Script Date: 07/31/2014 11:43:05 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER OFF
GO




/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/28 12:43:34 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/28 10:47:11 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/25 11:53:45 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/25 9:00:40 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/24 19:47:54 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/24 14:05:48 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/24 11:58:07 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/24 11:40:43 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/24 11:00:41 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/24 9:36:34 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/21 21:18:00 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/21 20:19:20 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/21 20:08:31 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/21 15:28:19 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/21 15:01:54 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/21 15:01:24 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/21 14:54:26 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/21 14:18:50 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/18 15:32:58 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/18 15:29:29 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/18 13:32:02 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0221    スクリプト日付 : 2005/02/18 9:31:59 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/18 9:28:17 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/17 16:01:57 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/17 15:58:27 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/17 15:57:24 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/17 15:33:11 ******/
CREATE                                   PROCEDURE [dbo].[SP_AB0221]
/******* Added 2005.03.09 Akihisa Urushibara *******/
	@ERROR AS INT OUTPUT
/******* Added 2005.03.09 Akihisa Urushibara *******/
AS
DECLARE
	@依頼組織CD		AS CHAR(5),
	@受付番号		AS CHAR(8),
	@顧客名			AS VARCHAR(30),
	@法人CD			AS CHAR(9),
	@進行状況		AS VARCHAR(50),
	@見積日FROM		AS CHAR(8),
	@見積日TO		AS CHAR(8),
	@作業日FROM		AS CHAR(8),
	@作業日TO		AS CHAR(8),
	@積卸区分		AS CHAR(1),
	@精算日FROM		AS CHAR(8),
	@精算日TO		AS CHAR(8),
	@受付日FROM		AS CHAR(8),
	@受付日TO		AS CHAR(8),
	@経由CD			AS CHAR(2),
	@取扱区分		AS CHAR(2),
	@下部組織区分	AS CHAR(1),
	@組織区分		AS CHAR(1),
	@ITEMCNT		AS INTEGER
BEGIN
	--	CSV検索条件抽出テーブルから未処理のレコードを取り出す
	DECLARE AB0221_CUR00 CURSOR FOR 
		SELECT	JC.IRAI_SOSHIKI_CD
			,	JC.UKETSUKE_NO
			,	JC.KOKYAKUMEI
			,	JC.HOJIN_CD
			,	JC.JUCHU_STS_CD
			,	JC.MITSUMORI_DT_FROM
			,	JC.MITSUMORI_DT_TO
			,	JC.SAGYO_DT_FROM
			,	JC.SAGYO_DT_TO
			,	JC.TSUMI_OROSHI_FLG
			,	JC.SEISAN_DT_FROM
			,	JC.SEISAN_DT_TO
			,	JC.UKETSUKE_DT_FROM
			,	JC.UKETSUKE_DT_TO
			,	JC.KEIYU_CD
			,	JC.TORIATSUKAI_KBN
			,	JC.KABU_SOSHIKI_KBN
		FROM	T_JUCHU_CSV AS JC
		WHERE	JC.DELETE_FLG	= '0'
			AND	JC.CSV_TYPE		= '3'
			AND	JC.CSV_MAKE_FLG	= '0'
	OPEN AB0221_CUR00
	FETCH  NEXT FROM AB0221_CUR00 INTO
		@依頼組織CD,
		@受付番号,
		@顧客名,
		@法人CD,
		@進行状況,
		@見積日FROM,
		@見積日TO,
		@作業日FROM,
		@作業日TO,
		@積卸区分,
		@精算日FROM,
		@精算日TO,
		@受付日FROM,
		@受付日TO,
		@経由CD,
		@取扱区分,
		@下部組織区分
	
	WHILE(@@FETCH_STATUS = 0)
	BEGIN
		-- ワークテーブルから対象の依頼組織のレコードを削除する
		DELETE FROM W_TEHAI_CSV WHERE IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		
		TRUNCATE TABLE W_TEHAI_CSV_WORK
		SELECT @組織区分 = SOSHIKI_KBN FROM M_SOSHIKI WHERE SOSHIKI_CD = @依頼組織CD
		-- 受付番号が指定された場合、他の検索条件は無視する
		IF @受付番号 IS NOT NULL	
		BEGIN
			IF @組織区分 = '1' -- 連合会
			BEGIN
				PRINT @組織区分
				IF @下部組織区分 = '0'	-- 下部組織を含まない
				BEGIN
					INSERT INTO W_TEHAI_CSV_WORK
					(
						IRAI_SOSHIKI_CD,
						UKETSUKE_NO,
						SOSHIKI_CD
					)
					SELECT	DISTINCT
							@依頼組織CD AS IRAI_SOSHIKI_CD
						,	JS.UKETSUKE_NO
						,	JS.SOSHIKI_CD
					FROM	T_JUCHU_SYOSAI AS JS
							LEFT JOIN T_JUCHU_KIHON AS JK
							ON	JK.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JK.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_GYOMU AS JG
							ON 	JG.UKETSUKE_NO = JS.UKETSUKE_NO
							AND JG.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_TEHAI AS JT
								LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS
								ON	JT.UKETSUKE_NO	= JTS.UKETSUKE_NO
								AND	JT.SOSHIKI_CD	= JTS.SOSHIKI_CD
								AND	JT.TEHAI_SEQ	= JTS.TEHAI_SEQ
								AND JTS.DELETE_FLG 	= '0'
							ON 	JT.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JT.SOSHIKI_CD	= JS.SOSHIKI_CD
							AND	JT.DELETE_FLG	= '0'
							AND	JT.TEHAI_SHUBETSU_CD = '01'
							LEFT JOIN M_SOSHIKI AS MS1
								LEFT JOIN M_SOSHIKI AS MS2
								ON	MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD
							ON	MS1.SOSHIKI_CD = JS.SOSHIKI_CD
					WHERE	JS.DELETE_FLG	= '0'
					-- AND	JS.JUCHU_SHUBETSU_CD = '1'
						AND JS.UKETSUKE_NO	= @受付番号
						AND	JS.SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
				END
				ELSE	-- 下部組織を含む
				BEGIN
					INSERT INTO W_TEHAI_CSV_WORK
					(
						IRAI_SOSHIKI_CD,
						UKETSUKE_NO,
						SOSHIKI_CD
					)
					SELECT	DISTINCT
							@依頼組織CD AS IRAI_SOSHIKI_CD
						,	JS.UKETSUKE_NO
						,	JS.SOSHIKI_CD
					FROM	T_JUCHU_SYOSAI AS JS
							LEFT JOIN T_JUCHU_KIHON AS JK
							ON	JK.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JK.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_GYOMU AS JG
							ON 	JG.UKETSUKE_NO = JS.UKETSUKE_NO
							AND JG.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_TEHAI AS JT
								LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS
								ON	JT.UKETSUKE_NO	= JTS.UKETSUKE_NO
								AND	JT.SOSHIKI_CD	= JTS.SOSHIKI_CD
								AND	JT.TEHAI_SEQ	= JTS.TEHAI_SEQ
								AND JTS.DELETE_FLG 	= '0'
							ON 	JT.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JT.SOSHIKI_CD	= JS.SOSHIKI_CD
							AND	JT.DELETE_FLG	= '0'
							AND	JT.TEHAI_SHUBETSU_CD = '01'
							LEFT JOIN M_SOSHIKI AS MS1
								LEFT JOIN M_SOSHIKI AS MS2
								ON	MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD
							ON	MS1.SOSHIKI_CD = JS.SOSHIKI_CD
					WHERE	JS.DELETE_FLG	= '0'
						-- AND	JS.JUCHU_SHUBETSU_CD = '1'
						AND JS.UKETSUKE_NO			= @受付番号
						AND	
						(
							(
								(	MS2.JYOBU_SOSHIKI_CD	= @依頼組織CD	OR	MS1.JYOBU_SOSHIKI_CD	= @依頼組織CD	)	
								AND JK.TORIATSUKAI_KBN		= '10'	-- 一般引越のみ
								AND JS.JUCHU_SHUBETSU_CD	= '1'
							)
							OR
							(
								JS.SOSHIKI_CD			= @依頼組織CD
							AND JS.JUCHU_SHUBETSU_CD	= '1'
							)
						)
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
				END
			END
			IF @組織区分 = '2' -- 本部
			BEGIN
				IF @下部組織区分 = '0'	-- 下部組織を含まない
				BEGIN
					INSERT INTO W_TEHAI_CSV_WORK
					(
						IRAI_SOSHIKI_CD,
						UKETSUKE_NO,
						SOSHIKI_CD
					)
					SELECT	DISTINCT
							@依頼組織CD AS IRAI_SOSHIKI_CD
						,	JS.UKETSUKE_NO
						,	JS.SOSHIKI_CD
					FROM	T_JUCHU_SYOSAI AS JS
							LEFT JOIN T_JUCHU_KIHON AS JK
							ON	JK.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JK.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_GYOMU AS JG
							ON 	JG.UKETSUKE_NO = JS.UKETSUKE_NO
							AND JG.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_TEHAI AS JT
								LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS
								ON	JT.UKETSUKE_NO	= JTS.UKETSUKE_NO
								AND	JT.SOSHIKI_CD	= JTS.SOSHIKI_CD
								AND	JT.TEHAI_SEQ	= JTS.TEHAI_SEQ
								AND JTS.DELETE_FLG 	= '0'
							ON 	JT.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JT.SOSHIKI_CD	= JS.SOSHIKI_CD
							AND	JT.DELETE_FLG	= '0'
							AND	JT.TEHAI_SHUBETSU_CD = '01'
							LEFT JOIN M_SOSHIKI AS MS1
								LEFT JOIN M_SOSHIKI AS MS2
								ON	MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD
							ON	MS1.SOSHIKI_CD = JS.SOSHIKI_CD
					WHERE	JS.DELETE_FLG	= '0'
					-- AND	JS.JUCHU_SHUBETSU_CD = '1'
						AND JS.UKETSUKE_NO	= @受付番号
						AND	JS.SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
				END
				ELSE	-- 下部組織を含む
				BEGIN
					INSERT INTO W_TEHAI_CSV_WORK
					(
						IRAI_SOSHIKI_CD,
						UKETSUKE_NO,
						SOSHIKI_CD
					)
					SELECT	DISTINCT
							@依頼組織CD AS IRAI_SOSHIKI_CD
						,	JS.UKETSUKE_NO
						,	JS.SOSHIKI_CD
					FROM	T_JUCHU_SYOSAI AS JS
							LEFT JOIN T_JUCHU_KIHON AS JK
							ON	JK.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JK.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_GYOMU AS JG
							ON 	JG.UKETSUKE_NO = JS.UKETSUKE_NO
							AND JG.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_TEHAI AS JT
								LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS
								ON	JT.UKETSUKE_NO	= JTS.UKETSUKE_NO
								AND	JT.SOSHIKI_CD	= JTS.SOSHIKI_CD
								AND	JT.TEHAI_SEQ	= JTS.TEHAI_SEQ
								AND JTS.DELETE_FLG 	= '0'
							ON 	JT.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JT.SOSHIKI_CD	= JS.SOSHIKI_CD
							AND	JT.DELETE_FLG	= '0'
							AND	JT.TEHAI_SHUBETSU_CD = '01'
							LEFT JOIN M_SOSHIKI AS MS1
								LEFT JOIN M_SOSHIKI AS MS2
								ON	MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD
							ON	MS1.SOSHIKI_CD = JS.SOSHIKI_CD
					WHERE	JS.DELETE_FLG	= '0'
						-- AND	JS.JUCHU_SHUBETSU_CD = '1'
						AND JS.UKETSUKE_NO	= @受付番号
						AND	MS1.JYOBU_SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
				END
			END
			IF @組織区分 = '3' -- センター
			BEGIN
				INSERT INTO W_TEHAI_CSV_WORK
				(
					IRAI_SOSHIKI_CD,
					UKETSUKE_NO,
					SOSHIKI_CD
				)
				SELECT	DISTINCT
						@依頼組織CD AS IRAI_SOSHIKI_CD
					,	JS.UKETSUKE_NO
					,	JS.SOSHIKI_CD
				FROM	T_JUCHU_SYOSAI AS JS
						LEFT JOIN T_JUCHU_KIHON AS JK
						ON	JK.UKETSUKE_NO = JS.UKETSUKE_NO
						AND	JK.DELETE_FLG	= '0'
						LEFT JOIN T_JUCHU_GYOMU AS JG
						ON 	JG.UKETSUKE_NO = JS.UKETSUKE_NO
						AND JG.DELETE_FLG	= '0'
						LEFT JOIN T_JUCHU_TEHAI AS JT
							LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS
							ON	JT.UKETSUKE_NO	= JTS.UKETSUKE_NO
							AND	JT.SOSHIKI_CD	= JTS.SOSHIKI_CD
							AND	JT.TEHAI_SEQ	= JTS.TEHAI_SEQ
							AND JTS.DELETE_FLG 	= '0'
						ON 	JT.UKETSUKE_NO = JS.UKETSUKE_NO
						AND	JT.SOSHIKI_CD	= JS.SOSHIKI_CD
						AND	JT.DELETE_FLG	= '0'
						AND	JT.TEHAI_SHUBETSU_CD = '01'
						LEFT JOIN M_SOSHIKI AS MS1
							LEFT JOIN M_SOSHIKI AS MS2
							ON	MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD
						ON	MS1.SOSHIKI_CD = JS.SOSHIKI_CD
				WHERE	JS.DELETE_FLG	= '0'
					-- AND	JS.JUCHU_SHUBETSU_CD = '1'
					AND JS.UKETSUKE_NO	= @受付番号
					AND	JS.SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				SET @ERROR = @@ERROR
				IF @ERROR > 0
				BEGIN
					GOTO __TIDY_UP_PROC
				END
/******* Added 2005.03.09 Akihisa Urushibara *******/
			END
		END
		ELSE
		BEGIN
			IF @組織区分 = '1' -- 連合会
			BEGIN
				IF @下部組織区分 = '0'	-- 下部組織を含まない
				BEGIN
					INSERT INTO W_TEHAI_CSV_WORK
					(
						IRAI_SOSHIKI_CD,
						UKETSUKE_NO,
						SOSHIKI_CD
					)
					SELECT	DISTINCT
							@依頼組織CD AS IRAI_SOSHIKI_CD
						,	JS.UKETSUKE_NO
						,	JS.SOSHIKI_CD
					FROM	T_JUCHU_SYOSAI AS JS
							LEFT JOIN T_JUCHU_KIHON AS JK
							ON	JK.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JK.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_GYOMU AS JG
							ON 	JG.UKETSUKE_NO = JS.UKETSUKE_NO
							AND JG.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_TEHAI AS JT
								LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS
								ON	JT.UKETSUKE_NO	= JTS.UKETSUKE_NO
								AND	JT.SOSHIKI_CD	= JTS.SOSHIKI_CD
								AND	JT.TEHAI_SEQ	= JTS.TEHAI_SEQ
								AND JTS.DELETE_FLG 	= '0'
							ON 	JT.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JT.SOSHIKI_CD	= JS.SOSHIKI_CD
							AND	JT.DELETE_FLG	= '0'
							AND	JT.TEHAI_SHUBETSU_CD = '01'
							LEFT JOIN M_SOSHIKI AS MS1
								LEFT JOIN M_SOSHIKI AS MS2
								ON	MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD
							ON	MS1.SOSHIKI_CD = JS.SOSHIKI_CD
					WHERE	JS.DELETE_FLG	= '0'
						-- AND	JS.JUCHU_SHUBETSU_CD = '1'
						AND	JS.SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
				END
				ELSE
				BEGIN
					INSERT INTO W_TEHAI_CSV_WORK
					(
						IRAI_SOSHIKI_CD,
						UKETSUKE_NO,
						SOSHIKI_CD
					)
					SELECT	DISTINCT
							@依頼組織CD AS IRAI_SOSHIKI_CD
						,	JS.UKETSUKE_NO
						,	JS.SOSHIKI_CD
					FROM	T_JUCHU_SYOSAI AS JS
							LEFT JOIN T_JUCHU_KIHON AS JK
							ON	JK.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JK.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_GYOMU AS JG
							ON 	JG.UKETSUKE_NO = JS.UKETSUKE_NO
							AND JG.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_TEHAI AS JT
								LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS
								ON	JT.UKETSUKE_NO	= JTS.UKETSUKE_NO
								AND	JT.SOSHIKI_CD	= JTS.SOSHIKI_CD
								AND	JT.TEHAI_SEQ	= JTS.TEHAI_SEQ
								AND JTS.DELETE_FLG 	= '0'
							ON 	JT.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JT.SOSHIKI_CD	= JS.SOSHIKI_CD
							AND	JT.DELETE_FLG	= '0'
							AND	JT.TEHAI_SHUBETSU_CD = '01'
							LEFT JOIN M_SOSHIKI AS MS1
								LEFT JOIN M_SOSHIKI AS MS2
								ON	MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD
							ON	MS1.SOSHIKI_CD = JS.SOSHIKI_CD
					WHERE	JS.DELETE_FLG	= '0'
						-- AND	JS.JUCHU_SHUBETSU_CD = '1'
						AND	
						(
							(
								(	MS2.JYOBU_SOSHIKI_CD	= @依頼組織CD	OR	MS1.JYOBU_SOSHIKI_CD	= @依頼組織CD	)	
								AND JK.TORIATSUKAI_KBN		= '10'	-- 一般引越のみ
								AND JS.JUCHU_SHUBETSU_CD	= '1'
							)
							OR
							(
								JS.SOSHIKI_CD			= @依頼組織CD
							AND JS.JUCHU_SHUBETSU_CD	= '1'
							)
						)
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
				END
			END
			IF @組織区分 = '2' -- 本部
			BEGIN
				IF @下部組織区分 = '0'	-- 下部組織を含まない
				BEGIN
					INSERT INTO W_TEHAI_CSV_WORK
					(
						IRAI_SOSHIKI_CD,
						UKETSUKE_NO,
						SOSHIKI_CD
					)
					SELECT	DISTINCT
							@依頼組織CD AS IRAI_SOSHIKI_CD
						,	JS.UKETSUKE_NO
						,	JS.SOSHIKI_CD
					FROM	T_JUCHU_SYOSAI AS JS
							LEFT JOIN T_JUCHU_KIHON AS JK
							ON	JK.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JK.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_GYOMU AS JG
							ON 	JG.UKETSUKE_NO = JS.UKETSUKE_NO
							AND JG.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_TEHAI AS JT
								LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS
								ON	JT.UKETSUKE_NO	= JTS.UKETSUKE_NO
								AND	JT.SOSHIKI_CD	= JTS.SOSHIKI_CD
								AND	JT.TEHAI_SEQ	= JTS.TEHAI_SEQ
								AND JTS.DELETE_FLG 	= '0'
							ON 	JT.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JT.SOSHIKI_CD	= JS.SOSHIKI_CD
							AND	JT.DELETE_FLG	= '0'
							AND	JT.TEHAI_SHUBETSU_CD = '01'
							LEFT JOIN M_SOSHIKI AS MS1
								LEFT JOIN M_SOSHIKI AS MS2
								ON	MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD
							ON	MS1.SOSHIKI_CD = JS.SOSHIKI_CD
					WHERE	JS.DELETE_FLG	= '0'
						-- AND	JS.JUCHU_SHUBETSU_CD = '1'
						AND	JS.SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
				END
				ELSE
				BEGIN
					INSERT INTO W_TEHAI_CSV_WORK
					(
						IRAI_SOSHIKI_CD,
						UKETSUKE_NO,
						SOSHIKI_CD
					)
					SELECT	DISTINCT
							@依頼組織CD AS IRAI_SOSHIKI_CD
						,	JS.UKETSUKE_NO
						,	JS.SOSHIKI_CD
					FROM	T_JUCHU_SYOSAI AS JS
							LEFT JOIN T_JUCHU_KIHON AS JK
							ON	JK.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JK.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_GYOMU AS JG
							ON 	JG.UKETSUKE_NO = JS.UKETSUKE_NO
							AND JG.DELETE_FLG	= '0'
							LEFT JOIN T_JUCHU_TEHAI AS JT
								LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS
								ON	JT.UKETSUKE_NO	= JTS.UKETSUKE_NO
								AND	JT.SOSHIKI_CD	= JTS.SOSHIKI_CD
								AND	JT.TEHAI_SEQ	= JTS.TEHAI_SEQ
								AND JTS.DELETE_FLG 	= '0'
							ON 	JT.UKETSUKE_NO = JS.UKETSUKE_NO
							AND	JT.SOSHIKI_CD	= JS.SOSHIKI_CD
							AND	JT.DELETE_FLG	= '0'
							AND	JT.TEHAI_SHUBETSU_CD = '01'
							LEFT JOIN M_SOSHIKI AS MS1
								LEFT JOIN M_SOSHIKI AS MS2
								ON	MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD
							ON	MS1.SOSHIKI_CD = JS.SOSHIKI_CD
					WHERE	JS.DELETE_FLG	= '0'
						-- AND	JS.JUCHU_SHUBETSU_CD = '1'
						AND	MS1.JYOBU_SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
				END
			END
			IF @組織区分 = '3' -- センター
			BEGIN
				INSERT INTO W_TEHAI_CSV_WORK
				(
					IRAI_SOSHIKI_CD,
					UKETSUKE_NO,
					SOSHIKI_CD
				)
				SELECT	DISTINCT
						@依頼組織CD AS IRAI_SOSHIKI_CD
					,	JS.UKETSUKE_NO
					,	JS.SOSHIKI_CD
				FROM	T_JUCHU_SYOSAI AS JS
						LEFT JOIN T_JUCHU_KIHON AS JK
						ON	JK.UKETSUKE_NO = JS.UKETSUKE_NO
						AND	JK.DELETE_FLG	= '0'
						LEFT JOIN T_JUCHU_GYOMU AS JG
						ON 	JG.UKETSUKE_NO = JS.UKETSUKE_NO
						AND JG.DELETE_FLG	= '0'
						LEFT JOIN T_JUCHU_TEHAI AS JT
							LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS
							ON	JT.UKETSUKE_NO	= JTS.UKETSUKE_NO
							AND	JT.SOSHIKI_CD	= JTS.SOSHIKI_CD
							AND	JT.TEHAI_SEQ	= JTS.TEHAI_SEQ
							AND JTS.DELETE_FLG 	= '0'
						ON 	JT.UKETSUKE_NO = JS.UKETSUKE_NO
						AND	JT.SOSHIKI_CD	= JS.SOSHIKI_CD
						AND	JT.DELETE_FLG	= '0'
						AND	JT.TEHAI_SHUBETSU_CD = '01'
						LEFT JOIN M_SOSHIKI AS MS1
							LEFT JOIN M_SOSHIKI AS MS2
							ON	MS2.SOSHIKI_CD = MS1.JYOBU_SOSHIKI_CD
						ON	MS1.SOSHIKI_CD = JS.SOSHIKI_CD
				WHERE	JS.DELETE_FLG	= '0'
					-- AND	JS.JUCHU_SHUBETSU_CD = '1'
					AND	JS.SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				SET @ERROR = @@ERROR
				IF @ERROR > 0
				BEGIN
					GOTO __TIDY_UP_PROC
				END
/******* Added 2005.03.09 Akihisa Urushibara *******/
			END
			-- 顧客名が指定されていたら条件に合わないレコードを削除する
			IF @顧客名 IS NOT NULL
			BEGIN
				DELETE W_TEHAI_CSV_WORK 
				FROM W_TEHAI_CSV_WORK AS WC
					INNER JOIN T_JUCHU_KIHON AS JK
					ON WC.UKETSUKE_NO = JK.UKETSUKE_NO
				WHERE JK.KOKYAKUMEI NOT LIKE @顧客名 + '%'
					AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				SET @ERROR = @@ERROR
				IF @ERROR > 0
				BEGIN
					GOTO __TIDY_UP_PROC
				END
/******* Added 2005.03.09 Akihisa Urushibara *******/
			END
			-- 法人ＣＤが指定されていたら条件に合わないレコードを削除する
			IF @法人CD IS NOT NULL
			BEGIN
				DELETE W_TEHAI_CSV_WORK 
				FROM W_TEHAI_CSV_WORK AS WC
					INNER JOIN T_JUCHU_KIHON AS JK
					ON WC.UKETSUKE_NO = JK.UKETSUKE_NO
				WHERE (JK.HOJIN_CD <> @法人CD OR JK.HOJIN_CD IS NULL)
					AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				SET @ERROR = @@ERROR
				IF @ERROR > 0
				BEGIN
					GOTO __TIDY_UP_PROC
				END
/******* Added 2005.03.09 Akihisa Urushibara *******/
			END
			-- 進行状況が指定されていたら条件に合わないレコードを削除する
			IF @進行状況 IS NOT NULL
			BEGIN
				SELECT	@ITEMCNT = 0
				TRUNCATE TABLE W_CSV_JUCHU_STS
				WHILE @ITEMCNT < (LEN(@進行状況) / 2)
				BEGIN
					INSERT INTO W_CSV_JUCHU_STS
					VALUES (
						SUBSTRING(@進行状況, (@ITEMCNT * 2) + 1, 2)
					)
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SELECT @ITEMCNT = @ITEMCNT + 1
				END
				DELETE W_TEHAI_CSV_WORK 
				FROM W_TEHAI_CSV_WORK AS WC
					INNER JOIN T_JUCHU_KIHON AS JK
					ON WC.UKETSUKE_NO = JK.UKETSUKE_NO
				WHERE JK.JUCHU_STS_CD NOT IN (SELECT JUCHU_STS_CD FROM W_CSV_JUCHU_STS)
					AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				SET @ERROR = @@ERROR
				IF @ERROR > 0
				BEGIN
					GOTO __TIDY_UP_PROC
				END
/******* Added 2005.03.09 Akihisa Urushibara *******/
			END
			-- 見積日が指定されていたら条件に合わないレコードを削除する
			IF @見積日FROM IS NOT NULL AND @見積日TO IS NOT NULL
			BEGIN
				DELETE W_TEHAI_CSV_WORK 
				FROM W_TEHAI_CSV_WORK AS WC
				WHERE 	dbo.CHECK_MITSUMORI_DT(WC.UKETSUKE_NO, WC.SOSHIKI_CD, @見積日FROM, @見積日TO) = '0'
					AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				SET @ERROR = @@ERROR
				IF @ERROR > 0
				BEGIN
					GOTO __TIDY_UP_PROC
				END
/******* Added 2005.03.09 Akihisa Urushibara *******/
			END
			-- 作業日が指定されていたら条件に合わないレコードを削除する
			IF @作業日FROM IS NOT NULL AND @作業日TO IS NOT NULL
			BEGIN
				DELETE W_TEHAI_CSV_WORK 
				FROM W_TEHAI_CSV_WORK AS WC
				WHERE 	dbo.CHECK_SAGYO_DT(WC.UKETSUKE_NO, @積卸区分, @作業日FROM, @作業日TO) = '0'
					AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				SET @ERROR = @@ERROR
				IF @ERROR > 0
				BEGIN
					GOTO __TIDY_UP_PROC
				END
/******* Added 2005.03.09 Akihisa Urushibara *******/
			END
			-- 精算日が指定されていたら条件に合わないレコードを削除する
			IF @精算日FROM IS NOT NULL AND @精算日TO IS NOT NULL
			BEGIN
				DELETE W_TEHAI_CSV_WORK 
				FROM W_TEHAI_CSV_WORK AS WC
					INNER JOIN T_JUCHU_KIHON AS JK
					ON WC.UKETSUKE_NO = JK.UKETSUKE_NO
				WHERE (JK.SEISAN_DT < @精算日FROM OR JK.SEISAN_DT > @精算日TO OR JK.SEISAN_DT IS NULL)
					AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				SET @ERROR = @@ERROR
				IF @ERROR > 0
				BEGIN
					GOTO __TIDY_UP_PROC
				END
/******* Added 2005.03.09 Akihisa Urushibara *******/
			END
			-- 受付日が指定されていたら条件に合わないレコードを削除する
			IF @受付日FROM IS NOT NULL AND @受付日TO IS NOT NULL
			BEGIN
				DELETE W_TEHAI_CSV_WORK 
				FROM W_TEHAI_CSV_WORK AS WC
					INNER JOIN T_JUCHU_SYOSAI AS JS
					ON	WC.UKETSUKE_NO = JS.UKETSUKE_NO
					AND WC.SOSHIKI_CD  = JS.SOSHIKI_CD
				WHERE ((JS.JYUCHU_DT < @受付日FROM) OR (JS.JYUCHU_DT > @受付日TO))
					AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				SET @ERROR = @@ERROR
				IF @ERROR > 0
				BEGIN
					GOTO __TIDY_UP_PROC
				END
/******* Added 2005.03.09 Akihisa Urushibara *******/
			END
			-- 経由CDが指定されていたら条件に合わないレコードを削除する
			IF @経由CD IS NOT NULL AND @経由CD <> '00'
			BEGIN
				DELETE W_TEHAI_CSV_WORK 
				FROM W_TEHAI_CSV_WORK AS WC
					INNER JOIN T_JUCHU_SYOSAI AS JS
					ON	WC.UKETSUKE_NO = JS.UKETSUKE_NO
					AND WC.SOSHIKI_CD  = JS.SOSHIKI_CD
				WHERE	JS.JUCHU_KEIYU_CD <> @経由CD 
					AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				SET @ERROR = @@ERROR
				IF @ERROR > 0
				BEGIN
					GOTO __TIDY_UP_PROC
				END
/******* Added 2005.03.09 Akihisa Urushibara *******/
			END
			-- 取扱区分が指定されていたら条件に合わないレコードを削除する
			IF @取扱区分 IN ('1', '2')
			BEGIN
				IF @取扱区分 = '1'
				BEGIN
					DELETE W_TEHAI_CSV_WORK 
					FROM W_TEHAI_CSV_WORK AS WC
						INNER JOIN T_JUCHU_KIHON AS JK
						ON WC.UKETSUKE_NO = JK.UKETSUKE_NO
					WHERE	JK.TORIATSUKAI_KBN = '40' 
						AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
				END
				ELSE
				BEGIN
					DELETE W_TEHAI_CSV_WORK 
					FROM W_TEHAI_CSV_WORK AS WC
						INNER JOIN T_JUCHU_KIHON AS JK
						ON WC.UKETSUKE_NO = JK.UKETSUKE_NO
					WHERE	JK.TORIATSUKAI_KBN <> '40' 
						AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
					SET @ERROR = @@ERROR
					IF @ERROR > 0
					BEGIN
						GOTO __TIDY_UP_PROC
					END
/******* Added 2005.03.09 Akihisa Urushibara *******/
				END
			END 
		END
		--	ワークテーブルに取り込んだ受付番号、組織ＣＤを元に
		--	一括で手配情報を取り込む
		INSERT INTO W_TEHAI_CSV
		SELECT	WC.IRAI_SOSHIKI_CD
			,	WC.UKETSUKE_NO
			,	WC.SOSHIKI_CD
			,	JS.JISYA_UKETSUKE_NO
			,	JT.TEHAI_SEQ
			,	JK.KOKYAKUMEI
			,	JK.KOKYAKUMEI_KANA
			,	ISNULL(JK.HOJIN_CD,'') AS HOJIN_CD
			,	ISNULL(MH.HOJIN_MEI, '') AS HOJIN_MEI
			,	JT.TEHAI_SHUBETSU_CD
--			,	JT.TEHAI_MEI
			,	CASE JT.TEHAI_SHUBETSU_CD
					WHEN '01' THEN '見積・下見'
					WHEN '02' THEN '資材お届け'
					WHEN '03' THEN '梱包・開梱作業'
--					WHEN '04' THEN ''
					WHEN '05' THEN '他センター'
					WHEN '06' THEN '電気工事関連'
					WHEN '07' THEN 'ピアノ・重量物輸送'
					WHEN '08' THEN '自動車・バイク輸送'
					WHEN '09' THEN 'ﾙｰﾑ･ﾊｳｽｸﾘｰﾆﾝｸﾞ'
					WHEN '10' THEN 'LAN関連'
					WHEN '11' THEN '什器解体組立'
					WHEN '12' THEN '人材派遣'
					WHEN '13' THEN '一時保管'
					WHEN '14' THEN '求車'
					WHEN '15' THEN '資材回収'
					WHEN '99' THEN 'その他手配'
					ELSE ''
				END
			,	ISNULL(JT.SHIIRESAKI_CD, '') AS SHIIRESAKI_CD
			,	''
				/*ISNULL((CASE  
					WHEN JT.TEHAI_SHUBETSU_CD IN ('01','02') THEN MT.SHAIN_MEI
					WHEN JT.TEHAI_SHUBETSU_CD IN ('03','06','07','08','09','10','11','12','13','15') THEN MG.GYOSHA_MEI
					WHEN JT.TEHAI_SHUBETSU_CD IN ('05','14') THEN MS.SOSHIKI_MEI
					ELSE ''
				END) ,'')*/ AS SHIIRESAKI_MEI
			,	''
				/*ISNULL((CASE  
					WHEN JT.TEHAI_SHUBETSU_CD IN ('01','02') THEN MT.JISHA_TANTOSHA_CD
					WHEN JT.TEHAI_SHUBETSU_CD IN ('03','06','07','08','09','10','11','12','13','15') THEN MG.JISHA_GYOSHA_CD
					WHEN JT.TEHAI_SHUBETSU_CD IN ('05','14') THEN ''
					ELSE ''
				END),'')*/ AS JISYA_SHIIRESAKI_CD
			,	ISNULL(JTS1.SAGYO_DT,'') AS SAGYO_DT_FROM
			,	ISNULL(JTS1.SAGYO_TM,'') AS SAGYO_TM_FROM
			,	ISNULL(JTS2.SAGYO_DT,'') AS SAGYO_DT_TO
			,	ISNULL(JTS2.SAGYO_TM,'') AS SAGYO_TM_TO
			,	ISNULL(JT.URIAGE_GK,0)
--2005/03/18 ONO END
--			,	CASE 
--					WHEN JT.TEHAI_SHUBETSU_CD = '05' THEN ISNULL(JR2.RYOKIN_SHOKEI,0) - ISNULL(JRM.URIAGE_GK, 0)
--					WHEN JT.TEHAI_SHUBETSU_CD = '14' THEN ISNULL(JRM.URIAGE_GK, 0)
--					ELSE ISNULL(JT.SIIRE_GK,0)
			,	CASE ISNULL(JT.SIIRE_GK,0)
					WHEN  0  THEN ISNULL(JT.SIIRE_GK,0)
					ELSE (ISNULL(JT.SIIRE_GK,0)  - 
						CASE JT.TEHAI_SHUBETSU_CD
							WHEN '05' THEN ISNULL(JR.RYOKIN_6,0)
							WHEN '14' THEN
								CASE dbo.CHECK_TEHAI_05(WC.UKETSUKE_NO, WC.SOSHIKI_CD, JT.SHIIRESAKI_CD)
									WHEN '0' THEN ISNULL(JR.RYOKIN_6,0)
									ELSE 0
								END
							ELSE 0
						END)
--2005/03/18 ONO END
				END
			,	ISNULL(JT.SIIRE_ZEI_GK,0)
			,	CASE JT.TEHAI_SHUBETSU_CD
					WHEN '05' THEN ISNULL(JR.RYOKIN_6,0)
					WHEN '14' THEN
						CASE dbo.CHECK_TEHAI_05(WC.UKETSUKE_NO, WC.SOSHIKI_CD, JT.SHIIRESAKI_CD)
							WHEN '0' THEN ISNULL(JR.RYOKIN_6,0)
							ELSE 0
						END
					ELSE 0
				END
		FROM	W_TEHAI_CSV_WORK AS WC
				LEFT JOIN T_JUCHU_TEHAI AS JT
					/*
					LEFT JOIN M_GYOSHA AS MG
					ON	JT.SHIIRESAKI_CD = MG.GYOSHA_CD
					AND MG.GYOSHA_KBN = '1'
					AND MG.DELETE_FLG	= '0'
					LEFT JOIN M_SOSHIKI AS MS
					ON	JT.SHIIRESAKI_CD = MS.SOSHIKI_CD
					AND MS.DELETE_FLG	= '0'
					LEFT JOIN M_TANTOSHA AS MT
					ON	JT.SHIIRESAKI_CD = MT.TANTOSHA_CD
					AND MT.DELETE_FLG	= '0'
					*/
					LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS1
					ON	JT.UKETSUKE_NO	= JTS1.UKETSUKE_NO
					AND	JT.SOSHIKI_CD	= JTS1.SOSHIKI_CD
					AND	JT.TEHAI_SEQ	= JTS1.TEHAI_SEQ
					AND	JTS1.GYOMU_KBN	= '1'
					AND JTS1.DELETE_FLG	= '0'
					LEFT JOIN T_JUCHU_TEHAI_SYOSAI AS JTS2
					ON	JT.UKETSUKE_NO	= JTS2.UKETSUKE_NO
					AND	JT.SOSHIKI_CD	= JTS2.SOSHIKI_CD
					AND	JT.TEHAI_SEQ	= JTS2.TEHAI_SEQ
					AND	JTS2.GYOMU_KBN	= '2'
					AND JTS2.DELETE_FLG	= '0'
					LEFT JOIN T_JUCHU_RYOKIN AS JR
					ON	JT.UKETSUKE_NO		= JR.UKETSUKE_NO
					AND	JT.SHIIRESAKI_CD	= JR.SOSHIKI_CD
				ON	WC.UKETSUKE_NO	= JT.UKETSUKE_NO
				AND	WC.SOSHIKI_CD	= JT.SOSHIKI_CD
				LEFT JOIN T_JUCHU_KIHON AS JK
					LEFT JOIN M_HOJIN AS MH
					ON JK.HOJIN_CD	= MH.HOJIN_CD
				ON	WC.UKETSUKE_NO	= JK.UKETSUKE_NO
				LEFT JOIN T_JUCHU_SYOSAI AS JS
				ON	WC.UKETSUKE_NO	= JS.UKETSUKE_NO
				AND	WC.SOSHIKI_CD	= JS.SOSHIKI_CD
				LEFT JOIN T_JUCHU_SYOSAI AS JS2
					LEFT JOIN T_JUCHU_RYOKIN AS JR2
					ON	JR2.UKETSUKE_NO	= JS2.UKETSUKE_NO
					AND	JR2.SOSHIKI_CD	= JS2.SOSHIKI_CD
					LEFT JOIN T_JUCHU_RYOKIN_M AS JRM
					ON	JRM.UKETSUKE_NO	= JS2.UKETSUKE_NO
					AND	JRM.SOSHIKI_CD	= JS2.SOSHIKI_CD
					AND JRM.RYOKIN_KBN	= '8500'
				ON	WC.UKETSUKE_NO	= JS2.UKETSUKE_NO
				AND	WC.SOSHIKI_CD	= JS2.IRAIMOTO_SOSHIKI_CD
				AND JS2.IRAI_SHUBETSU_CD IN ('2','3','4')
				AND JS2.SOSHIKI_CD	= JT.SHIIRESAKI_CD
		WHERE	JT.DELETE_FLG		= '0'				
			AND	JS.DELETE_FLG		= '0'
			AND JK.DELETE_FLG		= '0'
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		-- 依頼先の名称を更新
		UPDATE	W_TEHAI_CSV
		SET		SHIIRESAKI_MEI 		= MG.GYOSHA_RYAKU_MEI
			,	JISYA_SHIIRESAKI_CD	= MG.JISHA_GYOSHA_CD
		FROM	W_TEHAI_CSV AS WC
				LEFT JOIN M_GYOSHA AS MG
				ON	WC.SHIIRESAKI_CD = MG.GYOSHA_CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
				AND MG.GYOSHA_KBN = '1'
/******* Added 2005.03.09 Akihisa Urushibara *******/
--				AND MG.DELETE_FLG	= '0'
		WHERE	WC.TEHAI_SHUBETSU_CD IN ('03','06','07','08','09','10','11','12','13','99')
			AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		UPDATE	W_TEHAI_CSV
		SET		SHIIRESAKI_MEI 		= MT.SHAIN_MEI
			,	JISYA_SHIIRESAKI_CD	= MT.JISHA_TANTOSHA_CD
		FROM	W_TEHAI_CSV AS WC
				LEFT JOIN M_TANTOSHA AS MT
				ON	WC.SHIIRESAKI_CD = MT.TANTOSHA_CD
				AND	WC.SOSHIKI_CD	= MT.SOSHIKI_CD
--				AND MT.DELETE_FLG	= '0'
		WHERE	WC.TEHAI_SHUBETSU_CD IN ('01','02', '15')
			AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		UPDATE	W_TEHAI_CSV
		SET		SHIIRESAKI_MEI 		= MS.SOSHIKI_MEI
		FROM	W_TEHAI_CSV AS WC
				LEFT JOIN M_SOSHIKI AS MS
				ON	WC.SHIIRESAKI_CD = MS.SOSHIKI_CD
--				AND MS.DELETE_FLG	= '0'
		WHERE	WC.TEHAI_SHUBETSU_CD IN ('05','14')
			AND WC.IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		-- レコードを処理済みに
		UPDATE T_JUCHU_CSV
		SET	   CSV_MAKE_FLG     = '1'	
		WHERE  IRAI_SOSHIKI_CD  = @依頼組織CD
		  AND  CSV_TYPE			= '3'		
          AND  DELETE_FLG       = '0'
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		-- WWW側のフラグをクリア
		DELETE T_JUCHU_CSV_STATUS
		WHERE  IRAI_SOSHIKI_CD  = @依頼組織CD
		  AND  CSV_TYPE			= '3'		
          AND  DELETE_FLG       = '0'
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		INSERT INTO T_JUCHU_CSV_STATUS VALUES (@依頼組織CD,'WWW1','3','0','','BATCH','BATCH','0')
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		INSERT INTO T_JUCHU_CSV_STATUS VALUES (@依頼組織CD,'WWW2','3','0','','BATCH','BATCH','0')
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		INSERT INTO T_JUCHU_CSV_STATUS VALUES (@依頼組織CD,'WWW3','3','0','','BATCH','BATCH','0')
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		-- 次の処理レコードへ
		FETCH  NEXT FROM AB0221_CUR00 INTO
			@依頼組織CD,
			@受付番号,
			@顧客名,
			@法人CD,
			@進行状況,
			@見積日FROM,
			@見積日TO,
			@作業日FROM,
			@作業日TO,
			@積卸区分,
			@精算日FROM,
			@精算日TO,
			@受付日FROM,
			@受付日TO,
			@経由CD,
			@取扱区分,
			@下部組織区分
	END
/******* Added 2005.03.09 Akihisa Urushibara *******/
__TIDY_UP_PROC:
	IF @ERROR > 0
	BEGIN
		EXEC RECORD_SP_ERROR 'SP_AB0221', @依頼組織CD, @ERROR
	END
/******* Added 2005.03.09 Akihisa Urushibara *******/
	CLOSE AB0221_CUR00
	DEALLOCATE AB0221_CUR00
END


GO

