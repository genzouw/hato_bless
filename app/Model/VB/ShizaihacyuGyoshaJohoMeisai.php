<?php
class ShizaihacyuGyoshaJohoMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getShizaiHachuGaibuGyoshaManageJoho(){

    /*
        Public Function GetShizaiHachuGaibuGyoshaManageJoho(JyobuCd As String, GyoshaCd As String, GyoshaMei As String, ByRef MsgCd As String, FindFlg As Integer) As GyoshaList()
            Dim gyosha As Gyosha = New Gyosha()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As GyoshaList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SCF0411().ToString(), JyobuCd, GyoshaCd, GyoshaMei)
                Else
                    flag = (FindFlg = 1)
                    If flag Then
                        strSQL = String.Format(masterSQL.SCF0410().ToString(), JyobuCd)
                    Else
                        flag = (FindFlg = 2)
                        If flag Then
                            strSQL = String.Format(masterSQL.SCF0614().ToString(), JyobuCd, GyoshaCd, GyoshaMei)
                        Else
                            flag = (FindFlg = 3)
                            If flag Then
                                strSQL = String.Format(masterSQL.SCF0615().ToString(), JyobuCd)
                            End If
                        End If
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As GyoshaList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New GyoshaList(num + 1 - 1) {}), GyoshaList())
                        Dim gyoshaList As GyoshaList = array(num)
                        array(num) = New GyoshaList()
                        array(num).STR_GYOSHA_CD = Conversions.ToString(sqlDataReader("GYOSHA_CD"))
                        array(num).STR_GYOSHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("GYOSHA_RYAKU_MEI"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_TELL")))
                        If flag Then
                            array(num).STR_GYOSHA_TELL = Conversions.ToString(sqlDataReader("GYOSHA_TELL"))
                        Else
                            array(num).STR_GYOSHA_TELL = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_FAX")))
                        If flag Then
                            array(num).STR_GYOSHA_FAX = Conversions.ToString(sqlDataReader("GYOSHA_FAX"))
                        Else
                            array(num).STR_GYOSHA_FAX = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_ADDRESS1")))
                        If flag Then
                            array(num).STR_GYOSHA_ADDRESS1 = Conversions.ToString(sqlDataReader("GYOSHA_ADDRESS1"))
                        Else
                            array(num).STR_GYOSHA_ADDRESS1 = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_254 As Exception
                ProjectData.SetProjectError(expr_254)
                Dim ex As Exception = expr_254
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