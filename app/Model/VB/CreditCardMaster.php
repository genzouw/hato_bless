<?php
class CreditCardMaster extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteCreditCardManageJoho(){

    /*
		Public Function DeleteCreditCardManageJoho(CreditcardCd As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim creditCardMasterMeisai As CreditCardMasterMeisai = New CreditCardMasterMeisai()
				Dim userManageJoho As CreditCardList() = creditCardMasterMeisai.GetUserManageJoho(CreditcardCd, "", "", MsgCd, 0)
				Dim flag As Boolean = userManageJoho IsNot Nothing
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(userManageJoho(0).STR_UPDATE_DT, UpdateDt, False) <> 0
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						Dim sqlCommand As String = String.Format(masterSQL.DMF0351().ToString(), CreditcardCd)
						flag2 = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
						If flag2 Then
							result = False
						Else
							result = True
						End If
					End If
				Else
					Dim flag2 As Boolean = userManageJoho Is Nothing
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						MsgCd = "XXXX"
						result = False
					End If
				End If
			Catch expr_B1 As Exception
				ProjectData.SetProjectError(expr_B1)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function updateCreditCard(){

    /*
		Public Function UpdateCreditCard(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim creditCard As CreditCard = New CreditCard()
				creditCard = CType(objEntity, CreditCard)
				Dim creditCardMasterMeisai As CreditCardMasterMeisai = New CreditCardMasterMeisai()
				Dim userManageJoho As CreditCardList() = creditCardMasterMeisai.GetUserManageJoho(creditCard.STR_CREDITCARD_CD, "", "", MsgCd, 0)
				Dim flag As Boolean = userManageJoho IsNot Nothing
				If flag Then
					Dim flag2 As Boolean = Operators.CompareString(userManageJoho(0).STR_UPDATE_DT, creditCard.STR_UPDATE_DT, False) <> 0
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						Dim mstFind As MstFind = New MstFind()
						Dim sqlCommand As String = String.Format(masterSQL.UMF0350().ToString(), New Object()() { creditCard.STR_CREDITCARD_CD, creditCard.STR_CREDITCARD_MEI, creditCard.STR_CREDITCARD_RYAKU_MEI, creditCard.STR_CREDITCARD_KANA_MEI, creditCard.INT_CREDIT_SHIHARAI_SU, creditCard.DEC_CREDIT_TESURYO_RT, creditCard.DEC_RENGOKAI_TESURYO_RT, mstFind.GetDATE_YYMMDDHHMMSS, creditCard.STR_UPDATE_TNT_ID, creditCard.STR_GAMEN_ID, "0" })
						flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag2 Then
							result = False
						End If
					End If
				Else
					Dim flag2 As Boolean = userManageJoho Is Nothing
					If flag2 Then
						MsgCd = "XXXX"
						result = False
					Else
						MsgCd = "XXXX"
						result = False
					End If
				End If
			Catch expr_16C As Exception
				ProjectData.SetProjectError(expr_16C)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function setCreditCard(){

    /*
		Public Function SetCreditCard(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim creditCard As CreditCard = New CreditCard()
				creditCard = CType(objEntity, CreditCard)
				Dim sqlCommand As String = String.Format(masterSQL.IMF0351().ToString(), creditCard.STR_CREDITCARD_CD)
				Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					Dim mstFind As MstFind = New MstFind()
					sqlCommand = String.Format(masterSQL.IMF0350().ToString(), New Object()() { creditCard.STR_CREDITCARD_CD, creditCard.STR_CREDITCARD_MEI, creditCard.STR_CREDITCARD_RYAKU_MEI, creditCard.STR_CREDITCARD_KANA_MEI, creditCard.INT_CREDIT_SHIHARAI_SU, creditCard.DEC_CREDIT_TESURYO_RT, creditCard.DEC_RENGOKAI_TESURYO_RT, mstFind.GetDATE_YYMMDDHHMMSS, creditCard.STR_UPDATE_TNT_ID, creditCard.STR_GAMEN_ID })
					flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
					If flag Then
						result = False
					Else
						result = True
					End If
				End If
			Catch expr_10D As Exception
				ProjectData.SetProjectError(expr_10D)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }



}
?>