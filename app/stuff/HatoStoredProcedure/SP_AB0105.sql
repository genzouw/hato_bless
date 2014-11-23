USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0105]    Script Date: 07/31/2014 11:39:14 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


--精算受注データ(支払側賦課金)の作成
CREATE    PROCEDURE [dbo].[SP_AB0105](
  @iMode INT
)
AS
DECLARE
  -- ========== Str 2012/01/30 SYS_Ohki ==========
  -- 小数点桁数追加対応
  -- @債務保証賦課率    decimal(5,2),
  @債務保証賦課率    decimal(6,3),
  -- ========== End 2012/01/30 SYS_Ohki ==========
  @精算年月          char(6),
  @精算元組織コード  char(5),
  @精算先組織コード  char(5),
  @受付番号          char(8),
  @請求支払区分      char(1),
  @センターＣＤ      char(5),
  @受付日            char(8),
  @取扱区分ＣＤ      char(2),
  @法人ＣＤ          char(9),
  @法人担当者名      varchar(20),
  @経由ＣＤ          char(2),
  @請求先区分ＣＤ    char(1),
  @顧客名            varchar(16),
  @請求金額          decimal(10),
  @請求内税金額      decimal(10),
  @立替金額          decimal(10),
  @消費税区分        char(1),
  @消費税            decimal(10),
  @受注日            char(8),
  @精算日            char(8),
  @卸日              char(8),
  @受注更新日        char(17),
  @受注担当者ＣＤ    char(10),
  @請求金額区分      char(1),
  @更新日時          char(17),
  @更新者ID          char(10),
  @画面ID            char(6),
  @削除ﾌﾗｸﾞ          char(1),
  @依頼先組織ＣＤ    char(5),
  @依頼元組織ＣＤ    char(5),
  @組織コード        char(5),
  @金額              decimal(10),
  @組織区分          char(1),
  @組織区分1         char(1),
  @連合会            char(5),
  @ZEI_KBN           char(1),
  @賦課金            decimal(10),
  @請求内税税抜額    decimal(10),
  @LOG_MSG           varchar(200),
  @PRC_NM            varchar(50),
  @消費税区分１      char(1),
  @請求金額２         decimal(10), --売値を取得するための変数 20050716 MIYAJIMA ADD
  @対象金額１          decimal(10), --仕入値合計を取得するための変数 20050716 MIYAJIMA ADD
  @依頼元元組織ＣＤ    char(5),
  @決済手段		char(1),
  @ERR               int
--
,  @登録件数          int
  --========== Str 2014/02/12 Ins SYS_Ohki ==========
  ,@債務保証賦課率センタ用    decimal(6,3)
  --========== End 2014/02/12 Ins SYS_Ohki ==========
  
BEGIN

  SELECT @精算年月 = SEISAN_TUKI_JUCHU,
         @債務保証賦課率 = SAIMU_FUKA_RITU,
         
         --========== Str 2014/02/12 Ins SYS_Ohki ==========
         @債務保証賦課率センタ用 = SAIMU_FUKA_RITU_CENTER,
         --========== End 2014/02/12 Ins SYS_Ohki ==========
         
         @ZEI_KBN = SAIMU_FUKA_ZEI_KBN
    FROM M_SEISAN_KANRI

  --連合会CD取得
  SELECT @連合会 = SOSHIKI_CD
    FROM M_SOSHIKI
    WHERE SOSHIKI_KBN = '1'

  SELECT @更新日時 = REPLACE(REPLACE(CONVERT(CHAR(19),GETDATE(),120),'-',''),':','')
  SELECT @更新者ID = 'BATCH'
  SELECT @画面ID = 'AB0105'
  SELECT @削除ﾌﾗｸﾞ = '0'
  SELECT @ERR = @@ERROR
  IF @ERR <> 0 GOTO ERROR_HANDLER

  /***************************************/
  --通常取引データを作成する
  /***************************************/
  SET @PRC_NM = '支払側賦課金データ作成'

  DECLARE  AB0105_CUR00  CURSOR  FOR
    SELECT  TS.IRAIMOTO_SOSHIKI_CD AS IRAIMOTO_SOSHIKI_CD,
            TK.UKETSUKE_NO         AS UKETSUKE_NO,
            TK.UKETSUKE_DT         AS UKETSUKE_DT,
            TK.TORIATSUKAI_KBN     AS TORIATSUKAI_KBN,
            TK.HOJIN_CD            AS HOJIN_CD,
            TK.HOJIN_TNT_MEI       AS HOJIN_TNT_MEI,
            TS1.JUCHU_KEIYU_CD      AS JUCHU_KEIYU_CD,
            TK.KOKYAKU_SEIKYU_KBN  AS KOKYAKU_SEIKYU_KBN,
            TK.KOKYAKUMEI          AS KOKYAKUMEI,
	  --2005/07/21 Add Miyajima 	依頼先の仕入値合計を集計するために追加
            --2005/07/21 mod Miyajima 立替金は対象額としない
	  -- SUM(TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN + TR.RYOKIN_6) AS TAISHO_GK, 
	  SUM(TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN) AS TAISHO_GK, 
           --SUM(ROUND(TR.RYOKIN_KEI * @債務保証賦課率 / 100,0))
            --2004/10/25 Update Hoshi 税抜き金額を対象に
            --2004/11/05 Update Hoshi 自社売上が対象なのでSUM->MAXに変更
	  --2005/07/21 Update Miyajima 依頼先の仕入値合計を対象なのでMAX->SUMに変更
            --                                          立替金は対象額から除く
            --SUM(ROUND((TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN + TR.RYOKIN_6) * @債務保証賦課率 / 100,0))
            --                       AS KINGAKU,
            
            
            -- ========== Str 2014/02/12 UPD SYS_Ohki ==========
            -- ROUND((SUM(TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN)) * @債務保証賦課率 / 100,0)
            --                        AS KINGAKU,
            ----------------------------------------------------------------------------------------------
            -- 依頼元の組織区分が
            -- 3:センター       ⇒ @債務保証賦課率センタ用を使用
            -- 3:センター以外   ⇒ @債務保証賦課率を使用
            -- FETCH項目：@賦課金
            -- ※注意 組織区分はTS.IRAIMOTO_SOSHIKI_CDの組織区分で判定
            ----------------------------------------------------------------------------------------------
            CASE WHEN MS1.SOSHIKI_KBN = '3' -- 組織区分：センター
            	THEN 	ROUND((SUM(TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN)) * @債務保証賦課率センタ用 / 100,0)
            	ELSE	ROUND((SUM(TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN)) * @債務保証賦課率         / 100,0)
            END                    AS KINGAKU,
            -- ========== END 2014/02/12 UPD SYS_Ohki ==========
            
            
            TS1.JYUCHU_DT           AS JYUCHU_DT,
            TK.SEISAN_DT           AS SEISAN_DT,
            TG.SAGYO_DT            AS SAGYO_DT,
            REPLACE(REPLACE(CONVERT(CHAR(19),CONVERT(DATETIME,'20'+REPLACE(TS1.UPDATE_DT,'/','-'),120),120),'-',''),':','') AS UPDATE_DT,
            TS1.UKETSUKE_TANTO_CD  AS UKETSUKE_TANTO_CD,
            MS.SOSHIKI_KBN,
            MS1.SOSHIKI_KBN,
            TR.SHOHIZEI_KBN,
            TS1.IRAIMOTO_SOSHIKI_CD, --2005/07/21 ADD
            TK.KESSAI_KBN
      FROM  T_JUCHU_SYOSAI AS TS
            INNER JOIN T_JUCHU_KIHON  AS TK
              ON (TS.UKETSUKE_NO = TK.UKETSUKE_NO)
            INNER JOIN T_JUCHU_SYOSAI  AS TS1
              ON (TS.UKETSUKE_NO = TS1.UKETSUKE_NO
              AND TS.IRAIMOTO_SOSHIKI_CD = TS1.SOSHIKI_CD)
            INNER JOIN T_JUCHU_RYOKIN AS TR
              ON (TS.UKETSUKE_NO = TR.UKETSUKE_NO
            AND TS.SOSHIKI_CD = TR.SOSHIKI_CD)
--              AND TS.IRAIMOTO_SOSHIKI_CD = TR.SOSHIKI_CD) --2005/07/16 Update Miyajima
            LEFT JOIN W_JUCHU_SEISAN AS TG
              ON (TS.UKETSUKE_NO = TG.UKETSUKE_NO)
            INNER JOIN M_SOSHIKI MS
              ON (TS.SOSHIKI_CD  = MS.SOSHIKI_CD)
            INNER JOIN M_SOSHIKI MS1
              ON (TS.IRAIMOTO_SOSHIKI_CD = MS1.SOSHIKI_CD)
      WHERE TS.SEISAN_MAKE_FLG      = '0'
      AND   TS.DELETE_FLG           = '0'
      AND   TS.IRAIMOTO_SOSHIKI_CD IS NOT NULL
      AND ((TK.KESSAI_KBN          != '2')
       OR  (TK.KESSAI_KBN           = '2'
        --AND TS1.IRAI_SHUBETSU_CD     IN ('2','3','4'))) 2005/07/21 クレジットの場合、最終全依頼先の取扱手数料は徴収しない
        AND TS.IRAI_SHUBETSU_CD     IN ('2','3','4')))
      AND   TK.DELETE_FLG           = '0'
      AND   TK.JUCHU_STS_CD         = '05'
      AND   TK.SEISAN_DT         LIKE @精算年月 + '%'
      AND   TR.DELETE_FLG = '0' --20050722 MIYAJIMA ADD
      GROUP BY
            TS.IRAIMOTO_SOSHIKI_CD ,
            TK.UKETSUKE_NO         ,
            TK.UKETSUKE_DT         ,
            TK.TORIATSUKAI_KBN     ,
            TK.HOJIN_CD            ,
            TK.HOJIN_TNT_MEI       ,
            TS1.JUCHU_KEIYU_CD      ,
            TK.KOKYAKU_SEIKYU_KBN  ,
            TK.KOKYAKUMEI          ,
            TS1.JYUCHU_DT           ,
            TK.SEISAN_DT           ,
            TG.SAGYO_DT            ,
            TS1.UPDATE_DT          ,
            TS1.UKETSUKE_TANTO_CD  ,
            MS.SOSHIKI_KBN         ,
            MS1.SOSHIKI_KBN        ,
            TR.SHOHIZEI_KBN        ,
	  TS1.IRAIMOTO_SOSHIKI_CD, --2005/07/21 Miyajima Add
            TK.KESSAI_KBN --2005/07/21 Miyajima Add
            
            
	--  ｶｰｿﾙOPEN
	OPEN  AB0105_CUR00
	FETCH  NEXT FROM AB0105_CUR00 INTO
	@依頼元組織ＣＤ,
	@受付番号,
	@受付日,
	@取扱区分ＣＤ,
	@法人ＣＤ,
	@法人担当者名,
	@経由ＣＤ,
	@請求先区分ＣＤ,
	@顧客名,
	@対象金額１,
	@賦課金,
	@受注日,
	@精算日,
	@卸日,
	@受注更新日,
	@受注担当者ＣＤ,
	@組織区分,
	@組織区分1,
	@消費税区分１,
	@依頼元元組織ＣＤ,
	@決済手段
	
	
	WHILE (@@FETCH_STATUS = 0) BEGIN
		
		SET @センターＣＤ = @依頼元組織ＣＤ
		
		IF @組織区分 <> '1' AND @組織区分1 <> '1' BEGIN
			
			
			--全依頼分精算受注データ（賦課金）を作成する。（請求）--------------------------------------------------------
			--３）（賦課金:請求） 連合会　→　依頼元
			--依頼先への仕入値を集計し、システム取扱手数料データを作成する。（請求） 2005/07/21 miyajima mod
			SET @精算元組織コード = @連合会
			SET @精算先組織コード = @依頼元組織ＣＤ
			SET @請求支払区分 = '1'					--１：請求、２：支払
			SET @請求金額区分 = '2'					--１：通常、２：賦課金
			
			
			IF @ZEI_KBN = '1' BEGIN
				
				--１：非課税
				SET @請求金額 = @賦課金
				SET @請求内税税抜額 = 0
				SET @消費税 =  0
				SET @消費税区分 = '1'				--１：非課税、２：内税、３：外税
				
			END ELSE BEGIN
				
				IF @ZEI_KBN = '2' BEGIN
					
					--内税
					SET @請求金額 = 0
					SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@賦課金,dbo.GET_TAX_RT(@精算日)) 
					SET @消費税 = @賦課金 - @請求内税税抜額	--消費税＝税込金額－税抜金額
					SET @消費税区分 = '2'				--１：非課税、２：内税、３：外税
					
				END ELSE BEGIN
					
					--３：外税
					SET @請求金額 = @賦課金
					SET @請求内税税抜額 = 0
					SET @消費税 =   ROUND(@賦課金 * dbo.GET_TAX_RT(@精算日) / 100,0)
					SET @消費税区分 = '3'				--１：非課税、２：内税、３：外税
					
				END
				
			END
			
			
			
			-- >>>> 2004/11/04 Add Hoshi
			-- >>>> SP_AB0103で精算受注データが生成済の場合、処理をスキップする
			-- >>>> 2005/07/21 SP_AB0103で既に依頼先組織として売値分で作成されているものを検索し、
			--                           該当する場合には中間組織のため「売値 - 仕入値合計」を対象金額とする
			
			SELECT *
			FROM T_SEISAN_JUCHU
			WHERE SEIKYU_YM = @精算年月
			AND MOTO_SOSHIKI_CD = @精算元組織コード
			AND SAKI_SOSHIKI_CD = @精算先組織コード
			AND UKETSUKE_NO = @受付番号
			AND SEIKYU_SIHARAI_CD = @請求支払区分
			AND SEIKYU_GK_KBN = @請求金額区分
			
			
			IF (@@ROWCOUNT <> 0) BEGIN
				
				
				-- >>>> 2005/07/21 Add Miyajima
				-- >>>> SP_AB0103で既に作成されている売値分の金額を抽出（立替金は含まない）
				SELECT  
					@請求金額２ = (TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN)
				FROM  T_JUCHU_SYOSAI AS TS
				    INNER JOIN T_JUCHU_KIHON  AS TK
				      ON (TS.UKETSUKE_NO = TK.UKETSUKE_NO)
				    INNER JOIN T_JUCHU_RYOKIN AS TR
				      ON (TS.UKETSUKE_NO = TR.UKETSUKE_NO
				      AND TS.SOSHIKI_CD  = TR.SOSHIKI_CD)
				    LEFT JOIN W_JUCHU_SEISAN AS TG
				      ON (TS.UKETSUKE_NO = TG.UKETSUKE_NO)
				    INNER JOIN M_SOSHIKI MS
				      ON (TS.SOSHIKI_CD  = MS.SOSHIKI_CD)
				    INNER JOIN M_SOSHIKI MS1
				      ON (TS.IRAIMOTO_SOSHIKI_CD = MS1.SOSHIKI_CD)
				WHERE TS.SEISAN_MAKE_FLG      = '0'
				AND   TS.DELETE_FLG           = '0'
				AND   TS.IRAIMOTO_SOSHIKI_CD IS NOT NULL
				AND ((TK.KESSAI_KBN          != '2')
				OR  (TK.KESSAI_KBN           = '2'
				 AND TS.IRAI_SHUBETSU_CD     IN ('2', '3' ,'4')))
				AND   TK.DELETE_FLG           = '0'
				AND   TK.JUCHU_STS_CD         = '05'
				AND   TK.SEISAN_DT         LIKE @精算年月 + '%'
				AND   TK.UKETSUKE_NO = @受付番号
				AND   TS.SOSHIKI_CD = @精算先組織コード
				AND   TR.DELETE_FLG = '0' --20050722 MIYAJIMA ADD
				
				-- >>>> 「売値-仕入値合計」がマイナスになる場合には\0として扱う
				IF (@請求金額２ - @対象金額１) < 0 BEGIN
					SET @賦課金 = 0
				END ELSE BEGIN
					
					-- >>>> 中間階層の場合には「売値 - 仕入合計金額」を対象額として取扱手数料を計算
					
					-- ========== Str 2014/02/12 UPD SYS_Ohki ==========
					-- SET @賦課金 = ROUND((@請求金額２ - @対象金額１)  * @債務保証賦課率 / 100,0)
					-------------------------------------------------------
					-- 組織区分がセンターの場合はセンター用の利率を使用する
					-------------------------------------------------------
					IF @組織区分1 = '3' BEGIN
						SET @賦課金 = ROUND((@請求金額２ - @対象金額１)  * @債務保証賦課率センタ用 / 100,0)
					END ELSE BEGIN
						SET @賦課金 = ROUND((@請求金額２ - @対象金額１)  * @債務保証賦課率 / 100,0)
					END
					-- ========== End 2014/02/12 UPD SYS_Ohki ==========
					
					
				END
				
				
				IF @ZEI_KBN = '1' BEGIN
					
					--１：非課税
					SET @請求金額 = @賦課金
					SET @請求内税税抜額 = 0
					SET @消費税 =  0
					SET @消費税区分 = '1'				--１：非課税、２：内税、３：外税
					
				END ELSE BEGIN
					
					IF @ZEI_KBN = '2' BEGIN
						
						--内税
						SET @請求金額 = 0
						SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@賦課金,dbo.GET_TAX_RT(@精算日)) 
						SET @消費税 = @賦課金 - @請求内税税抜額	--消費税＝税込金額－税抜金額  
						SET @消費税区分 = '2'				--１：非課税、２：内税、３：外税
						
					END ELSE BEGIN
						
						--３：外税
						SET @請求金額 = @賦課金
						SET @請求内税税抜額 = 0
						SET @消費税 =   ROUND(@賦課金 * dbo.GET_TAX_RT(@精算日) / 100,0)
						SET @消費税区分 = '3'				--１：非課税、２：内税、３：外税
						
					END
					
				END
				
				
				-- >>>> 中間階層の場合にはSP_AB0103で既に作成されている賦課金を正しくUpdateする（請求分）
				UPDATE T_SEISAN_JUCHU SET 
					SEIKYU_GK = @請求金額,
					SEIKYU_UTIZEI_GK = @請求内税税抜額,
					TATEKAE_GK =  0,
					SHOHIZEI_KBN = @消費税区分,
					SHOHIZEI_GK = @消費税,
					UPDATE_DT = @更新日時,
					UPDATE_TNT_ID = @更新者ID,
					GAMEN_ID = @画面ID,
					DELETE_FLG = @削除ﾌﾗｸﾞ
				WHERE SEIKYU_YM = @精算年月
				AND MOTO_SOSHIKI_CD = @精算元組織コード
				AND SAKI_SOSHIKI_CD = @精算先組織コード
				AND UKETSUKE_NO = @受付番号
				AND SEIKYU_SIHARAI_CD = @請求支払区分
				AND SEIKYU_GK_KBN = @請求金額区分
				
				
				SELECT @ERR = @@ERROR
				IF @ERR <> 0 GOTO ERROR_HANDLER
				
				
				--依頼先への仕入値を集計し、システム取扱手数料データを作成する。（支払） 2005/07/16 miyajima mod
				 -- >>>> 中間階層の場合にはSP_AB0103で既に作成されている賦課金を正しくUpdateする（支払分）
				SET @精算元組織コード = @依頼元組織ＣＤ
				SET @精算先組織コード = @連合会
				SET @請求支払区分 = '2'				--１：請求、２：支払
				
				
				UPDATE T_SEISAN_JUCHU SET 
					SEIKYU_GK = @請求金額,
					SEIKYU_UTIZEI_GK = @請求内税税抜額,
					TATEKAE_GK =  0,
					SHOHIZEI_KBN = @消費税区分,
					SHOHIZEI_GK = @消費税,
					UPDATE_DT = @更新日時,
					UPDATE_TNT_ID = @更新者ID,
					GAMEN_ID = @画面ID,
					DELETE_FLG = @削除ﾌﾗｸﾞ
				WHERE SEIKYU_YM = @精算年月
				AND MOTO_SOSHIKI_CD = @精算元組織コード
				AND SAKI_SOSHIKI_CD = @精算先組織コード
				AND UKETSUKE_NO = @受付番号
				AND SEIKYU_SIHARAI_CD = @請求支払区分
				AND SEIKYU_GK_KBN = @請求金額区分
				
				
				SELECT @ERR = @@ERROR
				IF @ERR <> 0 GOTO ERROR_HANDLER
				
				
			END ELSE BEGIN
				
				
				-- 中間組織で、決済区分がカードの場合の追加処理 2005/07/21 miyajima add
				IF @@ROWCOUNT = 0 AND @依頼元元組織ＣＤ IS NOT NULL AND @決済手段 = '2' BEGIN
					
					SET @請求金額２ = 0
					SELECT
						@請求金額２ = (TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN)
					FROM  T_JUCHU_SYOSAI AS TS
					INNER JOIN T_JUCHU_KIHON  AS TK
					  ON (TS.UKETSUKE_NO = TK.UKETSUKE_NO)
					INNER JOIN T_JUCHU_RYOKIN AS TR
					  ON (TS.UKETSUKE_NO = TR.UKETSUKE_NO
					  AND TS.SOSHIKI_CD  = TR.SOSHIKI_CD)
					LEFT JOIN W_JUCHU_SEISAN AS TG
					  ON (TS.UKETSUKE_NO = TG.UKETSUKE_NO)
					INNER JOIN M_SOSHIKI MS
					  ON (TS.SOSHIKI_CD  = MS.SOSHIKI_CD)
					INNER JOIN M_SOSHIKI MS1
					  ON (TS.IRAIMOTO_SOSHIKI_CD = MS1.SOSHIKI_CD)
					WHERE TS.SEISAN_MAKE_FLG      = '0'
					AND   TS.DELETE_FLG           = '0'
					AND   TS.IRAIMOTO_SOSHIKI_CD IS NOT NULL
					--	AND ((TK.KESSAI_KBN          != '2')
					--	OR  (TK.KESSAI_KBN           = '2'
					--	AND TS.IRAI_SHUBETSU_CD     IN ('2', '3' ,'4')))
					AND   TK.DELETE_FLG           = '0'
					AND   TK.JUCHU_STS_CD         = '05'
					AND   TK.SEISAN_DT         LIKE @精算年月 + '%'
					AND   TK.UKETSUKE_NO = @受付番号
					AND   TS.SOSHIKI_CD = @精算先組織コード
					AND   TR.DELETE_FLG = '0' --20050722 MIYAJIMA ADD
					
					IF @請求金額２ = NULL BEGIN
						SET @請求金額２ = 0
					END
					
					IF (@請求金額２ - @対象金額１) < 0 BEGIN
						
						SET @賦課金 = 0
						
					END ELSE BEGIN
						
						
						-- >>>> 中間階層の場合には「売値 - 仕入合計金額」を対象額として取扱手数料を計算
						-- ========== Str 2014/02/12 UPD SYS_Ohki ==========
						-- SET @賦課金 = ROUND((@請求金額２ - @対象金額１)  * @債務保証賦課率 / 100,0)
						-------------------------------------------------------
						-- 組織区分がセンターの場合はセンター用の利率を使用する
						-------------------------------------------------------
						IF @組織区分1 = '3' BEGIN
							SET @賦課金 = ROUND((@請求金額２ - @対象金額１)  * @債務保証賦課率センタ用 / 100,0)
						END ELSE BEGIN
							SET @賦課金 = ROUND((@請求金額２ - @対象金額１)  * @債務保証賦課率 / 100,0)
						END
						-- ========== End 2014/02/12 UPD SYS_Ohki ==========
						
						
					END
					
					
					IF @ZEI_KBN = '1' BEGIN
						
						--１：非課税
						SET @請求金額 = @賦課金
						SET @請求内税税抜額 = 0
						SET @消費税 =  0
						SET @消費税区分 = '1'				--１：非課税、２：内税、３：外税
						
					END ELSE BEGIN
						
						IF @ZEI_KBN = '2' BEGIN
							
							--内税
							SET @請求金額 = 0
							SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@賦課金,dbo.GET_TAX_RT(@精算日)) 
							SET @消費税 = @賦課金 - @請求内税税抜額	--消費税＝税込金額－税抜金額  
							SET @消費税区分 = '2'				--１：非課税、２：内税、３：外税
							
						END ELSE BEGIN
							
							--３：外税
							SET @請求金額 = @賦課金
							SET @請求内税税抜額 = 0
							SET @消費税 =   ROUND(@賦課金 * dbo.GET_TAX_RT(@精算日) / 100,0)
							SET @消費税区分 = '3'				--１：非課税、２：内税、３：外税
							
						END
						
					END
					
					
				END
				
				
				-- 中間組織で、自社売値を登録していない場合の追加処理  2005/07/21 miyajima add
				IF @@ROWCOUNT = 0 AND @依頼元元組織ＣＤ IS NOT NULL AND @決済手段 <> '2' BEGIN
					
					SET @請求金額２ = 0
					
					SELECT
					@請求金額２ = (TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN)
					FROM  T_JUCHU_SYOSAI AS TS
					    INNER JOIN T_JUCHU_KIHON  AS TK
					      ON (TS.UKETSUKE_NO = TK.UKETSUKE_NO)
					    INNER JOIN T_JUCHU_RYOKIN AS TR
					      ON (TS.UKETSUKE_NO = TR.UKETSUKE_NO
					      AND TS.SOSHIKI_CD  = TR.SOSHIKI_CD)
					    LEFT JOIN W_JUCHU_SEISAN AS TG
					      ON (TS.UKETSUKE_NO = TG.UKETSUKE_NO)
					    INNER JOIN M_SOSHIKI MS
					      ON (TS.SOSHIKI_CD  = MS.SOSHIKI_CD)
					    INNER JOIN M_SOSHIKI MS1
					      ON (TS.IRAIMOTO_SOSHIKI_CD = MS1.SOSHIKI_CD)
					WHERE TS.SEISAN_MAKE_FLG      = '0'
					AND   TS.DELETE_FLG           = '0'
					AND   TS.IRAIMOTO_SOSHIKI_CD IS NOT NULL
					AND ((TK.KESSAI_KBN          != '2')
					OR  (TK.KESSAI_KBN           = '2'
					 AND TS.IRAI_SHUBETSU_CD     IN ('2', '3' ,'4')))
					AND   TK.DELETE_FLG           = '0'
					AND   TK.JUCHU_STS_CD         = '05'
					AND   TK.SEISAN_DT         LIKE @精算年月 + '%'
					AND   TK.UKETSUKE_NO = @受付番号
					AND   TS.SOSHIKI_CD = @精算先組織コード
					AND   TR.DELETE_FLG = '0' --20050722 MIYAJIMA ADD
					
					IF @請求金額２ = NULL BEGIN
						SET @請求金額２ = 0
					END
					IF (@請求金額２ - @対象金額１) < 0 BEGIN
						--１：非課税
						SET @賦課金 = 0
					END ELSE BEGIN
						
						-- >>>> 中間階層の場合には「売値 - 仕入合計金額」を対象額として取扱手数料を計算
						-- ========== Str 2014/02/12 UPD SYS_Ohki ==========
						-- SET @賦課金 = ROUND((@請求金額２ - @対象金額１)  * @債務保証賦課率 / 100,0)
						-------------------------------------------------------
						-- 組織区分がセンターの場合はセンター用の利率を使用する
						-------------------------------------------------------
						IF @組織区分1 = '3' BEGIN
							SET @賦課金 = ROUND((@請求金額２ - @対象金額１)  * @債務保証賦課率センタ用 / 100,0)
						END ELSE BEGIN
							SET @賦課金 = ROUND((@請求金額２ - @対象金額１)  * @債務保証賦課率 / 100,0)
						END
						-- ========== End 2014/02/12 UPD SYS_Ohki ==========
						
					END
					
					IF @ZEI_KBN = '1'  BEGIN
						
						--１：非課税
						SET @請求金額 = @賦課金
						SET @請求内税税抜額 = 0
						SET @消費税 =  0
						SET @消費税区分 = '1'				--１：非課税、２：内税、３：外税
						
					END ELSE BEGIN
						
						IF @ZEI_KBN = '2' BEGIN
							
							--内税
							SET @請求金額 = 0
							SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@賦課金,dbo.GET_TAX_RT(@精算日)) 
							SET @消費税 = @賦課金 - @請求内税税抜額	--消費税＝税込金額－税抜金額  
							SET @消費税区分 = '2'				--１：非課税、２：内税、３：外税
							
						END ELSE BEGIN
							
							--３：外税
							SET @請求金額 = @賦課金
							SET @請求内税税抜額 = 0
							SET @消費税 =   ROUND(@賦課金 * dbo.GET_TAX_RT(@精算日) / 100,0)
							SET @消費税区分 = '3'				--１：非課税、２：内税、３：外税
							
						END
						
					END
					
				END
				
				
				-- >>>> 元請箇所の場合には、依頼先への支払金を対象金額として取扱手数料データをInsert（請求分）
				-- >>>> 中間組織でカード決済、自社売値未登録場合も取扱手数料データをInsert（請求分）
				INSERT INTO T_SEISAN_JUCHU (
				SEIKYU_YM,
				MOTO_SOSHIKI_CD,
				SAKI_SOSHIKI_CD,
				UKETSUKE_NO,
				SEIKYU_SIHARAI_CD,
				CENTER_CD,
				UKETSUKE_DT,
				TORIATSUKAI_KBN,
				HOJIN_CD,
				HOJIN_TNT_MEI,
				JUCHU_KEIYU_CD,
				KOKYAKU_SEIKYU_KBN,
				KOKYAKUMEI,
				SEIKYU_GK,
				SEIKYU_UTIZEI_GK,
				TATEKAE_GK,
				SHOHIZEI_KBN,
				SHOHIZEI_GK,
				JUCHU_DT,
				SEIKYU_DT,
				OROSHI_DT,
				JUCHU_UPDATE,
				JUCHU_TNT_CD,
				SEIKYU_GK_KBN,
				UPDATE_DT,
				UPDATE_TNT_ID,
				GAMEN_ID,
				DELETE_FLG
				)
				VALUES(
				@精算年月,   
				@精算元組織コード,
				@精算先組織コード,
				@受付番号,
				@請求支払区分,
				@センターＣＤ,
				@受付日,
				@取扱区分ＣＤ,
				@法人ＣＤ,
				@法人担当者名,
				@経由ＣＤ,
				@請求先区分ＣＤ,
				@顧客名,
				@請求金額,
				@請求内税税抜額,
				0,
				@消費税区分,
				@消費税,
				@受注日,
				@精算日,
				@卸日,
				@受注更新日,
				@受注担当者ＣＤ,
				@請求金額区分,
				@更新日時,
				@更新者ID,
				@画面ID,
				@削除ﾌﾗｸﾞ
				)
				SELECT @ERR = @@ERROR
				IF @ERR <> 0 GOTO ERROR_HANDLER
				
				
				--全依頼分精算受注データ（賦課金）を作成する。（支払）--------------------------------------------------------
				--４）（賦課金：支払）依頼元　→　連合会
				
				-- >>>> 元請箇所の場合には、依頼先への支払金を対象金額として取扱手数料データをInsert（支払分）
				-- >>>> 中間組織でカード決済、自社売値未登録場合も取扱手数料データをInsert（支払分）
				SET @精算元組織コード = @依頼元組織ＣＤ
				SET @精算先組織コード = @連合会
				SET @請求支払区分 = '2'				--１：請求、２：支払
				
				INSERT INTO T_SEISAN_JUCHU (
				SEIKYU_YM,
				MOTO_SOSHIKI_CD,
				SAKI_SOSHIKI_CD,
				UKETSUKE_NO,
				SEIKYU_SIHARAI_CD,
				CENTER_CD,
				UKETSUKE_DT,
				TORIATSUKAI_KBN,
				HOJIN_CD,
				HOJIN_TNT_MEI,
				JUCHU_KEIYU_CD,
				KOKYAKU_SEIKYU_KBN,
				KOKYAKUMEI,
				SEIKYU_GK,
				SEIKYU_UTIZEI_GK,
				TATEKAE_GK,
				SHOHIZEI_KBN,
				SHOHIZEI_GK,
				JUCHU_DT,
				SEIKYU_DT,
				OROSHI_DT,
				JUCHU_UPDATE,
				JUCHU_TNT_CD,
				SEIKYU_GK_KBN,
				UPDATE_DT,
				UPDATE_TNT_ID,
				GAMEN_ID,
				DELETE_FLG
				)
				VALUES(
				@精算年月,   
				@精算元組織コード,
				@精算先組織コード,
				@受付番号,
				@請求支払区分,
				@センターＣＤ,
				@受付日,
				@取扱区分ＣＤ,
				@法人ＣＤ,
				@法人担当者名,
				@経由ＣＤ,
				@請求先区分ＣＤ,
				@顧客名,
				@請求金額,
				@請求内税税抜額,
				0,
				@消費税区分,
				@消費税,
				@受注日,
				@精算日,
				@卸日,
				@受注更新日,
				@受注担当者ＣＤ,
				@請求金額区分,
				@更新日時,
				@更新者ID,
				@画面ID,
				@削除ﾌﾗｸﾞ
				)
				SELECT @ERR = @@ERROR
				IF @ERR <> 0 GOTO ERROR_HANDLER
				
				
			END
			
			
		END
		
		
NEXT_READ:
		
		FETCH  NEXT FROM AB0105_CUR00 INTO
			@依頼元組織ＣＤ,
			@受付番号,
			@受付日,
			@取扱区分ＣＤ,
			@法人ＣＤ,
			@法人担当者名,
			@経由ＣＤ,
			@請求先区分ＣＤ,
			@顧客名,
			@対象金額１,
			@賦課金,
			@受注日,
			@精算日,
			@卸日,
			@受注更新日,
			@受注担当者ＣＤ,
			@組織区分,
			@組織区分1,
			@消費税区分１,
			@依頼元元組織ＣＤ,
			@決済手段
			
	END
	
	--  ｶｰｿﾙCLOSE
	CLOSE AB0105_CUR00
	--  ｶｰｿﾙ削除
	DEALLOCATE AB0105_CUR00

	RETURN 0
	
  
ERROR_HANDLER:
  IF CURSOR_STATUS('global','AB0105_CUR00') = 1 
    BEGIN
       --  ｶｰｿﾙCLOSE
       CLOSE AB0105_CUR00
       --  ｶｰｿﾙ削除
       DEALLOCATE AB0105_CUR00
    END

  SET @LOG_MSG = @PRC_NM + ' SQLエラー発生 Status:'+CONVERT(VARCHAR(10),@ERR)
  EXEC WRITE_PRCLOG 'AB0105',@受付番号,@精算元組織コード,'E',@LOG_MSG

  RETURN @ERR

END




GO

