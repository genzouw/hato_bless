USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_AB0212]    Script Date: 07/31/2014 11:42:28 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO



/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0212    スクリプト日付 : 2005/02/24 21:08:06 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0212    スクリプト日付 : 2005/02/24 15:03:41 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0212    スクリプト日付 : 2005/02/24 9:26:47 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0212    スクリプト日付 : 2005/02/18 13:30:10 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0212    スクリプト日付 : 2005/02/17 15:59:34 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0202    スクリプト日付 : 2005/02/17 15:54:23 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0202    スクリプト日付 : 2005/02/17 10:45:21 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.SP_AB0202    スクリプト日付 : 2005/02/16 9:07:35 ******/
/*
	受注ＣＳＶ（通常）を更新する
	受注基本、受注詳細、受注補助に関する項目を修正する
 */
CREATE              PROCEDURE [dbo].[SP_AB0212](
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
	SET		JISYA_UKETSUKE_NO			= JS.JISYA_UKETSUKE_NO
		,	JYUCHU_DT					= JS.JYUCHU_DT
		,	KOKYAKUMEI					= JK.KOKYAKUMEI
		,	HOJIN_CD					= JK.HOJIN_CD
		,	HOJIN_MEI					= MH.HOJIN_RYAKU_MEI
		,	JISHA_HOJIN_CD				= MH.JISHA_HOJIN_CD
		,	EIGYO_TANTO_MEI				= MT1.SHAIN_MEI
		,	MITSUMORI_TANTO_MEI			= MT2.SHAIN_MEI
		,	GYOMU_TANTO_MEI				= MT3.SHAIN_MEI
		,	JISSHI_TANTO_MEI			= MT4.SHAIN_MEI
		,	TORIATSUKAI_KBN				= JK.TORIATSUKAI_KBN
		,	TORIATSUKAI_KBN_MEI			= (CASE JK.TORIATSUKAI_KBN
											WHEN '10' THEN '一般引越'
											WHEN '20' THEN '法人転勤'
											WHEN '30' THEN '事務所移転'
											WHEN '40' THEN '一般輸送'
											WHEN '51' THEN '生活関連(家財一時保管)'
											WHEN '52' THEN '生活関連(電気工事)'
											WHEN '53' THEN '生活関連(物品販売)'
											WHEN '54' THEN '生活関連(廃棄物処理)'
											WHEN '55' THEN '生活関連(不要品引取)'
											WHEN '56' THEN '生活関連(リサイクル)'
											WHEN '57' THEN '生活関連(ピアノ輸送)'
											WHEN '58' THEN '生活関連(乗用車等輸送)'
											WHEN '59' THEN '生活関連(その他)'
											ELSE ''
										  END) 
		,	JISSEKI_KBN					= JS.JISSEKI_KBN
		,	JISSEKI_KBN_MEI				= (CASE JS.JISSEKI_KBN
											WHEN '0' THEN '実績外'
											WHEN '1' THEN '実績'
											ELSE ''
										  END) 
		,	JUCHU_STS_CD				= JK.JUCHU_STS_CD
		,	JUCHU_STS					= (CASE JK.JUCHU_STS_CD
											WHEN '01' THEN 'TEL問合せ'
											WHEN '02' THEN '見積依頼'
											WHEN '03' THEN '見積完了'
											WHEN '04' THEN '成約'
											WHEN '05' THEN '配送完了'
											WHEN '11' THEN '前キャンセル'
											WHEN '12' THEN '後キャンセル'
											WHEN '90' THEN '不成約'
											ELSE ''
										  END) 
		,	JUCHU_SHUBETSU_CD			= JS.JUCHU_SHUBETSU_CD
		,	JUCHU_SHUBETSU				= (CASE JS.JUCHU_SHUBETSU_CD
											WHEN '1' THEN '自社'
											WHEN '2' THEN '連合会'
											WHEN '3' THEN '本部'
											WHEN '4' THEN '他センター'
											ELSE ''
										  END) 
		,	UKETSUKE_SOSHIKI_CD			= JK.UKETSUKE_SOSHIKI_CD
		,	UKETSUKE_SOSHIKI_MEI		= MS.SOSHIKI_MEI
		,	KESSAI_KBN					= JK.KESSAI_KBN
		,	KESSAI_KBN_MEI				= (CASE JK.KESSAI_KBN
											WHEN '1' THEN '現金'
											WHEN '2' THEN 'カード'
											WHEN '3' THEN '振込'
											WHEN '9' THEN 'その他'
											ELSE ''
										  END)
		,	KOSEI_KBN					= JH.KOKYAKU_KOSEI_KBN
		,	KOSEI_KBN_MEI				= (CASE JH.KOKYAKU_KOSEI_KBN
											WHEN '1' THEN '家族'
											WHEN '2' THEN '単身'
											WHEN '3' THEN '事務所移転'
											WHEN '9' THEN 'その他'
											ELSE ''
										  END)
		,	YUSO_KBN					= JH.YUSO_KBN
		,	YUSO_KBN_MEI				= (CASE JH.YUSO_KBN
											WHEN '01' THEN 'チャーター'
											WHEN '02' THEN '積合'
											WHEN '03' THEN 'JRコンテナ'
											WHEN '04' THEN '航空便'
											WHEN '05' THEN '船便'
											WHEN '06' THEN '小鳩'
											WHEN '99' THEN 'その他'
											ELSE ''
										  END)
		,	KOBATO_KBN_CD				= JKBT.KOBATO_KBN_CD
		,	KOBATO_KBN					= (CASE JKBT.KOBATO_KBN_CD
											WHEN '1' THEN '小鳩パック'
											WHEN '2' THEN '小鳩スカイ'
											WHEN '3' THEN '小鳩プチトラ'
											ELSE ''
										  END)
		,	BOX_SU						= JKBT.BOX_SU
		,	BOX_BARA					= JKBT.BOX_BARA
		,	SEISAN_DT					= JK.SEISAN_DT
		,	SEIKYU_DT					= CASE JS.IRAI_SHUBETSU_CD
											WHEN '0' THEN JK.KOKYAKU_SEIKYU_DT
											ELSE ''
										  END
		,	JISSEKI_DT					= JK.JISSEKI_DT
		,	KEIJO_KBN					= JS.JISSEKI_KEIJO_KBN
		,	KEIJO_KBN_MEI				= (CASE JS.JISSEKI_KEIJO_KBN
											WHEN '101' THEN '個人・家族'
											WHEN '102' THEN '個人・小鳩パック'
											WHEN '103' THEN '個人・小鳩スカイ'
											WHEN '104' THEN '個人・小鳩プチトラ'
											WHEN '105' THEN '個人・海外引越'
											WHEN '106' THEN '個人・その他'
											WHEN '201' THEN '法人・家族'
											WHEN '202' THEN '法人・小鳩パック'
											WHEN '203' THEN '法人・小鳩スカイ'
											WHEN '204' THEN '法人・小鳩プチトラ'
											WHEN '205' THEN '法人・海外引越'
											WHEN '206' THEN '法人・事務所移転'
											WHEN '208' THEN '法人・その他'
											WHEN '207' THEN '一部引受'
											WHEN '301' THEN '生活関連・一時保管'
											WHEN '302' THEN '生活関連・電気工事'
											WHEN '303' THEN '生活関連・物品販売'
											WHEN '304' THEN '生活関連・廃棄物処理'
											WHEN '305' THEN '生活関連・不要品引取'
											WHEN '306' THEN '生活関連・リサイクル'
											WHEN '307' THEN '生活関連・ピアノ輸送'
											WHEN '308' THEN '生活関連・自動車陸送'
											WHEN '399' THEN '生活関連・その他'
											ELSE ''
										  END)
		,	BUNSEKI_CD_1				= JS.BUNSEKI_CD_1
		,	BUNSEKI_CD_2				= JS.BUNSEKI_CD_2
		,	BUNSEKI_CD_3				= JS.BUNSEKI_CD_3
		,	BUNSEKI_CD_4				= JS.BUNSEKI_CD_4
		,	BUNSEKI_CD_MEI_1			= MH1.HANYO_MEI
		,	BUNSEKI_CD_MEI_2			= MH2.HANYO_MEI
		,	BUNSEKI_CD_MEI_3			= MH3.HANYO_MEI
		,	BUNSEKI_CD_MEI_4			= MH4.HANYO_MEI
		,	ZENIRAI_GK					= CASE JS2.IRAI_SHUBETSU_CD
											WHEN '1' THEN JR.RYOKIN_KEI
											ELSE 0
										  END
		,	GYOMU_SEQ_1					= dbo.GET_GYOMU_SEQ(WC.UKETSUKE_NO, '1')
		,	GYOMU_SEQ_2					= dbo.GET_GYOMU_SEQ(WC.UKETSUKE_NO, '2')
	FROM	W_HIKKOSHI_CSV_SHORT AS WC
			INNER JOIN T_JUCHU_SYOSAI AS JS
				LEFT JOIN M_TANTOSHA AS MT1
				ON	MT1.TANTOSHA_CD = JS.EIGYO_TANTO_CD
				LEFT JOIN M_TANTOSHA AS MT2
				ON	MT2.TANTOSHA_CD = JS.MITSUMORI_TANTO_CD
				LEFT JOIN M_TANTOSHA AS MT3
				ON	MT3.TANTOSHA_CD = JS.GYOMU_TANTO_CD
				LEFT JOIN M_TANTOSHA AS MT4
				ON	MT4.TANTOSHA_CD = JS.JISSHI_TANTO_CD
				LEFT JOIN M_SOSHIKI AS MS1
				ON	MS1.SOSHIKI_CD	= JS.IRAISAKI_SOSHIKI_CD
				LEFT JOIN M_SOSHIKI AS MS2
				ON	MS2.SOSHIKI_CD	= JS.IRAIMOTO_SOSHIKI_CD
				LEFT JOIN M_HANYO AS MH1
				ON	MH1.SOSHIKI_CD	= JS.SOSHIKI_CD
				AND	MH1.HANYO_MEI_KBN = JS.BUNSEKI_CD_1
				AND	MH1.HANYO_KBN	= '01'
				AND MH1.DELETE_FLG	= '0'
				LEFT JOIN M_HANYO AS MH2
				ON	MH2.SOSHIKI_CD	= JS.SOSHIKI_CD
				AND	MH2.HANYO_MEI_KBN = JS.BUNSEKI_CD_2
				AND	MH2.HANYO_KBN	= '02'
				AND MH2.DELETE_FLG	= '0'
				LEFT JOIN M_HANYO AS MH3
				ON	MH3.SOSHIKI_CD	= JS.SOSHIKI_CD
				AND	MH3.HANYO_MEI_KBN = JS.BUNSEKI_CD_3
				AND	MH3.HANYO_KBN	= '03'
				AND MH3.DELETE_FLG	= '0'
				LEFT JOIN M_HANYO AS MH4
				ON	MH4.SOSHIKI_CD	= JS.SOSHIKI_CD
				AND	MH4.HANYO_MEI_KBN = JS.BUNSEKI_CD_4
				AND	MH4.HANYO_KBN	= '04'
				AND MH4.DELETE_FLG	= '0'
				LEFT JOIN T_JUCHU_RYOKIN AS JR
				ON	JS.UKETSUKE_NO	= JR.UKETSUKE_NO
				AND	JS.IRAISAKI_SOSHIKI_CD	= JR.SOSHIKI_CD
				AND	JR.DELETE_FLG = '0'
				LEFT JOIN T_JUCHU_SYOSAI AS JS2
				ON	JS.UKETSUKE_NO	= JS2.UKETSUKE_NO
				AND	JS.IRAISAKI_SOSHIKI_CD	= JS2.SOSHIKI_CD
				AND	JR.DELETE_FLG = '0'
			ON	JS.UKETSUKE_NO	= WC.UKETSUKE_NO
			AND	JS.SOSHIKI_CD	= WC.SOSHIKI_CD
			INNER JOIN T_JUCHU_KIHON AS JK
				LEFT JOIN M_HOJIN AS MH
				ON MH.HOJIN_CD = JK.HOJIN_CD
				LEFT JOIN M_SOSHIKI AS MS
				ON	MS.SOSHIKI_CD	= JK.UKETSUKE_SOSHIKI_CD
				LEFT JOIN M_CREDIT_CARD AS MC
				ON	MC.CREDITCARD_CD	= JK.CREDITCARD_CD	
			ON	JK.UKETSUKE_NO	= WC.UKETSUKE_NO
			INNER JOIN T_JUCHU_HOJO AS JH
			ON	JH.UKETSUKE_NO	= WC.UKETSUKE_NO
			LEFT JOIN T_JUCHU_KOBATO AS JKBT
				LEFT JOIN M_SOSHIKI AS MS3
				ON	MS3.SOSHIKI_CD	= JKBT.HATSU_CENTER_CD
				LEFT JOIN M_SOSHIKI AS MS4
				ON	MS4.SOSHIKI_CD	= JKBT.CHAKU_CENTER_CD
				LEFT JOIN M_DEPOT AS MD1
				ON MD1.DEPOT_CD		= JKBT.HATSU_DEPOT_CD
				LEFT JOIN M_DEPOT AS MD2
				ON MD2.DEPOT_CD		= JKBT.CHAKU_DEPOT_CD
			ON	JKBT.UKETSUKE_NO	= WC.UKETSUKE_NO
	WHERE	WC.IRAI_SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
	SET @ERROR = @@ERROR
	IF @ERROR > 0
	BEGIN
		RETURN
	END
/******* Added 2005.03.09 Akihisa Urushibara *******/

--2005/03/07 ONO START
	UPDATE W_HIKKOSHI_CSV_SHORT SET
		SEIKYU_DT = ''
	WHERE IRAI_SOSHIKI_CD <> UKETSUKE_SOSHIKI_CD
	AND IRAI_SOSHIKI_CD	= @依頼組織CD
/******* Added 2005.03.09 Akihisa Urushibara *******/
	SET @ERROR = @@ERROR
/******* Added 2005.03.09 Akihisa Urushibara *******/
--2005/03/07 ONO END

END



GO

