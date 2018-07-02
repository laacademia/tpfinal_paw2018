<?php

namespace App\models;
include($_SERVER['PATH_BASE'] . '/conf/constants.php');
require_once($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_CORE_MODEL);

class Usuario extends \core\Model
{
    function autenticar($username, $password){    	    	
    	$where = " usuario='$username' AND password='$password' ";
		$datos = $this->find($where);		
		return (count($datos)>0);
    }
}