<?php
class HanyoMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteHanyo(){

    /*
        Public Function DeleteHanyo(HanyoKbn As String, HanyoMeiKbn As String, UpdateDt As String, UpdateTntId As String, GamenId As String, SoshikiCd As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim hanyoMasterMeisai As HanyoMasterMeisai = New HanyoMasterMeisai()
                Dim hanyo As HanyoList() = hanyoMasterMeisai.GetHanyo(HanyoKbn, HanyoMeiKbn, "", SoshikiCd, MsgCd, 0)
                Dim flag As Boolean = hanyo IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(hanyo(0).STR_UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0291().ToString(), New Object()() { HanyoKbn, HanyoMeiKbn, UpdateDt, UpdateTntId, GamenId, SoshikiCd })
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = hanyo Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_EA As Exception
                ProjectData.SetProjectError(expr_EA)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateHanyo(){

    /*
        Public Function UpdateHanyo(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim mstFind As MstFind = New MstFind()
            Dim result As Boolean
            Try
                Dim hanyo As Hanyo = New Hanyo()
                hanyo = CType(objEntity, Hanyo)
                Dim hanyoMasterMeisai As HanyoMasterMeisai = New HanyoMasterMeisai()
                Dim hanyo2 As HanyoList() = hanyoMasterMeisai.GetHanyo(hanyo.STR_HANYO_KBN, hanyo.STR_HANYO_MEI_KBN, "", hanyo.STR_SOSHIKI_CD, MsgCd, 0)
                Dim flag As Boolean = hanyo2 IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(hanyo2(0).STR_UPDATE_DT, hanyo.STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.UMF0290().ToString(), New Object()() { hanyo.STR_HANYO_KBN, hanyo.STR_HANYO_MEI_KBN, hanyo.STR_HANYO_MEI, hanyo.STR_HANYO_CD, hanyo.STR_SOSHIKI_CD, mstFind.GetDATE_YYMMDDHHMMSS, hanyo.STR_UPDATE_TNT_ID, hanyo.STR_GAMEN_ID, 0 })
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = hanyo2 Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_158 As Exception
                ProjectData.SetProjectError(expr_158)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }


    function setHanyo(){

    /*
        Public Function SetHanyo(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim mstFind As MstFind = New MstFind()
            Dim result As Boolean
            Try
                Dim hanyo As Hanyo = New Hanyo()
                hanyo = CType(objEntity, Hanyo)
                Dim sqlCommand As String = String.Format(masterSQL.DMF0290().ToString(), hanyo.STR_HANYO_KBN, hanyo.STR_HANYO_MEI_KBN)
                Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    sqlCommand = String.Format(masterSQL.IMF0290().ToString(), New Object()() { hanyo.STR_HANYO_KBN, hanyo.STR_HANYO_MEI_KBN, hanyo.STR_HANYO_MEI, hanyo.STR_HANYO_CD, hanyo.STR_SOSHIKI_CD, mstFind.GetDATE_YYMMDDHHMMSS, hanyo.STR_UPDATE_TNT_ID, hanyo.STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        result = True
                    End If
                End If
            Catch expr_F5 As Exception
                ProjectData.SetProjectError(expr_F5)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }


}
?>