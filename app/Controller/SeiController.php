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
class SeiController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('M_AREA');

	public function index() {

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

		$view = 'seisan_center_seikyu';
//		$this->render($view);

	}

/**
 * seisan_csv a view
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
 * seisan_daikinkaisyu a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function daikinkaisyu() {

		$view = 'seisan_daikinkaisyu';
		$this->render($view);

	}

/**
 * seisan_hikiotoshi a view
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
 * Displays a view
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
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function juchu_houjin() {

		$view = 'seisan_juchu_houjin';
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
	public function juchukensaku() {

		$view = 'seisan_juchukensaku';
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
	public function kakuteitorikeshi() {

		$view = 'seisan_kakuteitorikeshi';
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
	public function meisai_juchu() {

		$view = 'seisan_meisai_juchu';
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
	public function meisai_kotei() {

		$view = 'seisan_meisai_kotei';
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
	public function meisai_shizai() {

		$view = 'seisan_meisai_shizai';
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
	public function meisai_zuiji() {

		$view = 'seisan_meisai_zuiji';
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
	public function month_hiyo() {

		$view = 'seisan_month_hiyo';
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
	public function month_hiyo_mod() {

		$view = 'seisan_month_hiyo_mod';
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
	public function month_hiyo_syosai() {

		$view = 'seisan_month_hiyo_syosai';
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
	public function other_zuiji() {

		$view = 'seisan_other_zuiji';
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
	public function other_zuji_syosai() {

		$view = 'seisan_other_zuji_syosai';
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
	public function shizai_list() {

		$view = 'seisan_shizai_list';
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
	public function syokai() {

		$view = 'seisan_syokai';
		$this->render($view);

	}

}
