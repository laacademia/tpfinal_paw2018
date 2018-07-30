<?php 

namespace App\controllers;

class MuestrasController extends  \core\Controller
{		
	public $useLayout = false;
	
	function actionInicio(){
		return $this->render('inicio',array('title'=>'Muestras'));		
	}
}