<?php
class SeisanNyusyukkin extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSeisanNyusyukkinJyoho(){

    /*
        Public Function GetSeisanNyusyukkinJyoho(objEntity As Object(), ByRef MsgCd As String, Optional count As String="0") As SeisanNyusyukkin()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanNyusyukkin()
            Try
                Dim seisanNyusyukkin As SeisanNyusyukkin = New SeisanNyusyukkin()
                Dim strSQL As String = String.Format(masterSQL.SEF1110().ToString(), RuntimeHelpers.GetObjectValue(objEntity(0)))
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim flag As Boolean = Operators.CompareString(count, "1", False) = 0
                Dim array As SeisanNyusyukkin()
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(MsgCd, "SE0001", False) = 0
                    If flag2 Then
                        result = array
                        Return result
                    End If
                End If
                Dim num As Integer = 0
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanNyusyukkin(num + 1 - 1) {}), SeisanNyusyukkin())
                    Dim seisanNyusyukkin2 As SeisanNyusyukkin = array(num)
                    array(num) = New SeisanNyusyukkin()
                    array(num).H_STR_BANK_NO = Conversions.ToString(sqlDataReader("H_STR_BANK_NO"))
                    array(num).H_STR_SITEN_NO = Conversions.ToString(sqlDataReader("H_STR_SITEN_NO"))
                    array(num).H_STR_YOKIN_SMK = Conversions.ToString(sqlDataReader("H_STR_YOKIN_SMK"))
                    array(num).H_STR_KOZA_NO = Conversions.ToString(sqlDataReader("H_STR_KOZA_NO"))
                    array(num).H_STR_HIKIOTOSHI_BANK_CD = Conversions.ToString(sqlDataReader("H_STR_HIKIOTOSHI_BANK_CD"))
                    array(num).H_STR_HIKIOTOSHI_SITEN_CD = Conversions.ToString(sqlDataReader("H_STR_HIKIOTOSHI_SITEN_CD"))
                    array(num).H_STR_YOKIN_SMK2 = Conversions.ToString(sqlDataReader("H_STR_YOKIN_SMK2"))
                    array(num).H_STR_KOZA_NO2 = Conversions.ToString(sqlDataReader("H_STR_KOZA_NO2"))
                    array(num).H_STR_YOKIN_NM = Conversions.ToString(sqlDataReader("H_STR_YOKIN_NM"))
                    array(num).H_STR_HIKIOTOSHI_GK = Conversions.ToString(sqlDataReader("H_STR_HIKIOTOSHI_GK"))
                    array(num).H_STR_KOKYAKU_NO = Conversions.ToString(sqlDataReader("H_STR_KOKYAKU_NO"))
                    array(num).F_STR_BANK_NO = Conversions.ToString(sqlDataReader("F_STR_BANK_NO"))
                    array(num).F_STR_SITEN_NO = Conversions.ToString(sqlDataReader("F_STR_SITEN_NO"))
                    array(num).F_STR_YOKIN_SMK = Conversions.ToString(sqlDataReader("F_STR_YOKIN_SMK"))
                    array(num).F_STR_KOZA_NO = Conversions.ToString(sqlDataReader("F_STR_KOZA_NO"))
                    array(num).F_STR_HIKIOTOSHI_BANK_CD = Conversions.ToString(sqlDataReader("F_STR_HIKIOTOSHI_BANK_CD"))
                    array(num).F_STR_HIKIOTOSHI_SITEN_CD = Conversions.ToString(sqlDataReader("F_STR_HIKIOTOSHI_SITEN_CD"))
                    array(num).F_STR_YOKIN_SMK2 = Conversions.ToString(sqlDataReader("F_STR_YOKIN_SMK2"))
                    array(num).F_STR_KOZA_NO2 = Conversions.ToString(sqlDataReader("F_STR_KOZA_NO2"))
                    array(num).F_STR_YOKIN_NM = Conversions.ToString(sqlDataReader("F_STR_YOKIN_NM"))
                    array(num).F_STR_HIKIOTOSHI_GK = Conversions.ToString(sqlDataReader("F_STR_HIKIOTOSHI_GK"))
                    array(num).F_STR_KOKYAKU_NO = Conversions.ToString(sqlDataReader("F_STR_KOKYAKU_NO"))
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_328 As Exception
                ProjectData.SetProjectError(expr_328)
                Dim ex As Exception = expr_328
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function getSeisanNyusyukkinJyoho2(){

    /*
        Public Function GetSeisanNyusyukkinJyoho2(objEntity As Object(), ByRef MsgCd As String, Optional count As String="0") As SeisanNyusyukkin()
            Dim masterSQL As MasterSQL = New MasterSQL()

            Dim result As SeisanNyusyukkin()
            Try
                Dim seisanNyusyukkin As SeisanNyusyukkin = New SeisanNyusyukkin()
                Dim strSQL As String = String.Format(masterSQL.SEF1130().ToString(), RuntimeHelpers.GetObjectValue(objEntity(0)))
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim flag As Boolean = Operators.CompareString(count, "1", False) = 0
                Dim array As SeisanNyusyukkin()
                If flag Then
                    Dim flag2 As Boolean = Operators.CompareString(MsgCd, "SE0001", False) = 0
                    If flag2 Then
                        result = array
                        Return result
                    End If
                End If
                Dim num As Integer = 0
                While sqlDataReader.Read()
                    array = CType(Utils.CopyArray(CType(array, Array), New SeisanNyusyukkin(num + 1 - 1) {}), SeisanNyusyukkin())
                    Dim seisanNyusyukkin2 As SeisanNyusyukkin = array(num)
                    array(num) = New SeisanNyusyukkin()
                    array(num).H_STR_BANK_NO = Conversions.ToString(sqlDataReader("H_STR_BANK_NO"))
                    array(num).H_STR_SITEN_NO = Conversions.ToString(sqlDataReader("H_STR_SITEN_NO"))
                    array(num).H_STR_YOKIN_SMK = Conversions.ToString(sqlDataReader("H_STR_YOKIN_SMK"))
                    array(num).H_STR_KOZA_NO = Conversions.ToString(sqlDataReader("H_STR_KOZA_NO"))
                    array(num).H_STR_HIKIOTOSHI_BANK_CD = Conversions.ToString(sqlDataReader("H_STR_HIKIOTOSHI_BANK_CD"))
                    array(num).H_STR_HIKIOTOSHI_SITEN_CD = Conversions.ToString(sqlDataReader("H_STR_HIKIOTOSHI_SITEN_CD"))
                    array(num).H_STR_YOKIN_SMK2 = Conversions.ToString(sqlDataReader("H_STR_YOKIN_SMK2"))
                    array(num).H_STR_KOZA_NO2 = Conversions.ToString(sqlDataReader("H_STR_KOZA_NO2"))
                    array(num).H_STR_YOKIN_NM = Conversions.ToString(sqlDataReader("H_STR_YOKIN_NM"))
                    array(num).H_STR_HIKIOTOSHI_GK = Conversions.ToString(sqlDataReader("H_STR_HIKIOTOSHI_GK"))
                    array(num).H_STR_KOKYAKU_NO = Conversions.ToString(sqlDataReader("H_STR_KOKYAKU_NO"))
                    array(num).F_STR_BANK_NO = Conversions.ToString(sqlDataReader("F_STR_BANK_NO"))
                    array(num).F_STR_SITEN_NO = Conversions.ToString(sqlDataReader("F_STR_SITEN_NO"))
                    array(num).F_STR_YOKIN_SMK = Conversions.ToString(sqlDataReader("F_STR_YOKIN_SMK"))
                    array(num).F_STR_KOZA_NO = Conversions.ToString(sqlDataReader("F_STR_KOZA_NO"))
                    array(num).F_STR_HIKIOTOSHI_BANK_CD = Conversions.ToString(sqlDataReader("F_STR_HIKIOTOSHI_BANK_CD"))
                    array(num).F_STR_HIKIOTOSHI_SITEN_CD = Conversions.ToString(sqlDataReader("F_STR_HIKIOTOSHI_SITEN_CD"))
                    array(num).F_STR_YOKIN_SMK2 = Conversions.ToString(sqlDataReader("F_STR_YOKIN_SMK2"))
                    array(num).F_STR_KOZA_NO2 = Conversions.ToString(sqlDataReader("F_STR_KOZA_NO2"))
                    array(num).F_STR_YOKIN_NM = Conversions.ToString(sqlDataReader("F_STR_YOKIN_NM"))
                    array(num).F_STR_HIKIOTOSHI_GK = Conversions.ToString(sqlDataReader("F_STR_HIKIOTOSHI_GK"))
                    array(num).F_STR_KOKYAKU_NO = Conversions.ToString(sqlDataReader("F_STR_KOKYAKU_NO"))
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_328 As Exception
                ProjectData.SetProjectError(expr_328)
                Dim ex As Exception = expr_328
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