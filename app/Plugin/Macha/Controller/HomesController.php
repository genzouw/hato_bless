<?php

/**
 * Matcha-SNS
 *
 * @copyright ICZ Corporation (http://www.icz.co.jp/)
 * @license See the LICENCE file
 * @author
 *
 * @version $Id$
 */
App::uses('AppMachaController', 'Macha.Controller');

/**
 * ホーム用のコントローラクラス
 *
 * @author 作成者
 */
class HomesController extends AppMachaController
{

    /**
     * コントローラの名前を指定
     *
     * @var String
     * @access public
     */
    public $name = "Home";

    /**
     * 使用するモデルのクラス名を配列で指定
     *
     * @var array
     * @access public
     */
    public $uses = array(
        "Macha.Home",
        "Macha.Timeline",
        'Macha.Storage',
        'Macha.Group',
        'Macha.Read',
        'Macha.Watch',
        'Macha.Friend',
        'Macha.Join',
        'Macha.Notice',
        'Macha.User'
    );

    /**
     * 自動レンダリングをするかどうか指定
     *
     * @var boolean
     * @access public
     */
    public $autoLayout = true;

    /**
     * ページネーションの初期設定
     *
     * @var array
     * @access public
     */
    public $paginate = array(
        'page' => 1,
        'conditions' => array(),
        'sort' => '',
        'limit' => 20,
        'order' => 'Timeline.LAST_DATE DESC',
        'recursive' => 0
    );

    /**
     * タブ名
     *
     * @var unknown
     * @access public
     */
    public $tab_name;

    /**
     * レイアウト
     *
     * @var unknown
     * @access public
     */
    public $layout = 'sns';


    /**
     * タイムライン表示
     *
     * タイムラインを表示する
     *
     * @return void
     * @access public
     * @author 作成者
     */
    public function index()
    {
        // タイムライン画面トップページ
        $this->set("main_title", "タイムライン");
        $this->set("title_text", "タイムライン");

        // 追加
        $tab_name = 'FOLLOW';
        $this->set("tab_name", $tab_name);

        // 初期化
        $list = array();
        // $this->user2 = $this->Auth->User();

        $mon = date("m");
        $year = date("Y");
        $day = date("d");
        $calender = array(
            "mon" => $mon,
            "year" => $year,
            "day" => $day
        );
//        CakeSession::write('calender', -1);
//        $select = CakeSession::write('select');

        // セット
        $tab_name = 'FOLLOW';
        $this->set("tab_name", $tab_name);

        // 投稿の場合
        if ($this->checkPost()) {
            $this->Timeline->validates();

            if ($this->requestAction('/timelines/message')) {
                // 成功した場合、ページを再表示させる
                $this->redirect(Router::url(null, true));
            }
        }
        $conditions = array();
        // タイムラインの取得
        if (!empty($this->user)) {
            if (!empty($this->user['User']['GRP_ID'])) {
                $conditions = $this->Home->Get_Timeline($this->user, $this->user['User']['GRP_ID'], null, null, 1);
            }
        }
        $list = $this->paginate('Timeline', $conditions);

        // コメントの取得
        $this->Timeline->Comment_Search($list);
        if (isset($list[0])) {
            $this->set("first", $list[0]['Timeline']['TML_ID']);
            $this->set("lastid", $list[count($list) - 1]['Timeline']['TML_ID']);
            $this->set("lastdate", $list[count($list) - 1]['Timeline']['LAST_DATE']);
        } else {
            $this->set("first", 0);
        }

        // お気に入りとウォッチリストの取得
        $this->Read->Read_Search($list, $this->user);
        $this->Watch->Watch_Search($list, $this->user);

        // カレンダー日付にデータがあるか検証
        for ($i = 1; $i < $this->month_days($calender['mon'], $calender['year']) + 1; $i++) {
            $conditions_tmp = array_merge($conditions, array(
                'and' => array(
                    'Timeline.INSERT_DATE LIKE' => "%" . $calender['year'] . "-" . $calender['mon'] . "-" . sprintf('%02d', $i) . "%"
                )
            ));
            $is_data[$i] = $this->Timeline->find('first', array(
                'conditions' => $conditions_tmp
            ));
        }

        // グループ情報の取得
        $this->paginate = $this->Group->Search_Group($this->user['User']['USR_ID'], null, array(
            0,
            1,
            2
        ), 5);

        $group = $this->paginate('Group');
        $count = $this->Join->find('count', array(
            'conditions' => array(
                'Join.USR_ID' => $this->user['User']['USR_ID'],
                'Join.STATUS' => array(
                    Join::STATUS_JOINED,
                    JOIN::STATUS_ADMINISTRATOR
                )
            )
        ));
        $group[0]['Count'] = $count;
        $belong = array(
            'belongsTo' => array(
                'Administrator' => array(
                    'className' => 'Administrator',
                    'conditions' => array(
                        'Administrator.STATUS' => User::STATUS_ENABLED
                    ),
                    'order' => '',
                    'dependent' => true,
                    'foreignKey' => 'F_USR_ID'
                )
            )
        );

        // フォロー－しているユーザの取得
        $this->paginate = $this->Friend->Get_Friend_Status($this->user['User']['USR_ID'], false, 's', 6);

        $following_user = $this->paginate('Friend');
        $this->Friend->bindModel($belong);
        $count = $this->Friend->find('count', array(
            'conditions' => array(
                'Friend.USR_ID' => $this->user['User']['USR_ID'],
                'Administrator.STATUS' => User::STATUS_ENABLED
            )
        ));

        $following_user[0]['Count'] = $count;
        $belong['belongsTo']['Administrator']['foreignKey'] = 'USR_ID';

        // フォローされているユーザの取得
        $this->paginate = $this->Friend->Get_Friend_Status($this->user['User']['USR_ID'], false, 'r', 6);
        $follower_user = $this->paginate('Friend');
        $this->Friend->bindModel($belong);
        $count = $this->Friend->find('count', array(
            'conditions' => array(
                'Friend.F_USR_ID' => $this->user['User']['USR_ID'],
                'Administrator.STATUS' => User::STATUS_ENABLED
            )
        ));

        $follower_user[0]['Count'] = $count;

        // セット
        $this->set("following_user", $following_user);
        $this->set("follower_user", $follower_user);
        $this->set("select", array(
            'order' => -1,
            'while' => -1,
            'tab_name' => 'FOLLOW'
        ));
        $this->set("date_frag", isset($this->params['pass'][0]) && $this->params['pass'][0] == 'calender' ? 0 : 1);
        $this->set("calender", $calender);
        $this->set("is_data", $is_data);
        $this->set("read_page", 1);
        $this->set("group", $group);
        $this->set("list", $list);
        $this->set("user", $this->user);
        $this->set("groupid", $this->user['User']['GRP_ID']);
        $this->set("m_class", 'Home');

    }

    /**
     * タイムライン1件表示
     *
     * 一件分だけ表示する
     *
     * @return void
     * @access public
     * @author 作成者
     */
    public function one()
    {

        // タイムライン画面トップページ
        $this->set("main_title", "タイムライン");
        $this->set("title_text", "タイムライン");

        // 初期化
        $list = array();

        $this->user = null;

        if (!isset($this->params['pass'][0])) {
            $this->redirect('/homes');
        }

        $tmlid = $this->params['pass'][0];

        // 存在チェック
        if ($this->Timeline->existsID($tmlid)) {
            $this->Timeline->find("first", array(
                "conditions" => array(
                    "TML_ID" => $tmlid
                )
            ));
        } else {
            $this->redirect('/homes');
        }

        $this->Permission->allowReader($tmlid);
        $this->Permission->allowAdmin();

        if ($this->Permission->isAllowed($this->user['User']['USR_ID'])) {
            $ret = $this->Notice->find('all', array(
                'fields' => 'Notice.NTC_ID',
                'conditions' => array(
                    'Notice.TML_ID' => $tmlid,
                    'Notice.USR_ID' => $this->user['User']['USR_ID'],
                    'Notice.STATUS' => 0
                )
            ));

            $tmp = array();
            foreach ($ret as $key => $val) {
                $tmp[$key]['NTC_ID'] = $val['Notice']['NTC_ID'];
                $tmp[$key]['STATUS'] = 1;
            }

            $this->Notice->saveAll($tmp);
            $this->set("notice", $this->Notice->Get_Notice($this->Auth->user()));
        } else {
            $this->Session->setFlash('権限がありません');
            $this->redirect('/homes');
        }

        // タイムラインの取得
        $conditions = $this->Home->Get_Timeline($this->user, $this->user['User']['GRP_ID'], null, $tmlid, 4);
        $list = $this->paginate('Timeline', $conditions, array());

        // コメントの取得
        $this->Timeline->Comment_Search($list);

        if (isset($list[0])) {
            $this->set("first", $list[0]['Timeline']['TML_ID']);
            $this->set("lastid", $list[count($list) - 1]['Timeline']['TML_ID']);
            $this->set("lastdate", $list[count($list) - 1]['Timeline']['LAST_DATE']);
        } else {
            $this->set("first", 0);
        }

        // お気に入りとウォッチリストの取得
        $this->Read->Read_Search($list, $this->user);
        $this->Watch->Watch_Search($list, $this->user);

        // セット
        $this->set("list", $list);
    }

    /**
     * 通知メッセージ
     *
     * 通知メッセージ
     *
     * @return void
     * @access public
     * @author 作成者
     */
    public function notice()
    {
        $this->user = null;

        // 一括既読機能
        if ($this->checkPost()) {

            if ($this->data['Action']['read'] == 0) {

                // 選択されたものを既読にする
                $read_notice = array();
                $i = 0;
                if (isset($this->data['Notice'])) {
                    foreach ($this->data['Notice'] as $key => $val) {

                        if ($val != 0) {
                            $this->Permission->clearList();
                            $this->Permission->allowOwner('Notice', $val);
                            if ($this->Permission->isAllowed($this->user['User']['USR_ID']) && $this->Notice->existsID($val)) {
                                $read_notice[$i]['NTC_ID'] = $val;
                                $read_notice[$i]['STATUS'] = 1;
                                $i++;
                            }
                        }
                    }
                }

                $this->Notice->saveAll($read_notice);
            } else {

                // ログインユーザの未読通知をすべて既読にする
                $this->Notice->updateAll(array(
                    'Notice.STATUS' => 1
                ), array(
                    'Notice.USR_ID' => $this->user['User']['USR_ID'],
                    'Notice.STATUS' => 0
                ));
            }

            $this->set("notice", $this->Notice->Get_Notice($this->user));
        }

        // 通知メッセージ画面
        $this->set("main_title", "通知メッセージ");
        $this->paginate = array(
            'Notice' => array(
                "fields" => array(
                    '*'
                ),
                'limit' => 30,
                'joins' => array(),
                'order' => 'Notice.NTC_ID DESC',
                'conditions' => array(
                    'Notice.USR_ID' => $this->user['User']['USR_ID'],
                    'NOT' => array(
                        'Notice.P_USR_ID' => $this->user['User']['USR_ID']
                    )
                )
            )
        );
        $list = $this->paginate('Notice');

        foreach ($list as $key => $val) {
            if ($val['Notice']['ACT_ID'] == Timeline::ACT_ID_COMMENT) {
                $tmp = $this->User->find('first', array(
                    'conditions' => array(
                        'User.USR_ID' => $val['Timeline']['USR_ID']
                    ),
                    'fields' => array(
                        'User.NAME'
                    )
                ));

                if ($tmp['User']['NAME'] == $val['P_User']['NAME']) {
                    $tmp['User']['NAME'] = "自分";
                } elseif ($tmp['User']['NAME'] == $val['User']['NAME']) {
                    $tmp['User']['NAME'] = "あなた";
                }

                $list[$key]['Timeline']['NAME'] = $tmp['User']['NAME'];
            }
        }

        $this->set("list", $list);
    }

    /**
     * タイムライン表示：全て
     *
     * 全てのタイムラインを表示する
     *
     * @return void
     * @access public
     * @author 作成者
     */
    public function all()
    {
        // 初期化
        $this->autoRender = false;
//        $this->uses = null;

        $list = array();

        $this->user = null;
        $select = $this->Session->read('select');

        $tab_name = 'ALL';
        $this->set("tab_name", $tab_name);
        $this->set("tab_name2", $tab_name);

        // 絞込条件を取得
        if ($select['while'] == 0) {
            $while = 0;
        } elseif ($select['while'] == 1) {
            $while = 1;
        } else {
            $while = 2;
        }

        // タイムラインの取得
        $conditions = $this->Home->Get_Timeline($this->user, $this->user['User']['GRP_ID'], $while);
        $this->Get_Timeline($conditions);

        // 描画するviewの指定
        $this->render('../elements/timeline/timeline', false);
    }

    /**
     * タイムライン表示：グループ
     *
     * グループのタイムラインを表示する
     *
     * @return void
     * @access public
     * @author 作成者
     */
    public function group()
    {

        // 初期化
        $this->autoRender = false;
//        $this->uses = null;

        $list = array();

        $this->user = null;
        $select = $this->Session->read('select');

        // 追加
        $tab_name = 'GROUP';
        $this->set("tab_name", $tab_name);
        $this->set("tab_name2", $tab_name);
        $this->set("select", $select);
        $this->set("m_class", 'Home');
        $this->set('groupid', $this->user['User']['GRP_ID']);

        // タイムラインの取得
        $conditions = $this->Home->Get_Timeline($this->user, $this->user['User']['GRP_ID'], $this->Get_While(), null, 3);
        $this->Get_Timeline($conditions);

        // 描画するviewの指定
        $this->render('../elements/timeline/timeline', false);
    }

    /**
     * タイムライン表示：自分
     *
     * 自分のタイムラインを表示する
     *
     * @return void
     * @access public
     * @author 作成者
     */
    public function only()
    {
        // 初期化
        $this->autoRender = false;
//        $this->uses = null;
        $list = array();
        $this->user = null;
        $select = $this->Session->read('select');

        $tab_name = 'ONLY';
        $this->set("tab_name", $tab_name);
        $this->set("tab_name2", $tab_name);
        // ログインユーザーのコメントに紐付くタイムラインIDを取得
//        var_dump($this->Timeline);
        $result = $this->Timeline->find('all', array(
            'fields' => array(
                'Timeline.VAL_ID'
            ),
            'conditions' => array(
                'Timeline.USR_ID' => $this->user['User']['USR_ID'],
                'Timeline.ACT_ID' => 2,
                'Timeline.DEL_FLG' => 0
            )
        ));

        $vid_or = array();
        foreach ($result as $key => $val) {

            // 同一のタイムラインIDが配列に格納されていない場合のみ実行
            if (isset($tmp) && $tmp != $val['Timeline']['VAL_ID']) {
                $vid_or[$key] = $val['Timeline']['VAL_ID'];

                // 配列に設定したIDを格納
                $tmp = $vid_or[$key];
            }
        }

        // タイムラインの取得
        $conditions = $this->Home->Get_Timeline($this->user, $this->user['User']['GRP_ID'], $this->Get_While(), $vid_or, 2);
        $this->Get_Timeline($conditions);

        // 描画するviewの指定
        $this->render('../elements/timeline/timeline', false);
    }

    /**
     * タイムライン表示：フォローユーザ
     *
     * フォローしているユーザのタイムラインを表示する
     *
     * @return void
     * @access public
     * @author 作成者
     */
    public function follow()
    {

        // 初期化
        $this->autoRender = false;
//        $this->uses = null;

        $list = array();

        $this->user = null;
        $select = $this->Session->read('select');

        $tab_name = 'FOLLOW';
        $this->set("tab_name", $tab_name);
        $this->set("tab_name2", $tab_name);

        // タイムラインの取得
        $conditions = $this->Home->Get_Timeline($this->user, $this->user['User']['GRP_ID'], $this->Get_While(), null, 1);
        $this->Get_Timeline($conditions);

        // 描画するviewの指定
        $this->render('../elements/timeline/timeline', false);
    }

    /**
     * 絞込条件取得
     *
     * 絞込条件を取得する Follow, Only, Group, All のタブで共通の処理
     *
     * @return number
     * @access public
     * @author 作成者
     */
    public function Get_While()
    {
        $select = $this->Session->read('select');
        $while = 0;

        if ($select['while'] == 0) {
            $while = 0;
        } elseif ($select['while'] == 1) {
            $while = 1;
        } else {
            $while = 2;
        }

        return $while;
    }

    /**
     * タイムライン取得
     *
     * タイムラインを取得する Follow, Only, Group, All のタブで共通の処理
     *
     * @param unknown $conditions
     * @access public
     * @author 作成者
     */
    public function Get_Timeline($conditions)
    {
        $this->user = null;
        $select = $this->Session->read('select');

        // ページングの設定
        if ($select['order'] == Timeline::ORDER_NEW) {

            $this->paginate = array(
                'Timeline' => array(
                    'order' => 'Timeline.INSERT_DATE DESC',
                    'conditions' => array(
                        'Timeline.RED_NUM >=' => 0
                    ),
                    'limit' => 20,
                    'page' => 1
                )
            );
        } elseif ($select['order'] == Timeline::ORDER_OLD) {

            $this->paginate = array(
                'Timeline' => array(
                    'order' => 'Timeline.INSERT_DATE',
                    'conditions' => array(
                        'Timeline.RED_NUM >=' => 0
                    ),
                    'limit' => 20,
                    'page' => 1
                )
            );
        } elseif ($select['order'] == Timeline::ORDER_READ) {

            $this->paginate = array(
                'Timeline' => array(
                    'order' => 'Timeline.RED_NUM DESC,Timeline.TML_ID DESC',
                    'conditions' => array(
                        'Timeline.RED_NUM >=' => 0
                    ),
                    'limit' => 20,
                    'page' => 1
                )
            );
        }
        // タイムラインの取得
        $list = $this->paginate('Timeline', $conditions);

        // コメントの取得
        if ($this->Timeline->Comment_Search($list)) {
            $this->set("first", $list[0]['Timeline']['TML_ID']);
            $this->set("lastid", $list[count($list) - 1]['Timeline']['TML_ID']);
            $this->set("lastdate", $list[count($list) - 1]['Timeline']['LAST_DATE']);
        } else {
            $this->set("first", 0);
        }
        // よんだ！の取得
        $this->Read->Read_Search($list, $this->user);

        // ウォッチリストの取得
        $this->Watch->Watch_Search($list, $this->user);

        // 変数のセット
        $this->set("list", $list);
        $this->set("date_frag", true);
        $this->set("m_class", 'Home');
        $this->set("groupid", $this->user['User']['GRP_ID']);
    }
}
