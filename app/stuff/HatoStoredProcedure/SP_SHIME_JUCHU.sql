USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_SHIME_JUCHU]    Script Date: 07/31/2014 11:50:18 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE PROC [dbo].[SP_SHIME_JUCHU]
AS 

DECLARE @WK_ERROR AS INT SET @WK_ERROR = 0

----------------------------------------------------------
-- ** 受注締処理 **
----------------------------------------------------------
DECLARE @現在日時 AS DATETIME 
SET @現在日時 = GETDATE()

DECLARE @受注締起動条件 AS INT --0:起動なし
SELECT @受注締起動条件 = COUNT(*)
FROM M_GETUJI_CONTROL
WHERE
	CAST(年月 AS CHAR(6)) + RIGHT('00' + CAST(受注締予定日 AS VARCHAR(2)),2) = CONVERT(CHAR(8),@現在日時,112)
AND 受注締実施日時 IS NULL
SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

--受注締予定日が本日で、受注締実施日時がNULLの場合のみ実行 
IF @受注締起動条件 > 0
BEGIN 

	DECLARE @ステップ AS VARCHAR(400)
	SET @ステップ = '受注締処理開始'

	--------------------------------
	--実施日更新
	--------------------------------
	UPDATE M_GETUJI_CONTROL
	SET 受注締実施日時 = @現在日時
	WHERE
		CAST(年月 AS CHAR(6)) + RIGHT('00' + CAST(受注締予定日 AS VARCHAR(2)),2) = CONVERT(CHAR(8),@現在日時,112)
	AND 受注締実施日時 IS NULL
	SET @WK_ERROR = @@ERROR IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 


	--------------------------------
	--受注締本処理（00:30）
	--------------------------------
	SET @ステップ = '1.SP_AB0100'
	exec SP_AB0100 2
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

	SET @ステップ = '8.SP_JUCHU_DATA_IDOU'
	exec @WK_ERROR = SP_JUCHU_DATA_IDOU
	IF @WK_ERROR <> 0 BEGIN GOTO エラー終了 END 

エラー終了:


	UPDATE M_GETUJI_CONTROL
	SET 受注締実施結果 = 
		CASE WHEN @WK_ERROR = 0
			THEN '正常終了'
			ELSE @ステップ + ' ' + '異常終了(' + CAST(@WK_ERROR AS VARCHAR(10)) + ')'
		END
	WHERE
		CAST(年月 AS CHAR(6)) + RIGHT('00' + CAST(受注締予定日 AS VARCHAR(2)),2) = CONVERT(CHAR(8),@現在日時,112)
	AND 受注締実施日時 = @現在日時		


	RETURN @WK_ERROR

END



GO

