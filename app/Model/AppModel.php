<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    /**
     * ページング処理
     */

    var $pgnum = 0;
    var $disp_num = 0;
    var $max_num = 0;
    var $table_name = null;
    var $pg_total = 0;

    function setDispNum($disp_num) {
        $this->disp_num = $disp_num;
    }

    function setPgNum($pgnum) {
        $this->pgnum = $pgnum;
    }

    function getPagingString($sql_string,$order,$group = null) {
        // ページング処理
        if($this->pgnum > 1){
            $start = ( $this->pgnum - 1 ) * $this->disp_num;
        }else{
            $start = 0;
        }

        if($_SERVER['SERVER_NAME'] != '153.127.242.54'){
            $sql =  " SELECT * ";
            $sql .= "   FROM ( SELECT ROW_NUMBER() OVER( $order ) AS rownum , ".str_replace('SELECT','',$sql_string)." ) as TBL ";
            $sql .= "  WHERE rownum BETWEEN $start AND ".$this->disp_num." ";
        }else{
            $sql_string .=  " LIMIT $start ,".$this->disp_num." ";
            $sql = $sql_string;
        }
        return $sql;
    }

    /*
     * ページング前項
    */
    function getPgPrev(){
        $pg = 0;
        if($this->pgnum > 0) $pg = $this->pgnum - 1;
        return $pg;
    }

    /*
     * ページング次項
    */
    function getPgNext(){
        $pg = 2;
        if($this->pgnum > 0) $pg = $this->pgnum + 1;
        if($this->pgnum >= $this->max_num ) $pg = 0;
        return $pg;
    }

    /*
     * ページング総数
    */
    function getArrPgList($sql){

        $sql_string = str_replace("SELECT * ","SELECT COUNT(*) as CNT ",$sql);
        $array = $this->query($sql_string);
        $cnt = $array[0][0]['CNT'];
        $this->rec_total = $cnt;
        $plus = $cnt % $this->disp_num;
        $max_num = ($cnt - $plus) / $this->disp_num;
        if($plus > 0){
            $max_num = $max_num + 1;
        }
        $this->max_num = $max_num;
        $array = array();
        for($i=0;$i < $max_num;$i++){
            $array[$i] = $i + 1;
        }

        return $array;
    }

    /*
     * レコード総数
    */
    function getRecordTotal(){
        return $this->rec_total;
    }

    /*
     * ページング現在のPG
    */
    function getCurrentPg(){
        $current_pg = 1;
        if(!is_numeric($this->pgnum)) $this->pgnum = 1;
        if($this->pgnum > 0) $current_pg = $this->pgnum;
        return $current_pg;
    }

}
