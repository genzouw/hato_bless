<?php
class KaiageLeaseMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getKaiageLease(){

    /*
        Public Function GetKaiageLease(SoshikiCd As String, KaiageLeaseKbn As String, ShohinCd As String, ShohinMei As String, ByRef MsgCd As String, FindFlg As Integer) As KaiageLeaseList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim flag As Boolean = Operators.CompareString(KaiageLeaseKbn, "0", False) = 0
            If flag Then
                KaiageLeaseKbn = ""
            End If
            Dim result As KaiageLeaseList()
            Try
                flag = (FindFlg = 0)
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0191().ToString(), New Object()() { SoshikiCd, KaiageLeaseKbn, ShohinCd, ShohinMei })
                Else
                    strSQL = String.Format(masterSQL.SMF0190().ToString(), SoshikiCd)
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KaiageLeaseList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KaiageLeaseList(num + 1 - 1) {}), KaiageLeaseList())
                        Dim kaiageLeaseList As KaiageLeaseList = array(num)
                        array(num) = New KaiageLeaseList()
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        array(num).STR_KAIAGE_LEASE_KBN = Conversions.ToString(sqlDataReader("KAIAGE_LEASE_KBN"))
                        array(num).STR_SHOHIN_CD = Conversions.ToString(sqlDataReader("SHOHIN_CD"))
                        array(num).STR_SHOHIN_MEI = Conversions.ToString(sqlDataReader("SHOHIN_MEI"))
                        array(num).STR_SHOHIN_SIIRE_GK = sqlDataReader("SHOHIN_SIIRE_GK").ToString()
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
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_2D8 As Exception
                ProjectData.SetProjectError(expr_2D8)
                Dim ex As Exception = expr_2D8
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