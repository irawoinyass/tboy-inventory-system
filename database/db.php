<?php 

	class Database{
		private $host, $user, $pass, $db_name;
		public $con;

public function __construct(){
	$this->con = mysqli_connect($this->host="localhost", $this->user="root", $this->pass="", $this->db_name="idcard");
	
			}

	}


//$db = new Database;



?>