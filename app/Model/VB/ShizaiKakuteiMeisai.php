<?php
class ShizaiKakuteiMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getShizaiKakuteiManageJoho(){

    /*
        Public Function GetShizaiKakuteiManageJoho(SoshikiCd As String, SofuMon As String, ShiireGyoshaCd As String, ShukaDtFrom As String, ShukaDtTo As String, HanbaisakiCd As String, HachuNo As String, SofuMon2 As String, ByRef MsgCd As String, FindFlg As Integer) As ShizaiKakuteiList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As ShizaiKakuteiList()
            Try
                SofuMon = Strings.Replace(SofuMon, "/", "", 1, -1, CompareMethod.Binary)
                SofuMon2 = Strings.Replace(SofuMon2, "/", "", 1, -1, CompareMethod.Binary)
                ShukaDtFrom = Strings.Replace(ShukaDtFrom, "/", "", 1, -1, CompareMethod.Binary)
                ShukaDtTo = Strings.Replace(ShukaDtTo, "/", "", 1, -1, CompareMethod.Binary)
                Dim flag As Boolean = Operators.CompareString(ShukaDtTo, "", False) = 0
                If flag Then
                    ShukaDtTo = "99999999"
                End If
                flag = (FindFlg = 0)
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SCF0024().ToString(), New Object()() { SoshikiCd, SofuMon, ShiireGyoshaCd, ShukaDtFrom, ShukaDtTo, HanbaisakiCd, HachuNo, SofuMon2 })
                Else
                    strSQL = String.Format(masterSQL.SCF0024().ToString(), New Object()() { SoshikiCd, SofuMon, ShiireGyoshaCd, ShukaDtFrom, ShukaDtTo, HanbaisakiCd, HachuNo, SofuMon2 })
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As ShizaiKakuteiList()
                While sqlDataReader.Read()
                    flag = (num >= 999)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 1000)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New ShizaiKakuteiList(num + 1 - 1) {}), ShizaiKakuteiList())
                        Dim shizaiKakuteiList As ShizaiKakuteiList = array(num)
                        array(num) = New ShizaiKakuteiList()
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYUMOTO_CD")))
                        If flag Then
                            array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SEIKYUMOTO_CD"))
                        Else
                            array(num).STR_SOSHIKI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD")))
                        If flag Then
                            array(num).STR_GAIBU_GYOSHA_CD = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD"))
                        Else
                            array(num).STR_GAIBU_GYOSHA_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI")))
                        If flag Then
                            array(num).STR_GYOSHA_MEI = Conversions.ToString(sqlDataReader("GYOSHA_MEI"))
                        Else
                            array(num).STR_GYOSHA_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN")))
                        If flag Then
                            array(num).STR_GAIBU_NAIBU_KBN = RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN"))
                        Else
                            array(num).STR_GAIBU_NAIBU_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI")))
                        If flag Then
                            array(num).STR_GAIBU_GYOSHA_MEI = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI"))
                        Else
                            array(num).STR_GAIBU_GYOSHA_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOFU_DT")))
                        If flag Then
                            array(num).STR_SOFU_DT = RuntimeHelpers.GetObjectValue(sqlDataReader("SOFU_DT"))
                        Else
                            array(num).STR_SOFU_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOFU_NO")))
                        If flag Then
                            array(num).STR_SOFU_NO = RuntimeHelpers.GetObjectValue(sqlDataReader("SOFU_NO"))
                        Else
                            array(num).STR_SOFU_NO = ""
                        End If
                        array(num).STR_NOHINSAKI_MEI = ""
                        array(num).STR_HACHU_NO = ""
                        array(num).STR_HACHU_DT = ""
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_TANKA")))
                        If flag Then
                            array(num).STR_SIIRE_TANKA = Conversions.ToString(sqlDataReader("SIIRE_TANKA"))
                        Else
                            array(num).STR_SIIRE_TANKA = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_GOKEI_GK")))
                        If flag Then
                            array(num).STR_SIIRE_GOKEI_GK = Conversions.ToString(sqlDataReader("SIIRE_GOKEI_GK"))
                        Else
                            array(num).STR_SIIRE_GOKEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_NEBIKI")))
                        If flag Then
                            array(num).STR_SIIRE_NEBIKI = Conversions.ToString(sqlDataReader("SIIRE_NEBIKI"))
                        Else
                            array(num).STR_SIIRE_NEBIKI = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_SHOHIZEI_GK")))
                        If flag Then
                            array(num).STR_SIIRE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SIIRE_SHOHIZEI_GK"))
                        Else
                            array(num).STR_SIIRE_SHOHIZEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_TANKA")))
                        If flag Then
                            array(num).STR_URIAGE_TANKA = Conversions.ToString(sqlDataReader("URIAGE_TANKA"))
                        Else
                            array(num).STR_URIAGE_TANKA = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_NEBIKI")))
                        If flag Then
                            array(num).STR_URIAGE_NEBIKI = Conversions.ToString(sqlDataReader("URIAGE_NEBIKI"))
                        Else
                            array(num).STR_URIAGE_NEBIKI = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_SHOHIZEI_GK")))
                        If flag Then
                            array(num).STR_URIAGE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("URIAGE_SHOHIZEI_GK"))
                        Else
                            array(num).STR_URIAGE_SHOHIZEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_GOKEI_GK")))
                        If flag Then
                            array(num).STR_URIAGE_GOKEI_GK = Conversions.ToString(sqlDataReader("URIAGE_GOKEI_GK"))
                        Else
                            array(num).STR_URIAGE_GOKEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAKUTEI_KBN")))
                        If flag Then
                            array(num).STR_KAKUTEI_KBN = Conversions.ToString(sqlDataReader("KAKUTEI_KBN"))
                        Else
                            array(num).STR_KAKUTEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                        If flag Then
                            array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                        Else
                            array(num).STR_BIKO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_YM")))
                        If flag Then
                            array(num).STR_SEISAN_YM = Conversions.ToString(sqlDataReader("SEISAN_YM"))
                        Else
                            array(num).STR_SEISAN_YM = ""
                        End If
                        array(num).STR_JYOBU_KAKUTEI_KBN = "0"
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_77F As Exception
                ProjectData.SetProjectError(expr_77F)
                Dim ex As Exception = expr_77F
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getShizaiKakutei2ManageJoho(){

    /*
        Public Function GetShizaiKakutei2ManageJoho(SoshikiCd As String, HachuNo As String, GaibuNaibuKb As String, ByRef MsgCd As String) As KobaihinList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As KobaihinList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SCF0613().ToString(), SoshikiCd, HachuNo, GaibuNaibuKb)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KobaihinList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num >= 999
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 1000)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KobaihinList(num + 1 - 1) {}), KobaihinList())
                        Dim kobaihinList As KobaihinList = array(num)
                        array(num) = New KobaihinList()
                        array(num).STR_HACHU_NO = Conversions.ToString(sqlDataReader("HACHU_NO"))
                        array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SEIKYUMOTO_CD"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD")))
                        If flag Then
                            array(num).STR_GAIBU_GYOSHA_CD = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD"))
                        Else
                            array(num).STR_GAIBU_GYOSHA_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN")))
                        If flag Then
                            array(num).STR_GAIBU_NAIBU_KBN = RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN"))
                        Else
                            array(num).STR_GAIBU_NAIBU_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_CD")))
                        If flag Then
                            array(num).STR_NOHINSAKI_CD = Conversions.ToString(sqlDataReader("NOHINSAKI_CD"))
                        Else
                            array(num).STR_NOHINSAKI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_MEI")))
                        If flag Then
                            array(num).STR_NOHINSAKI_MEI = Conversions.ToString(sqlDataReader("NOHINSAKI_MEI"))
                        Else
                            array(num).STR_NOHINSAKI_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_TEL")))
                        If flag Then
                            array(num).STR_NOHINSAKI_TEL = Conversions.ToString(sqlDataReader("NOHINSAKI_TEL"))
                        Else
                            array(num).STR_NOHINSAKI_TEL = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_FAX")))
                        If flag Then
                            array(num).STR_NOHINSAKI_FAX = Conversions.ToString(sqlDataReader("NOHINSAKI_FAX"))
                        Else
                            array(num).STR_NOHINSAKI_FAX = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("YUBIN_NO")))
                        If flag Then
                            array(num).STR_YUBIN_NO = Conversions.ToString(sqlDataReader("YUBIN_NO"))
                        Else
                            array(num).STR_YUBIN_NO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS1")))
                        If flag Then
                            array(num).STR_ADDRESS1 = Conversions.ToString(sqlDataReader("ADDRESS1"))
                        Else
                            array(num).STR_ADDRESS1 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS2")))
                        If flag Then
                            array(num).STR_ADDRESS2 = Conversions.ToString(sqlDataReader("ADDRESS2"))
                        Else
                            array(num).STR_ADDRESS2 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS3")))
                        If flag Then
                            array(num).STR_ADDRESS3 = Conversions.ToString(sqlDataReader("ADDRESS3"))
                        Else
                            array(num).STR_ADDRESS3 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_DT")))
                        If flag Then
                            array(num).STR_HACHU_DT = Conversions.ToString(sqlDataReader("HACHU_DT"))
                        Else
                            array(num).STR_HACHU_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI")))
                        If flag Then
                            array(num).STR_GYOSHA_MEI = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI"))
                        Else
                            array(num).STR_GYOSHA_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_TELL")))
                        If flag Then
                            array(num).STR_SHIIRESAKI_TEL_NO = Conversions.ToString(sqlDataReader("GYOSHA_TELL"))
                        Else
                            array(num).STR_SHIIRESAKI_TEL_NO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_FAX")))
                        If flag Then
                            array(num).STR_SHIIRESAKI_FAX_NO = Conversions.ToString(sqlDataReader("GYOSHA_FAX"))
                        Else
                            array(num).STR_SHIIRESAKI_FAX_NO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_DT")))
                        If flag Then
                            array(num).STR_NOHIN_DT = Conversions.ToString(sqlDataReader("NOHIN_DT"))
                        Else
                            array(num).STR_NOHIN_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_SU")))
                        If flag Then
                            array(num).STR_NOHIN_SU = Conversions.ToString(sqlDataReader("NOHIN_SU"))
                        Else
                            array(num).STR_NOHIN_SU = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_TANI")))
                        If flag Then
                            array(num).STR_NOHIN_TANI = Conversions.ToString(sqlDataReader("NOHIN_TANI"))
                        Else
                            array(num).STR_NOHIN_TANI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
                        If flag Then
                            array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
                        Else
                            array(num).STR_KOBAI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JISHA_KOBAI_CD")))
                        If flag Then
                            array(num).STR_JISHA_KOBAI_CD = Conversions.ToString(sqlDataReader("JISHA_KOBAI_CD"))
                        Else
                            array(num).STR_JISHA_KOBAI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
                        If flag Then
                            array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
                        Else
                            array(num).STR_KOBAI_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_YM")))
                        If flag Then
                            array(num).STR_SEISAN_YM = Conversions.ToString(sqlDataReader("SEISAN_YM"))
                        Else
                            array(num).STR_SEISAN_YM = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_TANKA")))
                        If flag Then
                            array(num).STR_SIIRE_TANKA = Conversions.ToString(sqlDataReader("SIIRE_TANKA"))
                        Else
                            array(num).STR_SIIRE_TANKA = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_GOKEI_GK")))
                        If flag Then
                            array(num).STR_SIIRE_GOKEI_GK = Conversions.ToString(sqlDataReader("SIIRE_GOKEI_GK"))
                        Else
                            array(num).STR_SIIRE_GOKEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_NEBIKI")))
                        If flag Then
                            array(num).STR_SIIRE_NEBIKI = Conversions.ToString(sqlDataReader("SIIRE_NEBIKI"))
                        Else
                            array(num).STR_SIIRE_NEBIKI = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_SHOHIZEI_GK")))
                        If flag Then
                            array(num).STR_SIIRE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SIIRE_SHOHIZEI_GK"))
                        Else
                            array(num).STR_SIIRE_SHOHIZEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_TANKA")))
                        If flag Then
                            array(num).STR_URIAGE_TANKA = Conversions.ToString(sqlDataReader("URIAGE_TANKA"))
                        Else
                            array(num).STR_URIAGE_TANKA = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_GOKEI_GK")))
                        If flag Then
                            array(num).STR_URIAGE_GOKEI_GK = Conversions.ToString(sqlDataReader("URIAGE_GOKEI_GK"))
                        Else
                            array(num).STR_URIAGE_GOKEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_NEBIKI")))
                        If flag Then
                            array(num).STR_URIAGE_NEBIKI = Conversions.ToString(sqlDataReader("URIAGE_NEBIKI"))
                        Else
                            array(num).STR_URIAGE_NEBIKI = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_SHOHIZEI_GK")))
                        If flag Then
                            array(num).STR_URIAGE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("URIAGE_SHOHIZEI_GK"))
                        Else
                            array(num).STR_URIAGE_SHOHIZEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_JYOTAI_KBN")))
                        If flag Then
                            array(num).STR_NOHIN_JYOTAI_KBN = Conversions.ToString(sqlDataReader("NOHIN_JYOTAI_KBN"))
                        Else
                            array(num).STR_NOHIN_JYOTAI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                        If flag Then
                            array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                        Else
                            array(num).STR_UPDATE_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                        If flag Then
                            array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                        Else
                            array(num).STR_BIKO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAKUTEI_KBN")))
                        If flag Then
                            array(num).STR_KAKUTEI_KBN = Conversions.ToString(sqlDataReader("KAKUTEI_KBN"))
                        Else
                            array(num).STR_KAKUTEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DELETE_FLG")))
                        If flag Then
                            array(num).STR_DELETE_FLG = Conversions.ToString(sqlDataReader("DELETE_FLG"))
                        Else
                            array(num).STR_DELETE_FLG = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_TNT_CD")))
                        If flag Then
                            array(num).STR_HACHU_TNT_ID = Conversions.ToString(sqlDataReader("HACHU_TNT_CD"))
                        Else
                            array(num).STR_HACHU_TNT_ID = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_KOBAI_CD")))
                        If flag Then
                            array(num).STR_JYOBU_KOBAI_CD = Conversions.ToString(sqlDataReader("JYOBU_KOBAI_CD"))
                        Else
                            array(num).STR_JYOBU_KOBAI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_SHIIRE_TANKA_GK")))
                        If flag Then
                            array(num).STR_JYOBU_SHIIRE_TANKA_GK = Conversions.ToString(sqlDataReader("JYOBU_SHIIRE_TANKA_GK"))
                        Else
                            array(num).STR_JYOBU_SHIIRE_TANKA_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_HANBAI_TANKA_GK")))
                        If flag Then
                            array(num).STR_JYOBU_HANBAI_TANKA_GK = Conversions.ToString(sqlDataReader("JYOBU_HANBAI_TANKA_GK"))
                        Else
                            array(num).STR_JYOBU_HANBAI_TANKA_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_KOBAI_BUNRUI_MEI")))
                        If flag Then
                            array(num).STR_JYOBU_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("JYOBU_KOBAI_BUNRUI_MEI"))
                        Else
                            array(num).STR_JYOBU_KOBAI_BUNRUI_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_KOBAI_MEI")))
                        If flag Then
                            array(num).STR_JYOBU_KOBAI_MEI = Conversions.ToString(sqlDataReader("JYOBU_KOBAI_MEI"))
                        Else
                            array(num).STR_JYOBU_KOBAI_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_RT")))
                        If flag Then
                            array(num).DEC_SHOHIZEI_RT = Conversions.ToString(sqlDataReader("SHOHIZEI_RT"))
                        Else
                            array(num).DEC_SHOHIZEI_RT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_SHIIRESAKI_MATOME_SU")))
                        If flag Then
                            array(num).STR_JYOBU_SHIIRESAKI_MATOME_SU = Conversions.ToString(sqlDataReader("JYOBU_SHIIRESAKI_MATOME_SU"))
                        Else
                            array(num).STR_JYOBU_SHIIRESAKI_MATOME_SU = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_SHIIRESAKI_MATOME_GK")))
                        If flag Then
                            array(num).STR_JYOBU_SHIIRESAKI_MATOME_GK = Conversions.ToString(sqlDataReader("JYOBU_SHIIRESAKI_MATOME_GK"))
                        Else
                            array(num).STR_JYOBU_SHIIRESAKI_MATOME_GK = "0"
                        End If
                        flag = (Versioned.IsNumeric(Strings.Trim(array(num).STR_NOHIN_SU)) And Versioned.IsNumeric(Strings.Trim(array(num).STR_JYOBU_SHIIRESAKI_MATOME_SU)))
                        Dim flag2 As Boolean
                        If flag Then
                            flag2 = (Conversions.ToLong(Strings.Trim(array(num).STR_NOHIN_SU)) >= Conversions.ToLong(Strings.Trim(array(num).STR_JYOBU_SHIIRESAKI_MATOME_SU)) And Conversions.ToLong(Strings.Trim(array(num).STR_JYOBU_SHIIRESAKI_MATOME_SU)) > 0L)
                            If flag2 Then
                                array(num).STR_JYOBU_SHIIRE_TANKA_GK = array(num).STR_JYOBU_SHIIRESAKI_MATOME_GK
                            End If
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_HANBAI_MATOME_SU")))
                        If flag2 Then
                            array(num).STR_JYOBU_HANBAI_MATOME_SU = Conversions.ToString(sqlDataReader("JYOBU_HANBAI_MATOME_SU"))
                        Else
                            array(num).STR_JYOBU_HANBAI_MATOME_SU = "0"
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_HANBAI_MATOME_GK")))
                        If flag2 Then
                            array(num).STR_JYOBU_HANBAI_MATOME_GK = Conversions.ToString(sqlDataReader("JYOBU_HANBAI_MATOME_GK"))
                        Else
                            array(num).STR_JYOBU_HANBAI_MATOME_GK = "0"
                        End If
                        flag2 = (Versioned.IsNumeric(Strings.Trim(array(num).STR_NOHIN_SU)) And Versioned.IsNumeric(Strings.Trim(array(num).STR_JYOBU_HANBAI_MATOME_SU)))
                        If flag2 Then
                            flag = (Conversions.ToLong(Strings.Trim(array(num).STR_NOHIN_SU)) >= Conversions.ToLong(Strings.Trim(array(num).STR_JYOBU_HANBAI_MATOME_SU)) And Conversions.ToLong(Strings.Trim(array(num).STR_JYOBU_HANBAI_MATOME_SU)) > 0L)
                            If flag Then
                                array(num).STR_JYOBU_HANBAI_TANKA_GK = array(num).STR_JYOBU_HANBAI_MATOME_GK
                            End If
                        End If
                        flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MIN_LOT_SU")))
                        If flag2 Then
                            array(num).INT_MIN_LOT_SU = Conversions.ToInteger(sqlDataReader("MIN_LOT_SU"))
                        Else
                            array(num).INT_MIN_LOT_SU = Conversions.ToInteger("0")
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_FF9 As Exception
                ProjectData.SetProjectError(expr_FF9)
                Dim ex As Exception = expr_FF9
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getShizaiKakutei3ManageJoho(){

    /*
        Public Function GetShizaiKakutei3ManageJoho(SEIKYUMOTO_CD As String, GAIBU_NAIBU_KBN As String, GYOSHA_CD As String, SOFU_DT As String, SOFU_NO As String, ByRef MsgCd As String) As KobaihinList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As KobaihinList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SCF0612().ToString(), New Object()() { SEIKYUMOTO_CD, GAIBU_NAIBU_KBN, GYOSHA_CD, SOFU_DT, SOFU_NO })
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KobaihinList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num >= 999
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 1000)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KobaihinList(num + 1 - 1) {}), KobaihinList())
                        Dim kobaihinList As KobaihinList = array(num)
                        array(num) = New KobaihinList()
                        array(num).STR_HACHU_NO = Conversions.ToString(sqlDataReader("HACHU_NO"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYUMOTO_CD")))
                        If flag Then
                            array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SEIKYUMOTO_CD"))
                        Else
                            array(num).STR_SOSHIKI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD")))
                        If flag Then
                            array(num).STR_GAIBU_GYOSHA_CD = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD"))
                        Else
                            array(num).STR_GAIBU_GYOSHA_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN")))
                        If flag Then
                            array(num).STR_GAIBU_NAIBU_KBN = RuntimeHelpers.GetObjectValue(sqlDataReader("GAIBU_NAIBU_KBN"))
                        Else
                            array(num).STR_GAIBU_NAIBU_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_CD")))
                        If flag Then
                            array(num).STR_NOHINSAKI_CD = Conversions.ToString(sqlDataReader("NOHINSAKI_CD"))
                        Else
                            array(num).STR_NOHINSAKI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_MEI")))
                        If flag Then
                            array(num).STR_NOHINSAKI_MEI = Conversions.ToString(sqlDataReader("NOHINSAKI_MEI"))
                        Else
                            array(num).STR_NOHINSAKI_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_TEL")))
                        If flag Then
                            array(num).STR_NOHINSAKI_TEL = Conversions.ToString(sqlDataReader("NOHINSAKI_TEL"))
                        Else
                            array(num).STR_NOHINSAKI_TEL = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHINSAKI_FAX")))
                        If flag Then
                            array(num).STR_NOHINSAKI_FAX = Conversions.ToString(sqlDataReader("NOHINSAKI_FAX"))
                        Else
                            array(num).STR_NOHINSAKI_FAX = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("YUBIN_NO")))
                        If flag Then
                            array(num).STR_YUBIN_NO = Conversions.ToString(sqlDataReader("YUBIN_NO"))
                        Else
                            array(num).STR_YUBIN_NO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS1")))
                        If flag Then
                            array(num).STR_ADDRESS1 = Conversions.ToString(sqlDataReader("ADDRESS1"))
                        Else
                            array(num).STR_ADDRESS1 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS2")))
                        If flag Then
                            array(num).STR_ADDRESS2 = Conversions.ToString(sqlDataReader("ADDRESS2"))
                        Else
                            array(num).STR_ADDRESS2 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS3")))
                        If flag Then
                            array(num).STR_ADDRESS3 = Conversions.ToString(sqlDataReader("ADDRESS3"))
                        Else
                            array(num).STR_ADDRESS3 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_DT")))
                        If flag Then
                            array(num).STR_HACHU_DT = Conversions.ToString(sqlDataReader("HACHU_DT"))
                        Else
                            array(num).STR_HACHU_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI")))
                        If flag Then
                            array(num).STR_GYOSHA_MEI = RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_MEI"))
                        Else
                            array(num).STR_GYOSHA_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_TELL")))
                        If flag Then
                            array(num).STR_SHIIRESAKI_TEL_NO = Conversions.ToString(sqlDataReader("GYOSHA_TELL"))
                        Else
                            array(num).STR_SHIIRESAKI_TEL_NO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_FAX")))
                        If flag Then
                            array(num).STR_SHIIRESAKI_FAX_NO = Conversions.ToString(sqlDataReader("GYOSHA_FAX"))
                        Else
                            array(num).STR_SHIIRESAKI_FAX_NO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_DT")))
                        If flag Then
                            array(num).STR_NOHIN_DT = Conversions.ToString(sqlDataReader("NOHIN_DT"))
                        Else
                            array(num).STR_NOHIN_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_SU")))
                        If flag Then
                            array(num).STR_NOHIN_SU = Conversions.ToString(sqlDataReader("NOHIN_SU"))
                        Else
                            array(num).STR_NOHIN_SU = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_TANI")))
                        If flag Then
                            array(num).STR_NOHIN_TANI = Conversions.ToString(sqlDataReader("NOHIN_TANI"))
                        Else
                            array(num).STR_NOHIN_TANI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
                        If flag Then
                            array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
                        Else
                            array(num).STR_KOBAI_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_MEI")))
                        If flag Then
                            array(num).STR_KOBAI_MEI = Conversions.ToString(sqlDataReader("KOBAI_MEI"))
                        Else
                            array(num).STR_KOBAI_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_YM")))
                        If flag Then
                            array(num).STR_SEISAN_YM = Conversions.ToString(sqlDataReader("SEISAN_YM"))
                        Else
                            array(num).STR_SEISAN_YM = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_TANKA")))
                        If flag Then
                            array(num).STR_SIIRE_TANKA = Conversions.ToString(sqlDataReader("SIIRE_TANKA"))
                        Else
                            array(num).STR_SIIRE_TANKA = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_GOKEI_GK")))
                        If flag Then
                            array(num).STR_SIIRE_GOKEI_GK = Conversions.ToString(sqlDataReader("SIIRE_GOKEI_GK"))
                        Else
                            array(num).STR_SIIRE_GOKEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_NEBIKI")))
                        If flag Then
                            array(num).STR_SIIRE_NEBIKI = Conversions.ToString(sqlDataReader("SIIRE_NEBIKI"))
                        Else
                            array(num).STR_SIIRE_NEBIKI = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SIIRE_SHOHIZEI_GK")))
                        If flag Then
                            array(num).STR_SIIRE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SIIRE_SHOHIZEI_GK"))
                        Else
                            array(num).STR_SIIRE_SHOHIZEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_TANKA")))
                        If flag Then
                            array(num).STR_URIAGE_TANKA = Conversions.ToString(sqlDataReader("URIAGE_TANKA"))
                        Else
                            array(num).STR_URIAGE_TANKA = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_GOKEI_GK")))
                        If flag Then
                            array(num).STR_URIAGE_GOKEI_GK = Conversions.ToString(sqlDataReader("URIAGE_GOKEI_GK"))
                        Else
                            array(num).STR_URIAGE_GOKEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_NEBIKI")))
                        If flag Then
                            array(num).STR_URIAGE_NEBIKI = Conversions.ToString(sqlDataReader("URIAGE_NEBIKI"))
                        Else
                            array(num).STR_URIAGE_NEBIKI = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("URIAGE_SHOHIZEI_GK")))
                        If flag Then
                            array(num).STR_URIAGE_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("URIAGE_SHOHIZEI_GK"))
                        Else
                            array(num).STR_URIAGE_SHOHIZEI_GK = "0"
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_JYOTAI_KBN")))
                        If flag Then
                            array(num).STR_NOHIN_JYOTAI_KBN = Conversions.ToString(sqlDataReader("NOHIN_JYOTAI_KBN"))
                        Else
                            array(num).STR_NOHIN_JYOTAI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UPDATE_DT")))
                        If flag Then
                            array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                        Else
                            array(num).STR_UPDATE_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("BIKO")))
                        If flag Then
                            array(num).STR_BIKO = Conversions.ToString(sqlDataReader("BIKO"))
                        Else
                            array(num).STR_BIKO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAKUTEI_KBN")))
                        If flag Then
                            array(num).STR_KAKUTEI_KBN = Conversions.ToString(sqlDataReader("KAKUTEI_KBN"))
                        Else
                            array(num).STR_KAKUTEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DELETE_FLG")))
                        If flag Then
                            array(num).STR_DELETE_FLG = Conversions.ToString(sqlDataReader("DELETE_FLG"))
                        Else
                            array(num).STR_DELETE_FLG = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_TNT_CD")))
                        If flag Then
                            array(num).STR_HACHU_TNT_ID = Conversions.ToString(sqlDataReader("HACHU_TNT_CD"))
                        Else
                            array(num).STR_HACHU_TNT_ID = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HACHU_TNT_CD")))
                        If flag Then
                            array(num).STR_HACHU_TNT_ID = Conversions.ToString(sqlDataReader("HACHU_TNT_CD"))
                        Else
                            array(num).STR_HACHU_TNT_ID = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MIN_LOT_SU")))
                        If flag Then
                            array(num).INT_MIN_LOT_SU = Conversions.ToInteger(sqlDataReader("MIN_LOT_SU"))
                        Else
                            array(num).INT_MIN_LOT_SU = Conversions.ToInteger("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_SURYO_TANI")))
                        If flag Then
                            array(num).STR_NOHIN_TANI = Conversions.ToString(sqlDataReader("KOBAI_SURYO_TANI"))
                        Else
                            array(num).STR_NOHIN_TANI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOHIN_HACHU_NO")))
                        If flag Then
                            array(num).STR_NOHIN_HACHU_NO = Conversions.ToString(sqlDataReader("NOHIN_HACHU_NO"))
                        Else
                            array(num).STR_NOHIN_HACHU_NO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HAIKA_HACHU_NO")))
                        If flag Then
                            array(num).STR_HAIKA_HACHU_NO = Conversions.ToString(sqlDataReader("HAIKA_HACHU_NO"))
                        Else
                            array(num).STR_HAIKA_HACHU_NO = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HAIKA_KAKUTEI_KBN")))
                        If flag Then
                            array(num).STR_HAIKA_KAKUTEI_KBN = Conversions.ToString(sqlDataReader("HAIKA_KAKUTEI_KBN"))
                        Else
                            array(num).STR_HAIKA_KAKUTEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JYOBU_KOBAI_CD")))
                        If flag Then
                            array(num).STR_JYOBU_KOBAI_CD = Conversions.ToString(sqlDataReader("JYOBU_KOBAI_CD"))
                        Else
                            array(num).STR_JYOBU_KOBAI_CD = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_DAD As Exception
                ProjectData.SetProjectError(expr_DAD)
                Dim ex As Exception = expr_DAD
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