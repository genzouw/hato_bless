<?php
class SeisanJyouhouHiyouIchiranList extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanJyouhouHiyoIchiranJoho(){

    /*
        Public Function GetSeisanJyouhouHiyoIchiranJoho(SeikyuYM As String, MotoSoshikiCode As String, SakiSoshikiCode As String, SeikyuShiharaiCode As String, HiyoKomokuCode As String, ByRef MsgCd As String) As SeisanJyohoHiyouIchiranList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanJyohoHiyouIchiranList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF0250().ToString(), New Object()() { SeikyuYM, MotoSoshikiCode, SakiSoshikiCode, SeikyuShiharaiCode, HiyoKomokuCode, MsgCd })
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanJyohoHiyouIchiranList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num < 100
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanJyohoHiyouIchiranList(num + 1 - 1) {}), SeisanJyohoHiyouIchiranList())
                        Dim seisanJyohoHiyouIchiranList As SeisanJyohoHiyouIchiranList = array(num)
                        array(num) = New SeisanJyohoHiyouIchiranList()
                        array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                        array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                        array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                        array(num).STR_SEIKYU_SHIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                        array(num).STR_HIYO_KOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                        If flag Then
                            array(num).STR_BIKO = ""
                        Else
                            array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GOKEI_GK")))
                        If flag Then
                            array(num).STR_SEIKYU_GOKEI_GK = "0"
                        Else
                            array(num).STR_SEIKYU_GOKEI_GK = Conversions.ToString(sqlDataReader("SEIKYU_GOKEI_GK"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_GK")))
                        If flag Then
                            array(num).STR_HIYO_KAMOKU_GK = "0"
                        Else
                            array(num).STR_HIYO_KAMOKU_GK = Conversions.ToString(sqlDataReader("HIYOKOMOKU_GK"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_GK")))
                        If flag Then
                            array(num).STR_SHOHIZEI_GK = "0"
                        Else
                            array(num).STR_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SHOHIZEI_GK"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MEISAI_TESURYO_GK")))
                        If flag Then
                            array(num).STR_MEISAI_TESIRYO_GK = "0"
                        Else
                            array(num).STR_MEISAI_TESIRYO_GK = Conversions.ToString(sqlDataReader("MEISAI_TESURYO_GK"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MEISAI_TOTAL_GK")))
                        If flag Then
                            array(num).STR_MEISAI_TOTAL_GK = "0"
                        Else
                            array(num).STR_MEISAI_TOTAL_GK = Conversions.ToString(sqlDataReader("MEISAI_TOTAL_GK"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MEISAI_SHOHIZEI_GK")))
                        If flag Then
                            array(num).STR_MEISAI_SHOHIZEI_GK = "0"
                        Else
                            array(num).STR_MEISAI_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("MEISAI_SHOHIZEI_GK"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_SHOHIZEI_KBN = "0"
                        Else
                            array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_RT")))
                        If flag Then
                            array(num).STR_TESURYO_RT = "0"
                        Else
                            array(num).STR_TESURYO_RT = Conversions.ToString(sqlDataReader("TESURYO_RT"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HASEI_DT")))
                        If flag Then
                            array(num).STR_HASSEI_DT = "0"
                        Else
                            array(num).STR_HASSEI_DT = Conversions.ToString(sqlDataReader("HASEI_DT"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_GK")))
                        If flag Then
                            array(num).STR_TESURYO_GK = "0"
                        Else
                            array(num).STR_TESURYO_GK = Conversions.ToString(sqlDataReader("TESURYO_GK"))
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_48A As Exception
                ProjectData.SetProjectError(expr_48A)
                Dim ex As Exception = expr_48A
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