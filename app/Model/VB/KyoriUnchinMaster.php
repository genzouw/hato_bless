<?php
class KyoriUnchinMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteKyoriUnchinManageJoho(){

    /*
        Public Function DeleteKyoriUnchinManageJoho(SoshikiCd As String, MitumoriKbn As String, HanbokiKbn As String, KyoriUnchinCd As String, Kyori As Decimal, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim kyoriUnchinMasterMeisai As KyoriUnchinMasterMeisai = New KyoriUnchinMasterMeisai()
                Dim kyoriUnchinJoho As KyoriUnchinList() = kyoriUnchinMasterMeisai.GetKyoriUnchinJoho2(MitumoriKbn, HanbokiKbn, KyoriUnchinCd, SoshikiCd, Kyori, MsgCd, 0)
                Dim flag As Boolean = kyoriUnchinJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(kyoriUnchinJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0241().ToString(), New Object()() { SoshikiCd, MitumoriKbn, HanbokiKbn, KyoriUnchinCd, Kyori })
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = kyoriUnchinJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_E7 As Exception
                ProjectData.SetProjectError(expr_E7)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateKyoriUnchin(){

    /*
        Public Function UpdateKyoriUnchin(objEntity As Object(), ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As Boolean
            Try
                Dim array As KyoriUnchin() = CType(objEntity, KyoriUnchin())
                Dim kyoriUnchinMasterMeisai As KyoriUnchinMasterMeisai = New KyoriUnchinMasterMeisai()
                Dim kyoriUnchinJoho As KyoriUnchinList() = kyoriUnchinMasterMeisai.GetKyoriUnchinJoho2(array(0).MITSUMORI_KBN, array(0).HANBOKI_KBN, array(0).KYORI_UNCHIN_CD, array(0).SOSHIKI_CD, array(0).KYORI, MsgCd, 0)
                Dim flag As Boolean = Operators.CompareString(Strings.Trim(array(0).UPDATE_DT), "", False) <> 0
                If flag Then
                    Dim flag2 As Boolean = kyoriUnchinJoho IsNot Nothing
                    If flag2 Then
                        Dim flag3 As Boolean = Operators.CompareString(kyoriUnchinJoho(0).STR_UPDATE_DT, array(0).UPDATE_DT, False) <> 0
                        If flag3 Then
                            MsgCd = "XXXX"
                            result = False
                            Return result
                        End If
                    Else
                        Dim flag3 As Boolean = kyoriUnchinJoho Is Nothing
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
                    Dim arg_19B_0 As Integer = num2
                    Dim num3 As Integer = num
                    If arg_19B_0 > num3 Then
                        GoTo Block_8
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.IMF0242().ToString(), New Object()() { array(num2).SOSHIKI_CD, array(num2).MITSUMORI_KBN, array(num2).HANBOKI_KBN, array(num2).KYORI_UNCHIN_CD, array(num2).KYORI })
                    Dim flag3 As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag3 Then
                        Exit While
                    End If
                    num2 += 1
                End While
                result = False
                Return result
                Block_8:
                Dim arg_1AB_0 As Integer = 0
                Dim num4 As Integer = Information.UBound(array, 1)
                Dim num5 As Integer = arg_1AB_0
                While True
                    Dim arg_2B1_0 As Integer = num5
                    Dim num3 As Integer = num4
                    If arg_2B1_0 > num3 Then
                        GoTo Block_10
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.IMF0240().ToString(), New Object()() { array(num5).SOSHIKI_CD, array(num5).KYORI_UNCHIN_CD, array(num5).MITSUMORI_KBN, array(num5).HANBOKI_KBN, array(num5).SHASYU_KBN, array(num5).KYORI, array(num5).KYUJITU_KBN, array(num5).KYORI_UNCHIN_MEI, array(num5).KYORI_UNCHIN, getDATE_YYMMDDHHMMSS, array(num5).UPDATE_TNT_ID, array(num5).GAMEN_ID })
                    Dim flag3 As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag3 Then
                        Exit While
                    End If
                    num5 += 1
                End While
                result = False
                Block_10:
            Catch expr_2B8 As Exception
                ProjectData.SetProjectError(expr_2B8)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setKyoriUnchin(){

    /*
        Public Function SetKyoriUnchin(objEntity As Object(), ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As Boolean
            Try
                Dim array As KyoriUnchin() = CType(objEntity, KyoriUnchin())
                Dim arg_1B_0 As Integer = 0
                Dim num As Integer = Information.UBound(array, 1)
                Dim num2 As Integer = arg_1B_0
                While True
                    Dim arg_BA_0 As Integer = num2
                    Dim num3 As Integer = num
                    If arg_BA_0 > num3 Then
                        GoTo Block_4
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.IMF0241().ToString(), New Object()() { array(num2).SOSHIKI_CD, array(num2).MITSUMORI_KBN, array(num2).HANBOKI_KBN, array(num2).KYORI_UNCHIN_CD, array(num2).KYORI })
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
                Dim arg_D8_0 As Integer = 0
                Dim num4 As Integer = Information.UBound(array, 1)
                Dim num5 As Integer = arg_D8_0
                While True
                    Dim arg_1DE_0 As Integer = num5
                    Dim num3 As Integer = num4
                    If arg_1DE_0 > num3 Then
                        GoTo Block_6
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.IMF0240().ToString(), New Object()() { array(num5).SOSHIKI_CD, array(num5).KYORI_UNCHIN_CD, array(num5).MITSUMORI_KBN, array(num5).HANBOKI_KBN, array(num5).SHASYU_KBN, array(num5).KYORI, array(num5).KYUJITU_KBN, array(num5).KYORI_UNCHIN_MEI, array(num5).KYORI_UNCHIN, getDATE_YYMMDDHHMMSS, array(num5).UPDATE_TNT_ID, array(num5).GAMEN_ID })
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
            Catch expr_1E9 As Exception
                ProjectData.SetProjectError(expr_1E9)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setKyoriUnchinJohoForMaster(){

    /*
        Public Function GetKyoriUnchinJohoForMaster(SoshikiCd As String, MitumoriKbn As String, HanbokiKbn As String, KyoriUnchinCd As String, KyoriUnchinMei As String, Kyori As Decimal, ByRef MsgCd As String) As KyoriUnchinList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As KyoriUnchinList()
            Try
                Dim flag As Boolean = Decimal.Compare(Kyori, Decimal.Zero) > 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0241().ToString(), New Object()() { SoshikiCd, MitumoriKbn, HanbokiKbn, KyoriUnchinCd, KyoriUnchinMei, Kyori })
                Else
                    strSQL = String.Format(masterSQL.SMF0240().ToString(), New Object()() { SoshikiCd, MitumoriKbn, HanbokiKbn, KyoriUnchinCd, KyoriUnchinMei, Kyori })
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KyoriUnchinList()
                While sqlDataReader.Read()
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KyoriUnchinList(num + 1 - 1) {}), KyoriUnchinList())
                        Dim kyoriUnchinList As KyoriUnchinList = array(num)
                        array(num) = New KyoriUnchinList()
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
                        If flag Then
                            array(num).STR_SOSHIKI_CD = ""
                        Else
                            array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYORI_UNCHIN_CD")))
                        If flag Then
                            array(num).STR_KYORI_UNCHIN_CD = ""
                        Else
                            array(num).STR_KYORI_UNCHIN_CD = Conversions.ToString(sqlDataReader("KYORI_UNCHIN_CD"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MITSUMORI_KBN")))
                        If flag Then
                            array(num).STR_MITSUMORI_KBN = ""
                        Else
                            array(num).STR_MITSUMORI_KBN = Conversions.ToString(sqlDataReader("MITSUMORI_KBN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBOKI_KBN")))
                        If flag Then
                            array(num).STR_HANBOKI_KBN = ""
                        Else
                            array(num).STR_HANBOKI_KBN = Conversions.ToString(sqlDataReader("HANBOKI_KBN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHASYU_KBN")))
                        If flag Then
                            array(num).STR_SHASYU_KBN = ""
                        Else
                            array(num).STR_SHASYU_KBN = Conversions.ToString(sqlDataReader("SHASYU_KBN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYORI")))
                        If flag Then
                            array(num).DEC_KYORI = Conversions.ToDecimal("0")
                        Else
                            array(num).DEC_KYORI = Conversions.ToDecimal(sqlDataReader("KYORI"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYUJITU_KBN")))
                        If flag Then
                            array(num).STR_KYUJITU_KBN = ""
                        Else
                            array(num).STR_KYUJITU_KBN = Conversions.ToString(sqlDataReader("KYUJITU_KBN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYORI_UNCHIN_MEI")))
                        If flag Then
                            array(num).STR_KYORI_UNCHIN_MEI = ""
                        Else
                            array(num).STR_KYORI_UNCHIN_MEI = Conversions.ToString(sqlDataReader("KYORI_UNCHIN_MEI"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KYORI_UNCHIN")))
                        If flag Then
                            array(num).DEC_KYORI_UNCHIN = Conversions.ToDecimal("0")
                        Else
                            array(num).DEC_KYORI_UNCHIN = Conversions.ToDecimal(sqlDataReader("KYORI_UNCHIN"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                        If flag Then
                            array(num).STR_UPDATE_DT = ""
                        Else
                            array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
                        If flag Then
                            array(num).STR_UPDATE_TNT_ID = ""
                        Else
                            array(num).STR_UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
                        If flag Then
                            array(num).STR_GAMEN_ID = ""
                        Else
                            array(num).STR_GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_4BC As Exception
                ProjectData.SetProjectError(expr_4BC)
                Dim ex As Exception = expr_4BC
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