USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_SHIME_GETUJI]    Script Date: 07/31/2014 11:49:57 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE PROC [dbo].[SP_SHIME_GETUJI]
AS 

DECLARE @WK_ERROR AS INT SET @WK_ERROR = 0

----------------------------------------------------------
-- ** 月次締処理 **
----------------------------------------------------------
DECLARE @現在日時 AS DATETIME 
SET @現在日時 = GETDATE()

DECLARE @月次締起動条件 AS INT --0:起動なし
SELECT @月次締起動条件 = COUNT(*)
FROM M_GETUJI_CONTROL
WHERE
	CAST(年月 AS CHAR(6)) + RIGHT('00' + CAST(月次締予定日 AS VARCHAR(2)),2) = CONVERT(CHAR(8),@現在日時,112)
AND 月次締実施日時 IS NULL
SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

--月次締予定日が本日で、月次締実施日時がNULLの場合のみ実行 
IF @月次締起動条件 > 0
BEGIN 

	DECLARE @ステップ AS VARCHAR(400)
	SET @ステップ = '月次締処理'

	--------------------------------
	--実施日更新
	--------------------------------
	UPDATE M_GETUJI_CONTROL
	SET 月次締実施日時 = @現在日時
	WHERE
		CAST(年月 AS CHAR(6)) + RIGHT('00' + CAST(月次締予定日 AS VARCHAR(2)),2) = CONVERT(CHAR(8),@現在日時,112)
	AND 月次締実施日時 IS NULL
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	--------------------------------
	--月次締本処理（3:30）
	--------------------------------
	SET @ステップ = '1.SP_AB0100'
	exec SP_AB0100 1
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '2.EB0110'
	exec EB0110
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '3.EB0120'
	exec EB0120
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '4.EB0130'
	exec EB0130
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '5.EB0140'
	exec EB0140
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '6.EB0080'
	exec EB0080
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '7.EB0090'
	exec EB0090
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '8.EB0100'
	exec EB0100
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '9.SP_SEISAN_DATA_IDOU'
	exec @WK_ERROR = SP_SEISAN_DATA_IDOU
	IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '10.SP_AB0100'
	exec SP_AB0100 1
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '11.EB0110'
	exec EB0110
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '12.EB0120'
	exec EB0120
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '13.EB0130'
	exec EB0130
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '14.EB0140'
	exec EB0140
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '15.EB0080'
	exec EB0080
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

	SET @ステップ = '16.EB0090'
	exec EB0090
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

エラー終了:


	UPDATE M_GETUJI_CONTROL
	SET 月次締実施結果 = 
		CASE WHEN @WK_ERROR = 0
			THEN '正常終了'
			ELSE @ステップ + ' ' + '異常終了(' + CAST(@WK_ERROR AS VARCHAR(10)) + ')'
		END
	WHERE
		CAST(年月 AS CHAR(6)) + RIGHT('00' + CAST(月次締予定日 AS VARCHAR(2)),2) = CONVERT(CHAR(8),@現在日時,112)
	AND 月次締実施日時 = @現在日時
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 


	RETURN @WK_ERROR
	
END



GO

