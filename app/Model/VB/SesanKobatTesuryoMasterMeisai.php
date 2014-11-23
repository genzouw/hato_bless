<?php
class SesanKobatTesuryoMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteKobatTesuryo(){

    /*
        Public Function DeleteKobatTesuryo(SeikyuMn As String, MotoSoshikiCd As String, SakiSoshikiCd As String, UketsukeNo As String, HiyoKomokuCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim kobatTesuryoMasterMeisai As KobatTesuryoMasterMeisai = New KobatTesuryoMasterMeisai()
                Dim seisanKobatTesuryoJoho As SesanKobatTesuryoList() = kobatTesuryoMasterMeisai.GetSeisanKobatTesuryoJoho(SeikyuMn, MotoSoshikiCd, SakiSoshikiCd, UketsukeNo, "", MsgCd, 0)
                Dim flag As Boolean = seisanKobatTesuryoJoho IsNot Nothing
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(seisanKobatTesuryoJoho(0).UPDATE_DT, UpdateDt, False) <> 0
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        Dim sqlCommand As String = String.Format(masterSQL.DEF0721().ToString(), New Object()() { SeikyuMn, MotoSoshikiCd, SakiSoshikiCd, "1", HiyoKomokuCd, UketsukeNo })
                        flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag2 Then
                            result = False
                        Else
                            sqlCommand = String.Format(masterSQL.DEF0721().ToString(), New Object()() { SeikyuMn, SakiSoshikiCd, MotoSoshikiCd, "2", HiyoKomokuCd, UketsukeNo })
                            flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                            If flag2 Then
                                result = False
                            Else
                                sqlCommand = String.Format(masterSQL.DEF1194().ToString(), New Object()() { SeikyuMn, MotoSoshikiCd, SakiSoshikiCd, HiyoKomokuCd, UketsukeNo })
                                flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                                If flag2 Then
                                    result = False
                                Else
                                    sqlCommand = String.Format(masterSQL.DEF1195().ToString(), New Object()() { SeikyuMn, MotoSoshikiCd, SakiSoshikiCd, HiyoKomokuCd, UketsukeNo })
                                    flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                                    If flag2 Then
                                        result = False
                                    Else
                                        result = True
                                    End If
                                End If
                            End If
                        End If
                    End If
                Else
                    Dim flag2 As Boolean = seisanKobatTesuryoJoho Is Nothing
                    If flag2 Then
                        MsgCd = "XXXX"
                        result = False
                    Else
                        MsgCd = "XXXX"
                        result = False
                    End If
                End If
            Catch expr_207 As Exception
                ProjectData.SetProjectError(expr_207)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function updateKobatTesuryo(){

    /*
        Public Function UpdateKobatTesuryo(objEntity As Object, MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim kobatTesuryo As KobatTesuryo = New KobatTesuryo()
                kobatTesuryo = CType(objEntity, KobatTesuryo)
                Dim kobatTesuryoMasterMeisai As KobatTesuryoMasterMeisai = New KobatTesuryoMasterMeisai()
                Dim mstFind As MstFind = New MstFind()
                Dim sqlCommand As String = String.Format(masterSQL.UEF0710().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_MOTO_SOSHIKI_CD, kobatTesuryo.STR_SAKI_SOSHIKI_CD, "1", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_UKETSUKE_NO, kobatTesuryo.STR_BOX_SIYO_GK1, kobatTesuryo.STR_TESURYO_GK1, kobatTesuryo.STR_SHOHIZEI_KBN1, kobatTesuryo.STR_TESURYO_SHOHIZEI_RT1, kobatTesuryo.STR_TESURYO_RT1, kobatTesuryo.STR_TESURYO_KEISAN_KBN1, kobatTesuryo.STR_TESURYO_SHOHIZEI_KBN1, kobatTesuryo.STR_BOX_SIYO_GK, kobatTesuryo.STR_SEISAN_TESU_GK, kobatTesuryo.STR_SEISAN_SHOHIZEI_GK, kobatTesuryo.STR_SEIKYU_GOKEI_GK, kobatTesuryo.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID, "0" })
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    sqlCommand = String.Format(masterSQL.UEF0314().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_MOTO_SOSHIKI_CD, kobatTesuryo.STR_SAKI_SOSHIKI_CD, "1", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_SEIKYU_GOKEI_GK, "0", mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID, kobatTesuryo.STR_UKETSUKE_NO })
                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        sqlCommand = String.Format(masterSQL.UEF0315().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_MOTO_SOSHIKI_CD, kobatTesuryo.STR_SAKI_SOSHIKI_CD, "1", kobatTesuryo.STR_HIYOKOMOKU_CD, mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID })
                        flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                        If flag Then
                            result = False
                        Else
                            sqlCommand = String.Format(masterSQL.UEF0710().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_SAKI_SOSHIKI_CD, kobatTesuryo.STR_MOTO_SOSHIKI_CD, "2", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_UKETSUKE_NO, kobatTesuryo.STR_BOX_SIYO_GK1, kobatTesuryo.STR_TESURYO_GK1, kobatTesuryo.STR_SHOHIZEI_KBN1, kobatTesuryo.STR_TESURYO_SHOHIZEI_RT1, kobatTesuryo.STR_TESURYO_RT1, kobatTesuryo.STR_TESURYO_KEISAN_KBN1, kobatTesuryo.STR_TESURYO_SHOHIZEI_KBN1, kobatTesuryo.STR_BOX_SIYO_GK, kobatTesuryo.STR_SEISAN_TESU_GK, kobatTesuryo.STR_SEISAN_SHOHIZEI_GK, kobatTesuryo.STR_SEIKYU_GOKEI_GK, kobatTesuryo.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID, "0" })
                            flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                            If flag Then
                                result = False
                            Else
                                sqlCommand = String.Format(masterSQL.UEF0314().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_SAKI_SOSHIKI_CD, kobatTesuryo.STR_MOTO_SOSHIKI_CD, "2", kobatTesuryo.STR_HIYOKOMOKU_CD, "0", kobatTesuryo.STR_SEIKYU_GOKEI_GK, mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID, kobatTesuryo.STR_UKETSUKE_NO })
                                flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                If flag Then
                                    result = False
                                Else
                                    sqlCommand = String.Format(masterSQL.UEF0315().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_SAKI_SOSHIKI_CD, kobatTesuryo.STR_MOTO_SOSHIKI_CD, "2", kobatTesuryo.STR_HIYOKOMOKU_CD, mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID })
                                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                    If flag Then
                                        result = False
                                    End If
                                End If
                            End If
                        End If
                    End If
                End If
            Catch expr_55F As Exception
                ProjectData.SetProjectError(expr_55F)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }

    function setKobatTesuryo(){

    /*
        Public Function SetKobatTesuryo(objEntity As Object, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim kobatTesuryo As KobatTesuryo = New KobatTesuryo()
                kobatTesuryo = CType(objEntity, KobatTesuryo)
                Dim sqlCommand As String = String.Format(masterSQL.IEF0711().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_MOTO_SOSHIKI_CD, kobatTesuryo.STR_SAKI_SOSHIKI_CD, "1", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_UKETSUKE_NO })
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    sqlCommand = String.Format(masterSQL.DEF0200().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_MOTO_SOSHIKI_CD, kobatTesuryo.STR_SAKI_SOSHIKI_CD, "1", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_UKETSUKE_NO })
                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        sqlCommand = String.Format(masterSQL.DEF0201().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_MOTO_SOSHIKI_CD, kobatTesuryo.STR_SAKI_SOSHIKI_CD, "1", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_UKETSUKE_NO })
                        flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                        If flag Then
                            result = False
                        Else
                            Dim mstFind As MstFind = New MstFind()
                            sqlCommand = String.Format(masterSQL.IEF0710().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_MOTO_SOSHIKI_CD, kobatTesuryo.STR_SAKI_SOSHIKI_CD, "1", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_UKETSUKE_NO, kobatTesuryo.STR_BOX_SIYO_GK1, kobatTesuryo.STR_TESURYO_GK1, kobatTesuryo.STR_SHOHIZEI_KBN1, kobatTesuryo.STR_TESURYO_SHOHIZEI_RT1, kobatTesuryo.STR_TESURYO_RT1, kobatTesuryo.STR_TESURYO_KEISAN_KBN1, kobatTesuryo.STR_TESURYO_SHOHIZEI_KBN1, kobatTesuryo.STR_HASEI_DT, kobatTesuryo.STR_BOX_SIYO_GK, kobatTesuryo.STR_SHOHIZEI_KBN, kobatTesuryo.STR_SAGYO_SOSHIKI_CD, kobatTesuryo.STR_UKETSUKE_DT, kobatTesuryo.STR_KOKYAKUMEI, kobatTesuryo.STR_HACHAKU_KBN, kobatTesuryo.STR_JUCHU_GK, kobatTesuryo.STR_SHOHIZEI_GK, kobatTesuryo.STR_GYOSHA_IRAI_GK, kobatTesuryo.STR_SEISAN_DT, kobatTesuryo.STR_BOX_SU, kobatTesuryo.STR_BOX_BARA, kobatTesuryo.STR_KOKYAKU_SEIKYU_DT, kobatTesuryo.STR_SAGYO_DT, kobatTesuryo.STR_SAGYOCHI_POSTAL_NO, kobatTesuryo.STR_SAGYOCHI_SHIKUGUN_CD, kobatTesuryo.STR_SAGYOCHI_SHOSAI_1, kobatTesuryo.STR_HONBU_CD, kobatTesuryo.STR_DEPO_CD, kobatTesuryo.STR_JUCHU_UPDATE_DT, kobatTesuryo.STR_JUCHU_TNT_CD, kobatTesuryo.STR_SEISAN_BOX_SIYO_GK, kobatTesuryo.STR_SEISAN_SHOHIZEI_GK, kobatTesuryo.STR_SEISAN_TESU_GK, kobatTesuryo.STR_SEIKYU_GOKEI_GK, kobatTesuryo.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID })
                            flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                            If flag Then
                                result = False
                            Else
                                sqlCommand = String.Format(masterSQL.IEF0317().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_MOTO_SOSHIKI_CD, kobatTesuryo.STR_SAKI_SOSHIKI_CD, "1", "1", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_SEIKYU_GOKEI_GK, "0", "", mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID, kobatTesuryo.STR_UKETSUKE_NO })
                                flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                If flag Then
                                    result = False
                                Else
                                    sqlCommand = String.Format(masterSQL.IEF0315().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_MOTO_SOSHIKI_CD, kobatTesuryo.STR_SAKI_SOSHIKI_CD, "1", kobatTesuryo.STR_HIYOKOMOKU_CD, "1", kobatTesuryo.STR_UKETSUKE_NO, "", "", "0", mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID, "0" })
                                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                    If flag Then
                                        result = False
                                    Else
                                        sqlCommand = String.Format(masterSQL.IEF0711().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_SAKI_SOSHIKI_CD, kobatTesuryo.STR_MOTO_SOSHIKI_CD, "2", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_UKETSUKE_NO })
                                        flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                        If flag Then
                                            result = False
                                        Else
                                            sqlCommand = String.Format(masterSQL.DEF0200().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_SAKI_SOSHIKI_CD, kobatTesuryo.STR_MOTO_SOSHIKI_CD, "2", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_UKETSUKE_NO })
                                            flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                                            If flag Then
                                                result = False
                                            Else
                                                sqlCommand = String.Format(masterSQL.DEF0201().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_SAKI_SOSHIKI_CD, kobatTesuryo.STR_MOTO_SOSHIKI_CD, "2", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_UKETSUKE_NO })
                                                flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                                                If flag Then
                                                    result = False
                                                Else
                                                    sqlCommand = String.Format(masterSQL.IEF0710().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_SAKI_SOSHIKI_CD, kobatTesuryo.STR_MOTO_SOSHIKI_CD, "2", kobatTesuryo.STR_HIYOKOMOKU_CD, kobatTesuryo.STR_UKETSUKE_NO, kobatTesuryo.STR_BOX_SIYO_GK1, kobatTesuryo.STR_TESURYO_GK1, kobatTesuryo.STR_SHOHIZEI_KBN1, kobatTesuryo.STR_TESURYO_SHOHIZEI_RT1, kobatTesuryo.STR_TESURYO_RT1, kobatTesuryo.STR_TESURYO_KEISAN_KBN1, kobatTesuryo.STR_TESURYO_SHOHIZEI_KBN1, kobatTesuryo.STR_HASEI_DT, kobatTesuryo.STR_BOX_SIYO_GK, kobatTesuryo.STR_SHOHIZEI_KBN, kobatTesuryo.STR_SAGYO_SOSHIKI_CD, kobatTesuryo.STR_UKETSUKE_DT, kobatTesuryo.STR_KOKYAKUMEI, kobatTesuryo.STR_HACHAKU_KBN, kobatTesuryo.STR_JUCHU_GK, kobatTesuryo.STR_SHOHIZEI_GK, kobatTesuryo.STR_GYOSHA_IRAI_GK, kobatTesuryo.STR_SEISAN_DT, kobatTesuryo.STR_BOX_SU, kobatTesuryo.STR_BOX_BARA, kobatTesuryo.STR_KOKYAKU_SEIKYU_DT, kobatTesuryo.STR_SAGYO_DT, kobatTesuryo.STR_SAGYOCHI_POSTAL_NO, kobatTesuryo.STR_SAGYOCHI_SHIKUGUN_CD, kobatTesuryo.STR_SAGYOCHI_SHOSAI_1, kobatTesuryo.STR_HONBU_CD, kobatTesuryo.STR_DEPO_CD, kobatTesuryo.STR_JUCHU_UPDATE_DT, kobatTesuryo.STR_JUCHU_TNT_CD, kobatTesuryo.STR_SEISAN_BOX_SIYO_GK, kobatTesuryo.STR_SEISAN_SHOHIZEI_GK, kobatTesuryo.STR_SEISAN_TESU_GK, kobatTesuryo.STR_SEIKYU_GOKEI_GK, kobatTesuryo.STR_BIKO, mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID })
                                                    flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                    If flag Then
                                                        result = False
                                                    Else
                                                        sqlCommand = String.Format(masterSQL.IEF0317().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_SAKI_SOSHIKI_CD, kobatTesuryo.STR_MOTO_SOSHIKI_CD, "2", "1", kobatTesuryo.STR_HIYOKOMOKU_CD, "0", kobatTesuryo.STR_SEIKYU_GOKEI_GK, "", mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID, kobatTesuryo.STR_UKETSUKE_NO })
                                                        flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                                                        If flag Then
                                                            result = False
                                                        Else
                                                            sqlCommand = String.Format(masterSQL.IEF0315().ToString(), New Object()() { kobatTesuryo.STR_SEISAN_TAISHO_MN, kobatTesuryo.STR_SAKI_SOSHIKI_CD, kobatTesuryo.STR_MOTO_SOSHIKI_CD, "2", kobatTesuryo.STR_HIYOKOMOKU_CD, "1", kobatTesuryo.STR_UKETSUKE_NO, "", "", "0", mstFind.GetDATE_YYMMDDHHMMSS, kobatTesuryo.STR_UPDATE_TNT_ID, kobatTesuryo.STR_GAMEN_ID, "0" })
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
            Catch expr_B2A As Exception
                ProjectData.SetProjectError(expr_B2A)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>