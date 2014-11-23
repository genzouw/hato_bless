<?php
class HachuJohoMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getHachuJoho(){

    /*
		Public Function GetHachuJoho(MotoSoshikiCd As String, GyoshaSofuDtFrom As String, GyoshaSofuDtTo As String, ShiireGyoshaCd As String, HanbaisakiCd As String, HachuNo As String, KobaiCd As String, ByRef MsgCd As String, FindFlg As Integer) As HachuList3()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As HachuList3()
			Try
				GyoshaSofuDtFrom = Strings.Replace(GyoshaSofuDtFrom, "/", "", 1, -1, CompareMethod.Binary)
				GyoshaSofuDtTo = Strings.Replace(GyoshaSofuDtTo, "/", "", 1, -1, CompareMethod.Binary)
				Dim flag As Boolean = Operators.CompareString(GyoshaSofuDtTo, "", False) = 0
				If flag Then
					GyoshaSofuDtTo = "99999999"
				End If
				Dim strSQL As String = String.Format(masterSQL.SCF0810().ToString(), New Object()() { MotoSoshikiCd, GyoshaSofuDtFrom, GyoshaSofuDtTo, ShiireGyoshaCd, HanbaisakiCd, HachuNo, KobaiCd })
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As HachuList3()
				While sqlDataReader.Read()
					array = CType(Utils.CopyArray(CType(array, Array), New HachuList3(num + 1 - 1) {}), HachuList3())
					Dim hachuList As HachuList3 = array(num)
					array(num) = New HachuList3()
					array(num).STR_HACHU_NO = Conversions.ToString(sqlDataReader("HACHU_NO"))
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYUMOTO_CD")))
					If flag Then
						array(num).STR_SEIKYUMOTO_CD = Conversions.ToString(sqlDataReader("SEIKYUMOTO_CD"))
					Else
						array(num).STR_SEIKYUMOTO_CD = ""
					End If
					array(num).STR_GAIBU_NAIBU_KBN = Conversions.ToString(sqlDataReader("GAIBU_NAIBU_KBN"))
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD")))
					If flag Then
						array(num).STR_GYOSHA_CD = Conversions.ToString(sqlDataReader("GYOSHA_CD"))
					Else
						array(num).STR_GYOSHA_CD = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI")))
					If flag Then
						array(num).STR_GYOSHA_MEI = Conversions.ToString(sqlDataReader("GYOSHA_MEI"))
					Else
						array(num).STR_GYOSHA_MEI = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_TELL")))
					If flag Then
						array(num).STR_GYOSHA_TELL = Conversions.ToString(sqlDataReader("GYOSHA_TELL"))
					Else
						array(num).STR_GYOSHA_TELL = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_FAX")))
					If flag Then
						array(num).STR_GYOSHA_FAX = Conversions.ToString(sqlDataReader("GYOSHA_FAX"))
					Else
						array(num).STR_GYOSHA_FAX = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOFU_DT")))
					If flag Then
						array(num).STR_SOFU_DT = Conversions.ToString(sqlDataReader("SOFU_DT"))
					Else
						array(num).STR_SOFU_DT = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOFU_NO")))
					If flag Then
						array(num).INT_SOFU_NO = Conversions.ToInteger(sqlDataReader("SOFU_NO"))
					Else
						array(num).INT_SOFU_NO = Conversions.ToInteger("0")
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_DT")))
					If flag Then
						array(num).STR_HACHU_DT = Conversions.ToString(sqlDataReader("HACHU_DT"))
					Else
						array(num).STR_HACHU_DT = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_TNT_CD")))
					If flag Then
						array(num).STR_HACHU_TNT_CD = Conversions.ToString(sqlDataReader("HACHU_TNT_CD"))
					Else
						array(num).STR_HACHU_TNT_CD = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_HOUHOU_KBN")))
					If flag Then
						array(num).STR_NOHIN_HOUHOU_KBN = Conversions.ToString(sqlDataReader("NOHIN_HOUHOU_KBN"))
					Else
						array(num).STR_NOHIN_HOUHOU_KBN = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_JYOTAI_KBN")))
					If flag Then
						array(num).STR_NOHIN_JYOTAI_KBN = Conversions.ToString(sqlDataReader("NOHIN_JYOTAI_KBN"))
					Else
						array(num).STR_NOHIN_JYOTAI_KBN = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_CD")))
					If flag Then
						array(num).STR_NOHINSAKI_CD = Conversions.ToString(sqlDataReader("NOHINSAKI_CD"))
					Else
						array(num).STR_NOHINSAKI_CD = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_MEI")))
					If flag Then
						array(num).STR_NOHINSAKI_MEI = Conversions.ToString(sqlDataReader("NOHINSAKI_MEI"))
					Else
						array(num).STR_NOHINSAKI_MEI = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_TEL")))
					If flag Then
						array(num).STR_NOHINSAKI_TEL = Conversions.ToString(sqlDataReader("NOHINSAKI_TEL"))
					Else
						array(num).STR_NOHINSAKI_TEL = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_FAX")))
					If flag Then
						array(num).STR_NOHINSAKI_FAX = Conversions.ToString(sqlDataReader("NOHINSAKI_FAX"))
					Else
						array(num).STR_NOHINSAKI_FAX = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("YUBIN_NO")))
					If flag Then
						array(num).STR_YUBIN_NO = Conversions.ToString(sqlDataReader("YUBIN_NO"))
					Else
						array(num).STR_YUBIN_NO = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS1")))
					If flag Then
						array(num).STR_ADDRESS1 = Conversions.ToString(sqlDataReader("ADDRESS1"))
					Else
						array(num).STR_ADDRESS1 = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS2")))
					If flag Then
						array(num).STR_ADDRESS2 = Conversions.ToString(sqlDataReader("ADDRESS2"))
					Else
						array(num).STR_ADDRESS2 = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS3")))
					If flag Then
						array(num).STR_ADDRESS3 = Conversions.ToString(sqlDataReader("ADDRESS3"))
					Else
						array(num).STR_ADDRESS3 = ""
					End If
					array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_KOBAI_CD")))
					If flag Then
						array(num).STR_JISHA_KOBAI_CD = Conversions.ToString(sqlDataReader("JISHA_KOBAI_CD"))
					Else
						array(num).STR_JISHA_KOBAI_CD = ""
					End If
					array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
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
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_DT")))
					If flag Then
						array(num).STR_NOHIN_DT = Conversions.ToString(sqlDataReader("NOHIN_DT"))
					Else
						array(num).STR_NOHIN_DT = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_SU")))
					If flag Then
						array(num).INT_NOHIN_SU = Conversions.ToInteger(sqlDataReader("NOHIN_SU"))
					Else
						array(num).INT_NOHIN_SU = Conversions.ToInteger("0")
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_TANI")))
					If flag Then
						array(num).STR_NOHIN_TANI = Conversions.ToString(sqlDataReader("NOHIN_TANI"))
					Else
						array(num).STR_NOHIN_TANI = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_TANKA")))
					If flag Then
						array(num).DEC_SIIRE_TANKA = Conversions.ToDecimal(sqlDataReader("SIIRE_TANKA"))
					Else
						array(num).DEC_SIIRE_TANKA = Conversions.ToDecimal("0")
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_NEBIKI")))
					If flag Then
						array(num).DEC_SIIRE_NEBIKI = Conversions.ToDecimal(sqlDataReader("SIIRE_NEBIKI"))
					Else
						array(num).DEC_SIIRE_NEBIKI = Conversions.ToDecimal("0")
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_SHOHIZEI_GK")))
					If flag Then
						array(num).DEC_SIIRE_SHOHIZEI_GK = Conversions.ToDecimal(sqlDataReader("SIIRE_SHOHIZEI_GK"))
					Else
						array(num).DEC_SIIRE_SHOHIZEI_GK = Conversions.ToDecimal("0")
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_GOKEI_GK")))
					If flag Then
						array(num).DEC_SIIRE_GOKEI_GKO = Conversions.ToDecimal(sqlDataReader("SIIRE_GOKEI_GK"))
					Else
						array(num).DEC_SIIRE_GOKEI_GKO = Conversions.ToDecimal("0")
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_TANKA")))
					If flag Then
						array(num).DEC_URIAGE_TANKA = Conversions.ToDecimal(sqlDataReader("URIAGE_TANKA"))
					Else
						array(num).DEC_URIAGE_TANKA = Conversions.ToDecimal("0")
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_NEBIKI")))
					If flag Then
						array(num).DEC_URIAGE_NEBIKI = Conversions.ToDecimal(sqlDataReader("URIAGE_NEBIKI"))
					Else
						array(num).DEC_URIAGE_NEBIKI = Conversions.ToDecimal("0")
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_SHOHIZEI_GK")))
					If flag Then
						array(num).DEC_URIAGE_SHOHIZEI_GK = Conversions.ToDecimal(sqlDataReader("URIAGE_SHOHIZEI_GK"))
					Else
						array(num).DEC_URIAGE_SHOHIZEI_GK = Conversions.ToDecimal("0")
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_GOKEI_GK")))
					If flag Then
						array(num).DEC_URIAGE_GOKEI_GK = Conversions.ToDecimal(sqlDataReader("URIAGE_GOKEI_GK"))
					Else
						array(num).DEC_URIAGE_GOKEI_GK = Conversions.ToDecimal("0")
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
					If flag Then
						array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
					Else
						array(num).STR_BIKO = ""
					End If
					array(num).STR_SEISAN_YM = Conversions.ToString(sqlDataReader("SEISAN_YM"))
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAKUTEI_KBN")))
					If flag Then
						array(num).STR_KAKUTEI_KBN = Conversions.ToString(sqlDataReader("KAKUTEI_KBN"))
					Else
						array(num).STR_KAKUTEI_KBN = ""
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
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_D39 As Exception
				ProjectData.SetProjectError(expr_D39)
				Dim ex As Exception = expr_D39
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }


    function getHachuJoho(){

    /*
		Public Function GetHachu2Joho(HachuNo As String, ByRef MsgCd As String) As KobaihinList()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As KobaihinList()
			Try
				Dim strSQL As String = String.Format(masterSQL.SCF0610().ToString(), HachuNo)
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As KobaihinList()
				While sqlDataReader.Read()
					Dim flag As Boolean = num >= 99
					If flag Then
						MsgCd = "SI0090"
					End If
					flag = (num < 100)
					If flag Then
						array = CType(Utils.CopyArray(CType(array, Array), New KobaihinList(num + 1 - 1) {}), KobaihinList())
						Dim kobaihinList As KobaihinList = array(num)
						array(num) = New KobaihinList()
						array(num).STR_HACHU_NO = Conversions.ToString(sqlDataReader("HACHU_NO"))
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD")))
						If flag Then
							array(num).STR_GAIBU_GYOSHA_CD = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD"))
						Else
							array(num).STR_GAIBU_GYOSHA_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN")))
						If flag Then
							array(num).STR_GAIBU_NAIBU_KBN = RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN"))
						Else
							array(num).STR_GAIBU_NAIBU_KBN = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_CD")))
						If flag Then
							array(num).STR_NOHINSAKI_CD = Conversions.ToString(sqlDataReader("NOHINSAKI_CD"))
						Else
							array(num).STR_NOHINSAKI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_MEI")))
						If flag Then
							array(num).STR_NOHINSAKI_MEI = Conversions.ToString(sqlDataReader("NOHINSAKI_MEI"))
						Else
							array(num).STR_NOHINSAKI_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_DT")))
						If flag Then
							array(num).STR_HACHU_DT = Conversions.ToString(sqlDataReader("HACHU_DT"))
						Else
							array(num).STR_HACHU_DT = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI")))
						If flag Then
							array(num).STR_GYOSHA_MEI = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI"))
						Else
							array(num).STR_GYOSHA_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_TELL")))
						If flag Then
							array(num).STR_SHIIRESAKI_TEL_NO = Conversions.ToString(sqlDataReader("GYOSHA_TELL"))
						Else
							array(num).STR_SHIIRESAKI_TEL_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_FAX")))
						If flag Then
							array(num).STR_SHIIRESAKI_FAX_NO = Conversions.ToString(sqlDataReader("GYOSHA_FAX"))
						Else
							array(num).STR_SHIIRESAKI_FAX_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_DT")))
						If flag Then
							array(num).STR_NOHIN_DT = Conversions.ToString(sqlDataReader("NOHIN_DT"))
						Else
							array(num).STR_NOHIN_DT = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_SU")))
						If flag Then
							array(num).STR_NOHIN_SU = Conversions.ToString(sqlDataReader("NOHIN_SU"))
						Else
							array(num).STR_NOHIN_SU = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_TANI")))
						If flag Then
							array(num).STR_NOHIN_TANI = Conversions.ToString(sqlDataReader("NOHIN_TANI"))
						Else
							array(num).STR_NOHIN_TANI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
						If flag Then
							array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
						Else
							array(num).STR_KOBAI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
						If flag Then
							array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
						Else
							array(num).STR_KOBAI_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_YM")))
						If flag Then
							array(num).STR_SEISAN_YM = Conversions.ToString(sqlDataReader("SEISAN_YM"))
						Else
							array(num).STR_SEISAN_YM = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_TANKA")))
						If flag Then
							array(num).STR_SIIRE_TANKA = Conversions.ToString(sqlDataReader("SIIRE_TANKA"))
						Else
							array(num).STR_SIIRE_TANKA = "0"
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_GOKEI_GK")))
						If flag Then
							array(num).STR_SIIRE_GOKEI_GK = Conversions.ToString(sqlDataReader("SIIRE_GOKEI_GK"))
						Else
							array(num).STR_SIIRE_GOKEI_GK = "0"
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_NEBIKI")))
						If flag Then
							array(num).STR_SIIRE_NEBIKI = Conversions.ToString(sqlDataReader("SIIRE_NEBIKI"))
						Else
							array(num).STR_SIIRE_NEBIKI = "0"
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_SHOHIZEI_GK")))
						If flag Then
							array(num).STR_SIIRE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SIIRE_SHOHIZEI_GK"))
						Else
							array(num).STR_SIIRE_SHOHIZEI_GK = "0"
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_TANKA")))
						If flag Then
							array(num).STR_URIAGE_TANKA = Conversions.ToString(sqlDataReader("URIAGE_TANKA"))
						Else
							array(num).STR_URIAGE_TANKA = "0"
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_GOKEI_GK")))
						If flag Then
							array(num).STR_URIAGE_GOKEI_GK = Conversions.ToString(sqlDataReader("URIAGE_GOKEI_GK"))
						Else
							array(num).STR_URIAGE_GOKEI_GK = "0"
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_NEBIKI")))
						If flag Then
							array(num).STR_URIAGE_NEBIKI = Conversions.ToString(sqlDataReader("URIAGE_NEBIKI"))
						Else
							array(num).STR_URIAGE_NEBIKI = "0"
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_SHOHIZEI_GK")))
						If flag Then
							array(num).STR_URIAGE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("URIAGE_SHOHIZEI_GK"))
						Else
							array(num).STR_URIAGE_SHOHIZEI_GK = "0"
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_JYOTAI_KBN")))
						If flag Then
							array(num).STR_NOHIN_JYOTAI_KBN = Conversions.ToString(sqlDataReader("NOHIN_JYOTAI_KBN"))
						Else
							array(num).STR_NOHIN_JYOTAI_KBN = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
						If flag Then
							array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
						Else
							array(num).STR_UPDATE_DT = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
						If flag Then
							array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
						Else
							array(num).STR_BIKO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAKUTEI_KBN")))
						If flag Then
							array(num).STR_KAKUTEI_KBN = Conversions.ToString(sqlDataReader("KAKUTEI_KBN"))
						Else
							array(num).STR_KAKUTEI_KBN = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DELETE_FLG")))
						If flag Then
							array(num).STR_DELETE_FLG = Conversions.ToString(sqlDataReader("DELETE_FLG"))
						Else
							array(num).STR_DELETE_FLG = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_HOUHOU_KBN")))
						If flag Then
							array(num).STR_NOHIN_HOUHOU_KBN = Conversions.ToString(sqlDataReader("NOHIN_HOUHOU_KBN"))
						Else
							array(num).STR_NOHIN_HOUHOU_KBN = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_TEL")))
						If flag Then
							array(num).STR_NOHINSAKI_TEL = Conversions.ToString(sqlDataReader("NOHINSAKI_TEL"))
						Else
							array(num).STR_NOHINSAKI_TEL = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_FAX")))
						If flag Then
							array(num).STR_NOHINSAKI_FAX = Conversions.ToString(sqlDataReader("NOHINSAKI_FAX"))
						Else
							array(num).STR_NOHINSAKI_FAX = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("YUBIN_NO")))
						If flag Then
							array(num).STR_YUBIN_NO = Conversions.ToString(sqlDataReader("YUBIN_NO"))
						Else
							array(num).STR_YUBIN_NO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS1")))
						If flag Then
							array(num).STR_ADDRESS1 = Conversions.ToString(sqlDataReader("ADDRESS1"))
						Else
							array(num).STR_ADDRESS1 = ""
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_A75 As Exception
				ProjectData.SetProjectError(expr_A75)
				Dim ex As Exception = expr_A75
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }


}
?>