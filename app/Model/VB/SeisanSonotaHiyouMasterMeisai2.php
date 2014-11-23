<?php
class SeisanSonotaHiyouMasterMeisai2 extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanSonotaHiyouManage2Joho(){

    /*
        Public Function GetSeisanSonotaHiyouManage2Joho(SeikyuYmFrom As String, SeikyuYmFromTo As String, MotoSoshikiCd As String, HiyoKomokuCd As String, SakiSeikyuSakiCode As String, ByRef MsgCd As String, FindFlg As Integer) As SeisanSonotaHiyou2List()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanSonotaHiyou2List()
            Try
                SeikyuYmFrom = Strings.Trim(Strings.Replace(SeikyuYmFrom, "/", "", 1, -1, CompareMethod.Binary))
                SeikyuYmFromTo = Strings.Trim(Strings.Replace(SeikyuYmFromTo, "/", "", 1, -1, CompareMethod.Binary))
                Dim flag As Boolean = Operators.CompareString(Strings.Trim(SeikyuYmFromTo), "", False) = 0
                If flag Then
                    SeikyuYmFromTo = "99999999"
                End If
                flag = (FindFlg = 0)
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SEF0190().ToString(), New Object()() { SeikyuYmFrom, SeikyuYmFromTo, MotoSoshikiCd, SakiSeikyuSakiCode, HiyoKomokuCd, SakiSeikyuSakiCode })
                Else
                    strSQL = String.Format(masterSQL.SEF0190().ToString(), New Object()() { SeikyuYmFrom, SeikyuYmFromTo, MotoSoshikiCd, SakiSeikyuSakiCode, HiyoKomokuCd, SakiSeikyuSakiCode })
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanSonotaHiyou2List()
                While sqlDataReader.Read()
                    flag = (num < 1001)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanSonotaHiyou2List(num + 1 - 1) {}), SeisanSonotaHiyou2List())
                        Dim seisanSonotaHiyou2List As SeisanSonotaHiyou2List = array(num)
                        array(num) = New SeisanSonotaHiyou2List()
                        array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
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
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAKI_SOSHIKI_CD")))
                        If flag Then
                            array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                        Else
                            array(num).STR_SAKI_SOSHIKI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_SOSHKI_RYAKU_MEI = RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                        Else
                            array(num).STR_SOSHKI_RYAKU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GOKEI_GK")))
                        If flag Then
                            array(num).STR_GOKEI_GK = Conversions.ToString(sqlDataReader("GOKEI_GK"))
                        Else
                            array(num).STR_GOKEI_GK = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_336 As Exception
                ProjectData.SetProjectError(expr_336)
                Dim ex As Exception = expr_336
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