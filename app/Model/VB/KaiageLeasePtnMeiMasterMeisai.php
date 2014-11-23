<?php
class KaiageLeasePtnMeiMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getKaiageLeasePtnCheck2(){

    /*
        Public Function GetKaiageLeasePtnCheck2(SoshikiCd As String, KaiageLeaseKbn As String, PtnCd As String, ByRef MsgCd As String, ByRef FindFlg As Integer) As KaiageLeasePtnMeiList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As KaiageLeasePtnMeiList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SMF0173().ToString(), SoshikiCd, KaiageLeaseKbn, PtnCd)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KaiageLeasePtnMeiList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num >= 99
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KaiageLeasePtnMeiList(num + 1 - 1) {}), KaiageLeasePtnMeiList())
                        Dim kaiageLeasePtnMeiList As KaiageLeasePtnMeiList = array(num)
                        array(num) = New KaiageLeasePtnMeiList()
                        array(num).STR_KAIAGE_LEASE_KBN = Conversions.ToString(sqlDataReader("KAIAGE_LEASE_KBN"))
                        array(num).STR_KAIAGE_LEASE_PTN_CD = Conversions.ToString(sqlDataReader("KAIAGE_LEASE_PTN_CD"))
                        array(num).STR_PTN_MEI = Conversions.ToString(sqlDataReader("PTN_MEI"))
                        array(num).INT_CNT = Conversions.ToString(sqlDataReader("CNT"))
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_12A As Exception
                ProjectData.SetProjectError(expr_12A)
                Dim ex As Exception = expr_12A
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