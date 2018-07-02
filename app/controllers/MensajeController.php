<?php 

namespace App\controllers;

class MensajeController extends  \core\Controller
{		
	function actionInicio(){
		return $this->render('inicio',array('title'=>'Formulario de Contacto'));		
	}
}