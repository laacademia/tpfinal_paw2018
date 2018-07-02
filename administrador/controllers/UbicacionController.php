<?php 

namespace App\controllers;

class UbicacionController extends  \core\Controller
{	
	//Arma la pagina de inicio	
	function actionInicio(){
		$ubicacion = $this->getModel();
		$listado = $ubicacion->getAll();
		return $this->render('inicio',array('title'=>'Listado Ubicaciones','listado'=>$listado));
	}

	function actionAlta(){
		return $this->render('alta',array('title'=>'Nueva Ubicacion'));	
	}
	function actionBorrar($id){
		$ubicacion = $this->getModel();
		$ubicacion->del($id);
		return $this->actionInicio();
	}
	function actionModificacion($id){
		$ubicacion = $this->getModel();		
		$ubicacion->load($id);		
			
		return $this->render('edicion',array('title' => 'Edición', 'ubicacion' => $ubicacion));	
	}

	function actionProcesar($id=null){				
		$ubicacion = $this->getModel();		
		if(isset($_REQUEST['id']))
			$ubicacion->upd($_REQUEST);
		else
			$ubicacion->add($_REQUEST);		
		return $this->actionInicio();
		
	}


	//devuelve json con las ubicaciones que hay en DB
	// function actionUbicaciones(){
	// 	$ubicacion = $this->getModel();
	// 	$datos = $ubicacion->getAll();
	// 	return json_encode($datos);
	// }
}
?>