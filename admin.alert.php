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
          

          <?php

                  $rows = $Admin->GethomeAlert("invoice");

                  foreach ($rows as $row) {

                    if ($row["alert"] == 1 ) {
                      
                    
                 ?>

                <a class="dropdown-item d-flex align-items-center" href="admin.alertsub.php?alertid=<?php echo $row["invoice_no"];?>">
                  <div class="mr-3" >
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-book text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $row["order_date"]; ?></div>
                    <span class="font-weight-bold">
                      <?php if($name == $row["in_user_name"]){

                       echo "You";
                            }else{
                              echo $row["in_user_name"];
  } ?> , sold goods of <?php echo "N".number_format($row["net_total"],2)."K";?> to <?php echo $row["customer_name"];?></span>
                  </div>
                </a>
              <?php 

                  }else {


                    ?>

                    <a class="dropdown-item d-flex align-items-center" href="admin.alertsub.php?alertid=<?php echo $row["invoice_no"];?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-book text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-black-500"><?php echo $row["order_date"]; ?></div>
                    <font color="blue"><span class="font-weight-bold">
                      <?php if($name == $row["in_user_name"]){

                       echo "You";
                            }else{
                              echo $row["in_user_name"];
  } ?> , sold goods of <?php echo "N".number_format($row["net_total"],2)."K";?> to <?php echo $row["customer_name"];?></span></font>
                  </div>
                </a>

                    <?php

                  }



                  }
                ?>



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