USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0104]    Script Date: 07/31/2014 11:39:04 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO




CREATE  PROCEDURE [dbo].[SP_AB0104] AS

DECLARE
  @SEIKYUYM CHAR(6),
  @LOG_MSG  VARCHAR(200),
  @ERR      INT

BEGIN
  SET NOCOUNT ON
  SET @ERR = 0

  SELECT @SEIKYUYM = SEISAN_TUKI_JUCHU FROM M_SEISAN_KANRI

  TRUNCATE TABLE W_JUCHU_SEISAN

  INSERT INTO W_JUCHU_SEISAN
      (
      UKETSUKE_NO,
      GYOMU_SEQ,
      SAGYO_DT
      )
      SELECT TG.UKETSUKE_NO,
             MAX(TG.GYOMU_SEQ),
             TG.SAGYO_DT
       FROM  (SELECT TK.UKETSUKE_NO,
                     MAX(TG.SAGYO_DT) SAGYO_DT
                    FROM  T_JUCHU_SYOSAI TS
                          INNER JOIN T_JUCHU_KIHON TK
                            ON (TK.UKETSUKE_NO         = TS.UKETSUKE_NO
                            AND TK.UKETSUKE_SOSHIKI_CD = TS.SOSHIKI_CD)
                          INNER JOIN T_JUCHU_GYOMU TG
                            ON (TG.UKETSUKE_NO = TS.UKETSUKE_NO)
                    WHERE TG.GYOMU_KBN  = '2'
                    AND   TG.DELETE_FLG = '0'	-- 2004/09/29 Add Hoshi
                    AND   TS.SEISAN_MAKE_FLG = '0'
                    AND   TK.DELETE_FLG = '0'
                    AND   TK.SEISAN_DT LIKE @SEIKYUYM + '%'
                    GROUP BY TK.UKETSUKE_NO) TG1
             INNER JOIN T_JUCHU_GYOMU TG
                ON (TG.UKETSUKE_NO = TG1.UKETSUKE_NO
                AND TG.SAGYO_DT    = TG1.SAGYO_DT)
       GROUP BY TG.UKETSUKE_NO,
                TG.SAGYO_DT
  IF @@ERROR != 0
  BEGIN
    SET @ERR = @@ERROR
    SET @LOG_MSG = 'ワーク作成 SQLエラー発生 Status:'+CONVERT(VARCHAR(10),@ERR)
    EXEC WRITE_PRCLOG 'AB0104','********','*****','E',@LOG_MSG
  END

  RETURN @ERR

END




GO

