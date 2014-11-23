<?php
class SeisanNyuSyukinIchiran extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanNyuSyukinJoho(){

    /*
        Public Function GetSeisanNyuSyukinJoho(SeikyuYm As String, SakiSoshikiCode As String, ByRef MsgCd As String, Optional count As String="0") As SeisanNyuSyukinkinList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As SeisanNyuSyukinkinList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF3140().ToString(), SeikyuYm, SakiSoshikiCode)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim flag As Boolean = Operators.CompareString(count, "1", False) = 0
                Dim array As SeisanNyuSyukinkinList()
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(MsgCd, "SE0001", False) = 0
                    If flag2 Then
                        result = array
                        Return result
                    End If
                End If
                Dim num As Integer = 0
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanNyuSyukinkinList(num + 1 - 1) {}), SeisanNyuSyukinkinList())
                    Dim seisanNyuSyukinkinList As SeisanNyuSyukinkinList = array(num)
                    array(num) = New SeisanNyuSyukinkinList()
                    array(num).STR_SOSHIKI_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_MEI"))
                    array(num).STR_SHIHARAI_GOKEI_GK = Conversions.ToDecimal(sqlDataReader("SHIHARAI_GOKEI_GK"))
                    array(num).STR_SEIKYU_GOKEI_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_GOKEI_GK"))
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_11B As Exception
                ProjectData.SetProjectError(expr_11B)
                Dim ex As Exception = expr_11B
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