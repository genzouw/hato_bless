USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0100]    Script Date: 07/31/2014 11:38:11 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO






--精算受注クレジットデータの作成
CREATE PROCEDURE [dbo].[SP_AB0100](
  @iMode INT
)
AS
DECLARE
  @精算年月   char(6),
  @精算年月日 datetime,
  @精算年      char(4),
  @精算月      char(2),
  @HONKARI    VARCHAR(6),
  @LOG_MSG    VARCHAR(200),
  @ERR        INT 

BEGIN

  SET NOCOUNT ON
  SET @ERR = 0

  SELECT @精算年月 = SEISAN_TUKI_JUCHU FROM M_SEISAN_KANRI
  IF @@ERROR != 0 
  BEGIN
    SET @ERR = @@ERROR
    GOTO ERROR_HANDLER
  END

  IF @iMode = 2
    SET @HONKARI = '本処理'
  ELSE
    SET @HONKARI = '仮処理'

  SET @LOG_MSG = @精算年月+' 精算バッチ処理開始 '+@HONKARI
  EXEC WRITE_PRCLOG 'AB0100','********','*****','I',@LOG_MSG

  --精算データ用業務情報作成
  EXEC @ERR = SP_AB0104
  IF @ERR != 0 GOTO ERROR_HANDLER

  SET @LOG_MSG = @精算年月+' 精算データ作成準備処理終了'
  EXEC WRITE_PRCLOG 'AB0100','********','*****','I',@LOG_MSG

  /*--- 精算クレジットデータ作成SPを実行する ---*/
  BEGIN TRANSACTION

  EXEC @ERR = SP_AB0101 @iMode
  IF @ERR != 0 GOTO ERROR_HANDLER

  COMMIT TRANSACTION

  SET @LOG_MSG = @精算年月+' 精算クレジットデータ作成終了'
  EXEC WRITE_PRCLOG 'AB0100','********','*****','I',@LOG_MSG

  /*--- 精算小鳩データ作成SPを実行する ---*/
  BEGIN TRANSACTION

  EXEC @ERR = SP_AB0102 @iMode
  IF @ERR != 0 GOTO ERROR_HANDLER

  COMMIT TRANSACTION

  SET @LOG_MSG = @精算年月+' 精算小鳩データ作成終了'
  EXEC WRITE_PRCLOG 'AB0100','********','*****','I',@LOG_MSG

  /*--- 精算受注データ作成SPを実行する ---*/
  BEGIN TRANSACTION
  
  
  
  -- =========== Str 2008/08/15 Ins SYS_Ohki ==========
  -----------------------------------------------------
  -- 決済区分現金時の処理追加
  -----------------------------------------------------
  EXEC @ERR = SP_AB0106 @iMode
  IF @ERR != 0 GOTO ERROR_HANDLER
  -- =========== End 2008/08/15 Ins SYS_Ohki ==========
  
  
  EXEC @ERR = SP_AB0103 @iMode
  IF @ERR != 0 GOTO ERROR_HANDLER

  SET @LOG_MSG = @精算年月+' 受注データ作成終了'
  EXEC WRITE_PRCLOG 'AB0100','********','*****','I',@LOG_MSG

  /*--- 支払側賦課金データ作成SPを実行する ---*/
  EXEC @ERR = SP_AB0105 @iMode
  IF @ERR != 0 GOTO ERROR_HANDLER

  COMMIT TRANSACTION

  SET @LOG_MSG = @精算年月+' 支払側賦課金データ作成終了'
  EXEC WRITE_PRCLOG 'AB0100','********','*****','I',@LOG_MSG

  --精算データ作成済フラグを'1'に更新する。（本締め時のみ実行）
  IF @iMode = 2
  BEGIN
    BEGIN TRANSACTION

    UPDATE T_JUCHU_SYOSAI SET SEISAN_MAKE_FLG = '1'
     FROM  T_JUCHU_KIHON
     WHERE T_JUCHU_KIHON.SEISAN_DT LIKE @精算年月 + '%'
     AND   T_JUCHU_KIHON.UKETSUKE_NO  = T_JUCHU_SYOSAI.UKETSUKE_NO
     AND   T_JUCHU_KIHON.JUCHU_STS_CD = '05'     --2004.08.16 Mod By Kotake 配達完了データのみ精算対象とする
    IF @@ERROR != 0
    BEGIN
      SET @ERR = @@ERROR
      GOTO ERROR_HANDLER
    END

    SET @精算年月日=@精算年月+'01'
    SET @精算年月日 = dateadd( month, 1, @精算年月日 )

    SET @精算年 = year(@精算年月日)
    SET @精算月 = month(@精算年月日)
    IF @精算月 >= 10   SET @精算月 = @精算月
    ELSE                    SET @精算月 =  '0' + @精算月

    SET @精算年月 = @精算年 + @精算月

    UPDATE M_SEISAN_KANRI SET SEISAN_TUKI_JUCHU=@精算年月
    
    IF @@ERROR != 0
    BEGIN
      SET @ERR = @@ERROR
      GOTO ERROR_HANDLER
    END

    COMMIT TRANSACTION

    SET @LOG_MSG = @精算年月+' 精算フラグ更新'
    EXEC WRITE_PRCLOG 'AB0100','********','*****','I',@LOG_MSG
  END

  SET @LOG_MSG = @精算年月+' 精算バッチ処理終了 '+@HONKARI
  EXEC WRITE_PRCLOG 'AB0100','********','*****','I',@LOG_MSG

SP_AB0100_EXIT:
  SET NOCOUNT OFF
  RETURN @ERR
  
ERROR_HANDLER:
  ROLLBACK TRANSACTION
  GOTO SP_AB0100_EXIT

END





GO

