<?php


include_once('admin.DBOperation.php');

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

		
			$student = new AdminDBOperation();
 $result = $student->Addstudent($filename,$_POST["surname"],$_POST["middlename"], $_POST["othername"], $_POST["s_address"], $_POST["s_origin"], $_POST["date_of_birth"], $_POST["s_phone"], $_POST["s_gender"], $_POST["agreement_date"], $_POST["s_course"], $_POST["from_date"], $_POST["to_date"], $_POST["sum_in_words"],$_POST["sum_in_figure"], $_POST["advance"], $_POST["balance"], $_POST["p_name"],$_POST["p_address"], $_POST["p_gender"], $_POST["p_phone"]);
 echo $result;

 
	

}










?>