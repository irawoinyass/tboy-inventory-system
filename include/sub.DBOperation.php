<?php 

//lasisi saheed 0!!!
// developer 

class SubAdminDBOperation {

	private $host, $user, $pass, $db_name;
		public $con;

public function __construct(){
	$this->con = mysqli_connect($this->host="localhost", $this->user="root", $this->pass="", $this->db_name="tboy");
	
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



  


}		

		?>