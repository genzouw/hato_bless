USE [HATO2]
GO

/****** Object:  UserDefinedFunction [dbo].[CHECK_SAGYO_DT]    Script Date: 07/31/2014 11:55:51 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


CREATE    FUNCTION [dbo].[CHECK_SAGYO_DT](@受付番号 AS CHAR(8), @積卸区分 AS CHAR(1), @日付FROM AS CHAR(8), @日付TO AS CHAR(8))
RETURNS CHAR(1) AS
BEGIN
DECLARE @戻り値 AS CHAR(1)
DECLARE @作業日 AS CHAR(8)
	SELECT @戻り値 = '0'
	IF @積卸区分 = '1'
	BEGIN 
		DECLARE CUR_1 CURSOR FOR
		SELECT	ISNULL(SAGYO_DT,'') AS SAGYO_DT
		FROM	T_JUCHU_GYOMU
		WHERE	DELETE_FLG	= '0'
			AND GYOMU_KBN	= '1'
			AND	UKETSUKE_NO	= @受付番号	
	END
	ELSE
	BEGIN
		IF @積卸区分 = '2'
		BEGIN 
			DECLARE CUR_1 CURSOR FOR
			SELECT	ISNULL(SAGYO_DT,'') AS SAGYO_DT
			FROM	T_JUCHU_GYOMU
			WHERE	DELETE_FLG	= '0'
				AND GYOMU_KBN	= '2'
				AND	UKETSUKE_NO	= @受付番号	
		END
		ELSE
		BEGIN
			IF @積卸区分 = '3'
			BEGIN 
				DECLARE CUR_1 CURSOR FOR
				SELECT	ISNULL(SAGYO_DT,'') AS SAGYO_DT
				FROM	T_JUCHU_GYOMU
				WHERE	DELETE_FLG	= '0'
					AND GYOMU_KBN	IN ('1', '2')
					AND	UKETSUKE_NO	= @受付番号	
			END
			ELSE
			BEGIN 
				DECLARE CUR_1 CURSOR FOR
				SELECT	ISNULL(SAGYO_DT,'') AS SAGYO_DT
				FROM	T_JUCHU_GYOMU
				WHERE	DELETE_FLG	= '0'
					AND	UKETSUKE_NO	= @受付番号	
			END
		END
	END
	OPEN CUR_1
	FETCH  NEXT FROM CUR_1 INTO @作業日
	WHILE(@@FETCH_STATUS = 0)
	BEGIN
		IF @作業日 <> '' AND @作業日 >= @日付FROM AND @作業日 <= @日付TO
			SELECT @戻り値 = '1' 
		FETCH  NEXT FROM CUR_1 INTO @作業日
	END
	CLOSE CUR_1
	DEALLOCATE CUR_1
	RETURN @戻り値
END


GO

