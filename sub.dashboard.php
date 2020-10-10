<?php
session_start();
if(!isset($_SESSION['Sub_Admin'])){
header("location: sub.login.php");
}else{

//session_destroy();
	//echo $_SESSION["Admin"];
	include_once("./include/sub.login.php");

	$Admin = new SubAdmin();
	$users = $Admin->getSigleRecord("admin", "a_id", $_SESSION["Sub_Admin"]);
	foreach ($users as $user) {
		$name = $user["a_name"];
		$email = $user["a_email"];
		$last_login = $user["a_last_login"];
		$photo = $user["a_image"];

	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>SUB ADMIN | DASHBOARD</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="./include/style.css">
 <link rel="icon" type="image/png" href="./image/Tlogo.png">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<style type="text/css">
		#image {
			border-radius: 50px;
		/*	box-shadow: 1000px;*/
		}
		body {
			background-image: url("image/02.jpg");
		}
		img {
			border-radius: 150px;


		}

		#first {
			background: purple;
		}
		i{
			color: #fff;
		}

		/*#j {
			background: gray;
		}*/
	</style>
</head>
<body>
	<?php include("./templates/sub.header.php");
	// include("./templates/profileupdate.php");
	?>
<br/>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card" id="first">
			<img class="card-img-top mx-auto" style="width: 60%;" src="./image/<?php echo $photo;?>" alt="">
			<div class="card-body">
				<h4 class="card-title"> <font color="white">Profile</font></h4>
				<p class="card-text"><i class="fa fa-user"></i> <font color="white"><?php echo ucfirst($name);?></font></p>
				<p class="card-text"><i class="fa fa-user"></i><font color="white"> Sub Admin</font></p>
				<p class="card-text"><i class="fa fa-eye"></i> <font color="white">Last Login : <?php echo $last_login;?></font></p>

				<!-- <a href="#" class="btn btn-primary" id="profile"><i class="fa fa-edit"></i> Edit Profile</a> -->
			</div>
			
		</div>
				<!-- <div class="card">
				<div class="card-body" >
						<h4 class="card-title">branches</h4>
						<p class="card-text"> Here you can manage your branches and add new </p>
						<a href="#" class="btn btn-primary" id="branches">Add </a>
						<a href="a.branches.php" class="btn btn-success">Manage </a>
					</div>
				</div> -->
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width: 100%; height:100%;">
					<h1>Welcome <font color="steelblue" size="4"><?php echo $name;?>,</font></h1>
					<div class="row">
						<div class="col-sm-6">
							<img class="card-img-top mx-auto" style="width: 70%;" src="./image/Tlogo.png" alt="Login">
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">New Orders</h4>
									<p class="card-text"> Here you can make invoices and create new order</p>
									<a href="sub.order.php" class="btn btn-primary">New Order</a>
								</div>
							</div>

					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 	<p></p>
		<p></p>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body" >
						<h4 class="card-title">Categories</h4>
						<p class="card-text"> Here you can manage your categories </p>
						<a href="#" class="btn btn-primary" id="Acategories">Add </a>
						<a href="a.category.php" class="btn btn-primary">Manage </a>
					</div>
				</div>
		</div>
		<div class="col-md-4">
			<div class="card" >
				<div class="card-body" >
						<h4 class="card-title">Brands</h4>
						<p class="card-text"> Here you can manage your Brands and add new </p>
						<a href="#" class="btn btn-primary" id="brand">Add </a>
						<a href="a.brand.php" class="btn btn-primary">Manage </a>
					</div>
				</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body" >
						<h4 class="card-title">Products</h4>
						<p class="card-text"> Here you can manage your Products and add new </p>
						<a href="#" class="btn btn-primary" id="product">Add </a>
						<a href="a.product.php" class="btn btn-primary">Manage </a>
					</div>
				</div>
		</div>
	</div>
</div> -->

<script type="text/javascript">

	$('#profile').click(function(){
				
				$('#profileModal').show();

				$('#profileupdis').click(function(){
					$('#profileModal').hide();
				});

				$('#profiledowndis').click(function(){
					$('#profileModal').hide();
				});
			});



</script>

</body>

<div class="footer" style="margin-top: 14%;">

<?php include("./templates/admin.footer.php");?>
</div>
</html>
