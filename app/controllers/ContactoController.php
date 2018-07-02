<?php 

namespace App\controllers;

class ContactoController extends  \core\Controller
{		
	function actionInicio(){
		return $this->render('inicio',array('title'=>'Formulario de Contacto'));		
	}
}