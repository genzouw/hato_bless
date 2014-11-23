<?php
class CreditCardMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getUserManageJoho(){

    /*
		Public Function GetUserManageJoho(CreditcardCd As String, CreditcardMei As String, CreditcardKanaMei As String, ByRef MsgCd As String, FindFlg As Integer) As CreditCardList()
			Dim masterSQL As MasterSQL = New MasterSQL()
//			' The following expression was wrapped in a checked-statement
			Dim result As CreditCardList()
			Try
				Dim creditCard As CreditCard = New CreditCard()
				Dim flag As Boolean = FindFlg = 0
				Dim strSQL As String
				If flag Then
					strSQL = String.Format(masterSQL.SMF0351().ToString(), CreditcardCd, CreditcardMei, CreditcardKanaMei)
				Else
					strSQL = String.Format(masterSQL.SMF0350().ToString(), New Object(0 - 1) {})
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As CreditCardList()
				While sqlDataReader.Read()
					flag = (num >= 99)
					If flag Then
						MsgCd = "SI0090"
					End If
					flag = (num < 100)
					If flag Then
						array = CType(Utils.CopyArray(CType(array, Array), New CreditCardList(num + 1 - 1) {}), CreditCardList())
						Dim creditCardList As CreditCardList = array(num)
						array(num) = New CreditCardList()
						array(num).STR_CREDITCARD_CD = Conversions.ToString(sqlDataReader("CREDITCARD_CD"))
						array(num).STR_CREDITCARD_MEI = Conversions.ToString(sqlDataReader("CREDITCARD_MEI"))
						array(num).STR_CREDITCARD_RYAKU_MEI = Conversions.ToString(sqlDataReader("CREDITCARD_RYAKU_MEI"))
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDITCARD_KANA_MEI")))
						If flag Then
							array(num).STR_CREDITCARD_KANA_MEI = Conversions.ToString(sqlDataReader("CREDITCARD_KANA_MEI"))
						Else
							array(num).STR_CREDITCARD_KANA_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("CREDIT_SHIHARAI_SU")))
						If flag Then
							array(num).INT_CREDIT_SHIHARAI_SU = Conversions.ToInteger(sqlDataReader("CREDIT_SHIHARAI_SU"))
						Else
							array(num).INT_CREDIT_SHIHARAI_SU = Conversions.ToInteger("")
						End If
						array(num).DEC_CREDIT_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("CREDIT_TESURYO_RT"))
						array(num).DEC_RENGOKAI_TESURYO_RT = Conversions.ToDecimal(sqlDataReader("RENGOKAI_TESURYO_RT"))
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
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DELETE_FLG")))
						If flag Then
							array(num).STR_DELETE_FLG = Conversions.ToString(sqlDataReader("DELETE_FLG"))
						Else
							array(num).STR_DELETE_FLG = ""
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_346 As Exception
				ProjectData.SetProjectError(expr_346)
				Dim ex As Exception = expr_346
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