<?php
class SeisanCrtTesuryoMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanCrtTesuryoManageJoho(){

    /*
        Public Function GetSeisanCrtTesuryoManageJoho(SeikyuYm As String, MotoSoshikiCd As String, CreditcardCd As String, SakiSoshikiCd As String, UketsukeNo As String, Kokyakumei As String, StrSeikyuSiharaiCd As String, ByRef MsgCd As String, FindFlg As Integer) As SeisanCrtTesuryoList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As SeisanCrtTesuryoList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SEF0621().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, CreditcardCd, SakiSoshikiCd, UketsukeNo, Kokyakumei, StrSeikyuSiharaiCd })
                Else
                    flag = (FindFlg = 2)
                    If flag Then
                        strSQL = String.Format(masterSQL.SEF0622().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, CreditcardCd, SakiSoshikiCd, UketsukeNo, Kokyakumei, StrSeikyuSiharaiCd })
                    Else
                        strSQL = String.Format(masterSQL.SEF0620().ToString(), SeikyuYm, MotoSoshikiCd, StrSeikyuSiharaiCd)
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanCrtTesuryoList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanCrtTesuryoList(num + 1 - 1) {}), SeisanCrtTesuryoList())
                    Dim seisanCrtTesuryoList As SeisanCrtTesuryoList = array(num)
                    array(num) = New SeisanCrtTesuryoList()
                    array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                    array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                    array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                    array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                    array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                    array(num).STR_UKETSUKE_NO = Conversions.ToString(sqlDataReader("UKETSUKE_NO"))
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HASEI_DT")))
                    If flag Then
                        array(num).STR_HASEI_DT = Conversions.ToString(sqlDataReader("HASEI_DT"))
                    Else
                        array(num).STR_HASEI_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDITCARD_CD")))
                    If flag Then
                        array(num).STR_CREDITCARD_CD = Conversions.ToString(sqlDataReader("CREDITCARD_CD"))
                    Else
                        array(num).STR_CREDITCARD_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDIT_SHIHARAI_SU")))
                    If flag Then
                        array(num).INT_CREDIT_SHIHARAI_SU = Conversions.ToInteger(sqlDataReader("CREDIT_SHIHARAI_SU"))
                    Else
                        array(num).INT_CREDIT_SHIHARAI_SU = Conversions.ToInteger("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOKA_TESURYO_RT")))
                    If flag Then
                        array(num).DEC_HOKA_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("HOKA_TESURYO_RT"))
                    Else
                        array(num).DEC_HOKA_TESURYO_RT = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_RT")))
                    If flag Then
                        array(num).DEC_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("TESURYO_RT"))
                    Else
                        array(num).DEC_TESURYO_RT = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_KEISAN_KBN")))
                    If flag Then
                        array(num).STR_TESURYO_KEISAN_KBN = Conversions.ToString(sqlDataReader("TESURYO_KEISAN_KBN"))
                    Else
                        array(num).STR_TESURYO_KEISAN_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_SHOHIZEI_KBN")))
                    If flag Then
                        array(num).STR_TESURYO_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("TESURYO_SHOHIZEI_KBN"))
                    Else
                        array(num).STR_TESURYO_SHOHIZEI_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_SHOHIZEI_RT")))
                    If flag Then
                        array(num).DEC_TESURYO_SHOHIZEI_RT = Conversions.ToDecimal(sqlDataReader("TESURYO_SHOHIZEI_RT"))
                    Else
                        array(num).DEC_TESURYO_SHOHIZEI_RT = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYO_SOSHIKI_CD")))
                    If flag Then
                        array(num).STR_SAGYO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAGYO_SOSHIKI_CD"))
                    Else
                        array(num).STR_SAGYO_SOSHIKI_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKUMEI")))
                    If flag Then
                        array(num).STR_KOKYAKUMEI = Conversions.ToString(sqlDataReader("KOKYAKUMEI"))
                    Else
                        array(num).STR_KOKYAKUMEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_KBN")))
                    If flag Then
                        array(num).STR_KOKYAKU_SEIKYU_KBN = Conversions.ToString(sqlDataReader("KOKYAKU_SEIKYU_KBN"))
                    Else
                        array(num).STR_KOKYAKU_SEIKYU_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KESSAI_KBN")))
                    If flag Then
                        array(num).STR_KESSAI_KBN = Conversions.ToString(sqlDataReader("KESSAI_KBN"))
                    Else
                        array(num).STR_KESSAI_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_DT")))
                    If flag Then
                        array(num).STR_KOKYAKU_SEIKYU_DT = Conversions.ToString(sqlDataReader("KOKYAKU_SEIKYU_DT"))
                    Else
                        array(num).STR_KOKYAKU_SEIKYU_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_GK")))
                    If flag Then
                        array(num).DEC_KOKYAKU_SEIKYU_GK = Conversions.ToDecimal(sqlDataReader("KOKYAKU_SEIKYU_GK"))
                    Else
                        array(num).DEC_KOKYAKU_SEIKYU_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SHOHIZEI_RT")))
                    If flag Then
                        array(num).DEC_KOKYAKU_SHOHIZEI_RT = Conversions.ToDecimal(sqlDataReader("KOKYAKU_SHOHIZEI_RT"))
                    Else
                        array(num).DEC_KOKYAKU_SHOHIZEI_RT = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SHOHIZEI_GK")))
                    If flag Then
                        array(num).DEC_KOKYAKU_SHOHIZEI_GK = Conversions.ToDecimal(sqlDataReader("KOKYAKU_SHOHIZEI_GK"))
                    Else
                        array(num).DEC_KOKYAKU_SHOHIZEI_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_KEI")))
                    If flag Then
                        array(num).DEC_KOKYAKU_SEIKYU_KEI = Conversions.ToDecimal(sqlDataReader("KOKYAKU_SEIKYU_KEI"))
                    Else
                        array(num).DEC_KOKYAKU_SEIKYU_KEI = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_DT")))
                    If flag Then
                        array(num).STR_SEISAN_DT = Conversions.ToString(sqlDataReader("SEISAN_DT"))
                    Else
                        array(num).STR_SEISAN_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("OROSHI_DT")))
                    If flag Then
                        array(num).STR_OROSHI_DT = Conversions.ToString(sqlDataReader("OROSHI_DT"))
                    Else
                        array(num).STR_OROSHI_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_UPDATE_DT")))
                    If flag Then
                        array(num).STR_JUCHU_UPDATE_DT = Conversions.ToString(sqlDataReader("JUCHU_UPDATE_DT"))
                    Else
                        array(num).STR_JUCHU_UPDATE_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_TNT_CD")))
                    If flag Then
                        array(num).STR_JUCHU_TNT_CD = Conversions.ToString(sqlDataReader("JUCHU_TNT_CD"))
                    Else
                        array(num).STR_JUCHU_TNT_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_CRT_SEIKYU_GK")))
                    If flag Then
                        array(num).DEC_SEISAN_CRT_SEIKYU_GK = Conversions.ToDecimal(sqlDataReader("SEISAN_CRT_SEIKYU_GK"))
                    Else
                        array(num).DEC_SEISAN_CRT_SEIKYU_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_HOKA_TESU_GK")))
                    If flag Then
                        array(num).DEC_SEISAN_HOKA_TESU_GK = Conversions.ToDecimal(sqlDataReader("SEISAN_HOKA_TESU_GK"))
                    Else
                        array(num).DEC_SEISAN_HOKA_TESU_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_TESU_GK")))
                    If flag Then
                        array(num).DEC_SEISAN_TESU_GK = Conversions.ToDecimal(sqlDataReader("SEISAN_TESU_GK"))
                    Else
                        array(num).DEC_SEISAN_TESU_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GOKEI_GK")))
                    If flag Then
                        array(num).DEC_SEIKYU_GOKEI_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_GOKEI_GK"))
                    Else
                        array(num).DEC_SEIKYU_GOKEI_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                    If flag Then
                        array(num).STR_BIKO = Strings.RTrim(Conversions.ToString(sqlDataReader("BIKO")))
                    Else
                        array(num).STR_BIKO = ""
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
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_MOTO_SOSHIKI_MEI = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).STR_MOTO_SOSHIKI_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_KBN")))
                    If flag Then
                        array(num).STR_SOSHIKI_KBN = Conversions.ToString(sqlDataReader("SOSHIKI_KBN"))
                    Else
                        array(num).STR_SOSHIKI_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_SAKI_SOSHIKI_MEI = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).STR_SAKI_SOSHIKI_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYO_SOSHIKI_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_SAGYO_SOSHIKI_MEI = Conversions.ToString(sqlDataReader("SAGYO_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).STR_SAGYO_SOSHIKI_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CARD_CREDITCARD_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_CREDITCARD_MEI = Conversions.ToString(sqlDataReader("CARD_CREDITCARD_RYAKU_MEI"))
                    Else
                        array(num).STR_CREDITCARD_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_MEI")))
                    If flag Then
                        array(num).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                    Else
                        array(num).STR_HIYOKOMOKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CRT_KOKYAKU_SEIKYU_GK")))
                    If flag Then
                        array(num).DEC_CRT_KOKYAKU_SEIKYU_GK = Conversions.ToString(sqlDataReader("CRT_KOKYAKU_SEIKYU_GK"))
                    Else
                        array(num).DEC_CRT_KOKYAKU_SEIKYU_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CRT_HIYOKOMOKU_CD")))
                    If flag Then
                        array(num).STR_CRT_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("CRT_HIYOKOMOKU_CD"))
                    Else
                        array(num).STR_CRT_HIYOKOMOKU_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CRT_HIYOKOMOKU_CD")))
                    If flag Then
                        array(num).STR_SYONIN_NO = Conversions.ToString(sqlDataReader("SYONIN_NO"))
                    Else
                        array(num).STR_SYONIN_NO = ""
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_D98 As Exception
                ProjectData.SetProjectError(expr_D98)
                Dim ex As Exception = expr_D98
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