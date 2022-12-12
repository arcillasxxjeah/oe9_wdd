<?php
    include('connect.php');
    include('fpdf185/fpdf.php');
    
    $pdf=new FPDF();

    //Creating new pdf page

    $pdf->AddPage();
    //Set the base font & size
    $pdf->SetFont('Arial','B',20);

$pdf->Image("https://cdn-icons-png.flaticon.com/512/3254/3254413.png", 60, 8, 7); 
    $pdf->Cell(100,5,"Login User");

	
    //Creating new line
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','B',9);
    
    $pdf->Cell(37,10,"First Name",1,0,'C');
    $pdf->Cell(37,10,"Last Name",1,0,'C');
    $pdf->Cell(37,10,"Birthdate",1,0,'C');
    $pdf->Cell(45,10,"Email Address",1,0,'C');
    $pdf->Ln();
    

    // Fetch data from table

    $result = mysqli_query($con,"select * from users_tbl");

    while($row=mysqli_fetch_array($result)){
        $pdf->SetFont('Arial','I',9);
       
        $pdf->Cell(37,10,"{$row['firstname']}" ,1,0,'C');
        $pdf->Cell(37,10,"{$row['lastname']}" ,1,0,'C');
        $pdf->Cell(37,10,"{$row['birthdate']}" ,1,0,'C');
        $pdf->Cell(45,10,"{$row['email']}" ,1,0,'C');
        $pdf->multiCell(37,10,"");
      
        
    }

    $pdf->Output();
