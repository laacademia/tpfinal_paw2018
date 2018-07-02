<?php 

namespace App\controllers;

class QuienesSomosController extends  \core\Controller
{		
	function actionInicio(){
		$model = $this->getModel('QuienesSomos');		
		$datos = $model->getAll();

		//$id = (isset($datos[0]['id'])) ? $id  : '';
		$titulo = (isset($datos[0]['titulo'])) ? $datos[0]['titulo']  : '';
		$descripcion = (isset($datos[0]['descripcion'])) ? $datos[0]['descripcion']  : '';
		//$imagen_fondo = (isset($imagen_fondo )) ? $imagen_fondo  : null;
		return $this->render('inicio',array('title'=>'Edicion - Quienes Somos?',											
											'titulo'=>"$titulo",
											'descripcion'=>"$descripcion"));		
	}

	function actionActualizar(){
		$model = $this->getModel('QuienesSomos');		
		$_REQUEST['id'] = 1;
		$model->upd($_REQUEST);
		return $this->actionInicio();
	}
}
?>