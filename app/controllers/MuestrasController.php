<?php 

namespace App\controllers;

class MuestrasController extends  \core\Controller
{		
	function actionInicio(){
		return $this->render('inicio',array('title'=>'Muestras'));		
	}
}