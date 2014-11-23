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
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class JuchuController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
    public $uses = array();

/**
 * 基本登録_基本登録
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function index() {

        $view = 'juchu_kazai';
        $this->render($view);

    }

/**
 * 基本登録_家財
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function kazai() {

        $view = 'juchu_kazai';
        $this->render($view);

    }

/**
 * 基本登録_基本登録
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function kihon() {

        $view = 'juchu_kihon';
        $this->render($view);

    }

/**
 * 基本登録_参照登録
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function refer() {

        $view = 'juchu_refer';
        $this->render($view);

    }

/**
 * 基本登録_指図書
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function sashizu() {

        $view = 'juchu_sashizu';
        $this->render($view);

    }

/**
 * 基本登録_写真アップロード／閲覧
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function pictup() {

        $view = 'juchu_pictup';
        $this->render($view);

    }

/**
 * 基本登録_手配
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai() {

        $view = 'juchu_tehai';
        $this->render($view);

    }

/**
 * 基本登録_重要事項相互確認
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function juyojiko_sogokakunin() {

        $view = 'juchu_juyojiko_sogokakunin';
        $this->render($view);

    }

/**
 * 基本登録_進行詳細入力
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function progress_mod() {

        $view = 'juchu_progress_mod';
        $this->render($view);

    }

/**
 * 基本登録_進行履歴管理
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function progress() {

        $view = 'juchu_progress';
        $this->render($view);

    }

/**
 * 基本登録_帳票出力
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function chouhyou() {

        $view = 'juchu_chouhyou';
        $this->render($view);

    }

/**
 * 基本登録_負担の別
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function futan() {

        $view = 'juchu_futan';
        $this->render($view);

    }

/**
 * 基本登録_料金
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function roukin() {

        $view = 'juchu_roukin';
        $this->render($view);

    }

/**
 * 基本登録_料金簡易入力
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function roukin_kanitouroku() {

        $view = 'juchu_roukin_kanitouroku';
        $this->render($view);

    }

/**
 * 手配入力(コンテナ輸送)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_container() {

        $view = 'tehai_container';
        $this->render($view);

    }

/**
 * 手配入力(その他)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_other() {

        $view = 'tehai_other';
        $this->render($view);

    }

/**
 * 手配入力(ピアノ・重量物輸送)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_piano() {

        $view = 'tehai_piano';
        $this->render($view);

    }

/**
 * 手配入力(ルーム・ハウスクリーニング)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_clean() {

        $view = 'tehai_clean';
        $this->render($view);

    }

/**
 * 手配入力(開梱・梱包)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_konpou() {

        $view = 'tehai_konpou';
        $this->render($view);

    }

/**
 * 手配入力(求車)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_kyusya() {

        $view = 'tehai_kyusya';
        $this->render($view);

    }

/**
 * 手配入力(見積・下見)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_shitami() {

        $view = 'tehai_shitami';
        $this->render($view);

    }

/**
 * 手配入力(作業依頼)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_sagyoirai() {

        $view = 'tehai_sagyoirai';
        $this->render($view);

    }

/**
 * 手配入力(資材届け・残材回収)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_todoke() {

        $view = 'tehai_todoke';
        $this->render($view);

    }

/**
 * 手配入力(自動車・バイク輸送)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_vehicle() {

        $view = 'tehai_vehicle';
        $this->render($view);

    }

/**
 * 手配入力(他センター一部依頼)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_other_center() {

        $view = 'tehai_other_center';
        $this->render($view);

    }

/**
 * 手配入力(電気工事)
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function tehai_denki() {

        $view = 'tehai_denki';
        $this->render($view);

    }

}
