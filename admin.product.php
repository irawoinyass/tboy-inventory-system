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

  <title>TBOY CV - Products</title>
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
          <h1 class="h3 mb-2 text-gray-800">Products</h1>
        <!--   <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTable For products</h6></div>
              <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="myInput" onkeyup="myFunction()">
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tableproduct" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center" >
                      <th>ID</th>
                      <th>By</th>
                      <th>Product Name</th>
                      <th>Category name</th>
                      <th>Brand Name</th>
                      
                      <th>Product Price</th>
                      <th>Product Stock</th>
                      <th>Total</th>
                      <th>Date</th>
                      <!-- <th>Status</th> -->
                      <th>Edit</th>
                      <th>Delete</th>
                   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr align="center" >
                      <th>ID</th>
                      <th>By</th>
                      <th>Product Name</th>
                      <th>Category name</th>
                      <th>Brand Name</th>
                      
                      <th>Product Price</th>
                      <th>Product Stock</th>
                      <th>Total</th>
                      <th>Date</th>
                     <!--  <th>Status</th> -->
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody id="product">
                  
                   
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

    manage_product(1);
        function manage_product(pn) {

          $.ajax({
          url: "include/admin.process.php",
          method: "POST",
          data: {getProducts:1, pageno:pn},
          success: function(data) {
            $('#product').html(data);
          //alert(data);
          }

          });

        }

        $("body").delegate(".page-link", "click", function(){
          var pn = $(this).attr("pn");
          manage_product(pn);


        });


fetch_category();
        function fetch_category() {

          $.ajax({
          url: "include/admin.process.php",
          method: "POST",
          data: {getCategory:1},
          success: function(data) {
            var root = ' <option value="0">root</option>';
              var choose = ' <option value="">Choose Category</option>';

           // $("#parent_cat").html(root+data);
            $("#select_cat").html(choose+data);
            //alert(data);
          }

          });

        }

 fetch_brand();
        function fetch_brand() {

          $.ajax({
          url: "include/admin.process.php",
          method: "POST",
          data: {getBrand:1},
          success: function(data) {
            //var root = ' <option value="0">root</option>';
            var choose = ' <option value="">Choose Brand</option>';

            //$("#parent_cat").html(root+data);
            $("#select_brand").html(choose+data);
            //alert(data);
          }

          });

        }



$("body").delegate(".del_pro", "click", function(){
          var did = $(this).attr("did");
          if (confirm(("Are you sure? you want to delete this product"))) {
            
            $.ajax({
          url: "include/admin.process.php",
          method: "POST",
          data: {deleteProduct:1, id:did},
          success: function(data) {
          if(data = "DELETED") {
            alert("deleted successfully");
            manage_product(1);
          }else{
            alert(data);
          }

          }

          });

          }else{
            
          }
        });



$("body").delegate(".edit_pro","click",function(){

 var eid = $(this).attr("eid");
  //alert(eid);
$('#updateproModal').show();

        $('#updateproupdis').click(function(){
          $('#updateproModal').hide();
        });

        $('#updateprodowndis').click(function(){
          $('#updateproModal').hide();
        });



  $.ajax({
        
        url : "include/admin.process.php",
        method : "POST",
        dataType : "json",
        data : {getProductt:1, id:eid},
        success: function(data){
          //console.log(data);
            $("#product_id").val(data["pid"]);
      $("#product_name").val(data["product_name"]);
      $("#product_date").val(data["added_date"]);
            $("#select_cat").val(data["cid"]);
      $("#select_brand").val(data["bid"]);

            $("#product_price").val(data["product_price"]);
      $("#product_quantity").val(data["product_stock"]);
      




        }

      });


});






        function myFunction() {
 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableproduct");
  tr = table.getElementsByTagName("tr");


  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
  </script>

</body>
<?php include("./templates/updateproduct.php");?>
</html>