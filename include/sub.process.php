<?php

include("sub.login.php");
include("sub.manage.php");
include("sub.DBOperation.php");

if (isset($_POST["slog_email"]) && isset($_POST["slog_pass"])){
	
$user = new SubAdmin();
 $result = $user->SubAdminLogin($_POST["slog_email"] , $_POST["slog_pass"]);
 echo $result;

 exit();

}



if (isset($_POST['getCustomers'])) {

	$m = new SubAdminManage();
	
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
			
		
				<td><a href="sub.pos2.php?id=<?php echo $row['invoice_no']; ?>" class="btn btn-success btn-sm" style="width: 100px;" >Receipt</a></td>
				<td><a href="sub.view.php?alertid=<?php echo $row['invoice_no']; ?>" class="btn btn-info btn-sm edit_cus" style="width: 100px;" >View</a></td>
				
					
				</td>
				
			</tr>

			<?php
			$n++;
		}
		?>
		<tr><td colspan="7"><?php echo $pagination;?></td></tr>
		<?php
		
	}
exit();

}


if (isset($_POST["getNewOrderItem"])) {
$dbo = new SubAdminDBOperation();
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

	$a = new SubAdminManage();
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


	$dbo = new SubAdminDBOperation();
$result = $dbo->storeCustomerOrderInvoice( $order_date, $cust_name, $user_id, $ar_tqty, $ar_qty, $ar_price, $ar_pro_name, $sub_total, $discount, $net_total,$paid, $due, $payment_method);
	echo $result;


//}

	
	
	exit();

}




?>