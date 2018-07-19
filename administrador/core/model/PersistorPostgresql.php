<?php  
namespace core;

require_once('ContractPersistorObject.php');
/**
* 
*/
class PersistorPostgresql implements \core\ContractPersistorObject
{		
	public function openConnection(){
		
		try {
			$configs = include($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_CONF . DIRECTORY_SEPARATOR . 'config.php');
			extract($configs['db']);			
			$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password") or die('connection failed');						
			return $conn;
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
        $con = $this->openConnection();
        $query = "INSERT INTO $table($keys) VALUES ($values);";        
        $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
        $this->closeConnection();
	}

	function select($table, $where=null,$order_by=null, $columns='*'){
		$where = ($where) ?" WHERE $where ":"";
		$order_by = ($order_by) ? " ORDER BY $order_by " : "";
		$con = $this->openConnection();
        $query = "SELECT $columns FROM $table $where $order_by;";
        //echo $query;
        $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
        $this->closeConnection();
        $data = pg_fetch_all($rs);
        return (is_bool($data)) ? array() : $data;
	}

	function update($table,$values,$where=null){
		$where = ($where) ?" WHERE $where ":"";		
		$str_values = '';
		foreach ($values as $key => $value) {
			if(isset($value))
				$str_values .= " $key='$value',";
		}
		$str_values = rtrim($str_values,",");
		$db = $this->openConnection();
		//echo "UPDATE $table SET $str_values $where";
        //$query = $db->prepare("UPDATE $table SET $str_values $where");
        pg_query($db, "UPDATE $table SET $str_values $where") or die("Cannot execute query: $query\n");
        //$query->execute();
        $this->closeConnection();
	}
	function delete($table,$where){
		$con = $this->openConnection();
		$where = ($where) ?" WHERE $where ":"";
		$query = "DELETE FROM $table $where";
        $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
        $this->closeConnection();        
	}

	public function getColumns($table){							
        $con = $this->openConnection();
        $query = "SELECT column_name FROM information_schema.columns WHERE table_schema = 'public' AND table_name   = '$table'";        
        $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");        
        $this->closeConnection();
        $rows = pg_fetch_all($rs);                 
        return (count($rows)>0) ? array_column($rows, 'column_name') : null;

	}

}

?>