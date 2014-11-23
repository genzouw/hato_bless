USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0203]    Script Date: 07/31/2014 11:41:52 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO



/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0203    スクリプト日付 : 2005/02/24 9:30:30 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0203    スクリプト日付 : 2005/02/21 16:55:34 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0203    スクリプト日付 : 2005/02/21 13:36:04 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0203    スクリプト日付 : 2005/02/15 16:58:04 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0203    スクリプト日付 : 2005/02/14 16:44:59 ******/
/*
	受注ＣＳＶ（通常）を更新する
	このＳＰでは主に業務情報に関する項目を修正する
 */
CREATE           PROCEDURE [dbo].[SP_AB0203](
/******* Modified 2005.03.09 Akihisa Urushibara *******/
--	@依頼組織CD		AS CHAR(5)
	@依頼組織CD		AS CHAR(5),
	@ERROR AS INT OUTPUT
/******* Modified 2005.03.09 Akihisa Urushibara *******/
)
AS
--DECLARE
BEGIN
	UPDATE	W_HIKKOSHI_CSV_NORMAL
--2005/03/07 ONO START
--	SET		GYOMU_KBN_1			= (CASE WC.GYOMU_SEQ_1 WHEN NULL THEN '' ELSE JG1.GYOMU_KBN END)
--		,	GYOMU_KBN_MEI_1		= (CASE JG1.GYOMU_KBN WHEN NULL THEN '' ELSE '積' END)
	SET		GYOMU_KBN_1			= (CASE ISNULL(WC.GYOMU_SEQ_1,'') WHEN '' THEN '' ELSE JG1.GYOMU_KBN END)
		,	GYOMU_KBN_MEI_1		= (CASE ISNULL(WC.GYOMU_SEQ_1,'') WHEN '' THEN '' ELSE CASE ISNULL(JG1.GYOMU_KBN,'') WHEN '' THEN '' ELSE '積' END END)
--2005/03/07 ONO END
		,	SAGYO_DT_1			= JG1.SAGYO_DT
		,	SAGYO_TM_1			= JG1.SAGYO_TM
		,	POSTAL_NO_1			= JG1.SAGYOCHI_POSTAL_NO
		,	SHIKUGUN_CD_1		= JG1.SAGYOCHI_SHIKUGUN_CD
		,	JYUSHO1_1			= JG1.SAGYOCHI_JYUSHO_1
		,	JYUSHO2_1			= JG1.SAGYOCHI_JYUSHO_2
		,	JYUSHO3_1			= JG1.SAGYOCHI_JYUSHO_3
		,	TEL1_1				= JG1.TEL_1
		,	TEL2_1				= JG1.TEL_2
		,	TEL3_1				= JG1.TEL_3
		,	TEL4_1				= JG1.TEL_4
		,	TATEMONO_KBN_1		= JG1.TATEMONO_KBN
		,	TATEMONO_KBN_MEI_1	= (CASE JG1.TATEMONO_KBN
									WHEN '1' THEN '一戸建て'	
									WHEN '2' THEN 'マンション'	
									WHEN '3' THEN '社宅'	
									WHEN '4' THEN '寮'	
									WHEN '5' THEN 'Ａ／Ｈ'	
									WHEN '9' THEN '事務所'
									ELSE ''
								  END)	
		,	FLOOR_1				= JG1.SAGYOCHI_FLOOR
		,	EV_KBN_1			= JG1.EV_KBN
		,	EV_KBN_MEI_1		= (CASE JG1.EV_KBN
									WHEN '1' THEN '階段'	
									WHEN '2' THEN 'ＥＶ'	
									ELSE ''
								  END)
		,	TOKUSYU_KBN_1		= JG1.TOKUSYU_KBN
		,	TOKUSYU_KBN_MEI_1	= (CASE JG1.TOKUSYU_KBN
									WHEN '00' THEN 'なし'	
									WHEN '11' THEN '手吊上'	
									WHEN '12' THEN '手吊下'	
									WHEN '21' THEN 'クレーン吊上'	
									WHEN '22' THEN 'クレーン吊下'	
									ELSE ''
								  END)
		,	YOKOMOCHI_KBN_1		= JG1.YOKOMOCHI_KBN
		,	Y_SYARYO_KBN_1		= JG1.YOKOMOCHI_SYARYO_KBN
		,	Y_SYARYO_KBN_MEI_1	= (CASE JG1.YOKOMOCHI_SYARYO_KBN
									WHEN '00' THEN '軽トラ'	
									WHEN '01' THEN '１ｔ'	
									WHEN '02' THEN '２ｔ'	
									WHEN '03' THEN '３ｔ'	
									WHEN '04' THEN '４ｔ'	
									WHEN '05' THEN '５ｔ'	
									WHEN '06' THEN '６ｔ'	
									WHEN '08' THEN '８ｔ'	
									WHEN '10' THEN '１０ｔ'	
									WHEN '12' THEN '１２ｔ'	
									WHEN '90' THEN '（無し）'	
									WHEN '99' THEN 'その他'	
									ELSE ''
								  END)
		,	MICHIHABA_1			= JG1.MICHIHABA
		,	TETSUDAI_SU_1		= JG1.TETSUDAI_SU
		,	KOMONO_FLG_1		= JG1.KOMONO_KAIKON_FLG
--2005/03/07 ONO START
--		,	KOMONO_FLG_MEI_1	= (CASE JG1.KOMONO_KAIKON_FLG WHEN '0' THEN '無' WHEN '1' THEN '有' ELSE '無' END)
--		,	GYOMU_KBN_2			= (CASE WC.GYOMU_SEQ_2 WHEN NULL THEN '' ELSE JG2.GYOMU_KBN END)
--		,	GYOMU_KBN_MEI_2		= (CASE JG2.GYOMU_KBN WHEN NULL THEN '' ELSE '卸' END)
		,	KOMONO_FLG_MEI_1	= (CASE ISNULL(WC.GYOMU_SEQ_1,'') WHEN '' THEN '' ELSE 
									CASE JG1.KOMONO_KAIKON_FLG WHEN '0' THEN '無' WHEN '1' THEN '有' ELSE '無' END END)
		,	GYOMU_KBN_2			= (CASE ISNULL(WC.GYOMU_SEQ_2,'') WHEN '' THEN '' ELSE JG2.GYOMU_KBN END)
		,	GYOMU_KBN_MEI_2		= (CASE ISNULL(WC.GYOMU_SEQ_2,'') WHEN '' THEN '' ELSE CASE JG2.GYOMU_KBN WHEN NULL THEN '' ELSE '卸' END END)
--2005/03/07 ONO END
		,	SAGYO_DT_2			= JG2.SAGYO_DT
		,	SAGYO_TM_2			= JG2.SAGYO_TM
		,	POSTAL_NO_2			= JG2.SAGYOCHI_POSTAL_NO
		,	SHIKUGUN_CD_2		= JG2.SAGYOCHI_SHIKUGUN_CD
		,	JYUSHO1_2			= JG2.SAGYOCHI_JYUSHO_1
		,	JYUSHO2_2			= JG2.SAGYOCHI_JYUSHO_2
		,	JYUSHO3_2			= JG2.SAGYOCHI_JYUSHO_3
		,	TEL1_2				= JG2.TEL_1
		,	TEL2_2				= JG2.TEL_2
		,	TEL3_2				= JG2.TEL_3
		,	TEL4_2				= JG2.TEL_4
		,	TATEMONO_KBN_2		= JG2.TATEMONO_KBN
		,	TATEMONO_KBN_MEI_2	= (CASE JG2.TATEMONO_KBN
									WHEN '1' THEN '一戸建て'	
									WHEN '2' THEN 'マンション'	
									WHEN '3' THEN '社宅'	
									WHEN '4' THEN '寮'	
									WHEN '5' THEN 'Ａ／Ｈ'	
									WHEN '9' THEN '事務所'
									ELSE ''
								  END)	
		,	FLOOR_2				= JG2.SAGYOCHI_FLOOR
		,	EV_KBN_2			= JG2.EV_KBN
		,	EV_KBN_MEI_2		= (CASE JG2.EV_KBN
									WHEN '1' THEN '階段'	
									WHEN '2' THEN 'ＥＶ'	
									ELSE ''
								  END)
		,	TOKUSYU_KBN_2		= JG2.TOKUSYU_KBN
		,	TOKUSYU_KBN_MEI_2	= (CASE JG2.TOKUSYU_KBN
									WHEN '00' THEN 'なし'	
									WHEN '11' THEN '手吊上'	
									WHEN '12' THEN '手吊下'	
									WHEN '21' THEN 'クレーン吊上'	
									WHEN '22' THEN 'クレーン吊下'	
									ELSE ''
								  END)
		,	YOKOMOCHI_KBN_2		= JG2.YOKOMOCHI_KBN
		,	Y_SYARYO_KBN_2		= JG2.YOKOMOCHI_SYARYO_KBN
		,	Y_SYARYO_KBN_MEI_2	= (CASE JG2.YOKOMOCHI_SYARYO_KBN
									WHEN '00' THEN '軽トラ'	
									WHEN '01' THEN '１ｔ'	
									WHEN '02' THEN '２ｔ'	
									WHEN '03' THEN '３ｔ'	
									WHEN '04' THEN '４ｔ'	
									WHEN '05' THEN '５ｔ'	
									WHEN '06' THEN '６ｔ'	
									WHEN '08' THEN '８ｔ'	
									WHEN '10' THEN '１０ｔ'	
									WHEN '12' THEN '１２ｔ'	
									WHEN '90' THEN '（無し）'	
									WHEN '99' THEN 'その他'	
									ELSE ''
								  END)
		,	MICHIHABA_2			= JG2.MICHIHABA
		,	TETSUDAI_SU_2		= JG2.TETSUDAI_SU
		,	KOMONO_FLG_2		= JG2.KOMONO_KAIKON_FLG
--2005/03/07 ONO START
--		,	KOMONO_FLG_MEI_2	= (CASE JG2.KOMONO_KAIKON_FLG WHEN '0' THEN '無' WHEN '1' THEN '有' ELSE '無' END)
		,	KOMONO_FLG_MEI_2	= (CASE ISNULL(WC.GYOMU_SEQ_2,'') WHEN '' THEN '' ELSE 
									CASE JG2.KOMONO_KAIKON_FLG WHEN '0' THEN '無' WHEN '1' THEN '有' ELSE '無' END END)
--2005/03/07 ONO END
	FROM	W_HIKKOSHI_CSV_NORMAL AS WC
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

