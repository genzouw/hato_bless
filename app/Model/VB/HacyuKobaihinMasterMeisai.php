<?php
class HacyuKobaihinMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getHacyuKobaihinManageJoho(){

    /*
		Public Function GetHacyuKobaihinManageJoho(KobaiName As String, ShiiresakiName As String, KobaiBunruiName As String, HanbaisakiName As String, ByRef MsgCd As String, FindFlg As Integer) As HachuKobaihin()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As HachuKobaihin()
			Try
				Dim flag As Boolean = FindFlg = 0
				Dim strSQL As String
				If flag Then
					strSQL = String.Format(masterSQL.SCF0041().ToString(), New Object()() { KobaiName, ShiiresakiName, KobaiBunruiName, HanbaisakiName })
				Else
					strSQL = String.Format(masterSQL.SCF0040().ToString(), New Object(0 - 1) {})
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As HachuKobaihin()
				While sqlDataReader.Read()
					flag = (num >= 99)
					If flag Then
						MsgCd = "SI0090"
					End If
					flag = (num < 100)
					If flag Then
						array = CType(Utils.CopyArray(CType(array, Array), New HachuKobaihin(num + 1 - 1) {}), HachuKobaihin())
						Dim hachuKobaihin As HachuKobaihin = array(num)
						array(num) = New HachuKobaihin()
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
						If flag Then
							array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
						Else
							array(num).STR_SOSHIKI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
						If flag Then
							array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
						Else
							array(num).STR_KOBAI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_GYOSHA_CD")))
						If flag Then
							array(num).STR_GAIBU_GYOSHA_CD = Conversions.ToString(sqlDataReader("GAIBU_GYOSHA_CD"))
						Else
							array(num).STR_GAIBU_GYOSHA_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_RYAKU_MEI")))
						If flag Then
							array(num).STR_GYOSHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("GYOSHA_RYAKU_MEI"))
						Else
							array(num).STR_GYOSHA_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_SOSHIKI_CD")))
						If flag Then
							array(num).STR_HANBAISAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("HANBAISAKI_SOSHIKI_CD"))
						Else
							array(num).STR_HANBAISAKI_SOSHIKI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_BUNRUI_MEI")))
						If flag Then
							array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
						Else
							array(num).STR_KOBAI_BUNRUI_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
						If flag Then
							array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
						Else
							array(num).STR_KOBAI_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_RYAKU_MEI")))
						If flag Then
							array(num).STR_KOBAI_RYAKU_MEI = Conversions.ToString(sqlDataReader("KOBAI_RYAKU_MEI"))
						Else
							array(num).STR_KOBAI_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_KANA_MEI")))
						If flag Then
							array(num).STR_KOBAI_KANA_MEI = Conversions.ToString(sqlDataReader("KOBAI_KANA_MEI"))
						Else
							array(num).STR_KOBAI_KANA_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_SURYO_TANI")))
						If flag Then
							array(num).STR_KOBAI_SURYO_TANI = Strings.RTrim(Conversions.ToString(sqlDataReader("KOBAI_SURYO_TANI")))
						Else
							array(num).STR_KOBAI_SURYO_TANI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
						If flag Then
							array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
						Else
							array(num).STR_SOSHIKI_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRE_TANKA_GK")))
						If flag Then
							array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal(sqlDataReader("SHIIRE_TANKA_GK"))
						Else
							array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MAIL_ADRS")))
						If flag Then
							array(num).STR_SHIIRESAKI_MAIL_ADRS = Conversions.ToString(sqlDataReader("SHIIRESAKI_MAIL_ADRS"))
						Else
							array(num).STR_SHIIRESAKI_MAIL_ADRS = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_TEL_NO")))
						If flag Then
							array(num).STR_SHIIRESAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_TEL_NO")))
						Else
							array(num).STR_SHIIRESAKI_TEL_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_FAX_NO")))
						If flag Then
							array(num).STR_SHIIRESAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_FAX_NO")))
						Else
							array(num).STR_SHIIRESAKI_FAX_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_SU")))
						If flag Then
							array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger(sqlDataReader("SHIIRESAKI_MATOME_SU"))
						Else
							array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_GK")))
						If flag Then
							array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("SHIIRESAKI_MATOME_GK"))
						Else
							array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TANKA_GK")))
						If flag Then
							array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_TANKA_GK"))
						Else
							array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MIN_LOT_SU")))
						If flag Then
							array(num).INT_MIN_LOT_SU = Conversions.ToInteger(sqlDataReader("MIN_LOT_SU"))
						Else
							array(num).INT_MIN_LOT_SU = Conversions.ToInteger("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_TEL_NO")))
						If flag Then
							array(num).STR_HANBAISAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_TEL_NO")))
						Else
							array(num).STR_HANBAISAKI_TEL_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_FAX_NO")))
						If flag Then
							array(num).STR_HANBAISAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_FAX_NO")))
						Else
							array(num).STR_HANBAISAKI_FAX_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_SU")))
						If flag Then
							array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger(sqlDataReader("HANBAI_MATOME_SU"))
						Else
							array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_GK")))
						If flag Then
							array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_MATOME_GK"))
						Else
							array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONOTA_KINGAKU_MEI")))
						If flag Then
							array(num).STR_SONOTA_KINGAKU_MEI = Conversions.ToString(sqlDataReader("SONOTA_KINGAKU_MEI"))
						Else
							array(num).STR_SONOTA_KINGAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONITA_KINGAKU_GK")))
						If flag Then
							array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal(sqlDataReader("SONITA_KINGAKU_GK"))
						Else
							array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TESURYO_RT")))
						If flag Then
							array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("HANBAI_TESURYO_RT"))
						Else
							array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_KOBAI_CD")))
						If flag Then
							array(num).STR_JISHA_KOBAI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JISHA_KOBAI_CD")))
						Else
							array(num).STR_JISHA_KOBAI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("REMARKS")))
						If flag Then
							array(num).STR_REMARKS = Conversions.ToString(sqlDataReader("REMARKS"))
						Else
							array(num).STR_REMARKS = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
						If flag Then
							array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
						Else
							array(num).STR_UPDATE_DT = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
						If flag Then
							array(num).STR_UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
						Else
							array(num).STR_UPDATE_TNT_ID = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
						If flag Then
							array(num).STR_GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
						Else
							array(num).STR_GAMEN_ID = ""
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_AA3 As Exception
				ProjectData.SetProjectError(expr_AA3)
				Dim ex As Exception = expr_AA3
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }

    function getHacyuKobaihinMasterMeisai(){

    /*

		Public Function GetHacyuKobaihinMasterMeisai(SoshikiCd As String, KobaiCd As String, GaibuGyoshaCd As String, ByRef MsgCd As String, FindFlg As Integer) As HachuKobaihin()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As HachuKobaihin()
			Try
				Dim flag As Boolean = FindFlg = 0
				Dim strSQL As String
				If flag Then
					strSQL = String.Format(masterSQL.SCF0043().ToString(), SoshikiCd, KobaiCd, GaibuGyoshaCd)
				Else
					strSQL = String.Format(masterSQL.SCF0040().ToString(), New Object(0 - 1) {})
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As HachuKobaihin()
				While sqlDataReader.Read()
					flag = (num >= 99)
					If flag Then
						MsgCd = "SI0090"
					End If
					flag = (num < 100)
					If flag Then
						array = CType(Utils.CopyArray(CType(array, Array), New HachuKobaihin(num + 1 - 1) {}), HachuKobaihin())
						Dim hachuKobaihin As HachuKobaihin = array(num)
						array(num) = New HachuKobaihin()
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
						If flag Then
							array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
						Else
							array(num).STR_SOSHIKI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
						If flag Then
							array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
						Else
							array(num).STR_KOBAI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_GYOSHA_CD")))
						If flag Then
							array(num).STR_GAIBU_GYOSHA_CD = Conversions.ToString(sqlDataReader("GAIBU_GYOSHA_CD"))
						Else
							array(num).STR_GAIBU_GYOSHA_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_RYAKU_MEI")))
						If flag Then
							array(num).STR_GYOSHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("GYOSHA_RYAKU_MEI"))
						Else
							array(num).STR_GYOSHA_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_SOSHIKI_CD")))
						If flag Then
							array(num).STR_HANBAISAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("HANBAISAKI_SOSHIKI_CD"))
						Else
							array(num).STR_HANBAISAKI_SOSHIKI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_BUNRUI_MEI")))
						If flag Then
							array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
						Else
							array(num).STR_KOBAI_BUNRUI_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
						If flag Then
							array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
						Else
							array(num).STR_KOBAI_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_RYAKU_MEI")))
						If flag Then
							array(num).STR_KOBAI_RYAKU_MEI = Conversions.ToString(sqlDataReader("KOBAI_RYAKU_MEI"))
						Else
							array(num).STR_KOBAI_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_KANA_MEI")))
						If flag Then
							array(num).STR_KOBAI_KANA_MEI = Conversions.ToString(sqlDataReader("KOBAI_KANA_MEI"))
						Else
							array(num).STR_KOBAI_KANA_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_SURYO_TANI")))
						If flag Then
							array(num).STR_KOBAI_SURYO_TANI = Strings.RTrim(Conversions.ToString(sqlDataReader("KOBAI_SURYO_TANI")))
						Else
							array(num).STR_KOBAI_SURYO_TANI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
						If flag Then
							array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
						Else
							array(num).STR_SOSHIKI_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRE_TANKA_GK")))
						If flag Then
							array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal(sqlDataReader("SHIIRE_TANKA_GK"))
						Else
							array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MAIL_ADRS")))
						If flag Then
							array(num).STR_SHIIRESAKI_MAIL_ADRS = Conversions.ToString(sqlDataReader("SHIIRESAKI_MAIL_ADRS"))
						Else
							array(num).STR_SHIIRESAKI_MAIL_ADRS = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_TEL_NO")))
						If flag Then
							array(num).STR_SHIIRESAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_TEL_NO")))
						Else
							array(num).STR_SHIIRESAKI_TEL_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_FAX_NO")))
						If flag Then
							array(num).STR_SHIIRESAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_FAX_NO")))
						Else
							array(num).STR_SHIIRESAKI_FAX_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_SU")))
						If flag Then
							array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger(sqlDataReader("SHIIRESAKI_MATOME_SU"))
						Else
							array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_GK")))
						If flag Then
							array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("SHIIRESAKI_MATOME_GK"))
						Else
							array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TANKA_GK")))
						If flag Then
							array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_TANKA_GK"))
						Else
							array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MIN_LOT_SU")))
						If flag Then
							array(num).INT_MIN_LOT_SU = Conversions.ToInteger(sqlDataReader("MIN_LOT_SU"))
						Else
							array(num).INT_MIN_LOT_SU = Conversions.ToInteger("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_TEL_NO")))
						If flag Then
							array(num).STR_HANBAISAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_TEL_NO")))
						Else
							array(num).STR_HANBAISAKI_TEL_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_FAX_NO")))
						If flag Then
							array(num).STR_HANBAISAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_FAX_NO")))
						Else
							array(num).STR_HANBAISAKI_FAX_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_SU")))
						If flag Then
							array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger(sqlDataReader("HANBAI_MATOME_SU"))
						Else
							array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_GK")))
						If flag Then
							array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_MATOME_GK"))
						Else
							array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONOTA_KINGAKU_MEI")))
						If flag Then
							array(num).STR_SONOTA_KINGAKU_MEI = Conversions.ToString(sqlDataReader("SONOTA_KINGAKU_MEI"))
						Else
							array(num).STR_SONOTA_KINGAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONITA_KINGAKU_GK")))
						If flag Then
							array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal(sqlDataReader("SONITA_KINGAKU_GK"))
						Else
							array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TESURYO_RT")))
						If flag Then
							array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("HANBAI_TESURYO_RT"))
						Else
							array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_KOBAI_CD")))
						If flag Then
							array(num).STR_JISHA_KOBAI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JISHA_KOBAI_CD")))
						Else
							array(num).STR_JISHA_KOBAI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("REMARKS")))
						If flag Then
							array(num).STR_REMARKS = Conversions.ToString(sqlDataReader("REMARKS"))
						Else
							array(num).STR_REMARKS = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
						If flag Then
							array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
						Else
							array(num).STR_UPDATE_DT = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
						If flag Then
							array(num).STR_UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
						Else
							array(num).STR_UPDATE_TNT_ID = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
						If flag Then
							array(num).STR_GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
						Else
							array(num).STR_GAMEN_ID = ""
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_A83 As Exception
				ProjectData.SetProjectError(expr_A83)
				Dim ex As Exception = expr_A83
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }

    function getHacyuKobaihinMaster(){

    /*
		Public Function GetHacyuKobaihinMaster(MotoSoshikiCode As String, ShiiresakiCd As String, KobaiBunruiMei As String, KobaiMei As String, KobaiCd As String, ByRef MsgCd As String, FindFlg As Integer, Optional count As String="0") As HachuKobaihin()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As HachuKobaihin()
			Try
				Dim flag As Boolean = FindFlg = 0
				Dim flag2 As Boolean
				Dim strSQL As String
				If flag Then
					flag2 = (Operators.CompareString(Strings.Trim(ShiiresakiCd), "", False) = 0)
					If flag2 Then
						ShiiresakiCd = ""
					Else
						flag2 = (Strings.Len(Strings.Trim(ShiiresakiCd)) = 4)
						If flag2 Then
							ShiiresakiCd = Strings.Trim(MotoSoshikiCode + ShiiresakiCd)
						End If
					End If
					strSQL = String.Format(masterSQL.SCF0042().ToString(), New Object()() { MotoSoshikiCode, ShiiresakiCd, KobaiBunruiMei, KobaiMei, KobaiCd })
				Else
					flag2 = (FindFlg = 2)
					If flag2 Then
						flag = (Operators.CompareString(Strings.Trim(ShiiresakiCd), "", False) = 0)
						If flag Then
							ShiiresakiCd = ""
						Else
							flag2 = (Strings.Len(Strings.Trim(ShiiresakiCd)) <> 9)
							If flag2 Then
								ShiiresakiCd = Strings.Trim(MotoSoshikiCode + ShiiresakiCd)
							End If
						End If
						strSQL = String.Format(masterSQL.SCF0046().ToString(), New Object()() { MotoSoshikiCode, ShiiresakiCd, KobaiBunruiMei, KobaiMei, KobaiCd })
					Else
						flag2 = (FindFlg = 3)
						If flag2 Then
							strSQL = String.Format(masterSQL.SCF0042().ToString(), New Object()() { MotoSoshikiCode, ShiiresakiCd, KobaiBunruiMei, KobaiMei, KobaiCd })
						Else
							strSQL = String.Format(masterSQL.SCF0040().ToString(), MotoSoshikiCode)
						End If
					End If
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				flag2 = (Operators.CompareString(count, "1", False) = 0)
				Dim array As HachuKobaihin()
				If flag2 Then
					flag = (Operators.CompareString(MsgCd, "SE0001", False) = 0)
					If flag Then
						result = array
						Return result
					End If
				End If
				Dim num As Integer = 0
				While sqlDataReader.Read()
					array = CType(Utils.CopyArray(CType(array, Array), New HachuKobaihin(num + 1 - 1) {}), HachuKobaihin())
					Dim hachuKobaihin As HachuKobaihin = array(num)
					array(num) = New HachuKobaihin()
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
					If flag2 Then
						array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
					Else
						array(num).STR_SOSHIKI_CD = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
					If flag2 Then
						array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
					Else
						array(num).STR_KOBAI_CD = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_GYOSHA_CD")))
					If flag2 Then
						array(num).STR_GAIBU_GYOSHA_CD = Conversions.ToString(sqlDataReader("GAIBU_GYOSHA_CD"))
					Else
						array(num).STR_GAIBU_GYOSHA_CD = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_RYAKU_MEI")))
					If flag2 Then
						array(num).STR_GYOSHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("GYOSHA_RYAKU_MEI"))
					Else
						array(num).STR_GYOSHA_RYAKU_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_SOSHIKI_CD")))
					If flag2 Then
						array(num).STR_HANBAISAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("HANBAISAKI_SOSHIKI_CD"))
					Else
						array(num).STR_HANBAISAKI_SOSHIKI_CD = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_BUNRUI_MEI")))
					If flag2 Then
						array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
					Else
						array(num).STR_KOBAI_BUNRUI_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
					If flag2 Then
						array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
					Else
						array(num).STR_KOBAI_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_RYAKU_MEI")))
					If flag2 Then
						array(num).STR_KOBAI_RYAKU_MEI = Conversions.ToString(sqlDataReader("KOBAI_RYAKU_MEI"))
					Else
						array(num).STR_KOBAI_RYAKU_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_KANA_MEI")))
					If flag2 Then
						array(num).STR_KOBAI_KANA_MEI = Conversions.ToString(sqlDataReader("KOBAI_KANA_MEI"))
					Else
						array(num).STR_KOBAI_KANA_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_SURYO_TANI")))
					If flag2 Then
						array(num).STR_KOBAI_SURYO_TANI = Strings.RTrim(Conversions.ToString(sqlDataReader("KOBAI_SURYO_TANI")))
					Else
						array(num).STR_KOBAI_SURYO_TANI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
					If flag2 Then
						array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
					Else
						array(num).STR_SOSHIKI_RYAKU_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRE_TANKA_GK")))
					If flag2 Then
						array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal(sqlDataReader("SHIIRE_TANKA_GK"))
					Else
						array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MAIL_ADRS")))
					If flag2 Then
						array(num).STR_SHIIRESAKI_MAIL_ADRS = Conversions.ToString(sqlDataReader("SHIIRESAKI_MAIL_ADRS"))
					Else
						array(num).STR_SHIIRESAKI_MAIL_ADRS = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_TEL_NO")))
					If flag2 Then
						array(num).STR_SHIIRESAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_TEL_NO")))
					Else
						array(num).STR_SHIIRESAKI_TEL_NO = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_FAX_NO")))
					If flag2 Then
						array(num).STR_SHIIRESAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_FAX_NO")))
					Else
						array(num).STR_SHIIRESAKI_FAX_NO = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_SU")))
					If flag2 Then
						array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger(sqlDataReader("SHIIRESAKI_MATOME_SU"))
					Else
						array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_GK")))
					If flag2 Then
						array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("SHIIRESAKI_MATOME_GK"))
					Else
						array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TANKA_GK")))
					If flag2 Then
						array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_TANKA_GK"))
					Else
						array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MIN_LOT_SU")))
					If flag2 Then
						array(num).INT_MIN_LOT_SU = Conversions.ToInteger(sqlDataReader("MIN_LOT_SU"))
					Else
						array(num).INT_MIN_LOT_SU = Conversions.ToInteger("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_TEL_NO")))
					If flag2 Then
						array(num).STR_HANBAISAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_TEL_NO")))
					Else
						array(num).STR_HANBAISAKI_TEL_NO = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_FAX_NO")))
					If flag2 Then
						array(num).STR_HANBAISAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_FAX_NO")))
					Else
						array(num).STR_HANBAISAKI_FAX_NO = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_SU")))
					If flag2 Then
						array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger(sqlDataReader("HANBAI_MATOME_SU"))
					Else
						array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_GK")))
					If flag2 Then
						array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_MATOME_GK"))
					Else
						array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONOTA_KINGAKU_MEI")))
					If flag2 Then
						array(num).STR_SONOTA_KINGAKU_MEI = Conversions.ToString(sqlDataReader("SONOTA_KINGAKU_MEI"))
					Else
						array(num).STR_SONOTA_KINGAKU_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONITA_KINGAKU_GK")))
					If flag2 Then
						array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal(sqlDataReader("SONITA_KINGAKU_GK"))
					Else
						array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TESURYO_RT")))
					If flag2 Then
						array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("HANBAI_TESURYO_RT"))
					Else
						array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_KOBAI_CD")))
					If flag2 Then
						array(num).STR_JISHA_KOBAI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JISHA_KOBAI_CD")))
					Else
						array(num).STR_JISHA_KOBAI_CD = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("REMARKS")))
					If flag2 Then
						array(num).STR_REMARKS = Strings.Trim(Conversions.ToString(sqlDataReader("REMARKS")))
					Else
						array(num).STR_REMARKS = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
					If flag2 Then
						array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
					Else
						array(num).STR_UPDATE_DT = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
					If flag2 Then
						array(num).STR_UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
					Else
						array(num).STR_UPDATE_TNT_ID = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
					If flag2 Then
						array(num).STR_GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
					Else
						array(num).STR_GAMEN_ID = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TASOSHIKI_KOBAI_CD")))
					If flag2 Then
						array(num).STR_TASOSHIKI_KOBAI_CD = Conversions.ToString(sqlDataReader("TASOSHIKI_KOBAI_CD"))
					Else
						array(num).STR_TASOSHIKI_KOBAI_CD = ""
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_C35 As Exception
				ProjectData.SetProjectError(expr_C35)
				Dim ex As Exception = expr_C35
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }

    function getHacyuKobaihinMaster2(){

    /*
		Public Function GetHacyuKobaihinMaster2(MotoSoshikiCode As String, ShiiresakiCd As String, KobaiBunruiMei As String, KobaiMei As String, KobaiCd As String, ByRef MsgCd As String, FindFlg As Integer, Optional count As String="0") As HachuKobaihin()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As HachuKobaihin()
			Try
				Dim flag As Boolean = FindFlg = 0
				Dim flag2 As Boolean
				Dim strSQL As String
				If flag Then
					flag2 = (Operators.CompareString(Strings.Trim(ShiiresakiCd), "", False) = 0)
					If flag2 Then
						ShiiresakiCd = ""
					Else
						ShiiresakiCd = Strings.Trim(MotoSoshikiCode + ShiiresakiCd)
					End If
					strSQL = String.Format(masterSQL.SCF0045().ToString(), New Object()() { MotoSoshikiCode, ShiiresakiCd, KobaiBunruiMei, KobaiMei, KobaiCd })
				Else
					strSQL = String.Format(masterSQL.SCF0040().ToString(), MotoSoshikiCode)
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				flag2 = (Operators.CompareString(count, "1", False) = 0)
				Dim array As HachuKobaihin()
				If flag2 Then
					flag = (Operators.CompareString(MsgCd, "SE0001", False) = 0)
					If flag Then
						result = array
						Return result
					End If
				End If
				Dim num As Integer = 0
				While sqlDataReader.Read()
					array = CType(Utils.CopyArray(CType(array, Array), New HachuKobaihin(num + 1 - 1) {}), HachuKobaihin())
					Dim hachuKobaihin As HachuKobaihin = array(num)
					array(num) = New HachuKobaihin()
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
					If flag2 Then
						array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
					Else
						array(num).STR_SOSHIKI_CD = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
					If flag2 Then
						array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
					Else
						array(num).STR_KOBAI_CD = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_GYOSHA_CD")))
					If flag2 Then
						array(num).STR_GAIBU_GYOSHA_CD = Conversions.ToString(sqlDataReader("GAIBU_GYOSHA_CD"))
					Else
						array(num).STR_GAIBU_GYOSHA_CD = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_RYAKU_MEI")))
					If flag2 Then
						array(num).STR_GYOSHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("GYOSHA_RYAKU_MEI"))
					Else
						array(num).STR_GYOSHA_RYAKU_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_SOSHIKI_CD")))
					If flag2 Then
						array(num).STR_HANBAISAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("HANBAISAKI_SOSHIKI_CD"))
					Else
						array(num).STR_HANBAISAKI_SOSHIKI_CD = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_BUNRUI_MEI")))
					If flag2 Then
						array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
					Else
						array(num).STR_KOBAI_BUNRUI_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
					If flag2 Then
						array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
					Else
						array(num).STR_KOBAI_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_RYAKU_MEI")))
					If flag2 Then
						array(num).STR_KOBAI_RYAKU_MEI = Conversions.ToString(sqlDataReader("KOBAI_RYAKU_MEI"))
					Else
						array(num).STR_KOBAI_RYAKU_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_KANA_MEI")))
					If flag2 Then
						array(num).STR_KOBAI_KANA_MEI = Conversions.ToString(sqlDataReader("KOBAI_KANA_MEI"))
					Else
						array(num).STR_KOBAI_KANA_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_SURYO_TANI")))
					If flag2 Then
						array(num).STR_KOBAI_SURYO_TANI = Strings.RTrim(Conversions.ToString(sqlDataReader("KOBAI_SURYO_TANI")))
					Else
						array(num).STR_KOBAI_SURYO_TANI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
					If flag2 Then
						array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
					Else
						array(num).STR_SOSHIKI_RYAKU_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRE_TANKA_GK")))
					If flag2 Then
						array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal(sqlDataReader("SHIIRE_TANKA_GK"))
					Else
						array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MAIL_ADRS")))
					If flag2 Then
						array(num).STR_SHIIRESAKI_MAIL_ADRS = Conversions.ToString(sqlDataReader("SHIIRESAKI_MAIL_ADRS"))
					Else
						array(num).STR_SHIIRESAKI_MAIL_ADRS = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_TEL_NO")))
					If flag2 Then
						array(num).STR_SHIIRESAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_TEL_NO")))
					Else
						array(num).STR_SHIIRESAKI_TEL_NO = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_FAX_NO")))
					If flag2 Then
						array(num).STR_SHIIRESAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_FAX_NO")))
					Else
						array(num).STR_SHIIRESAKI_FAX_NO = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_SU")))
					If flag2 Then
						array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger(sqlDataReader("SHIIRESAKI_MATOME_SU"))
					Else
						array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_GK")))
					If flag2 Then
						array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("SHIIRESAKI_MATOME_GK"))
					Else
						array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TANKA_GK")))
					If flag2 Then
						array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_TANKA_GK"))
					Else
						array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MIN_LOT_SU")))
					If flag2 Then
						array(num).INT_MIN_LOT_SU = Conversions.ToInteger(sqlDataReader("MIN_LOT_SU"))
					Else
						array(num).INT_MIN_LOT_SU = Conversions.ToInteger("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_TEL_NO")))
					If flag2 Then
						array(num).STR_HANBAISAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_TEL_NO")))
					Else
						array(num).STR_HANBAISAKI_TEL_NO = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_FAX_NO")))
					If flag2 Then
						array(num).STR_HANBAISAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_FAX_NO")))
					Else
						array(num).STR_HANBAISAKI_FAX_NO = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_SU")))
					If flag2 Then
						array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger(sqlDataReader("HANBAI_MATOME_SU"))
					Else
						array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_GK")))
					If flag2 Then
						array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_MATOME_GK"))
					Else
						array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONOTA_KINGAKU_MEI")))
					If flag2 Then
						array(num).STR_SONOTA_KINGAKU_MEI = Conversions.ToString(sqlDataReader("SONOTA_KINGAKU_MEI"))
					Else
						array(num).STR_SONOTA_KINGAKU_MEI = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONITA_KINGAKU_GK")))
					If flag2 Then
						array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal(sqlDataReader("SONITA_KINGAKU_GK"))
					Else
						array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TESURYO_RT")))
					If flag2 Then
						array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("HANBAI_TESURYO_RT"))
					Else
						array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal("0")
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_KOBAI_CD")))
					If flag2 Then
						array(num).STR_JISHA_KOBAI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JISHA_KOBAI_CD")))
					Else
						array(num).STR_JISHA_KOBAI_CD = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("REMARKS")))
					If flag2 Then
						array(num).STR_REMARKS = Strings.Trim(Conversions.ToString(sqlDataReader("REMARKS")))
					Else
						array(num).STR_REMARKS = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
					If flag2 Then
						array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
					Else
						array(num).STR_UPDATE_DT = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
					If flag2 Then
						array(num).STR_UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
					Else
						array(num).STR_UPDATE_TNT_ID = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
					If flag2 Then
						array(num).STR_GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
					Else
						array(num).STR_GAMEN_ID = ""
					End If
					flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TASOSHIKI_KOBAI_CD")))
					If flag2 Then
						array(num).STR_TASOSHIKI_KOBAI_CD = Conversions.ToString(sqlDataReader("TASOSHIKI_KOBAI_CD"))
					Else
						array(num).STR_TASOSHIKI_KOBAI_CD = ""
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_B39 As Exception
				ProjectData.SetProjectError(expr_B39)
				Dim ex As Exception = expr_B39
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }

    function getHacyuKobaihinMaster(){

    /*
		Public Function GetHacyuKobaihinMaster(MotoSoshikiCode As String, ShiiresakiCd As String, KobaiBunruiMei As String, KobaiMei As String, KobaiCd As String, ByRef MsgCd As String, FindFlg As Integer, RptFlg As Integer) As HachuKobaihin()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As HachuKobaihin()
			Try
				Dim flag As Boolean = FindFlg = 0
				Dim strSQL As String
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(Strings.Trim(ShiiresakiCd), "", False) = 0
					If flag2 Then
						ShiiresakiCd = ""
					Else
						ShiiresakiCd = Strings.Trim(MotoSoshikiCode + ShiiresakiCd)
					End If
					strSQL = String.Format(masterSQL.SCF0042().ToString(), New Object()() { MotoSoshikiCode, ShiiresakiCd, KobaiBunruiMei, KobaiMei, KobaiCd })
				Else
					strSQL = String.Format(masterSQL.SCF0040().ToString(), MotoSoshikiCode)
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As HachuKobaihin()
				While sqlDataReader.Read()
					Dim flag2 As Boolean = num < 100
					If flag2 Then
						array = CType(Utils.CopyArray(CType(array, Array), New HachuKobaihin(num + 1 - 1) {}), HachuKobaihin())
						Dim hachuKobaihin As HachuKobaihin = array(num)
						array(num) = New HachuKobaihin()
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
						If flag2 Then
							array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
						Else
							array(num).STR_SOSHIKI_CD = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
						If flag2 Then
							array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
						Else
							array(num).STR_KOBAI_CD = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_GYOSHA_CD")))
						If flag2 Then
							array(num).STR_GAIBU_GYOSHA_CD = Conversions.ToString(sqlDataReader("GAIBU_GYOSHA_CD"))
						Else
							array(num).STR_GAIBU_GYOSHA_CD = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_RYAKU_MEI")))
						If flag2 Then
							array(num).STR_GYOSHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("GYOSHA_RYAKU_MEI"))
						Else
							array(num).STR_GYOSHA_RYAKU_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_SOSHIKI_CD")))
						If flag2 Then
							array(num).STR_HANBAISAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("HANBAISAKI_SOSHIKI_CD"))
						Else
							array(num).STR_HANBAISAKI_SOSHIKI_CD = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_BUNRUI_MEI")))
						If flag2 Then
							array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
						Else
							array(num).STR_KOBAI_BUNRUI_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
						If flag2 Then
							array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
						Else
							array(num).STR_KOBAI_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_RYAKU_MEI")))
						If flag2 Then
							array(num).STR_KOBAI_RYAKU_MEI = Conversions.ToString(sqlDataReader("KOBAI_RYAKU_MEI"))
						Else
							array(num).STR_KOBAI_RYAKU_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_KANA_MEI")))
						If flag2 Then
							array(num).STR_KOBAI_KANA_MEI = Conversions.ToString(sqlDataReader("KOBAI_KANA_MEI"))
						Else
							array(num).STR_KOBAI_KANA_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_SURYO_TANI")))
						If flag2 Then
							array(num).STR_KOBAI_SURYO_TANI = Strings.RTrim(Conversions.ToString(sqlDataReader("KOBAI_SURYO_TANI")))
						Else
							array(num).STR_KOBAI_SURYO_TANI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
						If flag2 Then
							array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
						Else
							array(num).STR_SOSHIKI_RYAKU_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRE_TANKA_GK")))
						If flag2 Then
							array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal(sqlDataReader("SHIIRE_TANKA_GK"))
						Else
							array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal("0")
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MAIL_ADRS")))
						If flag2 Then
							array(num).STR_SHIIRESAKI_MAIL_ADRS = Conversions.ToString(sqlDataReader("SHIIRESAKI_MAIL_ADRS"))
						Else
							array(num).STR_SHIIRESAKI_MAIL_ADRS = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_TEL_NO")))
						If flag2 Then
							array(num).STR_SHIIRESAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_TEL_NO")))
						Else
							array(num).STR_SHIIRESAKI_TEL_NO = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_FAX_NO")))
						If flag2 Then
							array(num).STR_SHIIRESAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_FAX_NO")))
						Else
							array(num).STR_SHIIRESAKI_FAX_NO = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_SU")))
						If flag2 Then
							array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger(sqlDataReader("SHIIRESAKI_MATOME_SU"))
						Else
							array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger("0")
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_GK")))
						If flag2 Then
							array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("SHIIRESAKI_MATOME_GK"))
						Else
							array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal("0")
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TANKA_GK")))
						If flag2 Then
							array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_TANKA_GK"))
						Else
							array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal("0")
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MIN_LOT_SU")))
						If flag2 Then
							array(num).INT_MIN_LOT_SU = Conversions.ToInteger(sqlDataReader("MIN_LOT_SU"))
						Else
							array(num).INT_MIN_LOT_SU = Conversions.ToInteger("0")
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_TEL_NO")))
						If flag2 Then
							array(num).STR_HANBAISAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_TEL_NO")))
						Else
							array(num).STR_HANBAISAKI_TEL_NO = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_FAX_NO")))
						If flag2 Then
							array(num).STR_HANBAISAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_FAX_NO")))
						Else
							array(num).STR_HANBAISAKI_FAX_NO = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_SU")))
						If flag2 Then
							array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger(sqlDataReader("HANBAI_MATOME_SU"))
						Else
							array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger("0")
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_GK")))
						If flag2 Then
							array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_MATOME_GK"))
						Else
							array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal("0")
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONOTA_KINGAKU_MEI")))
						If flag2 Then
							array(num).STR_SONOTA_KINGAKU_MEI = Conversions.ToString(sqlDataReader("SONOTA_KINGAKU_MEI"))
						Else
							array(num).STR_SONOTA_KINGAKU_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONITA_KINGAKU_GK")))
						If flag2 Then
							array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal(sqlDataReader("SONITA_KINGAKU_GK"))
						Else
							array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal("0")
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TESURYO_RT")))
						If flag2 Then
							array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("HANBAI_TESURYO_RT"))
						Else
							array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal("0")
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_KOBAI_CD")))
						If flag2 Then
							array(num).STR_JISHA_KOBAI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JISHA_KOBAI_CD")))
						Else
							array(num).STR_JISHA_KOBAI_CD = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("REMARKS")))
						If flag2 Then
							array(num).STR_REMARKS = Strings.Trim(Conversions.ToString(sqlDataReader("REMARKS")))
						Else
							array(num).STR_REMARKS = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
						If flag2 Then
							array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
						Else
							array(num).STR_UPDATE_DT = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
						If flag2 Then
							array(num).STR_UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
						Else
							array(num).STR_UPDATE_TNT_ID = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
						If flag2 Then
							array(num).STR_GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
						Else
							array(num).STR_GAMEN_ID = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TASOSHIKI_KOBAI_CD")))
						If flag2 Then
							array(num).STR_TASOSHIKI_KOBAI_CD = Conversions.ToString(sqlDataReader("TASOSHIKI_KOBAI_CD"))
						Else
							array(num).STR_TASOSHIKI_KOBAI_CD = ""
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_B12 As Exception
				ProjectData.SetProjectError(expr_B12)
				Dim ex As Exception = expr_B12
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }

    function getHacyuKobaihin2Master(){

    /*
		Public Function GetHacyuKobaihin2Master(MotoSoshikiCode As String, ShiiresakiCd As String, KobaiBunruiMei As String, KobaiMei As String, KobaiCd As String, NohinsakiCD As String, ByRef MsgCd As String, FindFlg As Integer) As HachuKobaihin()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As HachuKobaihin()
			Try
				Dim flag As Boolean = Operators.CompareString(Strings.Trim(ShiiresakiCd), "", False) = 0
				If flag Then
					ShiiresakiCd = ""
				Else
					ShiiresakiCd = Strings.Trim(MotoSoshikiCode + ShiiresakiCd)
				End If
				Dim strSQL As String = String.Format(masterSQL.SCF0044().ToString(), KobaiCd, NohinsakiCD)
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As HachuKobaihin()
				While sqlDataReader.Read()
					flag = (num >= 99)
					If flag Then
						MsgCd = "SI0090"
					End If
					flag = (num < 100)
					If flag Then
						array = CType(Utils.CopyArray(CType(array, Array), New HachuKobaihin(num + 1 - 1) {}), HachuKobaihin())
						Dim hachuKobaihin As HachuKobaihin = array(num)
						array(num) = New HachuKobaihin()
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
						If flag Then
							array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
						Else
							array(num).STR_SOSHIKI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
						If flag Then
							array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
						Else
							array(num).STR_KOBAI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_GYOSHA_CD")))
						If flag Then
							array(num).STR_GAIBU_GYOSHA_CD = Conversions.ToString(sqlDataReader("GAIBU_GYOSHA_CD"))
						Else
							array(num).STR_GAIBU_GYOSHA_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_RYAKU_MEI")))
						If flag Then
							array(num).STR_GYOSHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("GYOSHA_RYAKU_MEI"))
						Else
							array(num).STR_GYOSHA_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_SOSHIKI_CD")))
						If flag Then
							array(num).STR_HANBAISAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("HANBAISAKI_SOSHIKI_CD"))
						Else
							array(num).STR_HANBAISAKI_SOSHIKI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_BUNRUI_MEI")))
						If flag Then
							array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
						Else
							array(num).STR_KOBAI_BUNRUI_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
						If flag Then
							array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
						Else
							array(num).STR_KOBAI_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_RYAKU_MEI")))
						If flag Then
							array(num).STR_KOBAI_RYAKU_MEI = Conversions.ToString(sqlDataReader("KOBAI_RYAKU_MEI"))
						Else
							array(num).STR_KOBAI_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_KANA_MEI")))
						If flag Then
							array(num).STR_KOBAI_KANA_MEI = Conversions.ToString(sqlDataReader("KOBAI_KANA_MEI"))
						Else
							array(num).STR_KOBAI_KANA_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_SURYO_TANI")))
						If flag Then
							array(num).STR_KOBAI_SURYO_TANI = Strings.RTrim(Conversions.ToString(sqlDataReader("KOBAI_SURYO_TANI")))
						Else
							array(num).STR_KOBAI_SURYO_TANI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
						If flag Then
							array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
						Else
							array(num).STR_SOSHIKI_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRE_TANKA_GK")))
						If flag Then
							array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal(sqlDataReader("SHIIRE_TANKA_GK"))
						Else
							array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MAIL_ADRS")))
						If flag Then
							array(num).STR_SHIIRESAKI_MAIL_ADRS = Conversions.ToString(sqlDataReader("SHIIRESAKI_MAIL_ADRS"))
						Else
							array(num).STR_SHIIRESAKI_MAIL_ADRS = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_TEL_NO")))
						If flag Then
							array(num).STR_SHIIRESAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_TEL_NO")))
						Else
							array(num).STR_SHIIRESAKI_TEL_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_FAX_NO")))
						If flag Then
							array(num).STR_SHIIRESAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("SHIIRESAKI_FAX_NO")))
						Else
							array(num).STR_SHIIRESAKI_FAX_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_SU")))
						If flag Then
							array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger(sqlDataReader("SHIIRESAKI_MATOME_SU"))
						Else
							array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToInteger("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_GK")))
						If flag Then
							array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("SHIIRESAKI_MATOME_GK"))
						Else
							array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TANKA_GK")))
						If flag Then
							array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_TANKA_GK"))
						Else
							array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MIN_LOT_SU")))
						If flag Then
							array(num).INT_MIN_LOT_SU = Conversions.ToInteger(sqlDataReader("MIN_LOT_SU"))
						Else
							array(num).INT_MIN_LOT_SU = Conversions.ToInteger("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_TEL_NO")))
						If flag Then
							array(num).STR_HANBAISAKI_TEL_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_TEL_NO")))
						Else
							array(num).STR_HANBAISAKI_TEL_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_TEL_NO")))
						If flag Then
							array(num).STR_HANBAISAKI_FAX_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("HANBAISAKI_FAX_NO")))
						Else
							array(num).STR_HANBAISAKI_FAX_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_SU")))
						If flag Then
							array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger(sqlDataReader("HANBAI_MATOME_SU"))
						Else
							array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_GK")))
						If flag Then
							array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_MATOME_GK"))
						Else
							array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONOTA_KINGAKU_MEI")))
						If flag Then
							array(num).STR_SONOTA_KINGAKU_MEI = Conversions.ToString(sqlDataReader("SONOTA_KINGAKU_MEI"))
						Else
							array(num).STR_SONOTA_KINGAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONITA_KINGAKU_GK")))
						If flag Then
							array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal(sqlDataReader("SONITA_KINGAKU_GK"))
						Else
							array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TESURYO_RT")))
						If flag Then
							array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("HANBAI_TESURYO_RT"))
						Else
							array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal("0")
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_KOBAI_CD")))
						If flag Then
							array(num).STR_JISHA_KOBAI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JISHA_KOBAI_CD")))
						Else
							array(num).STR_JISHA_KOBAI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("REMARKS")))
						If flag Then
							array(num).STR_REMARKS = Strings.Trim(Conversions.ToString(sqlDataReader("REMARKS")))
						Else
							array(num).STR_REMARKS = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
						If flag Then
							array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
						Else
							array(num).STR_UPDATE_DT = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
						If flag Then
							array(num).STR_UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
						Else
							array(num).STR_UPDATE_TNT_ID = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
						If flag Then
							array(num).STR_GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
						Else
							array(num).STR_GAMEN_ID = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TASOSHIKI_KOBAI_CD")))
						If flag Then
							array(num).STR_TASOSHIKI_KOBAI_CD = Conversions.ToString(sqlDataReader("TASOSHIKI_KOBAI_CD"))
						Else
							array(num).STR_TASOSHIKI_KOBAI_CD = ""
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_AE2 As Exception
				ProjectData.SetProjectError(expr_AE2)
				Dim ex As Exception = expr_AE2
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }

    function getHacyuKobaihin2Master(){

    /*
		Public Function SetHacyuKobaihin(Kobaihin As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim hachuKobaihin As HachuKobaihin = New HachuKobaihin()
				hachuKobaihin = CType(Kobaihin, HachuKobaihin)
				Dim sqlCommand As String = String.Format(masterSQL.ICF0041().ToString(), hachuKobaihin.STR_SOSHIKI_CD, hachuKobaihin.STR_KOBAI_CD)
				Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					Dim mstFind As MstFind = New MstFind()
					sqlCommand = String.Format(masterSQL.ICF0040().ToString(), New Object()() { hachuKobaihin.STR_SOSHIKI_CD, hachuKobaihin.STR_KOBAI_CD, hachuKobaihin.STR_GAIBU_GYOSHA_CD, hachuKobaihin.STR_KOBAI_BUNRUI_MEI, hachuKobaihin.STR_KOBAI_MEI, hachuKobaihin.STR_KOBAI_RYAKU_MEI, hachuKobaihin.STR_KOBAI_KANA_MEI, hachuKobaihin.STR_KOBAI_SURYO_TANI, hachuKobaihin.DEC_SHIIRE_TANKA_GK, hachuKobaihin.STR_SHIIRESAKI_MAIL_ADRS, hachuKobaihin.STR_SHIIRESAKI_TEL_NO, hachuKobaihin.STR_SHIIRESAKI_FAX_NO, hachuKobaihin.INT_SHIIRESAKI_MATOME_SU, hachuKobaihin.DEC_SHIIRESAKI_MATOME_GK, hachuKobaihin.DEC_HANBAI_TANKA_GK, hachuKobaihin.INT_MIN_LOT_SU, hachuKobaihin.STR_HANBAISAKI_TEL_NO, hachuKobaihin.STR_HANBAISAKI_FAX_NO, hachuKobaihin.INT_HANBAI_MATOME_SU, hachuKobaihin.DEC_HANBAI_MATOME_GK, hachuKobaihin.STR_SONOTA_KINGAKU_MEI, hachuKobaihin.DEC_SONITA_KINGAKU_GK, hachuKobaihin.DEC_HANBAI_TESURYO_RT, hachuKobaihin.STR_JISHA_KOBAI_CD, hachuKobaihin.STR_REMARKS, mstFind.GetDATE_YYMMDDHHMMSS, hachuKobaihin.STR_UPDATE_TNT_ID, hachuKobaihin.STR_GAMEN_ID, hachuKobaihin.STR_TASOSHIKI_KOBAI_CD })
					flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
					If flag Then
						result = False
					Else
						result = True
					End If
				End If
			Catch expr_233 As Exception
				ProjectData.SetProjectError(expr_233)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function deleteHacyuKobaihin(){

    /*
		Public Function DeleteHacyuKobaihin(SoshikiCd As String, KobaiCd As String, GaibuGyoshaCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim hacyuKobaihinMasterMeisai As HacyuKobaihinMasterMeisai = New HacyuKobaihinMasterMeisai()
				Dim hacyuKobaihinMasterMeisai2 As HachuKobaihin() = hacyuKobaihinMasterMeisai.GetHacyuKobaihinMasterMeisai(SoshikiCd, Strings.Trim(SoshikiCd + KobaiCd), GaibuGyoshaCd, MsgCd, 0)
				Dim sqlCommand As String = String.Format(masterSQL.DCF0041().ToString(), SoshikiCd, Strings.Trim(SoshikiCd + KobaiCd), GaibuGyoshaCd)
				Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					result = True
				End If
			Catch expr_69 As Exception
				ProjectData.SetProjectError(expr_69)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function updateHacyuKobaihin(){

    /*
		Public Function UpdateHacyuKobaihin(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim hachuKobaihin As HachuKobaihin = New HachuKobaihin()
				hachuKobaihin = CType(objEntity, HachuKobaihin)
				Dim mstFind As MstFind = New MstFind()
				Dim sqlCommand As String = String.Format(masterSQL.UCF0040().ToString(), New Object()() { hachuKobaihin.STR_SOSHIKI_CD, hachuKobaihin.STR_KOBAI_CD, hachuKobaihin.STR_GAIBU_GYOSHA_CD, hachuKobaihin.STR_KOBAI_BUNRUI_MEI, hachuKobaihin.STR_KOBAI_MEI, hachuKobaihin.STR_KOBAI_RYAKU_MEI, hachuKobaihin.STR_KOBAI_KANA_MEI, hachuKobaihin.STR_KOBAI_SURYO_TANI, hachuKobaihin.DEC_SHIIRE_TANKA_GK, hachuKobaihin.STR_SHIIRESAKI_MAIL_ADRS, hachuKobaihin.STR_SHIIRESAKI_TEL_NO, hachuKobaihin.STR_SHIIRESAKI_FAX_NO, hachuKobaihin.INT_SHIIRESAKI_MATOME_SU, hachuKobaihin.DEC_SHIIRESAKI_MATOME_GK, hachuKobaihin.DEC_HANBAI_TANKA_GK, hachuKobaihin.INT_MIN_LOT_SU, hachuKobaihin.STR_HANBAISAKI_TEL_NO, hachuKobaihin.STR_HANBAISAKI_FAX_NO, hachuKobaihin.INT_HANBAI_MATOME_SU, hachuKobaihin.DEC_HANBAI_MATOME_GK, hachuKobaihin.STR_SONOTA_KINGAKU_MEI, hachuKobaihin.DEC_SONITA_KINGAKU_GK, hachuKobaihin.DEC_HANBAI_TESURYO_RT, hachuKobaihin.STR_JISHA_KOBAI_CD, hachuKobaihin.STR_REMARKS, mstFind.GetDATE_YYMMDDHHMMSS, hachuKobaihin.STR_GAMEN_ID, hachuKobaihin.STR_UPDATE_TNT_ID })
				Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					sqlCommand = String.Format(masterSQL.UCF0041().ToString(), New Object()() { hachuKobaihin.STR_KOBAI_CD, hachuKobaihin.STR_GAIBU_GYOSHA_CD, hachuKobaihin.STR_KOBAI_BUNRUI_MEI, hachuKobaihin.STR_KOBAI_MEI, hachuKobaihin.STR_KOBAI_RYAKU_MEI, hachuKobaihin.STR_KOBAI_KANA_MEI, hachuKobaihin.STR_KOBAI_SURYO_TANI, hachuKobaihin.DEC_HANBAI_TANKA_GK, hachuKobaihin.STR_SHIIRESAKI_MAIL_ADRS, hachuKobaihin.STR_SHIIRESAKI_TEL_NO, hachuKobaihin.STR_SHIIRESAKI_FAX_NO, hachuKobaihin.INT_HANBAI_MATOME_SU, hachuKobaihin.DEC_HANBAI_MATOME_GK, mstFind.GetDATE_YYMMDDHHMMSS, hachuKobaihin.STR_GAMEN_ID, hachuKobaihin.STR_UPDATE_TNT_ID })
					flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
					If flag Then
						result = False
					End If
				End If
			Catch expr_2F4 As Exception
				ProjectData.SetProjectError(expr_2F4)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }


}
?>