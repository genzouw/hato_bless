<?php
class UserKanriMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteUserManageJoho(){

    /*
        Public Function DeleteUserManageJoho(SecurityName As String, UserId As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim userKanriMasterMeisai As UserKanriMasterMeisai = New UserKanriMasterMeisai()
                Dim userManageJoho As UserKanriList() = userKanriMasterMeisai.GetUserManageJoho(UserId, "", MsgCd, 0)
                Dim flag As Boolean = userManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(userManageJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0021().ToString(), UserId)
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = userManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_B1 As Exception
                ProjectData.SetProjectError(expr_B1)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateUserKanri(){

    /*
        Public Function UpdateUserKanri(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim userKanri As UserKanri = New UserKanri()
                userKanri = CType(objEntity, UserKanri)
                Dim userKanriMasterMeisai As UserKanriMasterMeisai = New UserKanriMasterMeisai()
                Dim userManageJoho As UserKanriList() = userKanriMasterMeisai.GetUserManageJoho(userKanri.STR_USER_ID, userKanri.STR_SOSHIKI_CD, MsgCd, 0)
                Dim flag As Boolean = userManageJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(userManageJoho(0).STR_UPDATE_DT, userKanri.STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim mstFind As MstFind = New MstFind()
                        Dim sqlCommand As String = String.Format(masterSQL.UMF0020().ToString(), New Object()() { userKanri.STR_USER_ID, userKanri.STR_PASSWORD, userKanri.STR_SECURITY_CD, userKanri.STR_SOSHIKI_CD, userKanri.STR_LOGIN_MEI, userKanri.STR_TANTOSHA_CD, userKanri.STR_SIYO_FUKA_FLG, mstFind.GetDATE_YYMMDDHHMMSS, userKanri.STR_GAMEN_ID, userKanri.STR_UPDATE_TNT_ID, "0" })
                        flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = userManageJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_165 As Exception
                ProjectData.SetProjectError(expr_165)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setUserKanri(){

    /*
        Public Function SetUserKanri(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim userKanri As UserKanri = New UserKanri()
                userKanri = CType(objEntity, UserKanri)
                Dim sqlCommand As String = String.Format(masterSQL.IMF0021().ToString(), userKanri.STR_USER_ID, userKanri.STR_SECURITY_CD)
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    Dim mstFind As MstFind = New MstFind()
                    sqlCommand = String.Format(masterSQL.IMF0020().ToString(), New Object()() { userKanri.STR_USER_ID, userKanri.STR_PASSWORD, userKanri.STR_SECURITY_CD, userKanri.STR_SOSHIKI_CD, userKanri.STR_LOGIN_MEI, userKanri.STR_TANTOSHA_CD, userKanri.STR_SIYO_FUKA_FLG, mstFind.GetDATE_YYMMDDHHMMSS, userKanri.STR_GAMEN_ID, userKanri.STR_UPDATE_TNT_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        result = True
                    End If
                End If
            Catch expr_10F As Exception
                ProjectData.SetProjectError(expr_10F)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>