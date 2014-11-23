<?php
class M_SOSHIKI extends AppModel {

    public $useTable = 'M_SOSHIKI';
    public $primaryKey = array('ID','SOSHIKI_CD');

/*
CREATE TABLE [dbo].[M_SOSHIKI](
    [SOSHIKI_CD] [char](5) NOT NULL,
    [SOSHIKI_KBN] [char](1) NOT NULL,
    [SOSHIKI_MEI] [varchar](60) NOT NULL,
    [SOSHIKI_RYAKU_MEI] [varchar](20) NOT NULL,
    [SOSHIKI_KANA_MEI] [varchar](60) NULL,
    [KAISHA_MEI] [varchar](60) NULL,
    [KAISHA_RYAKU_MEI] [varchar](20) NULL,
    [KAISHA_KANA_MEI] [varchar](60) NULL,
    [SOSHIKI_TELL] [char](20) NULL,
    [SOSHIKI_FAX] [char](20) NULL,
    [SOSHIKI_MAIL_ADS] [char](100) NULL,
    [SOSHIKI_YUBIN] [char](8) NULL,
    [SOSHIKI_ADDRESS1] [varchar](30) NULL,
    [SOSHIKI_ADDRESS2] [varchar](60) NULL,
    [SOSHIKI_ADDRESS3] [varchar](40) NULL,
    [JYOBU_SOSHIKI_CD] [char](5) NOT NULL,
    [AREA_CD] [char](8) NOT NULL,
    [UNYUKYOKU_KBN] [char](1) NOT NULL,
    [SO_BOX_SU] [decimal](3, 1) NOT NULL CONSTRAINT [DF_M_SOSHIKI_SO_BOX_SU]  DEFAULT (0),
    [BANK_CD_1] [char](4) NOT NULL,
    [BANK_SHITEN_CD_1] [char](3) NOT NULL,
    [BANK_SHITEN_MEI_1] [varchar](60) NOT NULL,
    [KOZA_KBN_1] [char](1) NOT NULL,
    [KOZA_NO_1] [char](7) NOT NULL,
    [KOZA_MEIGI_1] [varchar](60) NOT NULL,
    [BANK_CD_2] [char](4) NULL,
    [BANK_SHITEN_CD_2] [char](3) NULL,
    [BANK_SHITEN_MEI_2] [varchar](40) NULL,
    [KOZA_KBN_2] [char](1) NULL,
    [KOZA_NO_2] [char](7) NULL,
    [KOZA_MEIGI_2] [varchar](60) NULL,
    [BANK_CD_3] [char](4) NULL,
    [BANK_SHITEN_CD_3] [char](3) NULL,
    [BANK_SHITEN_MEI_3] [varchar](40) NULL,
    [KOZA_KBN_3] [char](1) NULL,
    [KOZA_NO_3] [char](7) NULL,
    [KOZA_MEIGI_3] [varchar](60) NULL,
    [BANK_CD_4] [char](4) NULL,
    [BANK_SHITEN_CD_4] [char](3) NULL,
    [BANK_SHITEN_MEI_4] [varchar](40) NULL,
    [KOZA_KBN_4] [char](1) NULL,
    [KOZA_NO_4] [char](7) NULL,
    [KOZA_MEIGI_4] [varchar](60) NULL,
    [BANK_CD_5] [char](4) NOT NULL,
    [BANK_SHITEN_CD_5] [char](3) NOT NULL,
    [BANK_SHITEN_MEI_5] [varchar](40) NOT NULL,
    [KOZA_KBN_5] [char](1) NOT NULL,
    [KOZA_NO_5] [char](7) NOT NULL,
    [KOZA_MEIGI_5] [varchar](60) NOT NULL,
    [NINKA_NO] [varchar](32) NULL,
    [KOKYAKU_KANRI_RIRITU] [decimal](7, 5) NULL CONSTRAINT [DF_M_SOSHIKI_KOKYAKU_KANRI_RIRITU]  DEFAULT (0),
    [UPDATE_DT] [char](17) NULL,
    [UPDATE_TNT_ID] [char](10) NULL,
    [GAMEN_ID] [char](6) NULL,
    [DELETE_FLG] [char](1) NOT NULL CONSTRAINT [DF_M_SOSHIKI_DELETE_FLG]  DEFAULT ('0'),
 CONSTRAINT [PK_M_SOSHIKI] PRIMARY KEY CLUSTERED
(
    [SOSHIKI_CD] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, FILLFACTOR = 85) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'認可番号' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'M_SOSHIKI', @level2type=N'COLUMN',@level2name=N'NINKA_NO'
GO

EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=NULL , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'M_SOSHIKI', @level2type=N'COLUMN',@level2name=N'UPDATE_DT'
GO

*/

    /*
     * 入力値検証
     */

/*
    public $validate = array(

        'SEIKYU_YM' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須入力です',
            ),
        ),
        'MOTO_SOSHIKI_CD' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須入力です',
            ),
        ),
        'SAKI_SOSHIKI_CD' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須入力です',
            ),
        ),
        'SEIKYU_SIHARAI_CD' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須入力です',
            ),
        ),
        'HIYOKOMOKU_CD' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須入力です',
            ),
        ),
        'SEIKYU_YM' => array(
            'maxLength' => array(
                'rule' => array('maxLength',6),
                'allowEmpty' => true,
                'message' => '6文字入力です',
            ),
        ),
        'MOTO_SOSHIKI_CD' => array(
            'maxLength' => array(
                'rule' => array('maxLength',5),
                'allowEmpty' => true,
                'message' => '5文字入力です',
            ),
        ),
        'SAKI_SOSHIKI_CD' => array(
            'maxLength' => array(
                'rule' => array('maxLength',5),
                'allowEmpty' => true,
                'message' => '5文字入力です',
            ),
        ),
        'SEIKYU_SIHARAI_CD' => array(
            'maxLength' => array(
                'rule' => array('maxLength',1),
                'allowEmpty' => true,
                'message' => '1文字入力です',
            ),
        ),
        'HIYOKOMOKU_CD' => array(
            'maxLength' => array(
                'rule' => array('maxLength',8),
                'allowEmpty' => true,
                'message' => '8文字入力です',
            ),
        ),
        'HASEI_DT' => array(
            'maxLength' => array(
                'rule' => array('maxLength',8),
                'allowEmpty' => true,
                'message' => '8文字入力です',
            ),
        ),
        'HIYOKOMOKU_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'SHOHIZEI_KBN' => array(
            'maxLength' => array(
                'rule' => array('maxLength',1),
                'allowEmpty' => true,
                'message' => '1文字入力です',
            ),
        ),
        'SHOHIZEI_RT' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字3桁小数点1桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',1),
                'allowEmpty' => true,
                'message' => '半角数字3桁小数点1桁入力です',
            ),
        ),
        'SHOHIZEI_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'TESURYO_RT' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字3桁小数点1桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',1),
                'allowEmpty' => true,
                'message' => '半角数字3桁小数点1桁入力です',
            ),
        ),
        'TESURYO_KEISAN_KBN' => array(
            'maxLength' => array(
                'rule' => array('maxLength',1),
                'allowEmpty' => true,
                'message' => '1文字入力です',
            ),
        ),
        'TESURYO_SHOHIZEI_KBN' => array(
            'maxLength' => array(
                'rule' => array('maxLength',1),
                'allowEmpty' => true,
                'message' => '1文字入力です',
            ),
        ),
        'TESURYO_SHOHIZEI_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'TESURYO_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'MEISAI_HIYO_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'MEISAI_SHOHIZEI_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'MEISAI_TOTAL_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'MEISAI_TESURYO_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'SEIKYU_GOKEI_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'BIKO' => array(
            'maxLength' => array(
                'rule' => array('maxLength',190),
                'allowEmpty' => true,
                'message' => '最大190文字入力です',
            ),
        ),
        'SYOSAI_TRI_MEI' => array(
            'maxLength' => array(
                'rule' => array('maxLength',55),
                'allowEmpty' => true,
                'message' => '最大55文字です',
            ),
        ),
        'SYOSAI_BIKO' => array(
            'maxLength' => array(
                'rule' => array('maxLength',190),
                'allowEmpty' => true,
                'message' => '最大190文字です',
            ),
        ),
        'SYOSAI_KEIYU_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'SYOSAI_HIKITORIZEI_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'SYOSAI_SONOTA_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'SYOSAI_SYOHIZEI_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'SYOSAI_GOKEI_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),
        'SYOSAI_GOKEI_GK' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
            'decimal' => array(
                'rule' => array('decimal',0),
                'allowEmpty' => true,
                'message' => '半角数字10桁入力です',
            ),
        ),

    );
*/

    /*
     * リスト
     */
    function getOneEntityById($id){

        return $this->findById($id);

    }

/**
* 組織コードから組織情報を取得
*
* @param string $cd 組織コード
* @return array 一意の組織情報
*/
    function getOneEntityBySoshikiCd($cd){

        return $this->find('first',array('conditions' => array('M_SOSHIKI.SOSHIKI_CD' => $cd)));

    }

    /*
     * 保存
     */
    function saveData($data){

        return $this->save($data);

    }

    /*
     * 削除
     */
    function del($data){
        $data['M_SOSHIKI']['id'] = $data['target_id'];
        $data['M_SOSHIKI']['del_flg'] = 1;
        return $this->save($data);

    }

    /*
     * 新規登録フィールドリスト
     */
    function getAddEntity(){

        $array = $this->getColumnTypes();
        $arrRes['M_SOSHIKI']['ID'] = null;
        foreach ( $array as $key => $value ) {
            $arrRes['M_SOSHIKI'][$key] = null;
        }
        return $arrRes;

    }

    var $search_param;

    function setSearchParam($param){

        $this->search_param = $param;

    }

    var $search_ym;

    function setSearchYm($param){

        $this->search_ym = $param;

    }

    /*
     * ページング
     */
    function getPagingEntity($disp_num,$pgnum){

        // ページング用パラメータ設定
        $this->setDispNum($disp_num);
        $this->setPgNum($pgnum);

        // SQL処理
        $sql =  "";
        $sql .=  "     SELECT * ";
        $sql .=  "       FROM M_SOSHIKI ";
        $sql .=  "      WHERE M_SOSHIKI.DELETE_FLG = 0 ";
/*
        if(!empty($this->search_param)){
            $sql .=  "      AND T_SEISAN_SONOTA_HIYOU.staff_id = ".$this->search_param;
        }
        if(!empty($this->search_ym)){
            $sql .=  "      AND DATE_FORMAT(blog_datas.public_date,'%Y%m') = '".$this->search_ym."'";
        }
*/
        $order =  " ORDER BY M_SOSHIKI.UPDATE_DT DESC ";
//        $array = $this->query($sql);
//        $total = count($array);

        // ページング用SQL文字列
        $pg_sql = $this->getPagingString($sql,$order);

        $array = $this->query($pg_sql);
        $curret_count = count($array);

        $arrRes["list"] = $array;

        // ページング用
        $arrRes["current_pg"] = $this->getCurrentPg();
        $arrRes["pg_list"] = $this->getArrPgList($sql);
        $arrRes["prev"] = $this->getPgPrev();
        $arrRes["next"] = $this->getPgNext();

        //総数
        $arrRes["pg_total"] = $curret_count;
        $arrRes["rec_total"] = $this->getRecordTotal();

        $first = 1;
        $arrRes["first"] = $first;
        $arrRes["last"] = count($arrRes["pg_list"]);

        return $arrRes;
    }


}
?>