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
   <link rel="icon" type="image/png" href="./image/Tlogo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="./include/style.css">

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
              <h6 class="m-0 font-weight-bold text-primary">DataTable For customers</h6></div>
              <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="myInput" onkeyup="myFunction()">
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tablecus" width="100%" cellspacing="0" style="box-shadow: 0 0 25px lightgrey;">
                  <thead>
                    <tr>
                     <th>ID</th>
                      <th>By:</th>
                      <th>Customer name</th>
                     
                      <th>Amount Paid</th>
                      <th>Date</th>
                      <th>Receipt</th>
                      <th>View</th>
                      
                   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>By:</th>
                      <th>Customer name</th>
                     
                      <th>Amount Paid</th>
                      <th>Date</th>
                      <th>Receipt</th>
                      <th>View</th>
                      
                    </tr>
                  </tfoot>
                  <tbody id="cus">
                  
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
		
	</div>


	<script type="text/javascript">
		
		manage_customer(1);
        function manage_customer(pn) {

          $.ajax({
          url: "include/sub.process.php",
          method: "POST",
          data: {getCustomers:1, pageno:pn},
          success: function(data) {
            $('#cus').html(data);
          //alert(data);
          }

          });

        }

        $("body").delegate(".page-link", "click", function(){
          var pn = $(this).attr("pn");
          manage_customer(pn);


        });











// $('#updaterecord_form').on("submit", function(){

// if ( $('#cus_name').val() == "") {

//         $('#cus_name').addClass("border-danger");
//     $('#customer_error').html("<span class='text-danger'>This field cannot be empty</span>");

//       }else {

//       $.ajax({
//       url: "include/admin.process.php",
//       method: "POST",
//       data: $('#updaterecord_form').serialize(),
//       success: function(data){

//         alert(data);
        
//         }

//     });

//       }

//      });








        function myFunction() {
 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tablecus");
  tr = table.getElementsByTagName("tr");


  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
<div class="footer" style="margin-top: 0%;">

<?php include("./templates/admin.footer.php");?>
</div>
</html>