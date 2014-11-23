<?php
class GetugakuNyuryokuMasterMeisai extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    function getGetugakuNyuryokuManageJoho(){

    /*
		Public Function GetGetugakuNyuryokuManageJoho(SeikyuYr As String, MotoSoshikiCd As String, HiyoKoumokuCd As String, SoshikiCd As String, ByRef MsgCd As String, FindFlg As Integer) As SeisanTeigakuList()
			Dim masterSQL As MasterSQL = New MasterSQL()
//			' The following expression was wrapped in a checked-statement
			Dim result As SeisanTeigakuList()
			Try
				Dim flag As Boolean = FindFlg = 2
				Dim strSQL As String
				If flag Then
					strSQL = String.Format(masterSQL.SEF0313().ToString(), New Object()() { SeikyuYr, MotoSoshikiCd, HiyoKoumokuCd, SoshikiCd })
				Else
					strSQL = String.Format(masterSQL.SEF0310().ToString(), New Object()() { SeikyuYr, MotoSoshikiCd, HiyoKoumokuCd, SoshikiCd })
				End If
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As SeisanTeigakuList()
				While sqlDataReader.Read()
					flag = (num < 100)
					If flag Then
						array = CType(Utils.CopyArray(CType(array, Array), New SeisanTeigakuList(num + 1 - 1) {}), SeisanTeigakuList())
						Dim seisanTeigakuList As SeisanTeigakuList = array(num)
						array(num) = New SeisanTeigakuList()
						array(num).STR_SEIKYU_YM = SeikyuYr
						array(num).STR_MOTO_SOSHIKI_CD = MotoSoshikiCd
						array(num).STR_HIYOKOMOKU_CD = HiyoKoumokuCd
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_SIHARAI_CD")))
						If flag Then
							array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
						Else
							array(num).STR_SEIKYU_SIHARAI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
						If flag Then
							array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
						Else
							array(num).STR_SAKI_SOSHIKI_CD = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
						If flag Then
							array(num).SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
						Else
							array(num).SOSHIKI_RYAKU_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HASEI_DT")))
						If flag Then
							array(num).STR_HASEI_DT = Conversions.ToString(sqlDataReader("HASEI_DT"))
						Else
							array(num).STR_HASEI_DT = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
						If flag Then
							array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
						Else
							array(num).STR_SHOHIZEI_KBN = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_RT")))
						If flag Then
							array(num).STR_SHOHIZEI_RITU = Conversions.ToString(sqlDataReader("SHOHIZEI_RT"))
						Else
							array(num).STR_SHOHIZEI_RITU = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_TRI_MEI")))
						If flag Then
							array(num).STR_SYOSAI_TRI_MEI = Conversions.ToString(sqlDataReader("SYOSAI_TRI_MEI"))
						Else
							array(num).STR_SYOSAI_TRI_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_BIKO")))
						If flag Then
							array(num).STR_SYOSAI_BIKO = Conversions.ToString(sqlDataReader("SYOSAI_BIKO"))
						Else
							array(num).STR_SYOSAI_BIKO = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_AITE_MEI")))
						If flag Then
							array(num).STR_SYOSAI_AITE_MEI = Conversions.ToString(sqlDataReader("SYOSAI_AITE_MEI"))
						Else
							array(num).STR_SYOSAI_AITE_MEI = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_GK")))
						If flag Then
							array(num).DEC_SYOSAI_GK = Conversions.ToString(sqlDataReader("SYOSAI_GK"))
						Else
							array(num).DEC_SYOSAI_GK = ""
						End If
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_ZAN_SU")))
						If flag Then
							array(num).STR_SYOSAI_ZAN_SU = Conversions.ToString(sqlDataReader("SYOSAI_ZAN_SU"))
						Else
							array(num).STR_SYOSAI_ZAN_SU = ""
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
						flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DELETE_FLG")))
						If flag Then
							array(num).STR_DELETE_FLG = Conversions.ToString(sqlDataReader("DELETE_FLG"))
						Else
							array(num).STR_DELETE_FLG = ""
						End If
						array(num).DEC_SEIKYU_1GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_1GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_2GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_2GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_3GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_3GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_4GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_4GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_5GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_5GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_6GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_6GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_7GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_7GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_8GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_8GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_9GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_9GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_10GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_10GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_11GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_11GATU_GK")), "###,###,##0")
						array(num).DEC_SEIKYU_12GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_12GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_1GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_1GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_2GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_2GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_3GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_3GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_4GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_4GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_5GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_5GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_6GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_6GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_7GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_7GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_8GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_8GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_9GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_9GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_10GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_10GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_11GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_11GATU_GK")), "###,###,##0")
						array(num).DEC_SHOHIZEI_12GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_12GATU_GK")), "###,###,##0")
					End If
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_929 As Exception
				ProjectData.SetProjectError(expr_929)
				Dim ex As Exception = expr_929
				Dim sqlDataReader As SqlDataReader
				sqlDataReader.Close()
				Me.DAL.Close()
				Throw ex
			End Try
			Return result
		End Function
     */

    }


    function getGetugakuNyuryokuManageJoho(){

    /*
		Public Function GetGetugakuNyuryokuManageJoho2(SeikyuYr As String, MotoSoshikiCd As String, HiyoKoumokuCd As String, SoshikiCd As String, ByRef MsgCd As String, FindFlg As Integer) As SeisanTeigakuList()
			Dim masterSQL As MasterSQL = New MasterSQL()
			' The following expression was wrapped in a checked-statement
			Dim result As SeisanTeigakuList()
			Try
				Dim strSQL As String = String.Format(masterSQL.SEF0312().ToString(), New Object()() { SeikyuYr, MotoSoshikiCd, HiyoKoumokuCd, SoshikiCd })
				Dim sqlDataReader As SqlDataReader = Me.DAL.SelectDataReader(strSQL, MsgCd)
				Dim num As Integer = 0
				Dim array As SeisanTeigakuList()
				While sqlDataReader.Read()
					array = CType(Utils.CopyArray(CType(array, Array), New SeisanTeigakuList(num + 1 - 1) {}), SeisanTeigakuList())
					Dim seisanTeigakuList As SeisanTeigakuList = array(num)
					array(num) = New SeisanTeigakuList()
					array(num).STR_SEIKYU_YM = SeikyuYr
					array(num).STR_MOTO_SOSHIKI_CD = MotoSoshikiCd
					array(num).STR_HIYOKOMOKU_CD = HiyoKoumokuCd
					Dim flag As Boolean = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_SIHARAI_CD")))
					If flag Then
						array(num).STR_SEIKYU_SIHARAI_CD = Conversions.ToString(sqlDataReader("SEIKYU_SIHARAI_CD"))
					Else
						array(num).STR_SEIKYU_SIHARAI_CD = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_CD")))
					If flag Then
						array(num).STR_SAKI_SOSHIKI_CD = Conversions.ToString(sqlDataReader("SOSHIKI_CD"))
					Else
						array(num).STR_SAKI_SOSHIKI_CD = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SOSHIKI_RYAKU_MEI")))
					If flag Then
						array(num).SOSHIKI_RYAKU_MEI = Conversions.ToString(sqlDataReader("SOSHIKI_RYAKU_MEI"))
					Else
						array(num).SOSHIKI_RYAKU_MEI = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("HASEI_DT")))
					If flag Then
						array(num).STR_HASEI_DT = Conversions.ToString(sqlDataReader("HASEI_DT"))
					Else
						array(num).STR_HASEI_DT = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_KBN")))
					If flag Then
						array(num).STR_SHOHIZEI_KBN = Conversions.ToString(sqlDataReader("SHOHIZEI_KBN"))
					Else
						array(num).STR_SHOHIZEI_KBN = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_RT")))
					If flag Then
						array(num).STR_SHOHIZEI_RITU = Conversions.ToString(sqlDataReader("SHOHIZEI_RT"))
					Else
						array(num).STR_SHOHIZEI_RITU = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_TRI_MEI")))
					If flag Then
						array(num).STR_SYOSAI_TRI_MEI = Conversions.ToString(sqlDataReader("SYOSAI_TRI_MEI"))
					Else
						array(num).STR_SYOSAI_TRI_MEI = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_BIKO")))
					If flag Then
						array(num).STR_SYOSAI_BIKO = Conversions.ToString(sqlDataReader("SYOSAI_BIKO"))
					Else
						array(num).STR_SYOSAI_BIKO = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_AITE_MEI")))
					If flag Then
						array(num).STR_SYOSAI_AITE_MEI = Conversions.ToString(sqlDataReader("SYOSAI_AITE_MEI"))
					Else
						array(num).STR_SYOSAI_AITE_MEI = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_GK")))
					If flag Then
						array(num).DEC_SYOSAI_GK = Conversions.ToString(sqlDataReader("SYOSAI_GK"))
					Else
						array(num).DEC_SYOSAI_GK = ""
					End If
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("SYOSAI_ZAN_SU")))
					If flag Then
						array(num).STR_SYOSAI_ZAN_SU = Conversions.ToString(sqlDataReader("SYOSAI_ZAN_SU"))
					Else
						array(num).STR_SYOSAI_ZAN_SU = ""
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
					flag = Not Information.IsDBNull(RuntimeHelpers.GetObjectValue(sqlDataReader("DELETE_FLG")))
					If flag Then
						array(num).STR_DELETE_FLG = Conversions.ToString(sqlDataReader("DELETE_FLG"))
					Else
						array(num).STR_DELETE_FLG = ""
					End If
					array(num).DEC_SEIKYU_1GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_1GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_2GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_2GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_3GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_3GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_4GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_4GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_5GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_5GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_6GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_6GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_7GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_7GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_8GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_8GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_9GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_9GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_10GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_10GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_11GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_11GATU_GK")), "###,###,##0")
					array(num).DEC_SEIKYU_12GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SEIKYU_12GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_1GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_1GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_2GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_2GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_3GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_3GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_4GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_4GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_5GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_5GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_6GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_6GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_7GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_7GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_8GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_8GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_9GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_9GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_10GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_10GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_11GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_11GATU_GK")), "###,###,##0")
					array(num).DEC_SHOHIZEI_12GATU_GK = Strings.Format(RuntimeHelpers.GetObjectValue(sqlDataReader("SHOHIZEI_12GATU_GK")), "###,###,##0")
					num += 1
				End While
				sqlDataReader.Close()
				Me.DAL.Close()
				result = array
			Catch expr_8D5 As Exception
				ProjectData.SetProjectError(expr_8D5)
				Dim ex As Exception = expr_8D5
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