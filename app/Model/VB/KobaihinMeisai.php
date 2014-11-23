<?php
class KobaihinMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getTasoshikiKobaiManageJoho(){

    /*
        Public Function GetTasoshikiKobaiManageJoho(JyobuSoshikiCd As String, KobaiMei As String, ShiiresakiCd As String, KobaiBunrui As String, SoshikiCd As String, ByRef MsgCd As String, FindFlg As Integer) As Kobaihin()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Kobaihin()
            Try
                Dim flag As Boolean = Operators.CompareString(Strings.Trim(ShiiresakiCd), "", False) <> 0 And Strings.Len(Strings.Trim(ShiiresakiCd)) < 5
                If flag Then
                    ShiiresakiCd = JyobuSoshikiCd + ShiiresakiCd
                End If
                flag = (FindFlg = 0)
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SCF0221().ToString(), New Object()() { JyobuSoshikiCd, ShiiresakiCd, KobaiBunrui, KobaiMei, SoshikiCd })
                Else
                    strSQL = String.Format(masterSQL.SCF0420().ToString(), JyobuSoshikiCd, "", SoshikiCd)
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As Kobaihin()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New Kobaihin(num + 1 - 1) {}), Kobaihin())
                    Dim kobaihin As Kobaihin = array(num)
                    array(num) = New Kobaihin()
                    array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
                    If flag Then
                        array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
                    Else
                        array(num).STR_KOBAI_CD = ""
                    End If
                    array(num).STR_GAIBU_GYOSHA_CD = Conversions.ToString(sqlDataReader("GAIBU_GYOSHA_CD"))
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_SOSHIKI_CD")))
                    If flag Then
                        array(num).STR_HANBAISAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("HANBAISAKI_SOSHIKI_CD"))
                    Else
                        array(num).STR_HANBAISAKI_SOSHIKI_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_BUNRUI_MEI")))
                    If flag Then
                        array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
                    Else
                        array(num).STR_KOBAI_BUNRUI_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
                    If flag Then
                        array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
                    Else
                        array(num).STR_KOBAI_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_KOBAI_RYAKU_MEI = Conversions.ToString(sqlDataReader("KOBAI_RYAKU_MEI"))
                    Else
                        array(num).STR_KOBAI_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_KANA_MEI")))
                    If flag Then
                        array(num).STR_KOBAI_KANA_MEI = Conversions.ToString(sqlDataReader("KOBAI_KANA_MEI"))
                    Else
                        array(num).STR_KOBAI_KANA_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_SURYO_TANI")))
                    If flag Then
                        array(num).STR_KOBAI_SURYO_TANI = Conversions.ToString(sqlDataReader("KOBAI_SURYO_TANI"))
                    Else
                        array(num).STR_KOBAI_SURYO_TANI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRE_TANKA_GK")))
                    If flag Then
                        array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal(sqlDataReader("SHIIRE_TANKA_GK"))
                    Else
                        array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MAIL_ADRS")))
                    If flag Then
                        array(num).STR_SHIIRESAKI_MAIL_ADRS = Conversions.ToString(sqlDataReader("SHIIRESAKI_MAIL_ADRS"))
                    Else
                        array(num).STR_SHIIRESAKI_MAIL_ADRS = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_TEL_NO")))
                    If flag Then
                        array(num).STR_SHIIRESAKI_TEL_NO = Conversions.ToString(sqlDataReader("SHIIRESAKI_TEL_NO"))
                    Else
                        array(num).STR_SHIIRESAKI_TEL_NO = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_FAX_NO")))
                    If flag Then
                        array(num).STR_SHIIRESAKI_FAX_NO = Conversions.ToString(sqlDataReader("SHIIRESAKI_FAX_NO"))
                    Else
                        array(num).STR_SHIIRESAKI_FAX_NO = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_SU")))
                    If flag Then
                        array(num).INT_SHIIRESAKI_MATOME_SU = Conversions.ToString(sqlDataReader("SHIIRESAKI_MATOME_SU"))
                    Else
                        array(num).INT_SHIIRESAKI_MATOME_SU = "0"
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRESAKI_MATOME_GK")))
                    If flag Then
                        array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("SHIIRESAKI_MATOME_GK"))
                    Else
                        array(num).DEC_SHIIRESAKI_MATOME_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TANKA_GK")))
                    If flag Then
                        array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_TANKA_GK"))
                    Else
                        array(num).DEC_HANBAI_TANKA_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MIN_LOT_SU")))
                    If flag Then
                        array(num).INT_MIN_LOT_SU = Conversions.ToInteger(sqlDataReader("MIN_LOT_SU"))
                    Else
                        array(num).INT_MIN_LOT_SU = Conversions.ToInteger("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_TEL_NO")))
                    If flag Then
                        array(num).STR_HANBAISAKI_TEL_NO = Conversions.ToString(sqlDataReader("HANBAISAKI_TEL_NO"))
                    Else
                        array(num).STR_HANBAISAKI_TEL_NO = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAISAKI_FAX_NO")))
                    If flag Then
                        array(num).STR_HANBAISAKI_FAX_NO = Conversions.ToString(sqlDataReader("HANBAISAKI_FAX_NO"))
                    Else
                        array(num).STR_HANBAISAKI_FAX_NO = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_SU")))
                    If flag Then
                        array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger(sqlDataReader("HANBAI_MATOME_SU"))
                    Else
                        array(num).INT_HANBAI_MATOME_SU = Conversions.ToInteger("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_MATOME_GK")))
                    If flag Then
                        array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal(sqlDataReader("HANBAI_MATOME_GK"))
                    Else
                        array(num).DEC_HANBAI_MATOME_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONOTA_KINGAKU_MEI")))
                    If flag Then
                        array(num).STR_SONOTA_KINGAKU_MEI = Conversions.ToString(sqlDataReader("SONOTA_KINGAKU_MEI"))
                    Else
                        array(num).STR_SONOTA_KINGAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SONITA_KINGAKU_GK")))
                    If flag Then
                        array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal(sqlDataReader("SONITA_KINGAKU_GK"))
                    Else
                        array(num).DEC_SONITA_KINGAKU_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HANBAI_TESURYO_RT")))
                    If flag Then
                        array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("HANBAI_TESURYO_RT"))
                    Else
                        array(num).DEC_HANBAI_TESURYO_RT = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_KOBAI_CD")))
                    If flag Then
                        array(num).STR_JISHA_KOBAI_CD = Conversions.ToString(sqlDataReader("JISHA_KOBAI_CD"))
                    Else
                        array(num).STR_JISHA_KOBAI_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TA_KOBAI_CD")))
                    If flag Then
                        array(num).STR_TA_KOBAI_CD = Conversions.ToString(sqlDataReader("TA_KOBAI_CD"))
                    Else
                        array(num).STR_TA_KOBAI_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("REMARKS")))
                    If flag Then
                        array(num).STR_REMARKS = Conversions.ToString(sqlDataReader("REMARKS"))
                    Else
                        array(num).STR_REMARKS = ""
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
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_GYOSHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("GYOSHA_RYAKU_MEI"))
                    Else
                        array(num).STR_GYOSHA_RYAKU_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_GYOSHA_CD")))
                    If flag Then
                        array(num).STR_GAIBU_GYOSHA_CD = Conversions.ToString(sqlDataReader("GAIBU_GYOSHA_CD"))
                    Else
                        array(num).STR_GAIBU_GYOSHA_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHIIRE_TANKA_GK")))
                    If flag Then
                        array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal(sqlDataReader("SHIIRE_TANKA_GK"))
                    Else
                        array(num).DEC_SHIIRE_TANKA_GK = Conversions.ToDecimal("")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TASOSHIKI_KOBAI_CD")))
                    If flag Then
                        array(num).STR_TASOSHIKI_KOBAI_CD = Conversions.ToString(sqlDataReader("TASOSHIKI_KOBAI_CD"))
                    Else
                        array(num).STR_TASOSHIKI_KOBAI_CD = ""
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_B1F As Exception
                ProjectData.SetProjectError(expr_B1F)
                Dim ex As Exception = expr_B1F
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