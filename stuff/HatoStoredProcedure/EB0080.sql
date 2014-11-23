USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[EB0080]    Script Date: 07/31/2014 11:32:40 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[EB0080]
As
	-- トランザクション --
	Begin Transaction
    -- カウンタ停止 --
	Set Nocount On
    -- 作業用変数の定義 --
    Declare @total	int , @cnt int       
	Declare @精算月 varchar(20)
	Declare @消費税率 decimal(10)
	Declare @消費税区分 varchar(1)
	Declare @手数料率 decimal(10)
	Declare @手数料計算区分 varchar(1)
	Declare @手数料消費税区分 varchar(1)
	Declare @消費税額 decimal(10)
	Declare @手数料消費税金額 decimal(10)
	Declare @手数料 decimal(10)
	Declare @システム利用費用 varchar(8)
	-- 清算月取得 --
	Select @精算月 = SEISAN_TUKI From M_SEISAN_KANRI
	-- 消費税率取得 --
	Select @消費税率 = SHOHIZEI_RT From M_ZEIRITU 
	    where TEKIYO_KAISI_DT <= @精算月 + '01'
	      and TEKIYO_SHURYO_DT >= @精算月 + '01'
	-- システム利用費用項目取得 --
	Select @システム利用費用 = M_HIYO_KOMOKU.HIYOKOMOKU_CD,
	       @消費税区分 = M_HIYO_KOMOKU.SHOHIZEI_KBN,
	       @手数料率 = M_HIYO_KOMOKU.TESURYO_RT,
	       @手数料計算区分 = M_HIYO_KOMOKU.TESURYO_KEISAN_KBN,
	       @手数料消費税区分 = M_HIYO_KOMOKU.TESURYO_SHOHIZEI_KBN
	    From M_SOSHIKI,M_HIYO_KOMOKU
		where M_SOSHIKI.SOSHIKI_KBN = '1'
		  And M_SOSHIKI.DELETE_FLG = '0'  
		  And M_HIYO_KOMOKU.HIYOKOMOKU_CD = M_SOSHIKI.SOSHIKI_CD + 'ZZZ'
	
	/* システム利用料費用検索削除処理 */
	Delete			From	T_SEISAN_KAKUTEI	where SEIKYU_YM = @精算月 And HIYOKOMOKU_CD = @システム利用費用 
	Delete			From	T_SEISAN_MEISAI	where SEIKYU_YM = @精算月 And HIYOKOMOKU_CD = @システム利用費用 
	Delete			From	T_SEISAN_SONOTA_HIYOU	where SEIKYU_YM = @精算月 And HIYOKOMOKU_CD = @システム利用費用 
	/* 組織コード単位の請求合計額を算出する。 */
    -- ローカルカーソル定義 --
    Declare My_cur Cursor Local Scroll STATIC
    For Select 	ROUP.MOTO_SOSHIKI_CD,
				M_HIYO_KOMOKU.HIYOKOMOKU_GK * count(distinct ROUP.SAKI_SOSHIKI_CD) as SEIKYU_GOKEI_GK,
				M_HIYO_KOMOKU.HIYOKOMOKU_GK,
				M_HIYO_KOMOKU.HIYOKOMOKU_CD,
				M_SOSHIKI.SOSHIKI_CD
			From			T_SEISAN_KAKUTEI ROUP,M_SOSHIKI as SKSOSHIKI,M_SOSHIKI as MTSOSHIKI,M_SOSHIKI,M_HIYO_KOMOKU
				Where			ROUP.DELETE_FLG = '0'  
					And				ROUP.SEIKYU_YM = @精算月	
					And				ROUP.SHIHARAI_GOKEI_GK > 0	
					And				(	ROUP.KAKUTEI_KESHI_KBN = '0' or ROUP.KAKUTEI_KESHI_KBN is null)
					And				ROUP.SEIKYU_SIHARAI_CD = '2'
					And				MTSOSHIKI.SOSHIKI_CD = ROUP.MOTO_SOSHIKI_CD
					And                                   MTSOSHIKI.SOSHIKI_KBN <> '1'
					And				SKSOSHIKI.SOSHIKI_CD = ROUP.SAKI_SOSHIKI_CD
					And				( not (SKSOSHIKI.SOSHIKI_KBN = '1' and MTSOSHIKI.SOSHIKI_KBN = '2') or (SKSOSHIKI.SOSHIKI_KBN = '2' and MTSOSHIKI.SOSHIKI_KBN = '1')) 
					And				( not (SKSOSHIKI.SOSHIKI_KBN = '1' and MTSOSHIKI.SOSHIKI_KBN = '3') or (SKSOSHIKI.SOSHIKI_KBN = '3' and MTSOSHIKI.SOSHIKI_KBN = '1')) 
					And				M_HIYO_KOMOKU.HIYOKOMOKU_CD = M_SOSHIKI.SOSHIKI_CD + 'ZZZ'
						Group By			ROUP.SEIKYU_YM, ROUP.MOTO_SOSHIKI_CD,M_HIYO_KOMOKU.HIYOKOMOKU_GK,M_HIYO_KOMOKU.HIYOKOMOKU_CD,M_SOSHIKI.SOSHIKI_CD
						order by ROUP.MOTO_SOSHIKI_CD
	 
	-- 変数 --
	Declare @元組織コード		char(5)
	Declare @請求合計金額		decimal(10)
	Declare @システム利用金額	decimal(10)
	Declare @費用項目コード	    char(8)
	Declare @連合会組織コード	char(5)
	
				-- 定数 --
				Declare @更新日				char(17)
				Declare @更新担当者			char(20)
				Declare @画面ＩＤ			char(8)
								-- 更新情報 --
								Set @更新担当者	=	'BATCH'
								Set @画面ＩＤ	=	'EB0080'
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
												Into	@元組織コード, 
													@請求合計金額, 
													@システム利用金額, 
													@費用項目コード, 
													@連合会組織コード 
  						Set @cnt = @cnt + 1
    				/* システム利用料を精算確定に登録する。 */
									if @消費税区分 = '2'
										Begin
											Set @消費税額 = (@請求合計金額 / (100 + @消費税率)) * @消費税率
											Set @請求合計金額 = @請求合計金額 - @消費税額
										end 
									else
									Begin
										if @消費税区分 = '3'
											Begin
												Set @消費税額 = @請求合計金額 / 100 * @消費税率
											end 
										else
											Begin
												Set @消費税額 = 0
											end 
									end 
									if @手数料計算区分 = '2'
										Begin
											Set @手数料 = @請求合計金額 / 100 * @手数料率
											if @手数料消費税区分 = '2'
												Begin
													set @手数料消費税金額 = (@手数料 / (100 + @消費税率)) * @消費税率
												end 
											else
											Begin
												if @手数料消費税区分 = '3'
													Begin
														Set @手数料消費税金額 = @手数料 / 100 * @消費税率
													end 
												else
													Begin
														Set @手数料消費税金額 = 0
													end 
											end 
										end 
									else	
									Begin
										if @手数料計算区分 = '3'
											Begin
												Set @手数料 = (@請求合計金額 + @消費税額) / 100 * @手数料率
												if @手数料消費税区分 = '2'
													Begin
														set @手数料消費税金額 = (@手数料 / (100 + @消費税率)) * @消費税率
														SET @手数料 = @手数料 - @手数料消費税金額
													end 
												else
												Begin
													if @手数料消費税区分 = '3'
														Begin
															Set @手数料消費税金額 = @手数料 / 100 * @消費税率
														end 
													else
														Begin
															Set @手数料消費税金額 = 0
														end 
												end 
											end 
										else
										Begin
												Set @手数料 = 0
												Set @手数料消費税金額 = 0
										end 
									end 
					INSERT INTO T_SEISAN_KAKUTEI
									(SEIKYU_YM, 
									MOTO_SOSHIKI_CD, 
									SAKI_SOSHIKI_CD, 
									SEIKYU_SIHARAI_CD, 
									SEIKYU_GOKEI_GK, 
									SHIHARAI_GOKEI_GK, 
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
											
							VALUES						(@精算月, 
														@連合会組織コード, 
														@元組織コード, 
														'1', 
														@請求合計金額 + @消費税額 + @手数料, 
														0, 
														'1', 
														@費用項目コード, 
											'', 
											'0', 
											'0',
											@更新日, 
											@更新担当者, 
											@画面ＩＤ, 
											'0',
											'00000000')
					INSERT INTO T_SEISAN_KAKUTEI
									(SEIKYU_YM, 
									MOTO_SOSHIKI_CD, 
									SAKI_SOSHIKI_CD, 
									SEIKYU_SIHARAI_CD, 
									SEIKYU_GOKEI_GK, 
									SHIHARAI_GOKEI_GK, 
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
											
							VALUES						(@精算月, 
														@元組織コード, 
														@連合会組織コード, 
														'2', 
														0, 
														@請求合計金額 + @消費税額 + @手数料, 
														'1', 
														@費用項目コード, 
											'', 
											'0', 
											'0',
											@更新日, 
											@更新担当者, 
											@画面ＩＤ, 
											'0',
											'00000000')
    				/* システム利用料を精算確定明細に登録する。 */
									INSERT INTO T_SEISAN_MEISAI
											(SEIKYU_YM, 
											MOTO_SOSHIKI_CD, 
											SAKI_SOSHIKI_CD, 
											HIYOKOMOKU_CD, 
														SEIKYU_SIHARAI_CD, 
														KANRI_NO, 
														MEISAI_KBN, 
														CREDITCARD_CD, 
														KOKYAKUMEI, 
														KAKUTEI_KESHI_KBN, 
														SEIKYU_GK_KBN,
																				UPDATE_DT, 
																				UPDATE_TNT_ID, 
																				GAMEN_ID, 
														DELETE_FLG)
			                                               
									VALUES         (@精算月,
													@連合会組織コード, 
													@元組織コード, 
													@費用項目コード, 
													'1', 
																		@費用項目コード, 
																		'1', 
																		'', 
																		'', 
																		'0', 
																		'0',
																		@更新日, 
																		@更新担当者, 
																		@画面ＩＤ, 
																		'0')
									INSERT INTO T_SEISAN_MEISAI
											(SEIKYU_YM, 
											MOTO_SOSHIKI_CD, 
											SAKI_SOSHIKI_CD, 
											HIYOKOMOKU_CD, 
														SEIKYU_SIHARAI_CD, 
														KANRI_NO, 
														MEISAI_KBN, 
														CREDITCARD_CD, 
														KOKYAKUMEI, 
														KAKUTEI_KESHI_KBN, 
														SEIKYU_GK_KBN,
																				UPDATE_DT, 
																				UPDATE_TNT_ID, 
																				GAMEN_ID, 
														DELETE_FLG)
			                                               
									VALUES         (@精算月,
													@元組織コード, 
													@連合会組織コード, 
													@費用項目コード, 
													'2', 
																		@費用項目コード, 
																		'1', 
																		'', 
																		'', 
																		'0', 
																		'0',
																		@更新日, 
																		@更新担当者, 
																		@画面ＩＤ, 
																		'0')
    				/* システム利用料をその他随時費用に登録する。 */
									INSERT INTO T_SEISAN_SONOTA_HIYOU
											(SEIKYU_YM, 
											MOTO_SOSHIKI_CD, 
											SAKI_SOSHIKI_CD, 
											SEIKYU_SIHARAI_CD, 
														HIYOKOMOKU_CD, 
														HASEI_DT, 
														HIYOKOMOKU_GK, 
														SHOHIZEI_KBN, 
														SHOHIZEI_RT, 
														SHOHIZEI_GK, 
														TESURYO_RT,
														TESURYO_KEISAN_KBN,
														TESURYO_SHOHIZEI_KBN,
														TESURYO_SHOHIZEI_GK,
														TESURYO_GK,
														MEISAI_HIYO_GK,
														MEISAI_SHOHIZEI_GK,
														MEISAI_TOTAL_GK,
														MEISAI_TESURYO_GK,
														SEIKYU_GOKEI_GK,
														BIKO,
														SYOSAI_TRI_MEI,
														SYOSAI_BIKO,
														SYOSAI_KEIYU_GK,
														SYOSAI_HIKITORIZEI_GK,
														SYOSAI_SONOTA_GK,
														SYOSAI_SYOHIZEI_GK,
														SYOSAI_GOKEI_GK,
																				UPDATE_DT, 
																				UPDATE_TNT_ID, 
																				GAMEN_ID, 
														DELETE_FLG)
									VALUES         (@精算月,
													@連合会組織コード, 
													@元組織コード, 
													'1', 
													@費用項目コード, 
																		@精算月 + '01', 
																		@請求合計金額, 
																		@消費税区分, 
																		@消費税率, 
																		@消費税額, 
																		@手数料率,
																		@手数料計算区分,
																		@手数料消費税区分,
																		@手数料消費税金額,
																		@手数料,
																		@請求合計金額,
																		@消費税額,
																		@請求合計金額 + @消費税額,
																		@手数料,
																		@請求合計金額 + @消費税額 + @手数料 + @手数料消費税金額,
																		'',
																		'',
																		'',
																		'0',
																		'0',
																		'0',
																		'0',
																		'0',
																		@更新日, 
																		@更新担当者, 
																		@画面ＩＤ, 
																		'0')
									INSERT INTO T_SEISAN_SONOTA_HIYOU
											(SEIKYU_YM, 
											MOTO_SOSHIKI_CD, 
											SAKI_SOSHIKI_CD, 
											SEIKYU_SIHARAI_CD, 
														HIYOKOMOKU_CD, 
														HASEI_DT, 
														HIYOKOMOKU_GK, 
														SHOHIZEI_KBN, 
														SHOHIZEI_RT, 
														SHOHIZEI_GK, 
														TESURYO_RT,
														TESURYO_KEISAN_KBN,
														TESURYO_SHOHIZEI_KBN,
														TESURYO_SHOHIZEI_GK,
														TESURYO_GK,
														MEISAI_HIYO_GK,
														MEISAI_SHOHIZEI_GK,
														MEISAI_TOTAL_GK,
														MEISAI_TESURYO_GK,
														SEIKYU_GOKEI_GK,
														BIKO,
														SYOSAI_TRI_MEI,
														SYOSAI_BIKO,
														SYOSAI_KEIYU_GK,
														SYOSAI_HIKITORIZEI_GK,
														SYOSAI_SONOTA_GK,
														SYOSAI_SYOHIZEI_GK,
														SYOSAI_GOKEI_GK,
																				UPDATE_DT, 
																				UPDATE_TNT_ID, 
																				GAMEN_ID, 
														DELETE_FLG)
									VALUES         (@精算月,
													@元組織コード, 
													@連合会組織コード, 
													'2', 
													@費用項目コード, 
																		@精算月 + '01', 
																		@請求合計金額, 
																		@消費税区分, 
																		@消費税率, 
																		@消費税額, 
																		@手数料率,
																		@手数料計算区分,
																		@手数料消費税区分,
																		@手数料消費税金額,
																		@手数料,
																		@請求合計金額,
																		@消費税額,
																		@請求合計金額 + @消費税額,
																		@手数料,
																		@請求合計金額 + @消費税額 + @手数料 + @手数料消費税金額,
																		'',
																		'',
																		'',
																		'0',
																		'0',
																		'0',
																		'0',
																		'0',
																		@更新日, 
																		@更新担当者, 
																		@画面ＩＤ, 
																		'0')
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

