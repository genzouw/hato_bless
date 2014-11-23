<?php
class NO_TABLE extends AppModel
{

    public $useTable = false;

    /*
     * 入力値検証
     */

    /*
     * 新規登録フィールドリスト
     */
    function getAddEntity()
    {

        $arrRes = null;
        for ($i = 0; $i < 20; $i++) {
            $arrRes['NO_TABLE']['FIELD' . $i] = '';
        }
        return $arrRes;

    }


}

?>