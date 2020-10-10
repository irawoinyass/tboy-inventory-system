
<!DOCTYPE html>
<html>
<head>
	<title>TBOY | ADMIN LOGIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="icon" type="image/png" href="./image/Tlogo.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="./include/style.css">

	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<style type="text/css">
		body {
			background: url("./image/02.jpg");
	
		}
	</style>
</head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<?php include("./templates/admin.header.php"); ?>
		<?php include("./templates/forgetpassword.php"); ?>
		

<br><br><br>
<div class="container">
	<?php

		if(isset($_GET['msg']) && !empty($_GET['msg'])){

		?>

		<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
			<?php echo $_GET['msg'];?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			
		</div>
		<?php
	}

		?>
	
		<div class="card mx-auto" style="width: 20rem; box-shadow: 0 0 25px black;">
			<img class="card-img-top mx-auto" style="width: 70%;" src="./image/Tlogo.png" alt="Login">
			<div class="card-body">
			
			<form id="login_form" onsubmit="return false" >
				<div class="form-group">
					<label for="">Username</label>
					<input type="email" name="log_email" id="log_email" class="form-control" placeholder="Email" >
					<small class="form-text text-muted" id="u_error">we'll never share your email with anybody</small>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="log_pass" id="log_pass" class="form-control" placeholder="Password" >
					<small class="form-text text-muted" id="p_error"></small>
				</div>
				<button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-lock"></i> Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span ><a href="#" id="forgetpassword">Forget Password?</a></span>
				
			</form>
			
			</div>
		<!-- 	<div class="card-footer"><a href="#">Forget Password?</a></div> -->
		</div>
	</div>
		
<script type="text/javascript">
	//$('overlay').show();
		
	$('.close').click(function(){

		$('#alert').hide();
	});

	


	 $('#login_form').on("submit", function(){
	
	var log_email = $('#log_email');
	var log_pass = $('#log_pass');
	var status = false;
	//var type = $('#usertype');
	if (log_email.val() == "") {
		log_email.addClass("border-danger");
		$('#u_error').html("<span class='text-danger'>Please Enter Your Email Address</span>");
		status = false;
	}else {

		log_email.removeClass("border-danger");
		$('#u_error').html("");
		status = true;
	}

	if (log_pass.val() == "") {
		log_pass.addClass("border-danger");
		$('#p_error').html("<span class='text-danger'>Please Enter Your password</span>");
		status = false;
	}else {

		log_pass.removeClass("border-danger");
		$('#p_error').html("");
		status = true;
	}
	if (status) {
		$('.overlay').show();
			$.ajax({
			url: "include/admin.process.php",
			method: "POST",
			data: $('#login_form').serialize(),
			success: function(data){
				//alert(data);
				if (data == "EMAIL NOT REGISTERED") {
					$('.overlay').hide();
			log_email.addClass("border-danger");
		$('#u_error').html("<span class='text-danger'> wrong email</span>");
				 }
					else if(data == "PASSWORD NOT REGISTERED") {
						//alert(data);
						$('.overlay').hide();
					log_pass.addClass("border-danger");

					$('#p_error').html("<span class='text-danger'>Please Enter Correct Password</span>");
						status = false;
				 }

					else if (data == 1) {
					$('.overlay').hide();
					window.location.href = encodeURI("index.php");
				}
				 else{
					$('.overlay').hide();
				alert(data);
				}
				
			

			}
		});

	}
	

});


	 $('#forgetpassword').click(function(){
				
				$('#passModal').show();

				$('#passupdis').click(function(){
					$('#passModal').hide();
				});

				$('#passdowndis').click(function(){
					$('#passModal').hide();
				});
			});

	 $('#forget_password_form').on("submit", function(){
	
	var email = $('#email');
	var pass1 = $('#pass1');
	var pass2 = $('#pass2');
	//var status = true;
	//var type = $('#usertype');
	if (email.val() == "") {
		email.addClass("border-danger");
		$('#e_error').html("<span class='text-danger'>Please Enter Your Email Address</span>");
		status = false;
	}else {

		email.removeClass("border-danger");
		$('#e_error').html("");
		status = true;
	}

	if (pass1.val() == "" ) {
		pass1.addClass("border-danger");
		$('#p1_error').html("<span class='text-danger'>The field must not be empty</span>");
		status = false;
	}else {

		pass1.removeClass("border-danger");
		$('#p1_error').html("");
		status = true;
	}


	if (pass2.val() == "" ) {
		pass2.addClass("border-danger");
		$('#p2_error').html("<span class='text-danger'>The field must not be empty</span>");
		status = false;
	}else {

		pass2.removeClass("border-danger");
		$('#p2_error').html("");
		status = true;
	}


	if ((pass1.val() == pass2.val() )){

		//if (status == true) {

			$.ajax({
			url: "include/admin.process.php",
			method: "POST",
			data: $('#forget_password_form').serialize(),
			success: function(data){
				
				if (data == "EMAIL NOT REGISTERED") {
					$('#email').addClass("border-danger");
		$('#e_error').html("<span class='text-danger'>Email not registered</span>");
		

				}else if(data == "SUCCESS") {
			window.location.href = encodeURI(DOMAIN+"/admin.login.php?msg=Password change successfully you can now login");
			$('#email').val("");
				$('#pass1').val("");
					$('#pass2').val("");

				}else{

					alert(data);
					$('#email').val("");
				$('#pass1').val("");
					$('#pass2').val("");
				}
				


			}
		});




		// }else {
			
		// }
		
	
		
		
	}else {

		pass2.addClass("border-danger");
		$('#p2_error').html("<span class='text-danger'>Password Not Matched</span>");
		status = true;

	}
	

});


</script>
</body>
</html>