<?php
require_once '../includeFiles/Connection.php';
require_once '../admin/pdfGen/fpdf.php';



//Select query here

$sqlPatientName = "SELECT fullname FROM patients WHERE uniqueID = '".$_SESSION['refPid']."'";
$patientName = '';
if($myQuery = mysqli_query($con, $sqlPatientName)){
    while($rows = mysqli_fetch_assoc($myQuery)){
        $patientName = $rows['fullname'];
    }
}

$activeLOG = $_SESSION['refAID'];
$getStaffName = "SELECT staffName FROM activelog, staff WHERE activelog.id = '$activeLOG' AND staff.staffNumber =  activelog.coID AND activeStatus = 'active'";
$staffName = '';
if($mySQuery = mysqli_query($con, $getStaffName)){
    if(mysqli_num_rows($mySQuery) > 0 ){
        while($row = mysqli_fetch_assoc($mySQuery)){
            $staffName = $row['staffName'];
//            echo $staffName;
        }
    }else {
        header('location: index.php');
//        echo "Nothing";
    }
   
}else {
    echo mysqli_error($con);
}



$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();



//$pdf->SetFont('Arial','I',10);
$pdf->Cell(190,266,'',1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,5,'The Invisible Important Text. Raphael Chuswe..REMEMBER THE NAME!',0,0,'C');


$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(170,5,'Referral of  '.$_SESSION['refDiseaseName'],0,0,'R');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',18);
$pdf->Cell(190,5,'SUMBU Clinic',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(190,5,'Referral of '.$_SESSION['refDiseaseName'],0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(190,5,'for Special Medical Asseessment',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(99,5,'Signatures and declarations',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','IB',13);
$pdf->Cell(45,5,'Clinic staff',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',13);
$pdf->Cell(165,5,'I have advised the patient of the contents of this letter, to seek medical ',0,0,'C');
$pdf->Ln();
$pdf->Cell(88,5,'attention from a general hospital.',0,0,'C');
$pdf->Ln();

$pdf->Ln();
$pdf->Cell(50,5,'Signature:',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(43,5,'Name: ',0,0,'C');
$pdf->Cell(4,5,' '.$staffName,0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(77,5,'Position: Clinical Officer',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(87,5,'Date: '.date('D-M-Y H:i:s'),0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','IB',13);
$pdf->Cell(45,5,'Patient',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',13);
$pdf->Cell(175,5,'I have seen, or been advised of, the contents of this letter, including the',0,0,'C');
$pdf->Ln();
$pdf->Cell(100,5,'"Notice to driving licence holders".',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(171,5,'I consent to a copy of this letter being sent to my local authority (or its',0,0,'C');
$pdf->Ln();
$pdf->Cell(101,5,'agent) and my general practitioner.',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(51,5,'Signature:',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(44,5,'Name: ',0,0,'C');
$pdf->Cell(1,5,''.$patientName,0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(88,5,'Date: '.date('D-M-Y H:i:s'),0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(340,5,'1',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(88,5,'Printed on: '.date('M-Y H:i:s'),0,0,'C');






$pdf->Output();

$timeStampedEnded = date("h:i:sa");
//Update Active log 
$updateQuery = "UPDATE activelog SET activeStatus = 'done', cpTimeEnded = '$timeStampedEnded' WHERE id = '$activeLOG'";
if(mysqli_query($con, $updateQuery)){
    echo '<script>
            console.log("Updated");
         </script>';
}
?>

?>