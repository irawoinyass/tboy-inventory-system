<?php


include_once('./include/admin.DBOperation.php');

if (isset($_POST["submit"])) {

	
		
			$update = new AdminDBOperation();
 $result = $update->UpdateCategories( $_POST["upcat_id"], $_POST["upparent_cat"], $_POST["upcat_name"] );
 echo $result;

 
	

}










?>