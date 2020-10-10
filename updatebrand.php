<?php


include_once('./include/admin.DBOperation.php');

if (isset($_POST["submit"])) {

$update = new AdminDBOperation();
 $result = $update->UpdateBrand( $_POST["updatebrand_id"],  $_POST["updatebrand_name"] );
 echo $result;

 
	

}










?>