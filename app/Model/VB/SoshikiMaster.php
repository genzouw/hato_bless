<?php
class SoshikiMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteSoshikiManageJoho(){

    /*
        Public Function DeleteSoshikiManageJoho(SoshikiCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim soshikiMasterMeisai As SoshikiMasterMeisai = New SoshikiMasterMeisai()
                Dim soshikiManageJoho As SoshikiList() = soshikiMasterMeisai.GetSoshikiManageJoho(SoshikiCd, "", "", "", MsgCd, 0)
                Dim flag As Boolean = soshikiManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(soshikiManageJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0031().ToString(), SoshikiCd)
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = soshikiManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_B6 As Exception
                ProjectData.SetProjectError(expr_B6)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateSoshiki(){

    /*
        Public Function UpdateSoshiki(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim soshiki As Soshiki = New Soshiki()
                soshiki = CType(objEntity, Soshiki)
                Dim soshikiMasterMeisai As SoshikiMasterMeisai = New SoshikiMasterMeisai()
                Dim soshikiManageJoho As SoshikiList() = soshikiMasterMeisai.GetSoshikiManageJoho(soshiki.STR_SOSHIKI_CD, "", "", "", MsgCd, 0)
                Dim flag As Boolean = soshikiManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(soshikiManageJoho(0).STR_UPDATE_DT, soshiki.STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim mstFind As MstFind = New MstFind()
                        flag2 = (Strings.Len(soshiki.STR_AREA_CD) = 3)
                        Dim sqlCommand As String
                        If flag2 Then
                            sqlCommand = String.Format(masterSQL.UMF0030().ToString(), New Object()() { soshiki.STR_SOSHIKI_CD, soshiki.STR_SOSHIKI_KBN, soshiki.STR_SOSHIKI_MEI, soshiki.STR_SOSHIKI_RYAKU_MEI, soshiki.STR_SOSHIKI_KANA_MEI, soshiki.STR_KAISHA_MEI, soshiki.STR_KAISHA_RYAKU_MEI, soshiki.STR_KAISHA_KANA_MEI, soshiki.STR_SOSHIKI_TELL, soshiki.STR_SOSHIKI_FAX, soshiki.STR_SOSHIKI_MAIL_ADS, soshiki.STR_SOSHIKI_YUBIN, soshiki.STR_SOSHIKI_ADDRESS1, soshiki.STR_SOSHIKI_ADDRESS2, soshiki.STR_SOSHIKI_ADDRESS3, soshiki.STR_JYOBU_SOSHIKI_CD, Strings.Trim(soshiki.STR_JYOBU_SOSHIKI_CD + soshiki.STR_AREA_CD), soshiki.STR_UNYUKYOKU_KBN, soshiki.DEC_SO_BOX_SU, soshiki.STR_BANK_CD_1, soshiki.STR_BANK_SHITEN_CD_1, soshiki.STR_BANK_SHITEN_MEI_1, soshiki.STR_KOZA_KBN_1, soshiki.STR_KOZA_NO_1, soshiki.STR_KOZA_MEIGI_1, soshiki.STR_BANK_CD_2, soshiki.STR_BANK_SHITEN_CD_2, soshiki.STR_BANK_SHITEN_MEI_2, soshiki.STR_KOZA_KBN_2, soshiki.STR_KOZA_NO_2, soshiki.STR_KOZA_MEIGI_2, soshiki.STR_BANK_CD_3, soshiki.STR_BANK_SHITEN_CD_3, soshiki.STR_BANK_SHITEN_MEI_3, soshiki.STR_KOZA_KBN_3, soshiki.STR_KOZA_NO_3, soshiki.STR_KOZA_MEIGI_3, soshiki.STR_BANK_CD_4, soshiki.STR_BANK_SHITEN_CD_4, soshiki.STR_BANK_SHITEN_MEI_4, soshiki.STR_KOZA_KBN_4, soshiki.STR_KOZA_NO_4, soshiki.STR_KOZA_MEIGI_4, soshiki.STR_BANK_CD_5, soshiki.STR_BANK_SHITEN_CD_5, soshiki.STR_BANK_SHITEN_MEI_5, soshiki.STR_KOZA_KBN_5, soshiki.STR_KOZA_NO_5, soshiki.STR_KOZA_MEIGI_5, soshiki.STR_NINKA_NO, soshiki.DEC_KOKYAKU_KANRI_RIRITU, mstFind.GetDATE_YYMMDDHHMMSS, soshiki.STR_UPDATE_TNT_ID, soshiki.STR_GAMEN_ID, "0" })
                        Else
                            sqlCommand = String.Format(masterSQL.UMF0030().ToString(), New Object()() { soshiki.STR_SOSHIKI_CD, soshiki.STR_SOSHIKI_KBN, soshiki.STR_SOSHIKI_MEI, soshiki.STR_SOSHIKI_RYAKU_MEI, soshiki.STR_SOSHIKI_KANA_MEI, soshiki.STR_KAISHA_MEI, soshiki.STR_KAISHA_RYAKU_MEI, soshiki.STR_KAISHA_KANA_MEI, soshiki.STR_SOSHIKI_TELL, soshiki.STR_SOSHIKI_FAX, soshiki.STR_SOSHIKI_MAIL_ADS, soshiki.STR_SOSHIKI_YUBIN, soshiki.STR_SOSHIKI_ADDRESS1, soshiki.STR_SOSHIKI_ADDRESS2, soshiki.STR_SOSHIKI_ADDRESS3, soshiki.STR_JYOBU_SOSHIKI_CD, soshiki.STR_AREA_CD, soshiki.STR_UNYUKYOKU_KBN, soshiki.DEC_SO_BOX_SU, soshiki.STR_BANK_CD_1, soshiki.STR_BANK_SHITEN_CD_1, soshiki.STR_BANK_SHITEN_MEI_1, soshiki.STR_KOZA_KBN_1, soshiki.STR_KOZA_NO_1, soshiki.STR_KOZA_MEIGI_1, soshiki.STR_BANK_CD_2, soshiki.STR_BANK_SHITEN_CD_2, soshiki.STR_BANK_SHITEN_MEI_2, soshiki.STR_KOZA_KBN_2, soshiki.STR_KOZA_NO_2, soshiki.STR_KOZA_MEIGI_2, soshiki.STR_BANK_CD_3, soshiki.STR_BANK_SHITEN_CD_3, soshiki.STR_BANK_SHITEN_MEI_3, soshiki.STR_KOZA_KBN_3, soshiki.STR_KOZA_NO_3, soshiki.STR_KOZA_MEIGI_3, soshiki.STR_BANK_CD_4, soshiki.STR_BANK_SHITEN_CD_4, soshiki.STR_BANK_SHITEN_MEI_4, soshiki.STR_KOZA_KBN_4, soshiki.STR_KOZA_NO_4, soshiki.STR_KOZA_MEIGI_4, soshiki.STR_BANK_CD_5, soshiki.STR_BANK_SHITEN_CD_5, soshiki.STR_BANK_SHITEN_MEI_5, soshiki.STR_KOZA_KBN_5, soshiki.STR_KOZA_NO_5, soshiki.STR_KOZA_MEIGI_5, soshiki.STR_NINKA_NO, soshiki.DEC_KOKYAKU_KANRI_RIRITU, mstFind.GetDATE_YYMMDDHHMMSS, soshiki.STR_UPDATE_TNT_ID, soshiki.STR_GAMEN_ID, "0" })
                        End If
                        flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = soshikiManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_6C8 As Exception
                ProjectData.SetProjectError(expr_6C8)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setSoshiki(){

    /*
        Public Function SetSoshiki(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim soshiki As Soshiki = New Soshiki()
                soshiki = CType(objEntity, Soshiki)
                Dim sqlCommand As String = String.Format(masterSQL.IMF0031().ToString(), soshiki.STR_SOSHIKI_CD)
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    Dim mstFind As MstFind = New MstFind()
                    flag = (Strings.Len(soshiki.STR_AREA_CD) = 3)
                    If flag Then
                        sqlCommand = String.Format(masterSQL.IMF0030().ToString(), New Object()() { soshiki.STR_SOSHIKI_CD, soshiki.STR_SOSHIKI_KBN, soshiki.STR_SOSHIKI_MEI, soshiki.STR_SOSHIKI_RYAKU_MEI, soshiki.STR_SOSHIKI_KANA_MEI, soshiki.STR_KAISHA_MEI, soshiki.STR_KAISHA_RYAKU_MEI, soshiki.STR_KAISHA_KANA_MEI, soshiki.STR_SOSHIKI_TELL, soshiki.STR_SOSHIKI_FAX, soshiki.STR_SOSHIKI_MAIL_ADS, soshiki.STR_SOSHIKI_YUBIN, soshiki.STR_SOSHIKI_ADDRESS1, soshiki.STR_SOSHIKI_ADDRESS2, soshiki.STR_SOSHIKI_ADDRESS3, soshiki.STR_JYOBU_SOSHIKI_CD, Strings.Trim(soshiki.STR_JYOBU_SOSHIKI_CD + soshiki.STR_AREA_CD), soshiki.STR_UNYUKYOKU_KBN, soshiki.DEC_SO_BOX_SU, soshiki.STR_BANK_CD_1, soshiki.STR_BANK_SHITEN_CD_1, soshiki.STR_BANK_SHITEN_MEI_1, soshiki.STR_KOZA_KBN_1, soshiki.STR_KOZA_NO_1, soshiki.STR_KOZA_MEIGI_1, soshiki.STR_BANK_CD_2, soshiki.STR_BANK_SHITEN_CD_2, soshiki.STR_BANK_SHITEN_MEI_2, soshiki.STR_KOZA_KBN_2, soshiki.STR_KOZA_NO_2, soshiki.STR_KOZA_MEIGI_2, soshiki.STR_BANK_CD_3, soshiki.STR_BANK_SHITEN_CD_3, soshiki.STR_BANK_SHITEN_MEI_3, soshiki.STR_KOZA_KBN_3, soshiki.STR_KOZA_NO_3, soshiki.STR_KOZA_MEIGI_3, soshiki.STR_BANK_CD_4, soshiki.STR_BANK_SHITEN_CD_4, soshiki.STR_BANK_SHITEN_MEI_4, soshiki.STR_KOZA_KBN_4, soshiki.STR_KOZA_NO_4, soshiki.STR_KOZA_MEIGI_4, soshiki.STR_BANK_CD_5, soshiki.STR_BANK_SHITEN_CD_5, soshiki.STR_BANK_SHITEN_MEI_5, soshiki.STR_KOZA_KBN_5, soshiki.STR_KOZA_NO_5, soshiki.STR_KOZA_MEIGI_5, soshiki.STR_NINKA_NO, soshiki.DEC_KOKYAKU_KANRI_RIRITU, mstFind.GetDATE_YYMMDDHHMMSS, soshiki.STR_UPDATE_TNT_ID, soshiki.STR_GAMEN_ID })
                    Else
                        sqlCommand = String.Format(masterSQL.IMF0030().ToString(), New Object()() { soshiki.STR_SOSHIKI_CD, soshiki.STR_SOSHIKI_KBN, soshiki.STR_SOSHIKI_MEI, soshiki.STR_SOSHIKI_RYAKU_MEI, soshiki.STR_SOSHIKI_KANA_MEI, soshiki.STR_KAISHA_MEI, soshiki.STR_KAISHA_RYAKU_MEI, soshiki.STR_KAISHA_KANA_MEI, soshiki.STR_SOSHIKI_TELL, soshiki.STR_SOSHIKI_FAX, soshiki.STR_SOSHIKI_MAIL_ADS, soshiki.STR_SOSHIKI_YUBIN, soshiki.STR_SOSHIKI_ADDRESS1, soshiki.STR_SOSHIKI_ADDRESS2, soshiki.STR_SOSHIKI_ADDRESS3, soshiki.STR_JYOBU_SOSHIKI_CD, soshiki.STR_AREA_CD, soshiki.STR_UNYUKYOKU_KBN, soshiki.DEC_SO_BOX_SU, soshiki.STR_BANK_CD_1, soshiki.STR_BANK_SHITEN_CD_1, soshiki.STR_BANK_SHITEN_MEI_1, soshiki.STR_KOZA_KBN_1, soshiki.STR_KOZA_NO_1, soshiki.STR_KOZA_MEIGI_1, soshiki.STR_BANK_CD_2, soshiki.STR_BANK_SHITEN_CD_2, soshiki.STR_BANK_SHITEN_MEI_2, soshiki.STR_KOZA_KBN_2, soshiki.STR_KOZA_NO_2, soshiki.STR_KOZA_MEIGI_2, soshiki.STR_BANK_CD_3, soshiki.STR_BANK_SHITEN_CD_3, soshiki.STR_BANK_SHITEN_MEI_3, soshiki.STR_KOZA_KBN_3, soshiki.STR_KOZA_NO_3, soshiki.STR_KOZA_MEIGI_3, soshiki.STR_BANK_CD_4, soshiki.STR_BANK_SHITEN_CD_4, soshiki.STR_BANK_SHITEN_MEI_4, soshiki.STR_KOZA_KBN_4, soshiki.STR_KOZA_NO_4, soshiki.STR_KOZA_MEIGI_4, soshiki.STR_BANK_CD_5, soshiki.STR_BANK_SHITEN_CD_5, soshiki.STR_BANK_SHITEN_MEI_5, soshiki.STR_KOZA_KBN_5, soshiki.STR_KOZA_NO_5, soshiki.STR_KOZA_MEIGI_5, soshiki.STR_NINKA_NO, soshiki.DEC_KOKYAKU_KANRI_RIRITU, mstFind.GetDATE_YYMMDDHHMMSS, soshiki.STR_UPDATE_TNT_ID, soshiki.STR_GAMEN_ID })
                    End If
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        result = True
                    End If
                End If
            Catch expr_658 As Exception
                ProjectData.SetProjectError(expr_658)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>