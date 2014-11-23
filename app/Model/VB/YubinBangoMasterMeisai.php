<?php
class YubinBangoMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteYubinBangoManageJoho(){

    /*
        Public Function DeleteYubinBangoManageJoho(YubinNo As String, YubinEdaNo As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim yubinMasterMeisai As YubinMasterMeisai = New YubinMasterMeisai()
                Dim yubinBangoJoho As YubinBangoList() = yubinMasterMeisai.GetYubinBangoJoho(YubinNo, "", "", "", "", "", YubinEdaNo, MsgCd, 0)
                Dim flag As Boolean = yubinBangoJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(yubinBangoJoho(0).UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0311().ToString(), YubinNo, YubinEdaNo)
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = yubinBangoJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_C7 As Exception
                ProjectData.SetProjectError(expr_C7)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateYubinBango(){

    /*
        Public Function UpdateYubinBango(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim yubinBango As YubinBango = New YubinBango()
                yubinBango = CType(objEntity, YubinBango)
                Dim yubinMasterMeisai As YubinMasterMeisai = New YubinMasterMeisai()
                Dim yubinBangoJoho As YubinBangoList() = yubinMasterMeisai.GetYubinBangoJoho(yubinBango.STR_YUBIN_NO, "", "", "", "", "", yubinBango.STR_YUBIN_EDA, MsgCd, 0)
                Dim flag As Boolean = yubinBangoJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(yubinBangoJoho(0).UPDATE_DT, yubinBango.STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim mstFind As MstFind = New MstFind()
                        Dim sqlCommand As String = String.Format(masterSQL.UMF0310().ToString(), New Object()() { yubinBango.STR_YUBIN_NO, yubinBango.STR_YUBIN_EDA, yubinBango.STR_TODOHUKEN_CD, yubinBango.STR_SHIKUGUN_CD, yubinBango.STR_ADDRESS_KANA1, yubinBango.STR_ADDRESS_KANA2, yubinBango.STR_ADDRESS_KANJI1, yubinBango.STR_ADDRESS_KANJI2, mstFind.GetDATE_YYMMDDHHMMSS, yubinBango.STR_UPDATE_TNT_ID, yubinBango.STR_GAMEN_ID, "0" })
                        flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = yubinBangoJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_18B As Exception
                ProjectData.SetProjectError(expr_18B)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setYubinBango(){

    /*
        Public Function SetYubinBango(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim yubinBango As YubinBango = New YubinBango()
                yubinBango = CType(objEntity, YubinBango)
                Dim sqlCommand As String = String.Format(masterSQL.IMF0311().ToString(), yubinBango.STR_YUBIN_NO)
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    Dim mstFind As MstFind = New MstFind()
                    sqlCommand = String.Format(masterSQL.IMF0310().ToString(), New Object()() { yubinBango.STR_YUBIN_NO, yubinBango.STR_YUBIN_EDA, yubinBango.STR_TODOHUKEN_CD, yubinBango.STR_SHIKUGUN_CD, yubinBango.STR_ADDRESS_KANA1, yubinBango.STR_ADDRESS_KANA2, yubinBango.STR_ADDRESS_KANJI1, yubinBango.STR_ADDRESS_KANJI2, mstFind.GetDATE_YYMMDDHHMMSS, yubinBango.STR_UPDATE_TNT_ID, yubinBango.STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        result = True
                    End If
                End If
            Catch expr_115 As Exception
                ProjectData.SetProjectError(expr_115)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>