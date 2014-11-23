<?php
class AreaMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteAreaManageJoho(){

    /*
		Public Function DeleteAreaManageJoho(AreaCd As String, SoshikiCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim areaMasterMeisai As AreaMasterMeisai = New AreaMasterMeisai()
				Dim areaManageJoho As Arealist() = areaMasterMeisai.GetAreaManageJoho(AreaCd, "", SoshikiCd, MsgCd, 0)
				Dim flag As Boolean = areaManageJoho IsNot Nothing
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(areaManageJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						Dim sqlCommand As String = String.Format(masterSQL.DMF0051().ToString(), Strings.Trim(SoshikiCd + AreaCd))
						flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
						If flag2 Then
							result = False
						Else
							result = True
						End If
					End If
				Else
					Dim flag2 As Boolean = areaManageJoho Is Nothing
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						MsgCd = "XXXX"
						result = False
					End If
				End If
			Catch expr_C0 As Exception
				ProjectData.SetProjectError(expr_C0)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function updateArea(){

    /*
		Public Function UpdateArea(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim area As Area = New Area()
				area = CType(objEntity, Area)
				Dim areaMasterMeisai As AreaMasterMeisai = New AreaMasterMeisai()
				Dim areaManageJoho As Arealist() = areaMasterMeisai.GetAreaManageJoho(area.STR_AREA_CD, "", area.STR_SOSHIKI_CD, MsgCd, 0)
				Dim flag As Boolean = areaManageJoho IsNot Nothing
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(areaManageJoho(0).STR_UPDATE_DT, area.STR_UPDATE_DT, False) <> 0
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						Dim mstFind As MstFind = New MstFind()
						Dim sqlCommand As String = String.Format(masterSQL.UMF0050().ToString(), New Object()() { Strings.Trim(area.STR_SOSHIKI_CD + area.STR_AREA_CD), area.STR_AREA_MEI, area.STR_SOSHIKI_CD, mstFind.GetDATE_YYMMDDHHMMSS, area.STR_GAMEN_ID, area.STR_UPDATE_TNT_ID, "0" })
						flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag2 Then
							result = False
						End If
					End If
				Else
					Dim flag2 As Boolean = areaManageJoho Is Nothing
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						MsgCd = "XXXX"
						result = False
					End If
				End If
			Catch expr_13F As Exception
				ProjectData.SetProjectError(expr_13F)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function setArea(){

    /*

		Public Function SetArea(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim area As Area = New Area()
				area = CType(objEntity, Area)
				Dim sqlCommand As String = String.Format(masterSQL.IMF0051().ToString(), Strings.Trim(area.STR_SOSHIKI_CD + area.STR_AREA_CD))
				Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					Dim mstFind As MstFind = New MstFind()
					sqlCommand = String.Format(masterSQL.IMF0050().ToString(), New Object()() { Strings.Trim(area.STR_SOSHIKI_CD + area.STR_AREA_CD), area.STR_AREA_MEI, area.STR_SOSHIKI_CD, mstFind.GetDATE_YYMMDDHHMMSS, area.STR_GAMEN_ID, area.STR_UPDATE_TNT_ID })
					flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
					If flag Then
						result = False
					Else
						result = True
					End If
				End If
			Catch expr_F0 As Exception
				ProjectData.SetProjectError(expr_F0)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }


}
?>