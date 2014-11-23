<?php
class TantoshaMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteTantoshaManageJoho(){

    /*
        Public Function DeleteTantoshaManageJoho(TantoshaCd As String, ByRef SoshikiCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim tantoshaMasterMeisai As TantoshaMasterMeisai = New TantoshaMasterMeisai()
                Dim tantoshaManageJoho As TantoshaList() = tantoshaMasterMeisai.GetTantoshaManageJoho(TantoshaCd, SoshikiCd, "", MsgCd, 0)
                Dim flag As Boolean = tantoshaManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(tantoshaManageJoho(0).UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0071().ToString(), Strings.Trim(SoshikiCd + TantoshaCd))
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = tantoshaManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_C2 As Exception
                ProjectData.SetProjectError(expr_C2)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateTantosha(){

    /*
        Public Function UpdateTantosha(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim tantosha As Tantosha = New Tantosha()
                tantosha = CType(objEntity, Tantosha)
                Dim tantoshaMasterMeisai As TantoshaMasterMeisai = New TantoshaMasterMeisai()
                Dim tantoshaManageJoho As TantoshaList() = tantoshaMasterMeisai.GetTantoshaManageJoho(tantosha.STR_TANTOSHA_CD, tantosha.STR_SOSHIKI_CD, "", MsgCd, 0)
                Dim flag As Boolean = tantoshaManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(tantoshaManageJoho(0).UPDATE_DT, tantosha.STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim mstFind As MstFind = New MstFind()
                        Dim sqlCommand As String = String.Format(masterSQL.UMF0070().ToString(), New Object()() { Strings.Trim(tantosha.STR_SOSHIKI_CD + tantosha.STR_TANTOSHA_CD), tantosha.STR_SHAIN_MEI, tantosha.STR_SHAIN_RYAKU_MEI, tantosha.STR_SHAIN_KANA_MEI, tantosha.STR_JISHA_TANTOSHA_CD, tantosha.STR_SOSHIKI_CD, mstFind.GetDATE_YYMMDDHHMMSS, tantosha.STR_GAMEN_ID, tantosha.STR_UPDATE_TNT_ID, "0" })
                        flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = tantoshaManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_16E As Exception
                ProjectData.SetProjectError(expr_16E)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setTantosha(){

    /*
        Public Function SetTantosha(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim tantosha As Tantosha = New Tantosha()
                tantosha = CType(objEntity, Tantosha)
                Dim sqlCommand As String = String.Format(masterSQL.IMF0071().ToString(), Strings.Trim(tantosha.STR_SOSHIKI_CD + tantosha.STR_TANTOSHA_CD))
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    Dim mstFind As MstFind = New MstFind()
                    sqlCommand = String.Format(masterSQL.IMF0070().ToString(), New Object()() { Strings.Trim(tantosha.STR_SOSHIKI_CD + tantosha.STR_TANTOSHA_CD), tantosha.STR_SHAIN_MEI, tantosha.STR_SHAIN_RYAKU_MEI, tantosha.STR_SHAIN_KANA_MEI, tantosha.STR_JISHA_TANTOSHA_CD, tantosha.STR_SOSHIKI_CD, mstFind.GetDATE_YYMMDDHHMMSS, tantosha.STR_GAMEN_ID, tantosha.STR_UPDATE_TNT_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        result = True
                    End If
                End If
            Catch expr_11D As Exception
                ProjectData.SetProjectError(expr_11D)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>