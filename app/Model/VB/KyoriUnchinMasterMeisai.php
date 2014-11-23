<?php
class KyoriUnchinMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getKyoriUnchinJoho(){

    /*
        Public Function GetKyoriUnchinJoho(MitumoriKbn As String, HanbokiKbn As String, KyoriUnchinCd As String, SoshikiCd As String, ByRef MsgCd As String, FindFlg As Integer) As KyoriUnchinList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As KyoriUnchinList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0230().ToString(), New Object()() { MitumoriKbn, HanbokiKbn, KyoriUnchinCd, SoshikiCd })
                Else
                    strSQL = String.Format(masterSQL.SMF0230().ToString(), New Object()() { "", "", "", SoshikiCd })
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KyoriUnchinList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KyoriUnchinList(num + 1 - 1) {}), KyoriUnchinList())
                        Dim kyoriUnchinList As KyoriUnchinList = array(num)
                        array(num) = New KyoriUnchinList()
                        array(num).STR_MITSUMORI_KBN = Conversions.ToString(sqlDataReader("MITSUMORI_KBN"))
                        array(num).STR_HANBOKI_KBN = Conversions.ToString(sqlDataReader("HANBOKI_KBN"))
                        array(num).STR_KYORI_UNCHIN_CD = Conversions.ToString(sqlDataReader("KYORI_UNCHIN_CD"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYORI_UNCHIN_MEI")))
                        If flag Then
                            array(num).STR_KYORI_UNCHIN_MEI = Conversions.ToString(sqlDataReader("KYORI_UNCHIN_MEI"))
                        Else
                            array(num).STR_KYORI_UNCHIN_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYORI")))
                        If flag Then
                            array(num).DEC_KYORI = Conversions.ToDecimal(sqlDataReader("KYORI"))
                        Else
                            array(num).DEC_KYORI = Conversions.ToDecimal("")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
                        If flag Then
                            array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        Else
                            array(num).STR_SOSHIKI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                        If flag Then
                            array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                        Else
                            array(num).STR_UPDATE_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                        Else
                            array(num).STR_SOSHIKI_RYAKU_MEI = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_305 As Exception
                ProjectData.SetProjectError(expr_305)
                Dim ex As Exception = expr_305
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getKyoriUnchinJoho2(){

    /*
        Public Function GetKyoriUnchinJoho2(MitumoriKbn As String, HanbokiKbn As String, KyoriUnchinCd As String, SoshikiCd As String, Kyori As Decimal, ByRef MsgCd As String, FindFlg As Integer) As KyoriUnchinList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As KyoriUnchinList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0232().ToString(), New Object()() { MitumoriKbn, HanbokiKbn, KyoriUnchinCd, SoshikiCd, Kyori })
                Else
                    strSQL = String.Format(masterSQL.SMF0232().ToString(), New Object()() { "", "", "", SoshikiCd, "" })
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KyoriUnchinList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KyoriUnchinList(num + 1 - 1) {}), KyoriUnchinList())
                        Dim kyoriUnchinList As KyoriUnchinList = array(num)
                        array(num) = New KyoriUnchinList()
                        array(num).STR_MITSUMORI_KBN = Conversions.ToString(sqlDataReader("MITSUMORI_KBN"))
                        array(num).STR_HANBOKI_KBN = Conversions.ToString(sqlDataReader("HANBOKI_KBN"))
                        array(num).STR_KYORI_UNCHIN_CD = Conversions.ToString(sqlDataReader("KYORI_UNCHIN_CD"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYORI_UNCHIN_MEI")))
                        If flag Then
                            array(num).STR_KYORI_UNCHIN_MEI = Conversions.ToString(sqlDataReader("KYORI_UNCHIN_MEI"))
                        Else
                            array(num).STR_KYORI_UNCHIN_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYORI")))
                        If flag Then
                            array(num).DEC_KYORI = Conversions.ToDecimal(sqlDataReader("KYORI"))
                        Else
                            array(num).DEC_KYORI = Conversions.ToDecimal("")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
                        If flag Then
                            array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        Else
                            array(num).STR_SOSHIKI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                        If flag Then
                            array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                        Else
                            array(num).STR_UPDATE_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                        Else
                            array(num).STR_SOSHIKI_RYAKU_MEI = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_31B As Exception
                ProjectData.SetProjectError(expr_31B)
                Dim ex As Exception = expr_31B
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