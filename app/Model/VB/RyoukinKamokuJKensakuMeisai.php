<?php
class RyoukinKamokuJKensakuMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getRyoukinKamokuJoho(){

    /*
        Public Function GetRyoukinKamokuJoho(SosikiCode As String, RyoukinKamokuMei As String, ShohinzeiKubun As String, RyoukinKeitaiKubun As String, ByRef MsgCd As String, FindFlg As Integer) As RyoukinKamokuList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As RyoukinKamokuList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SEF0221().ToString(), New Object()() { SosikiCode, RyoukinKamokuMei, ShohinzeiKubun, RyoukinKeitaiKubun })
                Else
                    strSQL = String.Format(masterSQL.SEF0221().ToString(), New Object()() { SosikiCode, "", "", RyoukinKeitaiKubun })
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As RyoukinKamokuList()
                While sqlDataReader.Read()
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New RyoukinKamokuList(num + 1 - 1) {}), RyoukinKamokuList())
                        Dim ryoukinKamokuList As RyoukinKamokuList = array(num)
                        array(num) = New RyoukinKamokuList()
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        array(num).STR_SEIKYU_NEND = Conversions.ToString(sqlDataReader("SEIKYU_NEND"))
                        array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                        array(num).STR_RYOUKIN_KEITAI = Conversions.ToString(sqlDataReader("RYOKIN_KEITAI"))
                        array(num).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_GK")))
                        If flag Then
                            array(num).DEC_HIYOKOMOKU_GK = Conversions.ToDecimal(sqlDataReader("HIYOKOMOKU_GK"))
                        Else
                            array(num).DEC_HIYOKOMOKU_GK = Decimal.Zero
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                        Else
                            array(num).STR_SHOHIZEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_RT")))
                        If flag Then
                            array(num).DEC_SHOHIZEI_RITU = Conversions.ToDecimal(sqlDataReader("SHOHIZEI_RT"))
                        Else
                            array(num).DEC_SHOHIZEI_RITU = Decimal.Zero
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_RT")))
                        If flag Then
                            array(num).DEC_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("TESURYO_RT"))
                        Else
                            array(num).DEC_TESURYO_RT = Decimal.Zero
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
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_SIYO_GK")))
                        If flag Then
                            array(num).DEC_BOX_SIYO_GK = Conversions.ToDecimal(sqlDataReader("BOX_SIYO_GK"))
                        Else
                            array(num).DEC_BOX_SIYO_GK = Decimal.Zero
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_SIYO_GK")))
                        If flag Then
                            array(num).DEC_HATU_BOX_TESURYO_GK = Conversions.ToDecimal(sqlDataReader("HATU_BOX_TESURYO_GK"))
                        Else
                            array(num).DEC_HATU_BOX_TESURYO_GK = Decimal.Zero
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CYAKU_BOX_TESURYO_GK")))
                        If flag Then
                            array(num).DEC_CYAKU_BOX_TESURYO_GK = Conversions.ToDecimal(sqlDataReader("CYAKU_BOX_TESURYO_GK"))
                        Else
                            array(num).DEC_CYAKU_BOX_TESURYO_GK = Decimal.Zero
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                        If flag Then
                            array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                        Else
                            array(num).STR_BIKO = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_49B As Exception
                ProjectData.SetProjectError(expr_49B)
                Dim ex As Exception = expr_49B
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