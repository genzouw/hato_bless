USE [HATO2]
GO

/****** Object:  UserDefinedFunction [dbo].[CHECK_TEHAI_05]    Script Date: 07/31/2014 11:56:06 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


/****** オブジェクト:  ユーザー定義関数 dbo.CHECK_TEHAI_05    スクリプト日付: 2005/02/24 13:45:56 ******/
/****** オブジェクト:  ユーザー定義関数 dbo.CHECK_TEHAI_05    スクリプト日付: 2005/02/24 13:02:38 ******/
/****** オブジェクト:  ユーザー定義関数 dbo.CHECK_MITSUMORI_DT    スクリプト日付: 2005/02/18 13:42:55 ******/
/****** オブジェクト:  ユーザー定義関数 dbo.CHECK_MITSUMORI_DT    スクリプト日付: 2005/02/17 14:21:55 ******/
CREATE      FUNCTION [dbo].[CHECK_TEHAI_05](@受付番号 AS CHAR(8), @組織CD AS CHAR(5), @依頼先CD AS CHAR(5))
RETURNS CHAR(1) AS
BEGIN
DECLARE @戻り値 AS CHAR(1)
DECLARE @件数 AS INTEGER
	SELECT @戻り値 = '0'
	DECLARE CUR_1 CURSOR FOR
	SELECT	COUNT(TEHAI_SEQ)
	FROM	T_JUCHU_TEHAI AS JT
	WHERE	JT.DELETE_FLG = '0'
		AND	JT.TEHAI_SHUBETSU_CD	= '05'
		AND	JT.UKETSUKE_NO			= @受付番号
		AND	JT.SOSHIKI_CD			= @組織CD
		AND	JT.SHIIRESAKI_CD		= @依頼先CD
	OPEN CUR_1
	FETCH FROM CUR_1 INTO @件数
	CLOSE CUR_1
	DEALLOCATE CUR_1
	IF @件数 > 0
		SELECT @戻り値 = '1'
	RETURN @戻り値
END


GO

