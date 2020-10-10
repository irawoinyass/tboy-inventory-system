<?php

include ("fpdf/fpdf.php");

if (isset($_GET["order_date"])) {

	$f = new FPDF('P', 'mm', 'A4');
	$f->AddPage();

	$f->SetFont("courier","B", 25);
$f->SetTextColor(100,3,0);
$f->SetXY(40,10);
$f->Cell(0,0,"TBOY COMPUTER TECHNOLOGY",0,0);

$f->SetFont("courier","B", 10);
$f->SetTextColor(0,3,0);
$f->SetXY(47,16);
$f->Cell(0,0,"83, TOWN HALL ROAD, OKE-SOPEN, IJEBU-IGBO, OGUN STATE.",0,0);

$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(75,20);
$f->Cell(0,0,"TEL NO: 08074372815",0,0);
$f->Image('image/Tlogo.png', 10,1,30,30);


$f->SetFont("courier","B", 12);
$f->SetTextColor(100,3,0);
$f->SetXY(10,40);
$f->Cell(0,0,"Date",0,0);

$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(50,40);
$f->Cell(0,0,":".$_GET["order_date"],0,0);

$f->SetFont("courier","B", 12);
$f->SetTextColor(100,3,0);
$f->SetXY(10,46);
$f->Cell(0,0,"Customer Name",0,0);

$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(50,46);
$f->Cell(0,0,":".$_GET["cust_name"],0,0);


$f->SetFont("courier","B", 12);
$f->SetTextColor(100,3,0);
$f->SetXY(10,52);
$f->Cell(0,0,"By",0,0);

$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(50,52);
$f->Cell(0,0,":".$_GET["user_id"],0,0);
$f->Ln(10);


// $f->SetFont("courier","B", 12);
// $f->SetTextColor(0,3,0);
// // $f->SetXY(10,70);


// $f->SetFont("courier","B", 12);
// // $f->SetTextColor(0,3,0);
// $f->SetXY(30,70);
$f->Cell(10,10,"#",1,0, "C");
$f->Cell(70,10,"Product Name",1,0, "C");
$f->Cell(30,10,"Quantity",1,0, "C");
$f->Cell(40,10,"Price",1,0, "C");
$f->Cell(40,10,"Total",1,1, "C");
//$f->Ln(10);

for ($i=0; $i < count($_GET["pid"]); $i++) { 

	$f->Cell(10,10,($i+1),1,0, "C");
	$f->Cell(70,10,$_GET["pro_name"][$i],1,0, "C");
	$f->Cell(30,10,$_GET["qty"][$i],1,0, "C");
	$f->Cell(40,10,"N".number_format($_GET["price"][$i],2)."K",1,0, "C");
	$f->Cell(40,10,"N".number_format($_GET["qty"][$i] * $_GET["price"][$i],2)."K",1,1, "C");
	
}

$f->Cell(50,10,"",0,1);

$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Sub Total",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":N".number_format($_GET["sub_total"],2)."K",0,1);

$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Discount",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":N".number_format($_GET["discount"],2)."K",0,1);

$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Net Total",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":N".number_format($_GET["net_total"],2)."K",0,1);


$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Amount Paid",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":N".number_format($_GET["paid"],2)."K",0,1);


$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Due Amount",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":N".number_format($_GET["due"],2)."K",0,1);

$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Payment Method",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":".$_GET["payment_method"],0,1);
$f->Ln(6);

$f->SetTextColor(0,3,0);
$f->Cell(150,10,"_________________",0,1,"L");
$f->Cell(150,5,"Customer's Signature",0,0,"L");

$f->Image('image/stamp.png', 70,210,80,50);
$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(97,238);
$f->Cell(0,0,"Director",0,0);
$f->SetXY(97,242);
$f->Cell(0,0,date("Y-M-d"),0,0);
// $f->Cell(100,10,"_________________",0,1,"C");
// $f->Cell(100,10,"Director Signature",0,0,"C");

// $f->SetFont("courier","B", 12);
// $f->SetTextColor(100,3,0);
// $f->SetXY(140,10);
// $f->Cell(0,0,"By",0,0);







	$f->Output();
}



?>