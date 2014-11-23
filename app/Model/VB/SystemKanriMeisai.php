<?php
class SystemKanriMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getSystemKanriManageJoho(){

    /*
        Public Function GetSystemKanriManageJoho(KanriNoKbn As String, ByRef MsgCd As String) As SystemKanriList()
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As SystemKanriList()
            Try
                Dim strSQL As String = String.Format(masterSQL.SCF0611().ToString(), KanriNoKbn)
                Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
                Dim num As Integer = 0
                Dim array As SystemKanriList()
                While sqlDataReader.Read()
                    Dim flag As Boolean = num < 100
                    If flag Then
                        array = CType(Utils.CopyArray(CType(array, Array), New SystemKanriList(num + 1 - 1) {}), SystemKanriList())
                        Dim systemKanriList As SystemKanriList = array(num)
                        array(num) = New SystemKanriList()
                        array(num).STR_KANRI_NO_KBN = Conversions.ToString(sqlDataReader("KANRI_NO_KBN"))
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KANRI_NO_MEI")))
                        If flag Then
                            array(num).STR_KANRI_NO_MEI = Conversions.ToString(sqlDataReader("KANRI_NO_MEI"))
                        Else
                            array(num).STR_KANRI_NO_MEI = ""
                        End If
                        flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KANRI_NO")))
                        If flag Then
                            array(num).STR_KANRI_NO = RuntimeHelpers.GetObjectValue(sqlDataReader("KANRI_NO"))
                        Else
                            array(num).STR_KANRI_NO = ""
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
                    End If
                    num += 1
                End While
                sqlDataReader.Close()
                Me.DAL.Close()
                result = array
            Catch expr_23F As Exception
                ProjectData.SetProjectError(expr_23F)
                Dim ex As Exception = expr_23F
                Dim sqlDataReader As SqlDataReader
                sqlDataReader.Close()
                Me.DAL.Close()
                Throw ex
            End Try
            Return result
        End Function
     */

    }

    function updateSystemKanri(){

    /*
        Public Function UpdateSystemKanri(KanriNoKbn As String, KanriNo As String, KosinId As String, GmnID As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim systemKanriList As SystemKanriList = New SystemKanriList()
                Dim mstFind As MstFind = New MstFind()
                Dim sqlCommand As String = String.Format(masterSQL.UCF0611().ToString(), New Object()() { KanriNoKbn, KanriNo, mstFind.GetDATE_YYMMDDHHMMSS, KosinId, GmnID, "0" })
                Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
                If flag Then
                    result = False
                End If
            Catch expr_7C As Exception
                ProjectData.SetProjectError(expr_7C)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>