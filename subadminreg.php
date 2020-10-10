<?php


include_once('./include/admin.php');

if (isset($_POST["submit"])) {

	$file = $_FILES['file'];
$filename = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
	$filesize = $_FILES['file']['size'];
	$fileerror = $_FILES['file']['error'];
	$filetype = $_FILES['file']['type'];

	$location = 'image/';


		if ($filesize < 1000000) {
			 move_uploaded_file($fileTmpName, $location.$filename);
		}else{

				echo '<script>alert("This picture is to big to upload")</script>';
		}

		
			$sub = new Admin();
 $result = $sub->RegSub($_POST["sub_name"], $filename, $_POST["sub_email"],$_POST["sub_password"],$_POST["sub_gender"]); 
 echo $result;

 
	

}










?>