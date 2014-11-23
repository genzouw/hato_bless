USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[EB0090_RECOVERY]    Script Date: 07/31/2014 11:34:07 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

/******************************************************************/
/* 請求データ作成処理 2014.03.24データリカバリ用ＳＰ　　　　　　　*/
/* YYYYMM引数でT_SEISAN_SOUSAIのデータを再集計する　　　　　　　　*/
/******************************************************************/
CREATE PROCEDURE [dbo].[EB0090_RECOVERY](@YYYYMM精算年月 VARCHAR(20))
As
	-- トランザクション --
	Begin Transaction
    -- カウンタ停止 --
	Set Nocount On
    -- 作業用変数の定義 --
    Declare @total	int , @cnt int       
	Declare @精算月 varchar(20)
	
	-- 清算月取得 --
	-- OHKI リカバリー用に修正 --
	--Select @精算月 = SEISAN_TUKI From M_SEISAN_KANRI
	SET @精算月 = @YYYYMM精算年月
	-- OHKI リカバリー用に修正 --
	
	/* 組織コード単位の請求合計額を算出する。 */
    -- ローカルカーソル定義 --
    Declare My_cur Cursor Local Scroll STATIC
    For Select 	SAKI_SOSHIKI_CD,
					Sum(SEIKYU_GOKEI_GK) as SEIKYU_GOKEI_GK,
						Sum(SHIHARAI_GOKEI_GK) As SHIHARAI_GOKEI_GK
			From			T_SEISAN_KAKUTEI ROUP 
				Where			DELETE_FLG = '0'  
					And				SEIKYU_YM = @精算月	
					And				(	KAKUTEI_KESHI_KBN = '0' or KAKUTEI_KESHI_KBN is null)
						Group By			SEIKYU_YM, SAKI_SOSHIKI_CD
   
	/* 精算確定相殺テーブル検索削除処理 */
	Delete			From	T_SEISAN_SOUSAI	where SEIKYU_YM = @精算月
	 
	-- 変数 --
	Declare @組織コード			char(5)
	Declare @請求合計金額		decimal(10)
	Declare @支払い合計金額		decimal(10)
	
				-- 定数 --
				Declare @更新日				char(17)
				Declare @更新担当者			char(20)
				Declare @画面ＩＤ			char(8)
								-- 更新情報 --
								Set @更新担当者	=	'BATCH'
								Set @画面ＩＤ	=	'EB0090'
								Select @更新日 = Substring(Convert(char, Getdate(), 120), 3,18)
		
    -- ローカルカーソルを開く
    Open My_cur
    -- 結果セットの行数を取得する
    Set @total = @@CURSOR_ROWS
    -- 正の値のときは、結果セットがあります
    If( @total > 0 )
         Begin
                Set @cnt = 0
						-- 結果セットを１行づつ取得する
						While( @cnt <> @total )
								Begin
								-- １行進めて、その内容を取得
								-- このカーソルは、STATIC です
								Fetch Next 
										From My_cur 
												Into	@組織コード,	
													@請求合計金額, 
											@支払い合計金額
  						Set @cnt = @cnt + 1
				/* 相殺計算 */
				declare	@sousaigaku	as varchar(15)
				set @sousaigaku = @請求合計金額 - @支払い合計金額
				
				-- 振込請求判定(マイナスの時は、支払に値を入れ、請求を無しとする) --
				if substring(@sousaigaku, 1,1) = '-'
				begin
					set @請求合計金額 = 0
					set @支払い合計金額 = cast(replace(@sousaigaku, '-', '') as decimal)
				end															
				else
				begin
					set @請求合計金額 = cast(@sousaigaku as decimal)
					set @支払い合計金額 = 0
				end
								
    			/* 請求合計額と支払合計額の相殺額を精算確定相殺テーブルに登録する。 */
				INSERT INTO T_SEISAN_SOUSAI
							(
							SEIKYU_YM, 
								SOSHIKI_CD,
									SEIKYU_GOKEI_GK,
											SHIHARAI_GOKEI_GK,
												UPDATE_DT, 
													UPDATE_TNT_ID, 
														GAMEN_ID, 
															DELETE_FLG
															)
														VALUES
														(
												@精算月, 
										@組織コード, 
									@請求合計金額, 
								@支払い合計金額, 
							@更新日, 
						@更新担当者, 
					@画面ＩＤ, 
				'0'
				)
	         End
         End
    -- カーソルを閉じる
    Close My_cur
    -- 参照関係を解除する
    Deallocate My_cur
    
    -- トランザクション終了 --
    Commit Transaction
	/* SET NOCOUNT ON */
	Return 


GO

