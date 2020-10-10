<?php 

//lasisi saheed 0!!!
// developer 

class AdminDBOperation {

	private $host, $user, $pass, $db_name;
		public $con;

public function __construct(){
	$this->con = mysqli_connect($this->host="localhost", $this->user="root", $this->pass="", $this->db_name="tboy");
	
			}

// checking if the category name exists for the choosen branch before.
	public function CateExists($category_name){
			$category_name = mysqli_real_escape_string($this->con, $category_name);
			
		$query = "SELECT category_name FROM categories WHERE category_name = '$category_name' ";
			$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run) > 0) {
			return 1;
		}else{
			return 0;
		}


		
	}



//Category Validation

	public function addCategory($parent, $cat) {
			$parent = mysqli_real_escape_string($this->con, $parent);
			$cat = mysqli_real_escape_string($this->con, $cat);
				
		if ($this->CateExists($cat)) {
			return "CATEGORY NAME ALREADY EXISTS";
		}else{
		$status = 1;
		$query = "INSERT INTO `categories`(`cid`, `parent_cat`, `category_name`, `status`) VALUES (null,'$parent', '$cat', '$status')";
			$query_run = mysqli_query($this->con,$query);

		if ($query_run) {
			return "CATEGORY_ADDED";
		}else {
			return "Error";
		}
	}
		

	 }


// fecting all data from asigle table /// 
	public function getAllrecord($table) {
		$table = mysqli_real_escape_string($this->con, $table);
		$query = "SELECT * FROM ".$table;
		$query_run = mysqli_query($this->con,$query);

		
		$rows = array();
		if (mysqli_num_rows($query_run) > 0) {
		while ($row = mysqli_fetch_assoc($query_run)) {
			$rows[] = $row;
		}
		return $rows;
		}
		return "NO DATA";

	}


	// fecting all data from asigle table /// 
	public function getAllCat($table) {
		if ($table == "categories"){
		$table = mysqli_real_escape_string($this->con, $table);
		$query = "SELECT p.category_name as category, p.cid as id, c.category_name as parent, p.status FROM categories p LEFT JOIN categories c ON p.parent_cat = c.cid ";
		$query_run = mysqli_query($this->con,$query);

		
		$rows = array();
		if (mysqli_num_rows($query_run) > 0) {
		while ($row = mysqli_fetch_assoc($query_run)) {
			$rows[] = $row;
		}
		return $rows;
		}
		return "NO DATA";
	}

	}



		// checking if the brand name exists for the choosen branch before.
	public function BrandExists($brand_name){

		$brand_name = mysqli_real_escape_string($this->con, $brand_name);
				// $branch = mysqli_real_escape_string($this->con, $branch);
		$query = "SELECT brand_name FROM brands WHERE brand_name = '$brand_name' ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run) > 0) {
			return 1;
		}else{
			return 0;
		}
	}


 		//Brand Validation

	public function addBrand($brand) {

				$brand= mysqli_real_escape_string($this->con, $brand);
				// $branch = mysqli_real_escape_string($this->con, $branch);
		if ($this->BrandExiSts($brand)) {
			return "BRAND NAME ALREADY EXISTS FOR THE CHOOSEN BRANCH";
		}else{
$status = 1;
		$query= "INSERT INTO `brands`(`bid`, `brand_name`, `status`) VALUES (null,'$brand', '$status')";
		
					$query_run = mysqli_query($this->con,$query);

		if ($query_run) {
			return "BRAND_ADDED";
		}else {
			return 0;
		}
	}

	}



public function Exists($table, $field, $value) {

			$table = mysqli_real_escape_string($this->con, $table);
				$field = mysqli_real_escape_string($this->con, $field);
					$value = mysqli_real_escape_string($this->con, $value);

		$query = "SELECT * FROM ".$table." WHERE ".$field." = '$value' ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run) > 0) {
			return 1;
		}else{
			return 0;
		}


		}


		public function Check($surname, $middlename, $othername) {

			$surname = mysqli_real_escape_string($this->con, $surname);
				$middlename = mysqli_real_escape_string($this->con, $middlename);
					$othername = mysqli_real_escape_string($this->con, $othername);

		$query = "SELECT * FROM `students` WHERE `surname` = '$surname' AND `middlename` = '$middlename' AND othername = '$othername' ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run) > 0) {
			return 1;
		}else{
			return 0;
		}


		}



	public function Addstudent($image,$surname,$middlename, $othername, $student_address, $state_of_origin, $date_of_birth, $phone_no, $sex, $agreement_date, $course, $from_date, $to_date, $sum_in_word, $sum_in_no, $advance, $balance, $p_name, $p_address, $p_sex, $p_phone_no){

			$image = mysqli_real_escape_string($this->con, $image);
			$surname = mysqli_real_escape_string($this->con, $surname);
			$middlename = mysqli_real_escape_string($this->con, $middlename);
			$othername = mysqli_real_escape_string($this->con, $othername);
			$student_address = mysqli_real_escape_string($this->con, $student_address);
			$state_of_origin = mysqli_real_escape_string($this->con, $state_of_origin);
			$date_of_birth = mysqli_real_escape_string($this->con, $date_of_birth);


			$phone_no = mysqli_real_escape_string($this->con, $phone_no);
			$sex = mysqli_real_escape_string($this->con, $sex);
			$agreement_date = mysqli_real_escape_string($this->con, $agreement_date);
			$course = mysqli_real_escape_string($this->con, $course);
			$from_date = mysqli_real_escape_string($this->con, $from_date);



			$to_date = mysqli_real_escape_string($this->con, $to_date);
			$sum_in_word = mysqli_real_escape_string($this->con, $sum_in_word);
			$sum_in_no = mysqli_real_escape_string($this->con, $sum_in_no);
			$advance = mysqli_real_escape_string($this->con, $advance);
			$balance = mysqli_real_escape_string($this->con, $balance);


			$p_name = mysqli_real_escape_string($this->con, $p_name);
			$p_address = mysqli_real_escape_string($this->con, $p_address);
			$p_sex = mysqli_real_escape_string($this->con, $p_sex);
			$p_phone_no = mysqli_real_escape_string($this->con, $p_phone_no);
		

		if ($this->Check($surname, $middlename, $othername) ) {
			return '<script>alert("There is exixtence of this student , surname, middlename and othername");</script>';
			
		}elseif ($this->Exists("students", "image", $image)) {

			return '<script>alert("No Dublication of Student photo name");</script>';
		}else {
			$query = "INSERT INTO `students`(`sid`, `image`, `surname`, `middlename`, `othername`, `student_address`, `state_of_origin`, `date_of_birth`, `phone_no`, `sex`, `agreement_date`, `course`, `from_date`, `to_date`, `sum_in_word`, `sun_in_no`, `advance`, `balance`, `p_name`, `p_address`, `p_sex`, `p_phone_no`) VALUES (null,'$image','$surname','$middlename','$othername','$student_address','$state_of_origin','$date_of_birth','$phone_no','$sex','$agreement_date','$course','$from_date','$to_date','$sum_in_word','$sum_in_no','$advance','$balance','$p_name','$p_address','$p_sex','$p_phone_no')";
			$query_run = mysqli_query($this->con, $query);

			if ($query_run) {
					return '<script>alert("Submitted to the database successfully");</script>';
				
				//header("location: generate.php?matric=$matric");
			}else {
				return '<script>alert("Error")</script>';
				
			}


		}

	}


	// checking if the product name exists for the choosen branch before.
	public function productExists($product_name){

		$product_name = mysqli_real_escape_string($this->con, $product_name);
				// $branch = mysqli_real_escape_string($this->con, $branch);
		$query = "SELECT product_name FROM products WHERE product_name = '$product_name' ";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run) > 0) {
			return 1;
		}else{
			return 0;
		}
	}



//Product Validation

	public function addProduct($cid, $bid, $product_name, $product_price, $product_stock, $poster_name, $added_date) {

				$product_name = mysqli_real_escape_string($this->con, $product_name);
				$cid = mysqli_real_escape_string($this->con, $cid);
				$bid = mysqli_real_escape_string($this->con, $bid);
				$product_stock = mysqli_real_escape_string($this->con, $product_stock);
				$product_price = mysqli_real_escape_string($this->con, $product_price);
				$poster_name = mysqli_real_escape_string($this->con, $poster_name);
				$added_date = mysqli_real_escape_string($this->con, $added_date);
			if ($this->productExists($product_name)) {
			return "PRODUCT NAME ALREADY EXISTS";
		}else{

$p_alert = 0;
$status = 1;
$p_time = date('Y-m-d H:i:s');

		$query = " INSERT INTO `products`(`pid`, `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `poster_id`, `added_date`, `p_status`, `p_alert`, `p_time`) VALUES (null,'$cid','$bid','$product_name','$product_price','$product_stock','$poster_name','$added_date','$status','$p_alert','$p_time') ";
		
					$query_run = mysqli_query($this->con,$query);

		if ($query_run) {
			return "PRODUCT_ADDED";
		}else {
			return 0;
		}
	}

	}



	 public function storeCustomerOrderInvoice( $order_date, $cust_name, $user_id, $ar_tqty, $ar_qty, $ar_price, $ar_pro_name, $sub_total, $discount, $net_total,$paid, $due, $payment_method) {
$alert = 0;
$month = date("M-Y");
$year = date("Y");

  	$invoice = " INSERT INTO `invoice`(`in_user_name`, `customer_name`, `order_date`, `sub_total`, `discount`, `net_total`, `paid`, `due`, `payment_method`,`alert`,`month`,`year`) VALUES ('$user_id','$cust_name','$order_date','$sub_total','$discount','$net_total','$paid','$due','$payment_method','$alert','$month','$year') ";

  	$invoice_run = mysqli_query($this->con,$invoice);
  	$invoice_id = mysqli_insert_id($this->con);

  	if ($invoice_id != null) {

  		for ($i=0; $i < count($ar_price); $i++) { 

  			$rem = $ar_tqty[$i] - $ar_qty[$i];

  			if ($rem < 0) {
  				return "ORDER FAIL_TO_COMPLETE";
  				
  			}else{

  				$update = mysqli_query($this->con, " UPDATE products SET product_stock = '$rem' WHERE product_name = '$ar_pro_name[$i]' ");
  				
  				
  			}

  		$insert_product = mysqli_query($this->con, " INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `price`, `qty`) VALUES ('$invoice_id','$ar_pro_name[$i]','$ar_price[$i]','$ar_qty[$i]') ");
  		}

  		return "ORDER_COMPLETED";


  	}




}



public function UpdateCusRecord($id, $cus_name){
			$id = mysqli_real_escape_string($this->con, $id);
			$cus_name = mysqli_real_escape_string($this->con, $cus_name);

$updatecus = " UPDATE `invoice` SET `customer_name` = '$cus_name' WHERE `invoice_no` = '$id' ";
$updatecus_run = mysqli_query($this->con, $updatecus);

if ($updatecus_run) {
	//return "UPDATED";
	header("location: admin.record.php");
}else {
	//return mysqli_error($this->con);
		header("location: admin.record.php");
}


}


public function GethomeAlert($table) {

		$table = mysqli_real_escape_string($this->con, $table);
	
$rows = array();
		$query = "SELECT * FROM ".$table." WHERE alert = 0  ORDER BY order_date DESC LIMIT 3";
		$query_run = mysqli_query($this->con,$query);
		
		if (mysqli_num_rows($query_run)  > 0) {
			while($row = mysqli_fetch_assoc($query_run)){
				$rows[] = $row;

			}
			
		}
		return $rows;
		
	}



	public function countAlert(){

		$count = "SELECT * FROM invoice WHERE alert = 0 ";
		$count_run = mysqli_query($this->con,$count);

		if ($count_run) {
			$num = mysqli_num_rows($count_run);
		}
		return $num;
	}



	public function UpdateCategories( $id, $parent_cat, $category_name ){

			$id = mysqli_real_escape_string($this->con, $id);
			$parent_cat = mysqli_real_escape_string($this->con, $parent_cat);
			$category_name = mysqli_real_escape_string($this->con, $category_name);

$updatecat = " UPDATE `categories` SET `parent_cat`= '$parent_cat',`category_name`='$category_name' WHERE `cid` = '$id' ";

			$updatecat_run = mysqli_query($this->con, $updatecat);

			if ($updatecat_run) {
				header("Location: admin.category.php");
				//return "Done";
			}else {

				//return mysqli_error($this->con);
				header("Location: admin.category.php");
			}

	}


public function UpdateBrand( $id, $brand_name ){

			$id = mysqli_real_escape_string($this->con, $id);

			$brand_name = mysqli_real_escape_string($this->con, $brand_name);

$updatebrand = " UPDATE `brands` SET `brand_name`= '$brand_name' WHERE `bid` = '$id' ";

			$updatebrand_run = mysqli_query($this->con, $updatebrand);

			if ($updatebrand_run) {
				header("Location: admin.brand.php");
				//return "Done";
			}else {

				//return mysqli_error($this->con);
				header("Location: admin.brand.php");
			}

	}



public function UpdateProduct( $id, $cid, $bid, $product_name, $product_price, $product_stock, $added_date ){

			$id = mysqli_real_escape_string($this->con, $id);

		$product_name = mysqli_real_escape_string($this->con, $product_name);
				$cid = mysqli_real_escape_string($this->con, $cid);
				$bid = mysqli_real_escape_string($this->con, $bid);
				$product_stock = mysqli_real_escape_string($this->con, $product_stock);
				$product_price = mysqli_real_escape_string($this->con, $product_price);
			
				$added_date = mysqli_real_escape_string($this->con, $added_date);

$updateproduct = " UPDATE `products` SET `cid`= '$cid',`bid`= '$bid',`product_name`= '$product_name',`product_price`= '$product_price',`product_stock`= '$product_stock',`added_date`= '$added_date' WHERE `pid` = '$id' ";

			$updateproduct_run = mysqli_query($this->con, $updateproduct);

			if ($updateproduct_run) {
				header("Location: admin.product.php");
				//return "Done";
			}else {

				//return mysqli_error($this->con);
				header("Location: admin.product.php");
			}

	}


}

//$db = new AdminDBOperation;
// $result = $db->GethomeAlert("invoice");
// echo json_encode($result);

?>