USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_JUCHU_KENSAKU_MANAGER]    Script Date: 07/31/2014 11:45:32 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


CREATE PROCEDURE [dbo].[SP_JUCHU_KENSAKU_MANAGER](
	@IN_SESSION_ID       AS CHAR(30),
	@IN_GAMEN_ID         AS CHAR(6),
	@IN_USER_ID          AS CHAR(10),
	@IN_UKETSUKE_NO      AS CHAR(8),
	@IN_KOKYAKUMEI       AS VARCHAR(40),
	@IN_KOKYAKUMEI_KANA  AS VARCHAR(40),
	@IN_HOJIN_CD         AS CHAR(9),
	@IN_JUCHU_STS_CD     AS VARCHAR(8),
	@IN_TEHAI_STS_CD     AS VARCHAR(5),
	@IN_MITSUMORI_DATE_F AS CHAR(8),
	@IN_MITSUMORI_DATE_T AS CHAR(8),
	@IN_SAGYO_DATE_F     AS CHAR(8),
	@IN_SAGYO_DATE_T     AS CHAR(8),
	@IN_SAGYO_DATE_OP    AS CHAR(2),
	@IN_TORI_KBN_OP      AS CHAR(1),
	@IN_CENTER_OP        AS CHAR(2),
	@IN_BUTTON_FLG       AS CHAR(1)
)
AS
DECLARE
	@ERR                 INT,
	@V_KENSAKU_CONDITION VARCHAR(256),
	@C_SOSHIKI_CD        CHAR(5),
	@C_SOSHIKI_KBN       CHAR(1),
	@C_UKETSUKE_NO       CHAR(8),
	@V_KOKYAKUMEI        VARCHAR(40),
	@V_KOKYAKUMEI_KANA   VARCHAR(40),
	@C_HOJIN_CD          CHAR(9),
	@V_JUCHU_STS_CD      VARCHAR(8),
	@V_TEHAI_STS_CD      VARCHAR(5),
	@C_MITSUMORI_DATE_F  CHAR(8),
	@C_MITSUMORI_DATE_T  CHAR(8),
	@C_SAGYO_DATE_F      CHAR(8),
	@C_SAGYO_DATE_T      CHAR(8),
	@C_SAGYO_DATE_OP     CHAR(2),
	@C_TORI_KBN_OP       CHAR(1),
	@C_CENTER_OP         CHAR(2),
	@C_BUTTON_FLG        CHAR(1),
	@YOKUYOKU_JITSU      CHAR(8)
	
BEGIN

	SET @C_UKETSUKE_NO      = ''+RTRIM(@IN_UKETSUKE_NO)
	SET @V_KOKYAKUMEI       = ''+RTRIM(@IN_KOKYAKUMEI)
	SET @V_KOKYAKUMEI_KANA  = ''+RTRIM(@IN_KOKYAKUMEI_KANA)
	SET @C_HOJIN_CD         = ''+RTRIM(@IN_HOJIN_CD)
	SET @V_JUCHU_STS_CD     = ''+RTRIM(@IN_JUCHU_STS_CD)
	SET @V_TEHAI_STS_CD     = ''+RTRIM(@IN_TEHAI_STS_CD)
	SET @C_MITSUMORI_DATE_F = ''+RTRIM(@IN_MITSUMORI_DATE_F)
	SET @C_MITSUMORI_DATE_T = ''+RTRIM(@IN_MITSUMORI_DATE_T)
	SET @C_SAGYO_DATE_F     = ''+RTRIM(@IN_SAGYO_DATE_F)
	SET @C_SAGYO_DATE_T     = ''+RTRIM(@IN_SAGYO_DATE_T)
	SET @C_SAGYO_DATE_OP    = ''+RTRIM(@IN_SAGYO_DATE_OP)
	SET @C_TORI_KBN_OP      = ''+RTRIM(@IN_TORI_KBN_OP)
	SET @C_CENTER_OP        = ''+RTRIM(@IN_CENTER_OP)
	SET @C_BUTTON_FLG       = ''+RTRIM(@IN_BUTTON_FLG)

	--ユーザＩＤの組織属性を取得する
	SELECT
		@C_SOSHIKI_CD  = MU.SOSHIKI_CD,
		@C_SOSHIKI_KBN = MS.SOSHIKI_KBN
		FROM
			M_USER_KANRI MU
			INNER JOIN M_SOSHIKI MS
				ON (MS.SOSHIKI_CD = MU.SOSHIKI_CD)
		WHERE USER_ID = @IN_USER_ID

	--検索条件を結合する
	SET @V_KENSAKU_CONDITION = ''
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + RTRIM(@C_UKETSUKE_NO) + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + RTRIM(@V_KOKYAKUMEI) + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + RTRIM(@V_KOKYAKUMEI_KANA) + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + RTRIM(@C_HOJIN_CD) + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + @V_JUCHU_STS_CD + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + @V_TEHAI_STS_CD + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + RTRIM(@C_MITSUMORI_DATE_F) + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + RTRIM(@C_MITSUMORI_DATE_T) + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + RTRIM(@C_SAGYO_DATE_F) + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + RTRIM(@C_SAGYO_DATE_T) + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + @C_SAGYO_DATE_OP + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + @C_TORI_KBN_OP + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + @C_CENTER_OP + ','
	SET @V_KENSAKU_CONDITION = @V_KENSAKU_CONDITION + @C_BUTTON_FLG

	SET NOCOUNT ON

	--検索条件を保持する
	EXEC @ERR = SP_COM_SAVE_KENSAKU_CONDITION @IN_SESSION_ID,@IN_GAMEN_ID,@V_KENSAKU_CONDITION
	IF @ERR != 0
	BEGIN
		GOTO SP_JUCHU_KENSAKU_MANAGER_EXIT
	END

	--全件ボタンクリック
	IF @C_BUTTON_FLG = '1'
	BEGIN
		EXEC @ERR = SP_JUCHU_KENSAKU_ALL @IN_SESSION_ID,@C_SOSHIKI_CD
	END

	--検索ボタンクリック
	IF @C_BUTTON_FLG = '2'
	BEGIN
		--受付番号指定
		IF RTRIM(@C_UKETSUKE_NO) != ''
		BEGIN
			EXEC @ERR = SP_JUCHU_KENSAKU_UKETSUKE_NO @IN_SESSION_ID,@C_UKETSUKE_NO,@C_SOSHIKI_CD
			GOTO SP_JUCHU_KENSAKU_MANAGER_EXIT
		END
		ELSE
		BEGIN
			EXEC @ERR = SP_JUCHU_KENSAKU_OTHER
									@IN_SESSION_ID     ,
									@C_SOSHIKI_CD      ,
									@C_SOSHIKI_KBN     ,
									@V_KOKYAKUMEI      ,
									@V_KOKYAKUMEI_KANA ,
									@C_HOJIN_CD        ,
									@V_JUCHU_STS_CD    ,
									@V_TEHAI_STS_CD    ,
									@C_MITSUMORI_DATE_F,
									@C_MITSUMORI_DATE_T,
									@C_SAGYO_DATE_F    ,
									@C_SAGYO_DATE_T    ,
									@C_SAGYO_DATE_OP   ,
									@C_TORI_KBN_OP     ,
									@C_CENTER_OP       
		END
	END

	--前々日ボタンクリック
	IF @C_BUTTON_FLG = '3'
	BEGIN
		SET @YOKUYOKU_JITSU = CONVERT(CHAR(8),DATEADD(Day,2,GETDATE()),112)

		SET @V_KOKYAKUMEI       = ''
		SET @V_KOKYAKUMEI_KANA  = ''
		SET @C_HOJIN_CD         = ''
		SET @V_JUCHU_STS_CD     = '00000000'
		SET @V_TEHAI_STS_CD     = '00000'
		SET @C_MITSUMORI_DATE_F = ''
		SET @C_MITSUMORI_DATE_T = ''
		SET @C_SAGYO_DATE_F     = @YOKUYOKU_JITSU
		SET @C_SAGYO_DATE_T     = @YOKUYOKU_JITSU
		SET @C_SAGYO_DATE_OP    = '00'
		SET @C_TORI_KBN_OP      = '0'
		SET @C_CENTER_OP        = '00'
		
		EXEC @ERR = SP_JUCHU_KENSAKU_OTHER
								@IN_SESSION_ID     ,
								@C_SOSHIKI_CD      ,
								@C_SOSHIKI_KBN     ,
								@V_KOKYAKUMEI      ,
								@V_KOKYAKUMEI_KANA ,
								@C_HOJIN_CD        ,
								@V_JUCHU_STS_CD    ,
								@V_TEHAI_STS_CD    ,
								@C_MITSUMORI_DATE_F,
								@C_MITSUMORI_DATE_T,
								@C_SAGYO_DATE_F    ,
								@C_SAGYO_DATE_T    ,
								@C_SAGYO_DATE_OP   ,
								@C_TORI_KBN_OP     ,
								@C_CENTER_OP       
	END


SP_JUCHU_KENSAKU_MANAGER_EXIT:
	SET NOCOUNT OFF
	RETURN @ERR

END

GO

