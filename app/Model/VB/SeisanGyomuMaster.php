<?php
class SeisanGyomuMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteUserManageJoho(){

    /*
        Public Function DeleteUserManageJoho(SecurityName As String, UserId As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim sqlCommand As String = String.Format(masterSQL.DMF0030().ToString(), UserId, SecurityName)
                Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    result = True
                End If
            Catch expr_3C As Exception
                ProjectData.SetProjectError(expr_3C)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateUserKanri(){

    /*
        Public Function UpdateUserKanri(objEntity As Object, MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim userKanri As UserKanri = New UserKanri()
                userKanri = CType(objEntity, UserKanri)
                Dim sqlCommand As String = String.Format(masterSQL.DMF0030().ToString(), userKanri.STR_USER_ID, userKanri.STR_SECURITY_CD)
                Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    sqlCommand = String.Format(masterSQL.IMF0030().ToString(), New Object()() { userKanri.STR_USER_ID, userKanri.STR_PASSWORD, userKanri.STR_SECURITY_CD, userKanri.STR_SOSHIKI_CD, userKanri.STR_LOGIN_MEI, userKanri.STR_TANTOSHA_CD, userKanri.STR_UPDATE_DT, userKanri.STR_GAMEN_ID, userKanri.STR_UPDATE_TNT_ID, "1" })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    End If
                End If
            Catch expr_F9 As Exception
                ProjectData.SetProjectError(expr_F9)
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
                Dim sqlCommand As String = String.Format(masterSQL.IMF0030().ToString(), New Object()() { userKanri.STR_USER_ID, userKanri.STR_PASSWORD, userKanri.STR_SECURITY_CD, userKanri.STR_SOSHIKI_CD, userKanri.STR_LOGIN_MEI, userKanri.STR_TANTOSHA_CD, userKanri.STR_UPDATE_DT, userKanri.STR_GAMEN_ID, userKanri.STR_UPDATE_TNT_ID })
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    result = True
                End If
            Catch expr_B5 As Exception
                ProjectData.SetProjectError(expr_B5)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>