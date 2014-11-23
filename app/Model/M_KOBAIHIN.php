<?php
class M_KOBAIHIN extends AppModel {

    public $useTable = 'M_KOBAIHIN';
    public $primaryKey = array('ID','SOSHIKI_CD','KOBAI_CD','GAIBU_GYOSHA_CD');

/*
SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[M_KOBAIHIN](
    [SOSHIKI_CD] [char](5) NOT NULL,
    [KOBAI_CD] [char](11) NOT NULL,
    [GAIBU_GYOSHA_CD] [char](9) NOT NULL,
    [HANBAISAKI_SOSHIKI_CD] [char](5) NULL,
    [KOBAI_BUNRUI_MEI] [varchar](20) NULL,
    [KOBAI_MEI] [varchar](40) NULL,
    [KOBAI_RYAKU_MEI] [varchar](20) NULL,
    [KOBAI_KANA_MEI] [varchar](40) NULL,
    [KOBAI_SURYO_TANI] [varchar](6) NULL,
    [SHIIRE_TANKA_GK] [decimal](10, 2) NULL CONSTRAINT [DF_M_KOBAIHIN_SHIIRE_TANKA_GK]  DEFAULT (0),
    [SHIIRESAKI_MAIL_ADRS] [varchar](100) NULL,
    [SHIIRESAKI_TEL_NO] [char](20) NULL,
    [SHIIRESAKI_FAX_NO] [char](20) NULL,
    [SHIIRESAKI_MATOME_SU] [int] NULL,
    [SHIIRESAKI_MATOME_GK] [decimal](10, 0) NULL,
    [HANBAI_TANKA_GK] [decimal](10, 2) NULL CONSTRAINT [DF_M_KOBAIHIN_HANBAI_TANKA_GK]  DEFAULT (0),
    [MIN_LOT_SU] [int] NULL,
    [HANBAISAKI_TEL_NO] [char](20) NULL,
    [HANBAISAKI_FAX_NO] [char](20) NULL,
    [HANBAI_MATOME_SU] [int] NULL,
    [HANBAI_MATOME_GK] [decimal](10, 0) NULL,
    [SONOTA_KINGAKU_MEI] [varchar](40) NULL,
    [SONITA_KINGAKU_GK] [decimal](10, 0) NULL,
    [HANBAI_TESURYO_RT] [decimal](5, 2) NULL,
    [JISHA_KOBAI_CD] [char](20) NULL,
    [TASOSHIKI_KOBAI_CD] [char](11) NULL CONSTRAINT [DF_M_KOBAIHIN_TASOSHIKI_KOBAI_CD]  DEFAULT (' '),
    [REMARKS] [varchar](200) NULL,
    [UPDATE_DT] [char](17) NULL,
    [UPDATE_TNT_ID] [char](10) NULL,
    [GAMEN_ID] [char](6) NULL,
    [DELETE_FLG] [char](1) NOT NULL CONSTRAINT [DF_M_KOBAIHIN_DELETE_FLG]  DEFAULT ('0'),
 CONSTRAINT [PK_M_KOBAIHIN] PRIMARY KEY CLUSTERED
(
    [SOSHIKI_CD] ASC,
    [KOBAI_CD] ASC,
    [GAIBU_GYOSHA_CD] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, FILLFACTOR = 85) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
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
        $data['M_KOBAIHIN']['id'] = $data['target_id'];
        $data['M_KOBAIHIN']['del_flg'] = 1;
        return $this->save($data);

    }

    /*
     * 新規登録フィールドリスト
     */
    function getAddEntity(){

        $array = $this->getColumnTypes();
        $arrRes['M_KOBAIHIN']['ID'] = null;
        foreach ( $array as $key => $value ) {
            $arrRes['M_KOBAIHIN'][$key] = null;
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
        $sql .=  "       FROM M_KOBAIHIN ";
        $sql .=  "      WHERE M_KOBAIHIN.DELETE_FLG = 0 ";
/*
        if(!empty($this->search_param)){
            $sql .=  "      AND T_SEISAN_SONOTA_HIYOU.staff_id = ".$this->search_param;
        }
        if(!empty($this->search_ym)){
            $sql .=  "      AND DATE_FORMAT(blog_datas.public_date,'%Y%m') = '".$this->search_ym."'";
        }
*/
        $order =  " ORDER BY M_KOBAIHIN.UPDATE_DT DESC ";
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