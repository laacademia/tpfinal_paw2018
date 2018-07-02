<?php 

namespace App\controllers;

class QuienesSomosController extends  \core\Controller
{		
	function actionInicio(){
		$model = $this->getModel('QuienesSomos');		
		$datos = $model->getAll();
		return $this->render('inicio',array('title'=>'Quienes Somos?', 'datos'=>$datos));		
	}
}