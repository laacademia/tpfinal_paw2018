<?php 

namespace App\controllers;

class AsdController extends  \core\Controller
{	
	function actionInicio(){
		$modelo = $this->getModel();
		$listado = $modelo->getAll();
		$columnas = $modelo->getColumns();
		return $this->render('inicio', array('title'=>'Listado ','listado' => $listado, 'columnas'=>$columnas));	//llama a la view inicio
	}
	function actionAlta(){
		$modelo = $this->getModel();
		$columnas = $modelo->getColumns();		
		return $this->render('alta',array('title'=>'Nuevo','columnas'=>$columnas));	
	}
	function actionBorrar($id){
		$modelo = $this->getModel();
		$modelo->del($id);
		return $this->actionInicio();
	}
	function actionModificacion($id){
		$modelo = $this->getModel();		
		$modelo->load($id);
		$columnas = $modelo->getColumns();
		return $this->render('edicion',array('title' => 'Edición', 'modelo' => $modelo,'columnas'=>$columnas));
	}
	function actionProcesar($id=null){				
		$modelo = $this->getModel();
		if(isset($_REQUEST['id']))
			$modelo->upd($_REQUEST);
		else
			$modelo->add($_REQUEST);
		return $this->actionInicio();
		
	}
}
?>