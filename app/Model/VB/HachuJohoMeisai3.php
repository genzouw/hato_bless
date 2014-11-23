<?php
class HachuJohoMeisai3 extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getHachuJoho3(){

    /*
		Public Function GetHachuJoho3(MotoSoshikiCd As String, HachuNo As String, HachuDtFrom As String, HachuDtTo As String, NohinDtFrom As String, NohinDtTo As String, ShiiresakiCd As String, KobaiCd As String, NohinJotaiKbn As String, HanbaisakiCd As String, SeisanYm As String, GaibuNaibuKbn As String, SoshikiKbn As String, ByRef MsgCd As String, FindFlg As Integer) As HachuList3()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As HachuList3()
			Try
				HachuDtFrom = Strings.Replace(HachuDtFrom, "/", "", 1, -1, CompareMethod.Binary)
				HachuDtTo = Strings.Replace(HachuDtTo, "/", "", 1, -1, CompareMethod.Binary)
				Dim flag As Boolean = Operators.CompareString(HachuDtTo, "", False) = 0
				If flag Then
					HachuDtTo = "99999999"
				End If
				NohinDtFrom = Strings.Replace(NohinDtFrom, "/", "", 1, -1, CompareMethod.Binary)
				NohinDtTo = Strings.Replace(NohinDtTo, "/", "", 1, -1, CompareMethod.Binary)
				flag = (Operators.CompareString(NohinDtTo, "", False) = 0)
				If flag Then
					NohinDtTo = "99999999"
				End If
				flag = (FindFlg = 0)
				Dim strSQL As String
				If flag Then
					strSQL = String.Format(masterSQL.SCF0511().ToString(), New Object()() { MotoSoshikiCd, HachuNo, HachuDtFrom, HachuDtTo, NohinDtFrom, NohinDtTo, ShiiresakiCd, KobaiCd, NohinJotaiKbn, HanbaisakiCd, "", GaibuNaibuKbn })
				Else
					strSQL = String.Format(masterSQL.SCF0510().ToString(), MotoSoshikiCd, "", GaibuNaibuKbn)
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As HachuList3()
				While sqlDataReader.Read()
					flag = (num >= 999)
					If flag Then
						MsgCd = "SI0090"
					End If
					flag = (num < 1000)
					If flag Then
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
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_DT")))
						If flag Then
							array(num).STR_HACHU_DT = Conversions.ToString(sqlDataReader("HACHU_DT"))
						Else
							array(num).STR_HACHU_DT = ""
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
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KENSU")))
						If flag Then
							array(num).STR_KENSU = Conversions.ToString(sqlDataReader("KENSU"))
						Else
							array(num).STR_KENSU = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
						If flag Then
							array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
						Else
							array(num).STR_SOSHIKI_RYAKU_MEI = ""
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_6AC As Exception
				ProjectData.SetProjectError(expr_6AC)
				Dim ex As Exception = expr_6AC
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }


    function getHachu2Joho3(){

    /*
		Public Function GetHachu2Joho3(HachuNo As String, SeikyumotoCd As String, kobaiCd As String, GaibuNaibuKbn As String, ByRef MsgCd As String, Optional count As String="0") As KobaihinList()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As KobaihinList()
			Try
				Dim strSQL As String = String.Format(masterSQL.SCF0610().ToString(), New Object()() { HachuNo, SeikyumotoCd, kobaiCd, "2" })
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim flag As Boolean = Operators.CompareString(count, "1", False) = 0
				Dim array As KobaihinList()
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(MsgCd, "SE0001", False) = 0
					If flag2 Then
						result = array
						Return result
					End If
				End If
				Dim num As Integer = 0
				While sqlDataReader.Read()
					Dim flag2 As Boolean = num >= 999
					If flag2 Then
						MsgCd = "SI0090"
					End If
					flag2 = (num < 1000)
					If flag2 Then
						array = CType(Utils.CopyArray(CType(array, Array), New KobaihinList(num + 1 - 1) {}), KobaihinList())
						Dim kobaihinList As KobaihinList = array(num)
						array(num) = New KobaihinList()
						array(num).STR_HACHU_NO = Conversions.ToString(sqlDataReader("HACHU_NO"))
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHAIN_MEI")))
						If flag2 Then
							array(num).STR_HACHU_TANTO_MEI = Conversions.ToString(sqlDataReader("SHAIN_MEI"))
						Else
							array(num).STR_HACHU_TANTO_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHAIN_RYAKU_MEI")))
						If flag2 Then
							array(num).STR_HACHU_TANTO_RYAKU_MEI = Conversions.ToString(sqlDataReader("SHAIN_RYAKU_MEI"))
						Else
							array(num).STR_HACHU_TANTO_RYAKU_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD")))
						If flag2 Then
							array(num).STR_GAIBU_GYOSHA_CD = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD"))
						Else
							array(num).STR_GAIBU_GYOSHA_CD = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN")))
						If flag2 Then
							array(num).STR_GAIBU_NAIBU_KBN = RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN"))
						Else
							array(num).STR_GAIBU_NAIBU_KBN = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_CD")))
						If flag2 Then
							array(num).STR_NOHINSAKI_CD = Conversions.ToString(sqlDataReader("NOHINSAKI_CD"))
						Else
							array(num).STR_NOHINSAKI_CD = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_MEI")))
						If flag2 Then
							array(num).STR_NOHINSAKI_MEI = Conversions.ToString(sqlDataReader("NOHINSAKI_MEI"))
						Else
							array(num).STR_NOHINSAKI_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_DT")))
						If flag2 Then
							array(num).STR_HACHU_DT = Conversions.ToString(sqlDataReader("HACHU_DT"))
						Else
							array(num).STR_HACHU_DT = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_TNT_CD")))
						If flag2 Then
							array(num).STR_HACHU_TNT_ID = Conversions.ToString(sqlDataReader("HACHU_TNT_CD"))
						Else
							array(num).STR_HACHU_TNT_ID = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI")))
						If flag2 Then
							array(num).STR_GYOSHA_MEI = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI"))
						Else
							array(num).STR_GYOSHA_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_TELL")))
						If flag2 Then
							array(num).STR_SHIIRESAKI_TEL_NO = Conversions.ToString(sqlDataReader("GYOSHA_TELL"))
						Else
							array(num).STR_SHIIRESAKI_TEL_NO = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_FAX")))
						If flag2 Then
							array(num).STR_SHIIRESAKI_FAX_NO = Conversions.ToString(sqlDataReader("GYOSHA_FAX"))
						Else
							array(num).STR_SHIIRESAKI_FAX_NO = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_DT")))
						If flag2 Then
							array(num).STR_NOHIN_DT = Conversions.ToString(sqlDataReader("NOHIN_DT"))
						Else
							array(num).STR_NOHIN_DT = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_SU")))
						If flag2 Then
							array(num).STR_NOHIN_SU = Conversions.ToString(sqlDataReader("NOHIN_SU"))
						Else
							array(num).STR_NOHIN_SU = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_TANI")))
						If flag2 Then
							array(num).STR_NOHIN_TANI = Conversions.ToString(sqlDataReader("NOHIN_TANI"))
						Else
							array(num).STR_NOHIN_TANI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
						If flag2 Then
							array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
						Else
							array(num).STR_KOBAI_CD = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
						If flag2 Then
							array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
						Else
							array(num).STR_KOBAI_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_BUNRUI_MEI")))
						If flag2 Then
							array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
						Else
							array(num).STR_KOBAI_BUNRUI_MEI = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_YM")))
						If flag2 Then
							array(num).STR_SEISAN_YM = Conversions.ToString(sqlDataReader("SEISAN_YM"))
						Else
							array(num).STR_SEISAN_YM = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_TANKA")))
						If flag2 Then
							array(num).STR_SIIRE_TANKA = Conversions.ToString(sqlDataReader("SIIRE_TANKA"))
						Else
							array(num).STR_SIIRE_TANKA = "0"
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_GOKEI_GK")))
						If flag2 Then
							array(num).STR_SIIRE_GOKEI_GK = Conversions.ToString(sqlDataReader("SIIRE_GOKEI_GK"))
						Else
							array(num).STR_SIIRE_GOKEI_GK = "0"
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_NEBIKI")))
						If flag2 Then
							array(num).STR_SIIRE_NEBIKI = Conversions.ToString(sqlDataReader("SIIRE_NEBIKI"))
						Else
							array(num).STR_SIIRE_NEBIKI = "0"
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_SHOHIZEI_GK")))
						If flag2 Then
							array(num).STR_SIIRE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SIIRE_SHOHIZEI_GK"))
						Else
							array(num).STR_SIIRE_SHOHIZEI_GK = "0"
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_TANKA")))
						If flag2 Then
							array(num).STR_URIAGE_TANKA = Conversions.ToString(sqlDataReader("URIAGE_TANKA"))
						Else
							array(num).STR_URIAGE_TANKA = "0"
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_GOKEI_GK")))
						If flag2 Then
							array(num).STR_URIAGE_GOKEI_GK = Conversions.ToString(sqlDataReader("URIAGE_GOKEI_GK"))
						Else
							array(num).STR_URIAGE_GOKEI_GK = "0"
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_NEBIKI")))
						If flag2 Then
							array(num).STR_URIAGE_NEBIKI = Conversions.ToString(sqlDataReader("URIAGE_NEBIKI"))
						Else
							array(num).STR_URIAGE_NEBIKI = "0"
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_SHOHIZEI_GK")))
						If flag2 Then
							array(num).STR_URIAGE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("URIAGE_SHOHIZEI_GK"))
						Else
							array(num).STR_URIAGE_SHOHIZEI_GK = "0"
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_JYOTAI_KBN")))
						If flag2 Then
							array(num).STR_NOHIN_JYOTAI_KBN = Conversions.ToString(sqlDataReader("NOHIN_JYOTAI_KBN"))
						Else
							array(num).STR_NOHIN_JYOTAI_KBN = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
						If flag2 Then
							array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
						Else
							array(num).STR_UPDATE_DT = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
						If flag2 Then
							array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
						Else
							array(num).STR_BIKO = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAKUTEI_KBN")))
						If flag2 Then
							array(num).STR_KAKUTEI_KBN = Conversions.ToString(sqlDataReader("KAKUTEI_KBN"))
						Else
							array(num).STR_KAKUTEI_KBN = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DELETE_FLG")))
						If flag2 Then
							array(num).STR_DELETE_FLG = Conversions.ToString(sqlDataReader("DELETE_FLG"))
						Else
							array(num).STR_DELETE_FLG = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_HOUHOU_KBN")))
						If flag2 Then
							array(num).STR_NOHIN_HOUHOU_KBN = Conversions.ToString(sqlDataReader("NOHIN_HOUHOU_KBN"))
						Else
							array(num).STR_NOHIN_HOUHOU_KBN = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_TEL")))
						If flag2 Then
							array(num).STR_NOHINSAKI_TEL = Conversions.ToString(sqlDataReader("NOHINSAKI_TEL"))
						Else
							array(num).STR_NOHINSAKI_TEL = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_FAX")))
						If flag2 Then
							array(num).STR_NOHINSAKI_FAX = Conversions.ToString(sqlDataReader("NOHINSAKI_FAX"))
						Else
							array(num).STR_NOHINSAKI_FAX = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("YUBIN_NO")))
						If flag2 Then
							array(num).STR_YUBIN_NO = Conversions.ToString(sqlDataReader("YUBIN_NO"))
						Else
							array(num).STR_YUBIN_NO = ""
						End If
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS1")))
						If flag2 Then
							array(num).STR_ADDRESS1 = Conversions.ToString(sqlDataReader("ADDRESS1"))
						Else
							array(num).STR_ADDRESS1 = ""
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
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_KOBAI_CD")))
						If flag2 Then
							array(num).STR_JYOBU_KOBAI_CD = Conversions.ToString(sqlDataReader("JYOBU_KOBAI_CD"))
						Else
							array(num).STR_JYOBU_KOBAI_CD = ""
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_CF4 As Exception
				ProjectData.SetProjectError(expr_CF4)
				Dim ex As Exception = expr_CF4
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }

    function getHachu2Joho4(){

    /*
		Public Function GetHachu2Joho4(SoshikiCd As String, GyoshaCd As String, KobaiCd As String, ByRef MsgCd As String) As KobaihinList()
			Dim masterSQL As MasterSQL = New MasterSQL()
			HachuJohoMeisai3.MstFind = New MstFind()

			Dim result As KobaihinList()
			Try
				Dim strSQL As String = String.Format(masterSQL.SCF0412().ToString(), SoshikiCd, GyoshaCd, KobaiCd)
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As KobaihinList()
				While sqlDataReader.Read()
					array = CType(Utils.CopyArray(CType(array, Array), New KobaihinList(num + 1 - 1) {}), KobaihinList())
					Dim kobaihinList As KobaihinList = array(num)
					array(num) = New KobaihinList()
					array(num).STR_HACHU_NO = ""
					Dim flag As Boolean = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_GYOSHA_CD")))
					If flag Then
						array(num).STR_GAIBU_GYOSHA_CD = RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_GYOSHA_CD"))
					Else
						array(num).STR_GAIBU_GYOSHA_CD = ""
					End If
					array(num).STR_GAIBU_NAIBU_KBN = "2"
					array(num).STR_NOHINSAKI_CD = ""
					array(num).STR_NOHINSAKI_MEI = ""
					array(num).STR_HACHU_DT = ""
					array(num).STR_HACHU_TNT_ID = ""
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_RYAKU_MEI")))
					If flag Then
						array(num).STR_GYOSHA_MEI = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_RYAKU_MEI"))
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
					array(num).STR_NOHIN_DT = HachuJohoMeisai3.MstFind.GetDATE_YYYYMMDD
					array(num).STR_NOHIN_SU = ""
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_SURYO_TANI")))
					If flag Then
						array(num).STR_NOHIN_TANI = Conversions.ToString(sqlDataReader("KOBAI_SURYO_TANI"))
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
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_BUNRUI_MEI")))
					If flag Then
						array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
					Else
						array(num).STR_KOBAI_BUNRUI_MEI = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_TUKI")))
					If flag Then
						array(num).STR_SEISAN_YM = Conversions.ToString(sqlDataReader("SEISAN_TUKI"))
					Else
						array(num).STR_SEISAN_YM = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRE_TANKA_GK")))
					If flag Then
						array(num).STR_SIIRE_TANKA = Conversions.ToString(sqlDataReader("SHIIRE_TANKA_GK"))
					Else
						array(num).STR_SIIRE_TANKA = "0"
					End If
					array(num).STR_SIIRE_GOKEI_GK = "0"
					array(num).STR_SIIRE_NEBIKI = "0"
					array(num).STR_SIIRE_SHOHIZEI_GK = "0"
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TANKA_GK")))
					If flag Then
						array(num).STR_URIAGE_TANKA = Conversions.ToString(sqlDataReader("HANBAI_TANKA_GK"))
					Else
						array(num).STR_URIAGE_TANKA = "0"
					End If
					array(num).STR_URIAGE_GOKEI_GK = "0"
					array(num).STR_URIAGE_NEBIKI = "0"
					array(num).STR_URIAGE_SHOHIZEI_GK = "0"
					array(num).STR_NOHIN_JYOTAI_KBN = "1"
					array(num).STR_UPDATE_DT = ""
					array(num).STR_BIKO = ""
					array(num).STR_KAKUTEI_KBN = "0"
					array(num).STR_DELETE_FLG = "0"
					array(num).STR_NOHIN_HOUHOU_KBN = "1"
					array(num).STR_NOHINSAKI_TEL = ""
					array(num).STR_NOHINSAKI_FAX = ""
					array(num).STR_YUBIN_NO = ""
					array(num).STR_ADDRESS1 = ""
					array(num).STR_UPDATE_DT = ""
					array(num).STR_UPDATE_TNT_ID = ""
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_594 As Exception
				ProjectData.SetProjectError(expr_594)
				Dim ex As Exception = expr_594
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }

    function getHachu2Joho4(){

    /*
		Public Function GetHachu2Joho5(kobaiCd As String, strSireCd As String, strSeisanTuki As String, strFindKbn As String, ByRef MsgCd As String, Optional count As String="0") As KobaihinList()
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As KobaihinList()
			Try
				Dim flag As Boolean = Operators.CompareString(strFindKbn, "1", False) = 0
				Dim strSQL As String
				If flag Then
					strSQL = String.Format(masterSQL.SCF0616().ToString(), kobaiCd, strSireCd, strSeisanTuki)
				Else
					flag = (Operators.CompareString(strFindKbn, "2", False) = 0)
					If flag Then
						strSQL = String.Format(masterSQL.SCF0617().ToString(), kobaiCd, strSireCd, strSeisanTuki)
					Else
						flag = (Operators.CompareString(strFindKbn, "3", False) = 0)
						If flag Then
							strSQL = String.Format(masterSQL.SCF0618().ToString(), kobaiCd, strSireCd, strSeisanTuki)
						End If
					End If
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				flag = (Operators.CompareString(count, "1", False) = 0)
				Dim array As KobaihinList()
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(MsgCd, "SE0001", False) = 0
					If flag2 Then
						result = array
						Return result
					End If
				End If
				Dim num As Integer = 0
				While sqlDataReader.Read()
					Dim flag2 As Boolean = num >= 999
					If flag2 Then
						MsgCd = "SI0090"
					End If
					flag2 = (num < 1000)
					If flag2 Then
						array = CType(Utils.CopyArray(CType(array, Array), New KobaihinList(num + 1 - 1) {}), KobaihinList())
						Dim kobaihinList As KobaihinList = array(num)
						array(num) = New KobaihinList()
						flag2 = (Operators.CompareString(strFindKbn, "3", False) = 0)
						If flag2 Then
							flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
							If flag Then
								array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
							Else
								array(num).STR_KOBAI_CD = ""
							End If
						Else
							array(num).STR_HACHU_NO = Conversions.ToString(sqlDataReader("HACHU_NO"))
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHAIN_MEI")))
							If flag2 Then
								array(num).STR_HACHU_TANTO_MEI = Conversions.ToString(sqlDataReader("SHAIN_MEI"))
							Else
								array(num).STR_HACHU_TANTO_MEI = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHAIN_RYAKU_MEI")))
							If flag2 Then
								array(num).STR_HACHU_TANTO_RYAKU_MEI = Conversions.ToString(sqlDataReader("SHAIN_RYAKU_MEI"))
							Else
								array(num).STR_HACHU_TANTO_RYAKU_MEI = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD")))
							If flag2 Then
								array(num).STR_GAIBU_GYOSHA_CD = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD"))
							Else
								array(num).STR_GAIBU_GYOSHA_CD = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN")))
							If flag2 Then
								array(num).STR_GAIBU_NAIBU_KBN = RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN"))
							Else
								array(num).STR_GAIBU_NAIBU_KBN = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_CD")))
							If flag2 Then
								array(num).STR_NOHINSAKI_CD = Conversions.ToString(sqlDataReader("NOHINSAKI_CD"))
							Else
								array(num).STR_NOHINSAKI_CD = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_MEI")))
							If flag2 Then
								array(num).STR_NOHINSAKI_MEI = Conversions.ToString(sqlDataReader("NOHINSAKI_MEI"))
							Else
								array(num).STR_NOHINSAKI_MEI = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_DT")))
							If flag2 Then
								array(num).STR_HACHU_DT = Conversions.ToString(sqlDataReader("HACHU_DT"))
							Else
								array(num).STR_HACHU_DT = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_TNT_CD")))
							If flag2 Then
								array(num).STR_HACHU_TNT_ID = Conversions.ToString(sqlDataReader("HACHU_TNT_CD"))
							Else
								array(num).STR_HACHU_TNT_ID = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI")))
							If flag2 Then
								array(num).STR_GYOSHA_MEI = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI"))
							Else
								array(num).STR_GYOSHA_MEI = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_TELL")))
							If flag2 Then
								array(num).STR_SHIIRESAKI_TEL_NO = Conversions.ToString(sqlDataReader("GYOSHA_TELL"))
							Else
								array(num).STR_SHIIRESAKI_TEL_NO = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_FAX")))
							If flag2 Then
								array(num).STR_SHIIRESAKI_FAX_NO = Conversions.ToString(sqlDataReader("GYOSHA_FAX"))
							Else
								array(num).STR_SHIIRESAKI_FAX_NO = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_DT")))
							If flag2 Then
								array(num).STR_NOHIN_DT = Conversions.ToString(sqlDataReader("NOHIN_DT"))
							Else
								array(num).STR_NOHIN_DT = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_SU")))
							If flag2 Then
								array(num).STR_NOHIN_SU = Conversions.ToString(sqlDataReader("NOHIN_SU"))
							Else
								array(num).STR_NOHIN_SU = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_TANI")))
							If flag2 Then
								array(num).STR_NOHIN_TANI = Conversions.ToString(sqlDataReader("NOHIN_TANI"))
							Else
								array(num).STR_NOHIN_TANI = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
							If flag2 Then
								array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
							Else
								array(num).STR_KOBAI_CD = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
							If flag2 Then
								array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
							Else
								array(num).STR_KOBAI_MEI = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_BUNRUI_MEI")))
							If flag2 Then
								array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
							Else
								array(num).STR_KOBAI_BUNRUI_MEI = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_YM")))
							If flag2 Then
								array(num).STR_SEISAN_YM = Conversions.ToString(sqlDataReader("SEISAN_YM"))
							Else
								array(num).STR_SEISAN_YM = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_TANKA")))
							If flag2 Then
								array(num).STR_SIIRE_TANKA = Conversions.ToString(sqlDataReader("SIIRE_TANKA"))
							Else
								array(num).STR_SIIRE_TANKA = "0"
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_GOKEI_GK")))
							If flag2 Then
								array(num).STR_SIIRE_GOKEI_GK = Conversions.ToString(sqlDataReader("SIIRE_GOKEI_GK"))
							Else
								array(num).STR_SIIRE_GOKEI_GK = "0"
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_NEBIKI")))
							If flag2 Then
								array(num).STR_SIIRE_NEBIKI = Conversions.ToString(sqlDataReader("SIIRE_NEBIKI"))
							Else
								array(num).STR_SIIRE_NEBIKI = "0"
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_SHOHIZEI_GK")))
							If flag2 Then
								array(num).STR_SIIRE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SIIRE_SHOHIZEI_GK"))
							Else
								array(num).STR_SIIRE_SHOHIZEI_GK = "0"
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_TANKA")))
							If flag2 Then
								array(num).STR_URIAGE_TANKA = Conversions.ToString(sqlDataReader("URIAGE_TANKA"))
							Else
								array(num).STR_URIAGE_TANKA = "0"
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_GOKEI_GK")))
							If flag2 Then
								array(num).STR_URIAGE_GOKEI_GK = Conversions.ToString(sqlDataReader("URIAGE_GOKEI_GK"))
							Else
								array(num).STR_URIAGE_GOKEI_GK = "0"
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_NEBIKI")))
							If flag2 Then
								array(num).STR_URIAGE_NEBIKI = Conversions.ToString(sqlDataReader("URIAGE_NEBIKI"))
							Else
								array(num).STR_URIAGE_NEBIKI = "0"
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_SHOHIZEI_GK")))
							If flag2 Then
								array(num).STR_URIAGE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("URIAGE_SHOHIZEI_GK"))
							Else
								array(num).STR_URIAGE_SHOHIZEI_GK = "0"
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_JYOTAI_KBN")))
							If flag2 Then
								array(num).STR_NOHIN_JYOTAI_KBN = Conversions.ToString(sqlDataReader("NOHIN_JYOTAI_KBN"))
							Else
								array(num).STR_NOHIN_JYOTAI_KBN = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
							If flag2 Then
								array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
							Else
								array(num).STR_UPDATE_DT = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
							If flag2 Then
								array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
							Else
								array(num).STR_BIKO = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAKUTEI_KBN")))
							If flag2 Then
								array(num).STR_KAKUTEI_KBN = Conversions.ToString(sqlDataReader("KAKUTEI_KBN"))
							Else
								array(num).STR_KAKUTEI_KBN = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DELETE_FLG")))
							If flag2 Then
								array(num).STR_DELETE_FLG = Conversions.ToString(sqlDataReader("DELETE_FLG"))
							Else
								array(num).STR_DELETE_FLG = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_HOUHOU_KBN")))
							If flag2 Then
								array(num).STR_NOHIN_HOUHOU_KBN = Conversions.ToString(sqlDataReader("NOHIN_HOUHOU_KBN"))
							Else
								array(num).STR_NOHIN_HOUHOU_KBN = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_TEL")))
							If flag2 Then
								array(num).STR_NOHINSAKI_TEL = Conversions.ToString(sqlDataReader("NOHINSAKI_TEL"))
							Else
								array(num).STR_NOHINSAKI_TEL = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_FAX")))
							If flag2 Then
								array(num).STR_NOHINSAKI_FAX = Conversions.ToString(sqlDataReader("NOHINSAKI_FAX"))
							Else
								array(num).STR_NOHINSAKI_FAX = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("YUBIN_NO")))
							If flag2 Then
								array(num).STR_YUBIN_NO = Conversions.ToString(sqlDataReader("YUBIN_NO"))
							Else
								array(num).STR_YUBIN_NO = ""
							End If
							flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS1")))
							If flag2 Then
								array(num).STR_ADDRESS1 = Conversions.ToString(sqlDataReader("ADDRESS1"))
							Else
								array(num).STR_ADDRESS1 = ""
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
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_D5F As Exception
				ProjectData.SetProjectError(expr_D5F)
				Dim ex As Exception = expr_D5F
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