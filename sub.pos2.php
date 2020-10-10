<?php 


include ("fpdf/fpdf.php");
include ("./include/admin.php");

$manage = new Admin();

$records = $manage->getSigleRecord("invoice","invoice_no", $_GET["id"]);



foreach ($records as $record) {
	
$f = new FPDF('P', 'mm', 'A4');
	$f->AddPage();
$f->SetFont("Courier","B", 8);
$f->SetTextColor(0,3,0);
$f->SetXY(0,5);
$f->Cell(0,0,"TBOY COMPUTER TECHNOLOGY",0,0);
// $f->SetTextColor(0,3,0);
$f->SetXY(4,8);
$f->Cell(0,0,"83, TOWN HALL ROAD , ",0,0);
$f->SetXY(12,11);
$f->Cell(0,0,"OKE-SOPEN",0,0);
$f->SetXY(10,15);
$f->Cell(0,0,"08074372815",0,0);


$f->SetFont("courier","B", 6);
$f->SetTextColor(100,3,0);
$f->SetXY(0,19);
$f->Cell(0,0,"Date",0,0);

$f->SetFont("courier","B", 6);
$f->SetTextColor(0,3,0);
$f->SetXY(17,19);
$f->Cell(0,0,":".$record["order_date"],0,0);

$f->SetFont("courier","B", 6);
$f->SetTextColor(100,3,0);
$f->SetXY(0,22);;
$f->Cell(0,0,"Customer Name",0,0);

$f->SetFont("courier","B", 6);
$f->SetTextColor(0,3,0);
$f->SetXY(17,22);
$f->Cell(0,0,":".$record["customer_name"],0,0);


$f->SetFont("courier","B", 6);
$f->SetTextColor(100,3,0);
$f->SetXY(0,25);
$f->Cell(0,0,"By",0,0);

$f->SetFont("courier","B", 6);
$f->SetTextColor(0,3,0);
$f->SetXY(17,25);
$f->Cell(0,0,":".$record["in_user_name"],0,0);

$f->SetXY(10,29);
$f->Cell(0,0,"-----------------------",0,0);
$f->Ln(3);

// $f->Cell(10,10,"#",1,0, "C");
// $f->Cell(70,10,"Product Name",1,0, "C");
// $f->Cell(30,10,"Quantity",1,0, "C");
// $f->Cell(40,10,"Price",1,0, "C");
// $f->Cell(40,10,"Total",1,1, "C");


$rows = $manage->getSigleRecord("invoice_details","invoice_no", $record["invoice_no"]);
$n = 0;
foreach ($rows as $row) {
	
for ($i=0; $i < count($row["invoice_no"]); $i++) { 
	$f->SetFont("courier","B", 7);
	//$f->SetXY(10,11);
	$f->Cell(1,6,(++$n."."),0,0, "C");
	// $f->SetXY(3,32);
	$f->Cell(20,6,$row["product_name"],0,0, "C");
	// $f->SetXY(14,32);
	 $f->Cell(3,6,$row["qty"]."x",0,1, "C");
	// $f->SetXY(20,32);
	 $f->Cell(10,6,"N".number_format($row["price"]),0,0, "C");
	// $f->SetXY(29,32);
	 $f->Cell(16,6,"= N".number_format($row["qty"] * $row["price"]),0,1, "C");
	
}


}

$f->SetFont("courier","B", 7);
$f->Cell(40,1,"",0,1);
$f->Cell(50,5,"---------------------",0,1);
$f->SetTextColor(0,3,0);
$f->Cell(14,5,"Sub Total",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,5,":N".number_format($record["sub_total"]),0,1);


// $f->SetTextColor(0,3,0);
// $f->Cell(15,5,"Discount",0,0);
// $f->SetTextColor(100,3,0);
// $f->Cell(50,5,":N".number_format($record["discount"]),0,1);

$f->SetTextColor(0,3,0);
$f->Cell(15,5,"Net Total",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,5,":N".number_format($record["net_total"]),0,1);


$f->SetTextColor(0,3,0);
$f->Cell(17,5,"Amount Paid",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,5,":N".number_format($record["paid"]),0,1);

$f->SetTextColor(0,3,0);
$f->Cell(16,5,"Due Amount",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,5,":N".number_format($record["due"],2)."K",0,1);

$f->SetTextColor(0,3,0);
$f->Cell(13,5,"Payment",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,5,":".$record["payment_method"],0,1);
$f->SetFont("courier","B", 6);
$f->SetTextColor(0,3,0);
$f->Cell(30,5,"Thanks for coming...",1,1,"C");
$f->Cell(50,5,"www.tboycomputer.com.ng",0,0,"L");






$f->Output();

}


















?>