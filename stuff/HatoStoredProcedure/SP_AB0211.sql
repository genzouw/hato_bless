USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0211]    Script Date: 07/31/2014 11:42:14 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO



/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/28 12:43:10 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/28 10:46:47 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/24 11:00:08 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/24 9:35:55 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/21 21:17:39 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/21 20:18:54 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/21 20:08:14 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/21 15:02:17 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/21 15:01:07 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/21 14:14:50 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/18 15:26:21 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/17 16:01:57 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/17 15:58:27 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/17 15:57:24 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0211    スクリプト日付 : 2005/02/17 15:33:11 ******/
CREATE                       PROCEDURE [dbo].[SP_AB0211]
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
	DECLARE AB0202_CUR00 CURSOR FOR 
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
			AND	JC.CSV_TYPE		= '2'
			AND	JC.CSV_MAKE_FLG	= '0'
	OPEN AB0202_CUR00
	FETCH  NEXT FROM AB0202_CUR00 INTO
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
		DELETE FROM W_HIKKOSHI_CSV_SHORT WHERE IRAI_SOSHIKI_CD = @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SELECT @組織区分 = SOSHIKI_KBN FROM M_SOSHIKI WHERE SOSHIKI_CD = @依頼組織CD
		-- 受付番号が指定された場合、他の検索条件は無視する
		IF @受付番号 IS NOT NULL	
		BEGIN
			IF @組織区分 = '1' -- 連合会
			BEGIN
				PRINT @組織区分
				IF @下部組織区分 = '0'	-- 下部組織を含まない
				BEGIN
					INSERT INTO W_HIKKOSHI_CSV_SHORT
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
					INSERT INTO W_HIKKOSHI_CSV_SHORT
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
					INSERT INTO W_HIKKOSHI_CSV_SHORT
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
					INSERT INTO W_HIKKOSHI_CSV_SHORT
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
				INSERT INTO W_HIKKOSHI_CSV_SHORT
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
					INSERT INTO W_HIKKOSHI_CSV_SHORT
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
					INSERT INTO W_HIKKOSHI_CSV_SHORT
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
					INSERT INTO W_HIKKOSHI_CSV_SHORT
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
					INSERT INTO W_HIKKOSHI_CSV_SHORT
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
				INSERT INTO W_HIKKOSHI_CSV_SHORT
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
				DELETE W_HIKKOSHI_CSV_SHORT 
				FROM W_HIKKOSHI_CSV_SHORT AS WC
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
				DELETE W_HIKKOSHI_CSV_SHORT 
				FROM W_HIKKOSHI_CSV_SHORT AS WC
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
				DELETE W_HIKKOSHI_CSV_SHORT 
				FROM W_HIKKOSHI_CSV_SHORT AS WC
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
				DELETE W_HIKKOSHI_CSV_SHORT 
				FROM W_HIKKOSHI_CSV_SHORT AS WC
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
				DELETE W_HIKKOSHI_CSV_SHORT 
				FROM W_HIKKOSHI_CSV_SHORT AS WC
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
				DELETE W_HIKKOSHI_CSV_SHORT 
				FROM W_HIKKOSHI_CSV_SHORT AS WC
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
				DELETE W_HIKKOSHI_CSV_SHORT 
				FROM W_HIKKOSHI_CSV_SHORT AS WC
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
				DELETE W_HIKKOSHI_CSV_SHORT 
				FROM W_HIKKOSHI_CSV_SHORT AS WC
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
					DELETE W_HIKKOSHI_CSV_SHORT 
					FROM W_HIKKOSHI_CSV_SHORT AS WC
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
					DELETE W_HIKKOSHI_CSV_SHORT 
					FROM W_HIKKOSHI_CSV_SHORT AS WC
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
/******** Modified 2005.03.09 Akihisa Urushibara *******/
--		EXEC SP_AB0212 @依頼組織CD	-- 受注基本、受注詳細
--		EXEC SP_AB0213 @依頼組織CD	-- 業務情報
--		EXEC SP_AB0214 @依頼組織CD	-- 料金明細

		EXEC SP_AB0212 @依頼組織CD, @ERROR OUTPUT	-- 受注基本、受注詳細
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END

		EXEC SP_AB0213 @依頼組織CD, @ERROR OUTPUT	-- 業務情報
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END

		EXEC SP_AB0214 @依頼組織CD, @ERROR OUTPUT	-- 料金明細
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******** Modified 2005.03.09 Akihisa Urushibara *******/
		-- レコードを処理済みに
		UPDATE T_JUCHU_CSV
		SET	   CSV_MAKE_FLG     = '1'	
		WHERE  IRAI_SOSHIKI_CD  = @依頼組織CD
		  AND  CSV_TYPE			= '2'		
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
		  AND  CSV_TYPE			= '2'		
          AND  DELETE_FLG       = '0'
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		INSERT INTO T_JUCHU_CSV_STATUS VALUES (@依頼組織CD,'WWW1','2','0','','BATCH','BATCH','0')
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		INSERT INTO T_JUCHU_CSV_STATUS VALUES (@依頼組織CD,'WWW2','2','0','','BATCH','BATCH','0')
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		INSERT INTO T_JUCHU_CSV_STATUS VALUES (@依頼組織CD,'WWW3','2','0','','BATCH','BATCH','0')
/******* Added 2005.03.09 Akihisa Urushibara *******/
		SET @ERROR = @@ERROR
		IF @ERROR > 0
		BEGIN
			GOTO __TIDY_UP_PROC
		END
/******* Added 2005.03.09 Akihisa Urushibara *******/
		-- 次の処理レコードへ
		FETCH  NEXT FROM AB0202_CUR00 INTO
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
		EXEC RECORD_SP_ERROR 'SP_AB0211', @依頼組織CD, @ERROR
	END
/******* Added 2005.03.09 Akihisa Urushibara *******/
	CLOSE AB0202_CUR00
	DEALLOCATE AB0202_CUR00
END



GO

