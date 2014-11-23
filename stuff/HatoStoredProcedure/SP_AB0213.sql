USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0213]    Script Date: 07/31/2014 11:42:39 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO



/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0203    スクリプト日付 : 2005/02/17 16:00:29 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0203    スクリプト日付 : 2005/02/15 16:58:04 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0203    スクリプト日付 : 2005/02/14 16:44:59 ******/
/*
	受注ＣＳＶ（通常）を更新する
	このＳＰでは主に業務情報に関する項目を修正する
 */
CREATE         PROCEDURE [dbo].[SP_AB0213](
/******* Modified 2005.03.09 Akihisa Urushibara *******/
--	@依頼組織CD		AS CHAR(5)
	@依頼組織CD		AS CHAR(5),
	@ERROR AS INT OUTPUT
/******* Modified 2005.03.09 Akihisa Urushibara *******/
)
AS
--DECLARE
BEGIN
	UPDATE	W_HIKKOSHI_CSV_SHORT
	SET		SAGYO_DT_1			= JG1.SAGYO_DT
		,	JYUSHO1_1			= JG1.SAGYOCHI_JYUSHO_1
		,	SAGYO_DT_2			= JG2.SAGYO_DT
		,	JYUSHO1_2			= JG2.SAGYOCHI_JYUSHO_1
	FROM	W_HIKKOSHI_CSV_SHORT AS WC
			LEFT JOIN T_JUCHU_GYOMU AS JG1
			ON	JG1.UKETSUKE_NO	= WC.UKETSUKE_NO
			AND	JG1.GYOMU_SEQ	= WC.GYOMU_SEQ_1
			LEFT JOIN T_JUCHU_GYOMU AS JG2
			ON	JG2.UKETSUKE_NO	= WC.UKETSUKE_NO
			AND	JG2.GYOMU_SEQ	= WC.GYOMU_SEQ_2
	WHERE	WC.IRAI_SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
	SET @ERROR = @@ERROR
/******* Added 2005.03.09 Akihisa Urushibara *******/
END



GO

