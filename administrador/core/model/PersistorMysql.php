<?php  
namespace core;

require_once('ContractPersistorObject.php');
/**
* 
*/
class PersistorMysql implements \core\ContractPersistorObject
{		
	private $params;
	public function openConnection(){
		
		try {
			$configs = include($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_CONF . DIRECTORY_SEPARATOR . 'config.php');
			extract($configs['db']);
			return new \PDO("mysql:host=$host;dbname=$dbname",$user,$password);	
		}  catch (PDOException $e) {
            echo "Error PDOException: " . $e->getMessage();
            die();
        }
	}
	public function closeConnection($conn = null){}
	
	function insert($table,$values){
		$keys = implode(',',array_keys($values));
		foreach ($values as $key => $value) {
			$values[$key] = "'$value'";
		}
		$values = implode(',',array_values($values));
		$db = $this->openConnection();		
        $query = $db->prepare("INSERT INTO $table($keys) VALUES ($values)");
        //echo "INSERT INTO $table($keys) VALUES ($values)";
        $query->execute();
        $this->closeConnection();
	}

	function select($table, $where=null,$order_by=null, $columns='*'){
		$where = ($where) ?" WHERE $where ":"";
		$order_by = ($order_by) ? " ORDER BY $order_by " : "";
		$db = $this->openConnection();		
        $query = $db->prepare("SELECT $columns FROM $table $where $order_by;");        
        $query->execute();        
        $rows = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        $this->closeConnection();        
        return $rows;
	}

	function update($table,$values,$where=null){
		$where = ($where) ?" WHERE $where ":"";		
		$str_values = '';
		
		foreach ($values as $key => $value) {
			if(isset($value) && !empty($value))
				$str_values .= " $key='$value',";
		}
		$str_values = rtrim($str_values,",");
		$db = $this->openConnection();		
        $query = $db->prepare("UPDATE $table SET $str_values $where");
        //echo "UPDATE $table SET $str_values $where";
        $query->execute();
        $this->closeConnection();
	}
	function delete($table,$where=null){
		$db = $this->openConnection();
		$where = ($where) ?" WHERE $where ":"";
		//echo "DELETE FROM $table $where";
		$query = $db->prepare("DELETE FROM $table $where");
        $query->execute();
        $this->closeConnection();
	}

	public function getColumns($table){					
		$db = $this->openConnection();						
        //$query = $db->prepare("SELECT * FROM $table limit 1;");
        $query = $db->prepare("DESCRIBE $table;");        
        $query->execute();        
        $rows = $query->fetchAll(\PDO::FETCH_ASSOC);                
        $this->closeConnection();        
        return (count($rows)>0) ? array_column($rows, 'Field') : null;
	}
        
        function maxId($table){
            $db = $this->openConnection();						
            //$query = $db->prepare("SELECT * FROM $table limit 1;");
            $query = $db->prepare("select max(id) as id from $table"); 
            //echo "select max(id) as id from $table";
            $query->execute();        
            $rows = $query->fetchAll(\PDO::FETCH_ASSOC);   
            //print_r($rows);
            $this->closeConnection();        
            return (count($rows)>0) ? $rows[0]['id'] : 0;
        }

}

?>