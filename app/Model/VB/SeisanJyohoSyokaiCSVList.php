<?php
class SeisanJyohoSyokaiCSVList extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getCSVSeisanSyokaiJyoho(){

    /*
        Public Function GetCSVSeisanSyokaiJyoho(objEntity As Object(), ByRef MsgCd As String, FindFlg As String, Optional count As String="0") As SeisanJyohoCsvList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanJyohoCsvList()
            Try
                Dim seisanJyohoCsvList As SeisanJyohoCsvList = New SeisanJyohoCsvList()
                Dim flag As Boolean = Operators.CompareString(FindFlg, Conversions.ToString(0), False) = 0
                Dim flag2 As Boolean
                Dim strSQL As String
                If flag Then
                    Dim left As Object = objEntity(3)
                    flag2 = Operators.ConditionalCompareObjectEqual(left, 0, False)
                    Dim text As String
                    Dim text2 As String
                    If flag2 Then
                        text = ""
                        text2 = ""
                    Else
                        flag2 = Operators.ConditionalCompareObjectEqual(left, 1, False)
                        If flag2 Then
                            text = "2"
                            text2 = "4"
                        Else
                            flag2 = Operators.ConditionalCompareObjectEqual(left, 2, False)
                            If flag2 Then
                                text = "3"
                                text2 = "3"
                            Else
                                text = "1"
                                text2 = "1"
                            End If
                        End If
                    End If
                    strSQL = String.Format(masterSQL.SEF0910().ToString(), New Object()() { RuntimeHelpers.GetObjectValue(objEntity(0)), RuntimeHelpers.GetObjectValue(objEntity(1)), RuntimeHelpers.GetObjectValue(objEntity(2)), text, text2 })
                Else
                    flag2 = (Operators.CompareString(FindFlg, Conversions.ToString(1), False) = 0)
                    If flag2 Then
                        Dim text As String = ""
                        Dim text2 As String = ""
                        strSQL = String.Format(masterSQL.SEF0910().ToString(), New Object()() { RuntimeHelpers.GetObjectValue(objEntity(0)), RuntimeHelpers.GetObjectValue(objEntity(1)), "", text, text2 })
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                flag2 = (Operators.CompareString(count, "1", False) = 0)
                Dim array As SeisanJyohoCsvList()
                If flag2 Then
                    flag = (Operators.CompareString(MsgCd, "SE0001", False) = 0)
                    If flag Then
                        result = array
                        Return result
                    End If
                End If
                Dim num As Integer = 0
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanJyohoCsvList(num + 1 - 1) {}), SeisanJyohoCsvList())
                    Dim seisanJyohoCsvList2 As SeisanJyohoCsvList = array(num)
                    array(num) = New SeisanJyohoCsvList()
                    array(num).STR_SEQ_NO = Conversions.ToString(sqlDataReader("SEQ_NO"))
                    array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                    array(num).STR_HASEI_DT = Conversions.ToString(sqlDataReader("HASEI_DT"))
                    array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                    array(num).STR_MOTO_SOSHIKI_MEI = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_MEI"))
                    array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                    array(num).STR_SAKI_SOSHIKI_MEI = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_MEI"))
                    array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                    array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                    array(num).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                    array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                    array(num).STR_TESURYO_RT = Conversions.ToString(sqlDataReader("TESURYO_RT"))
                    array(num).STR_TESURYO_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("TESURYO_SHOHIZEI_KBN"))
                    array(num).STR_SAKI_SEIKYU_CD = Conversions.ToString(sqlDataReader("SAKI_SEIKYU_CD"))
                    array(num).STR_SAKI_SEIKYU_MEI = Conversions.ToString(sqlDataReader("SAKI_SEIKYU_MEI"))
                    array(num).STR_HIYO_GK = Conversions.ToString(sqlDataReader("HIYO_GK"))
                    array(num).STR_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SHOHIZEI_GK"))
                    array(num).STR_GOUKEI = Conversions.ToString(sqlDataReader("GOUKEI"))
                    array(num).STR_TESURYO_GK = Conversions.ToString(sqlDataReader("TESURYO_GK"))
                    array(num).STR_SEIKYU_GOKEI_GK = Conversions.ToString(sqlDataReader("SEIKYU_GOKEI_GK"))
                    array(num).STR_SHIHARAI_GOKEI_GK = Conversions.ToString(sqlDataReader("SHIHARAI_GOKEI_GK"))
                    array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                    array(num).STR_MEISAI_KBN = Conversions.ToString(sqlDataReader("MEISAI_KBN"))
                    array(num).STR_KANRI_NO = Conversions.ToString(sqlDataReader("KANRI_NO"))
                    array(num).STR_SAKI_AITEKAISYA_MEI = Conversions.ToString(sqlDataReader("SAKI_AITEKAISYA_MEI"))
                    array(num).STR_SYOSAI_GK = Conversions.ToString(sqlDataReader("SYOSAI_GK"))
                    array(num).STR_ZAN_SU = Conversions.ToString(sqlDataReader("ZAN_SU"))
                    array(num).STR_KEIYU_GK = Conversions.ToString(sqlDataReader("KEIYU_GK"))
                    array(num).STR_HIKITORIZEI_GK = Conversions.ToString(sqlDataReader("HIKITORIZEI_GK"))
                    array(num).STR_SONOTA_GK = Conversions.ToString(sqlDataReader("SONOTA_GK"))
                    array(num).STR_HIYO_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("HIYO_SHOHIZEI_GK"))
                    array(num).STR_HIYO_GOKEI_GK = Conversions.ToString(sqlDataReader("HIYO_GOKEI_GK"))
                    array(num).STR_JUCHU_DT = Conversions.ToString(sqlDataReader("JUCHU_DT"))
                    array(num).STR_JUCHU_SAKI_SEIKYU_CD = Conversions.ToString(sqlDataReader("JUCHU_SAKI_SEIKYU_CD"))
                    array(num).STR_JUCHU_SAKI_SEIKYU_MEI = Conversions.ToString(sqlDataReader("JUCHU_SAKI_SEIKYU_MEI"))
                    array(num).STR_JUCHU_MOTO_SEIKYU_MEI = Conversions.ToString(sqlDataReader("JUCHU_MOTO_SEIKYU_MEI"))
                    array(num).STR_JUCHU_SEIKYU_GK = Conversions.ToString(sqlDataReader("JUCHU_SEIKYU_GK"))
                    array(num).STR_HASEI_DT = Conversions.ToString(sqlDataReader("HASEI_DT"))
                    array(num).STR_HACHU_SAKI_SEIKYU_CD = Conversions.ToString(sqlDataReader("HACHU_SAKI_SEIKYU_CD"))
                    array(num).STR_HACHU_SAKI_SEIKYU_MEI = Conversions.ToString(sqlDataReader("HACHU_SAKI_SEIKYU_MEI"))
                    array(num).STR_HACHU_SHOHIN_CD = Conversions.ToString(sqlDataReader("HACHU_SHOHIN_CD"))
                    array(num).STR_HACHU_SHOHIN_MEI = Conversions.ToString(sqlDataReader("HACHU_SHOHIN_MEI"))
                    array(num).STR_HACHU_SURYO = Conversions.ToString(sqlDataReader("HACHU_SURYO"))
                    array(num).STR_HACHU_TANKA_GK = Conversions.ToString(sqlDataReader("HACHU_TANKA_GK"))
                    array(num).STR_HACHU_NEBIKI_GK = Conversions.ToString(sqlDataReader("HACHU_NEBIKI_GK"))
                    array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                    array(num).STR_UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
                    array(num).STR_SEIKYU_GK_KBN = Conversions.ToString(sqlDataReader("SEIKYU_GK_KBN"))
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_732 As Exception
                ProjectData.SetProjectError(expr_732)
                Dim ex As Exception = expr_732
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