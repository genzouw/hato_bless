<?php
class TodofukenMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getTodofukenJoho(){

    /*
        Public Function GetTodofukenJoho(TodofukenCode As String, TodofukenMei As String, ByRef msgcd As String, FindFlg As String) As TodoFukenList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As TodoFukenList()
            Try
                Dim flag As Boolean = Conversions.ToDouble(FindFlg) = 0.0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0262().ToString(), TodofukenCode, TodofukenMei)
                Else
                    strSQL = String.Format(masterSQL.SMF0261().ToString(), New Object(0 - 1) {})
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, msgcd)
                Dim num As Integer = 0
                Dim array As TodoFukenList()
                While sqlDataReader.Read()
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New TodoFukenList(num + 1 - 1) {}), TodoFukenList())
                        Dim todoFukenList As TodoFukenList = array(num)
                        array(num) = New TodoFukenList()
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TODOHUKEN_CD")))
                        If flag Then
                            array(num).STR_TODOFUKEN_CD = ""
                        Else
                            array(num).STR_TODOFUKEN_CD = Conversions.ToString(sqlDataReader("TODOHUKEN_CD"))
                        End If
                        flag = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TODOHUKEN_MEI")))
                        If flag Then
                            array(num).STR_TODOFUKEN_MEI = ""
                        Else
                            array(num).STR_TODOFUKEN_MEI = Conversions.ToString(sqlDataReader("TODOHUKEN_MEI"))
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_16C As Exception
                ProjectData.SetProjectError(expr_16C)
                Dim ex As Exception = expr_16C
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