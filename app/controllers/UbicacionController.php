<?php 

namespace App\controllers;

class UbicacionController extends  \core\Controller
{	
	public $useLayout = false;
	//Arma la pagina de inicio	
	function actionInicio(){		
		return $this->render('inicio',array('title'=>'Ubicacion del Local'));
	}

	//devuelve json con las ubicaciones que hay en DB
	function actionUbicaciones(){
		$ubicacion = $this->getModel();
		$datos = $ubicacion->getAll();
		return json_encode($datos);
	}
}