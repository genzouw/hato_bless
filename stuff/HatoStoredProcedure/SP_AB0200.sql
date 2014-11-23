USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0200]    Script Date: 07/31/2014 11:39:38 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO



/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0200    スクリプト日付 : 2005/02/24 13:53:18 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0200    スクリプト日付 : 2005/02/17 11:01:35 ******/
/******* Modified 2005.03.09 Akihisa Urushibara *******/
CREATE PROCEDURE [dbo].[SP_AB0200]
AS
DECLARE
	@ERROR AS INT
BEGIN
	/* トランザクションを開始する。 */
	BEGIN TRANSACTION

	SET @ERROR = 0

	EXEC SP_AB0201 @ERROR OUTPUT
	IF @ERROR > 0
	BEGIN
		GOTO __TRANSACTION_CONTROL
	END

	EXEC SP_AB0211 @ERROR OUTPUT
	IF @ERROR > 0
	BEGIN
		GOTO __TRANSACTION_CONTROL
	END

	EXEC SP_AB0221 @ERROR OUTPUT

__TRANSACTION_CONTROL:
	/* エラーコードによってトランザクションを制御する。 */
	IF @ERROR > 0
	BEGIN
		/* T_SP_ERROR へのレコード追加は各プロシージャ内部で行っている。 */
		ROLLBACK TRANSACTION
	END
	ELSE
	BEGIN
		COMMIT TRANSACTION
	END
END
/*
CREATE         PROCEDURE SP_AB0200
AS
--DECLARE
BEGIN
	EXEC SP_AB0201
	EXEC SP_AB0211
	EXEC SP_AB0221
END
*/
/******* Modified 2005.03.09 Akihisa Urushibara *******/



GO

