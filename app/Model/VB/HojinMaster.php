<?php
class HojinMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteHojinJoho(){

    /*
        Public Function DeleteHojinJoho(HojinCd As String, HojinMei As String, HojinRyakuMei As String, KaiagePtnCd As String, LeasePtnCd As String, JishaMeiOutKbn As String, SoshikiCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim hojinMasterMeisai As HojinMasterMeisai = New HojinMasterMeisai()
                Dim hojinManageJoho As HojinList() = hojinMasterMeisai.GetHojinManageJoho(HojinCd, HojinMei, "", SoshikiCd, MsgCd, 0)
                Dim flag As Boolean = hojinManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(hojinManageJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0101().ToString(), New Object()() { Strings.Trim(SoshikiCd + HojinCd), HojinMei, HojinRyakuMei, KaiagePtnCd, LeasePtnCd, JishaMeiOutKbn, SoshikiCd })
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = hojinManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_101 As Exception
                ProjectData.SetProjectError(expr_101)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateHojin(){

    /*
        Public Function UpdateHojin(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim hojin As Hojin = New Hojin()
                hojin = CType(objEntity, Hojin)
                Dim hojinMasterMeisai As HojinMasterMeisai = New HojinMasterMeisai()
                Dim hojinManageJoho As HojinList() = hojinMasterMeisai.GetHojinManageJoho(hojin.STR_HOJIN_CD, "", "", hojin.STR_SOSHIKI_CD, MsgCd, 0)
                Dim flag As Boolean = hojinManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(hojinManageJoho(0).STR_UPDATE_DT, hojin.STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim mstFind As MstFind = New MstFind()
                        flag2 = (Operators.CompareString(Strings.Trim(hojin.STR_EIGYO_TNT_CD), "", False) = 0)
                        Dim sqlCommand As String
                        If flag2 Then
                            sqlCommand = String.Format(masterSQL.UMF0100().ToString(), New Object()() { Strings.Trim(hojin.STR_SOSHIKI_CD + hojin.STR_HOJIN_CD), hojin.STR_HOJIN_MEI, hojin.STR_HOJIN_RYAKU_MEI, hojin.STR_HOJIN_KANA_MEI, hojin.STR_HOJIN_TELL, hojin.STR_HOJIN_FAX, hojin.STR_HOJIN_YUBIN, hojin.STR_HOJIN_ADDRESS1, hojin.STR_HOJIN_ADDRESS2, hojin.STR_HOJIN_ADDRESS3, hojin.STR_HOJIN_TAX_HASU_KBN, hojin.STR_SEIKYU_KAGAMI_KBN, hojin.STR_SEIKYU_MEISAI_KBN, hojin.DEC_NEBIKI_RITU, hojin.DEC_KAIAGE_WARIBIKI_RT, hojin.DEC_LEASE_WARIBIKI_RT, hojin.STR_HOJIN_TNT_MEI, hojin.STR_JIKAN_UNCHIN_CD, hojin.STR_KYORI_UNCHIN_CD, hojin.STR_KAIAGE_PTN_CD_IPN, hojin.STR_LEASE_PTN_CD_IPN, hojin.STR_KAIAGE_PTN_CD_JIM, hojin.STR_LEASE_PTN_CD_JIM, hojin.STR_JISHA_MEI_OUT_KBN, hojin.STR_JISHA_HOJIN_CD, hojin.STR_SOSHIKI_CD, hojin.STR_EIGYO_TNT_CD, hojin.STR_SHIME_DT, hojin.STR_UKETORI_TESURYO_KBN, hojin.DEC_UKETORI_TESURYO_RT, hojin.STR_SHIHARAI_TESURYO_KBN, hojin.DEC_SHIHARAI_TESURYO_RT, mstFind.GetDATE_YYMMDDHHMMSS, hojin.STR_UPDATE_TNT_ID, hojin.STR_GAMEN_ID, "0", hojin.STR_HIYOU_FUTAN_XML })
                        Else
                            flag2 = (Strings.Len(hojin.STR_EIGYO_TNT_CD) = 3)
                            If flag2 Then
                                sqlCommand = String.Format(masterSQL.UMF0100().ToString(), New Object()() { Strings.Trim(hojin.STR_SOSHIKI_CD + hojin.STR_HOJIN_CD), hojin.STR_HOJIN_MEI, hojin.STR_HOJIN_RYAKU_MEI, hojin.STR_HOJIN_KANA_MEI, hojin.STR_HOJIN_TELL, hojin.STR_HOJIN_FAX, hojin.STR_HOJIN_YUBIN, hojin.STR_HOJIN_ADDRESS1, hojin.STR_HOJIN_ADDRESS2, hojin.STR_HOJIN_ADDRESS3, hojin.STR_HOJIN_TAX_HASU_KBN, hojin.STR_SEIKYU_KAGAMI_KBN, hojin.STR_SEIKYU_MEISAI_KBN, hojin.DEC_NEBIKI_RITU, hojin.DEC_KAIAGE_WARIBIKI_RT, hojin.DEC_LEASE_WARIBIKI_RT, hojin.STR_HOJIN_TNT_MEI, hojin.STR_JIKAN_UNCHIN_CD, hojin.STR_KYORI_UNCHIN_CD, hojin.STR_KAIAGE_PTN_CD_IPN, hojin.STR_LEASE_PTN_CD_IPN, hojin.STR_KAIAGE_PTN_CD_JIM, hojin.STR_LEASE_PTN_CD_JIM, hojin.STR_JISHA_MEI_OUT_KBN, hojin.STR_JISHA_HOJIN_CD, hojin.STR_SOSHIKI_CD, Strings.Trim(hojin.STR_SOSHIKI_CD + hojin.STR_EIGYO_TNT_CD), hojin.STR_SHIME_DT, hojin.STR_UKETORI_TESURYO_KBN, hojin.DEC_UKETORI_TESURYO_RT, hojin.STR_SHIHARAI_TESURYO_KBN, hojin.DEC_SHIHARAI_TESURYO_RT, mstFind.GetDATE_YYMMDDHHMMSS, hojin.STR_UPDATE_TNT_ID, hojin.STR_GAMEN_ID, "0", hojin.STR_HIYOU_FUTAN_XML })
                            Else
                                sqlCommand = String.Format(masterSQL.UMF0100().ToString(), New Object()() { Strings.Trim(hojin.STR_SOSHIKI_CD + hojin.STR_HOJIN_CD), hojin.STR_HOJIN_MEI, hojin.STR_HOJIN_RYAKU_MEI, hojin.STR_HOJIN_KANA_MEI, hojin.STR_HOJIN_TELL, hojin.STR_HOJIN_FAX, hojin.STR_HOJIN_YUBIN, hojin.STR_HOJIN_ADDRESS1, hojin.STR_HOJIN_ADDRESS2, hojin.STR_HOJIN_ADDRESS3, hojin.STR_HOJIN_TAX_HASU_KBN, hojin.STR_SEIKYU_KAGAMI_KBN, hojin.STR_SEIKYU_MEISAI_KBN, hojin.DEC_NEBIKI_RITU, hojin.DEC_KAIAGE_WARIBIKI_RT, hojin.DEC_LEASE_WARIBIKI_RT, hojin.STR_HOJIN_TNT_MEI, hojin.STR_JIKAN_UNCHIN_CD, hojin.STR_KYORI_UNCHIN_CD, hojin.STR_KAIAGE_PTN_CD_IPN, hojin.STR_LEASE_PTN_CD_IPN, hojin.STR_KAIAGE_PTN_CD_JIM, hojin.STR_LEASE_PTN_CD_JIM, hojin.STR_JISHA_MEI_OUT_KBN, hojin.STR_JISHA_HOJIN_CD, hojin.STR_SOSHIKI_CD, hojin.STR_EIGYO_TNT_CD, hojin.STR_SHIME_DT, hojin.STR_UKETORI_TESURYO_KBN, hojin.DEC_UKETORI_TESURYO_RT, hojin.STR_SHIHARAI_TESURYO_KBN, hojin.DEC_SHIHARAI_TESURYO_RT, mstFind.GetDATE_YYMMDDHHMMSS, hojin.STR_UPDATE_TNT_ID, hojin.STR_GAMEN_ID, "0", hojin.STR_HIYOU_FUTAN_XML })
                            End If
                        End If
                        flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = hojinManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_77B As Exception
                ProjectData.SetProjectError(expr_77B)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setHojin(){

    /*
        Public Function SetHojin(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim hojin As Hojin = New Hojin()
                hojin = CType(objEntity, Hojin)
                Dim sqlCommand As String = String.Format(masterSQL.IMF0101().ToString(), New Object()() { Strings.Trim(hojin.STR_SOSHIKI_CD + hojin.STR_HOJIN_CD), hojin.STR_HOJIN_MEI, hojin.STR_HOJIN_RYAKU_MEI, hojin.STR_KAIAGE_PTN_CD_IPN, hojin.STR_LEASE_PTN_CD_IPN, hojin.STR_KAIAGE_PTN_CD_JIM, hojin.STR_LEASE_PTN_CD_JIM, hojin.STR_JISHA_MEI_OUT_KBN, hojin.STR_SOSHIKI_CD })
                Dim mstFind As MstFind = New MstFind()
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    flag = (Operators.CompareString(Strings.Trim(hojin.STR_EIGYO_TNT_CD), "", False) = 0)
                    If flag Then
                        sqlCommand = String.Format(masterSQL.IMF0100().ToString(), New Object()() { Strings.Trim(hojin.STR_SOSHIKI_CD + hojin.STR_HOJIN_CD), hojin.STR_HOJIN_MEI, hojin.STR_HOJIN_RYAKU_MEI, hojin.STR_HOJIN_KANA_MEI, hojin.STR_HOJIN_TELL, hojin.STR_HOJIN_FAX, hojin.STR_HOJIN_YUBIN, hojin.STR_HOJIN_ADDRESS1, hojin.STR_HOJIN_ADDRESS2, hojin.STR_HOJIN_ADDRESS3, hojin.STR_HOJIN_TAX_HASU_KBN, hojin.STR_SEIKYU_KAGAMI_KBN, hojin.STR_SEIKYU_MEISAI_KBN, hojin.DEC_NEBIKI_RITU, hojin.DEC_KAIAGE_WARIBIKI_RT, hojin.DEC_LEASE_WARIBIKI_RT, hojin.STR_HOJIN_TNT_MEI, hojin.STR_JIKAN_UNCHIN_CD, hojin.STR_KYORI_UNCHIN_CD, hojin.STR_KAIAGE_PTN_CD_IPN, hojin.STR_LEASE_PTN_CD_IPN, hojin.STR_KAIAGE_PTN_CD_JIM, hojin.STR_LEASE_PTN_CD_JIM, hojin.STR_JISHA_MEI_OUT_KBN, hojin.STR_JISHA_HOJIN_CD, hojin.STR_SOSHIKI_CD, hojin.STR_EIGYO_TNT_CD, hojin.STR_SHIME_DT, hojin.STR_UKETORI_TESURYO_KBN, hojin.DEC_UKETORI_TESURYO_RT, hojin.STR_SHIHARAI_TESURYO_KBN, hojin.DEC_SHIHARAI_TESURYO_RT, mstFind.GetDATE_YYMMDDHHMMSS, hojin.STR_UPDATE_TNT_ID, hojin.STR_GAMEN_ID, hojin.STR_HIYOU_FUTAN_XML })
                    Else
                        flag = (Strings.Len(hojin.STR_EIGYO_TNT_CD) = 3)
                        If flag Then
                            sqlCommand = String.Format(masterSQL.IMF0100().ToString(), New Object()() { Strings.Trim(hojin.STR_SOSHIKI_CD + hojin.STR_HOJIN_CD), hojin.STR_HOJIN_MEI, hojin.STR_HOJIN_RYAKU_MEI, hojin.STR_HOJIN_KANA_MEI, hojin.STR_HOJIN_TELL, hojin.STR_HOJIN_FAX, hojin.STR_HOJIN_YUBIN, hojin.STR_HOJIN_ADDRESS1, hojin.STR_HOJIN_ADDRESS2, hojin.STR_HOJIN_ADDRESS3, hojin.STR_HOJIN_TAX_HASU_KBN, hojin.STR_SEIKYU_KAGAMI_KBN, hojin.STR_SEIKYU_MEISAI_KBN, hojin.DEC_NEBIKI_RITU, hojin.DEC_KAIAGE_WARIBIKI_RT, hojin.DEC_LEASE_WARIBIKI_RT, hojin.STR_HOJIN_TNT_MEI, hojin.STR_JIKAN_UNCHIN_CD, hojin.STR_KYORI_UNCHIN_CD, hojin.STR_KAIAGE_PTN_CD_IPN, hojin.STR_LEASE_PTN_CD_IPN, hojin.STR_KAIAGE_PTN_CD_JIM, hojin.STR_LEASE_PTN_CD_JIM, hojin.STR_JISHA_MEI_OUT_KBN, hojin.STR_JISHA_HOJIN_CD, hojin.STR_SOSHIKI_CD, Strings.Trim(hojin.STR_SOSHIKI_CD + hojin.STR_EIGYO_TNT_CD), hojin.STR_SHIME_DT, hojin.STR_UKETORI_TESURYO_KBN, hojin.DEC_UKETORI_TESURYO_RT, hojin.STR_SHIHARAI_TESURYO_KBN, hojin.DEC_SHIHARAI_TESURYO_RT, mstFind.GetDATE_YYMMDDHHMMSS, hojin.STR_UPDATE_TNT_ID, hojin.STR_GAMEN_ID, hojin.STR_HIYOU_FUTAN_XML })
                        Else
                            sqlCommand = String.Format(masterSQL.IMF0100().ToString(), New Object()() { Strings.Trim(hojin.STR_SOSHIKI_CD + hojin.STR_HOJIN_CD), hojin.STR_HOJIN_MEI, hojin.STR_HOJIN_RYAKU_MEI, hojin.STR_HOJIN_KANA_MEI, hojin.STR_HOJIN_TELL, hojin.STR_HOJIN_FAX, hojin.STR_HOJIN_YUBIN, hojin.STR_HOJIN_ADDRESS1, hojin.STR_HOJIN_ADDRESS2, hojin.STR_HOJIN_ADDRESS3, hojin.STR_HOJIN_TAX_HASU_KBN, hojin.STR_SEIKYU_KAGAMI_KBN, hojin.STR_SEIKYU_MEISAI_KBN, hojin.DEC_NEBIKI_RITU, hojin.DEC_KAIAGE_WARIBIKI_RT, hojin.DEC_LEASE_WARIBIKI_RT, hojin.STR_HOJIN_TNT_MEI, hojin.STR_JIKAN_UNCHIN_CD, hojin.STR_KYORI_UNCHIN_CD, hojin.STR_KAIAGE_PTN_CD_IPN, hojin.STR_LEASE_PTN_CD_IPN, hojin.STR_KAIAGE_PTN_CD_JIM, hojin.STR_LEASE_PTN_CD_JIM, hojin.STR_JISHA_MEI_OUT_KBN, hojin.STR_JISHA_HOJIN_CD, hojin.STR_SOSHIKI_CD, hojin.STR_EIGYO_TNT_CD, hojin.STR_SHIME_DT, hojin.STR_UKETORI_TESURYO_KBN, hojin.DEC_UKETORI_TESURYO_RT, hojin.STR_SHIHARAI_TESURYO_KBN, hojin.DEC_SHIHARAI_TESURYO_RT, mstFind.GetDATE_YYMMDDHHMMSS, hojin.STR_UPDATE_TNT_ID, hojin.STR_GAMEN_ID, hojin.STR_HIYOU_FUTAN_XML })
                        End If
                    End If
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        result = True
                    End If
                End If
            Catch expr_77F As Exception
                ProjectData.SetProjectError(expr_77F)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>