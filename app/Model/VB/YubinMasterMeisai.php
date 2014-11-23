<?php
class YubinMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getYubinBangoJoho(){

    /*
        Public Function GetYubinBangoJoho(YubinNo As String, TodohukenCd As String, AddressKanj1 As String, AddressKanj2 As String, AddressKana1 As String, AddressKana2 As String, YubinEdaNo As String, ByRef MsgCd As String, FindFlg As Integer) As YubinBangoList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As YubinBangoList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0311().ToString(), New Object()() { YubinNo, TodohukenCd, AddressKanj1, AddressKanj2, AddressKana1, AddressKana2, YubinEdaNo })
                Else
                    strSQL = String.Format(masterSQL.SMF0310().ToString(), New Object(0 - 1) {})
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As YubinBangoList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New YubinBangoList(num + 1 - 1) {}), YubinBangoList())
                        Dim yubinBangoList As YubinBangoList = array(num)
                        array(num) = New YubinBangoList()
                        array(num).YUBIN_NO = Conversions.ToString(sqlDataReader("YUBIN_NO"))
                        array(num).YUBIN_EDA = Conversions.ToString(sqlDataReader("YUBIN_EDA"))
                        array(num).TODOHUKEN_CD = Conversions.ToString(sqlDataReader("TODOHUKEN_CD"))
                        array(num).SHIKUGUN_CD = Conversions.ToString(sqlDataReader("SHIKUGUN_CD"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS_KANA1")))
                        If flag Then
                            array(num).ADDRESS_KANA1 = Conversions.ToString(sqlDataReader("ADDRESS_KANA1"))
                        Else
                            array(num).ADDRESS_KANA1 = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("ADDRESS_KANA2")))
                        If flag Then
                            array(num).ADDRESS_KANA2 = Conversions.ToString(sqlDataReader("ADDRESS_KANA2"))
                        Else
                            array(num).ADDRESS_KANA2 = ""
                        End If
                        array(num).ADDRESS_KANJI1 = Conversions.ToString(sqlDataReader("ADDRESS_KANJI1"))
                        array(num).ADDRESS_KANJI2 = Conversions.ToString(sqlDataReader("ADDRESS_KANJI2"))
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
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("TODOHUKEN_MEI")))
                        If flag Then
                            array(num).TODOHUKEN_MEI = Conversions.ToString(sqlDataReader("TODOHUKEN_MEI"))
                        Else
                            array(num).TODOHUKEN_MEI = ""
                        End If
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_38A As Exception
                ProjectData.SetProjectError(expr_38A)
                Dim ex As Exception = expr_38A
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