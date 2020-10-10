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
		$name = $_POST["a_username"];
		$email = $_POST["a_email"];
		$user_id = $_POST["user_id"];
	
	

	$location = 'image/';

		if ($filesize < 1000000) {
			 move_uploaded_file($fileTmpName, $location.$filename);
			 if (!empty($filename)) {
		$result = 	$admin->UpdateProfileWithImage($user_id,$name,$filename ,$email);
		echo $result;
				
		}else if(empty($filename)){
				$admin->UpdateProfile($user_id,$name, $email);

			

		}
		}else{

				echo '<script> alert("This picture is to big to upload")</script>';
					header("location: admin.profile.php");
		}
// $result = 	$admin->UpdateProfileWithImage($user_id,$name,$filename ,$email);
// echo $result;
		

		
	// 		$user = new Student();
 // $result = $user->MakeidCard($_POST["surname"],$_POST["other"],$_POST["matric"],$filename,$_POST["programme"],$_POST["course"],$_POST["level"],$_POST["blood"],$_POST["session"],$_POST["next"],$_POST["add"]);
 // echo $result;

 
	

}










?>