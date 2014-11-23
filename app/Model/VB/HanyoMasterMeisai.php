<?php
class HanyoMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getHanyo(){

    /*
        Public Function GetHanyo(HanyoKbn As String, HanyoMeiKbn As String, HanyoMei As String, SoshikiCd As String, ByRef MsgCd As String, FindFlg As Integer) As HanyoList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim flag As Boolean = Operators.CompareString(HanyoKbn, "00", False) = 0
            If flag Then
                HanyoKbn = ""
            End If
            Dim result As HanyoList()
            Try
                flag = (FindFlg = 0)
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0291().ToString(), New Object()() { HanyoKbn, HanyoMeiKbn, HanyoMei, SoshikiCd })
                Else
                    strSQL = String.Format(masterSQL.SMF0290().ToString(), New Object()() { "", "", "", SoshikiCd })
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As HanyoList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New HanyoList(num + 1 - 1) {}), HanyoList())
                        Dim hanyoList As HanyoList = array(num)
                        array(num) = New HanyoList()
                        array(num).STR_HANYO_KBN = Conversions.ToString(sqlDataReader("HANYO_KBN"))
                        array(num).STR_HANYO_MEI_KBN = Conversions.ToString(sqlDataReader("HANYO_MEI_KBN"))
                        array(num).STR_HANYO_MEI = Conversions.ToString(sqlDataReader("HANYO_MEI"))
                        array(num).STR_HANYO_CD = Conversions.ToString(sqlDataReader("HANYO_CD"))
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
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
            Catch expr_306 As Exception
                ProjectData.SetProjectError(expr_306)
                Dim ex As Exception = expr_306
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