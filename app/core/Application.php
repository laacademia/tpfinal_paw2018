<?php 

namespace core;

require($_SERVER['PATH_BASE'] . '/core/controller/Controller.php');
require($_SERVER['PATH_BASE'] . '/core/helpers/Inflector.php');
include($_SERVER['PATH_BASE'] . '/conf/constants.php');
//require($_SERVER['PATH_BASE'] . '/core/Notification.php');

use controllers;
/**
* 
*/
class Application
{

	private $url_params;
	private $context;
	private $auth = false;	

	function run(){

		//si la aplicacion requiere autenticacion y no este logeado, redirecciono al login
		if( $this->isEnableAuth() && !$this->userAuth() ){
			$configs = include($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_CONF . DIRECTORY_SEPARATOR . 'config.php');
			
			//si esta definido en la configuracion el controlador del login
			if( isset($configs['login_controller']) ){				
				$controller = $this->findController($configs['login_controller']['controller']);
				echo $controller->runAction($configs['login_controller']['action'],null);
				exit();
			}else{
				die('No se definio el controlador del login en las configuraciones');
			}
		}

		$this->parseParams();
		// if(!isset($this->url_params['c']))	//si no se paso el controlador
		// 	$this->url_user_error();
		// if(!isset($this->url_params['a']))	//si no se paso la accion
		// 	$this->url_user_error();
		if( !isset($this->url_params['c']) || !isset($this->url_params['a']) )	//si no se paso el controlador
		{
			$configs = include($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_CONF . DIRECTORY_SEPARATOR . 'config.php');
			$this->url_params['c'] = $configs['default_controller']['controller'];
			$this->url_params['a'] = $configs['default_controller']['action'];
		}
			
			
		
		$name_controller = $this->url_params['c'];
		$action = $this->url_params['a'];
		$params = $this->url_params['params'];
		//$params = array('title'=>'titulo');
		$controller = $this->findController($name_controller);				
		echo $controller->runAction($action,$params);		
	}

	private function parseParams(){
		$this->url_params['c'] = (isset($_GET['c'])) ? $_GET['c'] : null;
		$this->url_params['a'] = (isset($_GET['a'])) ? $_GET['a'] : null;
		if(isset($_GET['params']))
			$this->url_params['params'] = $_GET['params'];
		else
			$this->url_params['params'] = null;
	}

	private function findController($controller){
		return $this->getInstanceController($controller);	//devuelve la cadena con formato CamelCase				

	}

	private function getInstanceController($controller){
		$controller_class_name = Inflector::studly($controller) . SUFIX_CONTROLLER;
		$controller_file = $controller_class_name . '.php';	//devuelve la cadena con formato CamelCase
		$controller_path = $_SERVER{'PATH_BASE'} . DIRECTORY_SEPARATOR .  DIRECTORY_CONTROLLER . DIRECTORY_SEPARATOR . $controller_file;
		if(file_exists($controller_path)){			
			require_once($controller_path);			
			$controller_class_name = "App\\controllers\\$controller_class_name";
			return new $controller_class_name;
		}						
		else			
			die("Error. No existe el controlador 404 not found. $controller_class_name");			
	}

	private function url_user_error(){		
		die("Error 404.");
	}

	function enableAuth(){
		$this->auth = true;
	}
	function disableAuth(){
		$this->auth = false;	
	}
	function isEnableAuth(){
		return $this->auth;
	}

	function userAuth(){		
		return (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true);
	}
}

?>