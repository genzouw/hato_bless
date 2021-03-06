USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[SP_JUCHU_KENSAKU_ALL]    Script Date: 07/31/2014 11:45:09 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


CREATE PROCEDURE [dbo].[SP_JUCHU_KENSAKU_ALL](
	@IN_SESSION_ID       AS CHAR(30),
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
		SELECT	TOP 301
				@IN_SESSION_ID,
				JS.UKETSUKE_NO,
				JS.SOSHIKI_CD
			FROM
				T_JUCHU_SYOSAI JS
				INNER JOIN T_JUCHU_KIHON JK
				ON (JK.UKETSUKE_NO = JS.UKETSUKE_NO)
			WHERE JS.SOSHIKI_CD  = @IN_SOSHIKI_CD
			AND   JS.DELETE_FLG  = '0'
			AND   JK.DELETE_FLG  = '0'
			ORDER BY JS.UKETSUKE_NO DESC
	IF @@ERROR != 0
	BEGIN
		SET @ERR = @@ERROR
	END

	RETURN @ERR

END

GO

