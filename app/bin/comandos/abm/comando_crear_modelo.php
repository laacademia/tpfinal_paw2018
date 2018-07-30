#!/usr/bin/env php
<?php

if (! isset($_SERVER['PATH_BASE'])) {	
	$_SERVER['PATH_BASE'] = realpath(__DIR__.'/../../../');
}
include($_SERVER['PATH_BASE'] . '/conf/constants.php');

$modelo_generico = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_ABM_MODEL_GENERIC;
$dir_model = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_MODEL . DIRECTORY_SEPARATOR;
array_shift($argv);
$className = ucfirst($argv[0]);
$fileName = $className . '.php';

echo "Creacion del Modelo $className...\n";
$content = file_get_contents($modelo_generico);
$content = str_replace('__className__',$className,$content);
file_put_contents($dir_model . $fileName, $content);
