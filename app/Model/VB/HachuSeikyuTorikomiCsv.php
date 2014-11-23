<?php
class HachuSeikyuTorikomiCsv extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function setHachuSeikyuTorikomiCsv(){

    /*
		Public Function SetHachuSeikyuTorikomiCsv(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim mstFind As MstFind = New MstFind()
				Dim hachuSeikyuTorikomiCsvList As HachuSeikyuTorikomiCsvList = New HachuSeikyuTorikomiCsvList()
				hachuSeikyuTorikomiCsvList = CType(objEntity, HachuSeikyuTorikomiCsvList)
				Dim sqlCommand As String = String.Format(masterSQL.ICF0810().ToString(), New Object()() { hachuSeikyuTorikomiCsvList.STR_SOSHIKI_CD, hachuSeikyuTorikomiCsvList.STR_GYOSHA_CD, hachuSeikyuTorikomiCsvList.STR_SOFU_DT, hachuSeikyuTorikomiCsvList.STR_SOFU_NO, hachuSeikyuTorikomiCsvList.STR_NOHIN_DT, hachuSeikyuTorikomiCsvList.STR_NOHINSAKI_CD, hachuSeikyuTorikomiCsvList.STR_KOBAI_CD, hachuSeikyuTorikomiCsvList.STR_KOBAI_BUNRUI_MEI, hachuSeikyuTorikomiCsvList.STR_KOBAI_MEI, hachuSeikyuTorikomiCsvList.STR_NOHIN_DT, hachuSeikyuTorikomiCsvList.STR_SURYO, hachuSeikyuTorikomiCsvList.STR_ZEINUKI_TANKA, hachuSeikyuTorikomiCsvList.STR_ZEINUKI_KINGAKU, hachuSeikyuTorikomiCsvList.STR_BIKO })
				Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					result = True
				End If
			Catch expr_107 As Exception
				ProjectData.SetProjectError(expr_107)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }



}
?>