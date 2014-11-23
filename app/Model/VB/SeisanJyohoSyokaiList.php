<?php
class SeisanJyohoSyokaiList extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanSyokaiJyoho(){

    /*
        Public Function GetSeisanSyokaiJyoho(objEntity As Object(), ByRef MsgCd As String, FindFlg As String, Optional count As String="0") As SeisanJyohoSyokaiList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanJyohoSyokaiList()
            Try
                Dim seisanJyohoSyokaiList As SeisanJyohoSyokaiList = New SeisanJyohoSyokaiList()
                Dim flag As Boolean = Operators.CompareString(FindFlg, Conversions.ToString(0), False) = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SEF0115().ToString(), RuntimeHelpers.GetObjectValue(objEntity(0)), RuntimeHelpers.GetObjectValue(objEntity(1)), RuntimeHelpers.GetObjectValue(objEntity(2)))
                Else
                    flag = (Operators.CompareString(FindFlg, Conversions.ToString(1), False) = 0)
                    If flag Then
                        strSQL = String.Format(masterSQL.SEF0115().ToString(), RuntimeHelpers.GetObjectValue(objEntity(0)), RuntimeHelpers.GetObjectValue(objEntity(1)), "")
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                flag = (Operators.CompareString(count, "1", False) = 0)
                Dim array As SeisanJyohoSyokaiList()
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(MsgCd, "SE0001", False) = 0
                    If flag2 Then
                        result = array
                        Return result
                    End If
                End If
                Dim num As Integer = 0
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanJyohoSyokaiList(num + 1 - 1) {}), SeisanJyohoSyokaiList())
                    Dim seisanJyohoSyokaiList2 As SeisanJyohoSyokaiList = array(num)
                    array(num) = New SeisanJyohoSyokaiList()
                    array(num).STR_SEIKYU_YM = RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_YM"))
                    array(num).STR_SAKI_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI"))
                    array(num).STR_MOTO_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI"))
                    array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                    array(num).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                    Dim flag2 As Boolean = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GOUKEI")))
                    If flag2 Then
                        array(num).DEC_SIHARAI_GOKEI_GK = Conversions.ToDecimal(sqlDataReader("GOUKEI"))
                    Else
                        array(num).DEC_SIHARAI_GOKEI_GK = Decimal.Zero
                    End If
                    array(num).STR_SEQ_NO = Conversions.ToString(sqlDataReader("SEQ_NO"))
                    array(num).STR_KANRI_NO = Conversions.ToString(sqlDataReader("KANRI_NO"))
                    array(num).STR_MEISAI_KBN = Conversions.ToString(sqlDataReader("MEISAI_KBN"))
                    array(num).STR_MOTO_SOSHIKI_CD = RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_CD"))
                    array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                    array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GK_KBN")))
                    If flag2 Then
                        array(num).STR_SEIKYU_GK_KBN = Conversions.ToString(sqlDataReader("SEIKYU_GK_KBN"))
                    Else
                        array(num).STR_SEIKYU_GK_KBN = "0"
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_KBN")))
                    If flag2 Then
                        array(num).STR_MOTO_SOSHIKI_KBN = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_KBN"))
                    Else
                        array(num).STR_MOTO_SOSHIKI_KBN = "1"
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_355 As Exception
                ProjectData.SetProjectError(expr_355)
                Dim ex As Exception = expr_355
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSeisanSyokaiJyohoMeisai(){

    /*
        Public Function GetSeisanSyokaiJyohoMeisai(objEntity As Object(), ByRef MsgCd As String, FindFlg As String, Optional count As String="0") As SeisanJyohoSyokaiList()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanJyohoSyokaiList()
            Try
                Dim seisanJyohoSyokaiList As SeisanJyohoSyokaiList = New SeisanJyohoSyokaiList()
                Dim flag As Boolean = Operators.CompareString(FindFlg, Conversions.ToString(0), False) = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SEF0111().ToString(), RuntimeHelpers.GetObjectValue(objEntity(0)), RuntimeHelpers.GetObjectValue(objEntity(1)), RuntimeHelpers.GetObjectValue(objEntity(2)))
                Else
                    flag = (Operators.CompareString(FindFlg, Conversions.ToString(1), False) = 0)
                    If flag Then
                        strSQL = String.Format(masterSQL.SEF0111().ToString(), RuntimeHelpers.GetObjectValue(objEntity(0)), RuntimeHelpers.GetObjectValue(objEntity(1)), "")
                    End If
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                flag = (Operators.CompareString(count, "1", False) = 0)
                Dim array As SeisanJyohoSyokaiList()
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(MsgCd, "SE0001", False) = 0
                    If flag2 Then
                        result = array
                        Return result
                    End If
                End If
                Dim num As Integer = 0
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanJyohoSyokaiList(num + 1 - 1) {}), SeisanJyohoSyokaiList())
                    Dim seisanJyohoSyokaiList2 As SeisanJyohoSyokaiList = array(num)
                    array(num) = New SeisanJyohoSyokaiList()
                    array(num).STR_SEIKYU_YM = RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_YM"))
                    array(num).STR_SAKI_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI"))
                    array(num).STR_MOTO_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI"))
                    array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
                    array(num).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
                    Dim flag2 As Boolean = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("GOUKEI")))
                    If flag2 Then
                        array(num).DEC_SIHARAI_GOKEI_GK = Conversions.ToDecimal(sqlDataReader("GOUKEI"))
                    Else
                        array(num).DEC_SIHARAI_GOKEI_GK = Conversions.ToDecimal("0")
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEQ_NO")))
                    If flag2 Then
                        array(num).STR_SEQ_NO = Conversions.ToString(sqlDataReader("SEQ_NO"))
                    Else
                        array(num).STR_SEQ_NO = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KANRI_NO")))
                    If flag2 Then
                        array(num).STR_KANRI_NO = Conversions.ToString(sqlDataReader("KANRI_NO"))
                    Else
                        array(num).STR_KANRI_NO = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MEISAI_KBN")))
                    If flag2 Then
                        array(num).STR_MEISAI_KBN = Conversions.ToString(sqlDataReader("MEISAI_KBN"))
                    Else
                        array(num).STR_MEISAI_KBN = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_CD")))
                    If flag2 Then
                        array(num).STR_MOTO_SOSHIKI_CD = RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_CD"))
                    Else
                        array(num).STR_MOTO_SOSHIKI_CD = "0"
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAKI_SOSHIKI_CD")))
                    If flag2 Then
                        array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
                    Else
                        array(num).STR_SAKI_SOSHIKI_CD = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_CD")))
                    If flag2 Then
                        array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
                    Else
                        array(num).STR_HIYOKOMOKU_CD = ""
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_GK_KBN")))
                    If flag2 Then
                        array(num).STR_SEIKYU_GK_KBN = Conversions.ToString(sqlDataReader("SEIKYU_GK_KBN"))
                    Else
                        array(num).STR_SEIKYU_GK_KBN = "0"
                    End If
                    flag2 = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_KBN")))
                    If flag2 Then
                        array(num).STR_MOTO_SOSHIKI_KBN = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_KBN"))
                    Else
                        array(num).STR_MOTO_SOSHIKI_KBN = "1"
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_486 As Exception
                ProjectData.SetProjectError(expr_486)
                Dim ex As Exception = expr_486
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSeisanTuki(){

    /*
        Public Function GetSeisanTuki(SeisanTuki As String, ByRef MsgCd As String) As Object
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As Object
            Try
                Dim strSQL As String = String.Format(masterSQL.SEF0112().ToString(), SeisanTuki)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SeisanTuki()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num < 100
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SeisanTuki(num + 1 - 1) {}), SeisanTuki())
                        Dim seisanTuki As SeisanTuki = array(num)
                        array(num) = New SeisanTuki()
                        array(num).SEISAN_TUKI = RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_TUKI"))
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_B5 As Exception
                ProjectData.SetProjectError(expr_B5)
                Dim ex As Exception = expr_B5
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