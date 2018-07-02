<?php

namespace App\models;
include($_SERVER['PATH_BASE'] . '/conf/constants.php');
require_once($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_CORE_MODEL);
//use core;
/**
* 
*/
class Noticia extends \core\Model
{	
	//protected $columns = array('id');
	protected $blobs = array('imagen' => array('blob_column'=>'imagen', 'type_column'=>'mime','maxsize'=>100000));
	//@Override
	function loadRelations(){
		//Articulo esta relacionado con Categoria
		$this->addRelation('Categoria',array('id_categoria'=>'id'));		
	}
	function getCategoria(){
		return $this->getDataRelation('Categoria');
	}	
	function getFechaPublicacionFormateada($formato='Y-m-d'){
		return date('Y-m-d',strtotime($this->fecha_publicacion));
	}

}

?>
