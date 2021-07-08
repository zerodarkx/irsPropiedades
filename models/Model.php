<?php

	//clase abstracta que nos permitira conectarnos a MYSQL
abstract class Model
{
	//atributos
	private static 	$db_host			= 'localhost';
	private static 	$db_user			= 'sistema_root';
	private static 	$db_password		= '$_?B+SI%3?W!';
	private static 	$db_name			= 'sistema_intranet';
	private static 	$db_charset 		= 'utf8';
	private 		$conn;
	protected 		$query;
	protected 		$rows 				= array();

	//METODOS
	//metodos abstractos para crud de clases que hereden
	abstract protected function set();
	abstract protected function get();
	abstract protected function del();

	//metodo privado para conectarse a la base de datos
	private function db_open(){
		$this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_password, self::$db_name);
		$this->conn->set_charset(self::$db_charset);
	}

	//metodo privado para desconectarse a la base de datos
	private function db_close(){
		$this->conn->close();
	}

	//ejecutar un query simple (insert, delete, update)
	protected function set_query(){
		// error_log($this->query);
		$this->db_open();
		$val = false;
		if($this->conn->query($this->query)){$val = true;}
		$this->db_close();
		return $val;

	}

	protected function set_query_id(){
		// error_log($this->query);
		$this->db_open();
		$this->conn->query($this->query);
		$id = mysqli_insert_id($this->conn);
		$this->db_close();

		return $id;
	}

	protected function del_query(){
		// error_log($this->query);
		$this->db_open();
		$this->conn->query("SET FOREIGN_KEY_CHECKS=0;");
		$val = false;
		if($this->conn->query($this->query)){$val = true;}
		$this->db_close();
		return $val;
	}
	//trae resultados de una consilta de tipo select en un array
	protected function get_query(){
		// error_log($this->query);
		$this->db_open();
		$result = $this->conn->query($this->query);
		while( $this->rows[] = $result->fetch_assoc());
		$result->close();
		$this->db_close();

		return array_pop($this->rows);
	}

	public function __destruct(){
		$this;
	}
}
?>
