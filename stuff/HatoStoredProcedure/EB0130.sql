USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[EB0130]    Script Date: 07/31/2014 11:34:54 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

/****** オブジェクト :  ストアド プロシージャ dbo.EB0130    スクリプト日付 : 2004/07/13 22:01:35 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.EB0130    スクリプト日付 : 2004/07/12 11:26:13 ******/
/**********************/
/* 支払データ精算確定作成処理 */
/**********************/
CREATE PROCEDURE [dbo].[EB0130]
AS
	
	--　トランザクション（開始）--
	Begin Transaction
    -- カウンタ停止 --
	Set Nocount On
	
    -- 作業用変数の定義
    Declare @total int , @cnt int       
	Declare @清算月 varchar(20)
	-- 清算月取得 --
	Select @清算月=SEISAN_TUKI From M_SEISAN_KANRI 
	/* 初期読み込み（清算受注テーブル） */
    -- ローカルカーソル定義 --
    Declare My_cur Cursor Local Scroll STATIC
	For Select  DISTINCT T_SEISAN_JUCHU.SEIKYU_YM,
				T_SEISAN_JUCHU.MOTO_SOSHIKI_CD,
				T_SEISAN_JUCHU.SAKI_SOSHIKI_CD,
				T_SEISAN_JUCHU.UKETSUKE_NO,
				T_SEISAN_JUCHU.SEIKYU_SIHARAI_CD, 
				T_SEISAN_JUCHU.CENTER_CD, 
				T_SEISAN_JUCHU.UKETSUKE_DT, 
				T_SEISAN_JUCHU.TORIATSUKAI_KBN,
				T_SEISAN_JUCHU.HOJIN_CD, 
				T_SEISAN_JUCHU.HOJIN_TNT_MEI,
				T_SEISAN_JUCHU.JUCHU_KEIYU_CD, 
				T_SEISAN_JUCHU.KOKYAKU_SEIKYU_KBN,
				T_SEISAN_JUCHU.KOKYAKUMEI, 
				T_SEISAN_JUCHU.SEIKYU_GK, 
				T_SEISAN_JUCHU.SEIKYU_UTIZEI_GK, 
				T_SEISAN_JUCHU.TATEKAE_GK, 
				T_SEISAN_JUCHU.SHOHIZEI_KBN, 
				T_SEISAN_JUCHU.SHOHIZEI_GK, 
				T_SEISAN_JUCHU.JUCHU_DT,
				T_SEISAN_JUCHU.SEIKYU_DT, 
				T_SEISAN_JUCHU.OROSHI_DT, 
				T_SEISAN_JUCHU.JUCHU_UPDATE, 
				T_SEISAN_JUCHU.JUCHU_TNT_CD, 
				T_SEISAN_JUCHU.SEIKYU_GK_KBN,
				T_SEISAN_JUCHU.UPDATE_DT, 
				T_SEISAN_JUCHU.UPDATE_TNT_ID, 
				T_SEISAN_JUCHU.GAMEN_ID, 
				T_SEISAN_JUCHU.DELETE_FLG,
				T_SEISAN_MEISAI.KAKUTEI_KESHI_KBN,
				T_SEISAN_MEISAI.SAKI_SOSHIKI_CD AS ChkSoshikiCode
    FROM T_SEISAN_JUCHU LEFT JOIN T_SEISAN_MEISAI 	ON 
	     T_SEISAN_JUCHU.SEIKYU_YM 				= T_SEISAN_MEISAI.SEIKYU_YM 
 	AND (T_SEISAN_JUCHU.MOTO_SOSHIKI_CD			= T_SEISAN_MEISAI.MOTO_SOSHIKI_CD)
	AND (T_SEISAN_JUCHU.SAKI_SOSHIKI_CD 		= T_SEISAN_MEISAI.SAKI_SOSHIKI_CD)	
	AND (T_SEISAN_JUCHU.SEIKYU_SIHARAI_CD		= T_SEISAN_MEISAI.SEIKYU_SIHARAI_CD)
	AND (T_SEISAN_JUCHU.UKETSUKE_NO	          	= T_SEISAN_MEISAI.KANRI_NO)	
	AND (T_SEISAN_MEISAI.MEISAI_KBN             = '2')	
	Where T_SEISAN_JUCHU.SEIKYU_YM				= @清算月 
	AND T_SEISAN_JUCHU.DELETE_FLG				= '0'
	AND T_SEISAN_JUCHU.SEIKYU_SIHARAI_CD		= '2'
	/* 清算確定登録処理、明細登録処理 */
	
	Declare @請求月	char(6)
    Declare @元組織コード char(5)
	Declare @先組織コード char(5)
	Declare @受付番号 char(8)
	Declare @請求支払いコード char(1)
	Declare @センターコード char(5)
	Declare @受付日 char(8)
	Declare @取り扱い区分 char(2)
	Declare @法人コード char(9)
	Declare @法人担当者名 char(20)
	Declare @受注経由コード char(2)
	Declare @顧客請求区分 char(1)
	Declare @顧客名 char(16)
	Declare @請求合計 decimal(18)
	Declare @請求内税金額 decimal(18)
	Declare @立替金額 decimal(18)
	Declare @消費税区分 char(1)
	Declare @消費税合計 decimal(18)
	Declare @受注日 char(8)
	Declare @請求日 char(8)
	Declare @卸日 char(8)
	Declare @受注更新日 char(17)
	Declare @受注担当者コード char(10)
	Declare @請求合計区分 char(1)
	Declare @更新日 char(17)
	Declare @更新者ＩＤ char(10)
	Declare @画面ＩＤ char(6)
	Declare @削除フラグ char(1)
	Declare @確定消し区分 char(1) -- 追加
	Declare @Check組織コード char(5)  --追加
   -- 20040728 ukita
   delete T_SEISAN_KAKUTEI WHERE SEIKYU_SIHARAI_CD = '2' AND MEISAI_KBN = '2' AND SEIKYU_YM = @清算月
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
                          Fetch Next From My_cur Into @請求月, 
													  @元組織コード, 
													  @先組織コード,
													  @受付番号,
													  @請求支払いコード,
													  @センターコード,
													  @受付日,
													  @取り扱い区分,
													  @法人コード,
													  @法人担当者名,
													  @受注経由コード,
													  @顧客請求区分,
													  @顧客名,
													  @請求合計,
													  @請求内税金額,
													  @立替金額,
													  @消費税区分,
													  @消費税合計,
													  @受注日,
													  @請求日,
													  @卸日,
													  @受注更新日,
													  @受注担当者コード,
													  @請求合計区分,
													  @更新日,
													  @更新者ＩＤ,
													 @画面ＩＤ,
													 @削除フラグ,
													  @確定消し区分,
													  @Check組織コード
													  
	--if @cnt = 0 
	--begin
	--/* 精算確定テーブル検索削除処理 */ 
	--	delete T_SEISAN_KAKUTEI WHERE SEIKYU_SIHARAI_CD = '2' AND MEISAI_KBN = '2' AND SEIKYU_YM = @清算月
	--end
     Set @cnt = @cnt + 1
  									 
						 -- 更新日取得 --
						 Declare @更新登録日 as char(17)
						 Declare @更新登録者ＩＤ as char(10)
						 Declare @画面登録ＩＤ as char(6)
						 
						 Select @更新登録日 = Substring(Convert(char, Getdate(), 120), 3,18)
						 Set @更新登録者ＩＤ = 'BATCH'
						 Set @画面登録ＩＤ = 'EB0130'
						 
						 Declare @支払い合計金額 as decimal(19)
						 Set @支払い合計金額 = @請求合計 + @請求内税金額 + @立替金額 + @消費税合計
						 
						 Declare @費用項目コード as char(8)						 
						 Set @費用項目コード = @受付番号
						 
						 declare @備考 as char(1) 
						 Set @備考 = ''
						 
						 Declare @管理番号 as char(8)
						 Set @管理番号 = @受付番号
						 
						 Declare @明細区分 as char(1)
						 Set @明細区分 = '2'
						 Declare @明細区分４ as char(1)
						 Set @明細区分４ = '4'
						 
						 Declare @クレジットカードコード as char(1)
						 Set @クレジットカードコード = ''
						 
						 Declare @確定取り消し区分 as char(1)
						 Set @確定取り消し区分 = '0'
						 					 
						 -- Select * from My_cur	
		
						if @Check組織コード is null or 
						  (@Check組織コード is not null)
							begin		
						 Set @確定取り消し区分 = @確定消し区分
						 if @請求支払いコード = '2' 
						 begin
							Insert Into T_SEISAN_KAKUTEI
							 
									(SEIKYU_YM, 
									MOTO_SOSHIKI_CD, 
									SAKI_SOSHIKI_CD, 
									SEIKYU_SIHARAI_CD, 
									SHIHARAI_GOKEI_GK, 
									SEIKYU_GOKEI_GK, 
									MEISAI_KBN, 
									HIYOKOMOKU_CD, 
							        
												BIKO, 
												KAKUTEI_KESHI_KBN, 
												SEIKYU_GK_KBN,
												UPDATE_DT, 
												UPDATE_TNT_ID, 
												GAMEN_ID, 
												DELETE_FLG,
												KANRI_NO)
											
							VALUES						(@請求月, 
														@元組織コード, 
														@先組織コード, 
														'2', 
														@支払い合計金額, 
														'0', 
														'2', 
														@費用項目コード, 
											@備考, 
											@確定取り消し区分, 
											@請求合計区分,
											@更新登録日, 
											@更新登録者ＩＤ, 
											@画面登録ＩＤ, 
											'0',
											'00000000')
							end
							end
										
                    End
         End
	Commit Transaction	
	-- 終了処理 --
    -- カーソルを閉じる
    Close My_cur
    -- 参照関係を解除する
    Deallocate My_cur
	-- トランザクション（終了）--
	Return


GO

