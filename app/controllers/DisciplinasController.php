<?php 

namespace App\controllers;

class DisciplinasController extends  \core\Controller
{			
	public $useLayout = false;

	function actionInicio(){
		for ($i=0; $i < 999999999; $i++) { 
			
		}
		$model = $this->getModel('Disciplinas');		
		$datos = $model->find(" id_categoria = 2 and activo");
                //print_r($datos);
                return $this->render('inicio',array('title'=>'Disciplinas', 'datos'=>$datos));		
	}
}