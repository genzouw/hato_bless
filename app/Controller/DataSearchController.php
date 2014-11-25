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
class DataSearchController extends AppController
{
    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array(
        'M_AREA',
        'TJuchuKihon',
        'TJuchuCsv',
    );

    public function index()
    {
        $this->redirect(array(
            'action' => 'data_search',
        ));
    }

    /**
     * center_seikyu a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     *                           or MissingViewException in debug mode.
     */
    public function data_search()
    {
        $tJuchuKihonList = $this->TJuchuKihon->find(
            'all',
            array(
                'limit' => 50,
            )
        );

        $view = 'data_search';

        $this->set(
            'tJuchuKihonList', $tJuchuKihonList
        );
    }

    /**
     * seisan_csv a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     *                           or MissingViewException in debug mode.
     */
    public function houjin_uriage_list()
    {
        $view = 'houjin_uriage_list';
        $this->render($view);

    }

    /**
     * seisan_daikinkaisyu a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     *                           or MissingViewException in debug mode.
     */
    public function juchu_csv()
    {
        $view = 'juchu_csv';

        $this->request->data['TJuchuCsv']['CSV_MAKE_FLG'] = '1';

        $this->set('juchuStsCdOptions', array(
            '1' => 'TEL打ち合わせ',
            '2' => '見積依頼',
            '05' => '見積完了',
        ));

        $this->set('csvMakeFlgOptions', array(
            '1' => '受注CSV(引越情報)',
            '2' => '引越CSV(引越情報-簡易版)',
            '3' => '受注CSV(手配情報)',
        ));

        $this->set('keiyuCdOptions', array(
            '00' => 'すべて',
            '01' => '電話帳',
            '02' => 'チラシ',
            '03' => '新聞',
            '04' => 'TV',
            '05' => 'ラジオ',
            '06' => '取次店',
            '07' => '契約法人',
            '08' => 'お客様紹介',
            '09' => '看板',
            '10' => 'リピート',
            '11' => '現場を見て',
            '12' => '本部',
            '13' => '他センター',
            '14' => 'E-mail',
            '15' => '提携先',
            '16' => '来店',
            '17' => 'ホームページ',
            '18' => 'グループ',
            '19' => '営業',
            '20' => '不動産',
            '21' => 'その他',
        ));


        $this->set('toriatsukaiKbnOptions', array(
            '0' => '引越・移転・生活関連',
            '1' => '一般貨物',
        ));

        $this->render($view);

    }

    public function juchu_csv_download()
    {
        $this->autoRender = false;
        $this->layout = false;

        $conditions = array();
        if (!empty($this->data['TJuchuCsv']['UKETSUKE_NO'])) {
            $conditions['TJuchuCsv.UKETSUKE_NO'] = $this->data['TJuchuCsv']['UKETSUKE_NO'];
        };
        if (!empty($this->data['TJuchuCsv']['KOKYAKUMEI'])) {
            $conditions['TJuchuCsv.KOKYAKUMEI'] = $this->data['TJuchuCsv']['KOKYAKUMEI'];
        };
        if (!empty($this->data['TJuchuCsv']['HOJIN_CD'])) {
            $conditions['TJuchuCsv.HOJIN_CD'] = $this->data['TJuchuCsv']['HOJIN_CD'];
        };
        if (!empty($this->data['TJuchuCsv']['JUCHU_STS_CD'])) {
            $conditions['TJuchuCsv.JUCHU_STS_CD'] = $this->data['TJuchuCsv']['JUCHU_STS_CD'];
        };
        if (!empty($this->data['TJuchuCsv']['MITSUMORI_DT_FROM'])) {
            $conditions['TJuchuCsv.MITSUMORI_DT_FROM >='] = $this->data['TJuchuCsv']['MITSUMORI_DT_FROM'];
        };
        if (!empty($this->data['TJuchuCsv']['MITSUMORI_DT_TO'])) {
            $conditions['TJuchuCsv.MITSUMORI_DT_TO <='] = $this->data['TJuchuCsv']['MITSUMORI_DT_TO'];
        };
        if (!empty($this->data['TJuchuCsv']['SAGYOU_DT_FROM'])) {
            $conditions['TJuchuCsv.SAGYOU_DT_FROM >='] = $this->data['TJuchuCsv']['SAGYOU_DT_FROM'];
        };
        if (!empty($this->data['TJuchuCsv']['SAGYOU_DT_TO'])) {
            $conditions['TJuchuCsv.SAGYOU_DT_TO <='] = $this->data['TJuchuCsv']['SAGYOU_DT_TO'];
        };
        // TODO 積卸情報の条件を反映
        if (!empty($this->data['TJuchuCsv']['SEISAN_DT_FROM'])) {
            $conditions['TJuchuCsv.SEISAN_DT_FROM >='] = $this->data['TJuchuCsv']['SEISAN_DT_FROM'];
        };
        if (!empty($this->data['TJuchuCsv']['SEISAN_DT_TO'])) {
            $conditions['TJuchuCsv.SEISAN_DT_TO <='] = $this->data['TJuchuCsv']['SEISAN_DT_TO'];
        };
        if (!empty($this->data['TJuchuCsv']['UKETSUKE_DT_FROM'])) {
            $conditions['TJuchuCsv.UKETSUKE_DT_FROM >='] = $this->data['TJuchuCsv']['UKETSUKE_DT_FROM'];
        };
        if (!empty($this->data['TJuchuCsv']['UKETSUKE_DT_TO'])) {
            $conditions['TJuchuCsv.UKETSUKE_DT_TO <='] = $this->data['TJuchuCsv']['UKETSUKE_DT_TO'];
        };
        // TODO 実施日の条件を反映
        if (!empty($this->data['TJuchuCsv']['KEIYU_CD'])) {
            $conditions['TJuchuCsv.KEIYU_CD'] = $this->data['TJuchuCsv']['KEIYU_CD'];
        };
        if (!empty($this->data['TJuchuCsv']['TORIATSUKAI_KBN'])) {
            $conditions['TJuchuCsv.TORIATSUKAI_KBN'] = $this->data['TJuchuCsv']['TORIATSUKAI_KBN'];
        };
        // TODO 下部組織を含まないの条件を反映
        if (!empty($this->data['TJuchuCsv']['CSV_MAKE_FLG'])) {
            $conditions['TJuchuCsv.CSV_MAKE_FLG'] = $this->data['TJuchuCsv']['CSV_MAKE_FLG'];
        };

        $tJuchuCsvList = $this->TJuchuCsv->find(
            'all',
            array(
                'conditions' => $conditions,
            )
        );

        // TODO ファイル名
        $csv_file = 'output.csv';

        header ("Content-disposition: attachment; filename=" . $csv_file);
        header ("Content-type: application/octet-stream; name=" . $csv_file);
        foreach ($tJuchuCsvList as $tJuchuCsv) {
            $columns = array(
                $tJuchuCsv['TJuchuCsv']['IRAI_SOSHIKI_CD'],
                $tJuchuCsv['TJuchuCsv']['CSV_TYPE'],
                $tJuchuCsv['TJuchuCsv']['UKETSUKE_NO'],
                $tJuchuCsv['TJuchuCsv']['KOKYAKUMEI'],
                $tJuchuCsv['TJuchuCsv']['HOJIN_CD'],
                $tJuchuCsv['TJuchuCsv']['JUCHU_STS_CD'],
                $tJuchuCsv['MHojin']['HOJIN_MEI'],
                $tJuchuCsv['TJuchuCsv']['JUCHU_STS_CD'],
                $tJuchuCsv['TJuchuCsv']['UPDATE_DT'],
            );

            $columns = array_map(function ($it) {
                return '"' . $it . '"';
            }, $columns);

            echo mb_convert_encoding(implode($columns, ","), 'Windows-31J', 'UTF-8'), PHP_EOL;
        }
    }

/**
 * seisan_hikiotoshi a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function juchu_list()
    {
        $view = 'juchu_list';
        $this->render($view);

    }

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function seikyu_print()
    {
        $view = 'seikyu_print';
        $this->render($view);

    }

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public function shiharai_list()
    {
        $view = 'shiharai_list';
        $this->render($view);

    }

}
