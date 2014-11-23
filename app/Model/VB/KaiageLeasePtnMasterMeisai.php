<?php
class KaiageLeasePtnMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getKaiageLeasePtn(){

    /*
        Public Function GetKaiageLeasePtn(SoshikiCd As String, KaiageLeaseKbn As String, KaiageLeasePtnCd As String, KaiageLeasePtnMei As String, ByRef MsgCd As String, FindFlg As Integer) As KaiageLeasePtnList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim flag As Boolean = Operators.CompareString(KaiageLeaseKbn, "0", False) = 0
            If flag Then
                KaiageLeaseKbn = ""
            End If

            Dim result As KaiageLeasePtnList()
            Try
                flag = (FindFlg = 0)
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0171().ToString(), New Object()() { SoshikiCd, KaiageLeaseKbn, KaiageLeasePtnCd, KaiageLeasePtnMei })
                Else
                    flag = (FindFlg = 1)
                    If flag Then
                        strSQL = String.Format(masterSQL.SMF0170().ToString(), SoshikiCd, KaiageLeaseKbn)
                    Else
                        strSQL = String.Format(masterSQL.SMF0175().ToString(), SoshikiCd, KaiageLeaseKbn, KaiageLeasePtnCd)
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KaiageLeasePtnList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KaiageLeasePtnList(num + 1 - 1) {}), KaiageLeasePtnList())
                        Dim kaiageLeasePtnList As KaiageLeasePtnList = array(num)
                        array(num) = New KaiageLeasePtnList()
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        array(num).STR_KAIAGE_LEASE_KBN = Conversions.ToString(sqlDataReader("KAIAGE_LEASE_KBN"))
                        array(num).STR_KAIAGE_LEASE_PTN_CD = Conversions.ToString(sqlDataReader("KAIAGE_LEASE_PTN_CD"))
                        array(num).STR_PTN_MEI = Conversions.ToString(sqlDataReader("PTN_MEI"))
                        flag = (FindFlg = 2)
                        Dim flag2 As Boolean
                        If flag Then
                            flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                            If flag2 Then
                                array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                            Else
                                array(num).STR_UPDATE_DT = ""
                            End If
                        End If
                        flag2 = (FindFlg <> 2)
                        If flag2 Then
                            flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                            If flag Then
                                array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                            Else
                                array(num).STR_SOSHIKI_RYAKU_MEI = ""
                            End If
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_261 As Exception
                ProjectData.SetProjectError(expr_261)
                Dim ex As Exception = expr_261
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getKaiageLeasePtnCheck(){

    /*
        Public Function GetKaiageLeasePtnCheck(SoshikiCd As String, KaiageLeaseKbn As String, ShohinCd As String, ByRef MsgCd As String, ByRef FindFlg As Integer) As Integer
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Integer
            Try
                Dim strSQL As String = String.Format(masterSQL.SMF0172().ToString(), SoshikiCd, KaiageLeaseKbn, ShohinCd)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                FindFlg = 0
                While sqlDataReader.Read()
                    FindFlg = 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = FindFlg
            Catch expr_5F As Exception
                ProjectData.SetProjectError(expr_5F)
                Dim ex As Exception = expr_5F
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