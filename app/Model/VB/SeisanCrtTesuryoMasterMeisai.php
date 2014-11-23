<?php
class SeisanCrtTesuryoMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteSeisanCrtTesuryoManageJoho(){

    /*
        Public Function DeleteSeisanCrtTesuryoManageJoho(SeikyuYm As String, MotoSoshikiCd As String, HiyokomokuCd As String, UketsukeNo As String, SakiSoshikiCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim seisanCrtTesuryoMeisai As SeisanCrtTesuryoMeisai = New SeisanCrtTesuryoMeisai()
                Dim sqlCommand As String = String.Format(masterSQL.DEF0631().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, SakiSoshikiCd, HiyokomokuCd, UketsukeNo })
                Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    sqlCommand = String.Format(masterSQL.DEF0202().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, SakiSoshikiCd, UketsukeNo })
                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        sqlCommand = String.Format(masterSQL.DEF0203().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, SakiSoshikiCd, UketsukeNo })
                        flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag Then
                            result = False
                        Else
                            result = True
                        End If
                    End If
                End If
            Catch expr_111 As Exception
                ProjectData.SetProjectError(expr_111)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateSeisanCrtTesuryo(){

    /*
        Public Function UpdateSeisanCrtTesuryo(objEntity As Object, MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim seisanCrtTesuryo As SeisanCrtTesuryo = New SeisanCrtTesuryo()
                seisanCrtTesuryo = CType(objEntity, SeisanCrtTesuryo)
                Dim seisanCrtTesuryoMeisai As SeisanCrtTesuryoMeisai = New SeisanCrtTesuryoMeisai()
                Dim mstFind As MstFind = New MstFind()
                Dim sqlCommand As String = String.Format(masterSQL.UEF0630().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_HASEI_DT, seisanCrtTesuryo.STR_CREDITCARD_CD, seisanCrtTesuryo.INT_CREDIT_SHIHARAI_SU, seisanCrtTesuryo.DEC_HOKA_TESURYO_RT, seisanCrtTesuryo.DEC_TESURYO_RT, seisanCrtTesuryo.STR_TESURYO_KEISAN_KBN, seisanCrtTesuryo.STR_TESURYO_SHOHIZEI_KBN, seisanCrtTesuryo.DEC_TESURYO_SHOHIZEI_RT, seisanCrtTesuryo.STR_SAGYO_SOSHIKI_CD, seisanCrtTesuryo.STR_KOKYAKUMEI, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_KBN, seisanCrtTesuryo.STR_KESSAI_KBN, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_DT, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_GK, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_RT, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_GK, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_KEI, seisanCrtTesuryo.STR_SEISAN_DT, seisanCrtTesuryo.STR_OROSHI_DT, seisanCrtTesuryo.STR_JUCHU_UPDATE_DT, seisanCrtTesuryo.STR_JUCHU_TNT_CD, seisanCrtTesuryo.DEC_SEISAN_CRT_SEIKYU_GK, seisanCrtTesuryo.DEC_SEISAN_HOKA_TESU_GK, seisanCrtTesuryo.DEC_SEISAN_TESU_GK, seisanCrtTesuryo.DEC_SEIKYU_GOKEI_GK, seisanCrtTesuryo.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, "0" })
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    sqlCommand = String.Format(masterSQL.UEF0314().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.DEC_SEIKYU_GOKEI_GK, "0", mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, seisanCrtTesuryo.STR_UKETSUKE_NO })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        sqlCommand = String.Format(masterSQL.UEF0315().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID })
                        flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag Then
                            result = False
                        Else
                            sqlCommand = String.Format(masterSQL.UEF0630().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_HASEI_DT, seisanCrtTesuryo.STR_CREDITCARD_CD, seisanCrtTesuryo.INT_CREDIT_SHIHARAI_SU, seisanCrtTesuryo.DEC_HOKA_TESURYO_RT, seisanCrtTesuryo.DEC_TESURYO_RT, seisanCrtTesuryo.STR_TESURYO_KEISAN_KBN, seisanCrtTesuryo.STR_TESURYO_SHOHIZEI_KBN, seisanCrtTesuryo.DEC_TESURYO_SHOHIZEI_RT, seisanCrtTesuryo.STR_SAGYO_SOSHIKI_CD, seisanCrtTesuryo.STR_KOKYAKUMEI, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_KBN, seisanCrtTesuryo.STR_KESSAI_KBN, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_DT, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_GK, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_RT, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_GK, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_KEI, seisanCrtTesuryo.STR_SEISAN_DT, seisanCrtTesuryo.STR_OROSHI_DT, seisanCrtTesuryo.STR_JUCHU_UPDATE_DT, seisanCrtTesuryo.STR_JUCHU_TNT_CD, seisanCrtTesuryo.DEC_SEISAN_CRT_SEIKYU_GK, seisanCrtTesuryo.DEC_SEISAN_HOKA_TESU_GK, seisanCrtTesuryo.DEC_SEISAN_TESU_GK, seisanCrtTesuryo.DEC_SEIKYU_GOKEI_GK, seisanCrtTesuryo.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, "0" })
                            flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                            If flag Then
                                result = False
                            Else
                                sqlCommand = String.Format(masterSQL.UEF0314().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, "0", seisanCrtTesuryo.DEC_SEIKYU_GOKEI_GK, mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                If flag Then
                                    result = False
                                Else
                                    sqlCommand = String.Format(masterSQL.UEF0315().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID })
                                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                    If flag Then
                                        result = False
                                    End If
                                End If
                            End If
                        End If
                    End If
                End If
            Catch expr_74D As Exception
                ProjectData.SetProjectError(expr_74D)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setSeisanCrtTesuryo(){

    /*
        Public Function SetSeisanCrtTesuryo(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim mstFind As MstFind = New MstFind()
                Dim seisanCrtTesuryo As SeisanCrtTesuryo = New SeisanCrtTesuryo()
                seisanCrtTesuryo = CType(objEntity, SeisanCrtTesuryo)
                Dim sqlCommand As String = String.Format(masterSQL.IEF0631().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.STR_UKETSUKE_NO })
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    sqlCommand = String.Format(masterSQL.DEF0200().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.STR_UKETSUKE_NO })
                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        sqlCommand = String.Format(masterSQL.DEF0201().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.STR_UKETSUKE_NO })
                        flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag Then
                            result = False
                        Else
                            sqlCommand = String.Format(masterSQL.IEF0630().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_HASEI_DT, seisanCrtTesuryo.STR_CREDITCARD_CD, seisanCrtTesuryo.INT_CREDIT_SHIHARAI_SU, seisanCrtTesuryo.DEC_HOKA_TESURYO_RT, seisanCrtTesuryo.DEC_TESURYO_RT, seisanCrtTesuryo.STR_TESURYO_KEISAN_KBN, seisanCrtTesuryo.STR_TESURYO_SHOHIZEI_KBN, seisanCrtTesuryo.DEC_TESURYO_SHOHIZEI_RT, seisanCrtTesuryo.STR_SAGYO_SOSHIKI_CD, seisanCrtTesuryo.STR_KOKYAKUMEI, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_KBN, seisanCrtTesuryo.STR_KESSAI_KBN, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_DT, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_GK, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_RT, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_GK, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_KEI, seisanCrtTesuryo.STR_SEISAN_DT, seisanCrtTesuryo.STR_OROSHI_DT, seisanCrtTesuryo.STR_JUCHU_UPDATE_DT, seisanCrtTesuryo.STR_JUCHU_TNT_CD, seisanCrtTesuryo.DEC_SEISAN_CRT_SEIKYU_GK, seisanCrtTesuryo.DEC_SEISAN_HOKA_TESU_GK, seisanCrtTesuryo.DEC_SEISAN_TESU_GK, seisanCrtTesuryo.DEC_SEIKYU_GOKEI_GK, seisanCrtTesuryo.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID })
                            flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                            If flag Then
                                result = False
                            Else
                                sqlCommand = String.Format(masterSQL.IEF0317().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "1", "1", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.DEC_SEIKYU_GOKEI_GK, "0", "", mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                If flag Then
                                    result = False
                                Else
                                    sqlCommand = String.Format(masterSQL.IEF0315().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, "1", seisanCrtTesuryo.STR_UKETSUKE_NO, "", "", "0", mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, "0" })
                                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                    If flag Then
                                        result = False
                                    Else
                                        sqlCommand = String.Format(masterSQL.IEF0631().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                        flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                        If flag Then
                                            result = False
                                        Else
                                            sqlCommand = String.Format(masterSQL.DEF0200().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                            flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                                            If flag Then
                                                result = False
                                            Else
                                                sqlCommand = String.Format(masterSQL.DEF0201().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                                flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                                                If flag Then
                                                    result = False
                                                Else
                                                    sqlCommand = String.Format(masterSQL.IEF0630().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_HASEI_DT, seisanCrtTesuryo.STR_CREDITCARD_CD, seisanCrtTesuryo.INT_CREDIT_SHIHARAI_SU, seisanCrtTesuryo.DEC_HOKA_TESURYO_RT, seisanCrtTesuryo.DEC_TESURYO_RT, seisanCrtTesuryo.STR_TESURYO_KEISAN_KBN, seisanCrtTesuryo.STR_TESURYO_SHOHIZEI_KBN, seisanCrtTesuryo.DEC_TESURYO_SHOHIZEI_RT, seisanCrtTesuryo.STR_SAGYO_SOSHIKI_CD, seisanCrtTesuryo.STR_KOKYAKUMEI, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_KBN, seisanCrtTesuryo.STR_KESSAI_KBN, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_DT, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_GK, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_RT, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_GK, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_KEI, seisanCrtTesuryo.STR_SEISAN_DT, seisanCrtTesuryo.STR_OROSHI_DT, seisanCrtTesuryo.STR_JUCHU_UPDATE_DT, seisanCrtTesuryo.STR_JUCHU_TNT_CD, seisanCrtTesuryo.DEC_SEISAN_CRT_SEIKYU_GK, seisanCrtTesuryo.DEC_SEISAN_HOKA_TESU_GK, seisanCrtTesuryo.DEC_SEISAN_TESU_GK, seisanCrtTesuryo.DEC_SEIKYU_GOKEI_GK, seisanCrtTesuryo.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID })
                                                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                    If flag Then
                                                        result = False
                                                    Else
                                                        sqlCommand = String.Format(masterSQL.IEF0317().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "2", "1", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, "0", seisanCrtTesuryo.DEC_SEIKYU_GOKEI_GK, "", mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                                        flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                        If flag Then
                                                            result = False
                                                        Else
                                                            sqlCommand = String.Format(masterSQL.IEF0315().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_HIYOKOMOKU_CD, "1", seisanCrtTesuryo.STR_UKETSUKE_NO, "", "", "0", mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, "0" })
                                                            flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                            If flag Then
                                                                result = False
                                                            Else
                                                                sqlCommand = String.Format(masterSQL.IEF0631().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                                                flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                                If flag Then
                                                                    result = False
                                                                Else
                                                                    sqlCommand = String.Format(masterSQL.DEF0200().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                                                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                                                                    If flag Then
                                                                        result = False
                                                                    Else
                                                                        sqlCommand = String.Format(masterSQL.DEF0201().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                                                        flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                                                                        If flag Then
                                                                            result = False
                                                                        Else
                                                                            sqlCommand = String.Format(masterSQL.IEF0630().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_HASEI_DT, seisanCrtTesuryo.STR_CREDITCARD_CD, seisanCrtTesuryo.INT_CREDIT_SHIHARAI_SU, seisanCrtTesuryo.DEC_HOKA_TESURYO_RT, seisanCrtTesuryo.DEC_TESURYO_RT, seisanCrtTesuryo.STR_TESURYO_KEISAN_KBN, seisanCrtTesuryo.STR_TESURYO_SHOHIZEI_KBN, seisanCrtTesuryo.DEC_TESURYO_SHOHIZEI_RT, seisanCrtTesuryo.STR_SAGYO_SOSHIKI_CD, seisanCrtTesuryo.STR_KOKYAKUMEI, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_KBN, seisanCrtTesuryo.STR_KESSAI_KBN, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_DT, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_GK, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_RT, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_GK, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_KEI, seisanCrtTesuryo.STR_SEISAN_DT, seisanCrtTesuryo.STR_OROSHI_DT, seisanCrtTesuryo.STR_JUCHU_UPDATE_DT, seisanCrtTesuryo.STR_JUCHU_TNT_CD, "0", "0", "0", seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_KEI, seisanCrtTesuryo.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID })
                                                                            flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                                            If flag Then
                                                                                result = False
                                                                            Else
                                                                                sqlCommand = String.Format(masterSQL.IEF0317().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "1", "1", seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_KEI, "0", "", mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                                                                flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                                                If flag Then
                                                                                    result = False
                                                                                Else
                                                                                    sqlCommand = String.Format(masterSQL.IEF0315().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, "1", seisanCrtTesuryo.STR_UKETSUKE_NO, "1", seisanCrtTesuryo.STR_UKETSUKE_NO, "", "", "0", mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, "0" })
                                                                                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                                                    If flag Then
                                                                                        result = False
                                                                                    Else
                                                                                        sqlCommand = String.Format(masterSQL.IEF0631().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                                                                        flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                                                        If flag Then
                                                                                            result = False
                                                                                        Else
                                                                                            sqlCommand = String.Format(masterSQL.DEF0200().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                                                                            flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                                                                                            If flag Then
                                                                                                result = False
                                                                                            Else
                                                                                                sqlCommand = String.Format(masterSQL.DEF0201().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                                                                                flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                                                                                                If flag Then
                                                                                                    result = False
                                                                                                Else
                                                                                                    sqlCommand = String.Format(masterSQL.IEF0630().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_UKETSUKE_NO, seisanCrtTesuryo.STR_HASEI_DT, seisanCrtTesuryo.STR_CREDITCARD_CD, seisanCrtTesuryo.INT_CREDIT_SHIHARAI_SU, seisanCrtTesuryo.DEC_HOKA_TESURYO_RT, seisanCrtTesuryo.DEC_TESURYO_RT, seisanCrtTesuryo.STR_TESURYO_KEISAN_KBN, seisanCrtTesuryo.STR_TESURYO_SHOHIZEI_KBN, seisanCrtTesuryo.DEC_TESURYO_SHOHIZEI_RT, seisanCrtTesuryo.STR_SAGYO_SOSHIKI_CD, seisanCrtTesuryo.STR_KOKYAKUMEI, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_KBN, seisanCrtTesuryo.STR_KESSAI_KBN, seisanCrtTesuryo.STR_KOKYAKU_SEIKYU_DT, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_GK, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_RT, seisanCrtTesuryo.DEC_KOKYAKU_SHOHIZEI_GK, seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_KEI, seisanCrtTesuryo.STR_SEISAN_DT, seisanCrtTesuryo.STR_OROSHI_DT, seisanCrtTesuryo.STR_JUCHU_UPDATE_DT, seisanCrtTesuryo.STR_JUCHU_TNT_CD, "0", "0", "0", seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_KEI, seisanCrtTesuryo.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID })
                                                                                                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                                                                    If flag Then
                                                                                                        result = False
                                                                                                    Else
                                                                                                        sqlCommand = String.Format(masterSQL.IEF0317().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "2", "1", seisanCrtTesuryo.STR_UKETSUKE_NO, "0", seisanCrtTesuryo.DEC_KOKYAKU_SEIKYU_KEI, "", mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, seisanCrtTesuryo.STR_UKETSUKE_NO })
                                                                                                        flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                                                                        If flag Then
                                                                                                            result = False
                                                                                                        Else
                                                                                                            sqlCommand = String.Format(masterSQL.IEF0315().ToString(), New Object()() { seisanCrtTesuryo.STR_SEIKYU_YM, seisanCrtTesuryo.STR_SAKI_SOSHIKI_CD, seisanCrtTesuryo.STR_MOTO_SOSHIKI_CD, "2", seisanCrtTesuryo.STR_UKETSUKE_NO, "1", seisanCrtTesuryo.STR_UKETSUKE_NO, "", "", "0", mstFind.GetDATE_YYMMDDHHMMSS, seisanCrtTesuryo.STR_UPDATE_TNT_ID, seisanCrtTesuryo.STR_GAMEN_ID, "0" })
                                                                                                            flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                                                                            If flag Then
                                                                                                                result = False
                                                                                                            Else
                                                                                                                result = True
                                                                                                            End If
                                                                                                        End If
                                                                                                    End If
                                                                                                End If
                                                                                            End If
                                                                                        End If
                                                                                    End If
                                                                                End If
                                                                            End If
                                                                        End If
                                                                    End If
                                                                End If
                                                            End If
                                                        End If
                                                    End If
                                                End If
                                            End If
                                        End If
                                    End If
                                End If
                            End If
                        End If
                    End If
                End If
            Catch expr_156E As Exception
                ProjectData.SetProjectError(expr_156E)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>