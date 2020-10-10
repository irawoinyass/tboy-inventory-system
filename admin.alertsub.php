<?php
session_start();
if(!isset($_SESSION['Admin'])){
header("location: admin.login.php");
}else{

//session_destroy();
  //echo $_SESSION["Admin"];
  include_once("./include/admin.php");
  //include_once("./include/admin.DBOperation.php");

  $Admin = new Admin();
  $users = $Admin->getSigleRecord("admin", "a_id", $_SESSION["Admin"]);
  foreach ($users as $user) {
    $name = $user["a_name"];
    $email = $user["a_email"];
    $last_login = $user["a_last_login"];
    $photo = $user["a_image"];
    $user_id = $user["a_id"];

  }

 
  $Admin->UpdateAlert($_GET["alertid"]);




}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TBOY CV - Alert</title>
  <link rel="icon" type="image/png" href="./image/Tlogo.png">
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <link rel="stylesheet" type="text/css" href="./include/style.css">
</head>

<body id="page-top">

 <?php include("./templates/admin.newheader.php");?>



        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="table-responsive">

         <?php

         $records = $Admin->getSigleRecord("invoice","invoice_no", $_GET["alertid"]);

         foreach ($records as $record) {

          ?>

                  <h1 class="h3 mb-0 text-green-800">Report</h1>
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
              <!--     <a href="admin.pos2.php?id=<?php //echo $_GET["alertid"];?>"> <button class="btn btn-success form-control-sm">Receipt</button> </a> -->
                 

          <?php
           
         }

         ?>
       </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
       <?php include("./templates/admin.footer.php");?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


</body>

</html>