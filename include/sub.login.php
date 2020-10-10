<?php 

	class SubAdmin{
		private $host, $user, $pass, $db_name;
		public $con;

public function __construct(){
	include("constants.php");
	$this->con = mysqli_connect($this->host=HOST, $this->user=USER, $this->pass=PASS, $this->db_name=DB);

	}



	public function EmailExists($table, $field, $value) {

			$table = mysqli_real_escape_string($this->con, $table);
				$field = mysqli_real_escape_string($this->con, $field);
					$value = mysqli_real_escape_string($this->con, $value);

		$query = "SELECT `a_id` FROM ".$table." WHERE ".$field." = '$value' AND type = 'Sub_Admin' ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run) > 0) {
			return 1;
		}else{
			return 0;
		}


		}




		public function SubAdminLogin($email, $password){

			$email = mysqli_real_escape_string($this->con, $email);
			$password = mysqli_real_escape_string($this->con, $password);
			$pass = md5($password);


		if (!$this->EmailExists("admin", "a_email", $email)) {
			return "EMAIL NOT REGISTERED";
		}elseif (!$this->EmailExists("admin", "a_password", $pass)) {
			return "PASSWORD NOT REGISTERED";
		}else {

	$query = ("SELECT a_id FROM admin WHERE a_email = '$email' ");
		$query_run = mysqli_query($this->con,$query);

		while ($row = mysqli_fetch_assoc($query_run)) {

			$pash_hash = md5($password);
	 		// if ($password = $row["a_password"]) {
	 			session_start();
	 
 		$_SESSION["Sub_Admin"] = $row["a_id"];
	 	

	 	$last_login = date("Y-m-d h:i:s");
	 	$query1 = "UPDATE admin SET a_last_login = '$last_login' WHERE a_email = '$email' ";
	 	$query_run1 = mysqli_query($this->con,$query1);
	 	if ($query_run1) {
	 		return 1;
	 	}else {
	 		return 0;
	 	}



			}


		}

	}


public function getSigleRecord($table, $pk, $id) {

		$table = mysqli_real_escape_string($this->con, $table);
	$pk = mysqli_real_escape_string($this->con, $pk);
  $id = (int)$id;
$rows = array();
		$query = "SELECT * FROM ".$table." WHERE ".$pk." = {$id} ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run)  > 0) {
			while($row = mysqli_fetch_assoc($query_run)){
				$rows[] = $row;

			}
			
		}
		return $rows;
		
	}


}

	?>