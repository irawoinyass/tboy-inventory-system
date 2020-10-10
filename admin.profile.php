<?php
session_start();
if(!isset($_SESSION['Admin'])){
header("location: admin.login.php");
}else{

//session_destroy();
  //echo $_SESSION["Admin"];
  include_once("./include/admin.php");

  $Admin = new Admin();
  $users = $Admin->getSigleRecord("admin", "a_id", $_SESSION["Admin"]);
  foreach ($users as $user) {
    $name = $user["a_name"];
    $email = $user["a_email"];
    $last_login = $user["a_last_login"];
    $photo = $user["a_image"];

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

  <title>TBOY CV - Profile</title>
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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800" style="padding: 10px">Welcome CEO,</h1>

          <div align="center" style="padding: 50px;">
            <a href="image/<?php echo $photo;?>">  <img class="img-profile rounded-circle" src="image/<?php echo $photo;?>" width="160" style="box-shadow: 0 0 25px black; padding: 6; margin-top: 3px;"></a>
            <br/>
            <br/>
            <h6 style="padding: 2px;"><font color="steelblue"><i class="fa fa-user"></i> Name:</font> <?php echo $name;?></h6>
            <h6 style="padding: 2px;"><font color="steelblue"><i class="fa fa-book"></i> Status:</font> CEO</h6>

            <h6 style="padding: 2px;"><font color="steelblue"><i class="fa fa-user"></i> Last_Login:</font> <?php echo $last_login;?></h6>
            <a href="#" class="btn btn-primary form-control-sm" id="profile"><i class="fa fa-edit"></i> Edit Profile</a>
          </div>
          <br/>
          <br/>
        <!--   <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
       

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
<?php include("./templates/updaterecord.php");
include("./templates/profileupdate.php");
?>
</html>