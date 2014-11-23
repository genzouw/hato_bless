USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0214]    Script Date: 07/31/2014 11:42:53 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO



/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0204    スクリプト日付 : 2005/02/17 16:04:02 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0204    スクリプト日付 : 2005/02/17 9:26:18 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0204    スクリプト日付 : 2005/02/16 16:15:31 ******/
/*
	受注ＣＳＶを料金明細で更新する
*/
CREATE           PROCEDURE [dbo].[SP_AB0214](
/******* Modified 2005.03.09 Akihisa Urushibara *******/
--	@依頼組織CD		AS CHAR(5)
	@依頼組織CD		AS CHAR(5),
	@ERROR AS INT OUTPUT
/******* Modified 2005.03.09 Akihisa Urushibara *******/
)
AS
--DECLARE
BEGIN
	UPDATE W_HIKKOSHI_CSV_SHORT
--2005/03/07 ONO START
--	SET		RYOKIN_1			= ISNULL(JR.RYOKIN_1,0)
--		,	RYOKIN_2			= ISNULL(JR.RYOKIN_2,0)
--		,	RYOKIN_3			= ISNULL(JR.RYOKIN_3,0)
--		,	RYOKIN_4			= ISNULL(JR.RYOKIN_4,0)
--		,	RYOKIN_5			= ISNULL(JR.RYOKIN_5,0)
--		,	RYOKIN_6			= ISNULL(JR.RYOKIN_6,0)
--		,	KOJINFUTAN_GK		= ISNULL(JR.KOJINFUTAN_GK,0)
--		,	RYOKIN_SHOKEI		= ISNULL(JR.RYOKIN_SHOKEI,0)
--		,	RYOKIN_NEBIKI_GK1	= ISNULL(JR.RYOKIN_NEBIKI_GK1,0)
--		,	SHOHIZEI_GK			= ISNULL(JR.SHOHIZEI_GK,0)
--		,	RYOKIN_NEBIKI_GK	= ISNULL(JR.RYOKIN_NEBIKI_GK,0)
--		,	RYOKIN_KEI			= ISNULL(JR.RYOKIN_KEI,0)
--		,	RYOKIN_TESURYO_GK	= ISNULL(JR.RYOKIN_TESURYO_GK,0)
	SET		RYOKIN_1			= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_1,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_1,0) ELSE 0 END END
		,	RYOKIN_2			= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_2,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_2,0) ELSE 0 END END
		,	RYOKIN_3			= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_3,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_3,0) ELSE 0 END END
		,	RYOKIN_4			= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_4,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_4,0) ELSE 0 END END
		,	RYOKIN_5			= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_5,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_5,0) ELSE 0 END END
		,	RYOKIN_6			= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_6,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_6,0) ELSE 0 END END
		,	KOJINFUTAN_GK		= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.KOJINFUTAN_GK,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.KOJINFUTAN_GK,0) ELSE 0 END END
		,	RYOKIN_SHOKEI		= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_SHOKEI,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_SHOKEI,0) ELSE 0 END END
		,	RYOKIN_NEBIKI_GK1	= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_NEBIKI_GK1,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_NEBIKI_GK1,0) ELSE 0 END END
		,	SHOHIZEI_GK			= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.SHOHIZEI_GK,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.SHOHIZEI_GK,0) ELSE 0 END END
		,	RYOKIN_NEBIKI_GK	= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_NEBIKI_GK,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_NEBIKI_GK,0) ELSE 0 END END
		,	RYOKIN_KEI			= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_KEI,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_KEI,0) ELSE 0 END END
		,	RYOKIN_TESURYO_GK	= CASE ISNULL(JR.RYOKIN_INPUT_FLG,'0') WHEN '1' THEN ISNULL(JR.RYOKIN_TESURYO_GK,0)
									ELSE CASE ISNULL(JK.INPUT_SBT_CD,'0') WHEN '2' THEN ISNULL(JR.RYOKIN_TESURYO_GK,0) ELSE 0 END END
--005/03/07 ONO END
	FROM	W_HIKKOSHI_CSV_SHORT AS WC
--2005/03/07 ONO START
			INNER JOIN T_JUCHU_KIHON AS JK
			ON JK.UKETSUKE_NO = WC.UKETSUKE_NO
--2005/03/07 ONO END
			LEFT JOIN T_JUCHU_RYOKIN AS JR
			ON	JR.UKETSUKE_NO	= WC.UKETSUKE_NO
			AND	JR.SOSHIKI_CD	= WC.SOSHIKI_CD
	WHERE	WC.IRAI_SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
	SET @ERROR = @@ERROR
/******* Added 2005.03.09 Akihisa Urushibara *******/
END



GO
