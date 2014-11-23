USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0101]    Script Date: 07/31/2014 11:38:22 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


--精算受注クレジットデータの作成
CREATE PROCEDURE [dbo].[SP_AB0101](
  @iMode INT
)
AS


DECLARE
  @精算年月                 char(6),    
  @精算元組織ＣＤ           char(5),    
  @精算先組織ＣＤ           char(5),    
  @受付番号                 char(8),    
  @センターＣＤ             char(5),    
  @受付日                   char(8),    
  @顧客名                   varchar(16),
  @請求先区分ＣＤ           char(1),    
  @決済手段ＣＤ             char(1),    
  @カード会社ＣＤ           char(2),    
  @顧客請求日               char(8),    
  @顧客請求金額             decimal(10),
  @顧客請求内税金額         decimal(10),			--2004/07/09 ADD EBISUI@KOS
  @顧客立替金額             decimal(10),			--2004/07/09 ADD EBISUI@KOS
  @顧客消費税率             decimal(3), 
  @顧客消費税額             decimal(10),
  @顧客請求合計             decimal(10),
  @精算日                   char(8),    
  @卸日                     char(8),    
  @受注更新日               char(17),   
  @受注担当者ＣＤ           char(10),   
  @更新日時                 char(17),   
  @更新者ID                 char(10),   
  @画面ID                   char(6),    
  @削除ﾌﾗｸﾞ                 char(1),    
  @上部組織ＣＤ             char(5),    
  @組織ＣＤ                 char(5),    
  @LOG_MSG                  varchar(200),
  @消費税区分               char(1),
  @ERR                      int
  
  
  
  
  
  
  
  
 -- ========== Str 2008/08/13 Ins SYS_Ohki ==========
 	-------------------------------------------------
 	-- 引越請求データ用、支払データ用
 	-------------------------------------------------
	DECLARE
	@依頼元組織ＣＤ_引越   	char(5),
	@依頼先組織ＣＤ_引越   	char(5),
	@受付番号_引越         	char(8),
	@受付日_引越           	char(8),
	@取扱区分ＣＤ_引越	 	char(2),
	@法人ＣＤ_引越         	char(9),
	@法人担当者名_引越     	varchar(20),
	@経由ＣＤ_引越         	char(2),
	@請求先区分ＣＤ_引越   	char(1),
	@顧客名_引越           	varchar(16),
	@請求金額_引越         	decimal(10),
	@請求内税金額_引越     	decimal(10),
	@立替金額_引越         	decimal(10),
	@消費税_引越           	decimal(10),
	@受注日_引越           	char(8),
	@精算日_引越           	char(8),
	@卸日_引越             	char(8),
	@受注更新日_引越       	char(17),
	@受注担当者ＣＤ_引越   	char(10),
	@組織区分_引越         	char(1),
	@組織区分1_引越        	char(1),
	@消費税区分１_引越	  	char(1),
	@精算元組織コード_引越  char(5),
	@精算先組織コード_引越  char(5),
	@請求支払区分_引越      char(1),
	@請求内税税抜額_引越    decimal(10),
	@消費税区分_引越        char(1),
	@請求金額区分_引越      char(1),
	@センターＣＤ_引越      char(5)
-- ========== End 2008/08/13 Ins SYS_Ohki ==========
  
  
BEGIN
  
  
  SELECT @精算年月 = SEISAN_TUKI_JUCHU FROM M_SEISAN_KANRI
  SELECT @更新日時 = REPLACE(REPLACE(CONVERT(CHAR(19),GETDATE(),120),'-',''),':','')
  SELECT @更新者ID = 'BATCH'
  SELECT @画面ID = 'AB0101'
  SELECT @削除ﾌﾗｸﾞ = '0'
  SELECT @ERR = @@ERROR
  IF @ERR <> 0 GOTO ERROR_HANDLER
  
  
  
  
  
  
  --精算データ削除（本締め時のみ実行）
  DELETE T_SEISAN_CREDIT
  WHERE SEIKYU_YM = @精算年月
  SELECT @ERR = @@ERROR
  IF @ERR <> 0 GOTO ERROR_HANDLER
  
  
  
  
  
  
  
  -- ========== Str 2008/08/13 Ins SYS_Ohki ==========
  ----------------------------------------------------
  -- 精算受注のデータを削除。
  -- 変更前はSP_AB0103のロジックでした。
  -- しかし、クレジットデータでも精算受注データの作成が
  -- 必要となったため、ここで削除を実施します。
  -- SP_AB0103の方では削除をやめます。
  ----------------------------------------------------
  DELETE T_SEISAN_JUCHU
  WHERE SEIKYU_YM = @精算年月
  SELECT @ERR = @@ERROR
  IF @ERR <> 0 GOTO ERROR_HANDLER
  -- ========== End 2008/08/13 Ins SYS_Ohki ==========
  
  
  
  
  
/*
  2004.07.14 最終全依頼先センターでデータを作成する
　　データ作成仕様（流れ）は以下のとおり
　　　　最終依頼先センター
　　　　　↓　　←精算元：センター　精算先：所属する本部
　　　　所属する本部
　　　　　↓　　←精算元：所属する本部　精算先：連合会
　　　　連合会
*/
--↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓--
/*
  2008.08.13　仕様変更：料金収受センターに登録されている組織でデータを作成する。
　　データ作成仕様（流れ）は以下のとおり
　　　　料金収受センターに登録されている組織
　　　　　↓　　←精算元：センター　精算先：所属する本部
　　　　所属する本部
　　　　　↓　　←精算元：所属する本部　精算先：連合会
　　　　連合会
*/
/*
  2008.12.08　仕様変更：センター⇔本部、本部⇔連合会のﾃﾞｰﾀは作成しない。
                        新たにセンター⇔連合会でのﾃﾞｰﾀのみを作成する。
*/

 DECLARE  AB0101_CUR00  CURSOR  FOR
    SELECT  MS.JYOBU_SOSHIKI_CD    AS JYOBU_SOSHIKI_CD,        --組織マスタ.上部組織ＣＤ
            TS.SOSHIKI_CD          AS SOSHIKI_CD,              --受注詳細テーブル.組織ＣＤ
            TK.UKETSUKE_NO         AS UKETSUKE_NO,             --受注基本テーブル.受付番号
            TK.UKETSUKE_DT         AS UKETSUKE_DT,             --受注基本テーブル.受付日
            TK.KOKYAKUMEI          AS KOKYAKUMEI,              --受注基本テーブル.顧客名
            TK.KOKYAKU_SEIKYU_KBN  AS KOKYAKU_SEIKYU_KBN,      --受注基本テーブル.請求先区分ＣＤ
            TK.KESSAI_KBN          AS KESSAI_KBN,              --受注基本テーブル.決済手段ＣＤ
            TK.CREDITCARD_CD       AS CREDITCARD_CD,           --受注基本テーブル.カード会社ＣＤ
            TK.KOKYAKU_SEIKYU_DT   AS KOKYAKU_SEIKYU_DT,       --受注基本テーブル.顧客請求日
            --2004/07/09 MODIFY EBISUI@KOS START
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    0
                ELSE
                    TR.RYOKIN_SHOKEI  +
                    TR.RYOKIN_NEBIKI_GK1
            END AS KOKYAKU_SEIKYU_GK,                          --顧客請求金額
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    TR.RYOKIN_SHOKEI
                ELSE
                    dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
            END AS KOKYAKU_SEIKYU_UTIZEI_GK,                   --顧客請求内税金額
            TR.RYOKIN_6 AS KOKYAKU_TATEKAE_GK,                 --顧客立替金額
            --2004/07/09 MODIFY EBISUI@KOS END
            TR.SHOHIZEI_RT         AS KOKYAKU_SHOHIZEI_RT,     --料金情報テーブル 消費税率
            --2004/07/09 MODIFY EBISUI@KOS START
            TR.SHOHIZEI_GK +
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    0
                ELSE
                    TR.RYOKIN_NEBIKI_GK - dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
            END
            AS SHOHIZEI_GK,                                    --消費税額(発)
            TR.RYOKIN_KEI          AS KOKYAKU_SEIKYU_KEI,      --料金情報テーブル 料金合計
            --2004/07/09 MODIFY EBISUI@KOS END
            TK.SEISAN_DT           AS SEISAN_DT,               --受注詳細テーブル.精算日
            TG.SAGYO_DT            AS SAGYO_DT,                --業務情報テーブル.作業日
            TS.UPDATE_DT           AS UPDATE_DT,               --受注詳細テーブル.更新日時
            TS.UKETSUKE_TANTO_CD   AS UKETSUKE_TANTO_CD        --受注詳細テーブル.受付担当ＣＤ
            ,TR.SHOHIZEI_KBN                                   --消費税区分 2004.07.18 Add 
      FROM  T_JUCHU_SYOSAI AS TS
            INNER JOIN T_JUCHU_KIHON  AS TK 
              ON (TS.UKETSUKE_NO  = TK.UKETSUKE_NO)
              -- ========== Str 2008/08/13 Ins SYS_Ohki ==========
              -- 料金収受センターをJOINの条件に追加 --
              AND (TS.SOSHIKI_CD  = TK.RYOKIN_SYUJU_CD)
              -- ========== End 2008/08/13 Ins SYS_Ohki ==========
            INNER JOIN M_SOSHIKI      AS MS
              ON (TS.SOSHIKI_CD  = MS.SOSHIKI_CD)
            INNER JOIN T_JUCHU_RYOKIN AS TR
              ON (TS.UKETSUKE_NO = TR.UKETSUKE_NO
              AND TS.SOSHIKI_CD  = TR.SOSHIKI_CD)
            LEFT JOIN W_JUCHU_SEISAN TG
              ON (TS.UKETSUKE_NO = TG.UKETSUKE_NO)
      WHERE MS.SOSHIKI_KBN     = '3'                  --最終依頼先の組織区分が「3:センター」
        AND TS.SEISAN_MAKE_FLG = '0'                  --精算データが未作成
        -- ========== Str 2008/08/13 Del SYS_Ohki ==========
        --AND TS.IRAISAKI_SOSHIKI_CD IS NULL            --全依頼先が登録されていない→最終依頼先
        -- ========== End 2008/08/13 Del SYS_Ohki ==========
        AND TS.IRAI_SHUBETSU_CD IN ('0','1')          --依頼種別が自社又は全依頼
        AND TS.DELETE_FLG      = '0'                  --受注詳細が削除されていない
        AND TK.DELETE_FLG      = '0'                  --受注基本が削除されていない
        AND TK.KESSAI_KBN      = '2'                  --決済区分＝2:クレジット
        AND TK.JUCHU_STS_CD    = '05'                 --受注ステータスが「05:配達完了」
        AND TK.SEISAN_DT       LIKE @精算年月 + '%'   --精算日が精算管理テーブルの精算年月に該当する
		
        
        
/*
    --センター受注
    SELECT  MS.JYOBU_SOSHIKI_CD    AS JYOBU_SOSHIKI_CD,        --組織マスタ.上部組織ＣＤ
            TK.UKETSUKE_SOSHIKI_CD AS UKETSUKE_SOSHIKI_CD,     --受注基本テーブル.受付組織ＣＤ
            TK.UKETSUKE_NO         AS UKETSUKE_NO,             --受注基本テーブル.受付番号
            TK.UKETSUKE_DT         AS UKETSUKE_DT,             --受注基本テーブル.受付日
            TK.KOKYAKUMEI          AS KOKYAKUMEI,              --受注基本テーブル.顧客名
            TK.KOKYAKU_SEIKYU_KBN  AS KOKYAKU_SEIKYU_KBN,      --受注基本テーブル.請求先区分ＣＤ
            TK.KESSAI_KBN          AS KESSAI_KBN,              --受注基本テーブル.決済手段ＣＤ
            TK.CREDITCARD_CD       AS CREDITCARD_CD,           --受注基本テーブル.カード会社ＣＤ
            TK.KOKYAKU_SEIKYU_DT   AS KOKYAKU_SEIKYU_DT,       --受注基本テーブル.顧客請求日
            --2004/07/09 MODIFY EBISUI@KOS START
            TR.RYOKIN_SHOKEI  +
            TR.RYOKIN_NEBIKI_GK1  AS KOKYAKU_SEIKYU_GK,        --顧客請求金額
            dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.SEISAN_DT))    AS KOKYAKU_SEIKYU_UTIZEI_GK,    --顧客請求内税金額
            TR.RYOKIN_6 AS KOKYAKU_TATEKAE_GK,                 --顧客立替金額
            --2004/07/09 MODIFY EBISUI@KOS END
            TR.SHOHIZEI_RT         AS KOKYAKU_SHOHIZEI_RT,     --料金情報テーブル 消費税率
            --2004/07/09 MODIFY EBISUI@KOS START
            TR.SHOHIZEI_GK +
            TR.RYOKIN_NEBIKI_GK - dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.SEISAN_DT))
            AS SHOHIZEI_GK,                                    --消費税額(発)
            TR.RYOKIN_KEI          AS KOKYAKU_SEIKYU_KEI,      --料金情報テーブル 料金合計
            --2004/07/09 MODIFY EBISUI@KOS END
            TK.SEISAN_DT           AS SEISAN_DT,               --受注詳細テーブル.精算日
            TG.SAGYO_DT            AS SAGYO_DT,                --業務情報テーブル.作業日
            TS.UPDATE_DT           AS UPDATE_DT,               --受注詳細テーブル.更新日時
            TS.UKETSUKE_TANTO_CD   AS UKETSUKE_TANTO_CD        --受注詳細テーブル.受付担当ＣＤ
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
        AND TK.JUCHU_STS_CD    = '05'                 --受注ステータスが「05:配達完了」
        AND TK.SEISAN_DT       LIKE @精算年月 + '%'   --精算日が精算管理テーブルの精算年月に該当する
        AND TK.KESSAI_KBN      = '2'                  --決済区分＝2:クレジット
        AND TS.SEISAN_MAKE_FLG = '0'                  --精算データが未作成
        AND MS.SOSHIKI_KBN     = '3'                  --受注箇所の組織区分が「3:センター」
    UNION 
    --本部紹介
    SELECT  MS1.JYOBU_SOSHIKI_CD  AS JYOBU_SOSHIKI_CD,       --組織マスタ.上部組織ＣＤ
            TS1.SOSHIKI_CD        AS IRAISAKI_SOSHIKI_CD,    --受注詳細テーブル.組織ＣＤ
            TK.UKETSUKE_NO        AS UKETSUKE_NO,            --受注基本テーブル.受付番号
            TK.UKETSUKE_DT        AS UKETSUKE_DT,            --受注基本テーブル.受付日
            TK.KOKYAKUMEI         AS KOKYAKUMEI,             --受注基本テーブル.顧客名
            TK.KOKYAKU_SEIKYU_KBN AS KOKYAKU_SEIKYU_KBN,     --受注基本テーブル.請求先区分ＣＤ
            TK.KESSAI_KBN         AS KESSAI_KBN,             --受注基本テーブル.決済手段ＣＤ
            TK.CREDITCARD_CD      AS CREDITCARD_CD,          --受注基本テーブル.カード会社ＣＤ
            TK.KOKYAKU_SEIKYU_DT  AS KOKYAKU_SEIKYU_DT,      --受注基本テーブル.顧客請求日
            --2004/07/09 MODIFY EBISUI@KOS START
            TR.RYOKIN_SHOKEI  +
            TR.RYOKIN_NEBIKI_GK1  AS KOKYAKU_SEIKYU_GK,        --顧客請求金額
            dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.SEISAN_DT))    AS KOKYAKU_SEIKYU_UTIZEI_GK,    --顧客請求内税金額
            TR.RYOKIN_6 AS KOKYAKU_TATEKAE_GK,                 --顧客立替金額
            --2004/07/09 MODIFY EBISUI@KOS END
            TR.SHOHIZEI_RT         AS KOKYAKU_SHOHIZEI_RT,     --料金情報テーブル 消費税率
            --2004/07/09 MODIFY EBISUI@KOS START
            TR.SHOHIZEI_GK +
            TR.RYOKIN_NEBIKI_GK - dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.SEISAN_DT))
            AS SHOHIZEI_GK,                                    --消費税額(発)
            TR.RYOKIN_KEI          AS KOKYAKU_SEIKYU_KEI,      --料金情報テーブル 料金合計
            --2004/07/09 MODIFY EBISUI@KOS END
            TK.SEISAN_DT          AS SEISAN_DT,              --受注詳細テーブル.精算日
            TG.SAGYO_DT           AS SAGYO_DT,               --業務情報テーブル.作業日
            TS1.UPDATE_DT         AS UPDATE_DT,              --受注詳細テーブル.更新日時
            TS1.UKETSUKE_TANTO_CD AS UKETSUKE_TANTO_CD       --受注詳細テーブル.受付担当ＣＤ
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
*/ 
   
   
	
	  --  ｶｰｿﾙOPEN
	  OPEN  AB0101_CUR00
	  FETCH  NEXT FROM AB0101_CUR00 INTO
	         @上部組織ＣＤ,
	         @組織ＣＤ,
	         @受付番号,
	         @受付日,
	         @顧客名,
	         @請求先区分ＣＤ,
	         @決済手段ＣＤ,
	         @カード会社ＣＤ,
	         @顧客請求日,
	         @顧客請求金額,
	         @顧客請求内税金額,			--2004/07/09 ADD EBISUI@KOS
	         @顧客立替金額,				--2004/07/09 ADD EBISUI@KOS
	         @顧客消費税率,
	         @顧客消費税額,
	         @顧客請求合計,
	         @精算日,
	         @卸日,
	         @受注更新日,
	         @受注担当者ＣＤ,
	         @消費税区分
	         
	         
	         
	         
	         
		WHILE (@@FETCH_STATUS = 0) BEGIN
			
			
			
		    /* ==================== Str 2008/12/08 Del SYS_Ohki ==================== */
		    ---------------------------------------------------------------------------
		    -- センター⇔本部のﾃﾞｰﾀは必要ないので作成しない
		    -- 新たにセンター⇔連合会間のデータを作成する。
		    ---------------------------------------------------------------------------
		    /*
			SET @精算元組織ＣＤ = @組織ＣＤ
			SET @精算先組織ＣＤ = @上部組織ＣＤ
			SET @センターＣＤ   = @精算元組織ＣＤ
			
			
			
			IF (@精算元組織ＣＤ IS NULL)  BEGIN		  	
				SET @LOG_MSG = '精算元組織ＣＤ取得できず '
				EXEC WRITE_PRCLOG 'AB0101',@受付番号,@精算先組織ＣＤ,'W',@LOG_MSG
				GOTO NEXT_READ
		    END
		    
		    
		    
		    IF (@センターＣＤ IS NULL)  BEGIN
				SET @LOG_MSG = 'センターＣＤ取得できず '
				EXEC WRITE_PRCLOG 'AB0101',@受付番号,@精算先組織ＣＤ,'W',@LOG_MSG
				GOTO NEXT_READ
		    END
		    
		    
		    
		    INSERT INTO T_SEISAN_CREDIT (
		      SEIKYU_YM,
		      MOTO_SOSHIKI_CD,
		      SAKI_SOSHIKI_CD,
		      UKETSUKE_NO,
		      CENTER_CD,
		      UKETSUKE_DT,
		      KOKYAKUMEI,
		      KOKYAKU_SEIKYU_KBN,
		      KESSAI_KBN,
		      CREDITCARD_CD,
		      CREDIT_SHIHARAI_SU,
		      KOKYAKU_SEIKYU_DT,
		      KOKYAKU_SEIKYU_GK,
		      KOKYAKU_SEIKYU_UTIZEI_GK,		--2004/07/09 ADD EBISUI@KOS
		      KOKYAKU_TATEKAE_GK,			--2004/07/09 ADD EBISUI@KOS
		      SHOHIZEI_KBN,
		      KOKYAKU_SHOHIZEI_RT,
		      KOKYAKU_SHOHIZEI_GK,
		      KOKYAKU_SEIKYU_KEI,
		      SEISAN_DT,
		      OROSHI_DT,
		      JUCHU_UPDATE_DT,
		      JUCHU_TNT_CD,
		      UPDATE_DT,
		      UPDATE_TNT_ID,
		      GAMEN_ID,
		      DELETE_FLG
		      )
		    VALUES(
		      @精算年月,
		      @精算元組織ＣＤ,
		      @精算先組織ＣＤ,
		      @受付番号,
		      @センターＣＤ,
		      @受付日,
		      @顧客名,
		      @請求先区分ＣＤ,
		      @決済手段ＣＤ,
		      @カード会社ＣＤ,
		      '1',
		      @顧客請求日,
		      @顧客請求金額,
		      @顧客請求内税金額,			--2004/07/09 ADD EBISUI@KOS
		      @顧客立替金額,				--2004/07/09 ADD EBISUI@KOS
		      @消費税区分,
		      @顧客消費税率,
		      @顧客消費税額,
		      @顧客請求合計,
		      @精算日,
		      @卸日,
		      @受注更新日,
		      @受注担当者ＣＤ,
		      @更新日時,
		      @更新者ID,
		      @画面ID,
		      @削除ﾌﾗｸﾞ
		    )
		    
		    SELECT @ERR = @@ERROR
		    IF @ERR <> 0 GOTO ERROR_HANDLER
		    */
		    /* ==================== End 2008/12/08 Del SYS_Ohki ==================== */
		    
		    
		    SELECT @精算先組織ＣＤ = JYOBU_SOSHIKI_CD 
		    FROM   M_SOSHIKI
		    WHERE  SOSHIKI_CD = @上部組織ＣＤ
		    
		    
		    IF (@上部組織ＣＤ IS NULL) BEGIN
				SET @LOG_MSG = '上部組織ＣＤ取得できず '
				EXEC WRITE_PRCLOG 'AB0101',@受付番号,@精算先組織ＣＤ,'W',@LOG_MSG
				GOTO NEXT_READ
		    END
		    
		    
		    /* ==================== Str 2008/12/08 Upd SYS_Ohki ==================== */
		    ---------------------------------------------------------------------------
		    -- センター⇔連合会間のデータ
		    ---------------------------------------------------------------------------
		    --SET @精算元組織ＣＤ = @上部組織ＣＤ
		    SET @精算元組織ＣＤ = @組織ＣＤ
		    SET @センターＣＤ   = @精算元組織ＣＤ
		    /* ==================== End 2008/12/08 Upd SYS_Ohki ==================== */
		    
		    
		    INSERT INTO T_SEISAN_CREDIT (
		      SEIKYU_YM,
		      MOTO_SOSHIKI_CD,
		      SAKI_SOSHIKI_CD,
		      UKETSUKE_NO,
		      CENTER_CD,
		      UKETSUKE_DT,
		      KOKYAKUMEI,
		      KOKYAKU_SEIKYU_KBN,
		      KESSAI_KBN,
		      CREDITCARD_CD,
		      CREDIT_SHIHARAI_SU,
		      KOKYAKU_SEIKYU_DT,
		      KOKYAKU_SEIKYU_GK,
		      KOKYAKU_SEIKYU_UTIZEI_GK,		--2004/07/09 ADD EBISUI@KOS
		      KOKYAKU_TATEKAE_GK,			--2004/07/09 ADD EBISUI@KOS
		      SHOHIZEI_KBN,
		      KOKYAKU_SHOHIZEI_RT,
		      KOKYAKU_SHOHIZEI_GK,
		      KOKYAKU_SEIKYU_KEI,
		      SEISAN_DT,
		      OROSHI_DT,
		      JUCHU_UPDATE_DT,
		      JUCHU_TNT_CD,
		      UPDATE_DT,
		      UPDATE_TNT_ID,
		      GAMEN_ID,
		      DELETE_FLG
		      )
		    VALUES(
		      @精算年月,
		      @精算元組織ＣＤ,
		      @精算先組織ＣＤ,
		      @受付番号,
		      @センターＣＤ,
		      @受付日,
		      @顧客名,
		      @請求先区分ＣＤ,
		      @決済手段ＣＤ,
		      @カード会社ＣＤ,
		      '1',
		      @顧客請求日,
		      @顧客請求金額,
		      @顧客請求内税金額,			--2004/07/09 ADD EBISUI@KOS
		      @顧客立替金額,				--2004/07/09 ADD EBISUI@KOS
		      @消費税区分,
		      @顧客消費税率,
		      @顧客消費税額,
		      @顧客請求合計,
		      @精算日,
		      @卸日,
		      @受注更新日,
		      @受注担当者ＣＤ,
		      @更新日時,
		      @更新者ID,
		      @画面ID,
		      @削除ﾌﾗｸﾞ
		    )
		    
		    
		    SELECT @ERR = @@ERROR
		    IF @ERR <> 0 GOTO ERROR_HANDLER
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    /* ================================ Str 2008/08/13 Ins SYS_Ohki ================================ */
		    ------------------------------------------------------
		    -- 最終依頼先組織コードを取得
		    ------------------------------------------------------
		    DECLARE @SAISYU_SOSHIKI_CD		char(5)        
		    SET @SAISYU_SOSHIKI_CD = NULL                  
		    SELECT  @SAISYU_SOSHIKI_CD  =  SOSHIKI_CD      
			FROM    T_JUCHU_SYOSAI                         
			WHERE IRAI_SHUBETSU_CD IN ('0','1')            
			AND   IRAISAKI_SOSHIKI_CD IS NULL              
			AND   IRAIMOTO_SOSHIKI_CD IS NOT NULL		   
			AND   DELETE_FLG         = '0'                 
			AND   SEISAN_MAKE_FLG    = '0'                 
			AND   UKETSUKE_NO        = @受付番号           
		    
		    
			
		    
		    
		    ------------------------------------------------------
		    -- クレジット収受組織と最終依頼先コードが同じ場合は
		    -- 引越請求データの作成は無し。
		    -- A ⇒ B ⇒ C ⇒ 料金収受センターが C の場合
		    -- またはCセンターオンリーの場合は次レコードへ
		    ------------------------------------------------------
		    IF @SAISYU_SOSHIKI_CD IS NULL      GOTO NEXT_READ
		    IF @組織ＣＤ = @SAISYU_SOSHIKI_CD  GOTO NEXT_READ
		    
		    
		    
		    
		    
		    
		    ------------------------------------------------------
		    -- 最終依頼先組織コードを組織コードワークに代入
		    ------------------------------------------------------
		    DECLARE @WK_SOSHIKI_CD    CHAR(5)
		    SET @WK_SOSHIKI_CD = @SAISYU_SOSHIKI_CD
		    
		    
		    
		    
		    
		    
		    
		    
		    -------------------------------------------------------------
		    -- A ⇒ B ⇒ C ⇒ D  Dから順に請求支払データを作成する       
		    -- 料金収受センター と組織コードが同じになったら次レコードへ 
		    -------------------------------------------------------------
		    WHILE 1 = 1	BEGIN
		    	
		    	
				
		  	    ------------------------------------------------------
		        -- 引越請求支払データ作成処理へ                       
		    	------------------------------------------------------
		    	GOTO  CREDITE_HIKKOSHI_SEIKYUDATA_MAKE
		    	MAIN_MODORI:
		    	
		    	
				
				
		  	    ------------------------------------------------------
		        -- クレジット収受組織と最終依頼先コードが同じ場合は
		    	-- 引越請求データの作成は無し。
		    	------------------------------------------------------
		    	IF @依頼元組織ＣＤ_引越 IS NULL      GOTO NEXT_READ
				IF @依頼元組織ＣＤ_引越 = @組織ＣＤ  GOTO NEXT_READ
				
				
				
		  	    ------------------------------------------------------
		        -- 依頼元組織コードをワーク組織コードへセット。
		    	------------------------------------------------------
		  		SET @WK_SOSHIKI_CD  =  @依頼元組織ＣＤ_引越
		  		
		  		
		  		
		    END
		    /* ================================ End 2008/08/13 Ins SYS_Ohki ================================ */
		    
		    
		    
		    
		    
			NEXT_READ:
			    FETCH  NEXT FROM AB0101_CUR00 INTO
			         @上部組織ＣＤ,
			         @組織ＣＤ,
			         @受付番号,
			         @受付日,
			         @顧客名,
			         @請求先区分ＣＤ,
			         @決済手段ＣＤ,
			         @カード会社ＣＤ,
			         @顧客請求日,
			         @顧客請求金額,
			         @顧客請求内税金額,			--2004/07/09 ADD EBISUI@KOS
			         @顧客立替金額,				--2004/07/09 ADD EBISUI@KOS
			         @顧客消費税率,
			         @顧客消費税額,
			         @顧客請求合計,
			         @精算日,
			         @卸日,
			         @受注更新日,
			         @受注担当者ＣＤ,
			         @消費税区分
			         
			         
  END
  
  
  
  
  --  ｶｰｿﾙCLOSE
  CLOSE AB0101_CUR00
  --  ｶｰｿﾙ削除
  DEALLOCATE AB0101_CUR00    
  
  --日付形式を変換する
  UPDATE T_SEISAN_CREDIT SET JUCHU_UPDATE_DT =
      REPLACE(REPLACE(CONVERT(CHAR(19),CONVERT(DATETIME,'20'+REPLACE(JUCHU_UPDATE_DT,'/','-'),120),120),'-',''),':','')
  WHERE SEIKYU_YM = @精算年月
  SELECT @ERR = @@ERROR
  IF @ERR <> 0 GOTO ERROR_HANDLER
  
  RETURN 0
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
-- ============================== Str 2008/08/13 Ins SYS_Ohki ==============================
--------------------------------------------------------------------------------------------
--   請求データ、支払データの作成処理
--------------------------------------------------------------------------------------------
CREDITE_HIKKOSHI_SEIKYUDATA_MAKE:
	
	
	
	----------------------------------------------------------------------------------
	-- 請求データ作成カーソル定義
	----------------------------------------------------------------------------------
	DECLARE SEIKYU_SHIHARAI_CUR  CURSOR  FOR
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
	        	WHEN TR.SHOHIZEI_KBN = '2' THEN  0
	        	ELSE TR.RYOKIN_SHOKEI+ TR.RYOKIN_NEBIKI_GK1
	    	END                    AS SEIKYU_GK,           --請求金額
	    	CASE
	        	WHEN TR.SHOHIZEI_KBN = '2' THEN TR.RYOKIN_SHOKEI
	        	ELSE dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
	    	END                    AS SEIKYU_UTIZEI_GK,    --請求内税金額
	    	TR.RYOKIN_6            AS TATEKAE_GK,          --立替金額
	    	TR.SHOHIZEI_GK + 
	    	CASE
	        	WHEN TR.SHOHIZEI_KBN = '2' THEN 0
	        	ELSE TR.RYOKIN_NEBIKI_GK - dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
	    	END                    AS SHOHIZEI_GK,
	    	TS.JYUCHU_DT           AS JYUCHU_DT,
	    	TK.SEISAN_DT           AS SEISAN_DT,
	    	TG.SAGYO_DT            AS SAGYO_DT,
		    TS.UPDATE_DT           AS UPDATE_DT,
		    TS.UKETSUKE_TANTO_CD   AS UKETSUKE_TANTO_CD,
		    MS.SOSHIKI_KBN,
		    MS1.SOSHIKI_KBN,
		    TR.SHOHIZEI_KBN
		    
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
	AND   TS.IRAI_SHUBETSU_CD IN ('0','1')  
	AND   TS.DELETE_FLG           = '0'     
	AND   TK.DELETE_FLG           = '0'     
	AND   TK.JUCHU_STS_CD         = '05'    
	AND   TK.SEISAN_DT         LIKE @精算年月 + '%' 
	AND   TR.DELETE_FLG           = '0' 		    
	AND   TS.UKETSUKE_NO          = @受付番号       
	AND   TS.SOSHIKI_CD           = @WK_SOSHIKI_CD  
	AND   TS.IRAIMOTO_SOSHIKI_CD IS NOT NULL        
	
	
	
	
	
	--  ｶｰｿﾙOPEN
  	OPEN  SEIKYU_SHIHARAI_CUR
  	FETCH  NEXT FROM SEIKYU_SHIHARAI_CUR INTO
      @依頼元組織ＣＤ_引越,
      @依頼先組織ＣＤ_引越,
      @受付番号_引越,
      @受付日_引越,
      @取扱区分ＣＤ_引越,
      @法人ＣＤ_引越,
      @法人担当者名_引越,
      @経由ＣＤ_引越,
      @請求先区分ＣＤ_引越,
      @顧客名_引越,
      @請求金額_引越,
      @請求内税金額_引越,			--2004/07/09 ADD EBISUI@KOS
      @立替金額_引越,				--2004/07/09 ADD EBISUI@KOS
      @消費税_引越,
      @受注日_引越,
      @精算日_引越,
      @卸日_引越,
      @受注更新日_引越,
      @受注担当者ＣＤ_引越,
      @組織区分_引越,
      @組織区分1_引越,
      @消費税区分１_引越
      
      
      
      
  	IF (@@FETCH_STATUS = 0)  BEGIN
  	    
	  	
	    --全依頼分精算受注データを作成する。（請求）--------------------------------------------------------
	    --１）（請求） 依頼先　→　連合会
	    SET @精算元組織コード_引越 = @依頼先組織ＣＤ_引越
	    SET @精算先組織コード_引越 = @依頼元組織ＣＤ_引越
	    SET @請求支払区分_引越 = '1'					--１：請求、２：支払
	    
	    
	    
	    -- 2004.07.21 抽出SQL内で計算
	    --SET @請求内税税抜額 = dbo.GET_BEFORE_TAX(@請求内税金額,dbo.GET_TAX_RT(@精算日))      -- 2004/07/09 ADD EBISUI@KOS
	    SET @請求内税税抜額_引越 = @請求内税金額_引越
	    SET @センターＣＤ_引越 = @依頼先組織ＣＤ_引越
	    SET @消費税区分_引越 = @消費税区分１_引越					--１：非課税、２：内税、３：外税
	    SET @請求金額区分_引越 = '1'							    --１：通常、２：賦課金
	    
		
		
	    -- 2004.07.21 ロジック廃止(抽出SQL内で計算)
	    --SET @消費税 = @消費税 + (@請求内税金額 - @請求内税税抜額) 
		
		
		
	    IF (@依頼先組織ＣＤ_引越 IS NULL) 
	    BEGIN
	      SET @LOG_MSG = '依頼先組織ＣＤ取得できず '
	      EXEC WRITE_PRCLOG 'AB0101',@受付番号_引越,@依頼元組織ＣＤ_引越,'W',@LOG_MSG
	      GOTO NEXT_READ
	    END
	    
	    
		
	    IF (@センターＣＤ_引越 IS NULL) 
	    BEGIN
	      SET @LOG_MSG = 'センターＣＤ取得できず '
	      EXEC WRITE_PRCLOG 'AB0101',@受付番号_引越,@依頼元組織ＣＤ_引越,'W',@LOG_MSG
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
	      @精算元組織コード_引越,
	      @精算先組織コード_引越,
	      @受付番号_引越,
	      @請求支払区分_引越,
	      @センターＣＤ_引越,
	      @受付日_引越,
	      @取扱区分ＣＤ_引越,
	      @法人ＣＤ_引越,
	      @法人担当者名_引越,
	      @経由ＣＤ_引越,
	      @請求先区分ＣＤ_引越,
	      @顧客名_引越,
	      @請求金額_引越,
	      @請求内税税抜額_引越,		--2004/07/09 ADD EBISUI@KOS
	      @立替金額_引越,			--2004/07/09 ADD EBISUI@KOS  
	      @消費税区分_引越,
	      @消費税_引越,
	      @受注日_引越,
	      @精算日_引越,
	      @卸日_引越,
	      @受注更新日_引越,
	      @受注担当者ＣＤ_引越,
	      @請求金額区分_引越,
	      @更新日時,
	      @更新者ID,
	      @画面ID,
	      @削除ﾌﾗｸﾞ
	    )
	    
	    
	    
	    
	    SELECT @ERR = @@ERROR
	    IF @ERR <> 0 GOTO ERROR_HANDLER
	    
	    
	    
	    --全依頼分精算受注データを作成する。（支払）--------------------------------------------------------
	    --２）（支払） 組織　→　依頼先
	    
		
	    SET @精算元組織コード_引越 = @依頼元組織ＣＤ_引越
	    SET @精算先組織コード_引越 = @依頼先組織ＣＤ_引越
	    SET @請求支払区分_引越 = '2'					--１：請求、２：支払
	    
	    
	    
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
	      @精算元組織コード_引越,
	      @精算先組織コード_引越,
	      @受付番号_引越,
	      @請求支払区分_引越,
	      @センターＣＤ_引越,
	      @受付日_引越,
	      @取扱区分ＣＤ_引越,
	      @法人ＣＤ_引越,
	      @法人担当者名_引越,
	      @経由ＣＤ_引越,
	      @請求先区分ＣＤ_引越,
	      @顧客名_引越,
	      @請求金額_引越,
	      @請求内税税抜額_引越,		--2004/07/09 ADD EBISUI@KOS
	      @立替金額_引越,			--2004/07/09 ADD EBISUI@KOS  
	      @消費税区分_引越,
	      @消費税_引越,
	      @受注日_引越,
	      @精算日_引越,
	      @卸日_引越,
	      @受注更新日_引越,
	      @受注担当者ＣＤ_引越,
	      @請求金額区分_引越,
	      @更新日時,
	      @更新者ID,
	      @画面ID,
	      @削除ﾌﾗｸﾞ
	    )
	    SELECT @ERR = @@ERROR
	    IF @ERR <> 0 GOTO ERROR_HANDLER
		
		
		
	END 
	
	
	
	CLOSE SEIKYU_SHIHARAI_CUR
	DEALLOCATE SEIKYU_SHIHARAI_CUR
	
	
	
	GOTO MAIN_MODORI
-- ============================== End 2008/08/13 Ins SYS_Ohki ==============================
  	
  	
  	
  	
  	
  	
  	
	
	
ERROR_HANDLER:
  IF CURSOR_STATUS('global','AB0101_CUR00') = 1 
    BEGIN
        --  ｶｰｿﾙCLOSE
       CLOSE AB0101_CUR00
       --  ｶｰｿﾙ削除
       DEALLOCATE AB0101_CUR00   
    END
  SET @LOG_MSG = 'SQLエラー発生 Status:'+CONVERT(VARCHAR(10),@ERR)
  EXEC WRITE_PRCLOG 'AB0101',@受付番号,@精算先組織ＣＤ,'E',@LOG_MSG
  RETURN @ERR
END



GO

