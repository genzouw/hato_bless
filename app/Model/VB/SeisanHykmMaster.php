<?php
class SeisanHykmMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteSeisanHykmManageJoho(){

    /*
        Public Function DeleteSeisanHykmManageJoho(SeikyuYr As String, SoshikiCd As String, HiyokomokuCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim seisanHykmMasterMeisai As SeisanHykmMasterMeisai = New SeisanHykmMasterMeisai()
                Dim seisanHykmManageJoho As SeisanHykmList() = seisanHykmMasterMeisai.GetSeisanHykmManageJoho(SeikyuYr, "", "", SoshikiCd, Strings.Trim(SoshikiCd + HiyokomokuCd), MsgCd, 0)
                Dim flag As Boolean = seisanHykmManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(seisanHykmManageJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DEF0821().ToString(), SeikyuYr, Strings.Trim(SoshikiCd + HiyokomokuCd))
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = seisanHykmManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_D3 As Exception
                ProjectData.SetProjectError(expr_D3)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateSeisanHykm(){

    /*
        Public Function UpdateSeisanHykm(objEntity As Object, MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim seisanHykm As SeisanHykm = New SeisanHykm()
                seisanHykm = CType(objEntity, SeisanHykm)
                Dim seisanHykmMasterMeisai As SeisanHykmMasterMeisai = New SeisanHykmMasterMeisai()
                Dim seisanHykmManageJoho As SeisanHykmList() = seisanHykmMasterMeisai.GetSeisanHykmManageJoho(seisanHykm.STR_SEIKYU_NEND, "", "", seisanHykm.STR_SOSHIKI_CD, Strings.Trim(seisanHykm.STR_SOSHIKI_CD + seisanHykm.STR_HIYOKOMOKU_CD), MsgCd, 0)
                Dim flag As Boolean = seisanHykmManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(seisanHykmManageJoho(0).STR_UPDATE_DT, seisanHykm.STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim mstFind As MstFind = New MstFind()
                        Dim sqlCommand As String = String.Format(masterSQL.UEF0820().ToString(), New Object()() { seisanHykm.STR_SOSHIKI_CD, seisanHykm.STR_SEIKYU_NEND, Strings.Trim(seisanHykm.STR_SOSHIKI_CD + seisanHykm.STR_HIYOKOMOKU_CD), seisanHykm.STR_RYOKIN_KEITAI, seisanHykm.STR_HIYOKOMOKU_MEI, seisanHykm.DEC_HIYOKOMOKU_GK, seisanHykm.STR_SHOHIZEI_KBN, seisanHykm.DEC_SHOHIZEI_RITU, seisanHykm.DEC_TESURYO_RT, seisanHykm.STR_TESURYO_KEISAN_KBN, seisanHykm.STR_TESURYO_SHOHIZEI_KBN, seisanHykm.STR_CREDITCARD_CD, seisanHykm.DEC_BOX_SIYO_GK, seisanHykm.DEC_HATU_BOX_TESURYO_GK, seisanHykm.DEC_CYAKU_BOX_TESURYO_GK, seisanHykm.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, seisanHykm.STR_UPDATE_TNT_ID, seisanHykm.STR_GAMEN_ID, "0" })
                        flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = seisanHykmManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_20F As Exception
                ProjectData.SetProjectError(expr_20F)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setSeisanHykm(){

    /*
        Public Function SetSeisanHykm(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim seisanHykm As SeisanHykm = New SeisanHykm()
                seisanHykm = CType(objEntity, SeisanHykm)
                Dim sqlCommand As String = String.Format(masterSQL.IEF0821().ToString(), seisanHykm.STR_SEIKYU_NEND, Strings.Trim(seisanHykm.STR_SOSHIKI_CD + seisanHykm.STR_HIYOKOMOKU_CD))
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    Dim mstFind As MstFind = New MstFind()
                    sqlCommand = String.Format(masterSQL.IEF0820().ToString(), New Object()() { seisanHykm.STR_SOSHIKI_CD, seisanHykm.STR_SEIKYU_NEND, Strings.Trim(seisanHykm.STR_SOSHIKI_CD + seisanHykm.STR_HIYOKOMOKU_CD), seisanHykm.STR_RYOKIN_KEITAI, seisanHykm.STR_HIYOKOMOKU_MEI, seisanHykm.DEC_HIYOKOMOKU_GK, seisanHykm.STR_SHOHIZEI_KBN, seisanHykm.DEC_SHOHIZEI_RITU, seisanHykm.DEC_TESURYO_RT, seisanHykm.STR_TESURYO_KEISAN_KBN, seisanHykm.STR_TESURYO_SHOHIZEI_KBN, seisanHykm.STR_CREDITCARD_CD, seisanHykm.DEC_BOX_SIYO_GK, seisanHykm.DEC_HATU_BOX_TESURYO_GK, seisanHykm.DEC_CYAKU_BOX_TESURYO_GK, seisanHykm.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, seisanHykm.STR_UPDATE_TNT_ID, seisanHykm.STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        result = True
                    End If
                End If
            Catch expr_1A6 As Exception
                ProjectData.SetProjectError(expr_1A6)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>