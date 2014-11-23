<?php
class HachuJohoMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getOneEntityById(){

    /*
		Public Function DeleteHachuManageJoho(HachuNo As String, UpdateDt As String, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim seisanCrtTesuryoMeisai As SeisanCrtTesuryoMeisai = New SeisanCrtTesuryoMeisai()
				Dim sqlCommand As String = String.Format(masterSQL.DCF0411().ToString(), HachuNo)
				Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					result = True
				End If
			Catch expr_42 As Exception
				ProjectData.SetProjectError(expr_42)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }


    function updateHachu(){

    /*
		Public Function UpdateHachu(objEntity As Object, MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim array As HachuList3() = CType(objEntity, HachuList3())
				Dim sqlCommand As String = String.Format(masterSQL.DCF0412().ToString(), array(0).STR_HACHU_NO)
				Dim flag As Boolean = Not Me.DAL.NonQueryDelete(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					Dim arg_51_0 As Integer = 0
					Dim num As Integer = Information.UBound(array, 1)
					Dim num2 As Integer = arg_51_0
					While True
						Dim arg_726_0 As Integer = num2
						Dim num3 As Integer = num
						If arg_726_0 > num3 Then
							GoTo Block_24
						End If
						Dim hachuJohoMasterMeisai As HachuJohoMasterMeisai = New HachuJohoMasterMeisai()
						Dim mstFind As MstFind = New MstFind()
						flag = Not Versioned.IsNumeric(array(num2).INT_SOFU_NO)
						If flag Then
							array(num2).INT_SOFU_NO = 0
						End If
						flag = Not Versioned.IsNumeric(array(num2).INT_NOHIN_SU)
						If flag Then
							array(num2).INT_NOHIN_SU = 0
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_SIIRE_TANKA)
						If flag Then
							array(num2).DEC_SIIRE_TANKA = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_SIIRE_NEBIKI)
						If flag Then
							array(num2).DEC_SIIRE_NEBIKI = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_SIIRE_SHOHIZEI_GK)
						If flag Then
							array(num2).DEC_SIIRE_SHOHIZEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_SIIRE_GOKEI_GKO)
						If flag Then
							array(num2).DEC_SIIRE_GOKEI_GKO = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_URIAGE_TANKA)
						If flag Then
							array(num2).DEC_URIAGE_TANKA = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_URIAGE_NEBIKI)
						If flag Then
							array(num2).DEC_URIAGE_NEBIKI = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_URIAGE_SHOHIZEI_GK)
						If flag Then
							array(num2).DEC_URIAGE_SHOHIZEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_URIAGE_GOKEI_GK)
						If flag Then
							array(num2).DEC_URIAGE_GOKEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_SIIRE_TANKA)
						If flag Then
							array(num2).DEC_JYOBU_SIIRE_TANKA = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_SIIRE_NEBIKI)
						If flag Then
							array(num2).DEC_JYOBU_SIIRE_NEBIKI = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_SIIRE_SHOHIZEI_GK)
						If flag Then
							array(num2).DEC_JYOBU_SIIRE_SHOHIZEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_SIIRE_GOKEI_GK)
						If flag Then
							array(num2).DEC_JYOBU_SIIRE_GOKEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_URIAGE_TANKA)
						If flag Then
							array(num2).DEC_JYOBU_URIAGE_TANKA = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_URIAGE_NEBIKI)
						If flag Then
							array(num2).DEC_JYOBU_URIAGE_NEBIKI = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_URIAGE_SHOHIZEI_GK)
						If flag Then
							array(num2).DEC_JYOBU_URIAGE_SHOHIZEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_URIAGE_GOKEI_GK)
						If flag Then
							array(num2).DEC_JYOBU_URIAGE_GOKEI_GK = Decimal.Zero
						End If
						flag = (array(num2).INT_NOHIN_SU > 0)
						If flag Then
							sqlCommand = String.Format(masterSQL.ICF0410().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_GAIBU_NAIBU_KBN, array(num2).STR_GYOSHA_CD, array(num2).STR_GYOSHA_MEI, array(num2).STR_GYOSHA_TELL, array(num2).STR_GYOSHA_FAX, array(num2).STR_SOFU_DT, array(num2).INT_SOFU_NO, array(num2).STR_HACHU_DT, array(num2).STR_HACHU_TNT_CD, array(num2).STR_NOHIN_HOUHOU_KBN, array(num2).STR_NOHIN_JYOTAI_KBN, array(num2).STR_NOHINSAKI_CD, array(num2).STR_NOHINSAKI_MEI, array(num2).STR_NOHINSAKI_TEL, array(num2).STR_NOHINSAKI_FAX, array(num2).STR_YUBIN_NO, array(num2).STR_ADDRESS1, array(num2).STR_ADDRESS2, array(num2).STR_ADDRESS3, array(num2).STR_KOBAI_CD, array(num2).STR_JISHA_KOBAI_CD, array(num2).STR_KOBAI_BUNRUI_MEI, array(num2).STR_KOBAI_MEI, array(num2).STR_NOHIN_DT, array(num2).INT_NOHIN_SU, array(num2).STR_NOHIN_TANI, array(num2).DEC_SIIRE_TANKA, array(num2).DEC_SIIRE_NEBIKI, array(num2).DEC_SIIRE_SHOHIZEI_GK, array(num2).DEC_SIIRE_GOKEI_GKO, array(num2).DEC_URIAGE_TANKA, array(num2).DEC_URIAGE_NEBIKI, array(num2).DEC_URIAGE_SHOHIZEI_GK, array(num2).DEC_URIAGE_GOKEI_GK, array(num2).DEC_JYOBU_SIIRE_TANKA, array(num2).DEC_JYOBU_SIIRE_NEBIKI, array(num2).DEC_JYOBU_SIIRE_SHOHIZEI_GK, array(num2).DEC_JYOBU_SIIRE_GOKEI_GK, array(num2).DEC_JYOBU_URIAGE_TANKA, array(num2).DEC_JYOBU_URIAGE_NEBIKI, array(num2).DEC_JYOBU_URIAGE_SHOHIZEI_GK, array(num2).DEC_JYOBU_URIAGE_GOKEI_GK, array(num2).STR_JYOBU_KOBAI_CD, array(num2).STR_BIKO, array(num2).STR_SEISAN_YM, array(num2).STR_KAKUTEI_KBN, mstFind.GetDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
							flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
							If flag Then
								Exit While
							End If
						End If
						num2 += 1
					End While
					MsgCd = "SE0011"
					result = False
					Block_24:
				End If
			Catch expr_72D As Exception
				ProjectData.SetProjectError(expr_72D)
				MsgCd = "SE0011"
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function updateHachu(){

    /*

		Public Function SetHachuJoho(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim mstFind As MstFind = New MstFind()
				Dim array As HachuList3() = CType(objEntity, HachuList3())
				Dim arg_21_0 As Integer = 0
				Dim num As Integer = Information.UBound(array, 1)
				Dim num2 As Integer = arg_21_0
				While True
					Dim arg_785_0 As Integer = num2
					Dim num3 As Integer = num
					If arg_785_0 > num3 Then
						GoTo Block_24
					End If
					Dim flag As Boolean = array(num2) Is Nothing
					If Not flag Then
						Dim sqlCommand As String = String.Format(masterSQL.ICF0411().ToString(), array(num2).STR_HACHU_NO, array(num2).STR_KOBAI_CD)
						flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag Then
							Exit While
						End If
						flag = Not Versioned.IsNumeric(array(num2).INT_SOFU_NO)
						If flag Then
							array(num2).INT_SOFU_NO = 0
						End If
						flag = Not Versioned.IsNumeric(array(num2).INT_NOHIN_SU)
						If flag Then
							array(num2).INT_NOHIN_SU = 0
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_SIIRE_TANKA)
						If flag Then
							array(num2).DEC_SIIRE_TANKA = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_SIIRE_NEBIKI)
						If flag Then
							array(num2).DEC_SIIRE_NEBIKI = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_SIIRE_SHOHIZEI_GK)
						If flag Then
							array(num2).DEC_SIIRE_SHOHIZEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_SIIRE_GOKEI_GKO)
						If flag Then
							array(num2).DEC_SIIRE_GOKEI_GKO = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_URIAGE_TANKA)
						If flag Then
							array(num2).DEC_URIAGE_TANKA = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_URIAGE_NEBIKI)
						If flag Then
							array(num2).DEC_URIAGE_NEBIKI = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_URIAGE_SHOHIZEI_GK)
						If flag Then
							array(num2).DEC_URIAGE_SHOHIZEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_URIAGE_GOKEI_GK)
						If flag Then
							array(num2).DEC_URIAGE_GOKEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_SIIRE_TANKA)
						If flag Then
							array(num2).DEC_JYOBU_SIIRE_TANKA = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_SIIRE_NEBIKI)
						If flag Then
							array(num2).DEC_JYOBU_SIIRE_NEBIKI = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_SIIRE_SHOHIZEI_GK)
						If flag Then
							array(num2).DEC_JYOBU_SIIRE_SHOHIZEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_SIIRE_GOKEI_GK)
						If flag Then
							array(num2).DEC_JYOBU_SIIRE_GOKEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_URIAGE_TANKA)
						If flag Then
							array(num2).DEC_JYOBU_URIAGE_TANKA = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_URIAGE_NEBIKI)
						If flag Then
							array(num2).DEC_JYOBU_URIAGE_NEBIKI = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_URIAGE_SHOHIZEI_GK)
						If flag Then
							array(num2).DEC_JYOBU_URIAGE_SHOHIZEI_GK = Decimal.Zero
						End If
						flag = Not Versioned.IsNumeric(array(num2).DEC_JYOBU_URIAGE_GOKEI_GK)
						If flag Then
							array(num2).DEC_JYOBU_URIAGE_GOKEI_GK = Decimal.Zero
						End If
						sqlCommand = String.Format(masterSQL.ICF0410().ToString(), New Object()() { array(num2).STR_HACHU_NO, array(num2).STR_SEIKYUMOTO_CD, array(num2).STR_GAIBU_NAIBU_KBN, array(num2).STR_GYOSHA_CD, array(num2).STR_GYOSHA_MEI, array(num2).STR_GYOSHA_TELL, array(num2).STR_GYOSHA_FAX, array(num2).STR_SOFU_DT, array(num2).INT_SOFU_NO, array(num2).STR_HACHU_DT, array(num2).STR_HACHU_TNT_CD, array(num2).STR_NOHIN_HOUHOU_KBN, array(num2).STR_NOHIN_JYOTAI_KBN, array(num2).STR_NOHINSAKI_CD, array(num2).STR_NOHINSAKI_MEI, array(num2).STR_NOHINSAKI_TEL, array(num2).STR_NOHINSAKI_FAX, array(num2).STR_YUBIN_NO, array(num2).STR_ADDRESS1, array(num2).STR_ADDRESS2, array(num2).STR_ADDRESS3, array(num2).STR_KOBAI_CD, array(num2).STR_JISHA_KOBAI_CD, array(num2).STR_KOBAI_BUNRUI_MEI, array(num2).STR_KOBAI_MEI, array(num2).STR_NOHIN_DT, array(num2).INT_NOHIN_SU, array(num2).STR_NOHIN_TANI, array(num2).DEC_SIIRE_TANKA, array(num2).DEC_SIIRE_NEBIKI, array(num2).DEC_SIIRE_SHOHIZEI_GK, array(num2).DEC_SIIRE_GOKEI_GKO, array(num2).DEC_URIAGE_TANKA, array(num2).DEC_URIAGE_NEBIKI, array(num2).DEC_URIAGE_SHOHIZEI_GK, array(num2).DEC_URIAGE_GOKEI_GK, array(num2).DEC_JYOBU_SIIRE_TANKA, array(num2).DEC_JYOBU_SIIRE_NEBIKI, array(num2).DEC_JYOBU_SIIRE_SHOHIZEI_GK, array(num2).DEC_JYOBU_SIIRE_GOKEI_GK, array(num2).DEC_JYOBU_URIAGE_TANKA, array(num2).DEC_JYOBU_URIAGE_NEBIKI, array(num2).DEC_JYOBU_URIAGE_SHOHIZEI_GK, array(num2).DEC_JYOBU_URIAGE_GOKEI_GK, array(num2).STR_JYOBU_KOBAI_CD, array(num2).STR_BIKO, array(num2).STR_SEISAN_YM, array(num2).STR_KAKUTEI_KBN, mstFind.GetDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
						flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag Then
							GoTo Block_23
						End If
					End If
					num2 += 1
				End While
				MsgCd = "SE0012"
				result = False
				Return result
				Block_23:
				MsgCd = "SE0010"
				result = False
				Return result
				Block_24:
				result = True
			Catch expr_790 As Exception
				ProjectData.SetProjectError(expr_790)
				MsgCd = "SE0010"
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }

    function setKobaihinPtnJoho(){

    /*
		Public Function SetKobaihinPtnJoho(objEntity As Object, ByRef MsgCd As String) As Boolean
			Dim masterSQL As MasterSQL = New MasterSQL()
			Dim result As Boolean
			Try
				Dim mstFind As MstFind = New MstFind()
				Dim array As KobaihinPtnList() = CType(objEntity, KobaihinPtnList())
				Dim sqlCommand As String = String.Format(masterSQL.ICF0413().ToString(), array(0).STR_SOSHIKI_CD, array(0).STR_GYOSHA_CD)
				Dim flag As Boolean = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
				If flag Then
					result = False
				Else
					Dim arg_62_0 As Integer = 0
					Dim num As Integer = Information.UBound(array, 1)
					Dim num2 As Integer = arg_62_0
					While True
						Dim arg_109_0 As Integer = num2
						Dim num3 As Integer = num
						If arg_109_0 > num3 Then
							GoTo Block_5
						End If
						sqlCommand = String.Format(masterSQL.ICF0412().ToString(), New Object()() { array(num2).STR_SOSHIKI_CD, array(num2).STR_GYOSHA_CD, RuntimeHelpers.GetObjectValue(array(num2).STR_KOBAI_CD), mstFind.GetDATE_YYMMDDHHMMSS, array(num2).STR_UPDATE_TNT_ID, array(num2).STR_GAMEN_ID })
						flag = Not Me.DAL.NonQueryInsert(sqlCommand, MsgCd)
						If flag Then
							Exit While
						End If
						num2 += 1
					End While
					result = False
					Return result
					Block_5:
					result = True
				End If
			Catch expr_114 As Exception
				ProjectData.SetProjectError(expr_114)
				result = False
				ProjectData.ClearProjectError()
			End Try
			Return result
		End Function
     */

    }


}
?>