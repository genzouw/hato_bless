USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[WRITE_PRCLOG]    Script Date: 07/31/2014 11:50:58 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[WRITE_PRCLOG] (
@GAMEN_ID CHAR(20),
@UKETSUKE_NO CHAR(8),
@SOSHIKI_CD CHAR(5),
@LOG_SYUBETSU CHAR(1),
@TO_DO_LOG VARCHAR(200)
) AS
BEGIN
    DECLARE @NOWDATE CHAR(19),
            @LOG_SEQ INT
    SET @NOWDATE = CONVERT(CHAR(10), GETDATE(),111) + ' ' + CONVERT(CHAR(8), GETDATE(), 114)
    SELECT @LOG_SEQ = ISNULL(MAX(LOG_SEQ),0) + 1
     FROM  T_JUCHU_LOG
     WHERE HASSEI_DATE = @NOWDATE
    IF @@ROWCOUNT = 0
      SET @LOG_SEQ = 1
--PRINT @NOWDATE
--PRINT @LOG_SEQ
    INSERT INTO T_JUCHU_LOG (
            HASSEI_DATE,
            LOG_SEQ,
            GAMEN_ID,
            UKETSUKE_NO,
            SOSHIKI_CD,
            LOG_SYUBETSU,
            TO_DO_LOG
            )
     VALUES(
            @NOWDATE,
            @LOG_SEQ,
            @GAMEN_ID,
            @UKETSUKE_NO,
            @SOSHIKI_CD,
            @LOG_SYUBETSU,
            @TO_DO_LOG
            )
    IF @@ERROR != 0
       RETURN @@ERROR
    RETURN 0
END

GO

