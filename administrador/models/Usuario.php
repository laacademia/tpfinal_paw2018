<?php

namespace App\models;
include($_SERVER['PATH_BASE'] . '/conf/constants.php');
require_once($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_CORE_MODEL);

class Usuario extends \core\Model
{
    function autenticar($username, $password){ 
        $where = " usuario='$username' ";
        $datos = $this->find($where);	
        if (count($datos)>0){
            $pass_base = $datos[0]['password'];
            if (password_verify($password,$pass_base)){
                //echo "IGUALESSSS";
                $where = " usuario='$username' AND password='$pass_base' ";
                $datos = $this->find($where);	
                return (count($datos)>0);
            }
        }
    }
}