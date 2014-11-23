<?php
class SeisanSonotaHiyouAllMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanSonotaHiyouAllManageJoho(){

    /*
        Public Function GetSeisanSonotaHiyouAllManageJoho(SeikyuYm As String, MotoSoshikiCd As String, SakiSoshikiCd As String, SeikyuSiharaiCd As String, HiyokomokuCd As String, ByRef MsgCd As String, FindFlg As Integer) As SeisanSonotaHiyouList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanSonotaHiyouList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SEF0222().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, SakiSoshikiCd, SeikyuSiharaiCd, HiyokomokuCd })
                Else
                    strSQL = String.Format(masterSQL.SEF0223().ToString(), New Object(0 - 1) {})
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanSonotaHiyouList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanSonotaHiyouList(num + 1 - 1) {}), SeisanSonotaHiyouList())
                    Dim seisanSonotaHiyouList As SeisanSonotaHiyouList = array(num)
                    array(num) = New SeisanSonotaHiyouList()
                    array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                    array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                    array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                    array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                    array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HASEI_DT")))
                    If flag Then
                        array(num).STR_HASEI_DT = Conversions.ToString(sqlDataReader("HASEI_DT"))
                    Else
                        array(num).STR_HASEI_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_GK")))
                    If flag Then
                        array(num).DEC_HIYOKOMOKU_GK = Conversions.ToString(sqlDataReader("HIYOKOMOKU_GK"))
                    Else
                        array(num).DEC_HIYOKOMOKU_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                    If flag Then
                        array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                    Else
                        array(num).STR_SHOHIZEI_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_RT")))
                    If flag Then
                        array(num).DEC_SHOHIZEI_RT = Conversions.ToString(sqlDataReader("SHOHIZEI_RT"))
                    Else
                        array(num).DEC_SHOHIZEI_RT = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_GK")))
                    If flag Then
                        array(num).DEC_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SHOHIZEI_GK"))
                    Else
                        array(num).DEC_SHOHIZEI_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_RT")))
                    If flag Then
                        array(num).DEC_TESURYO_RT = Conversions.ToString(sqlDataReader("TESURYO_RT"))
                    Else
                        array(num).DEC_TESURYO_RT = "0"
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
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_SHOHIZEI_GK")))
                    If flag Then
                        array(num).DEC_TESURYO_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("TESURYO_SHOHIZEI_GK"))
                    Else
                        array(num).DEC_TESURYO_SHOHIZEI_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_GK")))
                    If flag Then
                        array(num).DEC_TESURYO_GK = Conversions.ToString(sqlDataReader("TESURYO_GK"))
                    Else
                        array(num).DEC_TESURYO_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MEISAI_HIYO_GK")))
                    If flag Then
                        array(num).DEC_MEISAI_HIYO_GK = Conversions.ToString(sqlDataReader("MEISAI_HIYO_GK"))
                    Else
                        array(num).DEC_MEISAI_HIYO_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MEISAI_SHOHIZEI_GK")))
                    If flag Then
                        array(num).DEC_MEISAI_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("MEISAI_SHOHIZEI_GK"))
                    Else
                        array(num).DEC_MEISAI_SHOHIZEI_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MEISAI_TOTAL_GK")))
                    If flag Then
                        array(num).DEC_MEISAI_TOTAL_GK = Conversions.ToString(sqlDataReader("MEISAI_TOTAL_GK"))
                    Else
                        array(num).DEC_MEISAI_TOTAL_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MEISAI_TESURYO_GK")))
                    If flag Then
                        array(num).DEC_MEISAI_TESURYO_GK = Conversions.ToString(sqlDataReader("MEISAI_TESURYO_GK"))
                    Else
                        array(num).DEC_MEISAI_TESURYO_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GOKEI_GK")))
                    If flag Then
                        array(num).DEC_SEIKYU_GOKEI_GK = Conversions.ToString(sqlDataReader("SEIKYU_GOKEI_GK"))
                    Else
                        array(num).DEC_SEIKYU_GOKEI_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                    If flag Then
                        array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                    Else
                        array(num).STR_BIKO = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_TRI_MEI")))
                    If flag Then
                        array(num).STR_SYOSAI_TRI_MEI = Conversions.ToString(sqlDataReader("SYOSAI_TRI_MEI"))
                    Else
                        array(num).STR_SYOSAI_TRI_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_BIKO")))
                    If flag Then
                        array(num).STR_SYOSAI_BIKO = Conversions.ToString(sqlDataReader("SYOSAI_BIKO"))
                    Else
                        array(num).STR_SYOSAI_BIKO = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_KEIYU_GK")))
                    If flag Then
                        array(num).DEC_SYOSAI_KEIYU_GK = Conversions.ToString(sqlDataReader("SYOSAI_KEIYU_GK"))
                    Else
                        array(num).DEC_SYOSAI_KEIYU_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_HIKITORIZEI_GK")))
                    If flag Then
                        array(num).DEC_SYOSAI_HIKITORIZEI_GK = Conversions.ToString(sqlDataReader("SYOSAI_HIKITORIZEI_GK"))
                    Else
                        array(num).DEC_SYOSAI_HIKITORIZEI_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_SONOTA_GK")))
                    If flag Then
                        array(num).DEC_SYOSAI_SONOTA_GK = Conversions.ToString(sqlDataReader("SYOSAI_SONOTA_GK"))
                    Else
                        array(num).DEC_SYOSAI_SONOTA_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_SYOHIZEI_GK")))
                    If flag Then
                        array(num).DEC_SYOSAI_SYOHIZEI_GK = Conversions.ToString(sqlDataReader("SYOSAI_SYOHIZEI_GK"))
                    Else
                        array(num).DEC_SYOSAI_SYOHIZEI_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_GOKEI_GK")))
                    If flag Then
                        array(num).DEC_SYOSAI_GOKEI_GK = Conversions.ToString(sqlDataReader("SYOSAI_GOKEI_GK"))
                    Else
                        array(num).DEC_SYOSAI_GOKEI_GK = "0"
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
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).STR_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_MEI")))
                    If flag Then
                        array(num).STR_HYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                    Else
                        array(num).STR_HYOKOMOKU_MEI = ""
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_9D7 As Exception
                ProjectData.SetProjectError(expr_9D7)
                Dim ex As Exception = expr_9D7
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