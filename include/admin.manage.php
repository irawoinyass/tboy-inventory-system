<?php


/**
 *  Admin Manage code
 */
class AdminManage 
{

private $host, $user, $pass, $db_name;
		public $con;

public function __construct(){
	include("constants.php");
	$this->con = mysqli_connect($this->host=HOST, $this->user=USER, $this->pass=PASS, $this->db_name=DB);

	}



public function getSub($table, $pno) {
$a = $this->pagination($this->con, $table,$pno, 5);

if ($table == "admin") {
	$sql = "SELECT * FROM admin WHERE type = 'Sub_Admin' ".$a["limit"];

$result = mysqli_query($this->con,$sql);
$rows = array();
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}
}
return ["rows"=>$rows, "pagination"=>$a["pagination"]];
}

}


public function getCus($table, $pno) {
$a = $this->pagination($this->con, $table,$pno, 5);

if ($table == "invoice") {
	$sql = "SELECT * FROM invoice JOIN admin ON admin.a_name = invoice.in_user_name ORDER BY invoice_no DESC ".$a["limit"];

$result = mysqli_query($this->con,$sql);
$rows = array();
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}
}
return ["rows"=>$rows, "pagination"=>$a["pagination"]];
}

}


public function getPro($table, $pno) {
$a = $this->pagination($this->con, $table,$pno, 5);

if ($table == "products") {
	$sql = "SELECT * FROM products JOIN categories ON products.cid = categories.cid JOIN brands ON products.bid = brands.bid JOIN admin ON products.poster_id = a_id ".$a["limit"];

$result = mysqli_query($this->con,$sql);
$rows = array();
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}
}
return ["rows"=>$rows, "pagination"=>$a["pagination"]];
}

}



public function getCat($table, $pno) {
$a = $this->pagination($this->con, $table,$pno, 5);

if ($table == "categories") {
	$sql = "SELECT p.category_name as category, p.cid as id, c.category_name as parent, p.status FROM categories p LEFT JOIN categories c ON p.parent_cat =c.cid ".$a["limit"];

$result = mysqli_query($this->con,$sql);
$rows = array();
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}
}
return ["rows"=>$rows, "pagination"=>$a["pagination"]];
}

}



private function pagination($con,$table,$pno,$n){

	$query = mysqli_query($this->con,"SELECT COUNT(*) as rows FROM ".$table);

	$row = mysqli_fetch_assoc($query);

	//$totalRecords = 100000;

	$pageno = $pno;

	$numberOfRecordsPerPage = $n;


	$last = ceil($row["rows"]/$numberOfRecordsPerPage);
	//echo "total page ".$last. " <br>";


	$pagination = "<ul class='pagination'>";


	if ($last != 1) {

		if ($pageno > 1) {

			$previous = "";

			$previous = $pageno - 1;

			$pagination .= "<li class='page-item'><a class='page-link' pn='".$previous."' href='#' style='color:#333;'> Previous </a></li>";

		}

		for($i=$pageno - 5;$i< $pageno ;$i++){

			if ($i > 0) {

				$pagination .= "<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";

			}

			
		}

		$pagination .= "<li class='page-item'><a class='page-link' pn='".$pageno."' href='#' style='color:#333;'> $pageno </a></li>";

		for ($i=$pageno + 1; $i <= $last; $i++) { 

			$pagination .= "<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";

			if ($i > $pageno + 4) {

				break;

			}

		}

		if ($last > $pageno) {

			$next = $pageno + 1;

			$pagination .= "<li class='page-item'><a class='page-link' pn='".$next."' href='#' style='color:#333;'> Next </a></li></ul>";

		}

	}

//LIMIT 0,10

	//LIMIT 20,10

	$limit = "LIMIT ".($pageno - 1) * $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;


	return ["pagination"=>$pagination,"limit"=>$limit];

}








public function deleteRecords($table,$pk, $id) {

	$table = mysqli_real_escape_string($this->con, $table);
	$pk = mysqli_real_escape_string($this->con, $pk);
	$id = (int)$id;

		if ($table == "categories") {
			$query1 = "SELECT {$id} FROM categories WHERE parent_cat = {$id} ";
			$query_run1 = mysqli_query($this->con,$query1);
			if (mysqli_num_rows($query_run1) > 0 ){
				return "DEPENDENT_CATEGORY";
			} 
			else {
				$query2 = "DELETE FROM {$table} WHERE {$pk} = {$id} ";

			$query_run2 = mysqli_query($this->con,$query2);
			 
			if ($query_run2) {
				return "CATEGORY_DELETED";
			}
			}
		}else {
			$query3 = "DELETE FROM {$table} WHERE {$pk} = {$id} ";
			$query_run3 = mysqli_query($this->con,$query3);
			if ($query_run3) {
				return "DELETED";
			}
		}

	}

public function getbrand($table, $pno) {
$a = $this->pagination($this->con, $table,$pno, 5);

if ($table == "brands") {
	$sql = "SELECT * FROM `brands` ".$a["limit"];

$result = mysqli_query($this->con,$sql);
$rows = array();
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}
}
return ["rows"=>$rows, "pagination"=>$a["pagination"]];

}

}



public function getstudent($table, $pno) {
$a = $this->pagination($this->con, $table,$pno, 5);

if ($table == "students") {
	$sql = "SELECT * FROM `students` ".$a["limit"];

$result = mysqli_query($this->con,$sql);
$rows = array();
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}
}
return ["rows"=>$rows, "pagination"=>$a["pagination"]];

}

}



	public function getSigleRecord2($table, $pk, $value) {

		$table = mysqli_real_escape_string($this->con, $table);
	$pk = mysqli_real_escape_string($this->con, $pk);
	$value = mysqli_real_escape_string($this->con, $value);
 
$rows = array();
		$query = "SELECT * FROM ".$table." WHERE ".$pk." = '$value' ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run)  > 0) {
			while($row = mysqli_fetch_assoc($query_run)){
				$rows[] = $row;

			}
			
		}
		return ["rows"=>$rows];
		
	}


public function getSigleRecord4($table, $pk, $id) {

		$table = mysqli_real_escape_string($this->con, $table);
	$pk = mysqli_real_escape_string($this->con, $pk);

  $id = (int)$id;
//$rows = array();
		$query = "SELECT * FROM ".$table." WHERE ".$pk." = {$id} ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run)  > 0) {
			while($row = mysqli_fetch_assoc($query_run)){
				return $row;

			}
			
			
		}
		
		
	}

	
}





//  $ma = new AdminManage;
//  $record = $ma->getSigleRecord4("admin", "a_id", 1);
//  //print_r($record);
// foreach ($record as $row) {
// 	return $row['a_name'];
// }








?>