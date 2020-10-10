<?php

include ("fpdf/fpdf.php");

if (isset($_GET["order_date"])) {

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
$f->Cell(0,0,":".$_GET["order_date"],0,0);

$f->SetFont("courier","B", 6);
$f->SetTextColor(100,3,0);
$f->SetXY(0,22);;
$f->Cell(0,0,"Customer Name",0,0);

$f->SetFont("courier","B", 6);
$f->SetTextColor(0,3,0);
$f->SetXY(17,22);
$f->Cell(0,0,":".$_GET["cust_name"],0,0);


$f->SetFont("courier","B", 6);
$f->SetTextColor(100,3,0);
$f->SetXY(0,25);
$f->Cell(0,0,"By",0,0);

$f->SetFont("courier","B", 6);
$f->SetTextColor(0,3,0);
$f->SetXY(17,25);
$f->Cell(0,0,":".$_GET["user_id"],0,0);
$f->SetXY(10,29);
$f->Cell(0,0,"-----------------------",0,0);
$f->Ln(3);


// $f->SetFont("courier","B", 12);
// $f->SetTextColor(0,3,0);
// // $f->SetXY(10,70);


// $f->SetFont("courier","B", 12);
// // $f->SetTextColor(0,3,0);
// $f->SetXY(30,70);
// $f->Cell(10,10,"#",1,0, "C");
// $f->Cell(70,10,"Product Name",1,0, "C");
// $f->Cell(30,10,"Quantity",1,0, "C");
// $f->Cell(40,10,"Price",1,0, "C");
// $f->Cell(40,10,"Total",1,1, "C");
//$f->Ln(10);

for ($i=0; $i < count($_GET["pid"]); $i++) { 

$f->SetFont("courier","B", 7);

	$f->Cell(1,6,($i+1).". ",0,0, "C");
	// $f->SetXY(3,32);
	$f->Cell(20,6,$_GET["pro_name"][$i],0,0, "C");
	// $f->SetXY(14,32);
	 $f->Cell(7,6,$_GET["qty"][$i]."x",0,1, "C");
	// $f->SetXY(20,32);
	 $f->Cell(10,6,"N".number_format($_GET["price"][$i]),0,0, "C");
	// $f->SetXY(29,32);
	 $f->Cell(16,6,"= N".number_format($_GET["qty"][$i] * $_GET["price"][$i]),0,1, "C");

	// $f->Cell(10,10,($i+1),1,0, "C");
	// $f->Cell(70,10,$_GET["pro_name"][$i],1,0, "C");
	// $f->Cell(30,10,$_GET["qty"][$i],1,0, "C");
	// $f->Cell(40,10,"N".number_format($_GET["price"][$i],2)."K",1,0, "C");
	// $f->Cell(40,10,"N".number_format($_GET["qty"][$i] * $_GET["price"][$i],2)."K",1,1, "C");
	
}

$f->SetFont("courier","B", 7);
$f->Cell(40,1,"",0,1);
$f->Cell(50,5,"---------------------",0,1);
$f->SetTextColor(0,3,0);
$f->Cell(14,5,"Sub Total",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,5,":N".number_format($_GET["sub_total"]),0,1);

// $f->SetTextColor(0,3,0);
// $f->Cell(50,10,"Discount",0,0);
// $f->SetTextColor(100,3,0);
// $f->Cell(50,10,":N".number_format($_GET["discount"],2)."K",0,1);

$f->SetTextColor(0,3,0);
$f->Cell(15,5,"Net Total",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,5,":N".number_format($_GET["net_total"]),0,1);


$f->SetTextColor(0,3,0);
$f->Cell(17,5,"Amount Paid",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,5,":N".number_format($_GET["paid"]),0,1);


$f->SetTextColor(0,3,0);
$f->Cell(16,5,"Due Amount",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,5,":N".number_format($_GET["due"]),0,1);

$f->SetTextColor(0,3,0);
$f->Cell(13,5,"Payment",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,5,":".$_GET["payment_method"],0,1);
$f->SetFont("courier","B", 6);
$f->SetTextColor(0,3,0);
$f->Cell(30,5,"Thanks for coming...",1,1,"C");
$f->Cell(50,5,"www.tboycomputer.com.ng",0,0,"L");

	$f->Output();
}



?>