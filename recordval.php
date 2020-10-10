<?php 
include("./include/admin.DBOperation.php");

if (isset($_POST["submit"])) {
	$cus_name = $_POST["cus_name"];
	$cus_id =$_POST["cus_id"];


	$dbo = new AdminDBOperation();
	$result = $dbo->UpdateCusRecord($_POST["cus_id"], $_POST['cus_name']);
	echo $result; 
}




?>