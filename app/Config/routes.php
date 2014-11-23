<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

Router::connect('/', array('controller' => 'Seisan', 'action' => 'index'));
Router::connect('/seisan/:action/*', array('controller' => 'Seisan'));
Router::connect('/seisan/', array('controller' => 'Seisan', 'action' => 'index'));

Router::connect('/juchu/:action/*', array('controller' => 'Juchu'));
Router::connect('/juchu/', array('controller' => 'Juchu', 'action' => 'index'));

//	Router::connect('/seisan/', array('controller' => 'Sei', 'action' => 'index'));
//	Router::connect('/seisan/center_seikyu', array('controller' => 'Seisan', 'action' => 'center_seikyu'));
//	Router::connect('/seisan/*', array('controller' => 'Aages', 'action' => 'display'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
//	Router::connect('/aages/center_seikyu', array('controller' => 'Aages', 'action' => 'centerseikyu'));
//	Router::connect('/aages/*', array('controller' => 'Aages', 'action' => ':action'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';

/**
 * .2014/11/08
 */
App::import('Model', 'Plugin');
$plugin = new Plugin();
$plugin->NotUse();

Router::connect('/Macha/homes/:action/*', array('plugin' => 'Macha', 'controller' => 'Homes'));
Router::promote();
Router::connect('/Macha/users/:action/*', array('plugin' => 'Macha', 'controller' => 'Users'));
Router::promote();
Router::connect('/Macha/timelines/:action/*', array('plugin' => 'Macha', 'controller' => 'Timelines'));
Router::promote();
Router::connect('/Macha/administrators/:action/*', array('plugin' => 'Macha', 'controller' => 'Administrators'));
Router::promote();
Router::connect('/Macha/errors/:action/*', array('plugin' => 'Macha', 'controller' => 'Errors'));
Router::promote();
Router::connect('/Macha/friends/:action/*', array('plugin' => 'Macha', 'controller' => 'Friends'));
Router::promote();
Router::connect('/Macha/groups/:action/*', array('plugin' => 'Macha', 'controller' => 'Groups'));
Router::promote();
Router::connect('/Macha/messages/:action/*', array('plugin' => 'Macha', 'controller' => 'Messages'));
Router::promote();
Router::connect('/Macha/profiles/:action/*', array('plugin' => 'Macha', 'controller' => 'Profiles'));
Router::promote();
Router::connect('/Macha/requests/:action/*', array('plugin' => 'Macha', 'controller' => 'Requests'));
Router::promote();
Router::connect('/Macha/searchs/:action/*', array('plugin' => 'Macha', 'controller' => 'Searchs'));
Router::promote();
Router::connect('/Macha/storages/:action/*', array('plugin' => 'Macha', 'controller' => 'Storages'));
Router::promote();
Router::connect('/Macha/configurations/:action/*', array('plugin' => 'Macha', 'controller' => 'Configurations'));
Router::promote();

Router::connect('/homes/:action/*', array('plugin' => 'Macha', 'controller' => 'Homes'));
Router::promote();
Router::connect('/users/:action', array('plugin' => 'Macha', 'controller' => 'Users'));
Router::promote();
Router::connect('/timelines/:action/*', array('plugin' => 'Macha', 'controller' => 'Timelines'));
Router::promote();
Router::connect('/administrators/:action/*', array('plugin' => 'Macha', 'controller' => 'Administrators'));
Router::promote();
Router::connect('/errors/:action/*', array('plugin' => 'Macha', 'controller' => 'Errors'));
Router::promote();
Router::connect('/friends/:action/*', array('plugin' => 'Macha', 'controller' => 'Friends'));
Router::promote();
Router::connect('/groups/:action/*', array('plugin' => 'Macha', 'controller' => 'Groups'));
Router::promote();
Router::connect('/messages/:action/*', array('plugin' => 'Macha', 'controller' => 'Messages'));
Router::promote();
Router::connect('/profiles/:action/*', array('plugin' => 'Macha', 'controller' => 'Profiles'));
Router::promote();
Router::connect('/requests/:action/*', array('plugin' => 'Macha', 'controller' => 'Requests'));
Router::promote();
Router::connect('/searchs/:action/*', array('plugin' => 'Macha', 'controller' => 'Searchs'));
Router::promote();
Router::connect('/storages/:action/*', array('plugin' => 'Macha', 'controller' => 'Storages'));
Router::promote();
Router::connect('/configurations/:action/*', array('plugin' => 'Macha', 'controller' => 'Configurations'));
Router::promote();

Router::connect('/homes', array('plugin' => 'Macha', 'controller' => 'Homes', 'action' => 'index'));
Router::promote();
Router::connect('/timelines', array('plugin' => 'macha', 'controller' => 'Timelines', 'action' => 'index'));
Router::promote();
Router::connect('/administrators', array('plugin' => 'Macha', 'controller' => 'Administrators', 'action' => 'index'));
Router::promote();
Router::connect('/errors', array('plugin' => 'Macha', 'controller' => 'Errors', 'action' => 'index'));
Router::promote();
Router::connect('/friends', array('plugin' => 'Macha', 'controller' => 'Friends', 'action' => 'index'));
Router::promote();
Router::connect('/groups', array('plugin' => 'Macha', 'controller' => 'Groups', 'action' => 'index'));
Router::promote();
Router::connect('/messages', array('plugin' => 'Macha', 'controller' => 'Messages', 'action' => 'index'));
Router::promote();
Router::connect('/profiles', array('plugin' => 'Macha', 'controller' => 'Profiles', 'action' => 'index'));
Router::promote();
Router::connect('/requests', array('plugin' => 'Macha', 'controller' => 'Requests', 'action' => 'index'));
Router::promote();
Router::connect('/searchs', array('plugin' => 'Macha', 'controller' => 'Searchs', 'action' => 'index'));
Router::promote();
Router::connect('/storages', array('plugin' => 'Macha', 'controller' => 'Storages', 'action' => 'index'));
Router::promote();
Router::connect('/note', array('plugin' => 'Note', 'controller' => 'Note', 'action' => 'index'));
Router::promote();
Router::connect('/configurations', array('plugin' => 'Macha', 'controller' => 'Configurations', 'action' => 'index'));
Router::promote();
Router::connect('/plugins', array('plugin' => 'Macha', 'controller' => 'Plugins', 'action' => 'index'));
Router::promote();

Router::connect('/Macha/configurations', array('plugin' => 'Macha', 'controller' => 'Configurations', 'action' => 'index'));
Router::promote();
Router::connect('/Macha/plugins', array('plugin' => 'Macha', 'controller' => 'Plugins', 'action' => 'index'));
Router::promote();
Router::connect('/Macha/administrators', array('plugin' => 'Macha', 'controller' => 'Administrators', 'action' => 'index'));
Router::promote();
