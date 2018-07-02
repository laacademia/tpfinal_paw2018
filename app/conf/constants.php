<?php 
if (!defined('SUFIX_CONTROLLER')) 		define('SUFIX_CONTROLLER' , 'Controller');

if (!defined('PREFIX_ACTION')) 			define('PREFIX_ACTION', 'action');

//app
if (!defined('DIRECTORY_MODEL')) 		define('DIRECTORY_MODEL' , 'models');
if (!defined('DIRECTORY_CONTROLLER')) 	define('DIRECTORY_CONTROLLER' , 'controllers');
if (!defined('DIRECTORY_VIEWS')) 		define('DIRECTORY_VIEWS' , 'views');
if (!defined('DIRECTORY_VIEW_LAYOUTS')) define('DIRECTORY_VIEW_LAYOUTS' , 'layouts'); //lo dejo que pase el path relativo a donde quiera dentro de views
if (!defined('DEFAULT_LAYOUT_FILE')) 	define('DEFAULT_LAYOUT_FILE','main.php');
if (!defined('DIRECTORY_IMG')) 			define('DIRECTORY_IMG' , 'img');
if (!defined('DIRECTORY_CONF')) 		define('DIRECTORY_CONF' , 'conf');

//core
if (!defined('PATH_CORE_CONTROLLER')) 	define('PATH_CORE_CONTROLLER' , 'core/controller/Controller.php');
if (!defined('PATH_CORE_VIEW')) 		define('PATH_CORE_VIEW' , 'core/view/View.php');
if (!defined('PATH_CORE_MODEL')) 		define('PATH_CORE_MODEL' , 'core/model/Model.php');

if (!defined('ABSOLUTE_DIRECTORY_VIEWS')) define('ABSOLUTE_DIRECTORY_VIEWS' , $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_VIEWS . DIRECTORY_SEPARATOR);
?>