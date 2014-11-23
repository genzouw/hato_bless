<?php
class KaiageLeasePtnMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteKaiageLeasePtn(){

    /*
        Public Function DeleteKaiageLeasePtn(SoshikiCd As String, KaiageLeaseKbn As String, KaiageLeasePtnCd As String, UpdateDt As String, UpdateTntId As String, GamenId As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim kaiageLeasePtnMasterMeisai As KaiageLeasePtnMasterMeisai = New KaiageLeasePtnMasterMeisai()
                Dim kaiageLeasePtn As KaiageLeasePtnList() = kaiageLeasePtnMasterMeisai.GetKaiageLeasePtn(SoshikiCd, KaiageLeaseKbn, KaiageLeasePtnCd, "", MsgCd, 2)
                Dim flag As Boolean = kaiageLeasePtn IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(kaiageLeasePtn(0).STR_UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0171().ToString(), New Object()() { SoshikiCd, KaiageLeaseKbn, KaiageLeasePtnCd, UpdateDt, UpdateTntId, GamenId })
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = kaiageLeasePtn Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_ED As Exception
                ProjectData.SetProjectError(expr_ED)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateKaiageLeasePtn(){

    /*
        Public Function UpdateKaiageLeasePtn(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim mstFind As MstFind = New MstFind()
            Dim result As Boolean
            Try
                Dim array As KaiageLeasePtn() = CType(objEntity, KaiageLeasePtn())
                Dim kaiageLeasePtnMasterMeisai As KaiageLeasePtnMasterMeisai = New KaiageLeasePtnMasterMeisai()
                Dim kaiageLeasePtn As KaiageLeasePtnList() = kaiageLeasePtnMasterMeisai.GetKaiageLeasePtn(array(0).STR_SOSHIKI_CD, array(0).STR_KAIAGE_LEASE_KBN, array(0).STR_KAIAGE_LEASE_PTN_CD, "", MsgCd, 2)
                Dim flag As Boolean = kaiageLeasePtn IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(kaiageLeasePtn(0).STR_UPDATE_DT, array(0).STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0170().ToString(), array(0).STR_SOSHIKI_CD, array(0).STR_KAIAGE_LEASE_KBN, array(0).STR_KAIAGE_LEASE_PTN_CD)
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            Dim arg_10E_0 As Integer = 0
                            Dim num As Integer = Information.UBound(array, 1)
                            Dim num2 As Integer = arg_10E_0
                            While True
                                Dim arg_1E3_0 As Integer = num2
                                Dim num3 As Integer = num
                                If arg_1E3_0 > num3 Then
                                    GoTo Block_8
                                End If
                                sqlCommand = String.Format(masterSQL.IMF0170().ToString(), New Object()() { array(num2).STR_SOSHIKI_CD, array(num2).STR_KAIAGE_LEASE_KBN, array(num2).STR_KAIAGE_LEASE_PTN_CD, array(num2).STR_PTN_MEI, array(num2).STR_SHOHIN_CD, array(num2).DEC_SHOHIN_TANKA, mstFind.GetDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
                                flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                If flag2 Then
                                    Exit While
                                End If
                                num2 += 1
                            End While
                            result = False
                            Return result
                            Block_8:
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = kaiageLeasePtn Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_1EE As Exception
                ProjectData.SetProjectError(expr_1EE)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setKaiageLeasePtn(){

    /*
        Public Function SetKaiageLeasePtn(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim mstFind As MstFind = New MstFind()
            Dim result As Boolean
            Try
                Dim array As KaiageLeasePtn() = CType(objEntity, KaiageLeasePtn())
                Dim sqlCommand As String = String.Format(masterSQL.DMF0172().ToString(), array(0).STR_SOSHIKI_CD, array(0).STR_KAIAGE_LEASE_KBN, array(0).STR_KAIAGE_LEASE_PTN_CD)
                Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    Dim arg_6B_0 As Integer = 0
                    Dim num As Integer = Information.UBound(array, 1)
                    Dim num2 As Integer = arg_6B_0
                    While True
                        Dim arg_140_0 As Integer = num2
                        Dim num3 As Integer = num
                        If arg_140_0 > num3 Then
                            GoTo Block_5
                        End If
                        sqlCommand = String.Format(masterSQL.IMF0170().ToString(), New Object()() { array(num2).STR_SOSHIKI_CD, array(num2).STR_KAIAGE_LEASE_KBN, array(num2).STR_KAIAGE_LEASE_PTN_CD, array(num2).STR_PTN_MEI, array(num2).STR_SHOHIN_CD, array(num2).DEC_SHOHIN_TANKA, mstFind.GetDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
                        flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag Then
                            Exit While
                        End If
                        num2 += 1
                    End While
                    result = False
                    Return result
                    Block_5:
                    result = True
                End If
            Catch expr_14B As Exception
                ProjectData.SetProjectError(expr_14B)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function getKaiageLeaseMeisai(){

    /*
        Public Function GetKaiageLeaseMeisai(SoshikiCd As String, KaiageLeaseKbn As String, KaiageLeasePtnCd As String, ByRef MsgCd As String, FindFlg As Integer) As KaiageLeasePtnList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As KaiageLeasePtnList()
            Try
                Dim text As String = String.Format(masterSQL.SMF0180().ToString(), SoshikiCd, KaiageLeaseKbn, KaiageLeasePtnCd)
                Dim arg_2E_0 As GsolDAL = Me.DAL
                Dim arg_2E_1 As String = text
                Dim text2 As String = ""
                Dim sqlDataReader As SqlDataReader = arg_2E_0.SelectDataReader(arg_2E_1, text2)
                Dim num As Integer = 0
                Dim num2 As Integer = 0
                Dim array As KaiageLeasePtnList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New KaiageLeasePtnList(num + 1 - 1) {}), KaiageLeasePtnList())
                    Dim kaiageLeasePtnList As KaiageLeasePtnList = array(num)
                    array(num) = New KaiageLeasePtnList()
                    array(num).STR_SHOHIN_CD = Conversions.ToString(sqlDataReader("SHOHIN_CD"))
                    array(num).DEC_SHOHIN_TANKA = Conversions.ToDecimal(sqlDataReader("SHOHIN_TANKA"))
                    num += 1
                End While
                sqlDataReader.Close()
                Dim num3 As Integer = num - 1
                Dim strSQL As String = String.Format(masterSQL.SMF0191().ToString(), New Object()() { SoshikiCd, KaiageLeaseKbn, "", "" })
                Dim sqlDataReader2 As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim array2 As KaiageLeasePtnList()
                While sqlDataReader2.Read()
                    array2 = CType(Utils.CopyArray(CType(array2, Array), New KaiageLeasePtnList(num2 + 1 - 1) {}), KaiageLeasePtnList())
                    Dim kaiageLeasePtnList2 As KaiageLeasePtnList = array2(num2)
                    array2(num2) = New KaiageLeasePtnList()
                    array2(num2).STR_SHOHIN_CD = Conversions.ToString(sqlDataReader2("SHOHIN_CD"))
                    array2(num2).STR_SHOHIN_MEI = Conversions.ToString(sqlDataReader2("SHOHIN_MEI"))
                    array2(num2).DEC_SHOHIN_SIIRE_GK = sqlDataReader2("SHOHIN_SIIRE_GK").ToString()
                    Dim flag As Boolean = FindFlg = 0
                    If flag Then
                        array2(num2).STR_TOUROKU_FLG = Conversions.ToString(1)
                        array2(num2).DEC_SHOHIN_TANKA = Decimal.Zero
                    End If
                    Dim arg_1C8_0 As Integer = 0
                    Dim num4 As Integer = num3
                    num = arg_1C8_0
                    While True
                        Dim arg_24C_0 As Integer = num
                        Dim num5 As Integer = num4
                        If arg_24C_0 > num5 Then
                            Exit While
                        End If
                        flag = (Operators.CompareString(array2(num2).STR_SHOHIN_CD, array(num).STR_SHOHIN_CD, False) = 0)
                        If flag Then
                            GoTo Block_5
                        End If
                        array2(num2).STR_TOUROKU_FLG = Conversions.ToString(0)
                        array2(num2).DEC_SHOHIN_TANKA = Decimal.Zero
                        num += 1
                    End While
                    IL_251:
                    num2 += 1
                    Continue While
                    Block_5:
                    array2(num2).STR_TOUROKU_FLG = Conversions.ToString(1)
                    array2(num2).DEC_SHOHIN_TANKA = array(num).DEC_SHOHIN_TANKA
                    GoTo IL_251
                End While
                sqlDataReader2.Close()
                result = array2
            Catch expr_278 As Exception
                ProjectData.SetProjectError(expr_278)
                Dim ex As Exception = expr_278
                Dim sqlDataReader2 As SqlDataReader
                sqlDataReader2.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }



}
?>