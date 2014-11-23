<?php
class MeisaiTsuikaYouSeikyuSakiMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSoshikiManageJoho(){

    /*
        Public Function GetSoshikiManageJoho(SoshikisakiCd As String, SoshikiKeitaiKbnSelect As String, SoshikisakiKanaMei As String, SoshikisakiMei As String, JyoubuSoshikiCd As String, ByRef MsgCd As String, FindFlg As Integer) As SoshikiList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As SoshikiList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SEF0231().ToString(), New Object()() { SoshikisakiCd, SoshikiKeitaiKbnSelect, SoshikisakiMei, SoshikisakiKanaMei, JyoubuSoshikiCd })
                Else
                    strSQL = String.Format(masterSQL.SEF0230().ToString(), New Object(0 - 1) {})
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SoshikiList()
                While sqlDataReader.Read()
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SoshikiList(num + 1 - 1) {}), SoshikiList())
                        Dim soshikiList As SoshikiList = array(num)
                        array(num) = New SoshikiList()
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        array(num).STR_SOSHIKI_KBN = Conversions.ToString(sqlDataReader("SOSHIKI_KBN"))
                        array(num).STR_SOSHIKI_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_MEI"))
                        array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_KANA_MEI")))
                        If flag Then
                            array(num).STR_SOSHIKI_KANA_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_KANA_MEI"))
                        Else
                            array(num).STR_SOSHIKI_KANA_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAISHA_MEI")))
                        If flag Then
                            array(num).STR_KAISHA_MEI = Conversions.ToString(sqlDataReader("KAISHA_MEI"))
                        Else
                            array(num).STR_KAISHA_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAISHA_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_KAISHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("KAISHA_RYAKU_MEI"))
                        Else
                            array(num).STR_KAISHA_RYAKU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAISHA_KANA_MEI")))
                        If flag Then
                            array(num).STR_KAISHA_KANA_MEI = Conversions.ToString(sqlDataReader("KAISHA_KANA_MEI"))
                        Else
                            array(num).STR_KAISHA_KANA_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_TELL")))
                        If flag Then
                            array(num).STR_SOSHIKI_TELL = Conversions.ToString(sqlDataReader("SOSHIKI_TELL"))
                        Else
                            array(num).STR_SOSHIKI_TELL = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_FAX")))
                        If flag Then
                            array(num).STR_SOSHIKI_FAX = Conversions.ToString(sqlDataReader("SOSHIKI_FAX"))
                        Else
                            array(num).STR_SOSHIKI_FAX = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_MAIL_ADS")))
                        If flag Then
                            array(num).STR_SOSHIKI_MAIL_ADS = Conversions.ToString(sqlDataReader("SOSHIKI_MAIL_ADS"))
                        Else
                            array(num).STR_SOSHIKI_MAIL_ADS = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_YUBIN")))
                        If flag Then
                            array(num).STR_SOSHIKI_YUBIN = Conversions.ToString(sqlDataReader("SOSHIKI_YUBIN"))
                        Else
                            array(num).STR_SOSHIKI_YUBIN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS1")))
                        If flag Then
                            array(num).STR_SOSHIKI_ADDRESS1 = Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS1"))
                        Else
                            array(num).STR_SOSHIKI_ADDRESS1 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS2")))
                        If flag Then
                            array(num).STR_SOSHIKI_ADDRESS2 = Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS2"))
                        Else
                            array(num).STR_SOSHIKI_ADDRESS2 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS3")))
                        If flag Then
                            array(num).STR_SOSHIKI_ADDRESS3 = Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS3"))
                        Else
                            array(num).STR_SOSHIKI_ADDRESS3 = ""
                        End If
                        array(num).STR_JYOBU_SOSHIKI_CD = Conversions.ToString(sqlDataReader("JYOBU_SOSHIKI_CD"))
                        array(num).STR_AREA_CD = Conversions.ToString(sqlDataReader("AREA_CD"))
                        array(num).STR_UNYUKYOKU_KBN = Conversions.ToString(sqlDataReader("UNYUKYOKU_KBN"))
                        array(num).DEC_SO_BOX_SU = Conversions.ToDecimal(sqlDataReader("SO_BOX_SU"))
                        array(num).STR_BANK_CD_1 = Conversions.ToString(sqlDataReader("BANK_CD_1"))
                        array(num).STR_BANK_SHITEN_CD_1 = Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_1"))
                        array(num).STR_BANK_SHITEN_MEI_1 = Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_1"))
                        array(num).STR_KOZA_KBN_1 = Conversions.ToString(sqlDataReader("KOZA_KBN_1"))
                        array(num).STR_KOZA_NO_1 = Conversions.ToString(sqlDataReader("KOZA_NO_1"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_2")))
                        If flag Then
                            array(num).STR_BANK_CD_2 = Conversions.ToString(sqlDataReader("BANK_CD_2"))
                        Else
                            array(num).STR_BANK_CD_2 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_2")))
                        If flag Then
                            array(num).STR_BANK_SHITEN_CD_2 = Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_2"))
                        Else
                            array(num).STR_BANK_SHITEN_CD_2 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_2")))
                        If flag Then
                            array(num).STR_BANK_SHITEN_MEI_2 = Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_2"))
                        Else
                            array(num).STR_BANK_SHITEN_MEI_2 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_2")))
                        If flag Then
                            array(num).STR_KOZA_KBN_2 = Conversions.ToString(sqlDataReader("KOZA_KBN_2"))
                        Else
                            array(num).STR_KOZA_KBN_2 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_2")))
                        If flag Then
                            array(num).STR_KOZA_NO_2 = Conversions.ToString(sqlDataReader("KOZA_NO_2"))
                        Else
                            array(num).STR_KOZA_NO_2 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_3")))
                        If flag Then
                            array(num).STR_BANK_CD_3 = Conversions.ToString(sqlDataReader("BANK_CD_3"))
                        Else
                            array(num).STR_BANK_CD_3 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_3")))
                        If flag Then
                            array(num).STR_BANK_SHITEN_CD_3 = Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_3"))
                        Else
                            array(num).STR_BANK_SHITEN_CD_3 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_3")))
                        If flag Then
                            array(num).STR_BANK_SHITEN_MEI_3 = Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_3"))
                        Else
                            array(num).STR_BANK_SHITEN_MEI_3 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_3")))
                        If flag Then
                            array(num).STR_KOZA_KBN_3 = Conversions.ToString(sqlDataReader("KOZA_KBN_3"))
                        Else
                            array(num).STR_KOZA_KBN_3 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_3")))
                        If flag Then
                            array(num).STR_KOZA_NO_3 = Conversions.ToString(sqlDataReader("KOZA_NO_3"))
                        Else
                            array(num).STR_KOZA_NO_3 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_4")))
                        If flag Then
                            array(num).STR_BANK_CD_4 = Conversions.ToString(sqlDataReader("BANK_CD_4"))
                        Else
                            array(num).STR_BANK_CD_4 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_4")))
                        If flag Then
                            array(num).STR_BANK_SHITEN_CD_4 = Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_4"))
                        Else
                            array(num).STR_BANK_SHITEN_CD_4 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_4")))
                        If flag Then
                            array(num).STR_BANK_SHITEN_MEI_4 = Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_4"))
                        Else
                            array(num).STR_BANK_SHITEN_MEI_4 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_4")))
                        If flag Then
                            array(num).STR_KOZA_KBN_4 = Conversions.ToString(sqlDataReader("KOZA_KBN_4"))
                        Else
                            array(num).STR_KOZA_KBN_4 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_4")))
                        If flag Then
                            array(num).STR_KOZA_NO_4 = Conversions.ToString(sqlDataReader("KOZA_NO_4"))
                        Else
                            array(num).STR_KOZA_NO_4 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_5")))
                        If flag Then
                            array(num).STR_BANK_CD_5 = Conversions.ToString(sqlDataReader("BANK_CD_5"))
                        Else
                            array(num).STR_BANK_CD_5 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_5")))
                        If flag Then
                            array(num).STR_BANK_SHITEN_CD_5 = Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_5"))
                        Else
                            array(num).STR_BANK_SHITEN_CD_5 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_5")))
                        If flag Then
                            array(num).STR_BANK_SHITEN_MEI_5 = Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_5"))
                        Else
                            array(num).STR_BANK_SHITEN_MEI_5 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_5")))
                        If flag Then
                            array(num).STR_KOZA_KBN_5 = Conversions.ToString(sqlDataReader("KOZA_KBN_5"))
                        Else
                            array(num).STR_KOZA_KBN_5 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_5")))
                        If flag Then
                            array(num).STR_KOZA_NO_5 = Conversions.ToString(sqlDataReader("KOZA_NO_5"))
                        Else
                            array(num).STR_KOZA_NO_5 = ""
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
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_JYOBU_MEI")))
                        If flag Then
                            array(num).STR_SOSHIKI_JYOBU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_JYOBU_MEI"))
                        Else
                            array(num).STR_SOSHIKI_JYOBU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("AREA_MEI")))
                        If flag Then
                            array(num).STR_AREA_MEI = Conversions.ToString(sqlDataReader("AREA_MEI"))
                        Else
                            array(num).STR_AREA_MEI = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_D27 As Exception
                ProjectData.SetProjectError(expr_D27)
                Dim ex As Exception = expr_D27
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