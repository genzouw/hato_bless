<?php
class JikanUnchinMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteJikanUnchinManageJoho(){

    /*
        Public Function DeleteJikanUnchinManageJoho(SoshikiCd As String, MitumoriKbn As String, HanbokiKbn As String, JikanUnchinCd As String, JikanseiKbn As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim jikanUnchinMasterMeisai As JikanUnchinMasterMeisai = New JikanUnchinMasterMeisai()
                Dim jikanUnchinJoho As JikanUnchinList() = jikanUnchinMasterMeisai.GetJikanUnchinJoho2(MitumoriKbn, HanbokiKbn, JikanUnchinCd, SoshikiCd, JikanseiKbn, MsgCd, 0)
                Dim flag As Boolean = jikanUnchinJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(jikanUnchinJoho(0).UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0211().ToString(), New Object()() { SoshikiCd, MitumoriKbn, HanbokiKbn, JikanUnchinCd, JikanseiKbn })
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = jikanUnchinJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_E2 As Exception
                ProjectData.SetProjectError(expr_E2)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateJikanUnchin(){

    /*
        Public Function UpdateJikanUnchin(objEntity As Object(), ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim array As JikanUnchin() = CType(objEntity, JikanUnchin())
                Dim jikanUnchinMasterMeisai As JikanUnchinMasterMeisai = New JikanUnchinMasterMeisai()
                Dim jikanUnchinJoho As JikanUnchinList() = jikanUnchinMasterMeisai.GetJikanUnchinJoho2(array(0).MITSUMORI_KBN, array(0).HANBOKI_KBN, array(0).JIKAN_UNCHIN_CD, array(0).SOSHIKI_CD, array(0).JIKANSEI_KBN, MsgCd, 0)
                Dim flag As Boolean = Operators.CompareString(Strings.Trim(array(0).UPDATE_DT), "", False) <> 0
                If flag Then
                    Dim flag2 As Boolean = jikanUnchinJoho IsNot Nothing
                    If flag2 Then
                        Dim flag3 As Boolean = Operators.CompareString(jikanUnchinJoho(0).UPDATE_DT, array(0).UPDATE_DT, False) <> 0
                        If flag3 Then
                            MsgCd = "XXXX"
                            result = False
                            Return result
                        End If
                    Else
                        Dim flag3 As Boolean = jikanUnchinJoho Is Nothing
                        If flag3 Then
                            MsgCd = "XXXX"
                            result = False
                            Return result
                        End If
                        MsgCd = "XXXX"
                        result = False
                        Return result
                    End If
                End If
                Dim mstFind As MstFind = New MstFind()
                Dim getDATE_YYMMDDHHMMSS As String = mstFind.GetDATE_YYMMDDHHMMSS
                Dim arg_FC_0 As Integer = 0
                Dim num As Integer = Information.UBound(array, 1)
                Dim num2 As Integer = arg_FC_0
                While True
                    Dim arg_196_0 As Integer = num2
                    Dim num3 As Integer = num
                    If arg_196_0 > num3 Then
                        GoTo Block_8
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.IMF0212().ToString(), New Object()() { array(num2).SOSHIKI_CD, array(num2).MITSUMORI_KBN, array(num2).HANBOKI_KBN, array(num2).JIKAN_UNCHIN_CD, array(num2).JIKANSEI_KBN })
                    Dim flag3 As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag3 Then
                        Exit While
                    End If
                    num2 += 1
                End While
                result = False
                Return result
                Block_8:
                Dim arg_1A6_0 As Integer = 0
                Dim num4 As Integer = Information.UBound(array, 1)
                Dim num5 As Integer = arg_1A6_0
                While True
                    Dim arg_2B7_0 As Integer = num5
                    Dim num3 As Integer = num4
                    If arg_2B7_0 > num3 Then
                        GoTo Block_10
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.IMF0210().ToString(), New Object()() { array(num5).SOSHIKI_CD, array(num5).JIKAN_UNCHIN_CD, array(num5).MITSUMORI_KBN, array(num5).HANBOKI_KBN, array(num5).SHASYU_KBN, array(num5).JIKANSEI_KBN, array(num5).KYUJITU_KBN, array(num5).JIKAN_UNCHIN_MEI, array(num5).JIKAN_UNCHIN, getDATE_YYMMDDHHMMSS, array(num5).UPDATE_TNT_ID, array(num5).GAMEN_ID, array(num5).UPDATE_TNT_ID })
                    Dim flag3 As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag3 Then
                        Exit While
                    End If
                    num5 += 1
                End While
                result = False
                Block_10:
            Catch expr_2BE As Exception
                ProjectData.SetProjectError(expr_2BE)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setJikanUnchin(){

    /*
        Public Function SetJikanUnchin(objEntity As Object(), ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim array As JikanUnchin() = CType(objEntity, JikanUnchin())
                Dim arg_1B_0 As Integer = 0
                Dim num As Integer = Information.UBound(array, 1)
                Dim num2 As Integer = arg_1B_0
                While True
                    Dim arg_B5_0 As Integer = num2
                    Dim num3 As Integer = num
                    If arg_B5_0 > num3 Then
                        GoTo Block_4
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.IMF0211().ToString(), New Object()() { array(num2).SOSHIKI_CD, array(num2).MITSUMORI_KBN, array(num2).HANBOKI_KBN, array(num2).JIKAN_UNCHIN_CD, array(num2).JIKANSEI_KBN })
                    Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        Exit While
                    End If
                    num2 += 1
                End While
                result = False
                Return result
                Block_4:
                Dim mstFind As MstFind = New MstFind()
                Dim getDATE_YYMMDDHHMMSS As String = mstFind.GetDATE_YYMMDDHHMMSS
                Dim arg_D3_0 As Integer = 0
                Dim num4 As Integer = Information.UBound(array, 1)
                Dim num5 As Integer = arg_D3_0
                While True
                    Dim arg_1E4_0 As Integer = num5
                    Dim num3 As Integer = num4
                    If arg_1E4_0 > num3 Then
                        GoTo Block_6
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.IMF0210().ToString(), New Object()() { array(num5).SOSHIKI_CD, array(num5).JIKAN_UNCHIN_CD, array(num5).MITSUMORI_KBN, array(num5).HANBOKI_KBN, array(num5).SHASYU_KBN, array(num5).JIKANSEI_KBN, array(num5).KYUJITU_KBN, array(num5).JIKAN_UNCHIN_MEI, array(num5).JIKAN_UNCHIN, getDATE_YYMMDDHHMMSS, array(num5).UPDATE_TNT_ID, array(num5).GAMEN_ID, array(num5).UPDATE_TNT_ID })
                    Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        Exit While
                    End If
                    num5 += 1
                End While
                result = False
                Return result
                Block_6:
                result = True
            Catch expr_1EF As Exception
                ProjectData.SetProjectError(expr_1EF)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function getJikanUnchinJohoForMaster(){

    /*
        Public Function GetJikanUnchinJohoForMaster(MitsumoriKbnSelect As String, HanbokiKbnSelect As String, JikanUnchinCdTextbox As String, SoshikiMeiTextbox As String, JikanseiKbn As String, ByRef MsgCd As String) As JikanUnchinList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As JikanUnchinList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SMF0220().ToString(), New Object()() { MitsumoriKbnSelect, HanbokiKbnSelect, JikanUnchinCdTextbox, SoshikiMeiTextbox, JikanseiKbn })
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As JikanUnchinList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num < 100
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New JikanUnchinList(num + 1 - 1) {}), JikanUnchinList())
                        Dim jikanUnchinList As JikanUnchinList = array(num)
                        array(num) = New JikanUnchinList()
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
                        If flag Then
                            array(num).SOSHIKI_CD = ""
                        Else
                            array(num).SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JIKAN_UNCHIN_CD")))
                        If flag Then
                            array(num).JIKAN_UNCHIN_CD = ""
                        Else
                            array(num).JIKAN_UNCHIN_CD = Conversions.ToString(sqlDataReader("JIKAN_UNCHIN_CD"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MITSUMORI_KBN")))
                        If flag Then
                            array(num).MITSUMORI_KBN = ""
                        Else
                            array(num).MITSUMORI_KBN = Conversions.ToString(sqlDataReader("MITSUMORI_KBN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBOKI_KBN")))
                        If flag Then
                            array(num).HANBOKI_KBN = ""
                        Else
                            array(num).HANBOKI_KBN = Conversions.ToString(sqlDataReader("HANBOKI_KBN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHASYU_KBN")))
                        If flag Then
                            array(num).SHASYU_KBN = ""
                        Else
                            array(num).SHASYU_KBN = Conversions.ToString(sqlDataReader("SHASYU_KBN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JIKANSEI_KBN")))
                        If flag Then
                            array(num).JIKANSEI_KBN = ""
                        Else
                            array(num).JIKANSEI_KBN = Conversions.ToString(sqlDataReader("JIKANSEI_KBN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYUJITU_KBN")))
                        If flag Then
                            array(num).KYUJITU_KBN = ""
                        Else
                            array(num).KYUJITU_KBN = Conversions.ToString(sqlDataReader("KYUJITU_KBN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JIKAN_UNCHIN_MEI")))
                        If flag Then
                            array(num).JIKAN_UNCHIN_MEI = ""
                        Else
                            array(num).JIKAN_UNCHIN_MEI = Conversions.ToString(sqlDataReader("JIKAN_UNCHIN_MEI"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JIKAN_UNCHIN")))
                        If flag Then
                            array(num).JIKAN_UNCHIN = Conversions.ToDecimal("")
                        Else
                            array(num).JIKAN_UNCHIN = Conversions.ToDecimal(sqlDataReader("JIKAN_UNCHIN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                        If flag Then
                            array(num).UPDATE_DT = ""
                        Else
                            array(num).UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
                        If flag Then
                            array(num).UPDATE_TNT_ID = ""
                        Else
                            array(num).UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
                        If flag Then
                            array(num).GAMEN_ID = ""
                        Else
                            array(num).GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_44A As Exception
                ProjectData.SetProjectError(expr_44A)
                Dim ex As Exception = expr_44A
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