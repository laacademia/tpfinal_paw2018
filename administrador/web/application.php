<?php 
//$_SERVER['PATH_BASE']="C:/wamp64/www/app";
session_start();
require_once($_SERVER['PATH_BASE']. '/core/Application.php');
$app = new core\Application();
$app->enableAuth(); //habilito la autenticacion para la aplicacion
$app->run();