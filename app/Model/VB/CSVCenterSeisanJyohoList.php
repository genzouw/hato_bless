<?php
class CSVCenterSeisanJyohoList extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getCSVCenterSeisanJyoho(){

    /*
		Public Function GetCSVCenterSeisanJyoho(objEntity As Object(), ByRef MsgCd As String, FindFlg As String, Optional count As String="0") As SeisanJyohoCsvList()
			Dim masterSQL As MasterSQL = New MasterSQL()
//			' The following expression was wrapped in a checked-statement
			Dim result As SeisanJyohoCsvList()
			Try
				Dim seisanJyohoCsvList As SeisanJyohoCsvList = New SeisanJyohoCsvList()
				Dim strSQL As String = String.Format(masterSQL.SEF1200().ToString(), RuntimeHelpers.GetObjectValue(objEntity(0)), RuntimeHelpers.GetObjectValue(objEntity(1)))
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim flag As Boolean = Operators.CompareString(count, "1", False) = 0
				Dim flag2 As Boolean
				Dim array As SeisanJyohoCsvList()
				If flag Then
					flag2 = (Operators.CompareString(MsgCd, "SE0001", False) = 0)
					If flag2 Then
						result = array
						Return result
					End If
				End If
				Dim num As Integer = 0
				Dim num2 As Integer = 0
				While sqlDataReader.Read()
					array = CType(Utils.CopyArray(CType(array, Array), New SeisanJyohoCsvList(num + 1 - 1) {}), SeisanJyohoCsvList())
					Dim seisanJyohoCsvList2 As SeisanJyohoCsvList = array(num)
					flag2 = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAKI_SOSHIKI_KBN")))
					If Not flag2 Then
						flag2 = Conversions.ToBoolean(Operators.AndObject(Operators.CompareObjectNotEqual(sqlDataReader("SAKI_SOSHIKI_KBN"), "1", False), Operators.CompareObjectNotEqual(sqlDataReader("SAKI_SOSHIKI_KBN"), "2", False)))
						If flag2 Then
							flag = Conversions.ToBoolean(Operators.OrObject(Operators.OrObject(Operators.OrObject(Operators.OrObject(Operators.OrObject(Operators.OrObject(Operators.CompareObjectEqual(sqlDataReader("SEQ_NO"), "1", False), Operators.CompareObjectEqual(sqlDataReader("SEQ_NO"), "2", False)), Operators.CompareObjectEqual(sqlDataReader("SEQ_NO"), "3", False)), Operators.CompareObjectEqual(sqlDataReader("SEQ_NO"), "5", False)), Operators.CompareObjectEqual(sqlDataReader("SEQ_NO"), "6", False)), Operators.CompareObjectEqual(sqlDataReader("SEQ_NO"), "7", False)), Operators.CompareObjectEqual(sqlDataReader("SEQ_NO"), "8", False)))
							If flag Then
								array(num2) = New SeisanJyohoCsvList()
								array(num2).STR_SEQ_NO = Conversions.ToString(sqlDataReader("SEQ_NO"))
								array(num2).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
								array(num2).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
								array(num2).STR_MOTO_SOSHIKI_MEI = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_MEI"))
								array(num2).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
								array(num2).STR_SAKI_SOSHIKI_MEI = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_MEI"))
								array(num2).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
								array(num2).STR_HIYOKOMOKU_CD = Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD")))
								array(num2).STR_GOUKEI = Conversions.ToString(sqlDataReader("GOUKEI"))
								flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "1", False)
								If flag2 Then
									array(num2).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
								Else
									flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "2", False)
									If flag2 Then
										array(num2).STR_HIYOKOMOKU_MEI = ChrW(36092) & ChrW(36023) & ChrW(21697) & ChrW(20195) & ChrW(37329)
									Else
										flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "3", False)
										If flag2 Then
											array(num2).STR_HIYOKOMOKU_MEI = ChrW(12463) & ChrW(12524) & ChrW(12472) & ChrW(12483) & ChrW(12488) & ChrW(20195) & ChrW(37329) & ChrW(25163) & ChrW(25968) & ChrW(26009)
										Else
											flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "5", False)
											If flag2 Then
												array(num2).STR_HIYOKOMOKU_MEI = ChrW(23567) & ChrW(40169) & ChrW(65314) & ChrW(65327) & ChrW(65336) & ChrW(20351) & ChrW(29992) & ChrW(26009)
											Else
												flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "6", False)
												If flag2 Then
													array(num2).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
												Else
													flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "7", False)
													If flag2 Then
														array(num2).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
													Else
														flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "8", False)
														If flag2 Then
															array(num2).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
														Else
															array(num2).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
														End If
													End If
												End If
											End If
										End If
									End If
								End If
								array(num2).STR_SEIKYU_GK_KBN = Conversions.ToString(sqlDataReader("SEIKYU_GK_KBN"))
								num2 += 1
							End If
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				flag2 = (num2 = 0)
				If flag2 Then
					MsgCd = "SE0001"
				End If
				result = array
			Catch expr_4D1 As Exception
				ProjectData.SetProjectError(expr_4D1)
				Dim ex As Exception = expr_4D1
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }


    function getCSVCenterSeisanJyoho2(){

    /*
		Public Function GetCSVCenterSeisanJyoho2(objEntity As Object(), ByRef MsgCd As String, FindFlg As String, Optional count As String="0") As SeisanJyohoCsvList()
			Dim masterSQL As MasterSQL = New MasterSQL()
//			' The following expression was wrapped in a checked-statement
			Dim result As SeisanJyohoCsvList()
			Try
				Dim seisanJyohoCsvList As SeisanJyohoCsvList = New SeisanJyohoCsvList()
				Dim strSQL As String = String.Format(masterSQL.SEF1201().ToString(), RuntimeHelpers.GetObjectValue(objEntity(0)), RuntimeHelpers.GetObjectValue(objEntity(1)))
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim flag As Boolean = Operators.CompareString(count, "1", False) = 0
				Dim flag2 As Boolean
				Dim array As SeisanJyohoCsvList()
				If flag Then
					flag2 = (Operators.CompareString(MsgCd, "SE0001", False) = 0)
					If flag2 Then
						result = array
						Return result
					End If
				End If
				Dim num As Integer = 0
				Dim num2 As Integer = 0
				While sqlDataReader.Read()
					array = CType(Utils.CopyArray(CType(array, Array), New SeisanJyohoCsvList(num + 1 - 1) {}), SeisanJyohoCsvList())
					Dim seisanJyohoCsvList2 As SeisanJyohoCsvList = array(num)
					flag2 = Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAKI_SOSHIKI_KBN")))
					If Not flag2 Then
						flag2 = Conversions.ToBoolean(Operators.AndObject(Operators.CompareObjectNotEqual(sqlDataReader("SAKI_SOSHIKI_KBN"), "1", False), Operators.CompareObjectNotEqual(sqlDataReader("SAKI_SOSHIKI_KBN"), "2", False)))
						If flag2 Then
							array(num2) = New SeisanJyohoCsvList()
							flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "1", False)
							If flag2 Then
								flag = (Operators.CompareString(Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))), "", False) = 0)
								If flag Then
									array(num2).STR_HIYOKOMOKU_MEI = Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD")))
								Else
									array(num2).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
								End If
							Else
								flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "2", False)
								If flag2 Then
									array(num2).STR_HIYOKOMOKU_MEI = ChrW(36092) & ChrW(36023) & ChrW(21697) & ChrW(20195) & ChrW(37329)
								Else
									flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "3", False)
									If flag2 Then
										array(num2).STR_HIYOKOMOKU_MEI = ChrW(12463) & ChrW(12524) & ChrW(12472) & ChrW(12483) & ChrW(12488) & ChrW(20195) & ChrW(37329) & ChrW(25163) & ChrW(25968) & ChrW(26009)
									Else
										flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "5", False)
										If flag2 Then
											array(num2).STR_HIYOKOMOKU_MEI = ChrW(23567) & ChrW(40169) & ChrW(65314) & ChrW(65327) & ChrW(65336) & ChrW(20351) & ChrW(29992) & ChrW(26009)
										Else
											flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "6", False)
											If flag2 Then
												flag = (Operators.CompareString(Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))), "", False) = 0)
												If flag Then
													array(num2).STR_HIYOKOMOKU_MEI = Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD")))
												Else
													array(num2).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
												End If
											Else
												flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "7", False)
												If flag2 Then
													flag = (Operators.CompareString(Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))), "", False) = 0)
													If flag Then
														array(num2).STR_HIYOKOMOKU_MEI = Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD")))
													Else
														array(num2).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
													End If
												Else
													flag2 = Operators.ConditionalCompareObjectEqual(sqlDataReader("SEQ_NO"), "8", False)
													If flag2 Then
														flag = (Operators.CompareString(Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))), "", False) = 0)
														If flag Then
															array(num2).STR_HIYOKOMOKU_MEI = Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD")))
														Else
															array(num2).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
														End If
													Else
														flag2 = (Operators.CompareString(Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))), "", False) = 0)
														If flag2 Then
															array(num2).STR_HIYOKOMOKU_MEI = Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD")))
														Else
															array(num2).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
														End If
													End If
												End If
											End If
										End If
									End If
								End If
							End If
							array(num2).STR_SEQ_NO = Conversions.ToString(sqlDataReader("SEQ_NO"))
							array(num2).STR_SEIKYU_YM = Conversions.ToString(sqlDataReader("SEIKYU_YM"))
							array(num2).STR_MOTO_SOSHIKI_CD = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_CD"))
							array(num2).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
							array(num2).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
							array(num2).STR_HIYOKOMOKU_CD = Strings.Trim(Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD")))
							array(num2).STR_GOUKEI = Conversions.ToString(sqlDataReader("GOUKEI"))
							array(num2).STR_SEIKYU_GK_KBN = Conversions.ToString(sqlDataReader("SEIKYU_GK_KBN"))
							num2 += 1
						End If
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				flag2 = (num2 = 0)
				If flag2 Then
					MsgCd = "SE0001"
				End If
				result = array
			Catch expr_558 As Exception
				ProjectData.SetProjectError(expr_558)
				Dim ex As Exception = expr_558
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