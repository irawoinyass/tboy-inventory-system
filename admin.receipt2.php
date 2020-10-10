<?php

include ("fpdf/fpdf.php");
include ("./include/admin.php");

$manage = new Admin();

$records = $manage->getSigleRecord("invoice","invoice_no", $_GET["id"]);



foreach ($records as $record) {
	
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
$f->Cell(0,0,":".$record["order_date"],0,0);

$f->SetFont("courier","B", 12);
$f->SetTextColor(100,3,0);
$f->SetXY(10,46);
$f->Cell(0,0,"Customer Name",0,0);

$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(50,46);
$f->Cell(0,0,":".$record["customer_name"],0,0);


$f->SetFont("courier","B", 12);
$f->SetTextColor(100,3,0);
$f->SetXY(10,52);
$f->Cell(0,0,"By",0,0);

$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(50,52);
$f->Cell(0,0,":".$record["in_user_name"],0,0);
$f->Ln(10);



$f->Cell(10,10,"#",1,0, "C");
$f->Cell(70,10,"Product Name",1,0, "C");
$f->Cell(30,10,"Quantity",1,0, "C");
$f->Cell(40,10,"Price",1,0, "C");
$f->Cell(40,10,"Total",1,1, "C");

$rows = $manage->getSigleRecord("invoice_details","invoice_no", $record["invoice_no"]);
$n = 0;
foreach ($rows as $row) {
	
for ($i=0; $i < count($row["invoice_no"]); $i++) { 

	$f->Cell(10,10,(++$n),1,0, "C");
	$f->Cell(70,10,$row["product_name"],1,0, "C");
	$f->Cell(30,10,$row["qty"],1,0, "C");
	$f->Cell(40,10,"N".number_format($row["price"],2)."K",1,0, "C");
	$f->Cell(40,10,"N".number_format($row["qty"] * $row["price"],2)."K",1,1, "C");
	
}


}



$f->Cell(50,10,"",0,1);

$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Sub Total",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":N".number_format($record["sub_total"],2)."K",0,1);

$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Discount",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":N".number_format($record["discount"],2)."K",0,1);

$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Net Total",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":N".number_format($record["net_total"],2)."K",0,1);


$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Amount Paid",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":N".number_format($record["paid"],2)."K",0,1);


$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Due Amount",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":N".number_format($record["due"],2)."K",0,1);

$f->SetTextColor(0,3,0);
$f->Cell(50,10,"Payment Method",0,0);
$f->SetTextColor(100,3,0);
$f->Cell(50,10,":".$record["payment_method"],0,1);
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
$f->Cell(0,0,$record["order_date"],0,0);




$f->Output();

}








?>