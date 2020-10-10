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

  <title>TBOY CV - Students</title>
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

 <?php include("./templates/admin.newheader.php")?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-2 text-gray-800">Students</h1>
            <a href="admin.studentform.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Register Student</a>
          </div>
          
          
        <!--   <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTable For students</h6></div>
              <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="myInput" onkeyup="myFunction()">
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tablestudent" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Course</th>
                  <th>Print</th>
                     <!--  <th>Edit</th> -->
                      <th>Delete</th>
                   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>ID</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Course</th>
                     <th>print</th>
                      <!-- <th>Edit</th> -->
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody id="get_student">
                  
                   
                  </tbody>
                </table>
              </div>
            </div>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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

    manage_students(1);
        function manage_students(pn) {

          $.ajax({
          url: "include/admin.process.php",
          method: "POST",
          data: {getStudents:1, pageno:pn},
          success: function(data) {
            $('#get_student').html(data);
          //alert(data);
          }

          });

        }

        $("body").delegate(".page-link", "click", function(){
          var pn = $(this).attr("pn");
          manage_students(pn);


        });



$("body").delegate(".del_student", "click", function(){
          var did = $(this).attr("did");
          if (confirm(("Are you sure? you want to delete this student record"))) {
            
            $.ajax({
          url: "include/admin.process.php",
          method: "POST",
          data: {deleteStudent:1, id:did},
          success: function(data) {
          if(data = "DELETED") {
            alert("deleted successfully");
            manage_students(1);
          }else{
            alert(data);
          }

          }

          });

          }else{
            
          }
        });





// $("body").delegate(".edit_student","click",function(){

//  var eid = $(this).attr("eid");
//   //alert(eid);
// $('#updatestudentModal').show();

//         $('#updatestudentupdis').click(function(){
//           $('#updatestudentModal').hide();
//         });

//         $('#updatestudentdowndis').click(function(){
//           $('#updatestudentModal').hide();
//         });



//   $.ajax({
        
//         url : "include/admin.process.php",
//         method : "POST",
//         dataType : "json",
//         data : {getCusName:1, id:eid},
//         success: function(data){
//           //console.log(data);
//       $("#cus_name").val(data["customer_name"]);
//       $("#cus_id").val(data["invoice_no"]);
         
//         }



//       });


// });





//         function myFunction() {
 
//   var input, filter, table, tr, td, i, txtValue;
//   input = document.getElementById("myInput");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("tablecat");
//   tr = table.getElementsByTagName("tr");


//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[1];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     } 
//   }
// }
  </script>

<?php //include("./templates/updatestudent.php"); ?>
</body>

</html>