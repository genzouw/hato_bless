<?php
class COMMON extends AppModel {

    public $useTable = false;
//    public $primaryKey = array('ID','SEIKYU_YM','MOTO_SOSHIKI_CD','SAKI_SOSHIKI_CD','SEIKYU_SIHARAI_CD','HIYOKOMOKU_CD');


    /*
     * リスト
     */
    function DCF0041(){

        $result = "UPDATE M_KOBAIHIN SET     DELETE_FLG = '1' WHERE (SOSHIKI_CD = '{0}') AND (KOBAI_CD = '{1}') AND (GAIBU_GYOSHA_CD = '{2}')";

    }

    function DCF0410(){

        $result = "DELETE FROM T_SHIZAI_HACHU WHERE (HACHU_NO = '{0}')";

    }

    function DCF0411(){

        $result = "UPDATE T_SHIZAI_HACHU SET DELETE_FLG = '1' WHERE (HACHU_NO = '{0}')";

    }

    function DCF0412(){

        $result = "DELETE FROM T_SHIZAI_HACHU  WHERE HACHU_NO = '{0}' ";

    }

    function DCF0413(){

        $result = "UPDATE T_SHIZAI_HACHU SET DELETE_FLG = '1' WHERE (SEIKYUMOTO_CD = '{0}')  AND (GYOSHA_CD = '{1}')  AND (SOFU_DT = '{2}')  AND (SOFU_NO = '{3}')";

    }

}
?>