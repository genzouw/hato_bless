<?php
class KaiageLeaseMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteKaiageLease(){

    /*
        Public Function DeleteKaiageLease(SoshikiCd As String, KaiageLeaseKbn As String, ShohinCd As String, UpdateDt As String, UpdateTntId As String, GamenId As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim kaiageLeaseMasterMeisai As KaiageLeaseMasterMeisai = New KaiageLeaseMasterMeisai()
                Dim kaiageLease As KaiageLeaseList() = kaiageLeaseMasterMeisai.GetKaiageLease(SoshikiCd, KaiageLeaseKbn, ShohinCd, "", MsgCd, 0)
                Dim flag As Boolean = kaiageLease IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(kaiageLease(0).STR_UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0191().ToString(), New Object()() { SoshikiCd, KaiageLeaseKbn, ShohinCd, UpdateDt, UpdateTntId, GamenId })
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = kaiageLease Is Nothing
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

    function updateKaiageLease(){

    /*
        Public Function UpdateKaiageLease(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim mstFind As MstFind = New MstFind()
            Dim result As Boolean
            Try
                Dim kaiageLease As KaiageLease = New KaiageLease()
                kaiageLease = CType(objEntity, KaiageLease)
                Dim kaiageLeaseMasterMeisai As KaiageLeaseMasterMeisai = New KaiageLeaseMasterMeisai()
                Dim kaiageLease2 As KaiageLeaseList() = kaiageLeaseMasterMeisai.GetKaiageLease(kaiageLease.STR_SOSHIKI_CD, kaiageLease.STR_KAIAGE_LEASE_KBN, kaiageLease.STR_SHOHIN_CD, "", MsgCd, 0)
                Dim flag As Boolean = kaiageLease2 IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(kaiageLease2(0).STR_UPDATE_DT, kaiageLease.STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        flag2 = (Operators.CompareString(kaiageLease.STR_SHOHIN_SIIRE_GK.Trim(New Char()() { " " }), "", False) <> 0)
                        Dim sqlCommand As String
                        If flag2 Then
                            sqlCommand = String.Format(masterSQL.UMF0190().ToString(), New Object()() { kaiageLease.STR_SOSHIKI_CD, kaiageLease.STR_KAIAGE_LEASE_KBN, kaiageLease.STR_SHOHIN_CD, kaiageLease.STR_SHOHIN_MEI, kaiageLease.STR_SHOHIN_SIIRE_GK.Trim(New Char()() { " " }), mstFind.GetDATE_YYMMDDHHMMSS, kaiageLease.STR_UPDATE_TNT_ID, kaiageLease.STR_GAMEN_ID, 0 })
                        Else
                            flag2 = (Operators.CompareString(kaiageLease.STR_SHOHIN_SIIRE_GK.Trim(New Char()() { " " }), "", False) = 0)
                            If flag2 Then
                                sqlCommand = String.Format(masterSQL.UMF0191().ToString(), New Object()() { kaiageLease.STR_SOSHIKI_CD, kaiageLease.STR_KAIAGE_LEASE_KBN, kaiageLease.STR_SHOHIN_CD, kaiageLease.STR_SHOHIN_MEI, kaiageLease.STR_SHOHIN_SIIRE_GK, mstFind.GetDATE_YYMMDDHHMMSS, kaiageLease.STR_UPDATE_TNT_ID, kaiageLease.STR_GAMEN_ID, 0 })
                            End If
                        End If
                        flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = kaiageLease2 Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_262 As Exception
                ProjectData.SetProjectError(expr_262)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setKaiageLease(){

    /*
        Public Function SetKaiageLease(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim mstFind As MstFind = New MstFind()
            Dim result As Boolean
            Try
                Dim kaiageLease As KaiageLease = New KaiageLease()
                kaiageLease = CType(objEntity, KaiageLease)
                Dim sqlCommand As String = String.Format(masterSQL.DMF0190().ToString(), kaiageLease.STR_SOSHIKI_CD, kaiageLease.STR_KAIAGE_LEASE_KBN, kaiageLease.STR_SHOHIN_CD)
                Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    flag = (Operators.CompareString(kaiageLease.STR_SHOHIN_SIIRE_GK.Trim(New Char()() { " " }), "", False) <> 0)
                    If flag Then
                        sqlCommand = String.Format(masterSQL.IMF0190().ToString(), New Object()() { kaiageLease.STR_SOSHIKI_CD, kaiageLease.STR_KAIAGE_LEASE_KBN, kaiageLease.STR_SHOHIN_CD, kaiageLease.STR_SHOHIN_MEI, kaiageLease.STR_SHOHIN_SIIRE_GK.Trim(New Char()() { " " }), mstFind.GetDATE_YYMMDDHHMMSS, kaiageLease.STR_UPDATE_TNT_ID, kaiageLease.STR_GAMEN_ID })
                    Else
                        flag = (Operators.CompareString(kaiageLease.STR_SHOHIN_SIIRE_GK.Trim(New Char()() { " " }), "", False) = 0)
                        If flag Then
                            sqlCommand = String.Format(masterSQL.IMF0191().ToString(), New Object()() { kaiageLease.STR_SOSHIKI_CD, kaiageLease.STR_KAIAGE_LEASE_KBN, kaiageLease.STR_SHOHIN_CD, kaiageLease.STR_SHOHIN_MEI, kaiageLease.STR_SHOHIN_SIIRE_GK, mstFind.GetDATE_YYMMDDHHMMSS, kaiageLease.STR_UPDATE_TNT_ID, kaiageLease.STR_GAMEN_ID })
                        End If
                    End If
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        result = True
                    End If
                End If
            Catch expr_1F7 As Exception
                ProjectData.SetProjectError(expr_1F7)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>