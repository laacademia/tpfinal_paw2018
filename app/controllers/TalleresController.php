<?php 

namespace App\controllers;

class TalleresController extends  \core\Controller
{		
	function actionInicio(){
		$model = $this->getModel('Talleres');		
		$datos = $model->find(" id_categoria = 3 and activo");
                //print_r($datos);
                return $this->render('inicio',array('title'=>'Talleres', 'datos'=>$datos));		
	}
}