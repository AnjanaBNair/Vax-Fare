<?php
require('fpdf/fpdf.php');

// Database Connection 
require("connect.php");
$new_id=$_GET["new_id"];
//Check for connection error
if($con->connect_error){
  die("Error in DB connection: ".$con->connect_errno." : ".$con->connect_error);    
}

// Select data from MySQL database

$select = "SELECT * FROM tbl_booking where book_id='$new_id' ORDER BY book_id ASC LIMIT 1;";
$result = $con->query($select);

$select2 = "SELECT * FROM tbl_schedule where book_id='$new_id' and status=0 ORDER BY book_id DESC LIMIT 1;";
$result2 = $con->query($select2);

$slct = "SELECT * FROM tbl_schedule where book_id='$new_id' and status=0 ORDER BY book_id ASC LIMIT 1;";
$rslt= $con->query($slct);
$rw= $rslt->fetch_object();

$row2 = $result2->fetch_object();
$cid=$row2->centre;
$vid=$row2->vaccine;

$select3 = "SELECT * FROM tbl_centre where centre_id='$cid';";
$result3 = $con->query($select3);
$row3= $result3->fetch_object();

$select4 = "SELECT * FROM tbl_vaccine where vaccine_id='$vid';";
$result4 = $con->query($select4);
$row4 = $result4->fetch_object();


$pdf = new FPDF();
$pdf->AddPage();

// Set the logo image width and height
$logoWidth = 10;
$logoHeight = 10;

// Center the logo horizontally
$pdf->Image('vax.png', $pdf->GetPageWidth()/2 - $logoWidth/2, 20, $logoWidth, $logoHeight);

// Move cursor below the logo
$pdf->Ln(15);

$pdf->SetFont('Arial','B',12);
$logoName = 'VaX-FarE';
$pdf->SetTextColor(8,29,69);
$pdf->Cell(0, 15, $logoName, 0, 1, 'C');

// Center the certificate title
$pdf->SetFont('Arial','B',18);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,5,'Certificate For Covid-19 Vaccination',0,1,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0,0,255);
$pdf->Cell(0,5,'Vaccination Successful',0,1,'C');
$pdf->Ln();

$pdf->SetLineWidth(0.5);
$pdf->Line(30, $pdf->GetY(), $pdf->GetPageWidth() - 30, $pdf->GetY());
$pdf->Ln();

$pdf->SetTextColor(0, 0, 0); 
$row = $result->fetch_object();

$rid=$row->proof;
$select1 = "SELECT * FROM tbl_proof where proof_id='$rid';";
$result1 = $con->query($select1);
$row1 = $result1->fetch_object();

$name = $row->fname ." ".$row->lname;
$gender = $row->gender;
$dob = $row->dob;
$proof = $row1->proof;
$pid = $row->proof_id;


$vaccine=$row4->vaccine;
$centre=$row3->name;
$date1=$row2->date;
$date2=$rw->date;

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(0,0,255);
$pdf->Cell(0,10,'Beneficary Details',0,1,'L');
$pdf->Ln();
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','B',12);

// Print the data side by side
$pdf->Cell(70, 10, 'Beneficary Name', 0, 0, 'L');
$pdf->Cell(0, 10, $name, 0, 1, 'L');
$pdf->Cell(70, 10, 'Gender', 0, 0, 'L');
$pdf->Cell(0, 10, $gender, 0, 1, 'L');
$pdf->Cell(70, 10, 'Proof', 0, 0, 'L');
$pdf->Cell(0, 10, $proof, 0, 1, 'L');
$pdf->Cell(70, 10, 'ID Verified ', 0, 0, 'L');
$pdf->Cell(0, 10, $pid, 0, 1, 'L');
$pdf->Cell(70, 10, 'Vaccination Status ', 0, 0, 'L');
$pdf->Cell(0, 10, 'Fully Vaccinated ( Dose 1 )', 0, 1, 'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(0,0,255);
$pdf->Cell(0,10,'Vaccination Details',0,1,'L');
$pdf->Ln();
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','B',12);
// Print the data side by side
$pdf->Cell(70, 10, 'Vaccine Name', 0, 0, 'L');
$pdf->Cell(0, 10, $vaccine, 0, 1, 'L');
$pdf->Cell(70, 10, 'First Dose             Second Dose', 0, 0, 'L');
$pdf->Cell(0, 10, $date2.' '.$date1, 0, 1, 'L');
$pdf->Cell(70, 10, 'Vaccinated At', 0, 0, 'L');
$pdf->Cell(0, 10, $centre, 0, 1, 'L');
$pdf->Cell(70, 10, 'Dose Number ', 0, 0, 'L');
$pdf->Cell(0, 10, '2/2', 0, 1, 'L');
$pdf->Ln();

// Set the width and height of the image
$Width = 210;
$Height = 50;

// Add the image to the PDF
$pdf->Image('bottom.png', 0, 245, $Width, $Height);
$pdf->Output();
?> 