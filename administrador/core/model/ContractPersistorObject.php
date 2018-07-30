<?php 
namespace core;

Interface ContractPersistorObject{

	/**
	* Abre la conexion con el medio de persistencia		
	* @return mixed Devuelve la conexion
	*/
	function openConnection();

	/**
	* Cierra la conexion con el medio de persistencia		
	* @param mixed conn Se pasa la conexion si es necesario para cerrarla
	* @return bool
	*/
	function closeConnection($conn = null);	

	/**
	* Devuelve un array asociativo con tuplas
	* @param array $table : tabla a consultar
	* @param string $where : where de la consulta
	* @param string $order_by : order de la consulta
	* @param string $columns: columnas de la consulta
	* @return array
	*/
	function select($table, $where=null,$order_by=null, $columns='*');

	/**
	* Inserta un registro y devuelve el id del nuevo registro
	* @param string $table : nombre de la tabla
	* @param array $values : array asociativo con los valores del registro array('key'=>'value')	
	* @return int
	*/
	function insert($table,$values);

	/**
	* actualiza un registro
	* @param string $table : nombre de la tabla
	* @param array $values : array asociativo con los valores del registro array('key'=>'value')	
	* @param string $where : condicion de la consulta
	* @return void
	*/
	function update($table,$values,$where=null);

	/**
	* borra un registro
	* @param string  : array asociativo con los valores del registro array('key'=>'value')	
	* @return bool
	*/
	function delete($table,$where);

	function getColumns($table);
}

?>