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

  <title>TBOY CV - Form</title>
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
         <h1 class="h3 mb-2 text-gray-800">Registration Form</h1>
          
          </div>
          
          
        <!--   <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Student Registration Form</h6></div>
              
            <div class="card mx-auto" style="width: 35rem;">
      <!-- <div class="card-header">
        <h4>FORM</h4>
      </div> -->
      <div class="card-body">

  <br>
        <center><u><h5>Student Information</h5></u></center>
        <br>
<form action="" method="POST" enctype="multipart/form-data" >
<?php include_once("include/formVal.php");?>
    <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Surname</font></b></label>
          <input type="text" name="surname" id="surname" class="form-control" placeholder="Enter Student Surname" required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>


        <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Middlename</font></b></label>
          <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Enter Student Middlename" required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>


        <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Othername</font></b></label>
          <input type="text" name="othername" id="othername" class="form-control" placeholder="Enter Student Othername" required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>


        <div class="form-group">
          <label class="label label-success "><b><font color="steelblue">Upload passport</font></b></label>
          <input type="file" name="file" id="file" accept="image/x-png, image/gif,image/jpeg,image/jpg" class="form-control" placeholder="Upload Prisoner Photo" required />
          <small class="form-text text-muted" id="p_error"></small>
        </div>



        <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Address</font></b></label>
          <input type="text" name="s_address" id="s_address" class="form-control" placeholder="Enter Student Address" required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>

         
        <div class="form-group">
             <label class="label label-success "><b><font color="steelblue">State of Origin</font></b></label>
          <select name="s_origin" id="s_origin" class="form-control" required>
            <option value="">Choose student state of origin</option>
            <option value="ABIA">ABIA</option>
              <option value="ADAMAWA">ADAMAWA</option>
            <option value="AKWA IBOM">AKWA IBOM</option>
            <option value="ANAMBRA">ANAMBRA</option>
            <option value="BAUCHI">BAUCHI</option>
             <option value="AYELSA">AYELSA</option>
              <option value="BENUE">BENUE</option>
               <option value="BORNO">BORNO</option>
                <option value="CROSS RIVER">CROSS RIVER</option>
                 <option value="DELTA">DELTA</option>
                  <option value="EBONYI">EBONYI</option>
                   <option value="EDO">EDO</option>
                    <option value="EKITI">EKITI</option>
                     <option value="ENUGU">ENUGU</option>
                      <option value="GOMBE">GOMBE</option>
                       <option value="IMO">IMO</option>
                        <option value="JIGAWA">JIGAWA</option>
                         <option value="KADUNA">KADUNA</option>
                          <option value="KANO">KANO</option>
                           <option value="KATSINA">KATSINA</option>
                            <option value="KEBBI">KEBBI</option>
                             <option value="KOGI">KOGI</option>

                              <option value="KWARA">KWARA</option>
                               <option value="LAGOS">LAGOS</option>
                                <option value="NASSARAWA">NASSARAWA</option>
                                 <option value="NIGER">NIGER</option>
                                  <option value="OGUN">OGUN</option>
                                  <option value="ONDO">ONDO</option>
                                  <option value="OSUN">OSUN</option>
                                  <option value="OYO">OYO</option>
                                  <option value="PLATEAU">PLATEAU</option>
                                  <option value="RIVERS">RIVERS</option>
                                  <option value="SOKOTO">SOKOTO</option>
                                  <option value="TARABA">TARABA</option>
                                  <option value="YOBE">YOBE</option>
                                  <option value="">ZAMFARA</option>
                                 

          </select>

          <small class="form-text text-muted" id="pro_error"></small>
        </div>

  <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Date of Birth</font></b></label>
          <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Enter Student Date of Birth" required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>


  <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Phone Number</font></b></label>
          <input type="text" name="s_phone" id="s_phone" class="form-control" placeholder="Enter Student Phone Number" required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>

        <div class="form-group">
             <label class="label label-success "><b><font color="steelblue">Choose Student Gender</font></b></label>
          <select name="s_gender" id="s_gender" class="form-control" required>
            <option value="">Choose Student Gender</option>
            <option value="Male">Male</option>
              <option value="Female">Female</option>
            
              </select>

          <small class="form-text text-muted" id="pro_error"></small>
        </div>

         <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Agreement Date</font></b></label>
          <input type="date" name="agreement_date" id="agreement_date" class="form-control" placeholder="Enter Agreement Date" required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>


        <div class="form-group">
             <label class="label label-success "><b><font color="steelblue">Choose Student Course</font></b></label>
          <select name="s_course" id="s_course" class="form-control" required>
            <option value="">Choose Student Course</option>
            <option value="COMPUTER OPERATOR">COMPUTER OFPERATOR</option>
              <option value="COMPUTER ENGINEERING">COMPUTER ENGINEERING</option>
                <option value="COMPUTER OPERATOR AND COMPUTER ENGINEERING">COMPUTER OPERATOR && COMPUTER ENGINEERING</option>
            
              </select>

          <small class="form-text text-muted" id="pro_error"></small>
        </div>


            <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">From Date</font></b></label>
          <input type="date" name="from_date" id="from_date" class="form-control" placeholder="Enter From Date" required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>

        <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">To Date</font></b></label>
          <input type="date" name="to_date" id="to_date" class="form-control" placeholder="Enter To Date" required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>
        <br>
        <center><u><h5>Payment</h5></u></center>
        <br>

        <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Amount in words</font></b></label>
          <input type="text" name="sum_in_words" id="sum_in_words" class="form-control" placeholder="Enter Amount in words " required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>

         <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Amount in figure</font></b></label>
          <input type="text" name="sum_in_figure" id="sum_in_figure" class="form-control" placeholder="Enter Amount in figure " required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>

         <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Advance Payment</font></b></label>
          <input type="text" name="advance" id="advance" class="form-control" placeholder="Enter Advance Payment " required>
          <small class="form-text text-muted" id="s_error"></small>
        </div>

         <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Balance Payment</font></b></label>
          <input type="text" name="balance" id="balance" class="form-control" placeholder="Enter Balance Payment " required>
          <small class="form-text text-muted" id="s_error"></small>

        </div>

        <br>
        <center><u><h5>Parent/Guardian Information</h5></u></center>
        <br>

          <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Parent/Guardian Name</font></b></label>
          <input type="text" name="p_name" id="p_name" class="form-control" placeholder="Enter Parent/Guardian Name " required>
          <small class="form-text text-muted" id="s_error"></small>
     </div>

         <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Parent/Guardian Address</font></b></label>
          <input type="text" name="p_address" id="p_address" class="form-control" placeholder="Enter Parent/Guardian Address " required>
          <small class="form-text text-muted" id="s_error"></small>
     </div>

     <div class="form-group">
             <label class="label label-success "><b><font color="steelblue">Parent/Guardian Gender</font></b></label>
          <select name="p_gender" id="p_gender" class="form-control" required>
            <option value="">Parent/Guardian Phone number</option>
            <option value="Male">Male</option>
              <option value="Female">Female</option>
            
              </select>

          <small class="form-text text-muted" id="pro_error"></small>
        </div>

              <div class="form-group">
    <label class="label label-success "><b><font color="steelblue">Parent/Guardian Phone Number</font></b></label>
          <input type="text" name="p_phone" id="p_phone" class="form-control" placeholder="Enter Parent/Guardian Phone Number " required>
          <small class="form-text text-muted" id="s_error"></small>
     </div>

        
        <button type="submit" value="submit" name="submit" class="btn btn-primary"><i class="fa fa-user"></i> Register</button>
        
      </form>

        
      
      
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

    // manage_category(1);
    //     function manage_category(pn) {

    //       $.ajax({
    //       url: "include/admin.process.php",
    //       method: "POST",
    //       data: {getCategories:1, pageno:pn},
    //       success: function(data) {
    //         $('#cat').html(data);
    //       //alert(data);
    //       }

    //       });

    //     }

    //     $("body").delegate(".page-link", "click", function(){
    //       var pn = $(this).attr("pn");
    //       manage_category(pn);


    //     });



// $("body").delegate(".del_cat", "click", function(){
//           var did = $(this).attr("did");
//           if (confirm(("Are you sure? you want to delete this category"))) {
            
//           $.ajax({
//           url: "include/admin.process.php",
//           method: "POST",
//           data: {deleteCategory:1, id:did},
//           success: function(data) {
//           if (data == "DEPENDENT_CATEGORY") {

//             alert("sorry some sub categories denpend on this category");

//           }else if(data == "CATEGORY_DELETED") {

//             alert("Category deleted successfully");


//           }else if(data == "DELETED") {
//             alert("deleted successfully");
//           }else{
//             alert(data);

//             manage_category(1);
//           }
//           }

//           });

//           }else{
            
//           }
//         });









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

</body>

</html>