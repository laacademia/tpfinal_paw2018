<?php  
namespace core;
/**
* https://www.uno-de-piera.com/el-patron-singleton-en-php/
*/
class Notification
{
	const ERROR = 'ERROR', INFO = 'NOTIFICACION';	

	private static $instancia;
	private $list=array();


	 // Un constructor privado evita la creación de un nuevo objeto
    private function __construct() {}

	// método singleton
    public static function instancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        } 
        return self::$instancia;
    }
	// Evita que el objeto se pueda clonar
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
    //-------------------------------------------------------------------

	function clear(){
		$this->list = array();
	}

	function imprimir($level=null,$clear=true){
		echo '<section>';
		foreach ($this->list as $key => $msj) {
			echo '<p>' . $msj['level'] . '. '. $msj['msj'] .'</p>';
		}
		echo '</section>';
		if($clear)
			$this->clear();
	}
	function get_html(){
		$salida = "";
		foreach ($this->list as $key => $msj) {
			$salida .= $msj['level'] . '. '. $msj['msj'] ."\n";
		}
		return $salida;				
	}

	function get(){
		return $this->list;		
	}

	function info($msj){
		$this->add($msj,self::INFO);
	}

	function error($msj){
		$this->add($msj,self::ERROR);
	}
	
	function add($msj,$level=self::ERROR){
		array_push($this->list, array('msj'=>$msj,'level'=>$level));	
	}

	function hasData(){
		return (count($this->list)>0);
	}

	
}

?>