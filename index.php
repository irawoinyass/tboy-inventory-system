
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

  <title>TBOY - Dashboard</title>
 <link rel="icon" type="image/png" href="./image/Tlogo.png">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
<?php include("./templates/a.category.php")?>
<?php include("./templates/a.brand.php")?>
<?php include("./templates/a.product.php")?>
<?php include("./templates/admin.newheader.php")?>
 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
                  <?php

                        $result = $Admin->Getsales("invoice", "month", "Jan-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Jan" id="Jan" value="<?php echo $sum["p"]; ?>">
<?php

}
?>

<?php

                        $result = $Admin->Getsales("invoice", "month", "Feb-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Feb" id="Feb" value="<?php echo $sum["p"]; ?>">
<?php

}
?>

<?php

                        $result = $Admin->Getsales("invoice", "month", "Mar-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Mar" id="Mar" value="<?php echo $sum["p"]; ?>">
<?php

}
?>

<?php

                        $result = $Admin->Getsales("invoice", "month", "Apr-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Apr" id="Apr" value="<?php echo $sum["p"]; ?>">
<?php

}
?>

<?php

                        $result = $Admin->Getsales("invoice", "month", "May-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="May" id="May" value="<?php echo $sum["p"]; ?>">
<?php

}
?>

<?php

                        $result = $Admin->Getsales("invoice", "month", "Jun-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Jun" id="Jun" value="<?php echo $sum["p"]; ?>">
<?php

}
?>

<?php

                        $result = $Admin->Getsales("invoice", "month", "Jul-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Jul" id="Jul" value="<?php echo $sum["p"]; ?>">
<?php

}
?>

<?php

                        $result = $Admin->Getsales("invoice", "month", "Aug-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Aug" id="Aug" value="<?php echo $sum["p"]; ?>">
<?php

}
?>

<?php

                        $result = $Admin->Getsales("invoice", "month", "Sep-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Sep" id="Sep" value="<?php echo $sum["p"]; ?>">
<?php

}
?>

<?php

                        $result = $Admin->Getsales("invoice", "month", "Oct-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Oct" id="Oct" value="<?php echo $sum["p"]; ?>">
<?php

}
?>

<?php

                        $result = $Admin->Getsales("invoice", "month", "Nov-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Nov" id="Nov" value="<?php echo $sum["p"]; ?>">
<?php

}
?>


<?php

                        $result = $Admin->Getsales("invoice", "month", "Dec-".date("Y"));

                        foreach ($result as $sum) {
                          ?>
<input type="hidden" name="Dec" id="Dec" value="<?php echo $sum["p"]; ?>">
<?php

}
?>
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      

                       
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">sales (Daily) &nbsp; <?php echo date("D");?></div>
                      <?php

                        $result = $Admin->Getsales("invoice", "order_date", date("Y-m-d"));

                        foreach ($result as $sum) {
                          ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo  "N".number_format($sum["p"],2)."K"; ?></div>

                      <?php
                       }
                      ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
 <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">sales (monthly) &nbsp; <?php echo date("M");?></div>
                      <?php

                        $result = $Admin->Getsales("invoice", "month", date("M-Y") );

                        foreach ($result as $sum) {
                          ?>
       <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo  "N".number_format($sum["p"],2)."K"; ?></div>
                      <?php
                       }
                      ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">sales (Annual) &nbsp; <?php echo date("Y");?></div>
                      <?php

                        $result = $Admin->Getsales("invoice", "year", date("Y") );

                        foreach ($result as $sum) {
                          ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo  "N".number_format($sum["p"],2)."K"; ?></div>
                      <?php
                       }
                      ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Students</div>

                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php

                        echo $result = $Admin->count("students");
                        ?></div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
               <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sub-Admin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php

                        echo $result = $Admin->countSub("admin", "type", "Sub_Admin");
                        ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total stock amount</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">#0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Unread Notification</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

                        echo $result = $Admin->countAlert();
                        ?></div>
                        </div>
                        <div class="col">
                         <!--  -->
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Stocks</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php

                        echo $result = $Admin->count("products");
                        ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-pen fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sales Overview</h6>
               <!--    <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div> -->
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Order</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">New Orders</h4>
                  <p class="card-text"> Here you can make invoices and create new order</p>
                  <a href="admin.order.php" class="btn btn-primary">New Order</a>
                </div>
              </div>
          
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                </div>
               <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Products</h4>
                  <p class="card-text"> Here you can add and manage your product</p>
                  <center><a href="#" class="btn btn-success" id="product">Add</a>
                   <a href="admin.product.php" class="btn btn-primary">Manage </a></center>
                </div>
              </div>
              </div>
            </div>
          </div>
       

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Brands</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="image/brand.jpg" alt="">
                  </div>
                 <center> <p class="card-text"> Here you can manage your Brands and add new </p></center>
            <center><a href="#" class="btn btn-primary" id="brand" >Add </a>
            <a href="admin.brand.php" class="btn btn-primary">Manage </a></center>
                </div>
              </div>

             

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 22rem;" src="image/cat.jpeg" alt="">
                  </div>
                 <center><p class="card-text"> Here you can manage your categories </p></center>
           <center> <a href="#" class="btn btn-primary" id="Acategories">Add </a>
            <a href="admin.category.php" class="btn btn-primary">Manage </a></center>
                </div>
              </div>

              <!-- Approach -->
              <!-- <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
              </div> -->

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include("./templates/admin.footer.php");?>

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
          <a class="btn btn-primary" href="admin.login.php">Logout</a>
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
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
<!--   <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script> -->


  <script type="text/javascript">
    var Jan = $("#Jan").val();
    var Feb = $("#Feb").val();
    var Mar = $("#Mar").val();
    var Apr = $("#Apr").val();
    var May = $("#May").val();
    var Jun = $("#Jun").val();
    var Jul = $("#Jul").val();
    var Aug = $("#Aug").val();
    var Sep = $("#Sep").val();
    var Oct = $("#Oct").val();
    var Nov = $("#Nov").val();
    var Dec = $("#Dec").val();
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var hundred = 100;
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "sales",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,

      data: [Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'N' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': N' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});


// here on//

  $("#Acategories").click(function(){
        
        $('#AcatModal').show();

        $('#Acatupdis').click(function(){
          $('#AcatModal').hide();
        });

        $('#Acatdowndis').click(function(){
          $('#AcatModal').hide();
        });
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

            $("#parent_cat").html(root+data);
            $("#select_cat").html(choose+data);
            //alert(data);
          }

          });

        }

        //category validation

  $('#category_form').on("submit", function(){
      if ( $('#name').val() == "") {
        $('#name').addClass("border-danger");
    $('#n_error').html("<span class='text-danger'>Please Enter Category Name</span>");
      }else {
      $.ajax({
      url: "include/admin.process.php",
      method: "POST",
      data: $('#category_form').serialize(),
      success: function(data){
        
        if (data = "CATEGORY_ADDED") {
    $('#name').removeClass("border-danger");
    $('#n_error').html("<span class='text-success'>Category Name Added succefully</span>");
    $('#name').val("");
      fetch_category();
     
      
        }else if(data = "CATEGORY NAME ALREADY EXISTS "){
    $('#name').addClass("border-danger");
    $('#n_error').html("<span class='text-danger'>Category name exists for the choosen branch</span>");
    $('#name').val("");
        }else{
            alert(data);
              // $('#name').val("");
        }

      }
    });
      }

     });


  $('#brand').click(function(){
        
        $('#branModal').show();

        $('#branupdis').click(function(){
          $('#branModal').hide();
        });

        $('#brandowndis').click(function(){
          $('#branModal').hide();
        });
      });


//Brand validation

  $('#brand_form').on("submit", function(){
      if ( $('#brand_name').val() == "") {
        $('#brand_name').addClass("border-danger");
    $('#brand_error').html("<span class='text-danger'>Please Enter Brand Name</span>");
      }else {
      $.ajax({
      url: "include/admin.process.php",
      method: "POST",
      data: $('#brand_form').serialize(),
      success: function(data){
        
        if (data = "BRAND_ADDED") {
    $('#brand_name').removeClass("border-danger");
    $('#brand_error').html("<span class='text-success'>Category Name Added succefully</span>");
    $('#brand_name').val("");
      
      fetch_branch();
      
        }else if(data = "BRAND NAME ALREADY EXISTS FOR THE CHOOSEN BRANCH"){
    $('#brand_name').addClass("border-danger");
    $('#brand_error').html("<span class='text-danger'>Brand name exists for the choosen branch</span>");
    $('#brand_name').val("");
        }else{
            alert(data);
        }

      }
    });
      }

     });




    $('#product').click(function(){
        
        $('#proModal').show();

        $('#proupdis').click(function(){
          $('#proModal').hide();
        });

        $('#prodowndis').click(function(){
          $('#proModal').hide();
        });
      });

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


          $('#product_form').on("submit", function(){
          $.ajax({
      url: "include/admin.process.php",
      method: "POST",
      data: $('#product_form').serialize(),
      success: function(data){
        
        if (data = "PRODUCT_ADDED") {
          //alert(data);
  
     $('#name_error').html("<span class='text-success'>Product Added succefully</span>");
    $('#product_name').val("");
    $('#product_price').val("");
    $('#product_quantity').val("");
    $('#select_cat').val("");
    $('#select_brand').val("");
        }else {

        alert(data);
        }

      }
    });


      });



  </script>

</body>

</html>
