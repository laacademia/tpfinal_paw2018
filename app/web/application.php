<?php 
include './../datosCon.php';

$_SERVER['PATH_BASE']=$datosConf['PATH_BASE'];
require_once($_SERVER['PATH_BASE']. '/core/Application.php');
$app = new core\Application();
$app->run();