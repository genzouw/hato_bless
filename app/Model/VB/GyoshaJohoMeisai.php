<?php
class GyoshaJohoMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');


    function GetGaibuGyoshaManageJoho($GyoshaKbn, $GyoshaCd, $GyoshaMei, $SoshikiCd, $MsgCd, $FindFlg){
// As GyoshaList()
/*
	Dim gyosha As Gyosha = New Gyosha()
	Dim masterSQL As MasterSQL = New MasterSQL()
	Dim result As GyoshaList()
			Try
				Dim strSQL As String = String.Format(masterSQL.SMF0130().ToString(), New Object()() { GyoshaKbn, GyoshaCd, GyoshaMei, SoshikiCd })
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As GyoshaList()
				While sqlDataReader.Read()
					Dim flag As Boolean = num >= 99
					If flag Then
						MsgCd = "SI0090"
					End If
					flag = (num < 100)
					If flag Then
						array = CType(Utils.CopyArray(CType(array, Array), New GyoshaList(num + 1 - 1) {}), GyoshaList())
						Dim gyoshaList As GyoshaList = array(num)
						array(num) = New GyoshaList()
						array(num).STR_GYOSHA_KBN = Conversions.ToString(sqlDataReader("GYOSHA_KBN"))
						array(num).STR_GYOSHA_CD = Conversions.ToString(sqlDataReader("GYOSHA_CD"))
						array(num).STR_GYOSHA_MEI = Conversions.ToString(sqlDataReader("GYOSHA_MEI"))
						array(num).STR_GYOSHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("GYOSHA_RYAKU_MEI"))
						array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_KANA_MEI")))
						If flag Then
							array(num).STR_GYOSHA_KANA_MEI = Conversions.ToString(sqlDataReader("GYOSHA_KANA_MEI"))
						Else
							array(num).STR_GYOSHA_KANA_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_TELL")))
						If flag Then
							array(num).STR_GYOSHA_TELL = Strings.RTrim(Conversions.ToString(sqlDataReader("GYOSHA_TELL")))
						Else
							array(num).STR_GYOSHA_TELL = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_FAX")))
						If flag Then
							array(num).STR_GYOSHA_FAX = Strings.RTrim(Conversions.ToString(sqlDataReader("GYOSHA_FAX")))
						Else
							array(num).STR_GYOSHA_FAX = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MAIL_ADS")))
						If flag Then
							array(num).STR_GYOSHA_MAIL_ADS = Strings.RTrim(Conversions.ToString(sqlDataReader("GYOSHA_MAIL_ADS")))
						Else
							array(num).STR_GYOSHA_MAIL_ADS = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_YUBIN")))
						If flag Then
							array(num).STR_GYOSHA_YUBIN = Strings.RTrim(Conversions.ToString(sqlDataReader("GYOSHA_YUBIN")))
						Else
							array(num).STR_GYOSHA_YUBIN = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_ADDRESS1")))
						If flag Then
							array(num).STR_GYOSHA_ADDRESS1 = Conversions.ToString(sqlDataReader("GYOSHA_ADDRESS1"))
						Else
							array(num).STR_GYOSHA_ADDRESS1 = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_ADDRESS2")))
						If flag Then
							array(num).STR_GYOSHA_ADDRESS2 = Conversions.ToString(sqlDataReader("GYOSHA_ADDRESS2"))
						Else
							array(num).STR_GYOSHA_ADDRESS2 = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_ADDRESS3")))
						If flag Then
							array(num).STR_GYOSHA_ADDRESS3 = Conversions.ToString(sqlDataReader("GYOSHA_ADDRESS3"))
						Else
							array(num).STR_GYOSHA_ADDRESS3 = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_GYOSHA_CD")))
						If flag Then
							array(num).STR_JISHA_GYOSHA_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JISHA_GYOSHA_CD")))
						Else
							array(num).STR_JISHA_GYOSHA_CD = ""
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
			Catch expr_56F As Exception
				ProjectData.SetProjectError(expr_56F)
				Dim ex As Exception = expr_56F
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
			*/
	}

}
?>