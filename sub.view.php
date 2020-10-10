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
	<title>SUB ADMIN | RECORD</title>
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

     <div class="card shadow mb-4" style="box-shadow: 0 0 25px white;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">  <h1 class="h3 mb-0 text-green-800">Report</h1></h6></div>
              
            <div class="card-body">

		 <div class="table-responsive">

         <?php

         $records = $Admin->getSigleRecord("invoice","invoice_no", $_GET["alertid"]);

         foreach ($records as $record) {

          ?>

                
                  <br/>
                  <table style="box-shadow: 0 0 25px lightgrey; width: 400px;">
                    <tr align="" >
                      <td><font color="steelblue"><b>Date</b></font></td>

                      <td><font color="grey"><b><?php echo ":".$record["order_date"];?></b></font></td>
                    </tr>

                     <tr align="" >
                      <td><font color="steelblue"><b>Customer</b></font></td>

                      <td><font color="grey"><b><?php echo ":".$record["customer_name"];?></b></font></td>
                    </tr>

                      <tr align="" >
                      <td><font color="steelblue"><b>By</b></font></td>

                      <td><font color="grey"><b><?php echo ":".$record["in_user_name"];?></b></font></td>
                    </tr>
                  </table>
                  <br/>
                  

                  <table style="box-shadow: 0 0 25px lightgrey; width: 800px;" class="table table-bordered">
                    
                   <tr align="center">
                     <th>
                       #
                     </th>

                     <th>
                       Product Name
                     </th>
                     <th>
                       Quantity
                     </th>
                     <th>
                       Price
                     </th>

                     <th>
                       Total
                     </th>
                   </tr>

                  <?php 

                  $seconds = $Admin->getSigleRecord("invoice_details","invoice_no", $record["invoice_no"]);
                  $n = 0;
                  foreach ($seconds as $second) {
                    
                    ?>
                    <tr align="center">
                      <td><font color="steelblue"><b><?php echo ++$n;?></b></font></td>
                    

                   
                      <td><font color="grey"><b><?php echo $second["product_name"];?></b></font></td>
                    

                   
                      <td><font color="grey"><b><?php echo $second["qty"];?></b></font></td>
                    
                   
                      <td><font color="grey"><b><?php echo "N".number_format($second["price"],2)."K";?></b></font></td>
                    
                   
                      <td><font color="grey"><b><?php echo "N".number_format($second["qty"] * $second["price"],2)."K";?></b></font></td>
                    </tr>

                    <?php
                  }

                  ?>
                  </table>

                  <br/>
                  <table style="box-shadow: 0 0 25px lightgrey; width: 400px;">
                    <tr align="" >
                      <td><font color="steelblue"><b>Sub Total</b></font></td>

                      <td><font color="grey"><b><?php echo ":"."N".number_format($record["sub_total"],2)."K";?></b></font></td>
                    </tr>

                     <tr align="" >
                      <td><font color="steelblue"><b>Discount</b></font></td>

                      <td><font color="grey"><b><?php echo ":"."N".number_format($record["discount"],2)."K";?></b></font></td>
                    </tr>

                  
                    

                     <tr align="" >
                      <td><font color="steelblue"><b>Net Total</b></font></td>

                      <td><font color="grey"><b><?php echo ":"."N".number_format($record["net_total"],2)."K";?></b></font></td>
                    </tr>

                     <tr align="" >
                      <td><font color="steelblue"><b>Amount Paid</b></font></td>

                      <td><font color="grey"><b><?php echo ":"."N".number_format($record["paid"],2)."K";?></b></font></td>
                    </tr>

                     <tr align="" >
                      <td><font color="steelblue"><b>Due</b></font></td>

                      <td><font color="grey"><b><?php echo ":"."N".number_format($record["due"],2)."K";?></b></font></td>
                    </tr>


                     <tr align="" >
                      <td><font color="steelblue"><b>Payment method</b></font></td>

                      <td><font color="grey"><b><?php echo ":".$record["payment_method"];?></b></font></td>
                    </tr>

                  </table>
                  <br/>
                 <!--  <a href="admin.receipt2.php?id=<?php //echo $_GET["alertid"];?>"> <button class="btn btn-success form-control-sm">Receipt</button> </a> -->
                 

          <?php
           
         }

         ?>
       </div>
		
	</div>
</div>
</div>



	

</body>
<div class="footer" style="margin-top: 14%;">

<?php include("./templates/admin.footer.php");?>
</div>
</html>