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

  <title>TBOY CV - Orders</title>
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
  <script type="text/javascript" src="./js/order.js"></script>
</head>

<body id="page-top">

 <?php include("./templates/admin.newheader.php")?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Order</h1>
        <!--   <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Orders</h6></div>
            <div class="card-body" style="box-shadow: 0 0 25px 0 lightgrey;">

        <form id="get_order_data" onsubmit="return false">
          <div class="form-group row">
            <label class="col-sm-3" align="right"> Order Date</label>
            <div class="col-sm-6" align="">
              <input type="text" name="order_date" id="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-m-d");?>">
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $name;?>">
            </div>
            </div>


            <div class="form-group row">
            <label class="col-sm-3" align="right"> Customer Name*</label>
            <div class="col-sm-6" align="">
              <input type="text" id="cust_name" name="cust_name" class="form-control form-control-sm" placeholder="Enter Customer Name" required/>
            </div>
            </div>


            <div class="card">
              <div class="card-body" style="box-shadow: 0 0 25px 0 lightgrey;">
                <h3>Make a Order</h3>
                <table align="center" style="width: 800px;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th  style="text-align: center;">Item Name</th>
                      <th  style="text-align: center;">Total Quantity</th>
                      <th  style="text-align: center;">Quantity</th>
                      <th  style="text-align: center;">Price</th>
                      <th>Total</th>
        </tr>
        </thead>
        
        <tbody id="invoice_item" align="center">
      <!-- <tr>
      <td id="number"><b>1</b></td>
      <td>
      <select name="pid[]" class="form-control form-control-sm" required/>
      <option>Laptop</option>
      </select>
      </td>

    <td>
    <input type="text" name="tqty[]" readonly class="form-control form-control-sm">
    </td>
    <td>
    <input type="text" name="qty[]" class="form-control form-control-sm" required>
    </td>

    <td>
    <input type="text" name="price[]" class="form-control form-control-sm" readonly>
    </td>
    <td style="text-align: center;">Rs.1540</td>
    </tr> -->
                    
    
  </div>
                  
    </table>

    <center style="padding: 10px;" > <button id="add" style="width: 150px;" class="btn btn-success">Add</button>
    <button id="remove" style="width: 150px;" class="btn btn-danger">Remove</button>
    </center>
    </div>
    </div>

    <p></p>
    
    <div class="form-group row">
    <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total</label>
    <div class="col-sm-6">
    <input type="text" name="sub_total" id="sub_total" class="form-control form-control-sm" readonly>
    </div>
          
    </div>


 <!--  <div class="form-group row">
  <label for="gst" class="col-sm-3 col-form-label" align="right">GST (18%)</label>
  <div class="col-sm-6">
  <input type="text" name="gst" id="gst" class="form-control form-control-sm" required />
  </div>
          
  </div> -->


  <div class="form-group row">
  <label for="discount" class="col-sm-3 col-form-label" align="right">Discount</label>
  <div class="col-sm-6">
  <input type="text" name="discount" id="discount" class="form-control form-control-sm" required />
    </div>
          
  </div>


  <div class="form-group row">
  <label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
    <div class="col-sm-6">
  <input type="text" name="net_total" id="net_total" class="form-control form-control-sm" readonly>
    </div>
        </div>

  <div class="form-group row">
    <label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
  <div class="col-sm-6">
    <input type="text" name="paid" id="paid" class="form-control form-control-sm" required />
          </div>
          
        </div>


        <div class="form-group row">
          <label for="due" class="col-sm-3 col-form-label" align="right">Due</label>
          <div class="col-sm-6">
            <input type="text" name="due" id="due" class="form-control form-control-sm" readonly>
          </div>
          
        </div>



        <div class="form-group row">
          <label for="payment_method" class="col-sm-3 col-form-label" align="right">Payment Method</label>
          <div class="col-sm-6">
          <select name="payment_method" id="payment_method" class="form-control form-control-sm" required />
            <option value="cash">Cash</option>
            <option value="Transaction">Transaction</option>
            <option value="cheque">Cheque</option>
          </select>
          </div>
          
        </div>

        <center>
          <input type="submit" name="order_form" id="order_form" class="btn btn-info" style="width: 150px;" value="Order Form">
          <input type="submit" name="print_invoice" id="print_invoice" class="btn btn-success d-none" style="width: 150px;" value="Print Invoice">
        </center>

        </form>
      </div>
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
