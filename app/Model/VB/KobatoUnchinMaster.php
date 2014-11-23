<?php
class KobatoUnchinMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteKobatoUnchinManageJoho(){

    /*
        Public Function DeleteKobatoUnchinManageJoho(KobataKbn As String, HatuTodohukenCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim kobatoUnchinMasterMeisai As KobatoUnchinMasterMeisai = New KobatoUnchinMasterMeisai()
                Dim kobatoUnchinJoho As KobatoUnchinList() = kobatoUnchinMasterMeisai.GetKobatoUnchinJoho(KobataKbn, HatuTodohukenCd, MsgCd, 0)
                Dim flag As Boolean = kobatoUnchinJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(kobatoUnchinJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DMF0251().ToString(), KobataKbn, HatuTodohukenCd)
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = kobatoUnchinJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_AE As Exception
                ProjectData.SetProjectError(expr_AE)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateKobatoUnchin(){

    /*
        Public Function UpdateKobatoUnchin(objEntity As Object(), ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim array As KobatoUnchin() = CType(objEntity, KobatoUnchin())
                Dim kobatoUnchinMasterMeisai As KobatoUnchinMasterMeisai = New KobatoUnchinMasterMeisai()
                Dim kobatoUnchinJoho As KobatoUnchinList() = kobatoUnchinMasterMeisai.GetKobatoUnchinJoho(array(0).STR_KOBATO_KBN, array(0).STR_HATSU_TODOHUKEN_CD, MsgCd, 0)
                Dim flag As Boolean = kobatoUnchinJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(kobatoUnchinJoho(0).STR_UPDATE_DT, array(0).STR_UPDATE_DT, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim mstFind As MstFind = New MstFind()
                        Dim getDATE_YYMMDDHHMMSS As String = mstFind.GetDATE_YYMMDDHHMMSS
                        Dim arg_BB_0 As Integer = 0
                        Dim num As Integer = Information.UBound(array, 1)
                        Dim num2 As Integer = arg_BB_0
                        While True
                            Dim arg_177_0 As Integer = num2
                            Dim num3 As Integer = num
                            If arg_177_0 > num3 Then
                                GoTo Block_7
                            End If
                            Dim sqlCommand As String = String.Format(masterSQL.UMF0250().ToString(), New Object()() { array(num2).STR_KOBATO_KBN, array(num2).STR_HATSU_TODOHUKEN_CD, array(num2).STR_CHAKU_TODOHUKEN_CD, array(num2).DEC_KOBATO_UNCHIN, getDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID, "0" })
                            flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                            If flag2 Then
                                Exit While
                            End If
                            num2 += 1
                        End While
                        result = False
                        Block_7:
                    End If
                Else
                    Dim flag2 As Boolean = kobatoUnchinJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_17E As Exception
                ProjectData.SetProjectError(expr_17E)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setKobatoUnchin(){

    /*
        Public Function SetKobatoUnchin(objEntity As Object(), ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim array As KobatoUnchin() = CType(objEntity, KobatoUnchin())
                Dim arg_1B_0 As Integer = 0
                Dim num As Integer = Information.UBound(array, 1)
                Dim num2 As Integer = arg_1B_0
                While True
                    Dim arg_71_0 As Integer = num2
                    Dim num3 As Integer = num
                    If arg_71_0 > num3 Then
                        GoTo Block_4
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.IMF0251().ToString(), array(num2).STR_KOBATO_KBN, array(num2).STR_HATSU_TODOHUKEN_CD)
                    Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        Exit While
                    End If
                    num2 += 1
                End While
                result = False
                Return result
                Block_4:
                Dim mstFind As MstFind = New MstFind()
                Dim getDATE_YYMMDDHHMMSS As String = mstFind.GetDATE_YYMMDDHHMMSS
                Dim arg_8C_0 As Integer = 0
                Dim num4 As Integer = Information.UBound(array, 1)
                Dim num5 As Integer = arg_8C_0
                While True
                    Dim arg_13E_0 As Integer = num5
                    Dim num3 As Integer = num4
                    If arg_13E_0 > num3 Then
                        GoTo Block_6
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.IMF0250().ToString(), New Object()() { array(num5).STR_KOBATO_KBN, array(num5).STR_HATSU_TODOHUKEN_CD, array(num5).STR_CHAKU_TODOHUKEN_CD, array(num5).DEC_KOBATO_UNCHIN, getDATE_YYMMDDHHMMSS, array(num5).STR_UPDATE_TNT_ID, array(num5).STR_GAMEN_ID })
                    Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        Exit While
                    End If
                    num5 += 1
                End While
                result = False
                Return result
                Block_6:
                result = True
            Catch expr_149 As Exception
                ProjectData.SetProjectError(expr_149)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function getKobatoUnchinJohoForMaster(){

    /*
        Public Function GetKobatoUnchinJohoForMaster(KobatoKbnSelect As String, HatsuTodohukenCdTextbox As String, MsgCd As String) As KobatoUnchinList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As KobatoUnchinList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SMF0260().ToString(), KobatoKbnSelect, HatsuTodohukenCdTextbox)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KobatoUnchinList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num < 100
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KobatoUnchinList(num + 1 - 1) {}), KobatoUnchinList())
                        Dim kobatoUnchinList As KobatoUnchinList = array(num)
                        array(num) = New KobatoUnchinList()
                        array(num).STR_KOBATO_KBN = Conversions.ToString(sqlDataReader("KOBATO_KBN"))
                        array(num).STR_HATSU_TODOHUKEN_CD = Conversions.ToString(sqlDataReader("HATSU_TODOHUKEN_CD"))
                        array(num).STR_HATSU_TODOHUKEN_MEI = Conversions.ToString(sqlDataReader("HATSU_TODOHUKEN_MEI"))
                        array(num).STR_CHAKU_TODOHUKEN_CD = Conversions.ToString(sqlDataReader("CHAKU_TODOHUKEN_CD"))
                        array(num).DEC_KOBATO_UNCHIN = Conversions.ToDecimal(sqlDataReader("KOBATO_UNCHIN"))
                        array(num).STR_CHAKU_TODOHUKEN_MEI = ""
                        array(num).STR_UPDATE_DT = ""
                        array(num).STR_UPDATE_TNT_ID = ""
                        array(num).STR_GAMEN_ID = ""
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_16C As Exception
                ProjectData.SetProjectError(expr_16C)
                Dim ex As Exception = expr_16C
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getTodofukenForMaster(){

    /*
        Public Function GetTodofukenForMaster(ByRef MsgCd As String) As TodoFukenList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As TodoFukenList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SMF0261().ToString(), New Object(0 - 1) {})
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As TodoFukenList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num < 100
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New TodoFukenList(num + 1 - 1) {}), TodoFukenList())
                        Dim todoFukenList As TodoFukenList = array(num)
                        array(num) = New TodoFukenList()
                        array(num).STR_TODOFUKEN_CD = Conversions.ToString(sqlDataReader("TODOHUKEN_CD"))
                        array(num).STR_TODOFUKEN_MEI = Conversions.ToString(sqlDataReader("TODOHUKEN_MEI"))
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_D8 As Exception
                ProjectData.SetProjectError(expr_D8)
                Dim ex As Exception = expr_D8
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