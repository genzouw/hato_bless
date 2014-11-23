<?php
class JikanUnchinMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getJikanUnchinJoho(){

    /*
        Public Function GetJikanUnchinJoho(MitsumoriKbnSelect As String, HanbokiKbnSelect As String, JikanUnchinCdTextbox As String, SoshikiMeiTextbox As String, ByRef MsgCd As String, FindFlg As Integer) As JikanUnchinList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As JikanUnchinList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0210().ToString(), New Object()() { MitsumoriKbnSelect, HanbokiKbnSelect, JikanUnchinCdTextbox, SoshikiMeiTextbox })
                Else
                    strSQL = String.Format(masterSQL.SMF0210().ToString(), New Object()() { "", "", "", SoshikiMeiTextbox })
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As JikanUnchinList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New JikanUnchinList(num + 1 - 1) {}), JikanUnchinList())
                        Dim jikanUnchinList As JikanUnchinList = array(num)
                        array(num) = New JikanUnchinList()
                        array(num).SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        array(num).JIKAN_UNCHIN_CD = Conversions.ToString(sqlDataReader("JIKAN_UNCHIN_CD"))
                        array(num).MITSUMORI_KBN = Conversions.ToString(sqlDataReader("MITSUMORI_KBN"))
                        array(num).HANBOKI_KBN = Conversions.ToString(sqlDataReader("HANBOKI_KBN"))
                        array(num).JIKAN_UNCHIN_MEI = Conversions.ToString(sqlDataReader("JIKAN_UNCHIN_MEI"))
                        array(num).JIKANSEI_KBN = Conversions.ToString(sqlDataReader("JIKANSEI_KBN"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                        If flag Then
                            array(num).UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                        Else
                            array(num).UPDATE_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                        If flag Then
                            array(num).SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                        Else
                            array(num).SOSHIKI_RYAKU_MEI = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_26A As Exception
                ProjectData.SetProjectError(expr_26A)
                Dim ex As Exception = expr_26A
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getJikanUnchinJoho2(){

    /*
        Public Function GetJikanUnchinJoho2(MitsumoriKbnSelect As String, HanbokiKbnSelect As String, JikanUnchinCdTextbox As String, SoshikiMeiTextbox As String, JikanseiKbn As String, ByRef MsgCd As String, FindFlg As Integer) As JikanUnchinList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As JikanUnchinList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0212().ToString(), New Object()() { MitsumoriKbnSelect, HanbokiKbnSelect, JikanUnchinCdTextbox, SoshikiMeiTextbox, JikanseiKbn })
                Else
                    strSQL = String.Format(masterSQL.SMF0212().ToString(), New Object()() { "", "", "", SoshikiMeiTextbox, "" })
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As JikanUnchinList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New JikanUnchinList(num + 1 - 1) {}), JikanUnchinList())
                        Dim jikanUnchinList As JikanUnchinList = array(num)
                        array(num) = New JikanUnchinList()
                        array(num).SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        array(num).JIKAN_UNCHIN_CD = Conversions.ToString(sqlDataReader("JIKAN_UNCHIN_CD"))
                        array(num).MITSUMORI_KBN = Conversions.ToString(sqlDataReader("MITSUMORI_KBN"))
                        array(num).HANBOKI_KBN = Conversions.ToString(sqlDataReader("HANBOKI_KBN"))
                        array(num).JIKAN_UNCHIN_MEI = Conversions.ToString(sqlDataReader("JIKAN_UNCHIN_MEI"))
                        array(num).JIKANSEI_KBN = Conversions.ToString(sqlDataReader("JIKANSEI_KBN"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                        If flag Then
                            array(num).UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                        Else
                            array(num).UPDATE_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                        If flag Then
                            array(num).SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                        Else
                            array(num).SOSHIKI_RYAKU_MEI = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_27B As Exception
                ProjectData.SetProjectError(expr_27B)
                Dim ex As Exception = expr_27B
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