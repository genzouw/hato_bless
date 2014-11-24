<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright         Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link                    http://cakephp.org CakePHP(tm) Project
 * @package             app.Controller
 * @since                 CakePHP(tm) v 0.2.9
 * @license             http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package             app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class SeisanController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
    public $uses = array('T_SEISAN_SONOTA_HIYOU','T_SEISAN_TEIGAKU','M_KOBAIHIN','T_JUCHU_HOJO','T_SEISAN_MEISAI','T_SEISAN_JUCHU','T_SEISAN_HACHU',
                            'M_SOSHIKI','NO_TABLE' );
    public $helpers = array('Form', 'Html', 'Paging');

    public function beforeFilter() {
        parent::beforeFilter();

        // MOTO_SOSHIKI_CDとSAKI_SOSHIKI_CDはセッションで保持？
        $moto_soshiki_cd = '00000';
        $this->arrMotoSoshiki = $this->M_SOSHIKI->getOneEntityBySoshikiCd($moto_soshiki_cd);
        $this->set('arrMotoSoshiki',$this->arrMotoSoshiki);

        $this->saki_soshiki_cd = '00100';

    }

    public function index() {

        $this->redirect('/seisan/syokai');

    }

/**
 * center_seikyu a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function center_seikyu() {

        // 登録・更新
        if ($this->request->is('post') or $this->request->is('put')) {
            // CSV出力処理
            /*
            if($this->T_SEISAN_SONOTA_HIYOU->save($this->request->data)) {
                if(empty($id)) $id = $this->T_SEISAN_SONOTA_HIYOU->getLastInsertID();
                    $this->Session->setFlash('正常にダウンロードを完了しました。', 'default', array('class' => 'caution'));
                    return $this->redirect('/seisan/');
                }else{
                    $this->Session->setFlash('エラーが発生しました', 'default', array('class' => 'caution'));
                }*/
            return $this->redirect('/seisan/center_seikyu');
        }

        $view = 'seisan_center_seikyu';
        $this->render($view);

    }

/**
 * 精算CSV出力
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function csv() {

        $view = 'seisan_csv';
        $this->render($view);

    }

/**
 * 代金回収結果取込
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function daikinkaisyu() {
        echo "daikinkaisyu";
        $view = 'seisan_daikinkaisyu';
        $this->render($view);

    }

/**
 * 精算引落情報作成
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function hikiotoshi() {

        $view = 'seisan_hikiotoshi';
        $this->render($view);

    }

/**
 * 費用項目マスタ検索
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function hiyokoumoku() {

        $view = 'seisan_hiyokoumoku';

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->T_JUCHU_HOJO->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $this->set('pg_url','/seisan/hiyokoumoku/');

        $this->render($view);

    }

/**
 * 費用項目マスタ登録
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function hiyokoumoku_mod() {

        $view = 'seisan_hiyokoumoku_mod';
        $this->render($view);

    }

/**
 * 受注法人一覧
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function juchu_houjin() {

        $view = 'seisan_juchu_houjin';

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->T_JUCHU_HOJO->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $this->set('pg_url','/seisan/juchu_houjin/');

        $this->render($view);

    }

/**
 * 精算対象受注検索一覧
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function juchukensaku() {

        $this->layout = 'popup';

        $view = 'seisan_juchukensaku';

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->T_SEISAN_JUCHU->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $this->set('pg_url','/seisan/juchukensaku/');

        $this->render($view);

    }

/**
 * 確定取消
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function kakuteitorikeshi() {

        $view = 'seisan_kakuteitorikeshi';

        // 登録・更新・検索
        if ($this->request->is('post') or $this->request->is('put')) {

            // 登録・更新処理
            if($this->T_SEISAN_SONOTA_HIYOU->save($this->request->data)) {
                if(empty($id)) $id = $this->T_SEISAN_SONOTA_HIYOU->getLastInsertID();
                    $this->Session->setFlash('更新しました', 'default', array('class' => 'caution'));
                    return $this->redirect('/seisan/');
                }else{
                    $this->Session->setFlash('エラーが発生しました', 'default', array('class' => 'caution'));
                }
        }

        if(empty($id)){
            // 新規登録フォーム
            $arrData = $this->T_SEISAN_SONOTA_HIYOU->getAddEntity();
        } else {
            // 詳細表示
            $arrData = $this->T_SEISAN_SONOTA_HIYOU->getOneEntityById($id);
        }

        $this->set('arrData',$arrData);

        $this->render($view);

    }

/**
 * 精算明細情報照会(受注)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function meisai_juchu() {

        $view = 'seisan_meisai_juchu';

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->T_SEISAN_JUCHU->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $this->set('pg_url','/seisan/meisai_juchu/');

        $this->render($view);

    }

/**
 * 精算明細情報照会(固定費)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function meisai_kotei() {

        $view = 'seisan_meisai_kotei';

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->T_SEISAN_MEISAI->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $this->set('pg_url','/seisan/meisai_kotei/');

        $this->render($view);

    }

/**
 * 精算明細情報照会(資材発注)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function meisai_shizai() {

        $view = 'seisan_meisai_shizai';

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->T_SEISAN_HACHU->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $this->set('pg_url','/seisan/meisai_shizai/');

        $this->render($view);

    }

/**
 * 精算明細情報照会(随時)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function meisai_zuiji() {

        $view = 'seisan_meisai_zuiji';

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->T_SEISAN_MEISAI->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $this->set('pg_url','/seisan/meisai_shizai/');

        $this->render($view);

    }

/**
 * 月額固定費用検索
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function month_hiyo() {

        $view = 'seisan_month_hiyo';

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->T_SEISAN_TEIGAKU->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $this->set('pg_url','/seisan/month_hiyo/');

        $this->render($view);

    }

/**
 * 月額固定費用登録
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function month_hiyo_mod() {

        $view = 'seisan_month_hiyo_mod';

        // 登録・更新
        if ($this->request->is('post') or $this->request->is('put')) {

            // 登録・更新処理
            if($this->T_SEISAN_TEIGAKU->save($this->request->data)) {
                if(empty($id)) $id = $this->T_SEISAN_TEIGAKU->getLastInsertID();
                    $this->Session->setFlash('更新しました', 'default', array('class' => 'caution'));
                    return $this->redirect('/seisan/seisan_month_hiyo_mod/');
                }else{
                    $this->Session->setFlash('エラーが発生しました', 'default', array('class' => 'caution'));
                }
        }

        if(empty($id)){
            // 新規登録フォーム
            $arrData = $this->T_SEISAN_TEIGAKU->getAddEntity();
        } else {
            // 詳細表示
            $arrData = $this->T_SEISAN_TEIGAKU->getOneEntityById($id);
        }

        $this->set('arrData',$arrData);

        $this->render($view);

    }

/**
 * 月額固定費用料金詳細
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function month_hiyo_syosai() {

        $view = 'seisan_month_hiyo_syosai';

        // 登録・更新
        if ($this->request->is('post') or $this->request->is('put')) {

            // 登録・更新処理
            if($this->T_SEISAN_TEIGAKU->save($this->request->data)) {
                if(empty($id)) $id = $this->T_SEISAN_TEIGAKU->getLastInsertID();
                    $this->Session->setFlash('更新しました', 'default', array('class' => 'caution'));
                    return $this->redirect('/seisan/');
                }else{
                    $this->Session->setFlash('エラーが発生しました', 'default', array('class' => 'caution'));
                }
        }

        if(empty($id)){
            // 新規登録フォーム
            $arrData = $this->T_SEISAN_TEIGAKU->getAddEntity();
        } else {
            // 詳細表示
            $arrData = $this->T_SEISAN_TEIGAKU->getOneEntityById($id);
        }

        $this->render($view);

    }

/**
 * 画面名：その他随時費用検索
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function other_zuiji() {

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->T_SEISAN_SONOTA_HIYOU->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $this->set('pg_url','/seisan/other_zuiji/');

        $view = 'seisan_other_zuiji';
        $this->render($view);

    }

/**
 * その他随時費用料金詳細
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function other_zuji_syosai($id = null) {

        $this->layout = 'popup';
        $view = 'seisan_other_zuji_syosai';

        // 登録・更新
        if ($this->request->is('post') or $this->request->is('put')) {

            // 登録・更新処理
            if($this->T_SEISAN_SONOTA_HIYOU->save($this->request->data)) {
                if(empty($id)) $id = $this->T_SEISAN_SONOTA_HIYOU->getLastInsertID();
                    $this->Session->setFlash('更新しました', 'default', array('class' => 'caution'));
                    return $this->redirect('/seisan/');
                }else{
                    $this->Session->setFlash('エラーが発生しました', 'default', array('class' => 'caution'));
                }
        }

        if(empty($id)){
            // 新規登録フォーム
            $arrData = $this->T_SEISAN_SONOTA_HIYOU->getAddEntity();
        } else {
            // 詳細表示
            $arrData = $this->T_SEISAN_SONOTA_HIYOU->getOneEntityById($id);
        }

        $this->set('arrData',$arrData);

        $this->render($view);

    }

/**
 * 資材発注購買品一覧
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function shizai_list() {

        $view = 'seisan_shizai_list';

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->M_KOBAIHIN->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $this->set('pg_url','/seisan/shizai_list/');

        $this->render($view);

    }

/**
 * 精算照会
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function syokai() {

        $view = 'seisan_syokai';

        $pgnum = 1;
        if(isset($this->request->query['pg'])){
            $pgnum = $this->request->query['pg'];
        }

        $disp_num = 20;
        $arrData = $this->T_SEISAN_MEISAI->getPagingEntity($disp_num,$pgnum);
        $this->set('arrData',$arrData);

        $arrSearch['seisan_dt'] = date('Ym');
        $this->set('arrSearch',$arrSearch);

        $this->render($view);

    }

/**
 * その他随時費用登録
 * @TODO 機能不明
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function other_zuiji_mod($id = null) {

       // 登録・更新
        if ($this->request->is('post') or $this->request->is('put')) {

            // 登録・更新処理
            if($this->T_SEISAN_SONOTA_HIYOU->save($this->request->data)) {
                if(empty($id)) $id = $this->T_SEISAN_SONOTA_HIYOU->getLastInsertID();
                    $this->Session->setFlash('更新しました', 'default', array('class' => 'caution'));
                    return $this->redirect('/seisan/');
                }else{
                    $this->Session->setFlash('エラーが発生しました', 'default', array('class' => 'caution'));
                }
        }

        if(empty($id)){
            // 新規登録フォーム
            $arrData = $this->T_SEISAN_SONOTA_HIYOU->getAddEntity();
        } else {
            // 詳細表示
            $arrData = $this->T_SEISAN_SONOTA_HIYOU->getOneEntityById($id);
        }

        $this->set('arrData',$arrData);

        $view = 'seisan_other_zuiji_mod';
        $this->render($view);

    }

}
