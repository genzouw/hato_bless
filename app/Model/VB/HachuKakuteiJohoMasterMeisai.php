<?php
class HachuKakuteiJohoMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function deleteHachuKakuteiManageJoho(){

    /*
		Public Function DeleteHachuKakuteiManageJoho(MotoSoshikiCode As String, GyoshaCd As String, SofuDt As String, SofuNo As String, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim flag As Boolean = Strings.Len(GyoshaCd) = 4
				Dim text As String
				If flag Then
					text = Strings.Trim(MotoSoshikiCode + GyoshaCd)
				Else
					text = GyoshaCd
				End If
				Dim sqlCommand As String = String.Format(masterSQL.DCF0413().ToString(), New Object()() { MotoSoshikiCode, text, SofuDt, SofuNo })
				flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					result = True
				End If
			Catch expr_83 As Exception
				ProjectData.SetProjectError(expr_83)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function deleteHachuKakuteiManageJoho2(){

    /*
		Public Function DeleteHachuKakuteiManageJoho2(MotoSoshikiCode As String, HachuNo As String, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim sqlCommand As String = String.Format(masterSQL.DCF0414().ToString(), MotoSoshikiCode, HachuNo)
				Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					result = True
				End If
			Catch expr_3C As Exception
				ProjectData.SetProjectError(expr_3C)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }


    function updateHachuKakutei(){

    /*
		Public Function UpdateHachuKakutei(objEntity As Object, MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As Boolean
			Try
				Dim array As HachuList3() = CType(objEntity, HachuList3())
				Dim arg_19_0 As Integer = 0
				Dim num As Integer = Information.UBound(array, 1)
				Dim num2 As Integer = arg_19_0
				While True
					Dim arg_E63_0 As Integer = num2
					Dim num3 As Integer = num
					If arg_E63_0 > num3 Then
						GoTo Block_17
					End If
					Dim mstFind As MstFind = New MstFind()
					Dim flag As Boolean = Operators.CompareString(array(num2).STR_DELETE_FLG, "1", False) = 0
					If flag Then
						Dim sqlCommand As String = String.Format(masterSQL.ICF0614().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_KOBAI_CD, array(num2).STR_GAIBU_NAIBU_KBN })
						flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag Then
							Exit While
						End If
					Else
						flag = (Operators.CompareString(array(num2).STR_SYORI_MODE, "0", False) = 0)
						If flag Then
							Dim flag2 As Boolean = Operators.CompareString(array(num2).STR_GAIBU_NAIBU_KBN, "2", False) = 0
							If flag2 Then
								Dim text As String = Strings.Trim(array(num2).STR_GYOSHA_CD)
								Dim text2 As String = Strings.Trim(array(num2).STR_SEIKYUMOTO_CD)
							Else
								Dim text As String = Strings.Trim(array(num2).STR_SEIKYUMOTO_CD)
								Dim text2 As String = Strings.Trim(array(num2).STR_NOHINSAKI_CD)
							End If
							Dim sqlCommand As String = String.Format(masterSQL.ICF0614().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_KOBAI_CD, array(num2).STR_GAIBU_NAIBU_KBN })
							flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
							If flag2 Then
								GoTo Block_7
							End If
							sqlCommand = String.Format(masterSQL.ICF0610().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_GAIBU_NAIBU_KBN, array(num2).STR_GYOSHA_CD, array(num2).STR_GYOSHA_MEI, array(num2).STR_GYOSHA_TELL, array(num2).STR_GYOSHA_FAX, array(num2).STR_SOFU_DT, array(num2).INT_SOFU_NO, array(num2).STR_HACHU_DT, array(num2).STR_HACHU_TNT_CD, array(num2).STR_NOHIN_HOUHOU_KBN, array(num2).STR_NOHIN_JYOTAI_KBN, array(num2).STR_NOHINSAKI_CD, array(num2).STR_NOHINSAKI_MEI, array(num2).STR_NOHINSAKI_TEL, array(num2).STR_NOHINSAKI_FAX, array(num2).STR_YUBIN_NO, array(num2).STR_ADDRESS1, array(num2).STR_ADDRESS2, array(num2).STR_ADDRESS3, array(num2).STR_KOBAI_CD, array(num2).STR_JISHA_KOBAI_CD, array(num2).STR_KOBAI_BUNRUI_MEI, array(num2).STR_KOBAI_MEI, array(num2).STR_NOHIN_DT, array(num2).INT_NOHIN_SU, array(num2).STR_NOHIN_TANI, array(num2).DEC_SIIRE_TANKA, array(num2).DEC_SIIRE_NEBIKI, array(num2).DEC_SIIRE_SHOHIZEI_GK, array(num2).DEC_SIIRE_GOKEI_GKO, array(num2).DEC_URIAGE_TANKA, array(num2).DEC_URIAGE_NEBIKI, array(num2).DEC_URIAGE_SHOHIZEI_GK, array(num2).DEC_URIAGE_GOKEI_GK, array(num2).DEC_JYOBU_SIIRE_TANKA, array(num2).DEC_JYOBU_SIIRE_NEBIKI, array(num2).DEC_JYOBU_SIIRE_SHOHIZEI_GK, array(num2).DEC_JYOBU_SIIRE_GOKEI_GK, array(num2).DEC_JYOBU_URIAGE_TANKA, array(num2).DEC_JYOBU_URIAGE_NEBIKI, array(num2).DEC_JYOBU_URIAGE_SHOHIZEI_GK, array(num2).DEC_JYOBU_URIAGE_GOKEI_GK, array(num2).STR_JYOBU_KOBAI_CD, array(num2).STR_BIKO, array(num2).STR_SEISAN_YM, "1", mstFind.GetDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
							flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
							If flag2 Then
								GoTo Block_8
							End If
						Else
							Dim flag2 As Boolean = Operators.CompareString(array(num2).STR_SYORI_MODE, "1", False) = 0
							If flag2 Then
								flag = (Operators.CompareString(array(num2).STR_GAIBU_NAIBU_KBN, "2", False) = 0)
								If flag Then
									Dim text3 As String = Strings.Trim(array(num2).STR_GYOSHA_CD)
									Dim text4 As String = Strings.Trim(array(num2).STR_SEIKYUMOTO_CD)
								Else
									Dim text3 As String = Strings.Trim(array(num2).STR_SEIKYUMOTO_CD)
									Dim text4 As String = Strings.Trim(array(num2).STR_NOHINSAKI_CD)
								End If
								Dim sqlCommand As String = String.Format(masterSQL.ICF0614().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_KOBAI_CD, array(num2).STR_GAIBU_NAIBU_KBN })
								flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
								If flag2 Then
									GoTo Block_11
								End If
								sqlCommand = String.Format(masterSQL.ICF0610().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_GAIBU_NAIBU_KBN, array(num2).STR_GYOSHA_CD, array(num2).STR_GYOSHA_MEI, array(num2).STR_GYOSHA_TELL, array(num2).STR_GYOSHA_FAX, array(num2).STR_SOFU_DT, array(num2).INT_SOFU_NO, array(num2).STR_HACHU_DT, array(num2).STR_HACHU_TNT_CD, array(num2).STR_NOHIN_HOUHOU_KBN, array(num2).STR_NOHIN_JYOTAI_KBN, array(num2).STR_NOHINSAKI_CD, array(num2).STR_NOHINSAKI_MEI, array(num2).STR_NOHINSAKI_TEL, array(num2).STR_NOHINSAKI_FAX, array(num2).STR_YUBIN_NO, array(num2).STR_ADDRESS1, array(num2).STR_ADDRESS2, array(num2).STR_ADDRESS3, array(num2).STR_KOBAI_CD, array(num2).STR_JISHA_KOBAI_CD, array(num2).STR_KOBAI_BUNRUI_MEI, array(num2).STR_KOBAI_MEI, array(num2).STR_NOHIN_DT, array(num2).INT_NOHIN_SU, array(num2).STR_NOHIN_TANI, array(num2).DEC_SIIRE_TANKA, array(num2).DEC_SIIRE_NEBIKI, array(num2).DEC_SIIRE_SHOHIZEI_GK, array(num2).DEC_SIIRE_GOKEI_GKO, array(num2).DEC_URIAGE_TANKA, array(num2).DEC_URIAGE_NEBIKI, array(num2).DEC_URIAGE_SHOHIZEI_GK, array(num2).DEC_URIAGE_GOKEI_GK, array(num2).DEC_JYOBU_SIIRE_TANKA, array(num2).DEC_JYOBU_SIIRE_NEBIKI, array(num2).DEC_JYOBU_SIIRE_SHOHIZEI_GK, array(num2).DEC_JYOBU_SIIRE_GOKEI_GK, array(num2).DEC_JYOBU_URIAGE_TANKA, array(num2).DEC_JYOBU_URIAGE_NEBIKI, array(num2).DEC_JYOBU_URIAGE_SHOHIZEI_GK, array(num2).DEC_JYOBU_URIAGE_GOKEI_GK, array(num2).STR_JYOBU_KOBAI_CD, array(num2).STR_BIKO, array(num2).STR_SEISAN_YM, "0", mstFind.GetDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
								flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
								If flag2 Then
									GoTo Block_12
								End If
							Else
								flag2 = (Operators.CompareString(array(num2).STR_DELETE_FLG, "0", False) = 0)
								If flag2 Then
									Dim sqlCommand As String = String.Format(masterSQL.ICF0614().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_KOBAI_CD, array(num2).STR_GAIBU_NAIBU_KBN })
									flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
									If flag2 Then
										GoTo Block_14
									End If
									sqlCommand = String.Format(masterSQL.ICF0610().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_GAIBU_NAIBU_KBN, array(num2).STR_GYOSHA_CD, array(num2).STR_GYOSHA_MEI, array(num2).STR_GYOSHA_TELL, array(num2).STR_GYOSHA_FAX, array(num2).STR_SOFU_DT, array(num2).INT_SOFU_NO, array(num2).STR_HACHU_DT, array(num2).STR_HACHU_TNT_CD, array(num2).STR_NOHIN_HOUHOU_KBN, "2", array(num2).STR_NOHINSAKI_CD, array(num2).STR_NOHINSAKI_MEI, array(num2).STR_NOHINSAKI_TEL, array(num2).STR_NOHINSAKI_FAX, array(num2).STR_YUBIN_NO, array(num2).STR_ADDRESS1, array(num2).STR_ADDRESS2, array(num2).STR_ADDRESS3, array(num2).STR_KOBAI_CD, array(num2).STR_JISHA_KOBAI_CD, array(num2).STR_KOBAI_BUNRUI_MEI, array(num2).STR_KOBAI_MEI, array(num2).STR_NOHIN_DT, array(num2).INT_NOHIN_SU, array(num2).STR_NOHIN_TANI, array(num2).DEC_SIIRE_TANKA, array(num2).DEC_SIIRE_NEBIKI, array(num2).DEC_SIIRE_SHOHIZEI_GK, array(num2).DEC_SIIRE_GOKEI_GKO, array(num2).DEC_URIAGE_TANKA, array(num2).DEC_URIAGE_NEBIKI, array(num2).DEC_URIAGE_SHOHIZEI_GK, array(num2).DEC_URIAGE_GOKEI_GK, array(num2).DEC_JYOBU_SIIRE_TANKA, array(num2).DEC_JYOBU_SIIRE_NEBIKI, array(num2).DEC_JYOBU_SIIRE_SHOHIZEI_GK, array(num2).DEC_JYOBU_SIIRE_GOKEI_GK, array(num2).DEC_JYOBU_URIAGE_TANKA, array(num2).DEC_JYOBU_URIAGE_NEBIKI, array(num2).DEC_JYOBU_URIAGE_SHOHIZEI_GK, array(num2).DEC_JYOBU_URIAGE_GOKEI_GK, array(num2).STR_JYOBU_KOBAI_CD, array(num2).STR_BIKO, array(num2).STR_SEISAN_YM, "0", mstFind.GetDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
									flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
									If flag2 Then
										GoTo Block_15
									End If
								Else
									Dim sqlCommand As String = String.Format(masterSQL.UCF0613().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_KOBAI_CD, mstFind.GetDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID, "0" })
									flag2 = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
									If flag2 Then
										GoTo Block_16
									End If
								End If
							End If
						End If
					End If
					num2 += 1
				End While
				result = False
				Return result
				Block_7:
				result = False
				Return result
				Block_8:
				result = False
				Return result
				Block_11:
				result = False
				Return result
				Block_12:
				result = False
				Return result
				Block_14:
				result = False
				Return result
				Block_15:
				result = False
				Return result
				Block_16:
				result = False
				Block_17:
			Catch expr_E6A As Exception
				ProjectData.SetProjectError(expr_E6A)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function updateHachuKakutei2(){

    /*
		Public Function UpdateHachuKakutei2(objEntity As Object, MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim hachuList As HachuList3 = CType(objEntity, HachuList3)
				Dim mstFind As MstFind = New MstFind()
				Dim flag As Boolean = Operators.CompareString(hachuList.STR_DELETE_FLG, "1", False) = 0
				If Not flag Then
					flag = (Operators.CompareString(hachuList.STR_SYORI_MODE, "0", False) = 0)
					If flag Then
						Dim text As String = Strings.Trim(hachuList.STR_SEIKYUMOTO_CD)
						Dim text2 As String = Strings.Trim(hachuList.STR_SEIKYUSAKI_CD)
						Dim sqlCommand As String = String.Format(masterSQL.UCF0612().ToString(), New Object()() { hachuList.STR_HACHU_NO, hachuList.STR_SEIKYUMOTO_CD, hachuList.STR_KOBAI_CD, mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID, "1" })
						flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag Then
							result = False
						Else
							sqlCommand = String.Format(masterSQL.DEF0198().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text, text2, "1", Strings.Trim(hachuList.STR_KOBAI_CD), hachuList.STR_HACHU_NO })
							flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
							If flag Then
								result = False
							Else
								sqlCommand = String.Format(masterSQL.DEF0196().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text, text2, "1", hachuList.STR_HACHU_NO })
								flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
								If flag Then
									result = False
								Else
									sqlCommand = String.Format(masterSQL.DEF0197().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text, text2, "1", hachuList.STR_HACHU_NO })
									flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
									If flag Then
										result = False
									Else
										flag = (Operators.CompareString(hachuList.STR_GAIBU_NAIBU_KBN, "2", False) = 0)
										If flag Then
											sqlCommand = String.Format(masterSQL.IEF0316().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text, text2, hachuList.STR_HACHU_NO, "1", Strings.Trim(hachuList.STR_NOHINSAKI_CD), hachuList.STR_HACHU_DT, Strings.Trim(hachuList.STR_GYOSHA_CD), Strings.Trim(hachuList.STR_KOBAI_CD), Strings.Trim(hachuList.STR_KOBAI_BUNRUI_MEI), Strings.Trim(hachuList.STR_KOBAI_MEI), Strings.Trim(Conversions.ToString(hachuList.INT_NOHIN_SU)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_TANKA)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_NEBIKI)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_GOKEI_GK)), "3", Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_SHOHIZEI_GK)), Strings.Trim(hachuList.STR_NOHIN_DT), Strings.Trim(hachuList.STR_SEISAN_YM), Strings.Trim(hachuList.STR_UPDATE_DT), Strings.Trim(hachuList.STR_HACHU_TNT_CD), mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID })
										Else
											sqlCommand = String.Format(masterSQL.IEF0316().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text, text2, hachuList.STR_HACHU_NO, "1", Strings.Trim(hachuList.STR_NOHINSAKI_CD), hachuList.STR_HACHU_DT, Strings.Trim(hachuList.STR_GYOSHA_CD), Strings.Trim(hachuList.STR_KOBAI_CD), Strings.Trim(hachuList.STR_KOBAI_BUNRUI_MEI), Strings.Trim(hachuList.STR_KOBAI_MEI), Strings.Trim(Conversions.ToString(hachuList.INT_NOHIN_SU)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_TANKA)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_NEBIKI)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_GOKEI_GK)), "3", Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_SHOHIZEI_GK)), Strings.Trim(hachuList.STR_NOHIN_DT), Strings.Trim(hachuList.STR_SEISAN_YM), Strings.Trim(hachuList.STR_UPDATE_DT), Strings.Trim(hachuList.STR_HACHU_TNT_CD), mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID })
										End If
										flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
										If flag Then
											result = False
										Else
											sqlCommand = String.Format(masterSQL.IEF0314().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text, text2, "1", "3", hachuList.STR_HACHU_NO, hachuList.DEC_URIAGE_SO_GOKEI_GK, "0", "", mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID })
											flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
											If flag Then
												result = False
											Else
												sqlCommand = String.Format(masterSQL.IEF0315().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text, text2, "1", hachuList.STR_HACHU_NO, "3", hachuList.STR_HACHU_NO, "", "", "0", mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID, "0" })
												flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
												If flag Then
													result = False
												Else
													sqlCommand = String.Format(masterSQL.DEF0198().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text2, text, "2", Strings.Trim(hachuList.STR_KOBAI_CD), hachuList.STR_HACHU_NO })
													flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
													If flag Then
														result = False
													Else
														sqlCommand = String.Format(masterSQL.DEF0196().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text2, text, "2", hachuList.STR_HACHU_NO })
														flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
														If flag Then
															result = False
														Else
															sqlCommand = String.Format(masterSQL.DEF0197().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text2, text, "2", hachuList.STR_HACHU_NO })
															flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
															If flag Then
																result = False
															Else
																flag = (Operators.CompareString(hachuList.STR_GAIBU_NAIBU_KBN, "2", False) = 0)
																If flag Then
																	sqlCommand = String.Format(masterSQL.IEF0316().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text2, text, hachuList.STR_HACHU_NO, "2", Strings.Trim(hachuList.STR_NOHINSAKI_CD), hachuList.STR_HACHU_DT, Strings.Trim(hachuList.STR_GYOSHA_CD), Strings.Trim(hachuList.STR_KOBAI_CD), Strings.Trim(hachuList.STR_KOBAI_BUNRUI_MEI), Strings.Trim(hachuList.STR_KOBAI_MEI), Strings.Trim(Conversions.ToString(hachuList.INT_NOHIN_SU)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_TANKA)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_NEBIKI)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_GOKEI_GK)), "3", Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_SHOHIZEI_GK)), Strings.Trim(hachuList.STR_NOHIN_DT), Strings.Trim(hachuList.STR_SEISAN_YM), Strings.Trim(hachuList.STR_UPDATE_DT), Strings.Trim(hachuList.STR_HACHU_TNT_CD), mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID })
																Else
																	sqlCommand = String.Format(masterSQL.IEF0316().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text2, text, hachuList.STR_HACHU_NO, "2", Strings.Trim(hachuList.STR_NOHINSAKI_CD), hachuList.STR_HACHU_DT, Strings.Trim(hachuList.STR_GYOSHA_CD), Strings.Trim(hachuList.STR_KOBAI_CD), Strings.Trim(hachuList.STR_KOBAI_BUNRUI_MEI), Strings.Trim(hachuList.STR_KOBAI_MEI), Strings.Trim(Conversions.ToString(hachuList.INT_NOHIN_SU)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_TANKA)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_NEBIKI)), Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_GOKEI_GK)), "3", Strings.Trim(Conversions.ToString(hachuList.DEC_URIAGE_SHOHIZEI_GK)), Strings.Trim(hachuList.STR_NOHIN_DT), Strings.Trim(hachuList.STR_SEISAN_YM), Strings.Trim(hachuList.STR_UPDATE_DT), Strings.Trim(hachuList.STR_HACHU_TNT_CD), mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID })
																End If
																flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
																If flag Then
																	result = False
																Else
																	sqlCommand = String.Format(masterSQL.IEF0314().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text2, text, "2", "3", hachuList.STR_HACHU_NO, "0", hachuList.DEC_URIAGE_SO_GOKEI_GK, "", mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID })
																	flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
																	If flag Then
																		result = False
																	Else
																		sqlCommand = String.Format(masterSQL.IEF0315().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text2, text, "2", hachuList.STR_HACHU_NO, "3", hachuList.STR_HACHU_NO, "", "", "0", mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID, "0" })
																		flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
																		If flag Then
																			result = False
																		End If
																	End If
																End If
															End If
														End If
													End If
												End If
											End If
										End If
									End If
								End If
							End If
						End If
					Else
						flag = (Operators.CompareString(hachuList.STR_SYORI_MODE, "1", False) = 0)
						If flag Then
							Dim text3 As String = Strings.Trim(hachuList.STR_SEIKYUMOTO_CD)
							Dim text4 As String = Strings.Trim(hachuList.STR_SEIKYUSAKI_CD)
							Dim sqlCommand As String = String.Format(masterSQL.UCF0612().ToString(), New Object()() { hachuList.STR_HACHU_NO, hachuList.STR_SEIKYUMOTO_CD, hachuList.STR_KOBAI_CD, mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID, "0" })
							flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
							If flag Then
								result = False
							Else
								sqlCommand = String.Format(masterSQL.DEF0198().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text3, text4, "1", Strings.Trim(hachuList.STR_KOBAI_CD), hachuList.STR_HACHU_NO })
								flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
								If flag Then
									result = False
								Else
									sqlCommand = String.Format(masterSQL.DEF0196().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text3, text4, "1", hachuList.STR_HACHU_NO })
									flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
									If flag Then
										result = False
									Else
										sqlCommand = String.Format(masterSQL.DEF0197().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text3, text4, "1", hachuList.STR_HACHU_NO })
										flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
										If flag Then
											result = False
										Else
											sqlCommand = String.Format(masterSQL.DEF0198().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text4, text3, "2", Strings.Trim(hachuList.STR_KOBAI_CD), hachuList.STR_HACHU_NO })
											flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
											If flag Then
												result = False
											Else
												sqlCommand = String.Format(masterSQL.DEF0196().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text4, text3, "2", hachuList.STR_HACHU_NO })
												flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
												If flag Then
													result = False
												Else
													sqlCommand = String.Format(masterSQL.DEF0197().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text4, text3, "2", hachuList.STR_HACHU_NO })
													flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
													If flag Then
														result = False
													End If
												End If
											End If
										End If
									End If
								End If
							End If
						Else
							Dim text5 As String = Strings.Trim(hachuList.STR_SEIKYUMOTO_CD)
							Dim text6 As String = Strings.Trim(hachuList.STR_SEIKYUSAKI_CD)
							Dim sqlCommand As String = String.Format(masterSQL.ICF0613().ToString(), New Object()() { hachuList.STR_HACHU_NO, hachuList.STR_SEIKYUMOTO_CD, hachuList.STR_KOBAI_CD, mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID })
							flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
							If flag Then
								result = False
							Else
								sqlCommand = String.Format(masterSQL.DEF0198().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text5, text6, "1", Strings.Trim(hachuList.STR_KOBAI_CD), hachuList.STR_HACHU_NO })
								flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
								If flag Then
									result = False
								Else
									sqlCommand = String.Format(masterSQL.DEF0196().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text5, text6, "1", hachuList.STR_HACHU_NO })
									flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
									If flag Then
										result = False
									Else
										sqlCommand = String.Format(masterSQL.DEF0197().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text5, text6, "1", hachuList.STR_HACHU_NO })
										flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
										If flag Then
											result = False
										Else
											sqlCommand = String.Format(masterSQL.DEF0198().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text6, text5, "2", Strings.Trim(hachuList.STR_KOBAI_CD), hachuList.STR_HACHU_NO })
											flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
											If flag Then
												result = False
											Else
												sqlCommand = String.Format(masterSQL.DEF0196().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text6, text5, "2", hachuList.STR_HACHU_NO })
												flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
												If flag Then
													result = False
												Else
													sqlCommand = String.Format(masterSQL.DEF0197().ToString(), New Object()() { hachuList.STR_SEISAN_YM, text6, text5, "2", hachuList.STR_HACHU_NO })
													flag = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
													If flag Then
														result = False
													End If
												End If
											End If
										End If
									End If
								End If
							End If
						End If
					End If
				End If
			Catch expr_145C As Exception
				ProjectData.SetProjectError(expr_145C)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function updateHachuKakutei3(){

    /*
		Public Function UpdateHachuKakutei3(objEntity As Object, MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim hachuList As HachuList3 = CType(objEntity, HachuList3)
				Dim mstFind As MstFind = New MstFind()
				Dim flag As Boolean = Operators.CompareString(hachuList.STR_DELETE_FLG, "1", False) = 0
				If flag Then
					Dim sqlCommand As String = String.Format(masterSQL.ICF0614().ToString(), New Object()() { hachuList.STR_HACHU_NO, hachuList.STR_SEIKYUMOTO_CD, hachuList.STR_KOBAI_CD, hachuList.STR_GAIBU_NAIBU_KBN })
					flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
					If flag Then
						result = False
					End If
				Else
					flag = (Operators.CompareString(hachuList.STR_KAKUTEI_KBN, "1", False) = 0)
					If flag Then
						Dim sqlCommand As String = String.Format(masterSQL.ICF0614().ToString(), New Object()() { hachuList.STR_HACHU_NO, hachuList.STR_SEIKYUMOTO_CD, hachuList.STR_KOBAI_CD, hachuList.STR_GAIBU_NAIBU_KBN })
						flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag Then
							result = False
						Else
							sqlCommand = String.Format(masterSQL.ICF0610().ToString(), New Object()() { hachuList.STR_HACHU_NO, hachuList.STR_SEIKYUMOTO_CD, hachuList.STR_GAIBU_NAIBU_KBN, hachuList.STR_GYOSHA_CD, hachuList.STR_GYOSHA_MEI, hachuList.STR_GYOSHA_TELL, hachuList.STR_GYOSHA_FAX, hachuList.STR_SOFU_DT, hachuList.INT_SOFU_NO, hachuList.STR_HACHU_DT, hachuList.STR_HACHU_TNT_CD, hachuList.STR_NOHIN_HOUHOU_KBN, hachuList.STR_NOHIN_JYOTAI_KBN, hachuList.STR_NOHINSAKI_CD, hachuList.STR_NOHINSAKI_MEI, hachuList.STR_NOHINSAKI_TEL, hachuList.STR_NOHINSAKI_FAX, hachuList.STR_YUBIN_NO, hachuList.STR_ADDRESS1, hachuList.STR_ADDRESS2, hachuList.STR_ADDRESS3, hachuList.STR_KOBAI_CD, hachuList.STR_JISHA_KOBAI_CD, hachuList.STR_KOBAI_BUNRUI_MEI, hachuList.STR_KOBAI_MEI, hachuList.STR_NOHIN_DT, hachuList.INT_NOHIN_SU, hachuList.STR_NOHIN_TANI, hachuList.DEC_SIIRE_TANKA, hachuList.DEC_SIIRE_NEBIKI, hachuList.DEC_SIIRE_SHOHIZEI_GK, hachuList.DEC_SIIRE_GOKEI_GKO, hachuList.DEC_URIAGE_TANKA, hachuList.DEC_URIAGE_NEBIKI, hachuList.DEC_URIAGE_SHOHIZEI_GK, hachuList.DEC_URIAGE_GOKEI_GK, hachuList.DEC_JYOBU_SIIRE_TANKA, hachuList.DEC_JYOBU_SIIRE_NEBIKI, hachuList.DEC_JYOBU_SIIRE_SHOHIZEI_GK, hachuList.DEC_JYOBU_SIIRE_GOKEI_GK, hachuList.DEC_JYOBU_URIAGE_TANKA, hachuList.DEC_JYOBU_URIAGE_NEBIKI, hachuList.DEC_JYOBU_URIAGE_SHOHIZEI_GK, hachuList.DEC_JYOBU_URIAGE_GOKEI_GK, hachuList.STR_JYOBU_KOBAI_CD, hachuList.STR_BIKO, hachuList.STR_SEISAN_YM, hachuList.STR_KAKUTEI_KBN, mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID })
							flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
							If flag Then
								result = False
							End If
						End If
					Else
						flag = (Operators.CompareString(hachuList.STR_KAKUTEI_KBN, "0", False) = 0)
						If flag Then
							Dim sqlCommand As String = String.Format(masterSQL.UCF0614().ToString(), New Object()() { hachuList.STR_HACHU_NO, hachuList.STR_SEIKYUMOTO_CD, hachuList.STR_KOBAI_CD, hachuList.STR_NOHIN_JYOTAI_KBN, hachuList.STR_KAKUTEI_KBN })
							flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
							If flag Then
								result = False
							End If
						End If
					End If
				End If
			Catch expr_4E2 As Exception
				ProjectData.SetProjectError(expr_4E2)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function updateHachuKakutei4(){

    /*
		Public Function UpdateHachuKakutei4(NohinsakiCD As Object, HachuNo As Object, MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim sqlCommand As String = String.Format(masterSQL.UCF0615().ToString(), RuntimeHelpers.GetObjectValue(HachuNo), RuntimeHelpers.GetObjectValue(NohinsakiCD))
				Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
				If flag Then
					result = False
				End If
			Catch expr_43 As Exception
				ProjectData.SetProjectError(expr_43)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function setHachuKakuteiJoho(){

    /*
		Public Function SetHachuKakuteiJoho(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()

			Dim result As Boolean
			Try
				Dim mstFind As MstFind = New MstFind()
				Dim array As HachuList3() = CType(objEntity, HachuList3())
				Dim arg_21_0 As Integer = 0
				Dim num As Integer = Information.UBound(array, 1)
				Dim num2 As Integer = arg_21_0
				While True
					Dim arg_45A_0 As Integer = num2
					Dim num3 As Integer = num
					If arg_45A_0 > num3 Then
						GoTo Block_6
					End If
					Dim flag As Boolean = Operators.CompareString(array(num2).STR_DELETE_FLG, "0", False) = 0
					If flag Then
						Dim sqlCommand As String = String.Format(masterSQL.ICF0611().ToString(), array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_KOBAI_CD)
						flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag Then
							Exit While
						End If
						sqlCommand = String.Format(masterSQL.ICF0610().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_GAIBU_NAIBU_KBN, array(num2).STR_GYOSHA_CD, array(num2).STR_GYOSHA_MEI, array(num2).STR_GYOSHA_TELL, array(num2).STR_GYOSHA_FAX, array(num2).STR_SOFU_DT, array(num2).INT_SOFU_NO, array(num2).STR_HACHU_DT, array(num2).STR_HACHU_TNT_CD, array(num2).STR_NOHIN_HOUHOU_KBN, array(num2).STR_NOHIN_JYOTAI_KBN, array(num2).STR_NOHINSAKI_CD, array(num2).STR_NOHINSAKI_MEI, array(num2).STR_NOHINSAKI_TEL, array(num2).STR_NOHINSAKI_FAX, array(num2).STR_YUBIN_NO, array(num2).STR_ADDRESS1, array(num2).STR_ADDRESS2, array(num2).STR_ADDRESS3, array(num2).STR_KOBAI_CD, array(num2).STR_JISHA_KOBAI_CD, array(num2).STR_KOBAI_BUNRUI_MEI, array(num2).STR_KOBAI_MEI, array(num2).STR_NOHIN_DT, array(num2).INT_NOHIN_SU, array(num2).STR_NOHIN_TANI, array(num2).DEC_SIIRE_TANKA, array(num2).DEC_SIIRE_NEBIKI, array(num2).DEC_SIIRE_SHOHIZEI_GK, array(num2).DEC_SIIRE_GOKEI_GKO, array(num2).DEC_URIAGE_TANKA, array(num2).DEC_URIAGE_NEBIKI, array(num2).DEC_URIAGE_SHOHIZEI_GK, array(num2).DEC_URIAGE_GOKEI_GK, array(num2).DEC_JYOBU_SIIRE_TANKA, array(num2).DEC_JYOBU_SIIRE_NEBIKI, array(num2).DEC_JYOBU_SIIRE_SHOHIZEI_GK, array(num2).DEC_JYOBU_SIIRE_GOKEI_GK, array(num2).DEC_JYOBU_URIAGE_TANKA, array(num2).DEC_JYOBU_URIAGE_NEBIKI, array(num2).DEC_JYOBU_URIAGE_SHOHIZEI_GK, array(num2).DEC_JYOBU_URIAGE_GOKEI_GK, array(num2).STR_JYOBU_KOBAI_CD, array(num2).STR_BIKO, array(num2).STR_SEISAN_YM, array(num2).STR_KAKUTEI_KBN, mstFind.GetDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
						flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag Then
							GoTo Block_5
						End If
					End If
					num2 += 1
				End While
				result = False
				Return result
				Block_5:
				result = False
				Return result
				Block_6:
				result = True
			Catch expr_465 As Exception
				ProjectData.SetProjectError(expr_465)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function setHachuKakuteiJoho2(){

    /*
		Public Function SetHachuKakuteiJoho2(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim mstFind As MstFind = New MstFind()
				Dim hachuList As HachuList3 = CType(objEntity, HachuList3)
				Dim flag As Boolean = Operators.CompareString(hachuList.STR_DELETE_FLG, "0", False) = 0
				If flag Then
					Dim sqlCommand As String = String.Format(masterSQL.ICF0611().ToString(), hachuList.STR_HACHU_NO, hachuList.STR_SEIKYUMOTO_CD, hachuList.STR_KOBAI_CD)
					flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
					If flag Then
						result = False
						Return result
					End If
					sqlCommand = String.Format(masterSQL.ICF0610().ToString(), New Object()() { hachuList.STR_HACHU_NO, hachuList.STR_SEIKYUMOTO_CD, hachuList.STR_GAIBU_NAIBU_KBN, hachuList.STR_GYOSHA_CD, hachuList.STR_GYOSHA_MEI, hachuList.STR_GYOSHA_TELL, hachuList.STR_GYOSHA_FAX, hachuList.STR_SOFU_DT, hachuList.INT_SOFU_NO, hachuList.STR_HACHU_DT, hachuList.STR_HACHU_TNT_CD, hachuList.STR_NOHIN_HOUHOU_KBN, hachuList.STR_NOHIN_JYOTAI_KBN, hachuList.STR_NOHINSAKI_CD, hachuList.STR_NOHINSAKI_MEI, hachuList.STR_NOHINSAKI_TEL, hachuList.STR_NOHINSAKI_FAX, hachuList.STR_YUBIN_NO, hachuList.STR_ADDRESS1, hachuList.STR_ADDRESS2, hachuList.STR_ADDRESS3, hachuList.STR_KOBAI_CD, hachuList.STR_JISHA_KOBAI_CD, hachuList.STR_KOBAI_BUNRUI_MEI, hachuList.STR_KOBAI_MEI, hachuList.STR_NOHIN_DT, hachuList.INT_NOHIN_SU, hachuList.STR_NOHIN_TANI, hachuList.DEC_SIIRE_TANKA, hachuList.DEC_SIIRE_NEBIKI, hachuList.DEC_SIIRE_SHOHIZEI_GK, hachuList.DEC_SIIRE_GOKEI_GKO, hachuList.DEC_URIAGE_TANKA, hachuList.DEC_URIAGE_NEBIKI, hachuList.DEC_URIAGE_SHOHIZEI_GK, hachuList.DEC_URIAGE_GOKEI_GK, hachuList.DEC_JYOBU_SIIRE_TANKA, hachuList.DEC_JYOBU_SIIRE_NEBIKI, hachuList.DEC_JYOBU_SIIRE_SHOHIZEI_GK, hachuList.DEC_JYOBU_SIIRE_GOKEI_GK, hachuList.DEC_JYOBU_URIAGE_TANKA, hachuList.DEC_JYOBU_URIAGE_NEBIKI, hachuList.DEC_JYOBU_URIAGE_SHOHIZEI_GK, hachuList.DEC_JYOBU_URIAGE_GOKEI_GK, hachuList.STR_JYOBU_KOBAI_CD, hachuList.STR_BIKO, hachuList.STR_SEISAN_YM, "0", mstFind.GetDATE_YYMMDDHHMMSS, hachuList.STR_UPDATE_TNT_ID, hachuList.STR_GAMEN_ID })
					flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
					If flag Then
						result = False
						Return result
					End If
				End If
				result = True
			Catch expr_39B As Exception
				ProjectData.SetProjectError(expr_39B)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }


}
?>