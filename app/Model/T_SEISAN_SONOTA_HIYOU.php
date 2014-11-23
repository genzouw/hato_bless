<?php
class T_SEISAN_SONOTA_HIYOU extends AppModel {

    public $useTable = 'T_SEISAN_SONOTA_HIYOU';
    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');

    /*
     * 入力値検証
     */

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
        $data['T_SEISAN_SONOTA_HIYOU']['id'] = $data['target_id'];
        $data['T_SEISAN_SONOTA_HIYOU']['del_flg'] = 1;
        return $this->save($data);

    }

    /*
     * 新規登録フィールドリスト
     */
    function getAddEntity(){

        $array = $this->getColumnTypes();
        $arrRes['T_SEISAN_SONOTA_HIYOU']['ID'] = null;
        foreach ( $array as $key => $value ) {
            $arrRes['T_SEISAN_SONOTA_HIYOU'][$key] = null;
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
        $sql .=  "       FROM T_SEISAN_SONOTA_HIYOU ";
        $sql .=  "      WHERE T_SEISAN_SONOTA_HIYOU.DELETE_FLG = 0 ";
/*
        if(!empty($this->search_param)){
            $sql .=  "      AND T_SEISAN_SONOTA_HIYOU.staff_id = ".$this->search_param;
        }
        if(!empty($this->search_ym)){
            $sql .=  "      AND DATE_FORMAT(blog_datas.public_date,'%Y%m') = '".$this->search_ym."'";
        }
*/
        $order =  " ORDER BY T_SEISAN_SONOTA_HIYOU.UPDATE_DT DESC ";
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