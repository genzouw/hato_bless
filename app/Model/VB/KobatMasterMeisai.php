<?php
class KobatMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanKobatJoho(){

    /*
        Public Function GetSeisanKobatJoho(SeisanMn As String, MotoSoshikiMei As String, SeikyusakiMei As String, UketsukeNo As String, KokyakuMei As String, JyutyuKbtJyotai As String, ByRef MsgCd As String, FindFlg As Integer) As SesanKobatList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As SesanKobatList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(JyutyuKbtJyotai, "0", False) = 0
                    If flag2 Then
                        strSQL = String.Format(masterSQL.SEF0711().ToString(), New Object()() { SeisanMn, MotoSoshikiMei, SeikyusakiMei, UketsukeNo, KokyakuMei })
                    Else
                        flag2 = (Operators.CompareString(JyutyuKbtJyotai, "1", False) = 0)
                        If flag2 Then
                            strSQL = String.Format(masterSQL.SEF0711().ToString(), New Object()() { SeisanMn, MotoSoshikiMei, SeikyusakiMei, UketsukeNo, KokyakuMei })
                        Else
                            flag2 = (Operators.CompareString(JyutyuKbtJyotai, "2", False) = 0)
                            If flag2 Then
                                strSQL = String.Format(masterSQL.SEF0712().ToString(), New Object()() { SeisanMn, MotoSoshikiMei, SeikyusakiMei, UketsukeNo, KokyakuMei })
                            Else
                                flag2 = (Operators.CompareString(JyutyuKbtJyotai, "3", False) = 0)
                                If flag2 Then
                                    strSQL = String.Format(masterSQL.SEF0713().ToString(), New Object()() { SeisanMn, MotoSoshikiMei, SeikyusakiMei, UketsukeNo, KokyakuMei })
                                End If
                            End If
                        End If
                    End If
                Else
                    strSQL = String.Format(masterSQL.SEF0710().ToString(), SeisanMn, MotoSoshikiMei)
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SesanKobatList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SesanKobatList(num + 1 - 1) {}), SesanKobatList())
                    Dim sesanKobatList As SesanKobatList = array(num)
                    array(num) = New SesanKobatList()
                    array(num).SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                    array(num).MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                    array(num).SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                    array(num).UKETSUKE_NO = Conversions.ToString(sqlDataReader("UKETSUKE_NO"))
                    array(num).CENTER_CD = Conversions.ToString(sqlDataReader("CENTER_CD"))
                    Dim flag2 As Boolean = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETSUKE_DT")))
                    If flag2 Then
                        array(num).UKETSUKE_DT = Conversions.ToString(sqlDataReader("UKETSUKE_DT"))
                    Else
                        array(num).UKETSUKE_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKUMEI")))
                    If flag2 Then
                        array(num).KOKYAKUMEI = Conversions.ToString(sqlDataReader("KOKYAKUMEI"))
                    Else
                        array(num).KOKYAKUMEI = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHAKU_KBN")))
                    If flag2 Then
                        array(num).HACHAKU_KBN = Conversions.ToString(sqlDataReader("HACHAKU_KBN"))
                    Else
                        array(num).HACHAKU_KBN = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_GK")))
                    If flag2 Then
                        array(num).JUCHU_GK = Conversions.ToString(sqlDataReader("JUCHU_GK"))
                    Else
                        array(num).JUCHU_GK = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                    If flag2 Then
                        array(num).SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                    Else
                        array(num).SHOHIZEI_KBN = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_GK")))
                    If flag2 Then
                        array(num).SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SHOHIZEI_GK"))
                    Else
                        array(num).SHOHIZEI_GK = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_IRAI_GK")))
                    If flag2 Then
                        array(num).GYOSHA_IRAI_GK = Conversions.ToString(sqlDataReader("GYOSHA_IRAI_GK"))
                    Else
                        array(num).GYOSHA_IRAI_GK = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_DT")))
                    If flag2 Then
                        array(num).SEISAN_DT = Conversions.ToString(sqlDataReader("SEISAN_DT"))
                    Else
                        array(num).SEISAN_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_SU")))
                    If flag2 Then
                        array(num).BOX_SU = Conversions.ToString(sqlDataReader("BOX_SU"))
                    Else
                        array(num).BOX_SU = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BOX_BARA")))
                    If flag2 Then
                        array(num).BOX_BARA = Conversions.ToString(sqlDataReader("BOX_BARA"))
                    Else
                        array(num).BOX_BARA = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_DT")))
                    If flag2 Then
                        array(num).KOKYAKU_SEIKYU_DT = Conversions.ToString(sqlDataReader("KOKYAKU_SEIKYU_DT"))
                    Else
                        array(num).KOKYAKU_SEIKYU_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYO_DT")))
                    If flag2 Then
                        array(num).SAGYO_DT = Conversions.ToString(sqlDataReader("SAGYO_DT"))
                    Else
                        array(num).SAGYO_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYOCHI_POSTAL_NO")))
                    If flag2 Then
                        array(num).SAGYOCHI_POSTAL_NO = Conversions.ToString(sqlDataReader("SAGYOCHI_POSTAL_NO"))
                    Else
                        array(num).SAGYOCHI_POSTAL_NO = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYOCHI_SHIKUGUN_CD")))
                    If flag2 Then
                        array(num).SAGYOCHI_SHIKUGUN_CD = Conversions.ToString(sqlDataReader("SAGYOCHI_SHIKUGUN_CD"))
                    Else
                        array(num).SAGYOCHI_SHIKUGUN_CD = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYOCHI_SHOSAI_1")))
                    If flag2 Then
                        array(num).SAGYOCHI_SHOSAI_1 = Conversions.ToString(sqlDataReader("SAGYOCHI_SHOSAI_1"))
                    Else
                        array(num).SAGYOCHI_SHOSAI_1 = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HONBU_CD")))
                    If flag2 Then
                        array(num).HONBU_CD = Conversions.ToString(sqlDataReader("HONBU_CD"))
                    Else
                        array(num).HONBU_CD = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DEPO_CD")))
                    If flag2 Then
                        array(num).DEPO_CD = Conversions.ToString(sqlDataReader("DEPO_CD"))
                    Else
                        array(num).DEPO_CD = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_UPDATE_DT")))
                    If flag2 Then
                        array(num).JUCHU_UPDATE_DT = Conversions.ToString(sqlDataReader("JUCHU_UPDATE_DT"))
                    Else
                        array(num).JUCHU_UPDATE_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_TNT_CD")))
                    If flag2 Then
                        array(num).JUCHU_TNT_CD = Conversions.ToString(sqlDataReader("JUCHU_TNT_CD"))
                    Else
                        array(num).JUCHU_TNT_CD = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                    If flag2 Then
                        array(num).UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                    Else
                        array(num).UPDATE_DT = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_TNT_ID")))
                    If flag2 Then
                        array(num).UPDATE_TNT_ID = Conversions.ToString(sqlDataReader("UPDATE_TNT_ID"))
                    Else
                        array(num).UPDATE_TNT_ID = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAMEN_ID")))
                    If flag2 Then
                        array(num).GAMEN_ID = Conversions.ToString(sqlDataReader("GAMEN_ID"))
                    Else
                        array(num).GAMEN_ID = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI")))
                    If flag2 Then
                        array(num).MOTO_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).MOTO_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI")))
                    If flag2 Then
                        array(num).SAKI_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).SAKI_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_KBN")))
                    If flag2 Then
                        array(num).SOSHIKI_KBN = Conversions.ToString(sqlDataReader("SOSHIKI_KBN"))
                    Else
                        array(num).SOSHIKI_KBN = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAGYO_SOSHIKI_RYAKU_MEI")))
                    If flag2 Then
                        array(num).SAGYO_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SAGYO_SOSHIKI_RYAKU_MEI"))
                    Else
                        array(num).SAGYO_SOSHIKI_RYAKU_MEI = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KBT_BOX_SU")))
                    If flag2 Then
                        array(num).KBT_BOX_SU = Conversions.ToString(sqlDataReader("KBT_BOX_SU"))
                    Else
                        array(num).KBT_BOX_SU = ""
                    End If
                    array(num).STR_JYOTAI = "0"
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_ABB As Exception
                ProjectData.SetProjectError(expr_ABB)
                Dim ex As Exception = expr_ABB
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