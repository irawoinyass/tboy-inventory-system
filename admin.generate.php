<?php
include_once("./include/admin.manage.php");
require("./fpdf/fpdf.php");


$f = new FPDF('P', 'mm', 'A4');
$f->AddPage();
$f->Rect(5,5,200,287,'D');


$f->SetFont("courier","B", 30);
$f->SetTextColor(100,3,0);
$f->SetXY(25,10);
$f->Cell(0,0,"TBOY COMPUTER TECHNOLOGY",0,0);


$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(35,16);
$f->Cell(0,0,"83, TOWN HALL ROAD, OKE-SOPEN, IJEBU-IGBO, OGUN STATE.",0,0);

$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(75,20);
$f->Cell(0,0,"TEL NO: 08074372815",0,0);
//$f->SetLineWidth(10);

// $f->Line(140, 45, 120, 45);



$m = new AdminManage();
		

		$result = $m->getSigleRecord2("students", "sid", $_GET["sid"]);

$rows = $result['rows'];

if (count($rows) > 0) {
	
foreach ($rows as $row){
	if ($gender = $row["sex"] == "Male") {
		
		$gender = "He";

	}else{
		$gender = "She";
	}

$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(60,38);
$f->Cell(0,0,"APPRENTICE AGREEMENT FORM",0,0);	


$f->Image('image/'.$row["image"], 165,25,30,30);
// list($width, $height) = getimagesize("image/".$row["image"]);
$f->Image('image/comfirmed.png', 165,25,30,30);

$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(6,60);
$f->Cell(0,0,"NAME:_________________________________________________________",0,0);


$f->SetFont("courier","B", 14);
$f->SetTextColor(0,3,0);
$f->SetXY(30,66);
$f->Cell(0,0,"SURNAME",0,0);

$f->SetFont("courier","B", 14);
$f->SetTextColor(0,3,0);
$f->SetXY(90,66);
$f->Cell(0,0,"MIDDLENAME",0,0);

$f->SetFont("courier","B", 14);
$f->SetTextColor(0,3,0);
$f->SetXY(160,66);
$f->Cell(0,0,"OTHERNAME",0,0);



$f->SetFont("courier","b", 12);
$f->SetTextColor(100,3,0);
$f->SetXY(30,60);
$f->Cell(0,0,strtoupper($row["surname"]),0,0);

$f->SetFont("courier","b", 12);
$f->SetTextColor(100,3,0);
$f->SetXY(90,60);
$f->Cell(0,0,strtoupper($row["middlename"]),0,0);

$f->SetFont("courier","b", 12);
$f->SetTextColor(100,3,0);
$f->SetXY(148,60);
$f->Cell(0,0,strtoupper($row["othername"]),0,0);



$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(6,75);
$f->Cell(0,0,"ADDRESS:______________________________________________________",0,0);

$f->SetFont("courier","b",12);
$f->SetTextColor(100,3,0);
$f->SetXY(50,75);
$f->Cell(0,0,strtoupper($row["student_address"]),0,0);


$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(6,85);
$f->Cell(0,0,"STATE OF ORIGIN:______________",0,0);

$f->SetFont("courier","b",12);
$f->SetTextColor(100,3,0);
$f->SetXY(65,85);
$f->Cell(0,0,strtoupper($row["state_of_origin"]." STATE"),0,0);


$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(110,85);
$f->Cell(0,0,"DATE OF BIRTH:_______________",0,0);

$f->SetFont("courier","b",12);
$f->SetTextColor(100,3,0);
$f->SetXY(163,85);
$f->Cell(0,0,date('d-M-Y', strtotime($row["date_of_birth"])),0,0);



$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(6,95);
$f->Cell(0,0,"PHONE:______________________",0,0);

$f->SetFont("courier","b",12);
$f->SetTextColor(100,3,0);
$f->SetXY(40,95);
$f->Cell(0,0,strtoupper($row["phone_no"]),0,0);


$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(110,95);
$f->Cell(0,0,"SEX:_________________________",0,0);

$f->SetFont("courier","b",12);
$f->SetTextColor(100,3,0);
$f->SetXY(160,95);
$f->Cell(0,0,strtoupper($row["sex"]),0,0);


$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(25,106);
$f->Cell(0,0," Made this agreement this day ................................. Month of .........................  Year .................... ",0,0);

$f->SetFont("courier","b",12);
$f->SetTextColor(100,3,0);
$f->SetXY(90,105);
$f->Cell(0,0,date('d', strtotime($row["agreement_date"])),0,0);
$f->SetFont("courier","b",12);
$f->SetTextColor(100,3,0);
$f->SetXY(98,105);
$f->Cell(0,0,date('D', strtotime($row["agreement_date"])),0,0);

$f->SetFont("courier","b",12);
$f->SetTextColor(100,3,0);
$f->SetXY(148,105);
$f->Cell(0,0,date('M', strtotime($row["agreement_date"])),0,0);

$f->SetFont("courier","b",12);
$f->SetTextColor(100,3,0);
$f->SetXY(185,105);
$f->Cell(0,0,date('Y', strtotime($row["agreement_date"])),0,0);





if ($row["course"] == "COMPUTER OPERATOR AND COMPUTER ENGINEERING") {

	$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,112);
$f->Cell(0,0,"That ".$gender." agreed to undergo a course ".$row["course"]." for the",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,117);

$period = date('Y', strtotime($row["to_date"])) - date('Y', strtotime($row["from_date"]));
$Month = date('m', strtotime($row["to_date"])) - date('m', strtotime($row["from_date"]));



if ($period > 1) {
	$period = $period." years , ";
}else if ($period == 0) {
	$period = "";
}

else{
$period = $period." year , ";
}

if ($Month > 1) {
	$Month = $Month." months";
}else if ($Month == 0) {
	$Month = "";
}


else{
$Month = $Month." month";
}


$f->Cell(0,0,"period of ".$period."".$Month." from ". date('d-M-Y', strtotime($row["from_date"]))." to ". date('d-M-Y', strtotime($row["to_date"]))." agreed to all the rules and regulations of the",0,0);

	$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,122);
$f->Cell(0,0,"above named establishment as follows: ",0,0);


	$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,128);
$f->Cell(0,0,"The sum of ".$row["sum_in_word"]." (N".number_format($row["sun_in_no"])." : 00 K) must be paid for the course of Apprenticeship.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,134);
$f->Cell(0,0,"Advance (N".number_format($row["advance"])." : 00 K) Balance (N".number_format($row["balance"])." : 00 K)",0,0);

}else if($row["course"] == "COMPUTER OPERATOR"){


$period = date('Y', strtotime($row["to_date"])) - date('Y', strtotime($row["from_date"]));
$Month = date('m', strtotime($row["from_date"])) - date('m', strtotime($row["to_date"]));
 
if ($period > 1) {
	$period = $period." years , ";
}else if ($period == 0) {
	$period = "";
}

else{
$period = $period." year , ";
}

if ($Month > 1) {
	$Month = $Month." months";
}else if ($Month == 0) {
	$Month = "";
}


else{
$Month = $Month." month";
}


	$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,112);
$f->Cell(0,0,"That ".$gender." agreed to undergo a course ".$row["course"]." for the period of ".$period."".$Month." from ",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,117);





$f->Cell(0,0, date('d-M-Y', strtotime($row["from_date"]))." to ". date('d-M-Y', strtotime($row["to_date"]))." agreed to all the rules and regulations of the above named establishment as",0,0);

	$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(3,122);
$f->Cell(0,0," follows:",0,0);


	$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,128);
$f->Cell(0,0,"The sum of ".$row["sum_in_word"]." (N".number_format($row["sun_in_no"])." : 00 K) must be paid for the course of Apprenticeship.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,134);
$f->Cell(0,0,"Advance (N".number_format($row["advance"])." : 00 K) Balance (N".number_format($row["balance"])." : 00 K)",0,0);


}else if ($row["course"] == "COMPUTER ENGINEERING") {
	

$period = date('Y', strtotime($row["to_date"])) - date('Y', strtotime($row["from_date"]));
$Month = date('m', strtotime($row["to_date"])) - date('m', strtotime($row["from_date"]));



if ($period > 1) {
	$period = $period." years , ";
}else if ($period == 0) {
	$period = "";
}

else{
$period = $period." year , ";
}

if ($Month > 1) {
	$Month = $Month." months";
}else if ($Month == 0) {
	$Month = "";
}


else{
$Month = $Month." month";
}


$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,112);
$f->Cell(0,0,"That ".$gender." agreed to undergo a course ".$row["course"]." for the period of ".$period."".$Month." from ",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,117);





$f->Cell(0,0, date('d-M-Y', strtotime($row["from_date"]))." to ". date('d-M-Y', strtotime($row["to_date"]))." agreed to all the rules and regulations of the above named establishment as",0,0);

	$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(3,122);
$f->Cell(0,0," follows:",0,0);


	$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,128);
$f->Cell(0,0,"The sum of ".$row["sum_in_word"]." (N".number_format($row["sun_in_no"])." : 00 K) must be paid for the course of Apprenticeship.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,134);
$f->Cell(0,0,"Advance (N".number_format($row["advance"])." : 00 K) Balance (N".number_format($row["balance"])." : 00 K)",0,0);
	
}

$f->SetFont("courier","B", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(75,143);
$f->Cell(0,0,"RULES AND REGULATIONS",0,0, 'c');

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,150);
$f->Cell(0,0," 1.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,150);
$f->Cell(0,0,"I am bound to agree to the Rules & Regulations of the above named establishment.",0,0);


$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,155);
$f->Cell(0,0," 2.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,155);
$f->Cell(0,0,"I must obey instuctions and submit myself to any disciplinary measures.",0,0);



$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,160);
$f->Cell(0,0," 3.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,160);
$f->Cell(0,0,"I must exercise diligence skill and care at my daily duties.",0,0);



$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,165);
$f->Cell(0,0," 4.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,165);
$f->Cell(0,0,"I must obey my senior(s) I should not fight or abuse anyone at work or at anywhere.",0,0);


$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,170);
$f->Cell(0,0," 5.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,170);
$f->Cell(0,0,"I must resume to the institution punctuality by 8:30am. And close by 6:00pm.",0,0);


$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,175);
$f->Cell(0,0," 6.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,175);
$f->Cell(0,0,"I must be Honest and Trustworthy, I should not practice stealing and i must be neat always.",0,0);


$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,180);
$f->Cell(0,0," 7.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,180);
$f->Cell(0,0,"I must give notice before absent form duty.",0,0);



$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,185);
$f->Cell(0,0," 8.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,185);
$f->Cell(0,0,"I must not misbehave; I must be quite and be polite to customers or vistors.",0,0);


$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,190);
$f->Cell(0,0," 9.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,190);
$f->Cell(0,0,"I must not go beyond the boundary of the working place.",0,0);



$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(4,195);
$f->Cell(0,0," 10.",0,0);

$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,195);
$f->Cell(0,0,"We the undersigned have carefully read, understood and agreed with all the conditions laid down in ",0,0);
$f->SetFont("times","", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,200);
$f->Cell(0,0,"this agreement before me.  ",0,0);


$f->SetFont("courier","I", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(20,205);
$f->Cell(0,0,"GOD BLESS YOU ALL ''AMEN'' ",0,0);


$f->SetFont("courier","B", 13);
$f->SetTextColor(0,3,0);
$f->SetXY(70,215);
$f->Cell(0,0,"PARENT/GUARDIAN INFORMATION",0,0, 'c');



$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(6,225);
$f->Cell(0,0,"NAME:_________________________________________________________",0,0);


$f->SetFont("courier","b", 12);
$f->SetTextColor(100,3,0);
$f->SetXY(70,225);
$f->Cell(0,0,strtoupper($row["p_name"]),0,0);



$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(6,235);
$f->Cell(0,0,"ADDRESS:______________________________________________________",0,0);


$f->SetFont("courier","b", 12);
$f->SetTextColor(100,3,0);
$f->SetXY(50,235);
$f->Cell(0,0,strtoupper($row["p_address"]),0,0);






$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(6,245);
$f->Cell(0,0,"PHONE:______________________",0,0);

$f->SetFont("courier","b",12);
$f->SetTextColor(100,3,0);
$f->SetXY(40,245);
$f->Cell(0,0,strtoupper($row["p_phone_no"]),0,0);


$f->SetFont("courier","B", 15);
$f->SetTextColor(0,3,0);
$f->SetXY(110,245);
$f->Cell(0,0,"SEX:_________________________",0,0);

$f->SetFont("courier","B",12);
$f->SetTextColor(100,3,0);
$f->SetXY(160,245);
$f->Cell(0,0,strtoupper($row["p_sex"]),0,0);

$f->SetFont("courier","", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(4,260);
$f->Cell(0,0,"_____________________",0,0);
$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(4,265);
$f->Cell(0,0,"APPRENTICE SIGNATURE",0,0);


$f->SetFont("courier","", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(150,260);
$f->Cell(0,0,"_____________________",0,0);
$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(140,265);
$f->Cell(0,0,"PARENT/GUARDIAN SIGNATURE",0,0);



$f->SetFont("courier","", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(76,270);
$f->Cell(0,0,"_________________",0,0);
$f->SetFont("courier","B", 12);
$f->SetTextColor(0,3,0);
$f->SetXY(75,275);
$f->Cell(0,0,"DIRCETOR SIGNATURE",0,0);

$f->Image('image/stamp.png', 82,255,30,20);

$f->Output();

}

}else {

	$c = new FPDF();
$c->AddPage();
$c->SetFont("Arial","B");
$c->Cell(2,16,"NO DATA FOUND",20,0);
$c->Output();

}




?>