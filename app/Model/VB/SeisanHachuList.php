<?php
class SeisanHachuList extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanHachuJoho(){

    /*
        Public Function GetSeisanHachuJoho(SeikyuYm As String, MotoSoshikiCode As String, SakiSoshikiCode As String, UketsukeNo As String, SeikyuSiharaiCd As String, ByRef MsgCd As String) As SeisanHachuList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanHachuList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF0410().ToString(), New Object()() { SeikyuYm, MotoSoshikiCode, SakiSoshikiCode, UketsukeNo, SeikyuSiharaiCd })
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanHachuList()
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanHachuList(num + 1 - 1) {}), SeisanHachuList())
                    Dim seisanHachuList As SeisanHachuList = array(num)
                    array(num) = New SeisanHachuList()
                    array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                    array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                    array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                    array(num).STR_UKETSUKE_NO = Conversions.ToString(sqlDataReader("UKETSUKE_NO"))
                    array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                    Dim flag As Boolean = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CENTER_CD")))
                    If flag Then
                        array(num).STR_CENTER_CD = Conversions.ToString(sqlDataReader("CENTER_CD"))
                    Else
                        array(num).STR_CENTER_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETSUKE_DT")))
                    If flag Then
                        array(num).STR_UKETSUKE_DT = Conversions.ToString(sqlDataReader("UKETSUKE_DT"))
                    Else
                        array(num).STR_UKETSUKE_DT = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD")))
                    If flag Then
                        array(num).STR_GYOSHA_CD = Conversions.ToString(sqlDataReader("GYOSHA_CD"))
                    Else
                        array(num).STR_GYOSHA_CD = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GK")))
                    If flag Then
                        array(num).DEC_SEIKYU_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_GK"))
                    Else
                        array(num).DEC_SEIKYU_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                    If flag Then
                        array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                    Else
                        array(num).STR_SHOHIZEI_KBN = ""
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_GK")))
                    If flag Then
                        array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal(sqlDataReader("SHOHIZEI_GK"))
                    Else
                        array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal("0")
                    End If
                    flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NEBIKI")))
                    If flag Then
                        array(num).DEC_NEBIKI = Conversions.ToDecimal(sqlDataReader("NEBIKI"))
                    Else
                        array(num).DEC_NEBIKI = Conversions.ToDecimal("0")
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_36E As Exception
                ProjectData.SetProjectError(expr_36E)
                Dim ex As Exception = expr_36E
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSeisanHachuJoho2(){

    /*
        Public Function GetSeisanHachuJoho2(SeikyuYm As String, MotoSoshikiCode As String, SakiSoshikiCode As String, UketsukeNo As String, SeikyuSiharaiCd As String, ByRef MsgCd As String) As SeisanHachuList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanHachuList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF0411().ToString(), New Object()() { SeikyuYm, MotoSoshikiCode, SakiSoshikiCode, UketsukeNo, SeikyuSiharaiCd })
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanHachuList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num > 999
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num <= 1000)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanHachuList(num + 1 - 1) {}), SeisanHachuList())
                        Dim seisanHachuList As SeisanHachuList = array(num)
                        array(num) = New SeisanHachuList()
                        array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                        array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                        array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                        array(num).STR_UKETSUKE_NO = Conversions.ToString(sqlDataReader("UKETSUKE_NO"))
                        array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CENTER_CD")))
                        If flag Then
                            array(num).STR_CENTER_CD = Conversions.ToString(sqlDataReader("CENTER_CD"))
                        Else
                            array(num).STR_CENTER_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETSUKE_DT")))
                        If flag Then
                            array(num).STR_UKETSUKE_DT = Conversions.ToString(sqlDataReader("UKETSUKE_DT"))
                        Else
                            array(num).STR_UKETSUKE_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD")))
                        If flag Then
                            array(num).STR_GYOSHA_CD = Conversions.ToString(sqlDataReader("GYOSHA_CD"))
                        Else
                            array(num).STR_GYOSHA_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GK")))
                        If flag Then
                            array(num).DEC_SEIKYU_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_GK"))
                        Else
                            array(num).DEC_SEIKYU_GK = Conversions.ToDecimal("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                        Else
                            array(num).STR_SHOHIZEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_GK")))
                        If flag Then
                            array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal(sqlDataReader("SHOHIZEI_GK"))
                        Else
                            array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NEBIKI")))
                        If flag Then
                            array(num).DEC_NEBIKI = Conversions.ToDecimal(sqlDataReader("NEBIKI"))
                        Else
                            array(num).DEC_NEBIKI = Conversions.ToDecimal("0")
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_39C As Exception
                ProjectData.SetProjectError(expr_39C)
                Dim ex As Exception = expr_39C
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSeisanHachuMeisaiJoho(){

    /*
        Public Function GetSeisanHachuMeisaiJoho(SeikyuYm As String, MotoSoshikiCode As String, SakiSoshikiCode As String, UketsukeNo As String, SeikyuSiharaiCd As String, ByRef MsgCd As String) As SeisanHachuList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanHachuList()
            Try
                Dim flag As Boolean = Operators.CompareString(SeikyuSiharaiCd, "2", False) = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SEF0420().ToString(), New Object()() { SeikyuYm, MotoSoshikiCode, SakiSoshikiCode, UketsukeNo, SeikyuSiharaiCd })
                Else
                    strSQL = String.Format(masterSQL.SEF0421().ToString(), New Object()() { SeikyuYm, MotoSoshikiCode, SakiSoshikiCode, UketsukeNo, SeikyuSiharaiCd })
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanHachuList()
                While sqlDataReader.Read()
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanHachuList(num + 1 - 1) {}), SeisanHachuList())
                        Dim seisanHachuList As SeisanHachuList = array(num)
                        array(num) = New SeisanHachuList()
                        array(num).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
                        array(num).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
                        array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                        array(num).STR_UKETSUKE_NO = Conversions.ToString(sqlDataReader("UKETSUKE_NO"))
                        array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CENTER_CD")))
                        If flag Then
                            array(num).STR_CENTER_CD = Conversions.ToString(sqlDataReader("CENTER_CD"))
                        Else
                            array(num).STR_CENTER_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("UKETSUKE_DT")))
                        If flag Then
                            array(num).STR_UKETSUKE_DT = Conversions.ToString(sqlDataReader("UKETSUKE_DT"))
                        Else
                            array(num).STR_UKETSUKE_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_CD")))
                        If flag Then
                            array(num).STR_GYOSHA_CD = Conversions.ToString(sqlDataReader("GYOSHA_CD"))
                        Else
                            array(num).STR_GYOSHA_CD = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KOBAI_CD")))
                        If flag Then
                            array(num).STR_KOBAI_CD = Conversions.ToString(sqlDataReader("KOBAI_CD"))
                        Else
                            array(num).STR_KOBAI_CD = ""
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
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SURYO")))
                        If flag Then
                            array(num).INT_SURYO = Conversions.ToInteger(sqlDataReader("SURYO"))
                        Else
                            array(num).INT_SURYO = Conversions.ToInteger("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GK")))
                        If flag Then
                            array(num).DEC_SEIKYU_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_GK"))
                        Else
                            array(num).DEC_SEIKYU_GK = Conversions.ToDecimal("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
                        If flag Then
                            array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
                        Else
                            array(num).STR_SHOHIZEI_KBN = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ZEINUKI_TANKA_GK")))
                        If flag Then
                            array(num).DEC_ZEINUKI_TANKA_GK = Conversions.ToDecimal(sqlDataReader("ZEINUKI_TANKA_GK"))
                        Else
                            array(num).DEC_ZEINUKI_TANKA_GK = Conversions.ToDecimal("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_GK")))
                        If flag Then
                            array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal(sqlDataReader("SHOHIZEI_GK"))
                        Else
                            array(num).DEC_SHOHIZEI_GK = Conversions.ToDecimal("0")
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("NOUHIN_DT")))
                        If flag Then
                            array(num).STR_NOUHIN_DT = Conversions.ToString(sqlDataReader("NOUHIN_DT"))
                        Else
                            array(num).STR_NOUHIN_DT = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GYOSHA_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_GYOSHA_RYAKU_MEI = Conversions.ToString(sqlDataReader("GYOSHA_RYAKU_MEI"))
                        Else
                            array(num).STR_GYOSHA_RYAKU_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
                        If flag Then
                            array(num).STR_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
                        Else
                            array(num).STR_SOSHIKI_RYAKU_MEI = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_5F4 As Exception
                ProjectData.SetProjectError(expr_5F4)
                Dim ex As Exception = expr_5F4
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