#!/usr/bin/env php	
<?php
if (! isset($_SERVER['PATH_BASE'])) {	
	$_SERVER['PATH_BASE'] = realpath(__DIR__.'/../../../');
}
include($_SERVER['PATH_BASE'] . '/conf/constants.php');
require($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_CORE_VIEW);
//echo $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_CORE_VIEW ."\n";

$controlador_generico = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_ABM_CONTROLLER_GENERIC;
$dir_controller = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_CONTROLLER . DIRECTORY_SEPARATOR;
array_shift($argv);
$name_controller = $argv[0];
$className = ucfirst($argv[0]) . SUFIX_CONTROLLER;
$fileName = $className . '.php';

echo "Creacion del controlador $className...\n";
$content = file_get_contents($controlador_generico);
$content = str_replace('__className__',$className,$content);
file_put_contents($dir_controller . $fileName, $content);
