<?php
class T_SEISAN_HACHU extends AppModel {

    public $useTable = 'T_SEISAN_HACHU';
    public $primaryKey = array('SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','UKETSUKE_NO','SEIKYU_SIHARAI_CD','KOBAI_CD');

    /*
     * 入力値検証
     */

/*
    public $validate = array(

        'staff_id' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須入力です',
            ),
        ),
        'category' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須入力です',
            ),
        ),
        'title' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須入力です',
            ),
            'maxLength' => array(
                'rule' => array('maxLength',25),
                'message' => '全角25文字以下です',
            ),
        ),
        'body01' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須入力です',
            ),
            'maxLength' => array(
                'rule' => array('maxLength',1000),
                'message' => '全角1000文字以下です',
            ),
        ),
        'body02' => array(
            'maxLength' => array(
                'rule' => array('maxLength',1000),
                'allowEmpty' => true,
                'message' => '全角1000文字以下です',
            ),
        ),
        'body03' => array(
            'maxLength' => array(
                'rule' => array('maxLength',1000),
                'allowEmpty' => true,
                'message' => '全角1000文字以下です',
            ),
        ),
        'body04' => array(
            'maxLength' => array(
                'rule' => array('maxLength',1000),
                'allowEmpty' => true,
                'message' => '全角1000文字以下です',
            ),
        ),
        'body05' => array(
            'maxLength' => array(
                'rule' => array('maxLength',1000),
                'allowEmpty' => true,
                'message' => '全角1000文字以下です',
            ),
        ),
        'public_date' => array(
            'date' => array(
                'rule' => array('date'),
                'message' => '日付形式で入力して下さい。',
            ),
        ),
        'public_flg' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須入力です',
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
        $data['T_SEISAN_HACHU']['id'] = $data['target_id'];
        $data['T_SEISAN_HACHU']['del_flg'] = 1;
        return $this->save($data);

    }

    /*
     * 新規登録フィールドリスト
     */
    function getAddEntity(){

        $array = $this->getColumnTypes();
        $arrRes = null;
        foreach ( $array as $key => $value ) {
            $arrRes['T_SEISAN_HACHU'][$key] = null;
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
        $sql .=  "       FROM T_SEISAN_HACHU ";
        $sql .=  "      WHERE T_SEISAN_HACHU.DELETE_FLG = 0 ";
/*
        if(!empty($this->search_param)){
            $sql .=  "      AND T_SEISAN_SONOTA_HIYOU.staff_id = ".$this->search_param;
        }
        if(!empty($this->search_ym)){
            $sql .=  "      AND DATE_FORMAT(blog_datas.public_date,'%Y%m') = '".$this->search_ym."'";
        }
*/
        $order =  " ORDER BY T_SEISAN_HACHU.UPDATE_DT DESC ";
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