<?php
class GyoshaMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function setGyosha(){

    /*
		Public Function SetGyosha(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim gyosha As Gyosha = New Gyosha()
				gyosha = CType(objEntity, Gyosha)
				Dim sqlCommand As String = String.Format(masterSQL.IMF0131().ToString(), gyosha.STR_GYOSHA_KBN, Strings.Trim(gyosha.STR_SOSHIKI_CD + gyosha.STR_GYOSHA_CD))
				Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					Dim mstFind As MstFind = New MstFind()
					sqlCommand = String.Format(masterSQL.IMF0130().ToString(), New Object()() { gyosha.STR_GYOSHA_KBN, Strings.Trim(gyosha.STR_SOSHIKI_CD + gyosha.STR_GYOSHA_CD), gyosha.STR_GYOSHA_MEI, gyosha.STR_GYOSHA_RYAKU_MEI, gyosha.STR_GYOSHA_KANA_MEI, gyosha.STR_GYOSHA_TELL, gyosha.STR_GYOSHA_FAX, gyosha.STR_GYOSHA_MAIL_ADS, gyosha.STR_GYOSHA_YUBIN, gyosha.STR_GYOSHA_ADDRESS1, gyosha.STR_GYOSHA_ADDRESS2, gyosha.STR_GYOSHA_ADDRESS3, gyosha.STR_SOSHIKI_CD, gyosha.STR_JISHA_GYOSHA_CD, gyosha.STR_UPDATE_TNT_ID, mstFind.GetDATE_YYMMDDHHMMSS, gyosha.STR_GAMEN_ID })
					flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
					If flag Then
						result = False
					Else
						result = True
					End If
				End If
			Catch expr_18C As Exception
				ProjectData.SetProjectError(expr_18C)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }


    function updateGyosha(){

    /*
		Public Function UpdateGyosha(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim gyosha As Gyosha = New Gyosha()
				gyosha = CType(objEntity, Gyosha)
				Dim gyoshaJohoMeisai As GyoshaJohoMeisai = New GyoshaJohoMeisai()
				Dim gaibuGyoshaManageJoho As GyoshaList() = gyoshaJohoMeisai.GetGaibuGyoshaManageJoho(gyosha.STR_GYOSHA_KBN, Strings.Trim(gyosha.STR_SOSHIKI_CD + gyosha.STR_GYOSHA_CD), "", gyosha.STR_SOSHIKI_CD, MsgCd, 0)
				Dim flag As Boolean = gaibuGyoshaManageJoho IsNot Nothing
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(gaibuGyoshaManageJoho(0).STR_UPDATE_DT, gyosha.STR_UPDATE_DT, False) <> 0
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						Dim mstFind As MstFind = New MstFind()
						Dim sqlCommand As String = String.Format(masterSQL.UMF0130().ToString(), New Object()() { gyosha.STR_GYOSHA_KBN, Strings.Trim(gyosha.STR_SOSHIKI_CD + gyosha.STR_GYOSHA_CD), gyosha.STR_GYOSHA_MEI, gyosha.STR_GYOSHA_RYAKU_MEI, gyosha.STR_GYOSHA_KANA_MEI, gyosha.STR_GYOSHA_TELL, gyosha.STR_GYOSHA_FAX, gyosha.STR_GYOSHA_MAIL_ADS, gyosha.STR_GYOSHA_YUBIN, gyosha.STR_GYOSHA_ADDRESS1, gyosha.STR_GYOSHA_ADDRESS2, gyosha.STR_GYOSHA_ADDRESS3, gyosha.STR_SOSHIKI_CD, gyosha.STR_JISHA_GYOSHA_CD, gyosha.STR_UPDATE_TNT_ID, mstFind.GetDATE_YYMMDDHHMMSS, gyosha.STR_GAMEN_ID, "0" })
						flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag2 Then
							result = False
						End If
					End If
				Else
					Dim flag2 As Boolean = gaibuGyoshaManageJoho Is Nothing
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						MsgCd = "XXXX"
						result = False
					End If
				End If
			Catch expr_1EE As Exception
				ProjectData.SetProjectError(expr_1EE)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function deleteGyosha(){

    /*
		Public Function DeleteGyosha(GyoshaKbn As String, GyoshaCd As String, SoshikiCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim gyoshaJohoMeisai As GyoshaJohoMeisai = New GyoshaJohoMeisai()
				Dim gaibuGyoshaManageJoho As GyoshaList() = gyoshaJohoMeisai.GetGaibuGyoshaManageJoho(GyoshaKbn, Strings.Trim(SoshikiCd + GyoshaCd), "", SoshikiCd, MsgCd, 0)
				Dim flag As Boolean = gaibuGyoshaManageJoho IsNot Nothing
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(gaibuGyoshaManageJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						Dim sqlCommand As String = String.Format(masterSQL.DMF0131().ToString(), GyoshaKbn, Strings.Trim(SoshikiCd + GyoshaCd))
						flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
						If flag2 Then
							result = False
						Else
							result = True
						End If
					End If
				Else
					Dim flag2 As Boolean = gaibuGyoshaManageJoho Is Nothing
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						MsgCd = "XXXX"
						result = False
					End If
				End If
			Catch expr_CE As Exception
				ProjectData.SetProjectError(expr_CE)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }


}
?>