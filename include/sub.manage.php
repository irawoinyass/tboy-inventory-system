<?php


/**
 *  Admin Manage code
 */
class SubAdminManage 
{

private $host, $user, $pass, $db_name;
		public $con;

public function __construct(){
	include("constants.php");
	$this->con = mysqli_connect($this->host=HOST, $this->user=USER, $this->pass=PASS, $this->db_name=DB);

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

?>