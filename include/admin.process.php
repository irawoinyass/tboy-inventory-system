
<?php
include("admin.php");
include("admin.DBOperation.php");
include("admin.manage.php");

if (isset($_POST["log_email"]) && isset($_POST["log_pass"])){
	
$user = new Admin();
 $result = $user->AdminLogin($_POST["log_email"] , $_POST["log_pass"]);
 echo $result;

 exit();

}


if (isset($_POST["email"]) && isset($_POST["pass1"])){
	
$users = new Admin();
 $results = $users->ForgetPassword($_POST["email"] , $_POST["pass2"]);
 echo $results;

 exit();

}

if (isset($_POST['getCategory'])) {

	$dbo = new AdminDBOperation();
	$rows = $dbo->getAllrecord("categories");

	foreach ($rows as $row) {
	echo "<option value='".$row['cid']."'>".$row['category_name']."</option>";
	}
	exit();
}

if (isset($_POST["name"])) {
 $dbo = new AdminDBOperation();

$result = $dbo->addCategory($_POST['parent_cat'], $_POST['name']);
echo $result;
	exit();
}


if (isset($_POST['getCategories'])) {

	$m = new AdminManage();
	
	$result = $m->getCat("categories",$_POST['pageno']);
	$rows = $result['rows'];
	$pagination = $result['pagination'];

	if (count($rows > 0 )) {
		$n = (($_POST['pageno'] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>

			<tr align="center">
				<td><b><font color="steelblue"><?php echo $n;?></font></b></td>
				<td><b><?php echo $row['category'];?></b></td>
				<td><b><?php echo $row['parent'];?></b></td>
				<!-- <td><a href="#" class="btn btn-success btn-sm">Active</a></td> -->
				<td><a href="#" eid="<?php echo $row['id']; ?>" class="btn btn-info btn-sm edit_cat" width="150px" style="width: 100px; " >Edit</a></td>
				<td><a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_cat" style="width: 100px; " >Delete</a></td>
			</tr>

			<?php
			$n++;
		}
		?>
		<tr><td colspan="6"><?php echo $pagination;?></td></tr>
		<?php
		
	}else{
		echo "NO DATA FOUND";
	}
exit();
}


if (isset($_POST["deleteCategory"])) {
	$manage = new AdminManage();
	$result = $manage->deleteRecords("categories","cid", $_POST["id"]);
	echo $result;
	exit();
}


if (isset($_POST["brand_name"])) {
 $dbo = new AdminDBOperation();

$result = $dbo->addBrand(ucfirst($_POST['brand_name']));
echo $result;
	exit();
}


if (isset($_POST['getBrands'])) {

	$m = new AdminManage();
	
	$result = $m->getbrand("brands",$_POST['pageno']);
	$rows = $result['rows'];
	$pagination = $result['pagination'];

	if (count($rows > 0 )) {
		$n = (($_POST['pageno'] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>

			<tr>
				<td><b><font color="steelblue"><?php echo $n;?></font></b></td>
				<td><b><?php echo $row['brand_name'];?></b></td>
			
		
		<!-- 		<td><a href="#" class="btn btn-success btn-sm">Active</a></td> -->
				<td><a href="#" eid="<?php echo $row['bid']; ?>" class="btn btn-info btn-sm edit_brand" style="width: 100px; " >Edit</a></td>
				<td><a href="#" did="<?php echo $row['bid']; ?>" class="btn btn-danger btn-sm del_brand" style="width: 100px; " >Delete</a>
					
				</td>
				
			</tr>

			<?php
			$n++;
		}
		?>
		<tr><td colspan="5"><?php echo $pagination;?></td></tr>
		<?php
		
	}
exit();
}


if (isset($_POST["deleteBrand"])) {
	$manage = new AdminManage();
	$result = $manage->deleteRecords("brands","bid", $_POST["id"]);
	echo $result;
	exit();
}




if (isset($_POST['getStudents'])) {

	$m = new AdminManage();
	
	$result = $m->getstudent("students",$_POST['pageno']);
	$rows = $result['rows'];
	$pagination = $result['pagination'];

	if (count($rows > 0 )) {
		$n = (($_POST['pageno'] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>

			<tr>
				<td><b><font color="steelblue"><?php echo $n;?></font></b></td>
				<td><a href="image/<?php echo $row["image"];?>">  <img class="img-profile rounded-circle" src="image/<?php echo $row["image"];?>" width="45"></a></td>
				<td><b><?php echo strtoupper($row['surname']." ".$row['middlename']." ".$row['othername']);?></b></td>
				<td><b><?php echo strtoupper($row['course']);?></b></td>
					<td><a href="admin.generate.php?sid=<?php echo $row['sid']; ?>" class="btn btn-success btn-sm">Print</a></td>
				<!-- <td><a href="#" eid="<?php //echo $row['sid']; ?>" class="btn btn-info btn-sm edit_student">Edit</a></td> -->
				<td><a href="#" did="<?php echo $row['sid']; ?>" class="btn btn-danger btn-sm del_student">Delete</a></td>
			</tr>

			<?php
			$n++;
		}
		?>
		<tr><td colspan="5"><?php echo $pagination;?></td></tr>
		<?php
		
	}else{
		echo "NO DATA FOUND";
	}
exit();
}

if (isset($_POST['getBrand'])) {

	$dbo = new AdminDBOperation();
	$rows = $dbo->getAllrecord("brands");

	foreach ($rows as $row) {
	echo "<option value='".$row['bid']."'>".$row['brand_name']."</option>";
	}
	exit();
}


if (isset($_POST["product_date"]) AND isset($_POST["product_name"])) {
 $dbo = new AdminDBOperation();

$result = $dbo->addProduct($_POST["select_cat"], $_POST["select_brand"], $_POST["product_name"], $_POST["product_price"], $_POST["product_quantity"], $_POST["user_name"], $_POST["product_date"]);
echo $result;
	exit();
}



if (isset($_POST['getProducts'])) {

	$m = new AdminManage();
	
	$result = $m->getPro("products",$_POST['pageno']);
	$rows = $result['rows'];
	$pagination = $result['pagination'];

	if (count($rows > 0 )) {
		$n = (($_POST['pageno'] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>

			<tr align="center" >

				<td><b><font color="steelblue"><?php echo $n;?></font></b></td>
					<td><a href="image/<?php echo $row["a_image"];?>">  <img class="img-profile rounded-circle" src="image/<?php echo $row["a_image"];?>" width="45"></a></td>
				<td><b><font color="black"><?php echo ucfirst($row["product_name"]) ?></b></font></td>
				<td><b><font color="black"><?php echo ucfirst($row["category_name"]) ?></b></font></td>
					<td><b><font color="black"><?php echo ucfirst($row["brand_name"]) ?></b></font></td>
						
							<td><b><font color="black"><?php echo "N".number_format($row["product_price"],2) ?></b></font> </td>
								<td><font color="black"><b><?php echo ucfirst($row["product_stock"]) ?></b></font></td>
								<td><b><font color="black"><?php $total = ($row["product_stock"] *  $row["product_price"]); echo "N".number_format($total, 2); ?></b></font></td>
								<td><b><font color="black"><?php echo ucfirst($row["added_date"]) ?></b></font></td>
			<!-- <td><a href="#" class="btn btn-success btn-sm">Active</a></td> -->
				<td><a href="#" eid="<?php echo $row['pid']; ?>" class="btn btn-info btn-sm edit_pro">Edit</a></td>
				<td><a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_pro">Delete</a></td>
			</tr>

			<?php
			$n++;
		}
		?>
		<tr><td colspan="11"><?php echo $pagination;?></td></tr>
		<?php
		
	}else{
		echo "NO DATA FOUND";
	}
exit();
}

if (isset($_POST["deleteProduct"])) {
	$manage = new AdminManage();
	$result = $manage->deleteRecords("products","pid", $_POST["id"]);
	echo $result;
	exit();
}




//-----------------------------Order Processing----------------------------------------

if (isset($_POST["getNewOrderItem"])) {
$dbo = new AdminDBOperation();
	$rows = $dbo->getAllrecord("products");

	?>


<tr>
			<td class="number"><b>1</b></td>
			<td>
			<select name="pid[]" class="form-control form-control-sm pid" required>
				<option value="">Choose Product</option>
			<?php   

			foreach ($rows as $row) {
					
					?>
			<option value="<?php echo $row["pid"];?>"><?php echo $row["product_name"];?></option>

					<?php
				}	


			?>
			
			</select>
			</td>

		<td>
		<input type="text" name="tqty[]" readonly class="form-control form-control-sm tqty">
		</td>
		<td>
		<input type="text" name="qty[]" class="form-control form-control-sm qty" required>
		</td>

		<td>
		<input type="text" name="price[]" class="form-control form-control-sm price" readonly>
		</td>
		<td style="display: none;">
		<input type="hidden" name="pro_name[]" class="form-control form-control-sm pro_name" readonly>
		</td>
		<td>N<span class="amt" >0</span></td>

		?>

		</tr>
	<?php

exit();
}



//------------------------------getingSignleRecord--------------------

if (isset($_POST["getPriceAndQty"])) {

	$a = new AdminManage();
	$result = $a->getSigleRecord4("products", "pid", $_POST["id"]);

	echo json_encode($result);
	
	exit();
}

//------------------------------=====Order Processing=====--------------------

if (isset($_POST["order_date"]) AND isset($_POST["cust_name"])) {

	$order_date = $_POST["order_date"];
	$cust_name = $_POST["cust_name"];
	$user_id = $_POST["user_id"];


	$ar_tqty =  $_POST["tqty"];
	$ar_qty = $_POST["qty"];
	$ar_price =  $_POST["price"];
	$ar_pro_name =  $_POST["pro_name"];


	$sub_total =  $_POST["sub_total"];
	
	$discount =  $_POST["discount"];
	$net_total =  $_POST["net_total"];
	$paid = $_POST["paid"];
	$due = $_POST["due"];
	$payment_method = $_POST["payment_method"];

// if (empty($cust_name)) {
// 	echo "Customer Field is Empty!!!!!!!!!!";
// }else{


	$dbo = new AdminDBOperation();
$result = $dbo->storeCustomerOrderInvoice( $order_date, $cust_name, $user_id, $ar_tqty, $ar_qty, $ar_price, $ar_pro_name, $sub_total, $discount, $net_total,$paid, $due, $payment_method);
	echo $result;


//}

	
	
	exit();

}



if (isset($_POST['getCustomers'])) {

	$m = new adminManage();
	
	$result = $m->getCus("invoice",$_POST['pageno']);
	$rows = $result['rows'];
	$pagination = $result['pagination'];

	if (count($rows > 0 )) {
		$n = (($_POST['pageno'] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>

			<tr>
				<td><b><font color="steelblue"><?php echo $n;?></font></b></td>
				<td><a href="image/<?php echo $row["a_image"];?>">  <img class="img-profile rounded-circle" src="image/<?php echo $row["a_image"];?>" width="45"></a></td>
				<td><b><?php echo $row['customer_name'];?></b></td>
				<td><b><?php echo "N".number_format($row['paid'],2)."K";?></b></td>
				<td><b><?php echo $row['order_date'];?></b></td>
			
		
				<td><a href="admin.pos2.php?id=<?php echo $row["invoice_no"];?>" class="btn btn-success btn-sm">Receipt</a></td>
				<td><a href="#" eid="<?php echo $row['invoice_no']; ?>" class="btn btn-info btn-sm edit_cus">Edit</a>
					<a href="admin.alertsub.php?alertid=<?php echo $row['invoice_no']; ?>" class="btn btn-success btn-sm">View</a>
				</td>
				<td><a href="#" did="<?php echo $row['invoice_no']; ?>" class="btn btn-danger btn-sm del_cus">Delete</a>
					
				</td>
				
			</tr>

			<?php
			$n++;
		}
		?>
		<tr><td colspan="5"><?php echo $pagination;?></td></tr>
		<?php
		
	}
exit();
}

if (isset($_POST["deleteCus"])) {
	$manage = new AdminManage();
	$result = $manage->deleteRecords("invoice","invoice_no", $_POST["id"]);
	echo $result;
	exit();
}

if (isset($_POST["getCusName"])) {

	$a = new AdminManage();
	$result = $a->getSigleRecord4("invoice", "invoice_no", $_POST["id"]);

	echo json_encode($result);
	
	exit();
}


if (isset($_POST["getSubAdmins"])) {

	$a = new AdminManage();
	$result = $a->getSigleRecord4("admin", "a_id", $_POST["id"]);

	echo json_encode($result);
	
	exit();
}


if (isset($_POST["getCatt"])) {

	$a = new AdminManage();
	$result = $a->getSigleRecord4("categories", "cid", $_POST["id"]);

	echo json_encode($result);
	
	exit();
}

if (isset($_POST["getBrandd"])) {

	$a = new AdminManage();
	$result = $a->getSigleRecord4("brands", "bid", $_POST["id"]);

	echo json_encode($result);
	
	exit();
}


if (isset($_POST["getProductt"])) {

	$a = new AdminManage();
	$result = $a->getSigleRecord4("products", "pid", $_POST["id"]);

	echo json_encode($result);
	
	exit();
}


// if (isset($_POST['cus_name']) AND isset($_POST["cus_id"])) {

// 	$dbo = new AdminDBOperation();
// 	$result = $dbo->UpdateCusRecord($_POST["cus_id"], $_POST['cus_name']);
// 	echo $result; 

	
// 	exit();
// }


if (isset($_POST['getSubAdmin'])) {

	$m = new AdminManage();
	
	$result = $m->getSub("admin",$_POST['pageno']);
	$rows = $result['rows'];
	$pagination = $result['pagination'];

	if (count($rows > 0 )) {
		$n = (($_POST['pageno'] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>

			<tr>
				<td><b><font color="steelblue"><?php echo $n;?></font></b></td>
				<td><a href="image/<?php echo $row["a_image"];?>">  <img class="img-profile rounded-circle" src="image/<?php echo $row["a_image"];?>" width="45"></a></td>
				<td><b><?php echo $row['a_name'];?></b></td>
				
			<td><b><?php echo $row['a_email'];?></b></td>
				<td><b><?php echo $row['gender'];?></b></td>
				
				<td><a href="#" eid="<?php echo $row['a_id']; ?>" class="btn btn-info btn-sm form-control-sm edit_sub">Edit</a></td>
				<td><a href="#" did="<?php echo $row['a_id']; ?>" class="btn btn-danger btn-sm form-control-sm del_sub">Remove</a>
					
				</td>
				
			</tr>

			<?php
			$n++;
		}
		?>
		<tr><td colspan="5"><?php echo $pagination;?></td></tr>
		<?php
		
	}
exit();
}

if (isset($_POST["deleteSub"])) {
	$manage = new AdminManage();
	$result = $manage->deleteRecords("admin","a_id", $_POST["id"]);
	echo $result;
	exit();
}

if (isset($_POST["deleteStudent"])) {
	$manage = new AdminManage();
	$result = $manage->deleteRecords("students","sid", $_POST["id"]);
	echo $result;
	exit();
}



?>