<?php
class KobatTesuryoMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanKobatTesuryoJoho(){

    /*
        Public Function GetSeisanKobatTesuryoJoho(SeisanMn As String, MotoSoshikiCd As String, SeikyusakiCd As String, UketsukeNo As String, KokyakuMei As String, ByRef MsgCd As String, FindFlg As Integer) As SesanKobatTesuryoList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As SesanKobatTesuryoList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SEF0721().ToString(), New Object()() { SeisanMn, MotoSoshikiCd, SeikyusakiCd, UketsukeNo, KokyakuMei })
                Else
                    flag = (FindFlg = 2)
                    If flag Then
                        strSQL = String.Format(masterSQL.SEF0722().ToString(), New Object()() { SeisanMn, MotoSoshikiCd, SeikyusakiCd, UketsukeNo, KokyakuMei })
                    Else
                        strSQL = String.Format(masterSQL.SEF0720().ToString(), SeisanMn, MotoSoshikiCd)
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SesanKobatTesuryoList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SesanKobatTesuryoList(num + 1 - 1) {}), SesanKobatTesuryoList())
                    Dim sesanKobatTesuryoList As SesanKobatTesuryoList = array(num)
                    array(num) = New SesanKobatTesuryoList()
                    array(num).SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                    array(num).MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                    array(num).SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                    array(num).SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                    array(num).HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                    array(num).UKETSUKE_NO = Conversions.ToString(sqlDataReader("UKETSUKE_NO"))
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_SIYO_GK1")))
                    If flag Then
                        array(num).BOX_SIYO_GK1 = Conversions.ToString(sqlDataReader("BOX_SIYO_GK1"))
                    Else
                        array(num).BOX_SIYO_GK1 = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_GK1")))
                    If flag Then
                        array(num).TESURYO_GK1 = Conversions.ToString(sqlDataReader("TESURYO_GK1"))
                    Else
                        array(num).TESURYO_GK1 = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN1")))
                    If flag Then
                        array(num).SHOHIZEI_KBN1 = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN1"))
                    Else
                        array(num).SHOHIZEI_KBN1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_SHOHIZEI_RT1")))
                    If flag Then
                        array(num).TESURYO_SHOHIZEI_RT1 = Conversions.ToString(sqlDataReader("TESURYO_SHOHIZEI_RT1"))
                    Else
                        array(num).TESURYO_SHOHIZEI_RT1 = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_RT1")))
                    If flag Then
                        array(num).TESURYO_RT1 = Conversions.ToString(sqlDataReader("TESURYO_RT1"))
                    Else
                        array(num).TESURYO_RT1 = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_KEISAN_KBN1")))
                    If flag Then
                        array(num).TESURYO_KEISAN_KBN1 = Conversions.ToString(sqlDataReader("TESURYO_KEISAN_KBN1"))
                    Else
                        array(num).TESURYO_KEISAN_KBN1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TESURYO_SHOHIZEI_KBN1")))
                    If flag Then
                        array(num).TESURYO_SHOHIZEI_KBN1 = Conversions.ToString(sqlDataReader("TESURYO_SHOHIZEI_KBN1"))
                    Else
                        array(num).TESURYO_SHOHIZEI_KBN1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HASEI_DT")))
                    If flag Then
                        array(num).HASEI_DT = Conversions.ToString(sqlDataReader("HASEI_DT"))
                    Else
                        array(num).HASEI_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_SIYO_GK")))
                    If flag Then
                        array(num).BOX_SIYO_GK = Conversions.ToString(sqlDataReader("BOX_SIYO_GK"))
                    Else
                        array(num).BOX_SIYO_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                    If flag Then
                        array(num).SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                    Else
                        array(num).SHOHIZEI_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYO_SOSHIKI_CD")))
                    If flag Then
                        array(num).SAGYO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAGYO_SOSHIKI_CD"))
                    Else
                        array(num).SAGYO_SOSHIKI_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETSUKE_DT")))
                    If flag Then
                        array(num).UKETSUKE_DT = Conversions.ToString(sqlDataReader("UKETSUKE_DT"))
                    Else
                        array(num).UKETSUKE_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKUMEI")))
                    If flag Then
                        array(num).KOKYAKUMEI = Conversions.ToString(sqlDataReader("KOKYAKUMEI"))
                    Else
                        array(num).KOKYAKUMEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHAKU_KBN")))
                    If flag Then
                        array(num).HACHAKU_KBN = Conversions.ToString(sqlDataReader("HACHAKU_KBN"))
                    Else
                        array(num).HACHAKU_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_GK")))
                    If flag Then
                        array(num).JUCHU_GK = Conversions.ToString(sqlDataReader("JUCHU_GK"))
                    Else
                        array(num).JUCHU_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_GK")))
                    If flag Then
                        array(num).SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SHOHIZEI_GK"))
                    Else
                        array(num).SHOHIZEI_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_IRAI_GK")))
                    If flag Then
                        array(num).GYOSHA_IRAI_GK = Conversions.ToString(sqlDataReader("GYOSHA_IRAI_GK"))
                    Else
                        array(num).GYOSHA_IRAI_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_DT")))
                    If flag Then
                        array(num).SEISAN_DT = Conversions.ToString(sqlDataReader("SEISAN_DT"))
                    Else
                        array(num).SEISAN_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_SU")))
                    If flag Then
                        array(num).BOX_SU = Conversions.ToString(sqlDataReader("BOX_SU"))
                    Else
                        array(num).BOX_SU = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_BARA")))
                    If flag Then
                        array(num).BOX_BARA = Conversions.ToString(sqlDataReader("BOX_BARA"))
                    Else
                        array(num).BOX_BARA = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_DT")))
                    If flag Then
                        array(num).KOKYAKU_SEIKYU_DT = Conversions.ToString(sqlDataReader("KOKYAKU_SEIKYU_DT"))
                    Else
                        array(num).KOKYAKU_SEIKYU_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYO_DT")))
                    If flag Then
                        array(num).SAGYO_DT = Conversions.ToString(sqlDataReader("SAGYO_DT"))
                    Else
                        array(num).SAGYO_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYOCHI_POSTAL_NO")))
                    If flag Then
                        array(num).SAGYOCHI_POSTAL_NO = Conversions.ToString(sqlDataReader("SAGYOCHI_POSTAL_NO"))
                    Else
                        array(num).SAGYOCHI_POSTAL_NO = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYOCHI_SHIKUGUN_CD")))
                    If flag Then
                        array(num).SAGYOCHI_SHIKUGUN_CD = Conversions.ToString(sqlDataReader("SAGYOCHI_SHIKUGUN_CD"))
                    Else
                        array(num).SAGYOCHI_SHIKUGUN_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYOCHI_SHOSAI_1")))
                    If flag Then
                        array(num).SAGYOCHI_SHOSAI_1 = Conversions.ToString(sqlDataReader("SAGYOCHI_SHOSAI_1"))
                    Else
                        array(num).SAGYOCHI_SHOSAI_1 = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HONBU_CD")))
                    If flag Then
                        array(num).HONBU_CD = Conversions.ToString(sqlDataReader("HONBU_CD"))
                    Else
                        array(num).HONBU_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DEPO_CD")))
                    If flag Then
                        array(num).DEPO_CD = Conversions.ToString(sqlDataReader("DEPO_CD"))
                    Else
                        array(num).DEPO_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_UPDATE_DT")))
                    If flag Then
                        array(num).JUCHU_UPDATE_DT = Conversions.ToString(sqlDataReader("JUCHU_UPDATE_DT"))
                    Else
                        array(num).JUCHU_UPDATE_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_TNT_CD")))
                    If flag Then
                        array(num).JUCHU_TNT_CD = Conversions.ToString(sqlDataReader("JUCHU_TNT_CD"))
                    Else
                        array(num).JUCHU_TNT_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_BOX_SIYO_GK")))
                    If flag Then
                        array(num).SEISAN_BOX_SIYO_GK = Conversions.ToString(sqlDataReader("SEISAN_BOX_SIYO_GK"))
                    Else
                        array(num).SEISAN_BOX_SIYO_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_SHOHIZEI_GK")))
                    If flag Then
                        array(num).SEISAN_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SEISAN_SHOHIZEI_GK"))
                    Else
                        array(num).SEISAN_SHOHIZEI_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_TESU_GK")))
                    If flag Then
                        array(num).SEISAN_TESU_GK = Conversions.ToString(sqlDataReader("SEISAN_TESU_GK"))
                    Else
                        array(num).SEISAN_TESU_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GOKEI_GK")))
                    If flag Then
                        array(num).SEIKYU_GOKEI_GK = Conversions.ToString(sqlDataReader("SEIKYU_GOKEI_GK"))
                    Else
                        array(num).SEIKYU_GOKEI_GK = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                    If flag Then
                        array(num).BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                    Else
                        array(num).BIKO = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                    If flag Then
                        array(num).UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                    Else
                        array(num).UPDATE_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
                    If flag Then
                        array(num).UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
                    Else
                        array(num).UPDATE_TNT_ID = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
                    If flag Then
                        array(num).GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
                    Else
                        array(num).GAMEN_ID = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI")))
                    If flag Then
                        array(num).SAKI_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).SAKI_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI")))
                    If flag Then
                        array(num).MOTO_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).MOTO_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYO_SOSHIKI_RYAKU_MEI")))
                    If flag Then
                        array(num).SAGYO_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SAGYO_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).SAGYO_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_MEI")))
                    If flag Then
                        array(num).HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                    Else
                        array(num).HIYOKOMOKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KBT_BOX_SU")))
                    If flag Then
                        array(num).KBT_BOX_SU = Conversions.ToString(sqlDataReader("KBT_BOX_SU"))
                    Else
                        array(num).KBT_BOX_SU = ""
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_E6D As Exception
                ProjectData.SetProjectError(expr_E6D)
                Dim ex As Exception = expr_E6D
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