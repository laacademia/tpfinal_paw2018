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

//archivo inicio
$nameView = 'inicio.php';
$content = "<h1>HOLA</h1>"; //trucho pero ya no hay ganas
file_put_contents($dir_new_view .DIRECTORY_SEPARATOR. $nameView, $content);