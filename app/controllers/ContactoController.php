<?php 

namespace App\controllers;

class ContactoController extends  \core\Controller
{		
	public $useLayout = false;
	
	function actionInicio(){
		return $this->render('inicio',array('title'=>'Formulario de Contacto'));		
	}
}