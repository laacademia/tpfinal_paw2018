#!/usr/bin/env php
<?php

if (! isset($_SERVER['PATH_BASE'])) {	
	$_SERVER['PATH_BASE'] = realpath(__DIR__.'/../../');
}
include($_SERVER['PATH_BASE'] . '/conf/constants.php');

array_shift($argv);
$context = $argv[0];
$dir_view = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_VIEWS . DIRECTORY_SEPARATOR;
$dir_new_view = $dir_view . DIRECTORY_SEPARATOR . $context;

exec("cd $dir_view; mkdir $context;");
exec("cd $dir_new_view;");

$view = new core\View();
$model = new core\Model($context);

$params = array('columnas' => $model->getColumns(), 'context'=>$context);
/* --- Con los campos del modelo creado armo las vistas --- */

//archivo inicio
$nameView = 'inicio.php';
$file = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_GENERATOR_ABM_VIEW . DIRECTORY_SEPARATOR . $nameView;
$content = file_get_contents($file);
$content = str_replace('__controller__',$className,$content);
file_put_contents($dir_view . $nameView, $content);

//archivo alta
$file = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_GENERATOR_ABM_VIEW . DIRECTORY_SEPARATOR . 'alta.php';
$content = $view->renderPhpFile($file, $params);
file_put_contents($dir_view . $context . '/alta.php', $content);

//archivo edicion

$file = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_GENERATOR_ABM_VIEW . DIRECTORY_SEPARATOR . 'edicion.php';
$content = $view->renderPhpFile($file, $params);
file_put_contents($dir_view . $context . '/edicion.php', $content);	
