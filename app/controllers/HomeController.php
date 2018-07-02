<?php 

namespace App\controllers;

class HomeController extends  \core\Controller
{		
	function actionInicio(){
		$model = $this->getModel('Home');		
		$datos = $model->find(" id_categoria = 1 and activo ");
                //print_r($datos);
                return $this->render('inicio',array('title'=>'Home', 'datos'=>$datos));		
	}
}