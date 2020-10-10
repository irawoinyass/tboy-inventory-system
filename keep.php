<?php


require 'escpos/autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

include ("./include/admin.php");

$manage = new Admin();

$records = $manage->getSigleRecord("invoice","invoice_no", $_GET["id"]);

foreach ($records as $record) {


try {

 
$connector = new WindowsPrintConnector("XP-58");
$printer = new Printer($connector);
// $printer ->setLineSpacing(1);
// $printer ->setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("TBOY COMPUTER TECHNOLOGY\n");

$printer -> text("83, TOWN HALL ROAD, OKE-SOPEN,\n");

$printer -> text(" I-IGBO, OGUN STATE \n");

$printer -> text("TEL NO: 08074372815. \n\n");

$order_date = $record['order_date'];
$line_order = sprintf('%-13.40s %-13.40s', "Date ",":$order_date");
$printer -> text("$line_order\n");
$cust_name = $record['customer_name'];
$line_cust = sprintf('%-13.40s %-13.40s', "Customer name ",":$cust_name");
$printer -> text("$line_cust\n");

$by = $record['in_user_name'];
$line_by = sprintf('%-13.40s %-13.40s', "by ",":$by");
$printer -> text("$line_by\n");

$printer -> text("==============================\n");
// $line = sprintf('%-14.40s %-7.40s %-13.40s %-13.40s', "P", "Q", "P", "T");

// $printer -> text("$line\n");
$rows = $manage->getSigleRecord("invoice_details","invoice_no", $record["invoice_no"]);
$n = 0;
	
foreach ($rows as $row) {
	
for ($i=0; $i < count($row["invoice_no"]); $i++) { 
	
	$num = ++$n.".";
	$pro_name = $row["product_name"];
	$qty = $row["qty"]." X";
	$price = "N".number_format($row["price"],2)."K =";
	$total = "N".number_format($row["qty"] * $row["price"],2)."K";
$line2 = sprintf('%1.4s %-13.40s %3.30s %2.40s %-8.40s'," $num",  "$pro_name", "$qty", "$price","$total");

$printer -> text("$line2\n");
}
}
$printer -> text("-------------------------------\n\n");

$sub_total = "N".number_format($record["sub_total"],2)."K";
$line_sub = sprintf('%-15.40s %-13.40s', "Sub Total ",":$sub_total");
$printer -> text("$line_sub\n");

$discount = "N".number_format($record["discount"],2)."K";
$line_discount = sprintf('%-15.40s %-13.40s', "Discount ",":$discount");
$printer -> text("$line_discount\n");

$net_total = "N".number_format($record["net_total"],2)."K";
$line_net_total = sprintf('%-15.40s %-13.40s', "Net Total ",":$net_total");
$printer -> text("$line_net_total\n");

$paid = "N".number_format($record["paid"],2)."K";
$line_paid = sprintf('%-15.40s %-13.40s', "Paid ",":$paid");
$printer -> text("$line_paid\n");

$due = "N".number_format($record["due"],2)."K";
$line_due = sprintf('%-15.40s %-13.40s', "Due ",":$due");
$printer -> text("$line_due\n");

$payment_method = $record['payment_method'];
$line_payment_method = sprintf('%-14.40s %-13.40s', "Payment method ",":$payment_method");
$printer -> text("$line_payment_method\n");
$printer -> text("-------------------------------\n");
$printer -> text("Thanks For coming!.......\n\n");
$printer -> cut();
$printer -> close();
header("Location: admin.record.php");




} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}





}

?>


<?php

require 'escpos/autoload.php';
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

if (isset($_GET["order_date"])) {

try {

 
$connector = new FilePrintConnector("XP-58");
$printer = new Printer($connector);
// $printer ->setLineSpacing(1);
// $printer ->setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("TBOY COMPUTER TECHNOLOGY\n");

$printer -> text("83, TOWN HALL ROAD, OKE-SOPEN,\n");

$printer -> text(" I-IGBO, OGUN STATE \n");

$printer -> text("TEL NO: 08074372815. \n\n");

$order_date = $_GET['order_date'];
$line_order = sprintf('%-13.40s %-13.40s', "Date ",":$order_date");
$printer -> text("$line_order\n");
$cust_name = $_GET['cust_name'];
$line_cust = sprintf('%-13.40s %-13.40s', "Customer name ",":$cust_name");
$printer -> text("$line_cust\n");

$by = $_GET['user_id'];
$line_by = sprintf('%-13.40s %-13.40s', "by ",":$by");
$printer -> text("$line_by\n");

$printer -> text("==============================\n");
// $line = sprintf('%-14.40s %-7.40s %-13.40s %-13.40s', "P", "Q", "P", "T");
// $printer -> text("$line\n");
	
for ($i=0; $i < count($_GET["pid"]); $i++) {
	$one = 1;
	$num = $i+$one.".";
	$pro_name = $_GET["pro_name"][$i];
	$qty = $_GET["qty"][$i]." X";
	$price = "N".number_format($_GET["price"][$i],2)."K";
	$total = "N".number_format($_GET["qty"][$i] * $_GET["price"][$i],2)."K";
$line2 = sprintf('%1.4s %-13.40s %3.30s %2.40s %2.40s %-8.40s'," $num",  "$pro_name", "$qty", "$price", "=","$total");

$printer -> text("$line2\n");

}
$printer -> text("-------------------------------\n\n");

$sub_total = "N".number_format($_GET["sub_total"],2)."K";
$line_sub = sprintf('%-15.40s %-13.40s', "Sub Total ",":$sub_total");
$printer -> text("$line_sub\n");

$discount = "N".number_format($_GET["discount"],2)."K";
$line_discount = sprintf('%-15.40s %-13.40s', "Discount ",":$discount");
$printer -> text("$line_discount\n");

$net_total = "N".number_format($_GET["net_total"],2)."K";
$line_net_total = sprintf('%-15.40s %-13.40s', "Net Total ",":$net_total");
$printer -> text("$line_net_total\n");

$paid = "N".number_format($_GET["paid"],2)."K";
$line_paid = sprintf('%-15.40s %-13.40s', "Paid ",":$paid");
$printer -> text("$line_paid\n");

$due = "N".number_format($_GET["due"],2)."K";
$line_due = sprintf('%-15.40s %-13.40s', "Due ",":$due");
$printer -> text("$line_due\n");

$payment_method = $_GET['payment_method'];
$line_payment_method = sprintf('%-14.40s %-13.40s', "Payment method ",":$payment_method");
$printer -> text("$line_payment_method\n");
$printer -> text("-------------------------------\n");
$printer -> text("Thanks For coming!.......\n\n");
$printer -> cut();
$printer -> close();
header("Location: admin.order.php");




} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}




}

?>


<?php

require 'escpos/autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

if (isset($_GET["order_date"])) {

try {

 
$connector = new WindowsPrintConnector("XP-58");
$printer = new Printer($connector);
// $printer ->setLineSpacing(1);
// $printer ->setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("TBOY COMPUTER TECHNOLOGY\n");

$printer -> text("83, TOWN HALL ROAD, OKE-SOPEN,\n");

$printer -> text(" I-IGBO, OGUN STATE \n");

$printer -> text("TEL NO: 08074372815. \n\n");

$order_date = $_GET['order_date'];
$line_order = sprintf('%-13.40s %-13.40s', "Date ",":$order_date");
$printer -> text("$line_order\n");
$cust_name = $_GET['cust_name'];
$line_cust = sprintf('%-13.40s %-13.40s', "Customer name ",":$cust_name");
$printer -> text("$line_cust\n");

$by = $_GET['user_id'];
$line_by = sprintf('%-13.40s %-13.40s', "by ",":$by");
$printer -> text("$line_by\n");

$printer -> text("==============================\n");
// $line = sprintf('%-14.40s %-7.40s %-13.40s %-13.40s', "P", "Q", "P", "T");
// $printer -> text("$line\n");
	
for ($i=0; $i < count($_GET["pid"]); $i++) {
	$one = 1;
	$num = $i+$one.".";
	$pro_name = $_GET["pro_name"][$i];
	$qty = $_GET["qty"][$i]." X";
	$price = "N".number_format($_GET["price"][$i],2)."K";
	$total = "N".number_format($_GET["qty"][$i] * $_GET["price"][$i],2)."K";
$line2 = sprintf('%1.4s %-13.40s %3.30s %2.40s %2.40s %-8.40s'," $num",  "$pro_name", "$qty", "$price", "=","$total");

$printer -> text("$line2\n");
;
}
$printer -> text("-------------------------------\n\n");

$sub_total = "N".number_format($_GET["sub_total"],2)."K";
$line_sub = sprintf('%-15.40s %-13.40s', "Sub Total ",":$sub_total");
$printer -> text("$line_sub\n");

$discount = "N".number_format($_GET["discount"],2)."K";
$line_discount = sprintf('%-15.40s %-13.40s', "Discount ",":$discount");
$printer -> text("$line_discount\n");

$net_total = "N".number_format($_GET["net_total"],2)."K";
$line_net_total = sprintf('%-15.40s %-13.40s', "Net Total ",":$net_total");
$printer -> text("$line_net_total\n");

$paid = "N".number_format($_GET["paid"],2)."K";
$line_paid = sprintf('%-15.40s %-13.40s', "Paid ",":$paid");
$printer -> text("$line_paid\n");

$due = "N".number_format($_GET["due"],2)."K";
$line_due = sprintf('%-15.40s %-13.40s', "Due ",":$due");
$printer -> text("$line_due\n");

$payment_method = $_GET['payment_method'];
$line_payment_method = sprintf('%-14.40s %-13.40s', "Payment method ",":$payment_method");
$printer -> text("$line_payment_method\n");
$printer -> text("-------------------------------\n");
$printer -> text("Thanks For coming!.......\n\n");
$printer -> cut();
$printer -> close();
header("Location: sub.order.php");




} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}




}

?>


<?php 

require 'escpos/autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

include ("./include/sub.login.php");

$manage = new SubAdmin();

$records = $manage->getSigleRecord("invoice","invoice_no", $_GET["id"]);

foreach ($records as $record) {


try {

 
$connector = new WindowsPrintConnector("XP-58");
$printer = new Printer($connector);
// $printer ->setLineSpacing(1);
// $printer ->setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("TBOY COMPUTER TECHNOLOGY\n");

$printer -> text("83, TOWN HALL ROAD, OKE-SOPEN,\n");

$printer -> text(" I-IGBO, OGUN STATE \n");

$printer -> text("TEL NO: 08074372815. \n\n");

$order_date = $record['order_date'];
$line_order = sprintf('%-13.40s %-13.40s', "Date ",":$order_date");
$printer -> text("$line_order\n");
$cust_name = $record['customer_name'];
$line_cust = sprintf('%-13.40s %-13.40s', "Customer name ",":$cust_name");
$printer -> text("$line_cust\n");

$by = $record['in_user_name'];
$line_by = sprintf('%-13.40s %-13.40s', "by ",":$by");
$printer -> text("$line_by\n");

$printer -> text("==============================\n");
// $line = sprintf('%-14.40s %-7.40s %-13.40s %-13.40s', "P", "Q", "P", "T");

// $printer -> text("$line\n");
$rows = $manage->getSigleRecord("invoice_details","invoice_no", $record["invoice_no"]);
$n = 0;
	
foreach ($rows as $row) {
	
for ($i=0; $i < count($row["invoice_no"]); $i++) { 
	
	$num = ++$n.".";
	$pro_name = $row["product_name"];
	$qty = $row["qty"]." X";
	$price = "N".number_format($row["price"],2)."K =";
	$total = "N".number_format($row["qty"] * $row["price"],2)."K";
$line2 = sprintf('%1.4s %-13.40s %3.30s %2.40s %-8.40s'," $num",  "$pro_name", "$qty", "$price","$total");

$printer -> text("$line2\n");
}
}
$printer -> text("-------------------------------\n\n");

$sub_total = "N".number_format($record["sub_total"],2)."K";
$line_sub = sprintf('%-15.40s %-13.40s', "Sub Total ",":$sub_total");
$printer -> text("$line_sub\n");

$discount = "N".number_format($record["discount"],2)."K";
$line_discount = sprintf('%-15.40s %-13.40s', "Discount ",":$discount");
$printer -> text("$line_discount\n");

$net_total = "N".number_format($record["net_total"],2)."K";
$line_net_total = sprintf('%-15.40s %-13.40s', "Net Total ",":$net_total");
$printer -> text("$line_net_total\n");

$paid = "N".number_format($record["paid"],2)."K";
$line_paid = sprintf('%-15.40s %-13.40s', "Paid ",":$paid");
$printer -> text("$line_paid\n");

$due = "N".number_format($record["due"],2)."K";
$line_due = sprintf('%-15.40s %-13.40s', "Due ",":$due");
$printer -> text("$line_due\n");

$payment_method = $record['payment_method'];
$line_payment_method = sprintf('%-14.40s %-13.40s', "Payment method ",":$payment_method");
$printer -> text("$line_payment_method\n");
$printer -> text("-------------------------------\n");
$printer -> text("Thanks For coming!.......\n\n");
$printer -> cut();
$printer -> close();
header("Location: sub.record.php");




} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}





}












?>