USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[UPD_JUSHO_CD]    Script Date: 07/31/2014 11:50:35 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[UPD_JUSHO_CD](@UKETSUKE_NO CHAR(8),@GYOMU_SEQ CHAR(1)) AS
BEGIN
	DECLARE
		@MVC_NAME		VARCHAR(30),
		@MVC_JUSHO_NM	VARCHAR(30),
		@MCH_JUSHO_CD	CHAR(5),
		@MNM_LEN		INT,
		@MNM_LEN1		INT,
		@MNM_LEN2		INT,
		@MTB_TLEN1		INT,
		@MTB_TLEN2		INT,
		@MTB_TLEN3		INT,
		@MTB_TLEN4		INT,
		@MTB_TLEN5		INT,
		@SAGYOCHI_POSTAL_NO CHAR(8)
	SELECT	@MNM_LEN      = 0,
			@MNM_LEN1     = 0,
			@MNM_LEN2     = 0,
			@MVC_NAME     = NULL
	DECLARE CUR_GYOMU CURSOR FOR
		SELECT
			CHARINDEX('郡',SAGYOCHI_JYUSHO_1),
			CHARINDEX('町',SAGYOCHI_JYUSHO_1),
			CHARINDEX('村',SAGYOCHI_JYUSHO_1),
			CHARINDEX('市',SAGYOCHI_JYUSHO_1),
			CHARINDEX('区',SAGYOCHI_JYUSHO_1),
			SAGYOCHI_JYUSHO_1,
			SAGYOCHI_POSTAL_NO
		FROM T_JUCHU_GYOMU
		WHERE UKETSUKE_NO = @UKETSUKE_NO
		AND   GYOMU_SEQ   = @GYOMU_SEQ
	OPEN CUR_GYOMU
	FETCH FROM CUR_GYOMU INTO 
				@MTB_TLEN1,
				@MTB_TLEN2,
				@MTB_TLEN3,
				@MTB_TLEN4,
				@MTB_TLEN5,
				@MVC_JUSHO_NM,
				@SAGYOCHI_POSTAL_NO
	IF @SAGYOCHI_POSTAL_NO IS NOT NULL
	BEGIN
		UPDATE T_JUCHU_GYOMU SET SAGYOCHI_SHIKUGUN_CD = M.SHIKUGUN_CD
			FROM  M_YUBIN_BANGO AS M
			WHERE M.YUBIN_NO    = T_JUCHU_GYOMU.SAGYOCHI_POSTAL_NO
			AND   T_JUCHU_GYOMU.UKETSUKE_NO = @UKETSUKE_NO
			AND   T_JUCHU_GYOMU.GYOMU_SEQ   = @GYOMU_SEQ
	END
	ELSE
	BEGIN
		--郡の名称が存在するか
		SELECT @MNM_LEN = @MTB_TLEN1
		IF @MNM_LEN > 0
		BEGIN
			--存在する
			--町の名称が存在するか
			SELECT @MNM_LEN1 = @MTB_TLEN2
			IF @MNM_LEN1 = 0
				--村の名称が存在するか
				SELECT @MNM_LEN1 = @MTB_TLEN3
			--市が存在するか
			SELECT @MNM_LEN2 = @MTB_TLEN4
		END
		ELSE
		BEGIN
			--市の名称が文字列中に存在するか
			SELECT @MNM_LEN  = @MTB_TLEN4
			--区の名称が文字列中に存在するか
			SELECT @MNM_LEN1 = @MTB_TLEN5
			IF @MNM_LEN1 = 0
				SELECT @MNM_LEN1 = @MNM_LEN
			ELSE
				IF @MNM_LEN = 0
					SELECT @MNM_LEN = @MNM_LEN1
		END
		IF @MNM_LEN1 != 0 OR @MNM_LEN2 != 0
		BEGIN
			IF @MNM_LEN1 != 0
				--存在する
				SELECT @MVC_NAME = SUBSTRING(@MVC_JUSHO_NM,1,@MNM_LEN1)
			--住所コードが取得できない場合でも市の名称が存在する場合は
			--住所コードを検索
			IF @MCH_JUSHO_CD IS NULL AND @MNM_LEN2 != 0
				SELECT @MVC_NAME = SUBSTRING(@MVC_JUSHO_NM,1,@MNM_LEN2)
		END
		IF @MVC_NAME IS NOT NULL
			--住所コードを検索し結果を返す
			SELECT @MCH_JUSHO_CD = dbo.GET_JUSHO_CD(@MVC_NAME)
		IF @MCH_JUSHO_CD IS NOT NULL
			UPDATE T_JUCHU_GYOMU SET SAGYOCHI_SHIKUGUN_CD = @MCH_JUSHO_CD
				WHERE UKETSUKE_NO = @UKETSUKE_NO
				AND   GYOMU_SEQ   = @GYOMU_SEQ
	END
	CLOSE CUR_GYOMU
	DEALLOCATE CUR_GYOMU
END

GO

