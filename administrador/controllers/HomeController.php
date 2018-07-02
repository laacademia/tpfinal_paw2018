<?php 

namespace App\controllers;

class HomeController extends  \core\Controller
{		
	function actionInicio(){
		return $this->render('inicio',array('title'=>'Home'));		
	}
}
?>