<?php
class HojinMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getHojinManageJoho(){

    /*
        Public Function GetHojinManageJoho(HojinCD As String, HojinMei As String, HojinKanaMei As String, SoshikiCD As String, ByRef MsgCd As String, FindFlg As Integer) As HojinList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As HojinList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0092().ToString(), New Object()() { Strings.Trim(SoshikiCD + HojinCD), HojinMei, HojinKanaMei, SoshikiCD })
                Else
                    flag = (FindFlg = 2)
                    If flag Then
                        strSQL = String.Format(masterSQL.SMF0091().ToString(), New Object()() { Strings.Trim(SoshikiCD + HojinCD), HojinMei, HojinKanaMei, SoshikiCD })
                    Else
                        strSQL = String.Format(masterSQL.SMF0092().ToString(), New Object()() { "", "", "", SoshikiCD })
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As HojinList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New HojinList(num + 1 - 1) {}), HojinList())
                    Dim hojinList As HojinList = array(num)
                    array(num) = New HojinList()
                    array(num).STR_HOJIN_CD = Conversions.ToString(sqlDataReader("HOJIN_CD"))
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_MEI")))
                    If flag Then
                        array(num).STR_HOJIN_MEI = Conversions.ToString(sqlDataReader("HOJIN_MEI"))
                    Else
                        array(num).STR_HOJIN_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_HOJIN_RYAKU_MEI = Conversions.ToString(sqlDataReader("HOJIN_RYAKU_MEI"))
                    Else
                        array(num).STR_HOJIN_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_KANA_MEI")))
                    If flag Then
                        array(num).STR_HOJIN_KANA_MEI = Conversions.ToString(sqlDataReader("HOJIN_KANA_MEI"))
                    Else
                        array(num).STR_HOJIN_KANA_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_TELL")))
                    If flag Then
                        array(num).STR_HOJIN_TELL = Strings.RTrim(Conversions.ToString(sqlDataReader("HOJIN_TELL")))
                    Else
                        array(num).STR_HOJIN_TELL = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_FAX")))
                    If flag Then
                        array(num).STR_HOJIN_FAX = Strings.RTrim(Conversions.ToString(sqlDataReader("HOJIN_FAX")))
                    Else
                        array(num).STR_HOJIN_FAX = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_YUBIN")))
                    If flag Then
                        array(num).STR_HOJIN_YUBIN = Strings.RTrim(Conversions.ToString(sqlDataReader("HOJIN_YUBIN")))
                    Else
                        array(num).STR_HOJIN_YUBIN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_ADDRESS1")))
                    If flag Then
                        array(num).STR_HOJIN_ADDRESS1 = Conversions.ToString(sqlDataReader("HOJIN_ADDRESS1"))
                    Else
                        array(num).STR_HOJIN_ADDRESS1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_ADDRESS2")))
                    If flag Then
                        array(num).STR_HOJIN_ADDRESS2 = Conversions.ToString(sqlDataReader("HOJIN_ADDRESS2"))
                    Else
                        array(num).STR_HOJIN_ADDRESS2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_ADDRESS3")))
                    If flag Then
                        array(num).STR_HOJIN_ADDRESS3 = Conversions.ToString(sqlDataReader("HOJIN_ADDRESS3"))
                    Else
                        array(num).STR_HOJIN_ADDRESS3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_TAX_HASU_KBN")))
                    If flag Then
                        array(num).STR_HOJIN_TAX_HASU_KBN = Conversions.ToString(sqlDataReader("HOJIN_TAX_HASU_KBN"))
                    Else
                        array(num).STR_HOJIN_TAX_HASU_KBN = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_KAGAMI_KBN")))
                    If flag Then
                        array(num).STR_SEIKYU_KAGAMI_KBN = Conversions.ToString(sqlDataReader("SEIKYU_KAGAMI_KBN"))
                    Else
                        array(num).STR_SEIKYU_KAGAMI_KBN = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_MEISAI_KBN")))
                    If flag Then
                        array(num).STR_SEIKYU_MEISAI_KBN = Conversions.ToString(sqlDataReader("SEIKYU_MEISAI_KBN"))
                    Else
                        array(num).STR_SEIKYU_MEISAI_KBN = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NEBIKI_RITU")))
                    If flag Then
                        array(num).DEC_NEBIKI_RITU = Conversions.ToDecimal(sqlDataReader("NEBIKI_RITU"))
                    Else
                        array(num).DEC_NEBIKI_RITU = Decimal.Zero
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAIAGE_WARIBIKI_RT")))
                    If flag Then
                        array(num).DEC_KAIAGE_WARIBIKI_RT = Conversions.ToDecimal(sqlDataReader("KAIAGE_WARIBIKI_RT"))
                    Else
                        array(num).DEC_KAIAGE_WARIBIKI_RT = Decimal.Zero
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("LEASE_WARIBIKI_RT")))
                    If flag Then
                        array(num).DEC_LEASE_WARIBIKI_RT = Conversions.ToDecimal(sqlDataReader("LEASE_WARIBIKI_RT"))
                    Else
                        array(num).DEC_LEASE_WARIBIKI_RT = Decimal.Zero
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_TNT_MEI")))
                    If flag Then
                        array(num).STR_HOJIN_TNT_MEI = Conversions.ToString(sqlDataReader("HOJIN_TNT_MEI"))
                    Else
                        array(num).STR_HOJIN_TNT_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JIKAN_UNCHIN_CD")))
                    If flag Then
                        array(num).STR_JIKAN_UNCHIN_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JIKAN_UNCHIN_CD")))
                    Else
                        array(num).STR_JIKAN_UNCHIN_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYORI_UNCHIN_CD")))
                    If flag Then
                        array(num).STR_KYORI_UNCHIN_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("KYORI_UNCHIN_CD")))
                    Else
                        array(num).STR_KYORI_UNCHIN_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAIAGE_PTN_CD_IPN")))
                    If flag Then
                        array(num).STR_KAIAGE_PTN_CD_IPN = Strings.RTrim(Conversions.ToString(sqlDataReader("KAIAGE_PTN_CD_IPN")))
                    Else
                        array(num).STR_KAIAGE_PTN_CD_IPN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("LEASE_PTN_CD_IPN")))
                    If flag Then
                        array(num).STR_LEASE_PTN_CD_IPN = Strings.RTrim(Conversions.ToString(sqlDataReader("LEASE_PTN_CD_IPN")))
                    Else
                        array(num).STR_LEASE_PTN_CD_IPN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAIAGE_PTN_CD_JIM")))
                    If flag Then
                        array(num).STR_KAIAGE_PTN_CD_JIM = Strings.RTrim(Conversions.ToString(sqlDataReader("KAIAGE_PTN_CD_JIM")))
                    Else
                        array(num).STR_KAIAGE_PTN_CD_JIM = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("LEASE_PTN_CD_JIM")))
                    If flag Then
                        array(num).STR_LEASE_PTN_CD_JIM = Strings.RTrim(Conversions.ToString(sqlDataReader("LEASE_PTN_CD_JIM")))
                    Else
                        array(num).STR_LEASE_PTN_CD_JIM = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_MEI_OUT_KBN")))
                    If flag Then
                        array(num).STR_JISHA_MEI_OUT_KBN = Conversions.ToString(sqlDataReader("JISHA_MEI_OUT_KBN"))
                    Else
                        array(num).STR_JISHA_MEI_OUT_KBN = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_HOJIN_CD")))
                    If flag Then
                        array(num).STR_JISHA_HOJIN_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JISHA_HOJIN_CD")))
                    Else
                        array(num).STR_JISHA_HOJIN_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
                    If flag Then
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                    Else
                        array(num).STR_SOSHIKI_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("EIGYO_TNT_CD")))
                    If flag Then
                        array(num).STR_EIGYO_TNT_CD = Conversions.ToString(sqlDataReader("EIGYO_TNT_CD"))
                    Else
                        array(num).STR_EIGYO_TNT_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIME_DT")))
                    If flag Then
                        array(num).STR_SHIME_DT = Conversions.ToString(sqlDataReader("SHIME_DT"))
                    Else
                        array(num).STR_SHIME_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETORI_TESURYO_KBN")))
                    If flag Then
                        array(num).STR_UKETORI_TESURYO_KBN = Conversions.ToString(sqlDataReader("UKETORI_TESURYO_KBN"))
                    Else
                        array(num).STR_UKETORI_TESURYO_KBN = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETORI_TESURYO_RT")))
                    If flag Then
                        array(num).DEC_UKETORI_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("UKETORI_TESURYO_RT"))
                    Else
                        array(num).DEC_UKETORI_TESURYO_RT = Conversions.ToDecimal("")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIHARAI_TESURYO_KBN")))
                    If flag Then
                        array(num).STR_SHIHARAI_TESURYO_KBN = Conversions.ToString(sqlDataReader("SHIHARAI_TESURYO_KBN"))
                    Else
                        array(num).STR_SHIHARAI_TESURYO_KBN = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIHARAI_TESURYO_RT")))
                    If flag Then
                        array(num).DEC_SHIHARAI_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("SHIHARAI_TESURYO_RT"))
                    Else
                        array(num).DEC_SHIHARAI_TESURYO_RT = Conversions.ToDecimal("")
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
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DELETE_FLG")))
                    If flag Then
                        array(num).STR_DELETE_FLG = Conversions.ToString(sqlDataReader("DELETE_FLG"))
                    Else
                        array(num).STR_DELETE_FLG = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).STR_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAIAGE_MEI_IPN")))
                    If flag Then
                        array(num).STR_KAIAGE_PTN_MEI_IPN = Conversions.ToString(sqlDataReader("KAIAGE_MEI_IPN"))
                    Else
                        array(num).STR_KAIAGE_PTN_MEI_IPN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("LEASE_MEI_IPN")))
                    If flag Then
                        array(num).STR_LEASE_PTN_MEI_IPN = Conversions.ToString(sqlDataReader("LEASE_MEI_IPN"))
                    Else
                        array(num).STR_LEASE_PTN_MEI_IPN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAIAGE_MEI_JIM")))
                    If flag Then
                        array(num).STR_KAIAGE_PTN_MEI_JIM = Conversions.ToString(sqlDataReader("KAIAGE_MEI_JIM"))
                    Else
                        array(num).STR_KAIAGE_PTN_MEI_JIM = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("LEASE_MEI_JIM")))
                    If flag Then
                        array(num).STR_LEASE_PTN_MEI_JIM = Conversions.ToString(sqlDataReader("LEASE_MEI_JIM"))
                    Else
                        array(num).STR_LEASE_PTN_MEI_JIM = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JIKAN_UNCHIN_MEI")))
                    If flag Then
                        array(num).STR_JIKAN_UNCHIN_MEI = Conversions.ToString(sqlDataReader("JIKAN_UNCHIN_MEI"))
                    Else
                        array(num).STR_JIKAN_UNCHIN_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYORI_UNCHIN_MEI")))
                    If flag Then
                        array(num).STR_KYORI_UNCHIN_MEI = Conversions.ToString(sqlDataReader("KYORI_UNCHIN_MEI"))
                    Else
                        array(num).STR_KYORI_UNCHIN_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("EIGYO_TNT_MEI")))
                    If flag Then
                        array(num).STR_EIGYO_TNT_MEI = Conversions.ToString(sqlDataReader("EIGYO_TNT_MEI"))
                    Else
                        array(num).STR_EIGYO_TNT_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("EIGYO_TNT_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_EIGYO_TNT_RYAKU_MEI = Conversions.ToString(sqlDataReader("EIGYO_TNT_RYAKU_MEI"))
                    Else
                        array(num).STR_EIGYO_TNT_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOU_FUTAN_XML")))
                    If flag Then
                        array(num).STR_HIYOU_FUTAN_XML = Conversions.ToString(sqlDataReader("HIYOU_FUTAN_XML"))
                    Else
                        array(num).STR_HIYOU_FUTAN_XML = ""
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_F43 As Exception
                ProjectData.SetProjectError(expr_F43)
                Dim ex As Exception = expr_F43
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