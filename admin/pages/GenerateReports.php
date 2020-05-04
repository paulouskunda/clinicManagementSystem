<?php

//Get the connection from the included files 

require '../../includeFiles/Connection.php';

$getParam = $_POST['reportType'];

//request for the pdf file to print it to the screen

require '../fpdf/fpdf.php';



//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$title = 'SUMBU CLINIC';

 if($getParam == 'allPatients'){

		//create pdf object
		$pdf = new FPDF('P','mm','A4');
		//add new page
		$pdf->AddPage();
		//set font to arial, bold, 14pt
		$pdf->SetFont('Arial','B',14);

        $startDate = $_POST['startDate'];
        $endDate  = $_POST['endDate'];
         	$pdf->Cell(130 ,5,'All Patients Count Admitted Between '.$startDate.' and '.$endDate,0,0);

        $pdf->Cell(59 ,5,'',0,1);//end of line

        //set font to arial, regular, 12pt
        // $pdf->SetFont('Arial',''.$title,12);

        $pdf->Cell(130 ,5,'Generated By: Mercy',0,0);
        $pdf->Cell(59 ,5,'',0,1);//end of line

        $currentDate = date('d/m/Y');
        $pdf->Cell(110 ,5,'[Kabwe,Zambia]',0,0);
        $pdf->Cell(48 ,5,'Date Generated On:',0,0);
        $pdf->Cell(24 ,5,''.$currentDate.'',0,1);//end of line



        //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189 ,10,'',0,1);//end of line


        //invoice contents
        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(60 ,5,'Male Count',1,0);
        $pdf->Cell(60 ,5,'Female Count',1,0);
        $pdf->Cell(60 ,5,'Children Count',1,1);//end of line
        
        $getAllPatients = "SELECT 
							(Select count(DISTINCT(activelog.pUniqueID)) from activelog, patients where patients.gender='Male' AND patients.uniqueID = activelog.pUniqueID AND activelog.cpDate BETWEEN '$startDate' AND '$endDate') AS Male,
							(Select count(DISTINCT(activelog.pUniqueID)) from activelog, patients where patients.gender='Female' AND patients.uniqueID = activelog.pUniqueID AND activelog.cpDate BETWEEN '$startDate' AND '$endDate') AS Female,
							(Select count(DISTINCT(activelog.pUniqueID)) from activelog, patients where patients.age < 18 AND patients.uniqueID = activelog.pUniqueID AND activelog.cpDate BETWEEN '$startDate' AND '$endDate') AS Children,
							COUNT(DISTINCT(activelog.pUniqueID)) AS TOTAL FROM activelog WHERE activelog.cpDate BETWEEN '$startDate' AND '$endDate'
							";
        $getPatientsQuery = mysqli_query($con, $getAllPatients);
        $getPatientsNum = mysqli_num_rows($getPatientsQuery);

        if ($getPatientsNum > 0) {
            # code...

            while ($getPatients = mysqli_fetch_assoc($getPatientsQuery)) {
                # code...
         

                $pdf->Cell(60,5,''.$getPatients['Male'].'',1,0);
                $pdf->Cell(60,5,''.$getPatients['Female'].'',1,0);
                $pdf->Cell(60,5,' '.$getPatients['Children'].'',1,1,'L');
            }
        }


        $pdf->SetFont('Arial','',12);

        //Numbers are right-aligned so we give 'R' after new line parameter
        $pdf->Output();

 } else if($getParam == 'diseaseBased'){
 			//create pdf object
		$pdf = new FPDF('P','mm','A4');
		//add new page
		$pdf->AddPage();
		//set font to arial, bold, 14pt
		$pdf->SetFont('Arial','B',14);

 		$selectedDisease = $_POST['selectDisease'];
 		$pdf->Cell(130 ,5,'All Patients Count Who have had '.$selectedDisease,0,0);
        $pdf->Cell(59 ,5,'',0,1,'C');//end of line
        //set font to arial, regular, 12pt
        // $pdf->SetFont('Arial',''.$title,12);

        $pdf->Cell(130 ,5,'Generated By: Mercy',0,0);
        $pdf->Cell(59 ,5,'',0,1);//end of line

        $currentDate = date('d/m/Y');
        $pdf->Cell(130 ,5,'[Kabwe,Zambia]',0,0);
        $pdf->Cell(20 ,5,'Date',0,0);
        $pdf->Cell(34 ,5,''.$currentDate.'',0,1);//end of line



        //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189 ,10,'',0,1);//end of line


        //invoice contents
        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(60 ,5,'Male Count',1,0);
        $pdf->Cell(60 ,5,'Female Count',1,0);
        $pdf->Cell(60 ,5,'Children Count',1,1);//end of line
        
        $getAllPatients = "SELECT 
						(Select count(DISTINCT(diseaserecord.pID)) from diseaserecord, patients where patients.gender='Male' AND patients.uniqueID = diseaserecord.pID  AND diseaserecord.diseaseName = '$selectedDisease') AS Male,
						(Select count(DISTINCT(diseaserecord.pID)) from diseaserecord, patients where patients.gender='Female' AND patients.uniqueID = diseaserecord.pID  AND diseaserecord.diseaseName = '$selectedDisease') AS Female,
						(Select count(DISTINCT(diseaserecord.pID)) from diseaserecord, patients where patients.age < 18 AND patients.uniqueID = diseaserecord.pID AND diseaserecord.diseaseName = '$selectedDisease' ) AS Children
						";
        $getPatientsQuery = mysqli_query($con, $getAllPatients);
        $getPatientsNum = mysqli_num_rows($getPatientsQuery);

        if ($getPatientsNum > 0) {
            # code...

            while ($getPatients = mysqli_fetch_assoc($getPatientsQuery)) {
                # code...
         

                $pdf->Cell(60,5,''.$getPatients['Male'].'',1,0);
                $pdf->Cell(60,5,''.$getPatients['Female'].'',1,0);
                $pdf->Cell(60,5,' '.$getPatients['Children'].'',1,1,'L');
            }
        }


        $pdf->SetFont('Arial','',12);

        //Numbers are right-aligned so we give 'R' after new line parameter
        $pdf->Output();

 }
 else if($getParam == 'diseaseCount'){
 			//create pdf object
		$pdf = new FPDF('P','mm','A4');
		//add new page
		$pdf->AddPage();
		//set font to arial, bold, 14pt
		$pdf->SetFont('Arial','B',14);

 	  $startDate = $_POST['startDate'];
        $endDate  = $_POST['endDate'];
 		$pdf->Cell(130 ,5,'Disease History Between  '.$startDate.' and '.$endDate,0,0);
        $pdf->Cell(59 ,5,'',0,1,'C');//end of line
        //set font to arial, regular, 12pt
        // $pdf->SetFont('Arial',''.$title,12);

        $pdf->Cell(130 ,5,'Generated By: Mercy',0,0);
        $pdf->Cell(59 ,5,'',0,1);//end of line

        $currentDate = date('d/m/Y');
        $pdf->Cell(130 ,5,'[Kabwe,Zambia]',0,0);
        $pdf->Cell(20 ,5,'Date',0,0);
        $pdf->Cell(34 ,5,''.$currentDate.'',0,1);//end of line



        //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189 ,10,'',0,1);//end of line


// >>>>>>> Master Paulous Changes - New Changes

        //invoice contents
        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(90 ,5,'Disease Name',1,0);
        $pdf->Cell(90 ,5,'Count',1,1);
        
        $getDiseaseCount = "SELECT 
        	 diseaserecord.diseaseName, COUNT(diseaserecord.diseaseName) AS TOTALNUMBER FROM diseaserecord, activelog
			WHERE activelog.cpDate BETWEEN '$startDate' AND '$endDate' AND diseaserecord.aID = activelog.id
			GROUP BY diseaserecord.diseaseName ORDER BY  COUNT(diseaserecord.diseaseName) DESC";
        $getDiseaseCountQuery = mysqli_query($con, $getDiseaseCount);
        $getDiseaseCountNum = mysqli_num_rows($getDiseaseCountQuery);

        if ($getDiseaseCountNum > 0) {
            # code...
            while ($diseaseRows = mysqli_fetch_assoc($getDiseaseCountQuery)) {
            	# code...

		        $pdf->Cell(90 ,5, $diseaseRows['diseaseName'],1,0);
		        $pdf->Cell(90 ,5, $diseaseRows['TOTALNUMBER'],1,1);
            }
		}

        //Numbers are right-aligned so we give 'R' after new line parameter
        $pdf->Output();

 } else if ($getParam == 'allStaff') {
 		//create pdf object
		$pdf = new FPDF('P','mm','A3');
		//add new page
		$pdf->AddPage();
		//set font to arial, bold, 14pt
		$pdf->SetFont('Arial','B',14);
 		# code...
 		$pdf->Cell(130 ,5,'',0,0);
        $pdf->Cell(59 ,5,'All Staff List Report',0,1);//end of line

        //set font to arial, regular, 12pt
        // $pdf->SetFont('Arial',''.$title,12);

        $pdf->Cell(130 ,5,'Generated By: Mercy',0,0);
        $pdf->Cell(59 ,5,'',0,1);//end of line

        $currentDate = date('d/m/Y');
        $pdf->Cell(130 ,5,'[Kabwe,Zambia]',0,0);
        $pdf->Cell(20 ,5,'Date',0,0);
        $pdf->Cell(34 ,5,''.$currentDate.'',0,1);//end of line



        //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189 ,10,'',0,1);//end of line


        //invoice contents
        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(50 ,5,'Full Name',1,0);
        $pdf->Cell(40 ,5,'Date of Birth',1,0);
        $pdf->Cell(40 ,5,'NRCNUMBER',1,0);//end of line
        $pdf->Cell(60,5,'Email Address',1,0);
            $pdf->Cell(50,5,'Ttle',1,0);
        $pdf->Cell(34,5,'Staff Number',1,1);

        $getAllStaff = "SELECT * FROM staff ";
        $getStaffQuery = mysqli_query($con, $getAllStaff);
        $getStaffNum = mysqli_num_rows($getStaffQuery);

        if ($getStaffNum > 0) {
            # code...
				
            while ($getStaff = mysqli_fetch_assoc($getStaffQuery)) {
                # code...
                $staffFullName = $getStaff['staffName'];
                $staffDOB = $getStaff['staffDOB'];
                $nrc = $getStaff['nrc'];

                $pdf->Cell(50,5,''.$staffFullName.'',1,0);
                $pdf->Cell(40,5,''.$staffDOB.'',1,0);
                $pdf->Cell(40,5,' '.$nrc.'',1,0,'L');
                $pdf->Cell(60,5,''.$getStaff['staffEmail'].'',1,0,'L');
                $pdf->Cell(50,5,''.$getStaff['staffTitle'],1,0,'L');
                $pdf->Cell(34,5,''.ucfirst($getStaff['staffNumber']),1,1,'L');//end of line
            }
        }


        $pdf->SetFont('Arial','',12);

        //Numbers are right-aligned so we give 'R' after new line parameter
        $pdf->Output();


       

 }  

 //Clinical

 else if ($getParam == 'clinicalAdmit'){
        $_SESSION['startMonth'] = $_POST['startMonth'];
        $_SESSION['endMonth'] = $_POST['endMonth'];
            header("location: graph.php");
  }
?>