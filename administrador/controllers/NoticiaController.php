<?php 

namespace App\controllers;

//use core;
//use App\models;
/**
* 
*/
class NoticiaController extends  \core\Controller
{	
	function actionInicio(){
		$noticia = $this->getModel();		
		$listado = $noticia->getAll();
		$categoria = $this->getModel('Categoria');
		foreach ($listado as $key => $value) {
			$categoria->load($value['id_categoria']);
			$listado[$key]['categoria'] = $categoria->descripcion;
		}
		return $this->render('inicio', array('title'=>'Listado de Noticias','listado' => $listado, 'categorias'=>$categoria));	//llama a la view inicio
	}
	function actionAlta(){
		$categoria = $this->getModel('Categoria');
		$categorias = $categoria->getAll();		
		return $this->render('alta',array('title'=>'Nueva Noticia','categorias'=>$categorias));	
	}
	function actionBorrar($id){
		$noticia = $this->getModel();
		$noticia->del($id);
		return $this->actionInicio();
	}
	function actionModificacion($id){
		$noticia = $this->getModel();		
		$noticia->load($id);		
		$categoria = $this->getModel('Categoria');
		return $this->render('edicion',array('title'		=> 'Edición',
											'noticia'		=> $noticia,
											'categorias' 	=> $categoria->getAll()) 
		);	
	}
	function actionProcesar($id=null){				
		$noticia = $this->getModel();		
		if(isset($_REQUEST['id']))
			$noticia->upd($_REQUEST);
		else
			$noticia->add($_REQUEST);		
		return $this->actionInicio();
		
	}

	//--------------------------------------------------------------
	//---------------------------- TAGS ----------------------------
	//--------------------------------------------------------------
	//esta accion esta tambien en el controlador Tag pero uso esta.
	function actionAltaTag(){		
		$tag = $this->getModel('tag');	
		$tag->add($_REQUEST);		
		return $this->actionModificacion($tag->id_articulo);
	}
	//esta accion esta tambien en el controlador Tag pero uso esta.
	function actionBorrarTag($id,$id_noticia){
		$tag = $this->getModel('tag');				
		$tag->del($id);
		return $this->actionModificacion($id_articulo);
	}

	//--------------------------------------------------------------
	//----------------------- COMENTARIO ---------------------------
	//--------------------------------------------------------------
	//esta accion esta tambien en el controlador Tag pero uso esta.
	function actionAltaComentario(){		
		$comentario = $this->getModel('Comentario');	
		$comentario->add($_REQUEST);		
		return $this->actionModificacion($comentario->id_noticia);
	}
}
?>