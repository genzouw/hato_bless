USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0103]    Script Date: 07/31/2014 11:38:48 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


--精算受注データの作成
CREATE     PROCEDURE [dbo].[SP_AB0103](
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
  @請求内税金額      decimal(10),			--2004/07/09 ADD EBISUI@KOS
  @立替金額          decimal(10),			--2004/07/09 ADD EBISUI@KOS
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
  --========== Str 2008/08/15 Ins SYS_Ohki ==========
  @決済区分          char(1),
  @依頼種別			 char(1),
  --========== End 2008/08/15 Ins SYS_Ohki ==========
  
  --========== Str 2014/02/12 Ins SYS_Ohki ==========
  @債務保証賦課率センタ用    decimal(6,3),
  --========== End 2014/02/12 Ins SYS_Ohki ==========
  
  @ERR               int



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
  SELECT @画面ID = 'AB0103'
  SELECT @削除ﾌﾗｸﾞ = '0'
  SELECT @ERR = @@ERROR
  IF @ERR <> 0 GOTO ERROR_HANDLER



--  =========== Str 2008/08/12 Del SYS_Ohki ============
--  ----------------------------------------------------
--  [SP_AB0101]で削除する事する。
--  クレジットデータ作成時、請求支払データも作成するため
--  ----------------------------------------------------
--  /***************************************/
--  --精算データ削除
--  /***************************************/
--  DELETE T_SEISAN_JUCHU
--  WHERE SEIKYU_YM = @精算年月
--  SELECT @ERR = @@ERROR
--  IF @ERR <> 0 GOTO ERROR_HANDLER
--  =========== End 2008/08/12 Del SYS_Ohki ============




  /***************************************/
  --通常取引データを作成する
  /***************************************/
  SET @PRC_NM = '通常取引データ作成'

  DECLARE  AB0103_CUR00  CURSOR  FOR
--    SELECT  TS.IRAISAKI_SOSHIKI_CD AS IRAISAKI_SOSHIKI_CD,
    SELECT  TS.IRAIMOTO_SOSHIKI_CD AS IRAIMOTO_SOSHIKI_CD,
            TS.SOSHIKI_CD          AS SOSHIKI_CD,
            TK.UKETSUKE_NO         AS UKETSUKE_NO,
            TK.UKETSUKE_DT         AS UKETSUKE_DT,
            TK.TORIATSUKAI_KBN     AS TORIATSUKAI_KBN,
            TK.HOJIN_CD            AS HOJIN_CD,
            TK.HOJIN_TNT_MEI       AS HOJIN_TNT_MEI,
            TS.JUCHU_KEIYU_CD      AS JUCHU_KEIYU_CD,
            TK.KOKYAKU_SEIKYU_KBN  AS KOKYAKU_SEIKYU_KBN,
            TK.KOKYAKUMEI          AS KOKYAKUMEI,

            --2004/07/09 MODIFY EBISUI@KOS START
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    0
                ELSE
                    TR.RYOKIN_SHOKEI  +
                    TR.RYOKIN_NEBIKI_GK1
            END                    AS SEIKYU_GK,           --請求金額
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    TR.RYOKIN_SHOKEI
                ELSE
                    dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
            END                    AS SEIKYU_UTIZEI_GK,    --請求内税金額
            TR.RYOKIN_6            AS TATEKAE_GK,          --立替金額
            --2004/07/09 MODIFY EBISUI@KOS END

            --ROUND(TR.RYOKIN_KEI * @債務保証賦課率 / 100,0) 
            --2004/10/25 Update Hoshi 税抜き金額を対象に
	  --2005/07/21 Update Miyajima 立替金は対象額から除く
            --ROUND((TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN + TR.RYOKIN_6) * @債務保証賦課率 / 100,0) 
            --                      AS KINGAKU,
            
            -- ========== Str 2014/02/12 UPD SYS_Ohki ==========
            -- ROUND((TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN) * @債務保証賦課率 / 100,0) 
            --                        AS KINGAKU,
            ----------------------------------------------------------------------------------------------
            -- 依頼先（依頼していない場合は自組織）の組織区分が
            -- 3:センター       ⇒ @債務保証賦課率センタ用を使用
            -- 3:センター以外   ⇒ @債務保証賦課率を使用（連合会の場合、計算するが対象外）
            -- FETCH項目：@賦課金
            -- ※注意 組織区分はTS.SOSHIKI_CDの組織区分で判定
            ----------------------------------------------------------------------------------------------
            CASE WHEN MS.SOSHIKI_KBN = '3' -- 組織区分：センター
            	THEN 	ROUND((TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN) * @債務保証賦課率センタ用  / 100,0)
            	ELSE	ROUND((TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN) * @債務保証賦課率          / 100,0)
            END                    AS KINGAKU,
            -- ========== End 2014/02/12 UPD SYS_Ohki ==========
            
            
            TR.SHOHIZEI_GK +
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    0
                ELSE
                    TR.RYOKIN_NEBIKI_GK - dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
            END                    AS SHOHIZEI_GK,
            TS.JYUCHU_DT           AS JYUCHU_DT,
            TK.SEISAN_DT           AS SEISAN_DT,
            TG.SAGYO_DT            AS SAGYO_DT,
            TS.UPDATE_DT           AS UPDATE_DT,
            TS.UKETSUKE_TANTO_CD   AS UKETSUKE_TANTO_CD,
            MS.SOSHIKI_KBN,
            MS1.SOSHIKI_KBN,
            TR.SHOHIZEI_KBN,
            
            -- ========== Str 2008/08/15 Ins SYS_Ohki ========
            TK.KESSAI_KBN,
            TS.IRAI_SHUBETSU_CD
            -- ========== End 2008/08/15 Ins SYS_Ohki ========
            
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
      AND   TR.DELETE_FLG = '0' --20050722 MIYAJIMA ADD
  --  ｶｰｿﾙOPEN
  OPEN  AB0103_CUR00
  FETCH  NEXT FROM AB0103_CUR00 INTO
      @依頼元組織ＣＤ,
      @依頼先組織ＣＤ,
      @受付番号,
      @受付日,
      @取扱区分ＣＤ,
      @法人ＣＤ,
      @法人担当者名,
      @経由ＣＤ,
      @請求先区分ＣＤ,
      @顧客名,
      @請求金額,
      @請求内税金額,			--2004/07/09 ADD EBISUI@KOS
      @立替金額,				--2004/07/09 ADD EBISUI@KOS  
      @賦課金,					--賦課金のこと
      @消費税,
      @受注日,
      @精算日,
      @卸日,
      @受注更新日,
      @受注担当者ＣＤ,
      @組織区分,
      @組織区分1,
      @消費税区分１,
      
      
      --========== Str 2008/08/15 Ins SYS_Ohki ==========
      @決済区分,
      @依頼種別
      --========== End 2008/08/15 Ins SYS_Ohki ==========
      
      
  WHILE (@@FETCH_STATUS = 0)
  BEGIN
    --全依頼分精算受注データを作成する。（請求）--------------------------------------------------------
    --１）（請求） 依頼先　→　連合会
      
    SET @精算元組織コード = @依頼先組織ＣＤ
    SET @精算先組織コード = @依頼元組織ＣＤ
    SET @請求支払区分 = '1'					--１：請求、２：支払
    -- 2004.07.21 抽出SQL内で計算
    --SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@請求内税金額,dbo.GET_TAX_RT(@精算日))      -- 2004/07/09 ADD EBISUI@KOS
    SET @請求内税税抜額 = @請求内税金額
    SET @センターＣＤ = @依頼先組織ＣＤ
    SET @消費税区分 = @消費税区分１					--１：非課税、２：内税、３：外税
    SET @請求金額区分 = '1'					--１：通常、２：賦課金
    -- 2004.07.21 ロジック廃止(抽出SQL内で計算)
    --SET @消費税 = @消費税 + (@請求内税金額 - @請求内税税抜額) 

    IF (@依頼先組織ＣＤ IS NULL) 
    BEGIN
      SET @LOG_MSG = '依頼先組織ＣＤ取得できず '
      EXEC WRITE_PRCLOG 'AB0103',@受付番号,@依頼元組織ＣＤ,'W',@LOG_MSG
      GOTO NEXT_READ
    END

    IF (@センターＣＤ IS NULL) 
    BEGIN
      SET @LOG_MSG = 'センターＣＤ取得できず '
      EXEC WRITE_PRCLOG 'AB0103',@受付番号,@依頼元組織ＣＤ,'W',@LOG_MSG
      GOTO NEXT_READ
    END
	
	
	
	
	--========== Str 2008/08/15 Ins SYS_Ohki ==========
	---------------------------------------------------
	--  現金の場合は別ストアドで作成
	--  賦課金作成処理は今まで通りする。
	---------------------------------------------------
	IF @依頼種別 = '0' OR @依頼種別 = '1' BEGIN
		IF @決済区分 = '1'  BEGIN 
			GOTO 賦課金作成処理
		END
	END
	--========== End 2008/08/15 Ins SYS_Ohki ==========
	
	
	
	
	
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
      SEIKYU_UTIZEI_GK,			--2004/07/09 ADD EBISUI@KOS
      TATEKAE_GK,				--2004/07/09 ADD EBISUI@KOS
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
      @請求内税税抜額,		--2004/07/09 ADD EBISUI@KOS
      @立替金額,			--2004/07/09 ADD EBISUI@KOS  
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
    
    --全依頼分精算受注データを作成する。（支払）--------------------------------------------------------
    --２）（支払） 組織　→　依頼先
    
	
    SET @精算元組織コード = @依頼元組織ＣＤ
    SET @精算先組織コード = @依頼先組織ＣＤ
    SET @請求支払区分 = '2'					--１：請求、２：支払
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
      SEIKYU_UTIZEI_GK,			--2004/07/09 ADD EBISUI@KOS
      TATEKAE_GK,				--2004/07/09 ADD EBISUI@KOS
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
      @請求内税税抜額,		--2004/07/09 ADD EBISUI@KOS
      @立替金額,			--2004/07/09 ADD EBISUI@KOS  
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
    
    
-- ========== Str 2008/08/15 Ins SYS_Ohki ==========
賦課金作成処理:
-- ========== End 2008/08/15 Ins SYS_Ohki ==========
    
    
    IF @組織区分 <> '1'-- AND @組織区分1 <> '1' 2005/07/21 Miyajima Mod
    BEGIN
      --全依頼分精算受注データ（賦課金）を作成する。（請求）--------------------------------------------------------
      --３）（賦課金:請求） 連合会　→　依頼先
      
      SET @精算元組織コード = @連合会
      SET @精算先組織コード = @依頼先組織ＣＤ
      SET @請求支払区分 = '1'					--１：請求、２：支払
      --SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@賦課金,dbo.GET_TAX_RT(@精算日))      -- 2004/07/09 ADD EBISUI@KOS
	-- 2004.08.21 Mopd By Kotake Start 税区分定義が受注と異なる為の修正
      --SET @消費税区分 = @ZEI_KBN				--１：非課税、２：内税、３：外税
	-- 2004.08.21 Mopd By Kotake End   税区分定義が受注と異なる為の修正
      SET @請求金額区分 = '2'					--１：通常、２：賦課金
      --SET @消費税 = @賦課金 - @請求内税税抜額	--消費税＝税込金額－税抜金額         -- 2004/07/09 ADD EBISUI@KOS
	
	-- 2004.08.21 Mopd By Kotake Start 税区分定義が受注と異なる為の修正
	IF @ZEI_KBN = '1' 
	BEGIN
		--１：非課税
		SET @請求金額 = @賦課金
		SET @請求内税税抜額 = 0
		SET @消費税 =  0
		SET @消費税区分 = '1'				--１：非課税、２：内税、３：外税
	END
	ELSE
	BEGIN
		IF @ZEI_KBN = '2'
		BEGIN
			--内税
			SET @請求金額 = 0
			SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@賦課金,dbo.GET_TAX_RT(@精算日)) 
			SET @消費税 = @賦課金 - @請求内税税抜額	--消費税＝税込金額－税抜金額  
			SET @消費税区分 = '2'				--１：非課税、２：内税、３：外税
		END
		ELSE
		BEGIN
			--３：外税
			SET @請求金額 = @賦課金
	 		SET @請求内税税抜額 = 0
			SET @消費税 =   ROUND(@賦課金 * dbo.GET_TAX_RT(@精算日) / 100,0)
			SET @消費税区分 = '3'				--１：非課税、２：内税、３：外税
		END
	END
/*
	-- 04/08/12 IWASHITA ADD STR
	if @ZEI_KBN = '1' 
	BEGIN
		--１：非課税
		SET @請求金額 = @賦課金
		SET @請求内税税抜額 = 0
		SET @消費税 =  0
	END 
	ELSE
	BEGIN
	END
	IF @ZEI_KBN = '2' 
	BEGIN
		--２：内税
		SET @請求金額 = 0
	 	SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@賦課金,dbo.GET_TAX_RT(@精算日)) 
		SET @消費税 = @賦課金 - @請求内税税抜額	--消費税＝税込金額－税抜金額  
	END 

	IF @ZEI_KBN = '3' 
	BEGIN	
	--３：外税
		SET @請求金額 = @賦課金
		SET @請求内税税抜額 = 0
		SET @消費税 =   ROUND(@賦課金 * dbo.GET_TAX_RT(@精算日) / 100,0)
	END 
	-- 04/08/12 IWASHITA ADD END
*/
	-- 2004.08.21 Mopd By Kotake End   税区分定義が受注と異なる為の修正

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
        SEIKYU_UTIZEI_GK,		--2004/07/09 ADD EBISUI@KOS
        TATEKAE_GK,				--2004/07/09 ADD EBISUI@KOS
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
        @請求金額,			--2004/07/09 ADD EBISUI@KOS
        @請求内税税抜額,	--2004/07/09 ADD EBISUI@KOS
        0,					--2004/07/09 ADD EBISUI@KOS  
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
    --４）（賦課金：支払）依頼先　→　連合会

      SET @精算元組織コード = @依頼先組織ＣＤ
      SET @精算先組織コード = @連合会
      SET @請求支払区分 = '2'				--１：通常、２：賦課金
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
        SEIKYU_UTIZEI_GK,		--2004/07/09 ADD EBISUI@KOS
        TATEKAE_GK,				--2004/07/09 ADD EBISUI@KOS
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
        @請求金額,			--2004/07/09 ADD EBISUI@KOS
        @請求内税税抜額,	--2004/07/09 ADD EBISUI@KOS
        0,					--2004/07/09 ADD EBISUI@KOS  
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

NEXT_READ:

    FETCH  NEXT FROM AB0103_CUR00 INTO
      @依頼元組織ＣＤ,
      @依頼先組織ＣＤ,
      @受付番号,
      @受付日,
      @取扱区分ＣＤ,
      @法人ＣＤ,
      @法人担当者名,
      @経由ＣＤ,
      @請求先区分ＣＤ,
      @顧客名,
      @請求金額,
      @請求内税金額,			--2004/07/09 ADD EBISUI@KOS
      @立替金額,				--2004/07/09 ADD EBISUI@KOS  
      @賦課金,					--賦課金のこと
      @消費税,
      @受注日,
      @精算日,
      @卸日,
      @受注更新日,
      @受注担当者ＣＤ,
      @組織区分,
      @組織区分1,
      @消費税区分１,
      
 	  --========== Str 2008/08/15 Ins SYS_Ohki ==========
      @決済区分,
      @依頼種別
 	  --========== End 2008/08/15 Ins SYS_Ohki ==========
 	  
  END
  --  ｶｰｿﾙCLOSE
  CLOSE AB0103_CUR00
  --  ｶｰｿﾙ削除
  DEALLOCATE AB0103_CUR00

  /***************************************/
  --手数料精算受注データを作成する
  /***************************************/
  SET @PRC_NM = '手数料データ作成'

  DECLARE AB0103_CUR01 CURSOR  FOR
    SELECT  TS.IRAISAKI_SOSHIKI_CD AS IRAISAKI_SOSHIKI_CD,
            TS.SOSHIKI_CD          AS SOSHIKI_CD,
            TK.UKETSUKE_NO         AS UKETSUKE_NO,
            TK.UKETSUKE_DT         AS UKETSUKE_DT,
            TK.TORIATSUKAI_KBN     AS TORIATSUKAI_KBN,
            TK.HOJIN_CD            AS HOJIN_CD,
            TK.HOJIN_TNT_MEI       AS HOJIN_TNT_MEI,
            TS.JUCHU_KEIYU_CD      AS JUCHU_KEIYU_CD,
            TK.KOKYAKU_SEIKYU_KBN  AS KOKYAKU_SEIKYU_KBN,
            TK.KOKYAKUMEI          AS KOKYAKUMEI,
--2004.07.21 SQL内で計算
--            TR.RYOKIN_TESURYO_GK   AS RYOKIN_TESURYO_GK,
            dbo.GET_BEFORE_TAX(TR.RYOKIN_TESURYO_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
                                   AS RYOKIN_TESURYO_GK,    --手数料（税抜金額）
            TR.RYOKIN_TESURYO_GK -
            dbo.GET_BEFORE_TAX(TR.RYOKIN_TESURYO_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
                                   AS SHOHIZEI_GK,          --消費税額
            TS.JYUCHU_DT           AS JYUCHU_DT,
            TK.SEISAN_DT           AS SEISAN_DT,
            TG.SAGYO_DT            AS SAGYO_DT,
            TS.UPDATE_DT           AS UPDATE_DT,
            TS.UKETSUKE_TANTO_CD   AS UKETSUKE_TANTO_CD
      FROM  T_JUCHU_SYOSAI AS TS
            INNER JOIN T_JUCHU_RYOKIN AS TR
              ON (TS.UKETSUKE_NO = TR.UKETSUKE_NO
              AND TS.SOSHIKI_CD  = TR.SOSHIKI_CD)
            INNER JOIN T_JUCHU_KIHON  AS TK
              ON (TS.UKETSUKE_NO = TK.UKETSUKE_NO)
--            INNER JOIN W_JUCHU_SEISAN AS TG	-- INNER ではなく LEFT 2005.01.12 Hoshi
            LEFT JOIN W_JUCHU_SEISAN AS TG
              ON (TS.UKETSUKE_NO = TG.UKETSUKE_NO)
      WHERE TR.RYOKIN_TESURYO_GK != 0
      AND   TS.SEISAN_MAKE_FLG    = '0'
      AND   TS.DELETE_FLG         = '0'
      AND   TK.DELETE_FLG         = '0'
      AND   TK.JUCHU_STS_CD       = '05'
      AND   TK.SEISAN_DT       LIKE @精算年月 + '%'

  --  ｶｰｿﾙOPEN
  OPEN  AB0103_CUR01
  FETCH  NEXT FROM AB0103_CUR01 INTO
    @依頼先組織ＣＤ,
    @依頼元組織ＣＤ,
    @受付番号,
    @受付日,
    @取扱区分ＣＤ,
    @法人ＣＤ,
    @法人担当者名,
    @経由ＣＤ,
    @請求先区分ＣＤ,
    @顧客名,
    @請求内税金額,
    @消費税,
    @受注日,
    @精算日,
    @卸日,
    @受注更新日,
    @受注担当者ＣＤ
    
	
  WHILE (@@FETCH_STATUS = 0)
  BEGIN
    --手数料精算受注データを作成する。（請求）--------------------------------------------------------
    SET @精算元組織コード = @依頼元組織ＣＤ
    SET @精算先組織コード = @依頼先組織ＣＤ
    SET @請求支払区分 = '1'				--１：通常、２：賦課金

    --2004.07.21 抽出SQL内で計算
    --SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@請求内税金額,dbo.GET_TAX_RT(@精算日))  -- 税抜き金額に変換      -- 2004/07/09 ADD EBISUI@KOS
    SET @請求内税税抜額 = @請求内税金額
    SET @センターＣＤ = @依頼元組織ＣＤ
    SET @消費税区分 = '2'				--１：非課税、２：内税、３：外税
    SET @請求金額区分 = '3'				--１：通常、２：賦課金 ３：手数料
    --2004.07.21 抽出SQL内で計算
    --SET @消費税 = @請求内税金額 - @請求内税税抜額	--消費税＝税込金額－税抜金額      -- 2004/07/09 ADD EBISUI@KOS

    IF (@依頼先組織ＣＤ IS NULL) 
    BEGIN
      SET @LOG_MSG = '依頼先組織ＣＤ取得できず '
      EXEC WRITE_PRCLOG 'AB0103',@受付番号,@依頼元組織ＣＤ,'W',@LOG_MSG
      GOTO NEXT_READ1
    END

    IF (@センターＣＤ IS NULL) 
    BEGIN
      SET @LOG_MSG = 'センターＣＤ取得できず '
      EXEC WRITE_PRCLOG 'AB0103',@受付番号,@依頼元組織ＣＤ,'W',@LOG_MSG
      GOTO NEXT_READ1
    END

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
      SEIKYU_UTIZEI_GK,			--2004/07/09 ADD EBISUI@KOS
      TATEKAE_GK,				--2004/07/09 ADD EBISUI@KOS
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
      0,					--2004/07/09 ADD EBISUI@KOS
      @請求内税税抜額,		--2004/07/09 ADD EBISUI@KOS
      0,					--2004/07/09 ADD EBISUI@KOS  
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

    --手数料精算受注データを作成する。（支払）--------------------------------------------------------
    SET @精算元組織コード = @依頼先組織ＣＤ
    SET @精算先組織コード = @依頼元組織ＣＤ
    SET @請求支払区分 = '2'
    SET @消費税区分 = '2'

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
      SEIKYU_UTIZEI_GK,			--2004/07/09 ADD EBISUI@KOS
      TATEKAE_GK,				--2004/07/09 ADD EBISUI@KOS
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
      0,					--2004/07/09 ADD EBISUI@KOS
      @請求内税税抜額,		--2004/07/09 ADD EBISUI@KOS
      0,					--2004/07/09 ADD EBISUI@KOS  
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

NEXT_READ1:

    FETCH  NEXT FROM AB0103_CUR01 INTO
      @依頼先組織ＣＤ,
      @依頼元組織ＣＤ,
      @受付番号,
      @受付日,
      @取扱区分ＣＤ,
      @法人ＣＤ,
      @法人担当者名,
      @経由ＣＤ,
      @請求先区分ＣＤ,
      @顧客名,
      @請求内税金額,
      @消費税,
      @受注日,
      @精算日,
      @卸日,
      @受注更新日,
      @受注担当者ＣＤ
  END
  --  ｶｰｿﾙCLOSE
  CLOSE AB0103_CUR01
  --  ｶｰｿﾙ削除
  DEALLOCATE AB0103_CUR01  

  /***************************************/
  --クレジット決済データを作成する
  /***************************************/
/*
  SET @PRC_NM = 'クレジット決済データ作成'

  DECLARE  AB0103_CUR02  CURSOR  FOR
    --センター受注（センター→本部）
    SELECT  TS.SOSHIKI_CD          AS SOSHIKI_CD,           --センター
            MS.JYOBU_SOSHIKI_CD    AS JYOBU_SOSHIKI_CD,     --本部
            TS.SOSHIKI_CD          AS JISSHI_SOSHIKI_CD,    --実施センター
            TK.UKETSUKE_NO         AS UKETSUKE_NO,
            TK.UKETSUKE_DT         AS UKETSUKE_DT,
            TK.TORIATSUKAI_KBN     AS TORIATSUKAI_KBN,
            TK.HOJIN_CD            AS HOJIN_CD,
            TK.HOJIN_TNT_MEI       AS HOJIN_TNT_MEI,
            TS.JUCHU_KEIYU_CD      AS JUCHU_KEIYU_CD,
            TK.KOKYAKU_SEIKYU_KBN  AS KOKYAKU_SEIKYU_KBN,
            TK.KOKYAKUMEI          AS KOKYAKUMEI,

            --2004/07/09 MODIFY EBISUI@KOS START
            TR.RYOKIN_SHOKEI  +
            TR.RYOKIN_NEBIKI_GK1   AS SEIKYU_GK,           --請求金額
            TR.RYOKIN_NEBIKI_GK    AS SEIKYU_UTIZEI_GK,    --請求内税金額
            TR.RYOKIN_6            AS TATEKAE_GK,          --立替金額
            --2004/07/09 MODIFY EBISUI@KOS END

            ROUND(TR.RYOKIN_KEI * @債務保証賦課率 / 100,0) 
                                   AS KINGAKU,
            TR.SHOHIZEI_GK         AS SHOHIZEI_GK,
            TS.JYUCHU_DT           AS JYUCHU_DT,
            TK.SEISAN_DT           AS SEISAN_DT,
            TG.SAGYO_DT            AS SAGYO_DT,
            TS.UPDATE_DT           AS UPDATE_DT,
            TS.UKETSUKE_TANTO_CD   AS UKETSUKE_TANTO_CD,
            MS.SOSHIKI_KBN
      FROM  T_JUCHU_SYOSAI AS TS
            INNER JOIN T_JUCHU_KIHON  AS TK 
              ON (TS.UKETSUKE_NO = TK.UKETSUKE_NO
              AND TS.SOSHIKI_CD  = TK.UKETSUKE_SOSHIKI_CD)
            INNER JOIN M_SOSHIKI      AS MS
              ON (TK.UKETSUKE_SOSHIKI_CD = MS.SOSHIKI_CD)
            INNER JOIN T_JUCHU_RYOKIN AS TR
              ON (TS.UKETSUKE_NO = TR.UKETSUKE_NO
              AND TS.SOSHIKI_CD  = TR.SOSHIKI_CD)
            INNER JOIN W_JUCHU_SEISAN TG
              ON (TS.UKETSUKE_NO = TG.UKETSUKE_NO)
      WHERE TK.DELETE_FLG      = '0'                  --削除されていない
      AND   TK.JUCHU_STS_CD    = '05'                 --受注ステータスが「05:配達完了」
      AND   TK.SEISAN_DT       LIKE @精算年月 + '%'   --精算日が精算管理テーブルの精算年月に該当する
      AND   TK.KESSAI_KBN      = '2'                  --決済区分＝2:クレジット
      AND   TS.SEISAN_MAKE_FLG = '0'                  --精算データが未作成
      AND   MS.SOSHIKI_KBN     = '3'                  --受注箇所の組織区分が「3:センター」
    UNION
    --センター受注（本部→連合会）
    SELECT  MS.JYOBU_SOSHIKI_CD    AS JYOBU_SOSHIKI_CD,     --本部
            MS1.JYOBU_SOSHIKI_CD   AS JYOBU_SOSHIKI_CD1,    --連合会
            TS.SOSHIKI_CD          AS JISSHI_SOSHIKI_CD,    --実施センター
            TK.UKETSUKE_NO         AS UKETSUKE_NO,
            TK.UKETSUKE_DT         AS UKETSUKE_DT,
            TK.TORIATSUKAI_KBN     AS TORIATSUKAI_KBN,
            TK.HOJIN_CD            AS HOJIN_CD,
            TK.HOJIN_TNT_MEI       AS HOJIN_TNT_MEI,
            TS.JUCHU_KEIYU_CD      AS JUCHU_KEIYU_CD,
            TK.KOKYAKU_SEIKYU_KBN  AS KOKYAKU_SEIKYU_KBN,
            TK.KOKYAKUMEI          AS KOKYAKUMEI,

            --2004/07/09 MODIFY EBISUI@KOS START
            TR.RYOKIN_SHOKEI  +
            TR.RYOKIN_NEBIKI_GK1   AS SEIKYU_GK,           --請求金額
            TR.RYOKIN_NEBIKI_GK    AS SEIKYU_UTIZEI_GK,    --請求内税金額
            TR.RYOKIN_6            AS TATEKAE_GK,          --立替金額
            --2004/07/09 MODIFY EBISUI@KOS END

            ROUND(TR.RYOKIN_KEI * @債務保証賦課率 / 100,0) 
                                   AS KINGAKU,
            TR.SHOHIZEI_GK         AS SHOHIZEI_GK,
            TS.JYUCHU_DT           AS JYUCHU_DT,
            TK.SEISAN_DT           AS SEISAN_DT,
            TG.SAGYO_DT            AS SAGYO_DT,
            TS.UPDATE_DT           AS UPDATE_DT,
            TS.UKETSUKE_TANTO_CD   AS UKETSUKE_TANTO_CD,
            MS1.SOSHIKI_KBN
      FROM  T_JUCHU_SYOSAI AS TS
            INNER JOIN T_JUCHU_KIHON  AS TK 
              ON (TS.UKETSUKE_NO = TK.UKETSUKE_NO
              AND TS.SOSHIKI_CD  = TK.UKETSUKE_SOSHIKI_CD)
            INNER JOIN M_SOSHIKI      AS MS
              ON (TK.UKETSUKE_SOSHIKI_CD = MS.SOSHIKI_CD)
            INNER JOIN M_SOSHIKI      AS MS1
              ON (MS1.SOSHIKI_CD = MS.JYOBU_SOSHIKI_CD)
            INNER JOIN T_JUCHU_RYOKIN AS TR
              ON (TS.UKETSUKE_NO = TR.UKETSUKE_NO
              AND TS.SOSHIKI_CD  = TR.SOSHIKI_CD)
            INNER JOIN W_JUCHU_SEISAN TG
              ON (TS.UKETSUKE_NO = TG.UKETSUKE_NO)
      WHERE TK.DELETE_FLG      = '0'                  --削除されていない
      AND   TK.JUCHU_STS_CD    = '05'                 --受注ステータスが「05:配達完了」
      AND   TK.SEISAN_DT       LIKE @精算年月 + '%'   --精算日が精算管理テーブルの精算年月に該当する
      AND   TK.KESSAI_KBN      = '2'                  --決済区分＝2:クレジット
      AND   TS.SEISAN_MAKE_FLG = '0'                  --精算データが未作成
      AND   MS.SOSHIKI_KBN     = '3'                  --受注箇所の組織区分が「3:センター」
    UNION
    --本部受注（本部→連合会）
    SELECT  TS.SOSHIKI_CD          AS SOSHIKI_CD,           --本部
            MS.JYOBU_SOSHIKI_CD    AS JYOBU_SOSHIKI_CD,     --連合会
            TS.IRAISAKI_SOSHIKI_CD AS JISSHI_SOSHIKI_CD,    --実施センター
            TK.UKETSUKE_NO         AS UKETSUKE_NO,
            TK.UKETSUKE_DT         AS UKETSUKE_DT,
            TK.TORIATSUKAI_KBN     AS TORIATSUKAI_KBN,
            TK.HOJIN_CD            AS HOJIN_CD,
            TK.HOJIN_TNT_MEI       AS HOJIN_TNT_MEI,
            TS1.JUCHU_KEIYU_CD     AS JUCHU_KEIYU_CD,
            TK.KOKYAKU_SEIKYU_KBN  AS KOKYAKU_SEIKYU_KBN,
            TK.KOKYAKUMEI          AS KOKYAKUMEI,

            --2004/07/09 MODIFY EBISUI@KOS START
            TR.RYOKIN_SHOKEI  +
            TR.RYOKIN_NEBIKI_GK1   AS SEIKYU_GK,           --請求金額
            TR.RYOKIN_NEBIKI_GK    AS SEIKYU_UTIZEI_GK,    --請求内税金額
            TR.RYOKIN_6            AS TATEKAE_GK,          --立替金額
            --2004/07/09 MODIFY EBISUI@KOS END

            ROUND(TR.RYOKIN_KEI * @債務保証賦課率 / 100,0) 
                                   AS KINGAKU,
            TR.SHOHIZEI_GK         AS SHOHIZEI_GK,
            TS1.JYUCHU_DT          AS JYUCHU_DT,
            TK.SEISAN_DT           AS SEISAN_DT,
            TG.SAGYO_DT            AS SAGYO_DT,
            TS1.UPDATE_DT          AS UPDATE_DT,
            TS1.UKETSUKE_TANTO_CD  AS UKETSUKE_TANTO_CD,
            MS.SOSHIKI_KBN
      FROM  T_JUCHU_SYOSAI            AS TS
            INNER JOIN T_JUCHU_KIHON  AS TK 
              ON (TS.UKETSUKE_NO = TK.UKETSUKE_NO
              AND TS.SOSHIKI_CD  = TK.UKETSUKE_SOSHIKI_CD)
            INNER JOIN M_SOSHIKI      AS MS
              ON (TK.UKETSUKE_SOSHIKI_CD = MS.SOSHIKI_CD)
            INNER JOIN M_SOSHIKI      AS MS1
              ON (TS.IRAISAKI_SOSHIKI_CD = MS1.SOSHIKI_CD)
            INNER JOIN T_JUCHU_SYOSAI AS TS1
              ON (TS.UKETSUKE_NO         = TS1.UKETSUKE_NO
              AND TS.IRAISAKI_SOSHIKI_CD = TS1.SOSHIKI_CD)
            INNER JOIN T_JUCHU_RYOKIN AS TR
              ON (TS1.UKETSUKE_NO = TR.UKETSUKE_NO
              AND TS1.SOSHIKI_CD  = TR.SOSHIKI_CD)
            INNER JOIN W_JUCHU_SEISAN TG
              ON (TS.UKETSUKE_NO = TG.UKETSUKE_NO)
      WHERE TK.DELETE_FLG       = '0'                  --削除されていない
        AND TK.JUCHU_STS_CD     = '05'                 --受注ステータスが「05:配達完了」
        AND TK.SEISAN_DT        LIKE @精算年月 + '%'   --精算日が精算管理テーブルの精算年月に該当する
        AND TK.KESSAI_KBN       = '2'                  --決済区分＝2:クレジット
        AND TS1.SEISAN_MAKE_FLG = '0'                  --精算データが未作成
        AND MS.SOSHIKI_KBN      = '2'                  --受注箇所の組織区分が「2:本部」
        AND MS1.SOSHIKI_KBN     = '3'                  --作業箇所の組織区分が「3:センター」

  --  ｶｰｿﾙOPEN
  OPEN  AB0103_CUR02
  FETCH  NEXT FROM AB0103_CUR02 INTO
      @依頼先組織ＣＤ,
      @組織コード,
      @センターＣＤ,
      @受付番号,
      @受付日,
      @取扱区分ＣＤ,
      @法人ＣＤ,
      @法人担当者名,
      @経由ＣＤ,
      @請求先区分ＣＤ,
      @顧客名,
      @請求金額,
      @請求内税金額,		--2004/07/09 ADD EBISUI@KOS
      @立替金額,			--2004/07/09 ADD EBISUI@KOS  
      @金額,
      @消費税,
      @受注日,
      @精算日,
      @卸日,
      @受注更新日,
      @受注担当者ＣＤ,
      @組織区分
  WHILE (@@FETCH_STATUS = 0)
  BEGIN
    --全依頼分精算受注データを作成する。（請求）--------------------------------------------------------
    SET @精算元組織コード = @依頼先組織ＣＤ
    SET @精算先組織コード = @組織コード
    SET @請求支払区分 = '1'					--１：請求、２：支払

    SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@請求内税金額,dbo.GET_TAX_RT(@精算日))  -- 税抜き金額に変換      -- 2004/07/09 ADD EBISUI@KOS

    SET @消費税区分 = '3'					--１：非課税、２：内税、３：外税
    SET @請求金額区分 = '1'					--１：通常、２：賦課金
    SET @消費税 = @消費税 + @請求内税金額 - @請求内税税抜額

PRINT @精算元組織コード
PRINT @精算元組織コード
PRINT @受付番号

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
      SEIKYU_UTIZEI_GK,			--2004/07/09 ADD EBISUI@KOS
      TATEKAE_GK,				--2004/07/09 ADD EBISUI@KOS
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
      @請求内税税抜額,		--2004/07/09 ADD EBISUI@KOS
      @立替金額,			--2004/07/09 ADD EBISUI@KOS  
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
    
    --全依頼分精算受注データを作成する。（支払）--------------------------------------------------------
    SET @精算元組織コード = @組織コード
    SET @精算先組織コード = @依頼先組織ＣＤ
    SET @請求支払区分 = '2'

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
      SEIKYU_UTIZEI_GK,			--2004/07/09 ADD EBISUI@KOS
      TATEKAE_GK,				--2004/07/09 ADD EBISUI@KOS
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
      @請求内税税抜額,		--2004/07/09 ADD EBISUI@KOS
      @立替金額,			--2004/07/09 ADD EBISUI@KOS  
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
*/
/*
    IF @組織区分 = '3'
    BEGIN
      --全依頼分精算受注データ（賦課金）を作成する。（請求）--------------------------------------------------------
      SET @精算元組織コード = @連合会
      SET @精算先組織コード = @依頼先組織ＣＤ
      SET @請求支払区分 = '1'				--１：請求、２：支払      -- 2004/07/09 ADD EBISUI@KOS
      SET @請求内税金額 =@金額
      SET @消費税区分 = @ZEI_KBN			--１：非課税、２：内税、３：外税
      SET @請求金額区分 = '2'				--１：通常、２：賦課金

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
        SEIKYU_UTIZEI_GK,			--2004/07/09 ADD EBISUI@KOS
        TATEKAE_GK,					--2004/07/09 ADD EBISUI@KOS
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
        0,					--2004/07/09 ADD EBISUI@KOS
        @請求内税金額,		--2004/07/09 ADD EBISUI@KOS
        0,					--2004/07/09 ADD EBISUI@KOS  
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
      SET @精算元組織コード = @依頼先組織ＣＤ
      SET @精算先組織コード = @連合会
      SET @請求支払区分 = '2'
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
        SEIKYU_UTIZEI_GK,			--2004/07/09 ADD EBISUI@KOS
        TATEKAE_GK,					--2004/07/09 ADD EBISUI@KOS
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
        0,					--2004/07/09 ADD EBISUI@KOS
        @請求内税金額,		--2004/07/09 ADD EBISUI@KOS
        0,					--2004/07/09 ADD EBISUI@KOS  
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
*/
/*
    FETCH  NEXT FROM AB0103_CUR02 INTO
      @依頼先組織ＣＤ,
      @組織コード,
      @センターＣＤ,
      @受付番号,
      @受付日,
      @取扱区分ＣＤ,
      @法人ＣＤ,
      @法人担当者名,
      @経由ＣＤ,
      @請求先区分ＣＤ,
      @顧客名,
      @請求金額,
      @請求内税金額,		--2004/07/09 ADD EBISUI@KOS
      @立替金額,			--2004/07/09 ADD EBISUI@KOS  
      @金額,
      @消費税,
      @受注日,
      @精算日,
      @卸日,
      @受注更新日,
      @受注担当者ＣＤ,
      @組織区分
  END
  --  ｶｰｿﾙCLOSE
  CLOSE AB0103_CUR02
  --  ｶｰｿﾙ削除
  DEALLOCATE AB0103_CUR02

*/
  --日付形式を変換する
  UPDATE T_SEISAN_JUCHU SET JUCHU_UPDATE =
      REPLACE(REPLACE(CONVERT(CHAR(19),CONVERT(DATETIME,'20'+REPLACE(JUCHU_UPDATE,'/','-'),120),120),'-',''),':','')
  WHERE SEIKYU_YM = @精算年月
  SELECT @ERR = @@ERROR
  IF @ERR <> 0 GOTO ERROR_HANDLER


  RETURN 0
  
ERROR_HANDLER:
  IF CURSOR_STATUS('global','AB0103_CUR00') = 1 
    BEGIN
       --  ｶｰｿﾙCLOSE
       CLOSE AB0103_CUR00
       --  ｶｰｿﾙ削除
       DEALLOCATE AB0103_CUR00
    END
  IF CURSOR_STATUS('global','AB0103_CUR01') = 1 
    BEGIN
       --  ｶｰｿﾙCLOSE
       CLOSE AB0103_CUR01
       --  ｶｰｿﾙ削除
       DEALLOCATE AB0103_CUR01
    END
/*
  IF CURSOR_STATUS('global','AB0103_CUR02') = 1 
    BEGIN
       --  ｶｰｿﾙCLOSE
       CLOSE AB0103_CUR02
       --  ｶｰｿﾙ削除
       DEALLOCATE AB0103_CUR02
    END
*/

  SET @LOG_MSG = @PRC_NM + ' SQLエラー発生 Status:'+CONVERT(VARCHAR(10),@ERR)
  EXEC WRITE_PRCLOG 'AB0103',@受付番号,@精算元組織コード,'E',@LOG_MSG

  RETURN @ERR

END


GO

