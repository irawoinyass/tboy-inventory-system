<?php


include_once('include/admin.php');
$admin = new Admin();

if (isset($_POST["submit"])) {

	$file = $_FILES['file'];
	 $filename = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
	$filesize = $_FILES['file']['size'];
	$fileerror = $_FILES['file']['error'];
	$filetype = $_FILES['file']['type'];
		$name = $_POST["updatesub_name"];
		$email = $_POST["updatesub_email"];
		$user_id = $_POST["updatesub_id"];

	
	

	$location = 'image/';

		if ($filesize < 1000000) {
			 move_uploaded_file($fileTmpName, $location.$filename);
			 if (!empty($filename)) {
		$result = 	$admin->UpdateSubWithImage($user_id,$name,$filename ,$email, $_POST["updatesub_gender"]);
		echo $result;
				
		}else if(empty($filename)){
				$admin->UpdateSub($user_id,$name, $email, $_POST["updatesub_gender"]);

			

		}
		}else{

				echo '<script> alert("This picture is to big to upload")</script>';
					header("location: admin.access.php");
		}
// $result = 	$admin->UpdateProfileWithImage($user_id,$name,$filename ,$email);
// echo $result;
		

		
	// 		$user = new Student();
 // $result = $user->MakeidCard($_POST["surname"],$_POST["other"],$_POST["matric"],$filename,$_POST["programme"],$_POST["course"],$_POST["level"],$_POST["blood"],$_POST["session"],$_POST["next"],$_POST["add"]);
 // echo $result;

 
	

}










?>