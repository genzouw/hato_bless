USE [HATO2]
GO

/****** Object:  UserDefinedFunction [dbo].[CAN_CHANGE_GYOMU_KBN]    Script Date: 07/31/2014 11:54:15 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO



CREATE FUNCTION [dbo].[CAN_CHANGE_GYOMU_KBN] (@IN_UKETSUKE_NO AS CHAR(8),@IN_GYOMU_SEQ CHAR(2))  
RETURNS INT AS  
BEGIN
DECLARE
	@RET		INT,
	@GYOMU_KBN	CHAR(1),
	@DCNT		INT

	SET @RET = 1		--初期値は編集可能

	SELECT @GYOMU_KBN = GYOMU_KBN
		FROM T_JUCHU_GYOMU
		WHERE UKETSUKE_NO = @IN_UKETSUKE_NO
		AND   GYOMU_SEQ   = @IN_GYOMU_SEQ

	--業務区分が積又は卸の場合に編集可能のチェックを行う
	IF @GYOMU_KBN IN ('1','2')
	BEGIN
		--手配詳細に該当データが存在するかチェックを行う
		SELECT @DCNT = COUNT(1)
			FROM	T_JUCHU_TEHAI_SYOSAI JTS
					INNER JOIN T_JUCHU_SYOSAI JS
					ON (JS.UKETSUKE_NO = JTS.UKETSUKE_NO
					AND JS.SOSHIKI_CD  = JTS.SOSHIKI_CD
					AND JS.DELETE_FLG  = 0)
			WHERE	JTS.UKETSUKE_NO = @IN_UKETSUKE_NO
			AND		JTS.GYOMU_SEQ   = @IN_GYOMU_SEQ
			AND		JTS.DELETE_FLG  = 0
		--存在する場合は編集不可にする
		IF @DCNT != 0
			SET @RET = 0

	END

	RETURN @RET

END


GO

