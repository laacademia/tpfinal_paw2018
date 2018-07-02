<?php 

namespace App\controllers;

class DisciplinasController extends  \core\Controller
{		
	function actionInicio(){
		$model = $this->getModel('Disciplinas');		
		$datos = $model->find(" id_categoria = 2 and activo");
                //print_r($datos);
                return $this->render('inicio',array('title'=>'Disciplinas', 'datos'=>$datos));		
	}
}