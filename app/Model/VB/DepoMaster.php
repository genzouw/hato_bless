<?php
class DepoMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteDepo(){

    /*
		Public Function DeleteDepo(KobatoKbn As String, Depo As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim depoMasterMeisai As DepoMasterMeisai = New DepoMasterMeisai()
				Dim depoManageJoho As DepoList() = depoMasterMeisai.GetDepoManageJoho(KobatoKbn, Depo, "", "", MsgCd, 0)
				Dim flag As Boolean = depoManageJoho IsNot Nothing
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(depoManageJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						Dim sqlCommand As String = String.Format(masterSQL.DMF0111().ToString(), KobatoKbn, Depo)
						flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
						If flag2 Then
							result = False
						Else
							result = True
						End If
					End If
				Else
					Dim flag2 As Boolean = depoManageJoho Is Nothing
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						MsgCd = "XXXX"
						result = False
					End If
				End If
			Catch expr_B8 As Exception
				ProjectData.SetProjectError(expr_B8)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }


    function updateDepo(){

    /*
		Public Function UpdateDepo(Depo As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim depo As Depo = New Depo()
				depo = CType(Depo, Depo)
				Dim depoMasterMeisai As DepoMasterMeisai = New DepoMasterMeisai()
				Dim depoManageJoho As DepoList() = depoMasterMeisai.GetDepoManageJoho(depo.STR_KOBATO_KBN, depo.STR_DEPOT_CD, "", "", MsgCd, 0)
				Dim flag As Boolean = depoManageJoho IsNot Nothing
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(depoManageJoho(0).STR_UPDATE_DT, depo.STR_UPDATE_DT, False) <> 0
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						Dim mstFind As MstFind = New MstFind()
						Dim sqlCommand As String = String.Format(masterSQL.UMF0110().ToString(), New Object()() { depo.STR_KOBATO_KBN, depo.STR_DEPOT_CD, depo.STR_DEPOT_MEI, depo.STR_DEPOT_RYAKU_MEI, depo.STR_DEPOT_KANA_MEI, depo.STR_DEPOT_TELL, depo.STR_DEPOT_FAX, depo.STR_DEPOT_YUBIN, depo.STR_DEPOT_ADDRESS1, depo.STR_DEPOT_ADDRESS2, depo.STR_DEPOT_ADDRESS3, depo.STR_TODOHUKEN_CD, mstFind.GetDATE_YYMMDDHHMMSS, depo.STR_UPDATE_TNT_ID, depo.STR_GAMEN_ID, "0" })
						flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag2 Then
							result = False
						End If
					End If
				Else
					Dim flag2 As Boolean = depoManageJoho Is Nothing
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						MsgCd = "XXXX"
						result = False
					End If
				End If
			Catch expr_19F As Exception
				ProjectData.SetProjectError(expr_19F)
				Dim ex As Exception = expr_19F
				Throw ex
			End Try
			Return result
		End Function
     */

    }

    function setDepo(){

    /*
		Public Function SetDepo(Depo As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim depo As Depo = New Depo()
				depo = CType(Depo, Depo)
				Dim sqlCommand As String = String.Format(masterSQL.IMF0111().ToString(), depo.STR_KOBATO_KBN, depo.STR_DEPOT_CD)
				Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					Dim mstFind As MstFind = New MstFind()
					sqlCommand = String.Format(masterSQL.IMF0110().ToString(), New Object()() { depo.STR_KOBATO_KBN, depo.STR_DEPOT_CD, depo.STR_DEPOT_MEI, depo.STR_DEPOT_RYAKU_MEI, depo.STR_DEPOT_KANA_MEI, depo.STR_DEPOT_TELL, depo.STR_DEPOT_FAX, depo.STR_DEPOT_YUBIN, depo.STR_DEPOT_ADDRESS1, depo.STR_DEPOT_ADDRESS2, depo.STR_DEPOT_ADDRESS3, depo.STR_TODOHUKEN_CD, mstFind.GetDATE_YYMMDDHHMMSS, depo.STR_UPDATE_TNT_ID, depo.STR_GAMEN_ID })
					flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
					If flag Then
						result = False
					Else
						result = True
					End If
				End If
			Catch expr_140 As Exception
				ProjectData.SetProjectError(expr_140)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }


}
?>