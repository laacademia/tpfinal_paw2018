<?php

namespace App\models;
include($_SERVER['PATH_BASE'] . '/conf/constants.php');
require_once($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_CORE_MODEL);
//use core;
/**
* 
*/
class QuienesSomos extends \core\Model
{
    protected $table = 'quienes_somos';
}