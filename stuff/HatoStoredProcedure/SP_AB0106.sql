USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0106]    Script Date: 07/31/2014 11:39:24 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


-------------------------------------------------------------
-- 新規作成：2008/08/15 SYS_Ohki 
-- 現金時の精算データ作成処理
-------------------------------------------------------------
CREATE   PROCEDURE [dbo].[SP_AB0106](
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
  @ERR               int ,
  @料金収受センター  CHAR(5)
  
  --========== Str 2014/02/12 Ins SYS_Ohki ==========
  ,@債務保証賦課率センタ用    decimal(6,3)
  --========== End 2014/02/12 Ins SYS_Ohki ==========
  
BEGIN
	
	
	
	SELECT 	@精算年月 = SEISAN_TUKI_JUCHU,
		   	@債務保証賦課率 = SAIMU_FUKA_RITU,
			--========== Str 2014/02/12 Ins SYS_Ohki ==========
			@債務保証賦課率センタ用 = SAIMU_FUKA_RITU_CENTER,
			--========== End 2014/02/12 Ins SYS_Ohki ==========
			@ZEI_KBN = SAIMU_FUKA_ZEI_KBN
    FROM    M_SEISAN_KANRI
  	
  	
  	
  	--連合会CD取得
  	SELECT @連合会 = SOSHIKI_CD
    FROM M_SOSHIKI
    WHERE SOSHIKI_KBN = '1'
  	
  	
  	
  	SELECT @更新日時 = REPLACE(REPLACE(CONVERT(CHAR(19),GETDATE(),120),'-',''),':','')
  	SELECT @更新者ID = 'BATCH'
  	SELECT @画面ID = 'AB0106'
  	SELECT @削除ﾌﾗｸﾞ = '0'
  	SELECT @ERR = @@ERROR
  	IF @ERR <> 0 GOTO ERROR_HANDLER
  	
  	
  	
	/***************************************/
	--通常取引データを作成する
	/***************************************/
  	SET @PRC_NM = '通常取引データ作成'
	
	
	
	-------------------------------------------------------------------------------------------------
	--     精算データ作成処理
	-------------------------------------------------------------------------------------------------
  	DECLARE  AB0106_CUR00  CURSOR  FOR
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
            
            -- ========== Str 2014/02/12 UPD SYS_Ohki ==========
            -- ROUND((TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN) * @債務保証賦課率 / 100,0) 
            --                        AS KINGAKU,
            ----------------------------------------------------------------------------------------------
            -- 依頼先（依頼していない場合は自組織）の組織区分が
            -- 3:センター       ⇒ @債務保証賦課率センタ用を使用
            -- 3:センター以外   ⇒ @債務保証賦課率を使用（連合会の場合、計算するが対象外）
            -- FETCH項目：@賦課金     ※注意：本バッチ処理は未使用である！一応修正しました。
            -- ※注意 組織区分はTS.SOSHIKI_CDの組織区分で判定
            ----------------------------------------------------------------------------------------------
            CASE WHEN MS.SOSHIKI_KBN = '3' -- 組織区分：センター
                THEN ROUND((TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN) * @債務保証賦課率センタ用 / 100,0)
                ELSE ROUND((TR.RYOKIN_SHOKEI + TR.RYOKIN_NEBIKI_GK1 + TR.RYOKIN_NEBIKI_GKN) * @債務保証賦課率         / 100,0)
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
            TK.RYOKIN_SYUJU_CD
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
      AND   TS.IRAIMOTO_SOSHIKI_CD IS NOT NULL
      AND   TK.KESSAI_KBN           = '1'				-- 決済区分：現金
      AND   TK.JUCHU_STS_CD         = '05'				
      AND   TK.SEISAN_DT         LIKE @精算年月 + '%'	
      AND   TK.DELETE_FLG           = '0'
      AND   TR.DELETE_FLG           = '0'
      AND   TS.DELETE_FLG           = '0'
      AND   TS.IRAI_SHUBETSU_CD IN ('0','1')
      
      
      
      
      
      
  	--  ｶｰｿﾙOPEN
	OPEN  AB0106_CUR00
  	FETCH  NEXT FROM AB0106_CUR00 INTO
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
      @料金収受センター
      
      
      
      
      
      
	WHILE (@@FETCH_STATUS = 0)
  	BEGIN
  		
  		
  		
  		
  		---------------------------------------------
  		-- 請求支払データを作成するかのチェック
  		---------------------------------------------
  		DECLARE @DATA_MAKE_FLG  CHAR(1)
  		GOTO MAKE_CHECK
  		MAIN_MODORI_01:
  		IF @DATA_MAKE_FLG = '0' GOTO NEXT_READ
  		
  		
  		
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
					)VALUES(
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
					@立替金額,				--2004/07/09 ADD EBISUI@KOS
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
				      ) VALUES (
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
	    
	    
	    
		NEXT_READ:
			
		    FETCH  NEXT FROM AB0106_CUR00 INTO
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
		      @料金収受センター
		       	  
		       	  
  	END
  	
	--  ｶｰｿﾙCLOSE
	CLOSE AB0106_CUR00
	--  ｶｰｿﾙ削除
	DEALLOCATE AB0106_CUR00
	
	RETURN 0
  	
	
	
	
-------------------------------------------------------------------------
-- 請求支払データを作成するかどうかのチェック
-------------------------------------------------------------------------
MAKE_CHECK:
	
	
	
	---------------------------------------------
	-- 収受センターと依頼先組織が同じだったら
	---------------------------------------------
	IF @料金収受センター = @依頼先組織ＣＤ BEGIN 
		SET @DATA_MAKE_FLG = '0'
		GOTO MAIN_MODORI_01
	END
	
	
	
	DECLARE @WK_SOSHIKI_CD  CHAR(5)
	SET @WK_SOSHIKI_CD = @料金収受センター
	
	
	
	WHILE 1 = 1	BEGIN
		
		
		
		DECLARE @IRAISAKI_SOSHIKI CHAR(5)
		SET @IRAISAKI_SOSHIKI = ''
		SELECT @IRAISAKI_SOSHIKI = ISNULL(IRAISAKI_SOSHIKI_CD,'')
		FROM   T_JUCHU_SYOSAI
		WHERE  UKETSUKE_NO = @受付番号
		AND    SOSHIKI_CD  = @WK_SOSHIKI_CD
		AND    DELETE_FLG  = '0'
		
		
		
		
		-------------------------------------------------
		-- 料金収受センターから見て依頼先なので作成する
		-------------------------------------------------
		IF @IRAISAKI_SOSHIKI = @依頼先組織ＣＤ BEGIN
			SET @DATA_MAKE_FLG = '1'
			GOTO MAIN_MODORI_01
		END
		
		
		
		---------------------------------------------------
		-- 料金収受センターから見て依頼元なので作成しない
		---------------------------------------------------
		IF  @IRAISAKI_SOSHIKI = '' BEGIN
			SET @DATA_MAKE_FLG = '0'
			GOTO MAIN_MODORI_01
		END
		
		
		
		---------------------------------------------------
		-- 次の依頼先データを確認
		---------------------------------------------------
		IF  @IRAISAKI_SOSHIKI <> '' BEGIN
			SET @WK_SOSHIKI_CD = @IRAISAKI_SOSHIKI
		END
		
		
	END
	
	
	
	SET @DATA_MAKE_FLG = '0'
	GOTO MAIN_MODORI_01
	
	
	
	
	
	
	
	
ERROR_HANDLER:
  IF CURSOR_STATUS('global','AB0106_CUR00') = 1 
    BEGIN
       --  ｶｰｿﾙCLOSE
       CLOSE AB0106_CUR00
       --  ｶｰｿﾙ削除
       DEALLOCATE AB0106_CUR00
    END


  SET @LOG_MSG = @PRC_NM + ' SQLエラー発生 Status:'+CONVERT(VARCHAR(10),@ERR)
  EXEC WRITE_PRCLOG 'AB0103',@受付番号,@精算元組織コード,'E',@LOG_MSG

  RETURN @ERR

END





GO

