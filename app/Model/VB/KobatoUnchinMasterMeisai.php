<?php
class KobatoUnchinMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getKobatoUnchinJoho(){

    /*
        Public Function GetKobatoUnchinJoho(KobatoKbnSelect As String, HatsuTodohukenCdTextbox As String, ByRef MsgCd As String, FindFlg As Integer) As KobatoUnchinList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As KobatoUnchinList()
            Try
                Dim flag As Boolean = FindFlg = 0
                Dim strSQL As String
                If flag Then
                    strSQL = String.Format(masterSQL.SMF0251().ToString(), KobatoKbnSelect, HatsuTodohukenCdTextbox)
                Else
                    strSQL = String.Format(masterSQL.SMF0250().ToString(), New Object(0 - 1) {})
                End If
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As KobatoUnchinList()
                While sqlDataReader.Read()
                    flag = (num >= 99)
                    If flag Then
                        MsgCd = "SI0090"
                    End If
                    flag = (num < 100)
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New KobatoUnchinList(num + 1 - 1) {}), KobatoUnchinList())
                        Dim kobatoUnchinList As KobatoUnchinList = array(num)
                        array(num) = New KobatoUnchinList()
                        array(num).STR_KOBATO_KBN = Conversions.ToString(sqlDataReader("KOBATO_KBN"))
                        array(num).STR_HATSU_TODOHUKEN_CD = Conversions.ToString(sqlDataReader("HATSU_TODOHUKEN_CD"))
                        array(num).STR_HATSU_TODOHUKEN_MEI = Conversions.ToString(sqlDataReader("HATSU_TODOHUKEN_MEI"))
                        array(num).STR_UPDATE_DT = Conversions.ToString(sqlDataReader("UPDATE_DT"))
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_14E As Exception
                ProjectData.SetProjectError(expr_14E)
                Dim ex As Exception = expr_14E
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