<?php
class KaguMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteKaguManageJoho(){

    /*
        Public Function DeleteKaguManageJoho(SoshikiCd As String, HikkoshiKbn As String, KaguBunruiCd As String, KaguCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim kaguMasterMeisai As KaguMasterMeisai = New KaguMasterMeisai()
                Dim kaguManageJoho As KaguList() = kaguMasterMeisai.GetKaguManageJoho(HikkoshiKbn, KaguCd, KaguBunruiCd, "", SoshikiCd, MsgCd, 0)
                Dim flag As Boolean = kaguManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(kaguManageJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0151().ToString(), New Object()() { SoshikiCd, HikkoshiKbn, KaguBunruiCd, KaguCd })
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = kaguManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_DE As Exception
                ProjectData.SetProjectError(expr_DE)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateKagu(){

    /*
        Public Function UpdateKagu(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim kagu As Kagu = New Kagu()
                kagu = CType(objEntity, Kagu)
                Dim kaguMasterMeisai As KaguMasterMeisai = New KaguMasterMeisai()
                Dim kaguManageJoho As KaguList() = kaguMasterMeisai.GetKaguManageJoho(kagu.STR_HIKKOSHI_KBN, kagu.STR_KAGU_CD, kagu.STR_KAGU_BUNRUI_CD, "", kagu.STR_SOSHIKI_CD, MsgCd, 0)
                Dim flag As Boolean = kaguManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(kaguManageJoho(0).STR_UPDATE_DT, kagu.STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim mstFind As MstFind = New MstFind()
                        Dim sqlCommand As String = String.Format(masterSQL.UMF0150().ToString(), New Object()() { kagu.STR_SOSHIKI_CD, kagu.STR_HIKKOSHI_KBN, kagu.STR_KAGU_BUNRUI_CD, kagu.STR_KAGU_CD, kagu.STR_KAGU_MEI, kagu.STR_KAGU_RYAKU_MEI, kagu.INT_KAGU_W, kagu.INT_KAGU_D, kagu.INT_KAGU_H, kagu.DEC_KAGU_M3, mstFind.GetDATE_YYMMDDHHMMSS, kagu.STR_UPDATE_TNT_ID, kagu.STR_GAMEN_ID, "0" })
                        flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = kaguManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_1B3 As Exception
                ProjectData.SetProjectError(expr_1B3)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setKagu(){

    /*
        Public Function SetKagu(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim kagu As Kagu = New Kagu()
                kagu = CType(objEntity, Kagu)
                Dim sqlCommand As String = String.Format(masterSQL.IMF0151().ToString(), New Object()() { kagu.STR_SOSHIKI_CD, kagu.STR_HIKKOSHI_KBN, kagu.STR_KAGU_BUNRUI_CD, kagu.STR_KAGU_CD })
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    Dim mstFind As MstFind = New MstFind()
                    sqlCommand = String.Format(masterSQL.IMF0150().ToString(), New Object()() { kagu.STR_SOSHIKI_CD, kagu.STR_HIKKOSHI_KBN, kagu.STR_KAGU_BUNRUI_CD, kagu.STR_KAGU_CD, kagu.STR_KAGU_MEI, kagu.STR_KAGU_RYAKU_MEI, kagu.INT_KAGU_W, kagu.INT_KAGU_D, kagu.INT_KAGU_H, kagu.DEC_KAGU_M3, mstFind.GetDATE_YYMMDDHHMMSS, kagu.STR_UPDATE_TNT_ID, kagu.STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        result = True
                    End If
                End If
            Catch expr_176 As Exception
                ProjectData.SetProjectError(expr_176)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>