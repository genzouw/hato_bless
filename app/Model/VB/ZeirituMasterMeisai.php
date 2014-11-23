<?php
class ZeirituMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getZeirituManageJoho(){

    /*
        Public Function GetZeirituManageJoho(SeikyuYr As String, ByRef MsgCd As String, FindFlg As Integer) As ZeirituList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As ZeirituList()
            Try
                Dim text As String = Strings.Trim(Strings.Replace(SeikyuYr, "/", "", 1, -1, CompareMethod.Binary)) + "01"
                Dim strSQL As String = String.Format(masterSQL.SEF0815().ToString(), text, text)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As ZeirituList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num < 100
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New ZeirituList(num + 1 - 1) {}), ZeirituList())
                        Dim zeirituList As ZeirituList = array(num)
                        array(num) = New ZeirituList()
                        array(num).STR_TEKIYO_KAISI_DT = Conversions.ToString(sqlDataReader("TEKIYO_KAISI_DT"))
                        array(num).STR_TEKIYO_SHURYO_DT = Conversions.ToString(sqlDataReader("TEKIYO_SHURYO_DT"))
                        array(num).DEC_SHOHIZEI_RT = Conversions.ToString(sqlDataReader("SHOHIZEI_RT"))
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
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_202 As Exception
                ProjectData.SetProjectError(expr_202)
                Dim ex As Exception = expr_202
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