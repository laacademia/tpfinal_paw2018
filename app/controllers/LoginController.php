<?php 

namespace App\controllers;

class LoginController extends  \core\Controller
{		
	function actionInicio(){
		return $this->render('inicio',array('title'=>'Login'));		
	}
}