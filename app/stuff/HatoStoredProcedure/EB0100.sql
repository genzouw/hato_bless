USE [HATO2]
GO

/****** Object:  StoredProcedure [dbo].[EB0100]    Script Date: 07/31/2014 11:34:20 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

/****** オブジェクト :  ストアド プロシージャ dbo.EB0100    スクリプト日付 : 2004/07/13 22:01:35 ******/
/****** オブジェクト :  ストアド プロシージャ dbo.EB0100    スクリプト日付 : 2004/07/12 11:26:13 ******/
/**********/
/* 〆処理 */
/**********/
CREATE Procedure [dbo].[EB0100]
as
	-- トランザクション --
	begin Transaction
	-- ストアドカウンタOff --
	set nocount on
	
	/* 年月繰越処理 */
	-- 精算月取得 --
	
		declare @year as varchar(4)
		declare @mon as varchar(2)
		declare @seisantsuki as varchar(6)
			
		select	@seisantsuki = seisan_tuki, 
				@year	= substring(seisan_tuki, 1,4),
				@mon	= substring(seisan_tuki, 5,2)  
		from	m_seisan_kanri
		where	delete_flg = 0
		if @mon = 12
		begin
			set @year = @year + 1
			set @mon = 1
		end
		else
		begin
			set @mon = @mon + 1
		end
				
	-- 繰越 --
	update	m_seisan_kanri
	set		seisan_tuki		= @year + right('00'+rtrim(convert(char(2),@mon)),2), 
			gamen_id		= 'EB0100', 
			update_tnt_id	= 'BATCH', 
			update_dt		= substring(convert(char, getdate(), 120), 3,18),
			delete_flg		= '0'
	where	seisan_tuki		= @seisantsuki
	and		delete_flg		= '0'
    -- トランザクション終了 --
    commit transaction
	Return
	

GO

