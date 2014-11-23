<?php
class KaguMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getKaguManageJoho(){

    /*
        Public Function GetKaguManageJoho(HikkoshiKbn As String, KaguCd As String, KaguBunrui As String, KaguName As String, SoshikiCd As String, ByRef MsgCd As String, FindFlg As Integer) As KaguList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As KaguList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0151().ToString(), New Object()() { HikkoshiKbn, KaguCd, KaguBunrui, KaguName, SoshikiCd })
                Else
                    strSQL = String.Format(masterSQL.SMF0150().ToString(), SoshikiCd)
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KaguList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KaguList(num + 1 - 1) {}), KaguList())
                        Dim kaguList As KaguList = array(num)
                        array(num) = New KaguList()
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        array(num).STR_HIKKOSHI_KBN = Conversions.ToString(sqlDataReader("HIKKOSHI_KBN"))
                        array(num).STR_KAGU_BUNRUI_CD = Conversions.ToString(sqlDataReader("KAGU_BUNRUI_CD"))
                        array(num).STR_KAGU_CD = Conversions.ToString(sqlDataReader("KAGU_CD"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAGU_MEI")))
                        If flag Then
                            array(num).STR_KAGU_MEI = Conversions.ToString(sqlDataReader("KAGU_MEI"))
                        Else
                            array(num).STR_KAGU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAGU_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_KAGU_RYAKU_MEI = Conversions.ToString(sqlDataReader("KAGU_RYAKU_MEI"))
                        Else
                            array(num).STR_KAGU_RYAKU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAGU_W")))
                        If flag Then
                            array(num).INT_KAGU_W = Conversions.ToInteger(sqlDataReader("KAGU_W"))
                        Else
                            array(num).INT_KAGU_W = 0
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAGU_D")))
                        If flag Then
                            array(num).INT_KAGU_D = Conversions.ToInteger(sqlDataReader("KAGU_D"))
                        Else
                            array(num).INT_KAGU_D = 0
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAGU_H")))
                        If flag Then
                            array(num).INT_KAGU_H = Conversions.ToInteger(sqlDataReader("KAGU_H"))
                        Else
                            array(num).INT_KAGU_H = 0
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAGU_M3")))
                        If flag Then
                            array(num).DEC_KAGU_M3 = Conversions.ToDecimal(sqlDataReader("KAGU_M3"))
                        Else
                            array(num).DEC_KAGU_M3 = Decimal.Zero
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
            Catch expr_46D As Exception
                ProjectData.SetProjectError(expr_46D)
                Dim ex As Exception = expr_46D
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