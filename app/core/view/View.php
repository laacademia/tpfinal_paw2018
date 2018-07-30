<?php 
namespace core;

require_once($_SERVER['PATH_BASE'] . '/core/Notification.php');
/**
* 
*/
class View
{
	/* 
		Busca la vista en la carpeta /views/{$this->_context}/{$this->_view}
	*/
	private $_layout; 
    private $_title;

	function render($view, $params = [], $context = null){        
		$view_path = $this->findViewFile($view, $context);		        
		return $this->renderFile($view_path, $params);
	}

	protected function findViewFile($view, $context = null){
		$_context = $context->get_context();		
		$view_path = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_VIEWS . DIRECTORY_SEPARATOR . $_context . DIRECTORY_SEPARATOR . $view . '.php';
		if(file_exists($view_path))
			return $view_path;
		else
			die('No se encontro la vista :'.$view_path);
	}

	public function renderFile($viewFile, $params = [])
    {               
        ob_start();
        ob_implicit_flush(false);        
        if(is_array($params) && count($params)>0)
            extract($params, EXTR_OVERWRITE);        
        require($viewFile);
        return ob_get_clean();
    }

	public function renderPhpFile($_file_, $_params_ = [])
    {
        ob_start();
        ob_implicit_flush(false);        
        extract($_params_, EXTR_OVERWRITE);
        require($_file_);
        return ob_get_clean();
    }

    function setLayout($path_layout){    	
    	$this->_layout = $path_layout;
    }
    function getLayout(){
    	return $this->_layout;
    }
    function setTitle($title){
        $this->_title = $title;
    }
    function getTitle(){
        return $this->_title;
    }

    function importView($view_file){
        $view_path = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_VIEWS . DIRECTORY_SEPARATOR . $view_file;
        if(file_exists($view_path))
            require $view_path;
    }

}

 ?>