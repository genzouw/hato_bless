<?php
class AitesakiBetsuSeikyuShiharaiList extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getAitesakiBetsuSeikyuShiharaiJyoho(){
/*
		Public Function GetAitesakiBetsuSeikyuShiharaiJyoho(objEntity As Object(), ByRef MsgCd As String, FindFlg As String) As SeikyuList()
			Dim masterSQL As MasterSQL = New MasterSQL()
			' The following expression was wrapped in a checked-statement
			Dim result As SeikyuList()
			Try
				Dim seikyuList As SeikyuList = New SeikyuList()
				Dim flag As Boolean = Operators.CompareString(FindFlg, Conversions.ToString(0), False) = 0
				Dim strSQL As String
				If flag Then
					strSQL = String.Format(masterSQL.SEF3150().ToString(), RuntimeHelpers.GetObjectValue(objEntity(0)), RuntimeHelpers.GetObjectValue(objEntity(1)), RuntimeHelpers.GetObjectValue(objEntity(2)))
				Else
					flag = (Operators.CompareString(FindFlg, Conversions.ToString(1), False) = 0)
					If flag Then
						strSQL = String.Format(masterSQL.SEF3150().ToString(), RuntimeHelpers.GetObjectValue(objEntity(0)), RuntimeHelpers.GetObjectValue(objEntity(1)), "")
					End If
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As SeikyuList()
				While sqlDataReader.Read()
					flag = (num < 100)
					If flag Then
						array = CType(Utils.CopyArray(CType(array, Array), New SeikyuList(num + 1 - 1) {}), SeikyuList())
						Dim seikyuList2 As SeikyuList = array(num)
						array(num) = New SeikyuList()
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI")))
						If flag Then
							array(num).STR_SAKI_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI"))
						Else
							array(num).STR_SAKI_SOSHIKI_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI")))
						If flag Then
							array(num).STR_MOTO_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("MOTO_SOSHIKI_RYAKU_MEI"))
						Else
							array(num).STR_MOTO_SOSHIKI_RYAKU_MEI = ""
						End If
						array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
						array(num).DEC_SIHARAI_GOKEI_GK = Conversions.ToDecimal(sqlDataReader("SEIKYU_GK"))
						array(num).STR_SEQ_NO = Conversions.ToString(sqlDataReader("SEQ_NO"))
						array(num).STR_KANRI_NO = Conversions.ToString(sqlDataReader("KANRI_NO"))
						array(num).STR_MOTO_SOSHIKI_CD = RuntimeHelpers.GetObjectValue(sqlDataReader("MOTO_SOSHIKI_CD"))
						array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_CD"))
						array(num).STR_HIYOKOMOKU_CD = Conversions.ToString(sqlDataReader("HIYOKOMOKU_CD"))
						array(num).STR_SEIKYU_YM = RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_YM"))
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HIYOKOMOKU_MEI")))
						If flag Then
							array(num).STR_HIYOKOMOKU_MEI = Conversions.ToString(sqlDataReader("HIYOKOMOKU_MEI"))
						Else
							array(num).STR_HIYOKOMOKU_MEI = ""
						End If
						array(num).STR_MEISAI_KBN = Conversions.ToString(sqlDataReader("MEISAI_KBN"))
						array(num).STR_SEIKYU_GK = Conversions.ToString(sqlDataReader("SEIKYU_GK"))
						array(num).STR_SHOHIZEI_GK = Conversions.ToString(sqlDataReader("SHOHIZEI_GK"))
						array(num).STR_GOUKEI = Conversions.ToString(sqlDataReader("GOUKEI"))
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_YUBIN")))
						If flag Then
							array(num).STR_SOSHIKI_YUBUN = Conversions.ToString(sqlDataReader("SOSHIKI_YUBIN"))
						Else
							array(num).STR_SOSHIKI_YUBUN = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS1")))
						If flag Then
							array(num).STR_SOSHIKI_ADDRESS1 = Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS1"))
						Else
							array(num).STR_SOSHIKI_ADDRESS1 = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS2")))
						If flag Then
							array(num).STR_SOSHIKI_ADDRESS2 = Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS2"))
						Else
							array(num).STR_SOSHIKI_ADDRESS2 = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_ADDRESS3")))
						If flag Then
							array(num).STR_SOSHIKI_ADDRESS3 = Conversions.ToString(sqlDataReader("SOSHIKI_ADDRESS3"))
						Else
							array(num).STR_SOSHIKI_ADDRESS3 = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI")))
						If flag Then
							array(num).STR_SAKI_SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SAKI_SOSHIKI_RYAKU_MEI"))
						Else
							array(num).STR_SAKI_SOSHIKI_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("KAISHA_RYAKU_MEI")))
						If flag Then
							array(num).STR_KAISHA_RYAKUMEI = Conversions.ToString(sqlDataReader("KAISHA_RYAKU_MEI"))
						Else
							array(num).STR_KAISHA_RYAKUMEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_TELL")))
						If flag Then
							array(num).STR_SOSHIKI_TELL = Conversions.ToString(sqlDataReader("SOSHIKI_TELL"))
						Else
							array(num).STR_SOSHIKI_TELL = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_FAX")))
						If flag Then
							array(num).STR_SOSHIKI_FAX = Conversions.ToString(sqlDataReader("SOSHIKI_FAX"))
						Else
							array(num).STR_SOSHIKI_FAX = ""
						End If
						array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
						array(num).STR_HASSEIBI = Conversions.ToString(sqlDataReader("UKETSUKE_DT"))
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_5E8 As Exception
				ProjectData.SetProjectError(expr_5E8)
				Dim ex As Exception = expr_5E8
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function

**/
    }

    function getSeisanTuki(){
/*
		Public Function GetSeisanTuki(SeisanTuki As String, ByRef MsgCd As String) As Object
			Dim masterSQL As MasterSQL = New MasterSQL()
			' The following expression was wrapped in a checked-statement
			Dim result As Object
			Try
				Dim strSQL As String = String.Format(masterSQL.SEF0112().ToString(), SeisanTuki)
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As SeisanTuki()
				While sqlDataReader.Read()
					Dim flag As Boolean = num < 100
					If flag Then
						array = CType(Utils.CopyArray(CType(array, Array), New SeisanTuki(num + 1 - 1) {}), SeisanTuki())
						Dim seisanTuki As SeisanTuki = array(num)
						array(num) = New SeisanTuki()
						array(num).SEISAN_TUKI = RuntimeHelpers.GetObjectValue(sqlDataReader("SEISAN_TUKI"))
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_B5 As Exception
				ProjectData.SetProjectError(expr_B5)
				Dim ex As Exception = expr_B5
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
 *
 */
    }

}
?>