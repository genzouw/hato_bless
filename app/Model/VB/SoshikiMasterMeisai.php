<?php
class SoshikiMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSoshikiManageJoho(){

    /*
        Public Function GetSoshikiManageJoho(SoshikiCd As String, SoshikiName As String, SoshikiKanaName As String, KaishaName As String, ByRef MsgCd As String, FindFlg As Integer) As SoshikiList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SoshikiList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0031().ToString(), New Object()() { SoshikiCd, SoshikiName, SoshikiKanaName, KaishaName })
                Else
                    flag = (FindFlg = 2)
                    If flag Then
                        strSQL = String.Format(masterSQL.SMF0032().ToString(), New Object(0 - 1) {})
                    Else
                        flag = (FindFlg = 3)
                        If flag Then
                            strSQL = String.Format(masterSQL.SMF0036().ToString(), New Object()() { SoshikiCd, SoshikiName, SoshikiKanaName, KaishaName })
                        Else
                            strSQL = String.Format(masterSQL.SMF0030().ToString(), New Object(0 - 1) {})
                        End If
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SoshikiList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SoshikiList(num + 1 - 1) {}), SoshikiList())
                    Dim soshikiList As SoshikiList = array(num)
                    array(num) = New SoshikiList()
                    array(num).STR_SOSHIKI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_CD")))
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_KBN")))
                    If flag Then
                        array(num).STR_SOSHIKI_KBN = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_KBN")))
                    Else
                        array(num).STR_SOSHIKI_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_MEI")))
                    If flag Then
                        array(num).STR_SOSHIKI_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_MEI")))
                    Else
                        array(num).STR_SOSHIKI_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_SOSHIKI_RYAKU_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                    Else
                        array(num).STR_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_KANA_MEI")))
                    If flag Then
                        array(num).STR_SOSHIKI_KANA_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_KANA_MEI")))
                    Else
                        array(num).STR_SOSHIKI_KANA_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAISHA_MEI")))
                    If flag Then
                        array(num).STR_KAISHA_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("KAISHA_MEI")))
                    Else
                        array(num).STR_KAISHA_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAISHA_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_KAISHA_RYAKU_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("KAISHA_RYAKU_MEI")))
                    Else
                        array(num).STR_KAISHA_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAISHA_KANA_MEI")))
                    If flag Then
                        array(num).STR_KAISHA_KANA_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("KAISHA_KANA_MEI")))
                    Else
                        array(num).STR_KAISHA_KANA_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_TELL")))
                    If flag Then
                        array(num).STR_SOSHIKI_TELL = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_TELL")))
                    Else
                        array(num).STR_SOSHIKI_TELL = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_FAX")))
                    If flag Then
                        array(num).STR_SOSHIKI_FAX = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_FAX")))
                    Else
                        array(num).STR_SOSHIKI_FAX = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_MAIL_ADS")))
                    If flag Then
                        array(num).STR_SOSHIKI_MAIL_ADS = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_MAIL_ADS")))
                    Else
                        array(num).STR_SOSHIKI_MAIL_ADS = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_YUBIN")))
                    If flag Then
                        array(num).STR_SOSHIKI_YUBIN = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_YUBIN")))
                    Else
                        array(num).STR_SOSHIKI_YUBIN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS1")))
                    If flag Then
                        array(num).STR_SOSHIKI_ADDRESS1 = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS1")))
                    Else
                        array(num).STR_SOSHIKI_ADDRESS1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS2")))
                    If flag Then
                        array(num).STR_SOSHIKI_ADDRESS2 = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS2")))
                    Else
                        array(num).STR_SOSHIKI_ADDRESS2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS3")))
                    If flag Then
                        array(num).STR_SOSHIKI_ADDRESS3 = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS3")))
                    Else
                        array(num).STR_SOSHIKI_ADDRESS3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_SOSHIKI_CD")))
                    If flag Then
                        array(num).STR_JYOBU_SOSHIKI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JYOBU_SOSHIKI_CD")))
                    Else
                        array(num).STR_JYOBU_SOSHIKI_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("AREA_CD")))
                    If flag Then
                        array(num).STR_AREA_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("AREA_CD")))
                    Else
                        array(num).STR_AREA_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UNYUKYOKU_KBN")))
                    If flag Then
                        array(num).STR_UNYUKYOKU_KBN = Strings.RTrim(Conversions.ToString(sqlDataReader("UNYUKYOKU_KBN")))
                    Else
                        array(num).STR_UNYUKYOKU_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SO_BOX_SU")))
                    If flag Then
                        array(num).DEC_SO_BOX_SU = Conversions.ToDecimal(Strings.RTrim(Conversions.ToString(sqlDataReader("SO_BOX_SU"))))
                    Else
                        array(num).DEC_SO_BOX_SU = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_1")))
                    If flag Then
                        array(num).STR_BANK_CD_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_CD_1")))
                    Else
                        array(num).STR_BANK_CD_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_1")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_CD_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_1")))
                    Else
                        array(num).STR_BANK_SHITEN_CD_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_1")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_MEI_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_1")))
                    Else
                        array(num).STR_BANK_SHITEN_MEI_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_1")))
                    If flag Then
                        array(num).STR_KOZA_KBN_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_KBN_1")))
                    Else
                        array(num).STR_KOZA_KBN_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_1")))
                    If flag Then
                        array(num).STR_KOZA_NO_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_NO_1")))
                    Else
                        array(num).STR_KOZA_NO_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_MEIGI_1")))
                    If flag Then
                        array(num).STR_KOZA_MEIGI_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_MEIGI_1")))
                    Else
                        array(num).STR_KOZA_MEIGI_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_2")))
                    If flag Then
                        array(num).STR_BANK_CD_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_CD_2")))
                    Else
                        array(num).STR_BANK_CD_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_2")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_CD_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_2")))
                    Else
                        array(num).STR_BANK_SHITEN_CD_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_2")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_MEI_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_2")))
                    Else
                        array(num).STR_BANK_SHITEN_MEI_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_2")))
                    If flag Then
                        array(num).STR_KOZA_KBN_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_KBN_2")))
                    Else
                        array(num).STR_KOZA_KBN_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_2")))
                    If flag Then
                        array(num).STR_KOZA_NO_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_NO_2")))
                    Else
                        array(num).STR_KOZA_NO_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_MEIGI_2")))
                    If flag Then
                        array(num).STR_KOZA_MEIGI_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_MEIGI_2")))
                    Else
                        array(num).STR_KOZA_MEIGI_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_3")))
                    If flag Then
                        array(num).STR_BANK_CD_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_CD_3")))
                    Else
                        array(num).STR_BANK_CD_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_3")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_CD_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_3")))
                    Else
                        array(num).STR_BANK_SHITEN_CD_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_3")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_MEI_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_3")))
                    Else
                        array(num).STR_BANK_SHITEN_MEI_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_3")))
                    If flag Then
                        array(num).STR_KOZA_KBN_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_KBN_3")))
                    Else
                        array(num).STR_KOZA_KBN_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_3")))
                    If flag Then
                        array(num).STR_KOZA_NO_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_NO_3")))
                    Else
                        array(num).STR_KOZA_NO_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_MEIGI_3")))
                    If flag Then
                        array(num).STR_KOZA_MEIGI_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_MEIGI_3")))
                    Else
                        array(num).STR_KOZA_MEIGI_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_4")))
                    If flag Then
                        array(num).STR_BANK_CD_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_CD_4")))
                    Else
                        array(num).STR_BANK_CD_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_4")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_CD_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_4")))
                    Else
                        array(num).STR_BANK_SHITEN_CD_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_4")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_MEI_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_4")))
                    Else
                        array(num).STR_BANK_SHITEN_MEI_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_4")))
                    If flag Then
                        array(num).STR_KOZA_KBN_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_KBN_4")))
                    Else
                        array(num).STR_KOZA_KBN_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_4")))
                    If flag Then
                        array(num).STR_KOZA_NO_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_NO_4")))
                    Else
                        array(num).STR_KOZA_NO_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_MEIGI_4")))
                    If flag Then
                        array(num).STR_KOZA_MEIGI_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_MEIGI_4")))
                    Else
                        array(num).STR_KOZA_MEIGI_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_5")))
                    If flag Then
                        array(num).STR_BANK_CD_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_CD_5")))
                    Else
                        array(num).STR_BANK_CD_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_5")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_CD_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_5")))
                    Else
                        array(num).STR_BANK_SHITEN_CD_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_5")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_MEI_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_5")))
                    Else
                        array(num).STR_BANK_SHITEN_MEI_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_5")))
                    If flag Then
                        array(num).STR_KOZA_KBN_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_KBN_5")))
                    Else
                        array(num).STR_KOZA_KBN_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_5")))
                    If flag Then
                        array(num).STR_KOZA_NO_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_NO_5")))
                    Else
                        array(num).STR_KOZA_NO_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_MEIGI_5")))
                    If flag Then
                        array(num).STR_KOZA_MEIGI_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_MEIGI_5")))
                    Else
                        array(num).STR_KOZA_MEIGI_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                    If flag Then
                        array(num).STR_UPDATE_DT = Strings.RTrim(Conversions.ToString(sqlDataReader("UPDATE_DT")))
                    Else
                        array(num).STR_UPDATE_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
                    If flag Then
                        array(num).STR_UPDATE_TNT_ID = Strings.RTrim(Conversions.ToString(sqlDataReader("UPDATE_TNT_ID")))
                    Else
                        array(num).STR_UPDATE_TNT_ID = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
                    If flag Then
                        array(num).STR_GAMEN_ID = Strings.RTrim(Conversions.ToString(sqlDataReader("GAMEN_ID")))
                    Else
                        array(num).STR_GAMEN_ID = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_JYOBU_MEI")))
                    If flag Then
                        array(num).STR_SOSHIKI_JYOBU_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_JYOBU_MEI")))
                    Else
                        array(num).STR_SOSHIKI_JYOBU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("AREA_MEI")))
                    If flag Then
                        array(num).STR_AREA_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("AREA_MEI")))
                    Else
                        array(num).STR_AREA_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NINKA_NO")))
                    If flag Then
                        array(num).STR_NINKA_NO = Strings.RTrim(Conversions.ToString(sqlDataReader("NINKA_NO")))
                    Else
                        array(num).STR_NINKA_NO = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_KANRI_RIRITU")))
                    If flag Then
                        array(num).DEC_KOKYAKU_KANRI_RIRITU = Conversions.ToDecimal(Strings.RTrim(Conversions.ToString(sqlDataReader("KOKYAKU_KANRI_RIRITU"))))
                    Else
                        array(num).DEC_KOKYAKU_KANRI_RIRITU = Conversions.ToDecimal("0")
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_131C As Exception
                ProjectData.SetProjectError(expr_131C)
                Dim ex As Exception = expr_131C
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSoshikiKoManageJoho(){

    /*
        Public Function GetSoshikiKoManageJoho(SoshikiCd As String, SoshikiName As String, SoshikiKanaName As String, KaishaName As String, ByRef MsgCd As String, FindFlg As Integer) As SoshikiList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SoshikiList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0033().ToString(), New Object()() { SoshikiCd, SoshikiName, SoshikiKanaName, KaishaName })
                Else
                    flag = (FindFlg = 2)
                    If flag Then
                        strSQL = String.Format(masterSQL.SMF0032().ToString(), New Object(0 - 1) {})
                    Else
                        strSQL = String.Format(masterSQL.SMF0034().ToString(), New Object(0 - 1) {})
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SoshikiList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SoshikiList(num + 1 - 1) {}), SoshikiList())
                    Dim soshikiList As SoshikiList = array(num)
                    array(num) = New SoshikiList()
                    array(num).STR_SOSHIKI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_CD")))
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_KBN")))
                    If flag Then
                        array(num).STR_SOSHIKI_KBN = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_KBN")))
                    Else
                        array(num).STR_SOSHIKI_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_MEI")))
                    If flag Then
                        array(num).STR_SOSHIKI_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_MEI")))
                    Else
                        array(num).STR_SOSHIKI_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_SOSHIKI_RYAKU_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                    Else
                        array(num).STR_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_KANA_MEI")))
                    If flag Then
                        array(num).STR_SOSHIKI_KANA_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_KANA_MEI")))
                    Else
                        array(num).STR_SOSHIKI_KANA_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAISHA_MEI")))
                    If flag Then
                        array(num).STR_KAISHA_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("KAISHA_MEI")))
                    Else
                        array(num).STR_KAISHA_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAISHA_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_KAISHA_RYAKU_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("KAISHA_RYAKU_MEI")))
                    Else
                        array(num).STR_KAISHA_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAISHA_KANA_MEI")))
                    If flag Then
                        array(num).STR_KAISHA_KANA_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("KAISHA_KANA_MEI")))
                    Else
                        array(num).STR_KAISHA_KANA_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_TELL")))
                    If flag Then
                        array(num).STR_SOSHIKI_TELL = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_TELL")))
                    Else
                        array(num).STR_SOSHIKI_TELL = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_FAX")))
                    If flag Then
                        array(num).STR_SOSHIKI_FAX = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_FAX")))
                    Else
                        array(num).STR_SOSHIKI_FAX = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_MAIL_ADS")))
                    If flag Then
                        array(num).STR_SOSHIKI_MAIL_ADS = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_MAIL_ADS")))
                    Else
                        array(num).STR_SOSHIKI_MAIL_ADS = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_YUBIN")))
                    If flag Then
                        array(num).STR_SOSHIKI_YUBIN = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_YUBIN")))
                    Else
                        array(num).STR_SOSHIKI_YUBIN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS1")))
                    If flag Then
                        array(num).STR_SOSHIKI_ADDRESS1 = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS1")))
                    Else
                        array(num).STR_SOSHIKI_ADDRESS1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS2")))
                    If flag Then
                        array(num).STR_SOSHIKI_ADDRESS2 = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS2")))
                    Else
                        array(num).STR_SOSHIKI_ADDRESS2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS3")))
                    If flag Then
                        array(num).STR_SOSHIKI_ADDRESS3 = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS3")))
                    Else
                        array(num).STR_SOSHIKI_ADDRESS3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_SOSHIKI_CD")))
                    If flag Then
                        array(num).STR_JYOBU_SOSHIKI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("JYOBU_SOSHIKI_CD")))
                    Else
                        array(num).STR_JYOBU_SOSHIKI_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("AREA_CD")))
                    If flag Then
                        array(num).STR_AREA_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("AREA_CD")))
                    Else
                        array(num).STR_AREA_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UNYUKYOKU_KBN")))
                    If flag Then
                        array(num).STR_UNYUKYOKU_KBN = Strings.RTrim(Conversions.ToString(sqlDataReader("UNYUKYOKU_KBN")))
                    Else
                        array(num).STR_UNYUKYOKU_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SO_BOX_SU")))
                    If flag Then
                        array(num).DEC_SO_BOX_SU = Conversions.ToDecimal(Strings.RTrim(Conversions.ToString(sqlDataReader("SO_BOX_SU"))))
                    Else
                        array(num).DEC_SO_BOX_SU = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_1")))
                    If flag Then
                        array(num).STR_BANK_CD_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_CD_1")))
                    Else
                        array(num).STR_BANK_CD_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_1")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_CD_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_1")))
                    Else
                        array(num).STR_BANK_SHITEN_CD_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_1")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_MEI_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_1")))
                    Else
                        array(num).STR_BANK_SHITEN_MEI_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_1")))
                    If flag Then
                        array(num).STR_KOZA_KBN_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_KBN_1")))
                    Else
                        array(num).STR_KOZA_KBN_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_1")))
                    If flag Then
                        array(num).STR_KOZA_NO_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_NO_1")))
                    Else
                        array(num).STR_KOZA_NO_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_MEIGI_1")))
                    If flag Then
                        array(num).STR_KOZA_MEIGI_1 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_MEIGI_1")))
                    Else
                        array(num).STR_KOZA_MEIGI_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_2")))
                    If flag Then
                        array(num).STR_BANK_CD_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_CD_2")))
                    Else
                        array(num).STR_BANK_CD_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_2")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_CD_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_2")))
                    Else
                        array(num).STR_BANK_SHITEN_CD_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_2")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_MEI_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_2")))
                    Else
                        array(num).STR_BANK_SHITEN_MEI_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_2")))
                    If flag Then
                        array(num).STR_KOZA_KBN_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_KBN_2")))
                    Else
                        array(num).STR_KOZA_KBN_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_2")))
                    If flag Then
                        array(num).STR_KOZA_NO_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_NO_2")))
                    Else
                        array(num).STR_KOZA_NO_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_MEIGI_2")))
                    If flag Then
                        array(num).STR_KOZA_MEIGI_2 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_MEIGI_2")))
                    Else
                        array(num).STR_KOZA_MEIGI_2 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_3")))
                    If flag Then
                        array(num).STR_BANK_CD_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_CD_3")))
                    Else
                        array(num).STR_BANK_CD_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_3")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_CD_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_3")))
                    Else
                        array(num).STR_BANK_SHITEN_CD_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_3")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_MEI_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_3")))
                    Else
                        array(num).STR_BANK_SHITEN_MEI_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_3")))
                    If flag Then
                        array(num).STR_KOZA_KBN_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_KBN_3")))
                    Else
                        array(num).STR_KOZA_KBN_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_3")))
                    If flag Then
                        array(num).STR_KOZA_NO_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_NO_3")))
                    Else
                        array(num).STR_KOZA_NO_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_MEIGI_3")))
                    If flag Then
                        array(num).STR_KOZA_MEIGI_3 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_MEIGI_3")))
                    Else
                        array(num).STR_KOZA_MEIGI_3 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_4")))
                    If flag Then
                        array(num).STR_BANK_CD_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_CD_4")))
                    Else
                        array(num).STR_BANK_CD_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_4")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_CD_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_4")))
                    Else
                        array(num).STR_BANK_SHITEN_CD_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_4")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_MEI_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_4")))
                    Else
                        array(num).STR_BANK_SHITEN_MEI_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_4")))
                    If flag Then
                        array(num).STR_KOZA_KBN_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_KBN_4")))
                    Else
                        array(num).STR_KOZA_KBN_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_4")))
                    If flag Then
                        array(num).STR_KOZA_NO_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_NO_4")))
                    Else
                        array(num).STR_KOZA_NO_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_MEIGI_4")))
                    If flag Then
                        array(num).STR_KOZA_MEIGI_4 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_MEIGI_4")))
                    Else
                        array(num).STR_KOZA_MEIGI_4 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_CD_5")))
                    If flag Then
                        array(num).STR_BANK_CD_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_CD_5")))
                    Else
                        array(num).STR_BANK_CD_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_CD_5")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_CD_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_CD_5")))
                    Else
                        array(num).STR_BANK_SHITEN_CD_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BANK_SHITEN_MEI_5")))
                    If flag Then
                        array(num).STR_BANK_SHITEN_MEI_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("BANK_SHITEN_MEI_5")))
                    Else
                        array(num).STR_BANK_SHITEN_MEI_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_KBN_5")))
                    If flag Then
                        array(num).STR_KOZA_KBN_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_KBN_5")))
                    Else
                        array(num).STR_KOZA_KBN_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_NO_5")))
                    If flag Then
                        array(num).STR_KOZA_NO_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_NO_5")))
                    Else
                        array(num).STR_KOZA_NO_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOZA_MEIGI_5")))
                    If flag Then
                        array(num).STR_KOZA_MEIGI_5 = Strings.RTrim(Conversions.ToString(sqlDataReader("KOZA_MEIGI_5")))
                    Else
                        array(num).STR_KOZA_MEIGI_5 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                    If flag Then
                        array(num).STR_UPDATE_DT = Strings.RTrim(Conversions.ToString(sqlDataReader("UPDATE_DT")))
                    Else
                        array(num).STR_UPDATE_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
                    If flag Then
                        array(num).STR_UPDATE_TNT_ID = Strings.RTrim(Conversions.ToString(sqlDataReader("UPDATE_TNT_ID")))
                    Else
                        array(num).STR_UPDATE_TNT_ID = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
                    If flag Then
                        array(num).STR_GAMEN_ID = Strings.RTrim(Conversions.ToString(sqlDataReader("GAMEN_ID")))
                    Else
                        array(num).STR_GAMEN_ID = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_JYOBU_MEI")))
                    If flag Then
                        array(num).STR_SOSHIKI_JYOBU_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_JYOBU_MEI")))
                    Else
                        array(num).STR_SOSHIKI_JYOBU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("AREA_MEI")))
                    If flag Then
                        array(num).STR_AREA_MEI = Strings.RTrim(Conversions.ToString(sqlDataReader("AREA_MEI")))
                    Else
                        array(num).STR_AREA_MEI = ""
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_1229 As Exception
                ProjectData.SetProjectError(expr_1229)
                Dim ex As Exception = expr_1229
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSoshikiKbnJoho(){

    /*
        Public Function GetSoshikiKbnJoho(SoshikiKbn As String, ByRef MsgCd As String) As SoshikiList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SoshikiList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SMF0035().ToString(), SoshikiKbn)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SoshikiList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SoshikiList(num + 1 - 1) {}), SoshikiList())
                    Dim soshikiList As SoshikiList = array(num)
                    array(num) = New SoshikiList()
                    array(num).STR_SOSHIKI_CD = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_CD")))
                    array(num).STR_SOSHIKI_KBN = Strings.RTrim(Conversions.ToString(sqlDataReader("SOSHIKI_KBN")))
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_D0 As Exception
                ProjectData.SetProjectError(expr_D0)
                Dim ex As Exception = expr_D0
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