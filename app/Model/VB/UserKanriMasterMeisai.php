<?php
class UserKanriMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getUserManageJoho(){

    /*
        Public Function GetUserManageJoho(UserId As String, SoshikiCode As String, ByRef MsgCd As String, FindFlg As Integer) As UserKanriList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As UserKanriList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0011().ToString(), UserId, SoshikiCode)
                Else
                    strSQL = String.Format(masterSQL.SMF0010().ToString(), New Object(0 - 1) {})
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As UserKanriList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New UserKanriList(num + 1 - 1) {}), UserKanriList())
                    Dim userKanriList As UserKanriList = array(num)
                    array(num) = New UserKanriList()
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("USER_ID")))
                    If flag Then
                        array(num).STR_USER_ID = Conversions.ToString(sqlDataReader("USER_ID"))
                    Else
                        array(num).STR_USER_ID = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("PASSWORD")))
                    If flag Then
                        array(num).STR_PASSWORD = Conversions.ToString(sqlDataReader("PASSWORD"))
                    Else
                        array(num).STR_PASSWORD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SECURITY_CD")))
                    If flag Then
                        array(num).STR_SECURITY_CD = Conversions.ToString(sqlDataReader("SECURITY_CD"))
                    Else
                        array(num).STR_SECURITY_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
                    If flag Then
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                    Else
                        array(num).STR_SOSHIKI_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("LOGIN_MEI")))
                    If flag Then
                        array(num).STR_LOGIN_MEI = Conversions.ToString(sqlDataReader("LOGIN_MEI"))
                    Else
                        array(num).STR_LOGIN_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TANTOSHA_CD")))
                    If flag Then
                        array(num).STR_TANTOSHA_CD = Conversions.ToString(sqlDataReader("TANTOSHA_CD"))
                    Else
                        array(num).STR_TANTOSHA_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIYO_FUKA_FLG")))
                    If flag Then
                        array(num).STR_SIYO_FUKA_FLG = Conversions.ToString(sqlDataReader("SIYO_FUKA_FLG"))
                    Else
                        array(num).STR_SIYO_FUKA_FLG = ""
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
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHAIN_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_SHAIN_RYAKU_MEI = Conversions.ToString(sqlDataReader("SHAIN_RYAKU_MEI"))
                    Else
                        array(num).STR_SHAIN_RYAKU_MEI = ""
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_457 As Exception
                ProjectData.SetProjectError(expr_457)
                Dim ex As Exception = expr_457
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