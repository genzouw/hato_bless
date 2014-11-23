<?php
class M_AREA extends AppModel {

	public $useTable = 'M_AREA';
	public $primaryKey = 'AREA_CD';

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


    function getTest(){

        return $this->find('all');

    }

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

        if(!empty($data['BlogData']['public_date'])){
            $public_date = date('ymd',strtotime($data['BlogData']['public_date']));
            if($public_date > date('ymd') && $data['BlogData']['public_flg'] != 0){
                $data['BlogData']['public_flg'] = 0;
            }
        }
        if(empty($data['BlogData']['public_date']) && $data['BlogData']['public_flg'] == 1){
            $data['BlogData']['public_date'] = date('Y-m-d');
        }
        return $this->save($data);

    }

    /*
     * 削除
     */
    function del($data){
        $data['BlogData']['id'] = $data['target_id'];
        $data['BlogData']['del_flg'] = 1;
        return $this->save($data);

    }

    /*
     * 新規登録フィールドリスト
     */
    function getAddEntity(){

        $array = $this->getColumnTypes();
        $arrRes = null;
        foreach ( $array as $key => $value ) {
            $arrRes['BlogData'][$key] = null;
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
        $sql .=  "       FROM blog_datas ";
        $sql .=  " INNER JOIN staffs ";
        $sql .=  "         ON blog_datas.staff_id = staffs.id ";
        $sql .=  "      WHERE blog_datas.del_flg = 0 ";
        if(!empty($this->search_param)){
            $sql .=  "      AND blog_datas.staff_id = ".$this->search_param;
        }
        if(!empty($this->search_ym)){
            $sql .=  "      AND DATE_FORMAT(blog_datas.public_date,'%Y%m') = '".$this->search_ym."'";
        }

        $sql .=  "   ORDER BY blog_datas.public_flg DESC, blog_datas.public_date DESC ";
        $array = $this->query($sql);
        $total = count($array);

        // ページング用SQL文字列
        $pg_sql = $this->getPagingString($sql);
        $array = $this->query($pg_sql);
        $curret_count = count($array);

        $arrRes["list"] = $array;

        // ページング用
        $arrRes["current_pg"] = $this->getCurrentPg();
        $arrRes["pg_list"] = $this->getArrPgList($sql);
        $arrRes["prev"] = $this->getPgPrev();
        $arrRes["next"] = $this->getPgNext();

        //総数
        $arrRes["total"] = $total;
        $arrRes["pg_total"] = $curret_count;

        $first = 1;
        if($arrRes["current_pg"] > 1){
            $first = ($arrRes["current_pg"] - 1) * $disp_num + 1;
        }
        $arrRes["first"] = $first;

        $last = $first + $curret_count - 1;
        $arrRes["last"] = $last;

        return $arrRes;
    }

    /*
     * 投稿者リスト
     */
    function getStaff(){

        // SQL処理
        $sql =  "";
        $sql .=  "     SELECT staffs.id ";
        $sql .=  "          , staffs.family_name ";
        $sql .=  "          , staffs.first_name ";
        $sql .=  "       FROM blog_datas ";
        $sql .=  " INNER JOIN staffs ";
        $sql .=  "         ON blog_datas.staff_id = staffs.id ";
        $sql .=  "      WHERE blog_datas.del_flg = 0 ";
        $sql .=  "   GROUP BY blog_datas.staff_id ";
        $sql .=  "   ORDER BY staffs.sort ";
        $array = $this->query($sql);

        return $array;
    }

    /*
     * 年月リスト
     */
    function getYearMonth(){

        // SQL処理
        $sql =  "";
        $sql .=  "     SELECT DATE_FORMAT(blog_datas.public_date,'%Y') AS y ";
        $sql .=  "          , DATE_FORMAT(blog_datas.public_date,'%m') AS m ";
        $sql .=  "          , count(id) AS cnt ";
        $sql .=  "       FROM blog_datas ";
        $sql .=  "      WHERE blog_datas.del_flg = 0 ";
        $sql .=  "   GROUP BY DATE_FORMAT(blog_datas.public_date,'%Y.%m') ";
        $sql .=  "   ORDER BY DATE_FORMAT(blog_datas.public_date,'%Y.%m') DESC ";
        $array = $this->query($sql);

        return $array;
    }

    /*
     * ブログ記事本体
     */
    function getArticleById($id){

        $this->bindModel(array('belongsTo' => array('Staff')));
        return $this->find('first',array('conditions' => array('BlogData.del_flg' => 0,'BlogData.id' => $id)));

    }

    /*
     * ブログ前ページ
     */
    function getPrevById($id){

        return $this->find('first',array('conditions' => array('BlogData.del_flg' => 0,'BlogData.id < ' => $id),'order' => 'BlogData.id DESC'));

    }

    /*
     * ブログ次ページ
     */
    function getNextById($id){

        return $this->find('first',array('conditions' => array('BlogData.del_flg' => 0,'BlogData.id > ' => $id)));

    }

    /*
     * ブログ新着情報
     */
    function getNewEntity($limit = 4){

        $this->bindModel(array('belongsTo' => array('Staff')));
        return $this->find('all',array('conditions' => array('BlogData.del_flg' => 0),'order' => 'BlogData.public_date DESC','limit' =>$limit));

    }

    /*
     * ブログ新着情報
     */
    function getOneByStaff($id){

        return $this->find('first',array('conditions' => array('BlogData.del_flg' => 0,'BlogData.public_flg' => 1,'BlogData.staff_id' => $id),'order' => 'BlogData.public_date DESC'));

    }

}
?>