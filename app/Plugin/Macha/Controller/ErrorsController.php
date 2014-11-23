<?php
App::uses('AppMachaController', 'Macha.Controller');

/**
 * Matcha-SNS
 *
 * @copyright ICZ Corporation (http://www.icz.co.jp/)
 * @license See the LICENCE file
 * @author
 *
 * @version $Id$
 */
/**
 * メンテナンス画面、IPホスト禁止画面
 *
 * @author 作成者
 */
class ErrorsController extends AppMachaController
{

    /**
     * コントローラの名前を指定
     *
     * @var String
     * @access public
     */
    public $name = "Errors";

    /**
     * 使用するモデルのクラス名を配列で指定
     *
     * @var array
     * @access public
     */
    public $uses = array(
        "Macha.User"
    );

    /**
     * レイアウトファイル名を指定
     *
     * @var String
     * @access public
     */
    public $layout = 'login_layout';

    /**
     * コントローラのアクション前に実行
     *
     * @return void
     * @access public
     * @author 作成者
     */
    public function beforeFilter()
    {
        $this->Auth->autoRedirect = false;
        $this->Auth->allow('index', 'sorry');
    }

    /**
     * エラー画面表示
     *
     * エラー画面を表示する
     *
     * @param null $params
     * @return void
     * @access public
     * @author 作成者
     */
    public function index($params = null)
    {
        if ($params == 'mainte') {
            $this->set('title', Configure::read('MAINTENANCE_TITLE'));
            $this->set('message', Configure::read('MAINTENANCE_MESSAGE'));
            $this->Render('index');
        } elseif ($params == 'iphost') {
            $this->set('title', Configure::read('IPHOST_TITLE'));
            $this->set('message', Configure::read('IPHOST_MESSAGEMAIL_TEXT_PASSWORD_EDITMAIL_TEXT_PASSWORD_EDIT'));
            $this->Render('sorry');
        } else {
            $this->redirect("/homes");
        }
    }
}
