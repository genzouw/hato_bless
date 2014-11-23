<?php
class SeisanTorikeshiMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteSeisanTorikeshiManageJoho(){

    /*
        Public Function DeleteSeisanTorikeshiManageJoho(SeikyuYm As String, MotoSoshikiCd As String, SakiSoshikiCd As String, KanriNo As String, TorikeshiKbn As String, GmnId As String, KoshinDt As String, KoshinId As String, ByRef MsgCd As String) As Boolean
            Dim masterSQL As MasterSQL = New MasterSQL()
            Dim result As Boolean
            Try
                Dim sqlCommand As String = String.Format(masterSQL.UEF1010().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, SakiSoshikiCd, KanriNo, TorikeshiKbn, GmnId, KoshinDt, KoshinId })
                Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                If flag Then
                    result = False
                Else
                    sqlCommand = String.Format(masterSQL.UEF1011().ToString(), New Object()() { SeikyuYm, MotoSoshikiCd, SakiSoshikiCd, KanriNo, TorikeshiKbn, GmnId, KoshinDt, KoshinId })
                    flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
                    If flag Then
                        result = False
                    Else
                        result = True
                    End If
                End If
            Catch expr_E9 As Exception
                ProjectData.SetProjectError(expr_E9)
                result = False
                ProjectData.ClearProjectError()
            End Try
            Return result
        End Function
     */

    }



}
?>