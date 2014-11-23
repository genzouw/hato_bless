USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[MAKE_RYOKINDATASP]    Script Date: 07/31/2014 11:37:29 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[MAKE_RYOKINDATASP](@UKETSUKE_NO CHAR(8),@SOSHIKI_CD CHAR(5)) AS
BEGIN
--    EXEC WRITE_PRCLOG 'RYOKINDATASP',@UKETSUKE_NO,@SOSHIKI_CD,'D','処理開始'
    DECLARE @SOSHIKI_CD1 CHAR(5),
            @SOSHIKI_CD2 CHAR(5),
            @YUSO_KBN    CHAR(2),
            @KESSAI_KBN  CHAR(1),
            @LOG_MSG     VARCHAR(200),
            @STS         INT,
            @STS1        INT
    SET @SOSHIKI_CD1 = @SOSHIKI_CD
    --輸送区分、決済区分を取得する
    SELECT @YUSO_KBN = TH.YUSO_KBN,@KESSAI_KBN = TK.KESSAI_KBN
      FROM T_JUCHU_KIHON TK
           INNER JOIN T_JUCHU_HOJO TH
           ON (TH.UKETSUKE_NO = TK.UKETSUKE_NO)
      WHERE TK.UKETSUKE_NO = @UKETSUKE_NO
--PRINT '@YUSO_KBN='+@YUSO_KBN
--PRINT '@KESSAI_KBN='+@KESSAI_KBN
--    SET @LOG_MSG = '輸送区分='+@YUSO_KBN+'、決済区分='+@KESSAI_KBN+'を取得'
--    EXEC WRITE_PRCLOG 'RYOKINDATASP',@UKETSUKE_NO,@SOSHIKI_CD1,'D',@LOG_MSG
MAKE_RYOKINDATASP_FRONT:
    SET @STS = 0
    IF @YUSO_KBN != '06' AND @KESSAI_KBN != '2'
    BEGIN
        --輸送区分が小鳩以外、且つ決済区分がクレジット以外
--        SET @LOG_MSG = '小鳩以外、クレジット以外データ作成開始'
--        EXEC WRITE_PRCLOG 'RYOKINDATASP',@UKETSUKE_NO,@SOSHIKI_CD1,'D',@LOG_MSG
        EXEC @STS = MAKE_IRAIMOTO_RYOKINDATA_ETC  @UKETSUKE_NO,@SOSHIKI_CD1
    END
    ELSE
    BEGIN
        --輸送区分が小鳩又は決済区分がクレジット
--        SET @LOG_MSG = '小鳩又はクレジットデータ作成開始'
--        EXEC WRITE_PRCLOG 'RYOKINDATASP',@UKETSUKE_NO,@SOSHIKI_CD1,'D',@LOG_MSG
        EXEC @STS = MAKE_IRAIMOTO_RYOKINDATA_ETC2 @UKETSUKE_NO,@SOSHIKI_CD1
    END
    --粗利を計算及び更新する。
--    SET @STS1 = 0
--    IF @STS = 0 AND @STS = -999
--        EXEC @STS1 = MAKE_IRAIMOTO_RYOKINDATA_ETC4 @UKETSUKE_NO,@SOSHIKI_CD1
    --エラー又は依頼元が無い、依頼元の料金情報が存在する場合は処理を中断する
    IF @STS != 0 OR @STS1 != 0
        GOTO MAKE_RYOKINDATASP_EXIT
    SET @SOSHIKI_CD2 = @SOSHIKI_CD1
--PRINT @STS
--PRINT '@SOSHIKI_CD2='+@SOSHIKI_CD2
    --依頼元組織コードを取得する
    SELECT @SOSHIKI_CD1 = TS2.SOSHIKI_CD
      FROM T_JUCHU_SYOSAI TS1
           INNER JOIN T_JUCHU_SYOSAI TS2
           ON (TS2.UKETSUKE_NO = TS1.UKETSUKE_NO
           AND TS2.SOSHIKI_CD  = TS1.IRAIMOTO_SOSHIKI_CD)
      WHERE TS1.UKETSUKE_NO = @UKETSUKE_NO
      AND   TS1.SOSHIKI_CD  = @SOSHIKI_CD2
--PRINT @STS
--PRINT '@SOSHIKI_CD1='+@SOSHIKI_CD1
    GOTO MAKE_RYOKINDATASP_FRONT
MAKE_RYOKINDATASP_EXIT:
    RETURN @STS
END

GO
