<?php
class DepoMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getDepoManageJoho($id){

    /*
		Public Function GetDepoManageJoho(KobatoKbn As String, DepotCd As String, DepotMei As String, DepotKanaMei As String, ByRef MsgCd As String, FindFlg As Integer) As DepoList()
			Dim masterSQL As MasterSQL = New MasterSQL()
//			' The following expression was wrapped in a checked-statement
			Dim result As DepoList()
			Try
				Dim flag As Boolean = FindFlg = 0
				Dim strSQL As String
				If flag Then
					strSQL = String.Format(masterSQL.SMF0111().ToString(), New Object()() { KobatoKbn, DepotCd, DepotMei, DepotKanaMei })
				Else
					strSQL = String.Format(masterSQL.SMF0110().ToString(), New Object(0 - 1) {})
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As DepoList()
				While sqlDataReader.Read()
					flag = (num >= 99)
					If flag Then
						MsgCd = "SI0090"
					End If
					flag = (num < 100)
					If flag Then
						array = CType(Utils.CopyArray(CType(array, Array), New DepoList(num + 1 - 1) {}), DepoList())
						Dim depoList As DepoList = array(num)
						array(num) = New DepoList()
						array(num).STR_KOBATO_KBN = Conversions.ToString(sqlDataReader("KOBATO_KBN"))
						array(num).STR_DEPOT_CD = Conversions.ToString(sqlDataReader("DEPOT_CD"))
						array(num).STR_DEPOT_MEI = Conversions.ToString(sqlDataReader("DEPOT_MEI"))
						array(num).STR_DEPOT_RYAKU_MEI = Conversions.ToString(sqlDataReader("DEPOT_RYAKU_MEI"))
						array(num).STR_TODOHUKEN_CD = Conversions.ToString(sqlDataReader("TODOHUKEN_CD"))
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DEPOT_KANA_MEI")))
						If flag Then
							array(num).STR_DEPOT_KANA_MEI = Conversions.ToString(sqlDataReader("DEPOT_KANA_MEI"))
						Else
							array(num).STR_DEPOT_KANA_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DEPOT_TELL")))
						If flag Then
							array(num).STR_DEPOT_TELL = Strings.RTrim(Conversions.ToString(sqlDataReader("DEPOT_TELL")))
						Else
							array(num).STR_DEPOT_TELL = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DEPOT_FAX")))
						If flag Then
							array(num).STR_DEPOT_FAX = Strings.RTrim(Conversions.ToString(sqlDataReader("DEPOT_FAX")))
						Else
							array(num).STR_DEPOT_FAX = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DEPOT_YUBIN")))
						If flag Then
							array(num).STR_DEPOT_YUBIN = Strings.RTrim(Conversions.ToString(sqlDataReader("DEPOT_YUBIN")))
						Else
							array(num).STR_DEPOT_YUBIN = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DEPOT_ADDRESS1")))
						If flag Then
							array(num).STR_DEPOT_ADDRESS1 = Conversions.ToString(sqlDataReader("DEPOT_ADDRESS1"))
						Else
							array(num).STR_DEPOT_ADDRESS1 = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DEPOT_ADDRESS2")))
						If flag Then
							array(num).STR_DEPOT_ADDRESS2 = Conversions.ToString(sqlDataReader("DEPOT_ADDRESS2"))
						Else
							array(num).STR_DEPOT_ADDRESS2 = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DEPOT_ADDRESS3")))
						If flag Then
							array(num).STR_DEPOT_ADDRESS3 = Conversions.ToString(sqlDataReader("DEPOT_ADDRESS3"))
						Else
							array(num).STR_DEPOT_ADDRESS3 = ""
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
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TODOHUKEN_MEI")))
						If flag Then
							array(num).STR_TODOHUKEN_MEI = Conversions.ToString(sqlDataReader("TODOHUKEN_MEI"))
						Else
							array(num).STR_TODOHUKEN_MEI = ""
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_4EA As Exception
				ProjectData.SetProjectError(expr_4EA)
				Dim ex As Exception = expr_4EA
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