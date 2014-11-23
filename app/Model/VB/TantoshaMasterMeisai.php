<?php
class TantoshaMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getTantoshaManageJoho(){

    /*
        Public Function GetTantoshaManageJoho(TantoshaCd As String, SosikiCd As String, ShainName As String, ByRef MsgCd As String, FindFlg As Integer) As TantoshaList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As TantoshaList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(Strings.Trim(TantoshaCd), "", False) <> 0 And Strings.Len(TantoshaCd) < 4
                    If flag2 Then
                        strSQL = String.Format(masterSQL.SMF0071().ToString(), Strings.Trim(SosikiCd + TantoshaCd), SosikiCd, ShainName)
                    Else
                        strSQL = String.Format(masterSQL.SMF0071().ToString(), TantoshaCd, SosikiCd, ShainName)
                    End If
                Else
                    strSQL = String.Format(masterSQL.SMF0071().ToString(), "", SosikiCd, "")
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As TantoshaList()
                While sqlDataReader.Read()
                    Dim flag2 As Boolean = num >= 99
                    If flag2 Then
                        MsgCd = "SI0090"
                    End If
                    flag2 = (num < 100)
                    If flag2 Then
                        array = CType(Utils.CopyArray(CType(array, Array), New TantoshaList(num + 1 - 1) {}), TantoshaList())
                        Dim tantoshaList As TantoshaList = array(num)
                        array(num) = New TantoshaList()
                        array(num).TANTOSHA_CD = Conversions.ToString(sqlDataReader("TANTOSHA_CD"))
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHAIN_MEI")))
                        If flag2 Then
                            array(num).SHAIN_MEI = Conversions.ToString(sqlDataReader("SHAIN_MEI"))
                        Else
                            array(num).SHAIN_MEI = ""
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHAIN_RYAKU_MEI")))
                        If flag2 Then
                            array(num).SHAIN_RYAKU_MEI = Conversions.ToString(sqlDataReader("SHAIN_RYAKU_MEI"))
                        Else
                            array(num).SHAIN_RYAKU_MEI = ""
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHAIN_KANA_MEI")))
                        If flag2 Then
                            array(num).SHAIN_KANA_MEI = Conversions.ToString(sqlDataReader("SHAIN_KANA_MEI"))
                        Else
                            array(num).SHAIN_KANA_MEI = ""
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_TANTOSHA_CD")))
                        If flag2 Then
                            array(num).JISHA_TANTOSHA_CD = Conversions.ToString(sqlDataReader("JISHA_TANTOSHA_CD"))
                        Else
                            array(num).JISHA_TANTOSHA_CD = ""
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
                        If flag2 Then
                            array(num).SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                        Else
                            array(num).SOSHIKI_CD = ""
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                        If flag2 Then
                            array(num).UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                        Else
                            array(num).UPDATE_DT = ""
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
                        If flag2 Then
                            array(num).UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
                        Else
                            array(num).UPDATE_TNT_ID = ""
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
                        If flag2 Then
                            array(num).GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
                        Else
                            array(num).GAMEN_ID = ""
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                        If flag2 Then
                            array(num).SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                        Else
                            array(num).SOSHIKI_RYAKU_MEI = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_405 As Exception
                ProjectData.SetProjectError(expr_405)
                Dim ex As Exception = expr_405
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