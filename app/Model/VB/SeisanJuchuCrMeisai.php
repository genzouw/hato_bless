<?php
class SeisanJuchuCrMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanJuchuCrManageJoho(){

    /*
        Public Function GetSeisanJuchuCrManageJoho(SeikyuYm As String, MotoSoshikiCd As String, CreditcardCd As String, SakiSoshikiCd As String, UketsukeNo As String, Kokyakumei As String, JyutyuCrtJyotai As String, ByRef MsgCd As String, FindFlg As Integer) As SeisanJuchuCrList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanJuchuCrList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(JyutyuCrtJyotai, "0", False) = 0
                    If flag2 Then
                        strSQL = String.Format(masterSQL.SEF0611().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, CreditcardCd, SakiSoshikiCd, UketsukeNo, Kokyakumei })
                    Else
                        flag2 = (Operators.CompareString(JyutyuCrtJyotai, "1", False) = 0)
                        If flag2 Then
                            strSQL = String.Format(masterSQL.SEF0611().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, CreditcardCd, SakiSoshikiCd, UketsukeNo, Kokyakumei })
                        Else
                            flag2 = (Operators.CompareString(JyutyuCrtJyotai, "2", False) = 0)
                            If flag2 Then
                                strSQL = String.Format(masterSQL.SEF0613().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, CreditcardCd, SakiSoshikiCd, UketsukeNo, Kokyakumei })
                            Else
                                flag2 = (Operators.CompareString(JyutyuCrtJyotai, "3", False) = 0)
                                If flag2 Then
                                    strSQL = String.Format(masterSQL.SEF0612().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, CreditcardCd, SakiSoshikiCd, UketsukeNo, Kokyakumei })
                                End If
                            End If
                        End If
                    End If
                Else
                    strSQL = String.Format(masterSQL.SEF0610().ToString(), SeikyuYm, MotoSoshikiCd)
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanJuchuCrList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanJuchuCrList(num + 1 - 1) {}), SeisanJuchuCrList())
                    Dim seisanJuchuCrList As SeisanJuchuCrList = array(num)
                    array(num) = New SeisanJuchuCrList()
                    array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                    array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                    array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                    array(num).STR_UKETSUKE_NO = Conversions.ToString(sqlDataReader("UKETSUKE_NO"))
                    array(num).STR_CENTER_CD = Conversions.ToString(sqlDataReader("CENTER_CD"))
                    Dim flag2 As Boolean = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETSUKE_DT")))
                    If flag2 Then
                        array(num).STR_UKETSUKE_DT = Conversions.ToString(sqlDataReader("UKETSUKE_DT"))
                    Else
                        array(num).STR_UKETSUKE_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKUMEI")))
                    If flag2 Then
                        array(num).STR_KOKYAKUMEI = Conversions.ToString(sqlDataReader("KOKYAKUMEI"))
                    Else
                        array(num).STR_KOKYAKUMEI = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_KBN")))
                    If flag2 Then
                        array(num).STR_KOKYAKU_SEIKYU_KBN = Conversions.ToString(sqlDataReader("KOKYAKU_SEIKYU_KBN"))
                    Else
                        array(num).STR_KOKYAKU_SEIKYU_KBN = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KESSAI_KBN")))
                    If flag2 Then
                        array(num).STR_KESSAI_KBN = Conversions.ToString(sqlDataReader("KESSAI_KBN"))
                    Else
                        array(num).STR_KESSAI_KBN = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDITCARD_CD")))
                    If flag2 Then
                        array(num).STR_CREDITCARD_CD = Conversions.ToString(sqlDataReader("CREDITCARD_CD"))
                    Else
                        array(num).STR_CREDITCARD_CD = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDIT_SHIHARAI_SU")))
                    If flag2 Then
                        array(num).INT_CREDIT_SHIHARAI_SU = Conversions.ToInteger(sqlDataReader("CREDIT_SHIHARAI_SU"))
                    Else
                        array(num).INT_CREDIT_SHIHARAI_SU = Conversions.ToInteger("")
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_DT")))
                    If flag2 Then
                        array(num).STR_KOKYAKU_SEIKYU_DT = Conversions.ToString(sqlDataReader("KOKYAKU_SEIKYU_DT"))
                    Else
                        array(num).STR_KOKYAKU_SEIKYU_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_GK")))
                    If flag2 Then
                        array(num).DEC_KOKYAKU_SEIKYU_GK = Conversions.ToDecimal(sqlDataReader("KOKYAKU_SEIKYU_GK"))
                    Else
                        array(num).DEC_KOKYAKU_SEIKYU_GK = Conversions.ToDecimal("0")
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_UTIZEI_GK")))
                    If flag2 Then
                        array(num).DEC_KOKYAKU_SEIKYU_UTIZEI_GK = Conversions.ToDecimal(sqlDataReader("KOKYAKU_SEIKYU_UTIZEI_GK"))
                    Else
                        array(num).DEC_KOKYAKU_SEIKYU_UTIZEI_GK = Conversions.ToDecimal("0")
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_TATEKAE_GK")))
                    If flag2 Then
                        array(num).DEC_KOKYAKU_TATEKAE_GK = Conversions.ToDecimal(sqlDataReader("KOKYAKU_TATEKAE_GK"))
                    Else
                        array(num).DEC_KOKYAKU_TATEKAE_GK = Conversions.ToDecimal("0")
                    End If
                    array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SHOHIZEI_RT")))
                    If flag2 Then
                        array(num).DEC_KOKYAKU_SHOHIZEI_RT = Conversions.ToDecimal(sqlDataReader("KOKYAKU_SHOHIZEI_RT"))
                    Else
                        array(num).DEC_KOKYAKU_SHOHIZEI_RT = Conversions.ToDecimal("")
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SHOHIZEI_GK")))
                    If flag2 Then
                        array(num).DEC_KOKYAKU_SHOHIZEI_GK = Conversions.ToDecimal(sqlDataReader("KOKYAKU_SHOHIZEI_GK"))
                    Else
                        array(num).DEC_KOKYAKU_SHOHIZEI_GK = Conversions.ToDecimal("")
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_KEI")))
                    If flag2 Then
                        array(num).DEC_KOKYAKU_SEIKYU_KEI = Conversions.ToDecimal(sqlDataReader("KOKYAKU_SEIKYU_KEI"))
                    Else
                        array(num).DEC_KOKYAKU_SEIKYU_KEI = Conversions.ToDecimal("")
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_DT")))
                    If flag2 Then
                        array(num).STR_SEISAN_DT = Conversions.ToString(sqlDataReader("SEISAN_DT"))
                    Else
                        array(num).STR_SEISAN_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("OROSHI_DT")))
                    If flag2 Then
                        array(num).STR_OROSHI_DT = Conversions.ToString(sqlDataReader("OROSHI_DT"))
                    Else
                        array(num).STR_OROSHI_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_UPDATE_DT")))
                    If flag2 Then
                        array(num).STR_JUCHU_UPDATE_DT = Conversions.ToString(sqlDataReader("JUCHU_UPDATE_DT"))
                    Else
                        array(num).STR_JUCHU_UPDATE_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_TNT_CD")))
                    If flag2 Then
                        array(num).STR_JUCHU_TNT_CD = Conversions.ToString(sqlDataReader("JUCHU_TNT_CD"))
                    Else
                        array(num).STR_JUCHU_TNT_CD = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                    If flag2 Then
                        array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                    Else
                        array(num).STR_UPDATE_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
                    If flag2 Then
                        array(num).STR_UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
                    Else
                        array(num).STR_UPDATE_TNT_ID = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
                    If flag2 Then
                        array(num).STR_GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
                    Else
                        array(num).STR_GAMEN_ID = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI")))
                    If flag2 Then
                        array(num).STR_MOTO_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).STR_MOTO_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYO_SOSHIKI_RYAKU_MEI")))
                    If flag2 Then
                        array(num).STR_SAGYO_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SAGYO_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).STR_SAGYO_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CARD_CREDITCARD_RYAKU_MEI")))
                    If flag2 Then
                        array(num).STR_CARD_CREDITCARD_RYAKU_MEI = Conversions.ToString(sqlDataReader("CARD_CREDITCARD_RYAKU_MEI"))
                    Else
                        array(num).STR_CARD_CREDITCARD_RYAKU_MEI = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CARD_CREDIT_SHIHARAI_SU")))
                    If flag2 Then
                        array(num).DEC_CREDIT_SHIHARAI_SU = Conversions.ToString(sqlDataReader("CARD_CREDIT_SHIHARAI_SU"))
                    Else
                        array(num).DEC_CREDIT_SHIHARAI_SU = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CARD_CREDIT_TESURYO_RT")))
                    If flag2 Then
                        array(num).DEC_CREDIT_TESURYO_RT = Conversions.ToString(sqlDataReader("CARD_CREDIT_TESURYO_RT"))
                    Else
                        array(num).DEC_CREDIT_TESURYO_RT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("RENGOKAI_TESURYO_RT")))
                    If flag2 Then
                        array(num).DEC_RENGOKAI_TESURYO_RT = Conversions.ToString(sqlDataReader("RENGOKAI_TESURYO_RT"))
                    Else
                        array(num).DEC_RENGOKAI_TESURYO_RT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CRT_KOKYAKU_SEIKYU_GK")))
                    If flag2 Then
                        array(num).DEC_CRT_KOKYAKU_SEIKYU_GK = Conversions.ToString(sqlDataReader("CRT_KOKYAKU_SEIKYU_GK"))
                    Else
                        array(num).DEC_CRT_KOKYAKU_SEIKYU_GK = "0"
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CRT_HIYOKOMOKU_CD")))
                    If flag2 Then
                        array(num).STR_CRT_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("CRT_HIYOKOMOKU_CD"))
                    Else
                        array(num).STR_CRT_HIYOKOMOKU_CD = ""
                    End If
                    array(num).STR_JYOTAI = "0"
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYONIN_NO")))
                    If flag2 Then
                        array(num).STR_SYONIN_NO = Conversions.ToString(sqlDataReader("SYONIN_NO"))
                    Else
                        array(num).STR_SYONIN_NO = ""
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_BAF As Exception
                ProjectData.SetProjectError(expr_BAF)
                Dim ex As Exception = expr_BAF
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