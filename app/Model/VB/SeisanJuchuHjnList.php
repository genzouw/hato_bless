<?php
class SeisanJuchuHjnList extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanJuchuHjnJoho(){

    /*
        Public Function GetSeisanJuchuHjnJoho(SeikyuYm As String, MotoSoshikiCode As String, SakiSoshikiCode As String, UketsukeNo As String, SeikyuSiharaiCd As String, SeikyuGkKbn As String, ByRef MsgCd As String) As SeisanJuchuHjnList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanJuchuHjnList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF0103().ToString(), New Object()() { SeikyuYm, MotoSoshikiCode, SakiSoshikiCode, UketsukeNo, SeikyuSiharaiCd, SeikyuGkKbn })
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanJuchuHjnList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanJuchuHjnList(num + 1 - 1) {}), SeisanJuchuHjnList())
                    Dim seisanJuchuHjnList As SeisanJuchuHjnList = array(num)
                    array(num) = New SeisanJuchuHjnList()
                    array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                    array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                    array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                    array(num).STR_UKETSUKE_NO = Conversions.ToString(sqlDataReader("UKETSUKE_NO"))
                    array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                    array(num).STR_CENTER_CD = Conversions.ToString(sqlDataReader("CENTER_CD"))
                    Dim flag As Boolean = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETSUKE_DT")))
                    If flag Then
                        array(num).STR_UKETSUKE_DT = Conversions.ToString(sqlDataReader("UKETSUKE_DT"))
                    Else
                        array(num).STR_UKETSUKE_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TORIATSUKAI_KBN")))
                    If flag Then
                        array(num).STR_TORIATSUKAI_KBN = Conversions.ToString(sqlDataReader("TORIATSUKAI_KBN"))
                    Else
                        array(num).STR_TORIATSUKAI_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_CD")))
                    If flag Then
                        array(num).STR_HOJIN_CD = Conversions.ToString(sqlDataReader("HOJIN_CD"))
                    Else
                        array(num).STR_HOJIN_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_TNT_MEI")))
                    If flag Then
                        array(num).STR_HONJIN_TNT_MEI = Conversions.ToString(sqlDataReader("HOJIN_TNT_MEI"))
                    Else
                        array(num).STR_HONJIN_TNT_MEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_KEIYU_CD")))
                    If flag Then
                        array(num).STR_JUCHU_KEIYU_CD = Conversions.ToString(sqlDataReader("JUCHU_KEIYU_CD"))
                    Else
                        array(num).STR_JUCHU_KEIYU_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_KBN")))
                    If flag Then
                        array(num).STR_KOKYAKU_SEIKYU_KBN = Conversions.ToString(sqlDataReader("KOKYAKU_SEIKYU_KBN"))
                    Else
                        array(num).STR_KOKYAKU_SEIKYU_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKUMEI")))
                    If flag Then
                        array(num).STR_KOKYAKUMEI = Conversions.ToString(sqlDataReader("KOKYAKUMEI"))
                    Else
                        array(num).STR_KOKYAKUMEI = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GK")))
                    If flag Then
                        array(num).DEC_SEIKYU_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_GK"))
                    Else
                        array(num).DEC_SEIKYU_GK = Conversions.ToDecimal("")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_UTIZEI_GK")))
                    If flag Then
                        array(num).DEC_SEIKYU_UTIZEI_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_UTIZEI_GK"))
                    Else
                        array(num).DEC_SEIKYU_UTIZEI_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TATEKAE_GK")))
                    If flag Then
                        array(num).DEC_TATEKAE_GK = Conversions.ToDecimal(sqlDataReader("TATEKAE_GK"))
                    Else
                        array(num).DEC_TATEKAE_GK = Conversions.ToDecimal("0")
                    End If
                    array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_GK")))
                    If flag Then
                        array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal(sqlDataReader("SHOHIZEI_GK"))
                    Else
                        array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal("")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_DT")))
                    If flag Then
                        array(num).STR_JUCHU_DT = Conversions.ToString(sqlDataReader("JUCHU_DT"))
                    Else
                        array(num).STR_JUCHU_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_DT")))
                    If flag Then
                        array(num).STR_SEIKYU_DT = Conversions.ToString(sqlDataReader("SEIKYU_DT"))
                    Else
                        array(num).STR_SEIKYU_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("OROSHI_DT")))
                    If flag Then
                        array(num).STR_OROSHI_DT = Conversions.ToString(sqlDataReader("OROSHI_DT"))
                    Else
                        array(num).STR_OROSHI_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_UPDATE")))
                    If flag Then
                        array(num).STR_JUCHU_UPDATE = Conversions.ToString(sqlDataReader("JUCHU_UPDATE"))
                    Else
                        array(num).STR_JUCHU_UPDATE = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_TNT_CD")))
                    If flag Then
                        array(num).STR_JUCHU_TNT_CD = Conversions.ToString(sqlDataReader("JUCHU_TNT_CD"))
                    Else
                        array(num).STR_JUCHU_TNT_CD = ""
                    End If
                    array(num).STR_SEIKYU_GK_KBN = Conversions.ToString(sqlDataReader("SEIKYU_GK_KBN"))
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
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_RYAKU_MEI")))
                    If flag Then
                        array(num).STR_HOJIN_RYAKU_MEI = Conversions.ToString(sqlDataReader("HOJIN_RYAKU_MEI"))
                    Else
                        array(num).STR_HOJIN_RYAKU_MEI = ""
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_7B4 As Exception
                ProjectData.SetProjectError(expr_7B4)
                Dim ex As Exception = expr_7B4
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSeisanJuchuHjnJoho2(){

    /*
        Public Function GetSeisanJuchuHjnJoho2(SeikyuYm As String, MotoSoshikiCode As String, SakiSoshikiCode As String, UketsukeNo As String, SeikyuSiharaiCd As String, Kngkbn As String, ByRef MsgCd As String) As SeisanJuchuHjnList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanJuchuHjnList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF0101().ToString(), New Object()() { SeikyuYm, MotoSoshikiCode, SakiSoshikiCode, UketsukeNo, SeikyuSiharaiCd, Kngkbn })
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanJuchuHjnList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num > 999
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num <= 1000)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanJuchuHjnList(num + 1 - 1) {}), SeisanJuchuHjnList())
                        Dim seisanJuchuHjnList As SeisanJuchuHjnList = array(num)
                        array(num) = New SeisanJuchuHjnList()
                        array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                        array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                        array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                        array(num).STR_UKETSUKE_NO = Conversions.ToString(sqlDataReader("UKETSUKE_NO"))
                        array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                        array(num).STR_CENTER_CD = Conversions.ToString(sqlDataReader("CENTER_CD"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETSUKE_DT")))
                        If flag Then
                            array(num).STR_UKETSUKE_DT = Conversions.ToString(sqlDataReader("UKETSUKE_DT"))
                        Else
                            array(num).STR_UKETSUKE_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TORIATSUKAI_KBN")))
                        If flag Then
                            array(num).STR_TORIATSUKAI_KBN = Conversions.ToString(sqlDataReader("TORIATSUKAI_KBN"))
                        Else
                            array(num).STR_TORIATSUKAI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_CD")))
                        If flag Then
                            array(num).STR_HOJIN_CD = Conversions.ToString(sqlDataReader("HOJIN_CD"))
                        Else
                            array(num).STR_HOJIN_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_TNT_MEI")))
                        If flag Then
                            array(num).STR_HONJIN_TNT_MEI = Conversions.ToString(sqlDataReader("HOJIN_TNT_MEI"))
                        Else
                            array(num).STR_HONJIN_TNT_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_KEIYU_CD")))
                        If flag Then
                            array(num).STR_JUCHU_KEIYU_CD = Conversions.ToString(sqlDataReader("JUCHU_KEIYU_CD"))
                        Else
                            array(num).STR_JUCHU_KEIYU_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_KBN")))
                        If flag Then
                            array(num).STR_KOKYAKU_SEIKYU_KBN = Conversions.ToString(sqlDataReader("KOKYAKU_SEIKYU_KBN"))
                        Else
                            array(num).STR_KOKYAKU_SEIKYU_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKUMEI")))
                        If flag Then
                            array(num).STR_KOKYAKUMEI = Conversions.ToString(sqlDataReader("KOKYAKUMEI"))
                        Else
                            array(num).STR_KOKYAKUMEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GK")))
                        If flag Then
                            array(num).DEC_SEIKYU_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_GK"))
                        Else
                            array(num).DEC_SEIKYU_GK = Conversions.ToDecimal("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_UTIZEI_GK")))
                        If flag Then
                            array(num).DEC_SEIKYU_UTIZEI_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_UTIZEI_GK"))
                        Else
                            array(num).DEC_SEIKYU_UTIZEI_GK = Conversions.ToDecimal("0")
                        End If
                        array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_GK")))
                        If flag Then
                            array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal(sqlDataReader("SHOHIZEI_GK"))
                        Else
                            array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_DT")))
                        If flag Then
                            array(num).STR_JUCHU_DT = Conversions.ToString(sqlDataReader("JUCHU_DT"))
                        Else
                            array(num).STR_JUCHU_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_DT")))
                        If flag Then
                            array(num).STR_SEIKYU_DT = Conversions.ToString(sqlDataReader("SEIKYU_DT"))
                        Else
                            array(num).STR_SEIKYU_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("OROSHI_DT")))
                        If flag Then
                            array(num).STR_OROSHI_DT = Conversions.ToString(sqlDataReader("OROSHI_DT"))
                        Else
                            array(num).STR_OROSHI_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_UPDATE")))
                        If flag Then
                            array(num).STR_JUCHU_UPDATE = Conversions.ToString(sqlDataReader("JUCHU_UPDATE"))
                        Else
                            array(num).STR_JUCHU_UPDATE = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_TNT_CD")))
                        If flag Then
                            array(num).STR_JUCHU_TNT_CD = Conversions.ToString(sqlDataReader("JUCHU_TNT_CD"))
                        Else
                            array(num).STR_JUCHU_TNT_CD = ""
                        End If
                        array(num).STR_SEIKYU_GK_KBN = Conversions.ToString(sqlDataReader("SEIKYU_GK_KBN"))
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
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_HOJIN_RYAKU_MEI = Conversions.ToString(sqlDataReader("HOJIN_RYAKU_MEI"))
                        Else
                            array(num).STR_HOJIN_RYAKU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TATEKAE_GK")))
                        If flag Then
                            array(num).DEC_TATEKAE_GK = Conversions.ToDecimal(sqlDataReader("TATEKAE_GK"))
                        Else
                            array(num).DEC_TATEKAE_GK = Conversions.ToDecimal("0")
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_7E2 As Exception
                ProjectData.SetProjectError(expr_7E2)
                Dim ex As Exception = expr_7E2
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSeisanJuchuHjnJoho3(){

    /*
        Public Function GetSeisanJuchuHjnJoho3(SeikyuYm As String, MotoSoshikiCode As String, SakiSoshikiCode As String, UketsukeNo As String, SeikyuSiharaiCd As String, Kngkbn As String, ByRef MsgCd As String) As SeisanJuchuHjnList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanJuchuHjnList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF0102().ToString(), New Object()() { SeikyuYm, MotoSoshikiCode, SakiSoshikiCode, UketsukeNo, SeikyuSiharaiCd, Kngkbn })
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanJuchuHjnList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num >= 99
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanJuchuHjnList(num + 1 - 1) {}), SeisanJuchuHjnList())
                        Dim seisanJuchuHjnList As SeisanJuchuHjnList = array(num)
                        array(num) = New SeisanJuchuHjnList()
                        array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                        array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                        array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                        array(num).STR_UKETSUKE_NO = Conversions.ToString(sqlDataReader("UKETSUKE_NO"))
                        array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                        array(num).STR_CENTER_CD = Conversions.ToString(sqlDataReader("CENTER_CD"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETSUKE_DT")))
                        If flag Then
                            array(num).STR_UKETSUKE_DT = Conversions.ToString(sqlDataReader("UKETSUKE_DT"))
                        Else
                            array(num).STR_UKETSUKE_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TORIATSUKAI_KBN")))
                        If flag Then
                            array(num).STR_TORIATSUKAI_KBN = Conversions.ToString(sqlDataReader("TORIATSUKAI_KBN"))
                        Else
                            array(num).STR_TORIATSUKAI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_CD")))
                        If flag Then
                            array(num).STR_HOJIN_CD = Conversions.ToString(sqlDataReader("HOJIN_CD"))
                        Else
                            array(num).STR_HOJIN_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_TNT_MEI")))
                        If flag Then
                            array(num).STR_HONJIN_TNT_MEI = Conversions.ToString(sqlDataReader("HOJIN_TNT_MEI"))
                        Else
                            array(num).STR_HONJIN_TNT_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_KEIYU_CD")))
                        If flag Then
                            array(num).STR_JUCHU_KEIYU_CD = Conversions.ToString(sqlDataReader("JUCHU_KEIYU_CD"))
                        Else
                            array(num).STR_JUCHU_KEIYU_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKU_SEIKYU_KBN")))
                        If flag Then
                            array(num).STR_KOKYAKU_SEIKYU_KBN = Conversions.ToString(sqlDataReader("KOKYAKU_SEIKYU_KBN"))
                        Else
                            array(num).STR_KOKYAKU_SEIKYU_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOKYAKUMEI")))
                        If flag Then
                            array(num).STR_KOKYAKUMEI = Conversions.ToString(sqlDataReader("KOKYAKUMEI"))
                        Else
                            array(num).STR_KOKYAKUMEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GK")))
                        If flag Then
                            array(num).DEC_SEIKYU_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_GK"))
                        Else
                            array(num).DEC_SEIKYU_GK = Conversions.ToDecimal("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_UTIZEI_GK")))
                        If flag Then
                            array(num).DEC_SEIKYU_UTIZEI_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_UTIZEI_GK"))
                        Else
                            array(num).DEC_SEIKYU_UTIZEI_GK = Conversions.ToDecimal("0")
                        End If
                        array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_GK")))
                        If flag Then
                            array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal(sqlDataReader("SHOHIZEI_GK"))
                        Else
                            array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_DT")))
                        If flag Then
                            array(num).STR_JUCHU_DT = Conversions.ToString(sqlDataReader("JUCHU_DT"))
                        Else
                            array(num).STR_JUCHU_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_DT")))
                        If flag Then
                            array(num).STR_SEIKYU_DT = Conversions.ToString(sqlDataReader("SEIKYU_DT"))
                        Else
                            array(num).STR_SEIKYU_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("OROSHI_DT")))
                        If flag Then
                            array(num).STR_OROSHI_DT = Conversions.ToString(sqlDataReader("OROSHI_DT"))
                        Else
                            array(num).STR_OROSHI_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_UPDATE")))
                        If flag Then
                            array(num).STR_JUCHU_UPDATE = Conversions.ToString(sqlDataReader("JUCHU_UPDATE"))
                        Else
                            array(num).STR_JUCHU_UPDATE = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("JUCHU_TNT_CD")))
                        If flag Then
                            array(num).STR_JUCHU_TNT_CD = Conversions.ToString(sqlDataReader("JUCHU_TNT_CD"))
                        Else
                            array(num).STR_JUCHU_TNT_CD = ""
                        End If
                        array(num).STR_SEIKYU_GK_KBN = Conversions.ToString(sqlDataReader("SEIKYU_GK_KBN"))
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
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HOJIN_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_HOJIN_RYAKU_MEI = Conversions.ToString(sqlDataReader("HOJIN_RYAKU_MEI"))
                        Else
                            array(num).STR_HOJIN_RYAKU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_MOTO_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI"))
                        Else
                            array(num).STR_MOTO_SOSHIKI_RYAKU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_SAKI_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI"))
                        Else
                            array(num).STR_SAKI_SOSHIKI_RYAKU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAKUTEI_KESHI_KBN")))
                        If flag Then
                            array(num).STR_KAKUTEI_KESHI_KBN = Conversions.ToString(sqlDataReader("KAKUTEI_KESHI_KBN"))
                        Else
                            array(num).STR_KAKUTEI_KESHI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TATEKAE_GK")))
                        If flag Then
                            array(num).DEC_TATEKAE_GK = Conversions.ToDecimal(sqlDataReader("TATEKAE_GK"))
                        Else
                            array(num).DEC_TATEKAE_GK = Conversions.ToDecimal("0")
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_8C3 As Exception
                ProjectData.SetProjectError(expr_8C3)
                Dim ex As Exception = expr_8C3
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