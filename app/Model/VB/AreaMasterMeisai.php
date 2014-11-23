<?php
class AreaMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getAreaManageJoho(){

    /*
		Public Function GetAreaManageJoho(AreaCd As String, AreaMei As String, SoshikiCd As String, ByRef MsgCd As String, FindFlg As Integer) As Arealist()
			Dim masterSQL As MasterSQL = New MasterSQL()
			// The following expression was wrapped in a checked-statement
			Dim result As Arealist()
			Try
				Dim flag As Boolean = FindFlg = 0
				Dim strSQL As String
				If flag Then
					Dim flag2 As Boolean = Strings.Len(Strings.Trim(AreaCd)) <= 3 And Operators.CompareString(Strings.Trim(AreaCd), "", False) <> 0
					If flag2 Then
						strSQL = String.Format(masterSQL.SMF0051().ToString(), Strings.Trim(SoshikiCd + AreaCd), AreaMei, SoshikiCd)
					Else
						strSQL = String.Format(masterSQL.SMF0051().ToString(), Strings.Trim(AreaCd), AreaMei, SoshikiCd)
					End If
				Else
					strSQL = String.Format(masterSQL.SMF0051().ToString(), "", "", SoshikiCd)
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As Arealist()
				While sqlDataReader.Read()
					Dim flag2 As Boolean = num >= 99
					If flag2 Then
						MsgCd = "SI0090"
					End If
					flag2 = (num < 100)
					If flag2 Then
						array = CType(Utils.CopyArray(CType(array, Array), New Arealist(num + 1 - 1) {}), Arealist())
						Dim arealist As Arealist = array(num)
						array(num) = New Arealist()
						array(num).STR_AREA_CD = Conversions.ToString(sqlDataReader("AREA_CD"))
						array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
						array(num).STR_AREA_MEI = Conversions.ToString(sqlDataReader("AREA_MEI"))
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
						flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
						If flag2 Then
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
			Catch expr_2C7 As Exception
				ProjectData.SetProjectError(expr_2C7)
				Dim ex As Exception = expr_2C7
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