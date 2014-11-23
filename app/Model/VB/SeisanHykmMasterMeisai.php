<?php
class SeisanHykmMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanHykmManageJoho(){

    /*
        Public Function GetSeisanHykmManageJoho(SeikyuYr As String, HiyokomokuMei As String, RyokinKbn As String, SoshikiCd As String, HiyokomokuCd As String, ByRef MsgCd As String, FindFlg As Integer) As SeisanHykmList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanHykmList()
            Try
                Dim text As String = Strings.Trim(Strings.Replace(SeikyuYr, "/", "", 1, -1, CompareMethod.Binary))
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SEF0811().ToString(), New Object()() { text, HiyokomokuMei, RyokinKbn, SoshikiCd, HiyokomokuCd })
                Else
                    flag = (FindFlg = 2)
                    If flag Then
                        strSQL = String.Format(masterSQL.SEF0816().ToString(), New Object()() { text, HiyokomokuMei, RyokinKbn, SoshikiCd, HiyokomokuCd })
                    Else
                        strSQL = String.Format(masterSQL.SEF0810().ToString(), SoshikiCd)
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanHykmList()
                While sqlDataReader.Read()
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanHykmList(num + 1 - 1) {}), SeisanHykmList())
                        Dim seisanHykmList As SeisanHykmList = array(num)
                        array(num) = New SeisanHykmList()
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        array(num).STR_SEIKYU_NEND = Conversions.ToString(sqlDataReader("SEIKYU_NEND"))
                        array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                        array(num).STR_RYOKIN_KEITAI = Conversions.ToString(sqlDataReader("RYOKIN_KEITAI"))
                        array(num).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_GK")))
                        If flag Then
                            array(num).DEC_HIYOKOMOKU_GK = Conversions.ToString(sqlDataReader("HIYOKOMOKU_GK"))
                        Else
                            array(num).DEC_HIYOKOMOKU_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                        Else
                            array(num).STR_SHOHIZEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_RT")))
                        If flag Then
                            array(num).DEC_SHOHIZEI_RITU = Conversions.ToString(sqlDataReader("SHOHIZEI_RT"))
                        Else
                            array(num).DEC_SHOHIZEI_RITU = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_RT")))
                        If flag Then
                            array(num).DEC_TESURYO_RT = Conversions.ToString(sqlDataReader("TESURYO_RT"))
                        Else
                            array(num).DEC_TESURYO_RT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_KEISAN_KBN")))
                        If flag Then
                            array(num).STR_TESURYO_KEISAN_KBN = Conversions.ToString(sqlDataReader("TESURYO_KEISAN_KBN"))
                        Else
                            array(num).STR_TESURYO_KEISAN_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_TESURYO_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("TESURYO_SHOHIZEI_KBN"))
                        Else
                            array(num).STR_TESURYO_SHOHIZEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDITCARD_CD")))
                        If flag Then
                            array(num).STR_CREDITCARD_CD = Conversions.ToString(sqlDataReader("CREDITCARD_CD"))
                        Else
                            array(num).STR_CREDITCARD_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDITCARD_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_CREDITCARD_MEI = Conversions.ToString(sqlDataReader("CREDITCARD_RYAKU_MEI"))
                        Else
                            array(num).STR_CREDITCARD_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_SIYO_GK")))
                        If flag Then
                            array(num).DEC_BOX_SIYO_GK = Conversions.ToString(sqlDataReader("BOX_SIYO_GK"))
                        Else
                            array(num).DEC_BOX_SIYO_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HATU_BOX_TESURYO_GK")))
                        If flag Then
                            array(num).DEC_HATU_BOX_TESURYO_GK = Conversions.ToString(sqlDataReader("HATU_BOX_TESURYO_GK"))
                        Else
                            array(num).DEC_HATU_BOX_TESURYO_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CYAKU_BOX_TESURYO_GK")))
                        If flag Then
                            array(num).DEC_CYAKU_BOX_TESURYO_GK = Conversions.ToString(sqlDataReader("CYAKU_BOX_TESURYO_GK"))
                        Else
                            array(num).DEC_CYAKU_BOX_TESURYO_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                        If flag Then
                            array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                        Else
                            array(num).STR_BIKO = ""
                        End If
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
            Catch expr_65F As Exception
                ProjectData.SetProjectError(expr_65F)
                Dim ex As Exception = expr_65F
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSeisanHykmCardManageJoho(){

    /*
        Public Function GetSeisanHykmCardManageJoho(SeikyuYr As String, HiyokomokuMei As String, RyokinKbn As String, SoshikiCd As String, Card As String, ByRef MsgCd As String, FindFlg As Integer) As SeisanHykmList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanHykmList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF0813().ToString(), SoshikiCd, Card)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanHykmList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num < 100
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanHykmList(num + 1 - 1) {}), SeisanHykmList())
                        Dim seisanHykmList As SeisanHykmList = array(num)
                        array(num) = New SeisanHykmList()
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        array(num).STR_SEIKYU_NEND = Conversions.ToString(sqlDataReader("SEIKYU_NEND"))
                        array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                        array(num).STR_RYOKIN_KEITAI = Conversions.ToString(sqlDataReader("RYOKIN_KEITAI"))
                        array(num).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_GK")))
                        If flag Then
                            array(num).DEC_HIYOKOMOKU_GK = Conversions.ToString(sqlDataReader("HIYOKOMOKU_GK"))
                        Else
                            array(num).DEC_HIYOKOMOKU_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                        Else
                            array(num).STR_SHOHIZEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_RT")))
                        If flag Then
                            array(num).DEC_SHOHIZEI_RITU = Conversions.ToString(sqlDataReader("SHOHIZEI_RT"))
                        Else
                            array(num).DEC_SHOHIZEI_RITU = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_RT")))
                        If flag Then
                            array(num).DEC_TESURYO_RT = Conversions.ToString(sqlDataReader("TESURYO_RT"))
                        Else
                            array(num).DEC_TESURYO_RT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_KEISAN_KBN")))
                        If flag Then
                            array(num).STR_TESURYO_KEISAN_KBN = Conversions.ToString(sqlDataReader("TESURYO_KEISAN_KBN"))
                        Else
                            array(num).STR_TESURYO_KEISAN_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_TESURYO_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("TESURYO_SHOHIZEI_KBN"))
                        Else
                            array(num).STR_TESURYO_SHOHIZEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDITCARD_CD")))
                        If flag Then
                            array(num).STR_CREDITCARD_CD = Conversions.ToString(sqlDataReader("CREDITCARD_CD"))
                        Else
                            array(num).STR_CREDITCARD_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDITCARD_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_CREDITCARD_MEI = Conversions.ToString(sqlDataReader("CREDITCARD_RYAKU_MEI"))
                        Else
                            array(num).STR_CREDITCARD_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_SIYO_GK")))
                        If flag Then
                            array(num).DEC_BOX_SIYO_GK = Conversions.ToString(sqlDataReader("BOX_SIYO_GK"))
                        Else
                            array(num).DEC_BOX_SIYO_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HATU_BOX_TESURYO_GK")))
                        If flag Then
                            array(num).DEC_HATU_BOX_TESURYO_GK = Conversions.ToString(sqlDataReader("HATU_BOX_TESURYO_GK"))
                        Else
                            array(num).DEC_HATU_BOX_TESURYO_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CYAKU_BOX_TESURYO_GK")))
                        If flag Then
                            array(num).DEC_CYAKU_BOX_TESURYO_GK = Conversions.ToString(sqlDataReader("CYAKU_BOX_TESURYO_GK"))
                        Else
                            array(num).DEC_CYAKU_BOX_TESURYO_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                        If flag Then
                            array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                        Else
                            array(num).STR_BIKO = ""
                        End If
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
            Catch expr_5B1 As Exception
                ProjectData.SetProjectError(expr_5B1)
                Dim ex As Exception = expr_5B1
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSeisanHykmKbtManageJoho(){

    /*
        Public Function GetSeisanHykmKbtManageJoho(SeikyuYr As String, HiyokomokuMei As String, RyokinKbn As String, SoshikiCd As String, ByRef MsgCd As String, FindFlg As Integer) As SeisanHykmList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanHykmList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF0814().ToString(), SoshikiCd)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanHykmList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num < 100
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanHykmList(num + 1 - 1) {}), SeisanHykmList())
                        Dim seisanHykmList As SeisanHykmList = array(num)
                        array(num) = New SeisanHykmList()
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        array(num).STR_SEIKYU_NEND = Conversions.ToString(sqlDataReader("SEIKYU_NEND"))
                        array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                        array(num).STR_RYOKIN_KEITAI = Conversions.ToString(sqlDataReader("RYOKIN_KEITAI"))
                        array(num).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_GK")))
                        If flag Then
                            array(num).DEC_HIYOKOMOKU_GK = Conversions.ToString(sqlDataReader("HIYOKOMOKU_GK"))
                        Else
                            array(num).DEC_HIYOKOMOKU_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                        Else
                            array(num).STR_SHOHIZEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_RT")))
                        If flag Then
                            array(num).DEC_SHOHIZEI_RITU = Conversions.ToString(sqlDataReader("SHOHIZEI_RT"))
                        Else
                            array(num).DEC_SHOHIZEI_RITU = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_RT")))
                        If flag Then
                            array(num).DEC_TESURYO_RT = Conversions.ToString(sqlDataReader("TESURYO_RT"))
                        Else
                            array(num).DEC_TESURYO_RT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_KEISAN_KBN")))
                        If flag Then
                            array(num).STR_TESURYO_KEISAN_KBN = Conversions.ToString(sqlDataReader("TESURYO_KEISAN_KBN"))
                        Else
                            array(num).STR_TESURYO_KEISAN_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_TESURYO_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("TESURYO_SHOHIZEI_KBN"))
                        Else
                            array(num).STR_TESURYO_SHOHIZEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDITCARD_CD")))
                        If flag Then
                            array(num).STR_CREDITCARD_CD = Conversions.ToString(sqlDataReader("CREDITCARD_CD"))
                        Else
                            array(num).STR_CREDITCARD_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDITCARD_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_CREDITCARD_MEI = Conversions.ToString(sqlDataReader("CREDITCARD_RYAKU_MEI"))
                        Else
                            array(num).STR_CREDITCARD_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_SIYO_GK")))
                        If flag Then
                            array(num).DEC_BOX_SIYO_GK = Conversions.ToString(sqlDataReader("BOX_SIYO_GK"))
                        Else
                            array(num).DEC_BOX_SIYO_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HATU_BOX_TESURYO_GK")))
                        If flag Then
                            array(num).DEC_HATU_BOX_TESURYO_GK = Conversions.ToString(sqlDataReader("HATU_BOX_TESURYO_GK"))
                        Else
                            array(num).DEC_HATU_BOX_TESURYO_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CYAKU_BOX_TESURYO_GK")))
                        If flag Then
                            array(num).DEC_CYAKU_BOX_TESURYO_GK = Conversions.ToString(sqlDataReader("CYAKU_BOX_TESURYO_GK"))
                        Else
                            array(num).DEC_CYAKU_BOX_TESURYO_GK = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                        If flag Then
                            array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                        Else
                            array(num).STR_BIKO = ""
                        End If
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
            Catch expr_5AF As Exception
                ProjectData.SetProjectError(expr_5AF)
                Dim ex As Exception = expr_5AF
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