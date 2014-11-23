USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0102]    Script Date: 07/31/2014 11:38:34 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO



/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0102    スクリプト日付 : 2004/11/18 13:07:17 ******/

/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0102    スクリプト日付 : 2004/11/17 18:45:08 ******/

/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0102    スクリプト日付 : 2004/11/16 9:41:54 ******/


--精算受注小鳩データの作成
CREATE    PROCEDURE [dbo].[SP_AB0102](
  @iMode INT
)
AS
DECLARE
  @精算年月             char(6),
  @精算元組織コード     char(5),
  @精算先組織コード     char(5),
  @受付番号             char(8),
  @センターＣＤ         char(5),
  @受付日               char(8),
  @顧客名               varchar(16),
  @発着区分             char(1),
  @受注金額             decimal(10),
  @受注内税金額         decimal(10),			--2004/07/09 ADD EBISUI@KOS
  @立替金額             decimal(10),			--2004/07/09 ADD EBISUI@KOS
  @消費税区分           char(1),
  @消費税額             decimal(10),
  @業者依頼金額         decimal(10),
  @精算日               char(8),
  @BOX数                decimal(3),
  @バラ数               numeric(2),
  @顧客請求日           char(8),
  @作業日               char(8),
  @作業地郵便番号       char(8),
  @作業地市区郡ＣＤ     char(5),
  @作業地詳細           varchar(40),
  @本部ＣＤ             char(5),
  @デポＣＤ             char(5),
  @受注更新日           char(17),
  @受注担当者ＣＤ       char(10),
  @更新日時             char(17),
  @更新者ID             char(10),
  @画面ID               char(6),
  @削除ﾌﾗｸﾞ             char(1),
  @発デポＣＤ           char(5),
  @着デポＣＤ           char(5),
  @業務区分ＣＤ         char(1),
  @郵便番号             char(8),
  @市区郡ＣＤ           char(5),
  @作業地               varchar(40),
  @受注金額1            decimal(10),
  @消費税額1            decimal(10),
  @LOG_MSG              varchar(200),
  @連合会            char(5),	-- 2004/11/17 Add Hoshi
  @ERR                  int

BEGIN

  SELECT @精算年月 = SEISAN_TUKI_JUCHU FROM M_SEISAN_KANRI
  SELECT @更新日時 = REPLACE(REPLACE(CONVERT(CHAR(19),GETDATE(),120),'-',''),':','')
  SELECT @更新者ID = 'BATCH'
  SELECT @画面ID = 'AB0102'
  SELECT @削除ﾌﾗｸﾞ = '0'
--  SELECT @消費税区分 = '3'
  SELECT @業者依頼金額 = 0
  SELECT @ERR = @@ERROR
  IF @ERR <> 0 GOTO ERROR_HANDLER

-- >>>> 2004/11/17 Add Hoshi
  --連合会CD取得
  SELECT @連合会 = SOSHIKI_CD
    FROM M_SOSHIKI
    WHERE SOSHIKI_KBN = '1'
-- <<<< 2004/11/17 Add Hoshi

  
  --精算データ削除（本締め時のみ実行）
  DELETE T_SEISAN_KOBAT
  WHERE SEIKYU_YM = @精算年月
  SELECT @ERR = @@ERROR
  IF @ERR <>  0 GOTO ERROR_HANDLER

  DECLARE  AB0102_CUR00  CURSOR  FOR
    SELECT  '1',                                           --発着区分 発
            TKO.HATSU_HONBU_CD    AS HATSU_HONBU_CD,       --発本部ＣＤ
            TKO.HATSU_CENTER_CD   AS HATSU_CENTER_CD,      --発センターＣＤ
            TK.UKETSUKE_NO        AS UKETSUKE_NO,          --受付番号
            TK.UKETSUKE_DT        AS UKETSUKE_DT,          --受付日
            TK.KOKYAKUMEI         AS KOKYAKUMEI,           --顧客名

            --2004/07/09 MODIFY EBISUI@KOS START
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    0
                ELSE
                    TR.RYOKIN_SHOKEI  +
                    TR.RYOKIN_NEBIKI_GK1
            END AS JUCHU_GK,                               --受注金額
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    TR.RYOKIN_SHOKEI
                ELSE
                    dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
            END AS JUCHU_UCHIZEI_GK,                       --受注内税金額
            TR.RYOKIN_6 AS TATEKAE_GK,                     --立替金額
            TR.SHOHIZEI_GK +
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    0
                ELSE
                    TR.RYOKIN_NEBIKI_GK - dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
            END
            AS SHOHIZEI_GK,                                --消費税額(発)
            --2004/07/09 MODIFY EBISUI@KOS END

            TK.SEISAN_DT          AS SEISAN_DT,            --精算日
            --TKO.BOX_SU            AS BOX_SU,               --BOX数
            FLOOR(TKO.BOX_SU)     AS BOX_SU,               --BOX数 2004/10/25 Update Hoshi 切り捨て
            TKO.BOX_BARA          AS BOX_BARA,             --バラ数
            TK.KOKYAKU_SEIKYU_DT  AS KOKYAKU_SEIKYU_DT,    --顧客請求日
            TKO.MOCHIKOMI_DT      AS MOCHIKOMI_DT,         --持込日  
            TKO.HATSU_DEPOT_CD    AS HATSU_DEPOT_CD,       --発デポＣＤ
            TKO.CHAKU_DEPOT_CD    AS CHAKU_DEPOT_CD,       --着デポＣＤ
            TS.UPDATE_DT          AS UPDATE_DT,            --更新日時
            TS.UKETSUKE_TANTO_CD  AS UKETSUKE_TANTO_CD     --受付担当ＣＤ
           ,TR.SHOHIZEI_KBN                                --消費税区分
      FROM  T_JUCHU_KIHON  AS TK
            INNER JOIN T_JUCHU_KOBATO AS TKO
              ON (TKO.UKETSUKE_NO = TK.UKETSUKE_NO)
            INNER JOIN T_JUCHU_HOJO AS TH
              ON (TH.UKETSUKE_NO  = TK.UKETSUKE_NO)
            INNER JOIN T_JUCHU_SYOSAI AS TS
              ON (TS.UKETSUKE_NO  = TKO.UKETSUKE_NO
              AND TS.SOSHIKI_CD   = TKO.HATSU_CENTER_CD)
            INNER JOIN T_JUCHU_RYOKIN AS TR
              ON (TR.UKETSUKE_NO  = TKO.UKETSUKE_NO
              AND TR.SOSHIKI_CD   = TKO.HATSU_CENTER_CD)
      WHERE TS.SEISAN_MAKE_FLG    = '0'					--精算フラグが未精算
        AND TS.DELETE_FLG         = '0'					--受注詳細が削除されていない
        AND TH.YUSO_KBN           = '06'				--輸送区分が小鳩
        AND TK.DELETE_FLG         = '0'					--受注基本が削除されていない
        AND TK.JUCHU_STS_CD       = '05'				--受注ステータスが配送完了
		-- >>> 2004/11/16 Add Hoshi
		AND TKO.HATSU_KAKUNIN_FLG = '1'					--発承認フラグが'1'(承認済)
		AND TKO.CHAKU_KAKUNIN_FLG = '1'					--着承認フラグが'1'(承認済)
		-- <<< 2004/11/16 Add Hoshi
        AND TK.SEISAN_DT       LIKE @精算年月 + '%' --精算日が精算管理マスタの精算年月に含まれる
-- >>>> 2004/11/17 Add Hoshi
-- 連合会から発本部用（発本部のところに連合会、発センターのところに発本部を入れる）
    UNION ALL
    SELECT  '1',                                           --発着区分 発
--            TKO.HATSU_HONBU_CD    AS HATSU_HONBU_CD,       --発本部ＣＤ
--            TKO.HATSU_CENTER_CD   AS HATSU_CENTER_CD,      --発センターＣＤ
            @連合会               AS HATSU_HONBU_CD,       --発本部ＣＤ
            TKO.HATSU_HONBU_CD    AS HATSU_CENTER_CD,      --発センターＣＤ
            TK.UKETSUKE_NO        AS UKETSUKE_NO,          --受付番号
            TK.UKETSUKE_DT        AS UKETSUKE_DT,          --受付日
            TK.KOKYAKUMEI         AS KOKYAKUMEI,           --顧客名

            --2004/07/09 MODIFY EBISUI@KOS START
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    0
                ELSE
                    TR.RYOKIN_SHOKEI  +
                    TR.RYOKIN_NEBIKI_GK1
            END AS JUCHU_GK,                               --受注金額
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    TR.RYOKIN_SHOKEI
                ELSE
                    dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
            END AS JUCHU_UCHIZEI_GK,                       --受注内税金額
            TR.RYOKIN_6 AS TATEKAE_GK,                     --立替金額
            TR.SHOHIZEI_GK +
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    0
                ELSE
                    TR.RYOKIN_NEBIKI_GK - dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
            END
            AS SHOHIZEI_GK,                                --消費税額(発)
            --2004/07/09 MODIFY EBISUI@KOS END

            TK.SEISAN_DT          AS SEISAN_DT,            --精算日
            --TKO.BOX_SU            AS BOX_SU,               --BOX数
            FLOOR(TKO.BOX_SU)     AS BOX_SU,               --BOX数 2004/10/25 Update Hoshi 切り捨て
            TKO.BOX_BARA          AS BOX_BARA,             --バラ数
            TK.KOKYAKU_SEIKYU_DT  AS KOKYAKU_SEIKYU_DT,    --顧客請求日
            TKO.MOCHIKOMI_DT      AS MOCHIKOMI_DT,         --持込日  
            TKO.HATSU_DEPOT_CD    AS HATSU_DEPOT_CD,       --発デポＣＤ
            TKO.CHAKU_DEPOT_CD    AS CHAKU_DEPOT_CD,       --着デポＣＤ
            TS.UPDATE_DT          AS UPDATE_DT,            --更新日時
            TS.UKETSUKE_TANTO_CD  AS UKETSUKE_TANTO_CD     --受付担当ＣＤ
           ,TR.SHOHIZEI_KBN                                --消費税区分
      FROM  T_JUCHU_KIHON  AS TK
            INNER JOIN T_JUCHU_KOBATO AS TKO
              ON (TKO.UKETSUKE_NO = TK.UKETSUKE_NO)
            INNER JOIN T_JUCHU_HOJO AS TH
              ON (TH.UKETSUKE_NO  = TK.UKETSUKE_NO)
            INNER JOIN T_JUCHU_SYOSAI AS TS
              ON (TS.UKETSUKE_NO  = TKO.UKETSUKE_NO
              AND TS.SOSHIKI_CD   = TKO.HATSU_CENTER_CD)
            INNER JOIN T_JUCHU_RYOKIN AS TR
              ON (TR.UKETSUKE_NO  = TKO.UKETSUKE_NO
              AND TR.SOSHIKI_CD   = TKO.HATSU_CENTER_CD)
      WHERE TS.SEISAN_MAKE_FLG    = '0'					--精算フラグが未精算
        AND TS.DELETE_FLG         = '0'					--受注詳細が削除されていない
        AND TH.YUSO_KBN           = '06'				--輸送区分が小鳩
        AND TK.DELETE_FLG         = '0'					--受注基本が削除されていない
        AND TK.JUCHU_STS_CD       = '05'				--受注ステータスが配送完了
		-- >>> 2004/11/16 Add Hoshi
		AND TKO.HATSU_KAKUNIN_FLG = '1'					--発承認フラグが'1'(承認済)
		AND TKO.CHAKU_KAKUNIN_FLG = '1'					--着承認フラグが'1'(承認済)
		-- <<< 2004/11/16 Add Hoshi
        AND TK.SEISAN_DT       LIKE @精算年月 + '%' --精算日が精算管理マスタの精算年月に含まれる
-- <<< 2004/11/17 Add Hoshi
    UNION ALL
    SELECT  '2',                                          --発着区分 着
            TKO.CHAKU_HONBU_CD   AS CHAKU_HONBU_CD,       --着本部ＣＤ
            TKO.CHAKU_CENTER_CD  AS CHAKU_CENTER_CD,      --着センターＣＤ
            TK.UKETSUKE_NO       AS UKETSUKE_NO,          --受付番号
            TK.UKETSUKE_DT       AS UKETSUKE_DT,          --受付日
            TK.KOKYAKUMEI        AS KOKYAKUMEI,           --顧客名

            --2004/07/09 MODIFY EBISUI@KOS START
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    0
                ELSE
                    TR.RYOKIN_SHOKEI  +
                    TR.RYOKIN_NEBIKI_GK1
            END AS JUCHU_GK,                               --受注金額
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    TR.RYOKIN_SHOKEI
                ELSE
                    dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
            END AS JUCHU_UCHIZEI_GK,                       --受注内税金額
            TR.RYOKIN_6 AS TATEKAE_GK,                     --立替金額
            TR.SHOHIZEI_GK +
            CASE
                WHEN TR.SHOHIZEI_KBN = '2' THEN
                    0
                ELSE
                    TR.RYOKIN_NEBIKI_GK - dbo.GET_BEFORE_TAX(TR.RYOKIN_NEBIKI_GK,dbo.GET_TAX_RT(TK.KOKYAKU_SEIKYU_DT))
            END
            AS SHOHIZEI_GK,                                --消費税額(発)
            --2004/07/09 MODIFY EBISUI@KOS END

            TK.SEISAN_DT         AS SEISAN_DT,            --精算日
            --TKO.BOX_SU           AS BOX_SU,               --BOX数
            FLOOR(TKO.BOX_SU)    AS BOX_SU,               --BOX数 2004/10/25 Update Hoshi 切り捨て
            TKO.BOX_BARA         AS BOX_BARA,             --バラ数
            TK.KOKYAKU_SEIKYU_DT AS KOKYAKU_SEIKYU_DT,    --顧客請求日
            TKO.HIKITORI_DT      AS HIKITORI_DT,          --引取日
            TKO.HATSU_DEPOT_CD   AS HATSU_DEPOT_CD,       --発デポＣＤ
            TKO.CHAKU_DEPOT_CD   AS CHAKU_DEPOT_CD,       --着デポＣＤ
            TS.UPDATE_DT         AS UPDATE_DT,            --更新日時
            TS.UKETSUKE_TANTO_CD AS UKETSUKE_TANTO_CD     --受付担当ＣＤ
           ,TR.SHOHIZEI_KBN                               --消費税区分
      FROM  T_JUCHU_KIHON  AS TK
            INNER JOIN T_JUCHU_KOBATO AS TKO
              ON (TKO.UKETSUKE_NO = TK.UKETSUKE_NO)
            INNER JOIN T_JUCHU_HOJO   AS TH
              ON (TH.UKETSUKE_NO = TK.UKETSUKE_NO)
            INNER JOIN T_JUCHU_SYOSAI AS TS
              ON (TS.UKETSUKE_NO = TKO.UKETSUKE_NO
              AND TS.SOSHIKI_CD  = TKO.CHAKU_CENTER_CD)
            INNER JOIN T_JUCHU_RYOKIN AS TR
              ON (TR.UKETSUKE_NO = TKO.UKETSUKE_NO
              AND TR.SOSHIKI_CD  = TKO.CHAKU_CENTER_CD)
      WHERE TS.SEISAN_MAKE_FLG = '0'                --精算フラグが未精算
        AND TS.DELETE_FLG      = '0'                --受注詳細が削除されていない
        AND TH.YUSO_KBN        = '06'               --輸送区分が小鳩
        AND TK.DELETE_FLG      = '0'                --受注基本が削除されていない
        AND TK.JUCHU_STS_CD    = '05'               --受注ステータスが配送完了
		-- >>> 2004/11/16 Add Hoshi
		AND TKO.HATSU_KAKUNIN_FLG = '1'				--発承認フラグが'1'(承認済)
		AND TKO.CHAKU_KAKUNIN_FLG = '1'				--着承認フラグが'1'(承認済)
		-- <<< 2004/11/16 Add Hoshi
        AND TK.SEISAN_DT       LIKE @精算年月 + '%' --精算日が精算管理マスタの精算年月に含まれる

  --  ｶｰｿﾙOPEN
  OPEN  AB0102_CUR00
  FETCH  NEXT FROM AB0102_CUR00 INTO
         @発着区分,
         @本部ＣＤ,
         @センターＣＤ,
         @受付番号,
         @受付日,
         @顧客名,
         @受注金額,
         @受注内税金額,			--2004/07/09 ADD EBISUI@KOS
         @立替金額,				--2004/07/09 ADD EBISUI@KOS
         @消費税額,
         @精算日,
         @BOX数,
         @バラ数,
         @顧客請求日,
         @作業日,
         @発デポＣＤ,
         @着デポＣＤ,
         @受注更新日,
         @受注担当者ＣＤ,
         @消費税区分
  WHILE (@@FETCH_STATUS = 0)
  BEGIN
    SET @精算元組織コード = @本部ＣＤ
    SET @精算先組織コード = @センターＣＤ
    SET @デポＣＤ = @発デポＣＤ

      SELECT @作業地郵便番号   = NULL,
             @作業地市区郡ＣＤ = NULL,
             @作業地詳細       = NULL

    IF @発着区分 = '1'
    BEGIN
      SELECT @作業地郵便番号   = T.SAGYOCHI_POSTAL_NO,
             @作業地市区郡ＣＤ = T.SAGYOCHI_SHIKUGUN_CD,
             @作業地詳細       = T.SAGYOCHI_JYUSHO_2
      FROM (SELECT UKETSUKE_NO,MIN(SAGYO_DT) SAGYO_DT
              FROM T_JUCHU_GYOMU 
              WHERE UKETSUKE_NO = @受付番号
              AND   GYOMU_KBN   = '1'
              AND   DELETE_FLG  = '0'
              GROUP BY UKETSUKE_NO) AS TG
           INNER JOIN T_JUCHU_GYOMU AS T
             ON (T.UKETSUKE_NO = TG.UKETSUKE_NO
             AND T.SAGYO_DT    = TG.SAGYO_DT)
      WHERE T.GYOMU_KBN = '1'
    END
    ELSE
    BEGIN
      SELECT @作業地郵便番号   = T.SAGYOCHI_POSTAL_NO,
             @作業地市区郡ＣＤ = T.SAGYOCHI_SHIKUGUN_CD,
             @作業地詳細       = T.SAGYOCHI_JYUSHO_2
      FROM (SELECT UKETSUKE_NO,MAX(SAGYO_DT) SAGYO_DT
              FROM T_JUCHU_GYOMU 
              WHERE UKETSUKE_NO = @受付番号
              AND   GYOMU_KBN   = '2'
              AND   DELETE_FLG  = '0'
              GROUP BY UKETSUKE_NO) AS TG
           INNER JOIN T_JUCHU_GYOMU AS T
             ON (T.UKETSUKE_NO = TG.UKETSUKE_NO
             AND T.SAGYO_DT    = TG.SAGYO_DT)
      WHERE T.GYOMU_KBN = '2'
    END

    IF (@精算元組織コード IS NULL) 
    BEGIN
      SET @LOG_MSG = '精算元組織コード取得できず '
      EXEC WRITE_PRCLOG 'AB0102',@受付番号,'*****','W',@LOG_MSG
      GOTO NEXT_READ
    END

    IF (@精算先組織コード IS NULL) 
    BEGIN
      SET @LOG_MSG = '精算先組織コード取得できず '
      EXEC WRITE_PRCLOG 'AB0102',@受付番号,'*****','W',@LOG_MSG
      GOTO NEXT_READ
    END

    IF (@センターＣＤ IS NULL) 
    BEGIN
      SET @LOG_MSG = 'センターＣＤ取得できず '
      EXEC WRITE_PRCLOG 'AB0102',@受付番号,'*****','W',@LOG_MSG
      GOTO NEXT_READ
    END

    INSERT INTO T_SEISAN_KOBAT (
      SEIKYU_YM,
      MOTO_SOSHIKI_CD,
      SAKI_SOSHIKI_CD,
      UKETSUKE_NO,
      CENTER_CD,
      UKETSUKE_DT,
      KOKYAKUMEI,
      HACHAKU_KBN,
      JUCHU_GK,
      JUCHU_UTIZEI_GK,			--2004/07/09 ADD EBISUI@KOS
      JUCHU_TATEKAE_GK,			--2004/07/09 ADD EBISUI@KOS
      SHOHIZEI_KBN,
      SHOHIZEI_GK,
      GYOSHA_IRAI_GK,
      SEISAN_DT,
      BOX_SU,
      BOX_BARA,
      KOKYAKU_SEIKYU_DT,
      SAGYO_DT,
      SAGYOCHI_POSTAL_NO,
      SAGYOCHI_SHIKUGUN_CD,
      SAGYOCHI_SHOSAI_1,
      HONBU_CD,
      DEPO_CD,
      JUCHU_UPDATE_DT,
      JUCHU_TNT_CD,
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
      @センターＣＤ,
      @受付日,
      @顧客名,
      @発着区分,
      @受注金額,				--2004/07/09 ADD EBISUI@KOS
      @受注内税金額,			--2004/07/09 ADD EBISUI@KOS
      @立替金額,				--2004/07/09 ADD EBISUI@KOS
      @消費税区分,
      @消費税額,
      @業者依頼金額,
      @精算日,
      @BOX数,
      @バラ数,
      @顧客請求日,
      @作業日,
      @作業地郵便番号,
      @作業地市区郡ＣＤ,
      @作業地詳細,
      @本部ＣＤ,
      @デポＣＤ,
      @受注更新日,
      @受注担当者ＣＤ,
      @更新日時,
      @更新者ID,
      @画面ID,
      @削除ﾌﾗｸﾞ
    )
    SELECT @ERR = @@ERROR
    IF @ERR <> 0 GOTO ERROR_HANDLER

NEXT_READ:

    FETCH  NEXT FROM AB0102_CUR00 INTO
         @発着区分,
         @本部ＣＤ,
         @センターＣＤ,
         @受付番号,
         @受付日,
         @顧客名,
         @受注金額,
         @受注内税金額,			--2004/07/09 ADD EBISUI@KOS
         @立替金額,				--2004/07/09 ADD EBISUI@KOS
         @消費税額,
         @精算日,
         @BOX数,
         @バラ数,
         @顧客請求日,
         @作業日,
         @発デポＣＤ,
         @着デポＣＤ,
         @受注更新日,
         @受注担当者ＣＤ,
         @消費税区分
  END
  --  ｶｰｿﾙCLOSE
  CLOSE AB0102_CUR00
  --  ｶｰｿﾙ削除
  DEALLOCATE AB0102_CUR00

  --日付形式を変換する
  UPDATE T_SEISAN_KOBAT SET JUCHU_UPDATE_DT =
      REPLACE(REPLACE(CONVERT(CHAR(19),CONVERT(DATETIME,'20'+REPLACE(JUCHU_UPDATE_DT,'/','-'),120),120),'-',''),':','')
  WHERE SEIKYU_YM = @精算年月
  SELECT @ERR = @@ERROR
  IF @ERR <> 0 GOTO ERROR_HANDLER

  RETURN 0

ERROR_HANDLER:
  IF CURSOR_STATUS('global','AB0102_CUR00') = 1 
    BEGIN
        --  ｶｰｿﾙCLOSE
       CLOSE AB0102_CUR00
       --  ｶｰｿﾙ削除
       DEALLOCATE AB0102_CUR00   
    END

  SET @LOG_MSG = 'SQLエラー発生 Status:'+CONVERT(VARCHAR(10),@ERR)
  EXEC WRITE_PRCLOG 'AB0102',@受付番号,'*****','E',@LOG_MSG

  RETURN @ERR

END






GO

