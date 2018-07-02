<?php 
/*
Para getters y setters
https://styde.net/uso-de-metodos-magicos-en-php/

*/
namespace core;

require_once($_SERVER['PATH_BASE'] . '/core/Notification.php');

class Model{

	protected $persistor;
	protected $table;	
	private $relations  = array();	
	private $properties = array();
	private $writable = array();
	protected $columns;
	protected $obligatory_columns = array();
	protected $blobs;

	function __construct(){
		//instancio la clase del motor de db	
		$configs = include($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_CONF . DIRECTORY_SEPARATOR . 'config.php');
		$persistor_name = 'Persistor'.ucfirst($configs['db']['engine']);
		require_once($_SERVER{'PATH_BASE'} . DIRECTORY_SEPARATOR .  'core/model' . DIRECTORY_SEPARATOR . $persistor_name.'.php');	
		$persistor_name = "core\\$persistor_name";		
		
		$this->persistor = new $persistor_name($configs['db']);
		$this->loadRelations();
		if(!isset($this->columns) || empty($this->columns))
			$this->columns = $this->persistor->getColumns($this->table());
	}

	function __get($name) {				
		//Por ej. numero_dias llamar al metodo getNumeroDias dentro del objeto
        $dynamicMethod = 'get' . Inflector::studly($name); 			//cadena en formato CamelCase                 

        if (method_exists($this, $dynamicMethod))					//Si existe lo llamamos     
            return $this->$dynamicMethod();

        return array_key_exists($name, $this->properties) ? $this->properties[$name] : null;
	}

	function __set($prop, $val) {		
        $dynamicMethod = 'set' . Inflector::studly($prop);
	    if(method_exists($this, $dynamicMethod))
	    {
	        $this->$dynamicMethod($prop, $val);
	    }
	    else
	    {
	    	if(array_key_exists($prop, $this->columns))
        		$this->properties[$prop] = $val;  
	    }
    }

	function add($row){
		$this->fill($row);
		if($this->validate_obligatory())
			$this->persistor->insert($this->table(),$this->properties);		
		return $this->validate_obligatory();
	}
	function get($id){				
		return $this->persistor->select($this->table(),"id=$id");
	}
	function getAll(){
		return $this->persistor->select($this->table());
	}
	function del($id){
		$this->persistor->delete($this->table(),'id='.$id);
	}	
	function upd($row){
		$this->fill($row);
		if($this->validate_obligatory())
			$this->persistor->update($this->table(),$this->properties,'id='.$row['id']);
	}

	function load($id){		
		$data = $this->get($id);				
		foreach ($data[0] as $key => $value) {
			if(in_array($key, $this->columns))
				$this->properties[$key] = $value;
		}
		return $this;
	}
	function fill($row){
		//cargo los campos		
		foreach ($row as $key => $value) {			
			//if(in_array($key, $this->columns)){
			if(in_array($key, $this->getColumns())){
				$this->properties[$key] = $value;
			}
		}		
		//cargo los blobs
		if(!empty($this->blobs)){

			foreach ($this->blobs as $key => $value) {
				if(isset($_FILES[$key]) && ($_FILES[$key]['size'])>0){
					if ($_FILES[$key]['size'] > $this->blobs[$key]['maxsize']) {				        
				        //die("Exceeded filesize limit.");				        
				        Notification::instancia()->error('El tamaño de la imagen supera el maximo');        
				    }else{
				    	$fp = fopen($_FILES[$key]['tmp_name'], "r");
						if ($fp) {			// If successful, read from the file pointer using the size of the file (in bytes) as the length.
							$content = fread($fp, $_FILES[$key]['size']);
							fclose($fp);
							$content = addslashes($content);
							$property_blob = $this->blobs[$key]['blob_column'];
							$type_blob = $this->blobs[$key]['type_column'];

							$this->properties[$property_blob] = $content;
							$this->properties[$type_blob] = $_FILES[$key]['type'];
						}	
				    }										
				}
			}
		}		
	}

	function find($where){
		return $this->persistor->select($this->table(),$where);
	}

	function table(){
		if(isset($this->table) && !empty($this->table) && $this->table!=""){			
			return $this->table;
		}
		else{
			$path = explode('\\', get_class($this));										//saco el namespace
			$classname = array_pop($path);							
			return strtolower($classname);
		}		
	}

	//agrega relaciones entre modelos
	function addRelation($model, $relation){
		$new_relation = array('model'=>$model, 'relation'=>$relation);		
		$this->relations[$model] = $new_relation;
	}

	function getDataRelation($model){
		$model_uc = ucfirst($model);
		$model_path = $_SERVER{'PATH_BASE'} . DIRECTORY_SEPARATOR .  DIRECTORY_MODEL . DIRECTORY_SEPARATOR . $model_uc .'.php';

		if(file_exists($model_path)){			
			require_once($model_path);										
			$model_class_name = "App\\models\\$model_uc";
			$objModel = new $model_class_name($this->persistor);
			//traigo los ids relacionados
			$key = key($this->relations[$model]['relation']);
			$value = $this->relations[$model]['relation'][$key];
			$where = "{$this->properties[$key]}=$value";
			$ids = $this->persistor->select($objModel->table(), $where, null,'id');
		
			//armo una lista con los objetos relacionados		
			$arr = array();
			foreach ($ids as $key => $id) {
				$objModel = new $model_class_name($this->persistor);
				$arr[$key] = $objModel->load($id['id']);
			}
			return $arr;
		}else{
			//$no = unserialize($_SESSION['Notificacion']);
			Notification::error();
			die('No se encuentra el modelo $modelo');
		}
	}

	function loadRelations(){}

	function getColumns(){		
		$datos = (isset($this->columns)&&!empty($this->columns)) ? $this->columns : $this->persistor->getColumns($this->table());
		//var_dump($datos);
		return $datos;
	}

	function validate_obligatory(){
		$ok = true;
		foreach ($this->obligatory_columns as $key => $value) {
			if(!in_array($value, array_keys($this->properties))){				
				\core\Notification::instancia()->error("El campo $value es obligatorio");
				$ok = false;
			}else{
				if($this->properties[$value]==""){
					\core\Notification::instancia()->error("El campo $value es obligatorio");
					$ok = false;
				}
			}
		}
		return $ok;
	}
        
        function maxId(){
            return $this->persistor->maxId($this->table());
        }
}
?>