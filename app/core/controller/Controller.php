<?php  

namespace core;
include($_SERVER['PATH_BASE'] . '/conf/constants.php');
require($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_CORE_VIEW);
require_once($_SERVER['PATH_BASE'] . '/core/Notification.php');
/**
* 
*/
class Controller
{
	private $_view;
	private $_layout;
	private $_context;
	public 	$useLayout = true;

	function runAction($action,$params=null){
		//inject parameters
		$method = $this->findAction($action);
		$args_to_inject = array();       
		$reflection = new \ReflectionMethod($this, $method);

		foreach($reflection->getParameters() AS $arg)
		{
		    if(isset($_REQUEST[$arg->name]))
		    	$args_to_inject[$arg->name]=$_REQUEST[$arg->name];
		    else
		    	$args_to_inject[$arg->name]=null;
		}
		return call_user_func_array(array($this, $method), $args_to_inject);
	}

	private function findAction($action){				
		$name_action = PREFIX_ACTION . Inflector::studly($action);
		if(method_exists($this, $name_action)){
			return $name_action;
		}else{
			die("La accion solicitada no existe");
		}
	}

	function render($view, $params=[]){
		$content = $this->getView()->render($view, $params, $this);				//se trae el contenido de la vista
        return $this->renderContent($content,$params);							//dibuja la vista con el layout si se especifico
	}

	public function renderContent($content,$params)
    {        
        if($this->useLayout){
        	$layoutFile = $this->getLayout();
        	$params['content'] = $content;
			return $this->getView()->renderFile($layoutFile, $params);	               	        
        }else{
        	return $content;
        }    	
    }

    function setView($view){
		$this->_view = $view;
	}

	function getView(){
		if(isset($this->_view))
			return $this->_view;
		else
			return new View();
	}

	function get_context(){
		$context = $this->get_name();
		$context = strtolower($context);
		return $context;
	}
	function get_name(){
		$path = explode('\\', get_class($this));										//saco el namespace
		$classname = array_pop($path);				
		$context = substr($classname, 0,strlen($classname)-strlen(SUFIX_CONTROLLER));  //saco el prefijo del controlador
		return $context;
	}

	function getLayout()
	{
		$path_layout = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_VIEWS . DIRECTORY_SEPARATOR . DIRECTORY_VIEW_LAYOUTS . DIRECTORY_SEPARATOR;
		if(isset($this->_layout)){
			$layout_filename = $this->_layout;
		}			
		else{
			$layout_filename = DEFAULT_LAYOUT_FILE;
		}
		return $path_layout . $layout_filename;
	}

	function setLayout($layout_filename){
		$this->_layout = $layout_filename;
	}	

	function getModel($model=null){
		$model = ($model) ? $model : $this->get_context();
		$model = ucfirst($model);
		$model_path = $_SERVER{'PATH_BASE'} . DIRECTORY_SEPARATOR .  DIRECTORY_MODEL . DIRECTORY_SEPARATOR . $model .'.php';
		if(file_exists($model_path)){
			require_once($model_path);
			$model_class_name = "App\\models\\$model";			
			return new $model_class_name();			
		}else
			die("Error. El modelo $model no existe en $model_path");						
	}
	function es_peticion_ajax(){
		return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}
}

?>