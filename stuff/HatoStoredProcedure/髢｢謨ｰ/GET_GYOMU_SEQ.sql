USE [HATO2]
GO

/****** Object:  UserDefinedFunction [dbo].[GET_GYOMU_SEQ]    Script Date: 07/31/2014 11:57:27 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


/****** オブジェクト:  ユーザー定義関数 dbo.GET_GYOMU_SEQ    スクリプト日付: 2005/02/21 20:09:14 ******/
/****** オブジェクト:  ユーザー定義関数 dbo.GET_GYOMU_SEQ    スクリプト日付: 2005/02/21 19:14:43 ******/
/****** オブジェクト:  ユーザー定義関数 dbo.GET_GYOMU_SEQ    スクリプト日付: 2005/02/21 16:56:49 ******/
CREATE    FUNCTION [dbo].[GET_GYOMU_SEQ](@受付番号 AS CHAR(8), @業務区分 AS CHAR(1))
RETURNS CHAR(2) AS
BEGIN
DECLARE @戻り値 AS CHAR(2)
	SET @戻り値 = ''
	IF @業務区分 = '1'
    BEGIN
		DECLARE CUR_1 CURSOR FOR
		SELECT	GYOMU_SEQ
		FROM	T_JUCHU_GYOMU AS JG1
		WHERE	DELETE_FLG	= '0'
			AND	GYOMU_KBN	= '1'
			AND UKETSUKE_NO	= @受付番号
		ORDER BY SAGYO_DT, 
				(CASE SAGYO_TM
				WHEN 'AM' THEN '1159'
				WHEN 'PM' THEN '2359'
				ELSE SAGYO_TM
				END),
				SAGYO_TM,
				GYOMU_SEQ
		OPEN CUR_1
		FETCH FROM CUR_1 INTO @戻り値
		CLOSE CUR_1
		DEALLOCATE CUR_1
    END
	IF @業務区分 = '2'
    BEGIN
		DECLARE CUR_2 CURSOR FOR
		SELECT	GYOMU_SEQ
		FROM	T_JUCHU_GYOMU AS JG1
		WHERE	DELETE_FLG	= '0'
			AND	GYOMU_KBN	= '2'
			AND UKETSUKE_NO	= @受付番号
		ORDER BY SAGYO_DT desc, 
				(CASE SAGYO_TM
				WHEN 'AM' THEN '1159'
				WHEN 'PM' THEN '2359'
				ELSE SAGYO_TM
				END) desc,
				SAGYO_TM desc,
				GYOMU_SEQ desc
		OPEN CUR_2
		FETCH FROM CUR_2 INTO @戻り値
		CLOSE CUR_2
		DEALLOCATE CUR_2
    END
	RETURN @戻り値
END



GO

