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
if (!defined('PATH_MENU')) 				define('PATH_MENU' , 'views/layouts/menu.php');

//core
if (!defined('PATH_CORE_CONTROLLER')) 	define('PATH_CORE_CONTROLLER' , 'core/controller/Controller.php');
if (!defined('PATH_CORE_VIEW')) 		define('PATH_CORE_VIEW' , 'core/view/View.php');
if (!defined('PATH_CORE_MODEL')) 		define('PATH_CORE_MODEL' , 'core/model/Model.php');

if (!defined('ABSOLUTE_DIRECTORY_VIEWS')) define('ABSOLUTE_DIRECTORY_VIEWS' , $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_VIEWS . DIRECTORY_SEPARATOR);

//generador de codigo
if (!defined('PATH_ABM_CONTROLLER_GENERIC')) define('PATH_ABM_CONTROLLER_GENERIC' , 'bin/comandos/abm/controlador_generico.php');
if (!defined('PATH_ABM_MODEL_GENERIC')) define('PATH_ABM_MODEL_GENERIC' , 'bin/comandos/abm/modelo_generico.php');
if (!defined('PATH_ABM_PLANTILLA_INICIO')) define('PATH_ABM_PLANTILLA_INICIO' , 'bin/comandos/abm/archivos_genericos/inicio_generico.php');
if (!defined('PATH_ABM_PLANTILLA_ALTA')) define('PATH_ABM_PLANTILLA_ALTA' , 'bin/comandos/abm/archivos_genericos/alta_generico.php');
if (!defined('PATH_ABM_PLANTILLA_EDICION')) define('PATH_ABM_PLANTILLA_EDICION' , 'bin/comandos/abm/archivos_genericos/edicion_generico.php');
if (!defined('PATH_ABM_PLANTILLA_ITEM_MENU')) define('PATH_ABM_PLANTILLA_ITEM_MENU' , 'bin/comandos/abm/archivos_genericos/item_menu_generico.php');
if (!defined('PATH_PLANTILLA_INICIO_SIMPLE')) define('PATH_PLANTILLA_INICIO_SIMPLE' , 'bin/comandos/abm/archivos_genericos/inicio_generico_simple.php');
