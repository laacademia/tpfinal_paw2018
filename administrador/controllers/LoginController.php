<?php 

namespace App\controllers;
require_once($_SERVER['PATH_BASE'] . '/core/Notification.php');

class LoginController extends  \core\Controller
{		
	public $useLayout = false; //le digo que no use layout

	function actionInicio(){
		return $this->render('inicio',array('title'=>'Login'));		
	}

	function actionLogin($username, $password){		
		$usuario = $this->getModel('usuario');
		if( $usuario->autenticar($username, $password) ){
			
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			//return $this->render('inicio',array('title'=>'Login'));
			header('Location: ./?c=home&a=inicio');
		}else{
			\core\Notification::instancia()->error("La combinacion de usuario y clave no es valida");
			return $this->render('inicio',array('title'=>'Login'));
		}
	}

	function actionLogout(){		
		unset ($_SESSION['username']);
		unset ($_SESSION['loggedin']);
                $_SESSION = [''];
		session_destroy();
		return $this->render('inicio',array('title'=>'Login'));
	}
}
?>