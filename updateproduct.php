<?php


include_once('./include/admin.DBOperation.php');

if (isset($_POST["submit"])) {

$update = new AdminDBOperation();
 $result = $update->UpdateProduct( $_POST["product_id"], $_POST["select_cat"], $_POST["select_brand"], $_POST["product_name"], $_POST["product_price"], $_POST["product_quantity"], $_POST["product_date"] );
 echo $result;

 
	

}










?>