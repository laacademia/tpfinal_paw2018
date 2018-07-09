<?php 

namespace App\controllers;

class UsuarioController extends  \core\Controller
{	
	function actionInicio(){
		$modelo = $this->getModel();
		$listado = $modelo->getAll();
		$columnas = $modelo->getColumns();
                unset($columnas[5]);
                //print_r($columnas);
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
               // print_r($_REQUEST);
                $_REQUEST['password'] = password_hash($_REQUEST['password'],PASSWORD_DEFAULT); 
                $username = $_REQUEST['usuario'];
                if(isset($_REQUEST['id'])){
                    $modelo->upd($_REQUEST);
                }else{
                    //es un alta. Verifico que el usuario no exista con ese nombre
                    $datos = $modelo->find(" usuario='$username'");
                    if (count($datos)>0){
                        \core\Notification::instancia()->error("El nombre de usuario ya existe");
			//return $this->render('inicio',array('title'=>'Nuevo'));
                    }else{
                        $modelo->add($_REQUEST);
                    }
                    
                }
		return $this->actionInicio();
		
	}
}