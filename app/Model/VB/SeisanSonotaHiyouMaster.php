<?php
class SeisanSonotaHiyouMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteSeisanSonotaHiyouManageJoho(){

    /*
        Public Function DeleteSeisanSonotaHiyouManageJoho(SeikyuYm As String, MotoSoshikiCd As String, SakiSoshikiCd As String, SeikyuSiharaiCd As String, HiyokomokuCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim seisanSonotaHiyouMasterMeisai As SeisanSonotaHiyouMasterMeisai = New SeisanSonotaHiyouMasterMeisai()
                Dim sqlCommand As String = String.Format(masterSQL.DEF0190().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, SakiSoshikiCd, HiyokomokuCd })
                Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    sqlCommand = String.Format(masterSQL.DEF0194().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, SakiSoshikiCd, HiyokomokuCd, HiyokomokuCd })
                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        sqlCommand = String.Format(masterSQL.DEF0195().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, SakiSoshikiCd, HiyokomokuCd, HiyokomokuCd })
                        flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                End If
            Catch expr_116 As Exception
                ProjectData.SetProjectError(expr_116)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateSeisanSonotaHiyou(){

    /*
        Public Function UpdateSeisanSonotaHiyou(objEntity As Object, MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As Boolean
            Try
                Dim array As SeisanSonotaHiyou() = CType(objEntity, SeisanSonotaHiyou())
                Dim arg_19_0 As Integer = 0
                Dim num As Integer = Information.UBound(array, 1)
                Dim num2 As Integer = arg_19_0
                While True
                    Dim arg_3AA_0 As Integer = num2
                    Dim num3 As Integer = num
                    If arg_3AA_0 > num3 Then
                        GoTo Block_6
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.UEF0190().ToString(), New Object()() { array(num2).STR_SEIKYU_YM, array(num2).STR_MOTO_SOSHIKI_CD, array(num2).STR_SAKI_SOSHIKI_CD, "1", array(num2).STR_HIYOKOMOKU_CD, array(num2).STR_HASEI_DT, array(num2).DEC_HIYOKOMOKU_GK, array(num2).STR_SHOHIZEI_KBN, array(num2).DEC_SHOHIZEI_RT, array(num2).DEC_SHOHIZEI_GK, array(num2).DEC_TESURYO_RT, array(num2).STR_TESURYO_KEISAN_KBN, array(num2).STR_TESURYO_SHOHIZEI_KBN, array(num2).DEC_TESURYO_SHOHIZEI_GK, array(num2).DEC_TESURYO_GK, array(num2).DEC_MEISAI_HIYO_GK, array(num2).DEC_MEISAI_SHOHIZEI_GK, array(num2).DEC_MEISAI_TOTAL_GK, array(num2).DEC_MEISAI_TESURYO_GK, array(num2).DEC_SEIKYU_GOKEI_GK, array(num2).STR_BIKO, array(num2).STR_SYOSAI_TRI_MEI, array(num2).STR_SYOSAI_BIKO, array(num2).DEC_SYOSAI_KEIYU_GK, array(num2).DEC_SYOSAI_HIKITORIZEI_GK, array(num2).DEC_SYOSAI_SONOTA_GK, array(num2).DEC_SYOSAI_SYOHIZEI_GK, array(num2).DEC_SYOSAI_GOKEI_GK, array(num2).STR_UPDATE_DT, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID, "0" })
                    Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        Exit While
                    End If
                    sqlCommand = String.Format(masterSQL.UEF0314().ToString(), New Object()() { array(num2).STR_SEIKYU_YM, array(num2).STR_MOTO_SOSHIKI_CD, array(num2).STR_SAKI_SOSHIKI_CD, "1", array(num2).STR_HIYOKOMOKU_CD, array(num2).DEC_SEIKYU_GOKEI_GK, "0", array(num2).STR_UPDATE_DT, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID, "00000000" })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_4
                    End If
                    sqlCommand = String.Format(masterSQL.UEF0315().ToString(), New Object()() { array(num2).STR_SEIKYU_YM, array(num2).STR_MOTO_SOSHIKI_CD, array(num2).STR_SAKI_SOSHIKI_CD, "1", array(num2).STR_HIYOKOMOKU_CD, array(num2).STR_UPDATE_DT, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_5
                    End If
                    num2 += 1
                End While
                result = False
                Return result
                Block_4:
                result = False
                Return result
                Block_5:
                result = False
                Return result
                Block_6:
                Dim arg_3B9_0 As Integer = 0
                Dim num4 As Integer = Information.UBound(array, 1)
                Dim num5 As Integer = arg_3B9_0
                While True
                    Dim arg_747_0 As Integer = num5
                    Dim num3 As Integer = num4
                    If arg_747_0 > num3 Then
                        GoTo Block_10
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.UEF0190().ToString(), New Object()() { array(num5).STR_SEIKYU_YM, array(num5).STR_SAKI_SOSHIKI_CD, array(num5).STR_MOTO_SOSHIKI_CD, "2", array(num5).STR_HIYOKOMOKU_CD, array(num5).STR_HASEI_DT, array(num5).DEC_HIYOKOMOKU_GK, array(num5).STR_SHOHIZEI_KBN, array(num5).DEC_SHOHIZEI_RT, array(num5).DEC_SHOHIZEI_GK, array(num5).DEC_TESURYO_RT, array(num5).STR_TESURYO_KEISAN_KBN, array(num5).STR_TESURYO_SHOHIZEI_KBN, array(num5).DEC_TESURYO_SHOHIZEI_GK, array(num5).DEC_TESURYO_GK, array(num5).DEC_MEISAI_HIYO_GK, array(num5).DEC_MEISAI_SHOHIZEI_GK, array(num5).DEC_MEISAI_TOTAL_GK, array(num5).DEC_MEISAI_TESURYO_GK, array(num5).DEC_SEIKYU_GOKEI_GK, array(num5).STR_BIKO, array(num5).STR_SYOSAI_TRI_MEI, array(num5).STR_SYOSAI_BIKO, array(num5).DEC_SYOSAI_KEIYU_GK, array(num5).DEC_SYOSAI_HIKITORIZEI_GK, array(num5).DEC_SYOSAI_SONOTA_GK, array(num5).DEC_SYOSAI_SYOHIZEI_GK, array(num5).DEC_SYOSAI_GOKEI_GK, array(num5).STR_UPDATE_DT, array(num5).STR_UPDATE_TNT_ID, array(num5).STR_GAMEN_ID, "0" })
                    Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        Exit While
                    End If
                    sqlCommand = String.Format(masterSQL.UEF0314().ToString(), New Object()() { array(num5).STR_SEIKYU_YM, array(num5).STR_SAKI_SOSHIKI_CD, array(num5).STR_MOTO_SOSHIKI_CD, "2", array(num5).STR_HIYOKOMOKU_CD, "0", array(num5).DEC_SEIKYU_GOKEI_GK, array(num5).STR_UPDATE_DT, array(num5).STR_UPDATE_TNT_ID, array(num5).STR_GAMEN_ID, "00000000" })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_8
                    End If
                    sqlCommand = String.Format(masterSQL.UEF0315().ToString(), New Object()() { array(num5).STR_SEIKYU_YM, array(num5).STR_SAKI_SOSHIKI_CD, array(num5).STR_MOTO_SOSHIKI_CD, "2", array(num5).STR_HIYOKOMOKU_CD, array(num5).STR_UPDATE_DT, array(num5).STR_UPDATE_TNT_ID, array(num5).STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_9
                    End If
                    num5 += 1
                End While
                result = False
                Return result
                Block_8:
                result = False
                Return result
                Block_9:
                result = False
                Block_10:
            Catch expr_74E As Exception
                ProjectData.SetProjectError(expr_74E)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateSeisanSonotaHiyouSyosai(){

    /*
        Public Function UpdateSeisanSonotaHiyouSyosai(objEntity As Object, MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim seisanSonotaHiyouSyosai As SeisanSonotaHiyouSyosai = New SeisanSonotaHiyouSyosai()
                seisanSonotaHiyouSyosai = CType(objEntity, SeisanSonotaHiyouSyosai)
                Dim sqlCommand As String = String.Format(masterSQL.UEF0191().ToString(), New Object()() { seisanSonotaHiyouSyosai.STR_SEIKYU_YM, seisanSonotaHiyouSyosai.STR_MOTO_SOSHIKI_CD, seisanSonotaHiyouSyosai.STR_SAKI_SOSHIKI_CD, "1", Strings.Trim(seisanSonotaHiyouSyosai.STR_MOTO_SOSHIKI_CD + seisanSonotaHiyouSyosai.STR_HIYOKOMOKU_CD), seisanSonotaHiyouSyosai.STR_SYOSAI_TRI_MEI, seisanSonotaHiyouSyosai.STR_SYOSAI_BIKO, seisanSonotaHiyouSyosai.DEC_SYOSAI_KEIYU_GK, seisanSonotaHiyouSyosai.DEC_SYOSAI_HIKITORIZEI_GK, seisanSonotaHiyouSyosai.DEC_SYOSAI_SONOTA_GK, seisanSonotaHiyouSyosai.DEC_SYOSAI_SYOHIZEI_GK, seisanSonotaHiyouSyosai.DEC_SYOSAI_GOKEI_GK, seisanSonotaHiyouSyosai.STR_UPDATE_DT, seisanSonotaHiyouSyosai.STR_UPDATE_TNT_ID, seisanSonotaHiyouSyosai.STR_GAMEN_ID })
                Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    sqlCommand = String.Format(masterSQL.UEF0191().ToString(), New Object()() { seisanSonotaHiyouSyosai.STR_SEIKYU_YM, seisanSonotaHiyouSyosai.STR_SAKI_SOSHIKI_CD, seisanSonotaHiyouSyosai.STR_MOTO_SOSHIKI_CD, "2", Strings.Trim(seisanSonotaHiyouSyosai.STR_MOTO_SOSHIKI_CD + seisanSonotaHiyouSyosai.STR_HIYOKOMOKU_CD), seisanSonotaHiyouSyosai.STR_SYOSAI_TRI_MEI, seisanSonotaHiyouSyosai.STR_SYOSAI_BIKO, seisanSonotaHiyouSyosai.DEC_SYOSAI_KEIYU_GK, seisanSonotaHiyouSyosai.DEC_SYOSAI_HIKITORIZEI_GK, seisanSonotaHiyouSyosai.DEC_SYOSAI_SONOTA_GK, seisanSonotaHiyouSyosai.DEC_SYOSAI_SYOHIZEI_GK, seisanSonotaHiyouSyosai.DEC_SYOSAI_GOKEI_GK, seisanSonotaHiyouSyosai.STR_UPDATE_DT, seisanSonotaHiyouSyosai.STR_UPDATE_TNT_ID, seisanSonotaHiyouSyosai.STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    End If
                End If
            Catch expr_1FE As Exception
                ProjectData.SetProjectError(expr_1FE)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setSeisanSonotaHiyou(){

    /*
        Public Function SetSeisanSonotaHiyou(objEntity As Object(), ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As Boolean
            Try
                Dim array As SeisanSonotaHiyou() = CType(objEntity, SeisanSonotaHiyou())
                Dim arg_19_0 As Integer = 0
                Dim num As Integer = Information.UBound(array, 1)
                Dim num2 As Integer = arg_19_0
                While True
                    Dim arg_562_0 As Integer = num2
                    Dim num3 As Integer = num
                    If arg_562_0 > num3 Then
                        GoTo Block_9
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.DEF0191().ToString(), New Object()() { array(num2).STR_SEIKYU_YM, array(num2).STR_MOTO_SOSHIKI_CD, array(num2).STR_SAKI_SOSHIKI_CD, "1", array(num2).STR_HIYOKOMOKU_CD })
                    Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        Exit While
                    End If
                    sqlCommand = String.Format(masterSQL.DEF0192().ToString(), New Object()() { array(num2).STR_SEIKYU_YM, array(num2).STR_MOTO_SOSHIKI_CD, array(num2).STR_SAKI_SOSHIKI_CD, "1", array(num2).STR_HIYOKOMOKU_CD })
                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_4
                    End If
                    sqlCommand = String.Format(masterSQL.DEF0193().ToString(), New Object()() { array(num2).STR_SEIKYU_YM, array(num2).STR_MOTO_SOSHIKI_CD, array(num2).STR_SAKI_SOSHIKI_CD, "1", array(num2).STR_HIYOKOMOKU_CD })
                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_5
                    End If
                    sqlCommand = String.Format(masterSQL.IEF0190().ToString(), New Object()() { array(num2).STR_SEIKYU_YM, array(num2).STR_MOTO_SOSHIKI_CD, array(num2).STR_SAKI_SOSHIKI_CD, "1", array(num2).STR_HIYOKOMOKU_CD, array(num2).STR_HASEI_DT, array(num2).DEC_HIYOKOMOKU_GK, array(num2).STR_SHOHIZEI_KBN, array(num2).DEC_SHOHIZEI_RT, array(num2).DEC_SHOHIZEI_GK, array(num2).DEC_TESURYO_RT, array(num2).STR_TESURYO_KEISAN_KBN, array(num2).STR_TESURYO_SHOHIZEI_KBN, array(num2).DEC_TESURYO_SHOHIZEI_GK, array(num2).DEC_TESURYO_GK, array(num2).DEC_MEISAI_HIYO_GK, array(num2).DEC_MEISAI_SHOHIZEI_GK, array(num2).DEC_MEISAI_TOTAL_GK, array(num2).DEC_MEISAI_TESURYO_GK, array(num2).DEC_SEIKYU_GOKEI_GK, array(num2).STR_BIKO, array(num2).STR_SYOSAI_TRI_MEI, array(num2).STR_SYOSAI_BIKO, array(num2).DEC_SYOSAI_KEIYU_GK, array(num2).DEC_SYOSAI_HIKITORIZEI_GK, array(num2).DEC_SYOSAI_SONOTA_GK, array(num2).DEC_SYOSAI_SYOHIZEI_GK, array(num2).DEC_SYOSAI_GOKEI_GK, array(num2).STR_UPDATE_DT, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_6
                    End If
                    sqlCommand = String.Format(masterSQL.IEF0314().ToString(), New Object()() { array(num2).STR_SEIKYU_YM, array(num2).STR_MOTO_SOSHIKI_CD, array(num2).STR_SAKI_SOSHIKI_CD, "1", "1", array(num2).STR_HIYOKOMOKU_CD, array(num2).DEC_SEIKYU_GOKEI_GK, "0", "", array(num2).STR_UPDATE_DT, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_7
                    End If
                    sqlCommand = String.Format(masterSQL.IEF0315().ToString(), New Object()() { array(num2).STR_SEIKYU_YM, array(num2).STR_MOTO_SOSHIKI_CD, array(num2).STR_SAKI_SOSHIKI_CD, "1", array(num2).STR_HIYOKOMOKU_CD, "1", array(num2).STR_HIYOKOMOKU_CD, "", "", "0", array(num2).STR_UPDATE_DT, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID, array(num2).STR_DELETE_FLG })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_8
                    End If
                    num2 += 1
                End While
                result = False
                Return result
                Block_4:
                result = False
                Return result
                Block_5:
                result = False
                Return result
                Block_6:
                result = False
                Return result
                Block_7:
                result = False
                Return result
                Block_8:
                result = False
                Return result
                Block_9:
                Dim arg_571_0 As Integer = 0
                Dim num4 As Integer = Information.UBound(array, 1)
                Dim num5 As Integer = arg_571_0
                While True
                    Dim arg_AB7_0 As Integer = num5
                    Dim num3 As Integer = num4
                    If arg_AB7_0 > num3 Then
                        GoTo Block_16
                    End If
                    Dim sqlCommand As String = String.Format(masterSQL.DEF0191().ToString(), New Object()() { array(num5).STR_SEIKYU_YM, array(num5).STR_SAKI_SOSHIKI_CD, array(num5).STR_MOTO_SOSHIKI_CD, "2", array(num5).STR_HIYOKOMOKU_CD })
                    Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        Exit While
                    End If
                    sqlCommand = String.Format(masterSQL.DEF0192().ToString(), New Object()() { array(num5).STR_SEIKYU_YM, array(num5).STR_SAKI_SOSHIKI_CD, array(num5).STR_MOTO_SOSHIKI_CD, "2", array(num5).STR_HIYOKOMOKU_CD })
                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_11
                    End If
                    sqlCommand = String.Format(masterSQL.DEF0193().ToString(), New Object()() { array(num5).STR_SEIKYU_YM, array(num5).STR_SAKI_SOSHIKI_CD, array(num5).STR_MOTO_SOSHIKI_CD, "2", array(num5).STR_HIYOKOMOKU_CD })
                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_12
                    End If
                    sqlCommand = String.Format(masterSQL.IEF0190().ToString(), New Object()() { array(num5).STR_SEIKYU_YM, array(num5).STR_SAKI_SOSHIKI_CD, array(num5).STR_MOTO_SOSHIKI_CD, "2", array(num5).STR_HIYOKOMOKU_CD, array(num5).STR_HASEI_DT, array(num5).DEC_HIYOKOMOKU_GK, array(num5).STR_SHOHIZEI_KBN, array(num5).DEC_SHOHIZEI_RT, array(num5).DEC_SHOHIZEI_GK, array(num5).DEC_TESURYO_RT, array(num5).STR_TESURYO_KEISAN_KBN, array(num5).STR_TESURYO_SHOHIZEI_KBN, array(num5).DEC_TESURYO_SHOHIZEI_GK, array(num5).DEC_TESURYO_GK, array(num5).DEC_MEISAI_HIYO_GK, array(num5).DEC_MEISAI_SHOHIZEI_GK, array(num5).DEC_MEISAI_TOTAL_GK, array(num5).DEC_MEISAI_TESURYO_GK, array(num5).DEC_SEIKYU_GOKEI_GK, array(num5).STR_BIKO, array(num5).STR_SYOSAI_TRI_MEI, array(num5).STR_SYOSAI_BIKO, array(num5).DEC_SYOSAI_KEIYU_GK, array(num5).DEC_SYOSAI_HIKITORIZEI_GK, array(num5).DEC_SYOSAI_SONOTA_GK, array(num5).DEC_SYOSAI_SYOHIZEI_GK, array(num5).DEC_SYOSAI_GOKEI_GK, array(num5).STR_UPDATE_DT, array(num5).STR_UPDATE_TNT_ID, array(num5).STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_13
                    End If
                    sqlCommand = String.Format(masterSQL.IEF0314().ToString(), New Object()() { array(num5).STR_SEIKYU_YM, array(num5).STR_SAKI_SOSHIKI_CD, array(num5).STR_MOTO_SOSHIKI_CD, "2", "1", array(num5).STR_HIYOKOMOKU_CD, "0", array(num5).DEC_SEIKYU_GOKEI_GK, "", array(num5).STR_UPDATE_DT, array(num5).STR_UPDATE_TNT_ID, array(num5).STR_GAMEN_ID })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_14
                    End If
                    sqlCommand = String.Format(masterSQL.IEF0315().ToString(), New Object()() { array(num5).STR_SEIKYU_YM, array(num5).STR_SAKI_SOSHIKI_CD, array(num5).STR_MOTO_SOSHIKI_CD, "2", array(num5).STR_HIYOKOMOKU_CD, "1", array(num5).STR_HIYOKOMOKU_CD, "", "", "0", array(num5).STR_UPDATE_DT, array(num5).STR_UPDATE_TNT_ID, array(num5).STR_GAMEN_ID, array(num5).STR_DELETE_FLG })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        GoTo Block_15
                    End If
                    num5 += 1
                End While
                result = False
                Return result
                Block_11:
                result = False
                Return result
                Block_12:
                result = False
                Return result
                Block_13:
                result = False
                Return result
                Block_14:
                result = False
                Return result
                Block_15:
                result = False
                Return result
                Block_16:
                result = True
            Catch expr_AC2 As Exception
                ProjectData.SetProjectError(expr_AC2)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>