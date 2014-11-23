<?php
class HacyuKobaihinBunruiMeiMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getHacyuKobaihinBunruiMeiMaster(){

    /*
		Public Function GetHacyuKobaihinBunruiMeiMaster(MotoSoshikiCode As String, KobaiBunruiMei As String, ByRef MsgCd As String, FindFlg As Integer) As HachuKobaihinBunruiMei()
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As HachuKobaihinBunruiMei()
			Try
				Dim flag As Boolean = FindFlg = 0
				Dim strSQL As String
				If flag Then
					strSQL = String.Format(masterSQL.SCF0051().ToString(), MotoSoshikiCode, KobaiBunruiMei)
				Else
					strSQL = String.Format(masterSQL.SCF0050().ToString(), MotoSoshikiCode)
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As HachuKobaihinBunruiMei()
				While sqlDataReader.Read()
					array = CType(Utils.CopyArray(CType(array, Array), New HachuKobaihinBunruiMei(num + 1 - 1) {}), HachuKobaihinBunruiMei())
					Dim hachuKobaihinBunruiMei As HachuKobaihinBunruiMei = array(num)
					array(num) = New HachuKobaihinBunruiMei()
					array(num).STR_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
					array(num).STR_KOBAI_BUNRUI_MEI = Conversions.ToString(sqlDataReader("KOBAI_BUNRUI_MEI"))
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_E6 As Exception
				ProjectData.SetProjectError(expr_E6)
				Dim ex As Exception = expr_E6
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