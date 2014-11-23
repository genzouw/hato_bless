<?php
class SeisanTeigakuMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanTeigakuManageJoho(){

    /*
        Public Function GetSeisanTeigakuManageJoho(SeikyuYr As String, MotoSoshikiCd As String, HiyoKoumokuCd As String, ByRef MsgCd As String, FindFlg As Integer) As SeisanTeigakuList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As SeisanTeigakuList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF0510().ToString(), SeikyuYr, MotoSoshikiCd, HiyoKoumokuCd)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanTeigakuList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num < 100
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanTeigakuList(num + 1 - 1) {}), SeisanTeigakuList())
                        Dim seisanTeigakuList As SeisanTeigakuList = array(num)
                        array(num) = New SeisanTeigakuList()
                        array(num).STR_SEIKYU_YM = SeikyuYr
                        array(num).STR_MOTO_SOSHIKI_CD = MotoSoshikiCd
                        array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_MEI")))
                        If flag Then
                            array(num).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                        Else
                            array(num).STR_HIYOKOMOKU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KENSU")))
                        If flag Then
                            array(num).STR_KENSU = Conversions.ToString(sqlDataReader("KENSU"))
                        Else
                            array(num).STR_KENSU = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                        If flag Then
                            array(num).SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                        Else
                            array(num).SOSHIKI_RYAKU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GOKEI_GK")))
                        If flag Then
                            array(num).STR_GOUKEI = Conversions.ToString(sqlDataReader("GOKEI_GK"))
                        Else
                            array(num).STR_GOUKEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                        Else
                            array(num).STR_SHOHIZEI_KBN = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_25A As Exception
                ProjectData.SetProjectError(expr_25A)
                Dim ex As Exception = expr_25A
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