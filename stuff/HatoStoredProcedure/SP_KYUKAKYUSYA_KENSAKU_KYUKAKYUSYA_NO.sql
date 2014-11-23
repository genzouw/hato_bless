USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_KYUKAKYUSYA_KENSAKU_KYUKAKYUSYA_NO]    Script Date: 07/31/2014 11:48:09 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO



CREATE PROCEDURE [dbo].[SP_KYUKAKYUSYA_KENSAKU_KYUKAKYUSYA_NO](
	@IN_SESSION_ID       AS CHAR(30),
	@IN_KYUJAKYUSYA_NO   AS CHAR(8),
	@IN_SOSHIKI_CD       AS CHAR(5)
)
AS
DECLARE
	@ERR INT
BEGIN

	SET @ERR = 0

	--検索結果データを削除する
	DELETE W_COM_KENSAKU_RES
		WHERE SESSION_CD = @IN_SESSION_ID

	INSERT INTO W_COM_KENSAKU_RES(
				SESSION_CD,
				UKETSUKE_NO,
				SOSHIKI_CD
				)
		SELECT	@IN_SESSION_ID,
				KK.KYUKAKYUSYA_NO,
				@IN_SOSHIKI_CD
			FROM
				T_KYUKAKYUSYA AS KK
				--------------------------------------------------------
				-- 2010/10/22 Ins SYS_Ohki
				LEFT JOIN M_SOSHIKI HASSIN
				ON   KK.HASSIN_CENTER_CD = HASSIN.SOSHIKI_CD
				AND  HASSIN.DELETE_FLG   = '0'
				LEFT JOIN M_SOSHIKI SESSION
				ON   @IN_SOSHIKI_CD      = SESSION.SOSHIKI_CD
				AND  SESSION.DELETE_FLG  = '0'
				--------------------------------------------------------
			WHERE KK.DELETE_FLG  = '0'
			AND
				(
					(KK.HASSIN_CENTER_CD   = @IN_SOSHIKI_CD)
				OR	(KK.IRAISAKI_CENTER_CD = @IN_SOSHIKI_CD)
				OR	(KK.SEIYAKU_KBN        = '1')
				)
			--------------------------------------------------------
			-- 2010/10/22 Ins SYS_Ohki
			AND (	KK.KYOSO_KBN = '0' 
				OR (KK.KYOSO_KBN = '1' AND  SESSION.SOSHIKI_KBN = '3' AND HASSIN.SOSHIKI_KBN  = '3' AND SESSION.JYOBU_SOSHIKI_CD = HASSIN.JYOBU_SOSHIKI_CD)
				OR (KK.KYOSO_KBN = '1' AND  SESSION.SOSHIKI_KBN = '3' AND HASSIN.SOSHIKI_KBN  = '2' AND SESSION.JYOBU_SOSHIKI_CD = HASSIN.SOSHIKI_CD)
				OR (KK.KYOSO_KBN = '1' AND  SESSION.SOSHIKI_KBN = '2' AND HASSIN.SOSHIKI_KBN  = '2' AND SESSION.SOSHIKI_CD       = HASSIN.SOSHIKI_CD)
				OR (KK.KYOSO_KBN = '1' AND  SESSION.SOSHIKI_KBN = '2' AND HASSIN.SOSHIKI_KBN  = '3' AND SESSION.SOSHIKI_CD       = HASSIN.JYOBU_SOSHIKI_CD)
				OR (KK.KYOSO_KBN = '1' AND (SESSION.SOSHIKI_KBN = '1' OR  HASSIN.SOSHIKI_KBN  = '1'))
				)
			--------------------------------------------------------
			AND	KK.KYUKAKYUSYA_NO = @IN_KYUJAKYUSYA_NO
	IF @@ERROR != 0
	BEGIN
		SET @ERR = @@ERROR
	END

	RETURN @ERR

END


GO
