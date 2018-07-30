#!/usr/bin/env php
<?php

if (! isset($_SERVER['PATH_BASE'])) {	
	$_SERVER['PATH_BASE'] = realpath(__DIR__.'/../../');
}
include($_SERVER['PATH_BASE'] . '/conf/constants.php');

$dir_controller = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_CONTROLLER . DIRECTORY_SEPARATOR;
array_shift($argv);
$name_controller = $argv[0];
$file_controller = ucfirst($argv[0]) . SUFIX_CONTROLLER . '.php';
//$path_content_controller = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . 'bin/generator/content_controller.php';

//$view = new 
//$content = $view->renderPhpFile($path_content_controller,array('name_controler'=>$name_controler));
$name_class_controller = ucfirst($name_controller).'Controller';
echo "Creacion del controlador $name_class_controller...\n";

$name_controller = $argv[0];
$content = 
"<?php 

namespace App\controllers;

class $name_class_controller extends  \core\Controller
{		
	function actionInicio(){
		return \$this->render('inicio',array('title'=>'My Title'));
	}
}
?>";
file_put_contents($dir_controller . $file_controller, $content);
