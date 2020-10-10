<?php 

	class Admin{
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

		$query = "SELECT `a_id` FROM ".$table." WHERE ".$field." = '$value' AND type = 'Admin' ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run) > 0) {
			return 1;
		}else{
			return 0;
		}


		}


	// Admin login
public function AdminLogin($email, $password){

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
	 
 		$_SESSION["Admin"] = $row["a_id"];
	 	

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


public function UpdateProfile($id,$username, $email){
			$id = mysqli_real_escape_string($this->con, $id);
			$username = mysqli_real_escape_string($this->con, $username);
			$email = mysqli_real_escape_string($this->con, $email);

			$update = "UPDATE `admin` SET `a_name`='$username',`a_email`='$email' WHERE `a_id` = '$id' ";
			$update_run = mysqli_query($this->con, $update);

			if ($update_run) {
				
				header("location: admin.profile.php");
			}else {
					header("location: admin.profile.php");
				
			}


		}


		public function UpdateProfileWithImage($id, $username, $image ,$email){
			$id = mysqli_real_escape_string($this->con, $id);
			$username = mysqli_real_escape_string($this->con, $username);
			$email = mysqli_real_escape_string($this->con, $email);
			$image = mysqli_real_escape_string($this->con, $image);

			$update = "UPDATE `admin` SET `a_name`='$username',`a_image`='$image', `a_email`='$email' WHERE `a_id` = '$id' ";
			$update_run = mysqli_query($this->con, $update);

			if ($update_run) {
	
					header("location: admin.profile.php");
				//header("location: index.php");
			}else {
			
					header("location: admin.profile.php");
			}


		}


				public function ForgetPassword($email, $password){
			$email = mysqli_real_escape_string($this->con, $email);
	$password = mysqli_real_escape_string($this->con, $password);
$pash_hash = md5($password);
	if (!$this->EmailExists("admin", "a_email", $email)) {
		return  "EMAIL NOT REGISTERED";
	}else {


		$query = " UPDATE admin SET a_password = '$pash_hash' WHERE a_email = '$email' ";
		$query_run = mysqli_query($this->con, $query);

		if ($query_run) {
			return "SUCCESS";
		}else {
			return "ERROR";
		}


	}

	
		}



public function Exists($table, $field, $value) {

			$table = mysqli_real_escape_string($this->con, $table);
				$field = mysqli_real_escape_string($this->con, $field);
					$value = mysqli_real_escape_string($this->con, $value);

		$query = "SELECT `id` FROM ".$table." WHERE ".$field." = '$value' ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run) > 0) {
			return 1;
		}else{
			return 0;
		}


		}


		public function Check($surname, $middlename, $othername) {

			$surname = mysqli_real_escape_string($this->con, $surname);
				$middlename = mysqli_real_escape_string($this->con, $middlename);
					$othername = mysqli_real_escape_string($this->con, $othername);

		$query = "SELECT `id` FROM students WHERE surname = '$surname' AND middlename = '$middlename' AND othername = '$othername' ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run) > 0) {
			return 1;
		}else{
			return 0;
		}


		}



	

	public function Addstudent($image,$surname,$middlename, $othername, $student_address, $state_of_origin, $date_of_birth, $phone_no, $sex, $agreement_date, $course, $from_date, $to_date, $sum_in_word, $sum_in_no, $advance, $balance, $p_name, $p_address, $p_sex, $p_phone_no){

			$image = mysqli_real_escape_string($this->con, $image);
			$surname = mysqli_real_escape_string($this->con, $surname);
			$middlename = mysqli_real_escape_string($this->con, $middlename);
			$othername = mysqli_real_escape_string($this->con, $othername);
			$student_address = mysqli_real_escape_string($this->con, $student_address);
			$state_of_origin = mysqli_real_escape_string($this->con, $state_of_origin);
			$date_of_birth = mysqli_real_escape_string($this->con, $date_of_birth);


			$phone_no = mysqli_real_escape_string($this->con, $phone_no);
			$sex = mysqli_real_escape_string($this->con, $sex);
			$agreement_date = mysqli_real_escape_string($this->con, $agreement_date);
			$course = mysqli_real_escape_string($this->con, $course);
			$from_date = mysqli_real_escape_string($this->con, $from_date);



			$to_date = mysqli_real_escape_string($this->con, $to_date);
			$sum_in_word = mysqli_real_escape_string($this->con, $sum_in_word);
			$sum_in_no = mysqli_real_escape_string($this->con, $sum_in_no);
			$advance = mysqli_real_escape_string($this->con, $advance);
			$balance = mysqli_real_escape_string($this->con, $balance);


			$p_name = mysqli_real_escape_string($this->con, $p_name);
			$p_address = mysqli_real_escape_string($this->con, $p_address);
			$p_sex = mysqli_real_escape_string($this->con, $p_sex);
			$p_phone_no = mysqli_real_escape_string($this->con, $p_phone_no);
		

		if ($this->Check($surname, $middlename, $othername) ) {
			return '<script>alert("There is exixtence of this student , surname, middlename and othername");</script>';
			
		}elseif ($this->Exists("students", "photo", $photo)) {

			return '<script>alert("No Dublication of Prisoner photo name");</script>';
		}else {
			$query = "INSERT INTO `students`(`sid`, `image`, `surname`, `middlename`, `othername`, `student_address`, `state_of_origin`, `date_of_birth`, `phone_no`, `sex`, `agreement_date`, `course`, `from_date`, `to_date`, `sum_in_word`, `sun_in_no`, `advance`, `balance`, `p_name`, `p_address`, `p_sex`, `p_phone_no`) VALUES (null,'$image','$surname','$middlename','$othername',$student_address,'$state_of_origin','$date_of_birth','$phone_no','$sex','$agreement_date','$course',$from_date,'$to_date','$sum_in_word','$sum_in_no','$advance','$balance','$p_name',$p_address,'$p_sex','$p_phone_no')";
			$query_run = mysqli_query($this->con, $query);

			if ($query_run) {
					return '<script>alert("Submitted to the database successfully");</script>';
				
				//header("location: generate.php?matric=$matric");
			}else {
				return '<script>alert("Error");</script>';
				
			}


		}

	}




public function UpdateAlert($invoice_no){

		$updatehome = " UPDATE invoice SET alert = 1 WHERE invoice_no = '$invoice_no' ";
		$updatehome_run = mysqli_query($this->con, $updatehome);


	}


	public function GethomeAlert($table) {

		$table = mysqli_real_escape_string($this->con, $table);
	
$rows = array();
		$query = "SELECT * FROM ".$table." ORDER BY invoice_no DESC";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run)  > 0) {
			while($row = mysqli_fetch_assoc($query_run)){
				$rows[] = $row;

			}
			
		}
		return $rows;
		
	}


public function Subcheck($table, $field, $value) {

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



		public function RegSub($name, $image, $email,$password,$gender){

					$name = mysqli_real_escape_string($this->con, $name);
				$image = mysqli_real_escape_string($this->con, $image);
					$email = mysqli_real_escape_string($this->con, $email);
					$password = mysqli_real_escape_string($this->con, $password);
				$gender = mysqli_real_escape_string($this->con, $gender);
				$pash_hash = md5($password);

			if ($this->Subcheck("admin", "a_name", $name)) {

				return $name." ALEADY EXISTS ";

			}else if ($this->Subcheck("admin", "a_email", $email)) {

				return $email." ALEADY EXISTS";

			}else if ($this->Subcheck("admin", "a_image", $email)) {

				return $image." ALEADY EXISTS";
			}else {

				$Sub_Admin = "Sub_Admin";

	$insert = " INSERT INTO `admin`( `a_name`, `a_image`, `type`, `a_email`, `a_password`, `gender`) VALUES ('$name','$image','$Sub_Admin','$email','$pash_hash','$gender') ";

			$insert_run = mysqli_query($this->con, $insert);

			if ($insert_run) {

			 //return "DONE";
				header("Location: admin.access.php");

			}else{
				header("Location: admin.access.php");
				//return "Error";
			}


			}


		}



		public function Getsales($table, $pk, $date) {

		$table = mysqli_real_escape_string($this->con, $table);
	$pk = mysqli_real_escape_string($this->con, $pk);
		$date = mysqli_real_escape_string($this->con, $date);
  //$id = (int)$id;
$rows = array();
$sum = 0;
		$query = "SELECT SUM(paid) AS p FROM ".$table." WHERE ".$pk." = '$date' ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run)  > 0) {
			while($row = mysqli_fetch_assoc($query_run)){
				$rows[] = $row;

			}
			
		}
		return $rows;
		
	}


	public function count($table){
	$table = mysqli_real_escape_string($this->con, $table);
	// $pk = mysqli_real_escape_string($this->con, $pk);
	// 	$data = mysqli_real_escape_string($this->con, $data);
		$count = "SELECT * FROM ".$table;
		$count_run = mysqli_query($this->con,$count);

		if ($count_run) {
			$num = mysqli_num_rows($count_run);
		}
		return $num;
	}


	public function countSub($table, $pk, $data){
	$table = mysqli_real_escape_string($this->con, $table);
	$pk = mysqli_real_escape_string($this->con, $pk);
		$data = mysqli_real_escape_string($this->con, $data);
		$count = "SELECT * FROM ".$table." WHERE ".$pk." = '$data' ";
		$count_run = mysqli_query($this->con,$count);

		if ($count_run) {
			$num = mysqli_num_rows($count_run);
		}
		return $num;
	}


		public function countAlert(){

		$count = "SELECT * FROM invoice WHERE alert = 0 ";
		$count_run = mysqli_query($this->con,$count);

		if ($count_run) {
			$num = mysqli_num_rows($count_run);
		}
		return $num;
	}


public function UpdateSub($id,$username, $email,$gender){
			$id = mysqli_real_escape_string($this->con, $id);
			$username = mysqli_real_escape_string($this->con, $username);
			$email = mysqli_real_escape_string($this->con, $email);
						$gender = mysqli_real_escape_string($this->con, $gender);

			$update = " UPDATE `admin` SET `a_name`='$username',`a_email`='$email', `gender` = '$gender' WHERE `a_id` = '$id' ";
			$update_run = mysqli_query($this->con, $update);

			if ($update_run) {
				
				header("location: admin.access.php");
			}else {
					header("location: admin.access.php");
				
			}


		}


		public function UpdateSubWithImage($id, $username, $image ,$email,$gender){
			
			$id = mysqli_real_escape_string($this->con, $id);
			$username = mysqli_real_escape_string($this->con, $username);
			$email = mysqli_real_escape_string($this->con, $email);
			$image = mysqli_real_escape_string($this->con, $image);
				$gender = mysqli_real_escape_string($this->con, $gender);

			$update = "UPDATE `admin` SET `a_name`='$username',`a_image`='$image', `a_email`='$email', `gender` = '$gender' WHERE `a_id` = '$id' ";
			$update_run = mysqli_query($this->con, $update);

			if ($update_run) {
	
					header("location: admin.access.php");
				//header("location: index.php");
			}else {
			
					header("location: admin.access.php");
			}


		}


	}


//    $db = new Admin;
//  $date = date("Y-m-d");
//  $b = $db->Getsales("invoice", "order_date", $date);

// foreach ($b as $key) {
// 	echo $key["p"];
// }
// // // echo $_SESSION["Admin"];
// // echo $db->countAlert();




?>