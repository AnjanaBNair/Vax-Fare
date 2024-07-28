<?php
require('fpdf/fpdf.php');

// Database Connection 
require("connect.php");

//Check for connection error
if($con->connect_error){
  die("Error in DB connection: ".$con->connect_errno." : ".$con->connect_error);    
}

// Select data from MySQL database

$select = "SELECT * FROM tbl_vaccinator";
$result = $con->query($select);

$pdf = new FPDF();
$pdf->AddPage();

// Set the logo image width and height
$logoWidth = 10;
$logoHeight = 10;

$pdf->Image('vax.png', 10, 10, $logoWidth, $logoHeight);
$pdf->SetFont('Arial','B',12);

// Move cursor to the right and below the logo image
$pdf->SetXY(5 + $logoWidth+5, 10);

// Set the logo name
$logoName = 'VaX-FarE';

// Set the font color to blue
$pdf->SetTextColor(8,29,69) ;

// Print the logo name
$pdf->Cell(0, 10, $logoName, 0, 1);

// Set the font color back to black


// Print the rest of the PDF content
$pdf->SetFont('Arial','B',19);
$pdf->SetTextColor(0, 0, 139);
$pdf->Cell(0,10,'Vaccinator Details',0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,10,'Details of total vaccinators included in the vaccination process','B',1,'C');
$pdf->Ln();

$pdf->SetTextColor(0, 0, 139);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(210, 240, 240);
$pdf->Cell(30,10,'ID',1,0,'C',1);
$pdf->Cell(40,10,'Name',1,0,'C',1);
$pdf->Cell(40,10,'Address',1,0,'C',1);
$pdf->Cell(30,10,'Phone',1,0,'C',1);
$pdf->Cell(44,10,'Role',1,1,'C',1);


$pdf->SetTextColor(0, 0, 0); 
while($row = $result->fetch_object()){
    $rid=$row->role;
    $select1 = "SELECT * FROM tbl_role where role_id='$rid';";
$result1 = $con->query($select1);
$row1 = $result1->fetch_object();

  $id = $row->emp;
  $name = $row->fname ." ".$row->lname;
  $address = $row->house;
  $phone = $row->mob;
  $role = $row1->role;
  
  $pdf->Cell(30,10,$id,1);
  $pdf->Cell(40,10,$name,1);
  $pdf->Cell(40,10,$address,1);
  $pdf->Cell(30,10,$phone,1);
  $pdf->Cell(44,10,$role,1);
  $pdf->Ln();
}

$pdf->Output();

?>