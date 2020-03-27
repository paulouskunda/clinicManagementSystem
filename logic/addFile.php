<?php

require '../includeFiles/Connection.php';
require '../includeFiles/functions.php';

$timestamp = date("Y-m-d H:i:s"); 

if (isset($_POST['patientSubmit'])) {
	# code...
	$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
	$otherName = mysqli_real_escape_string($con, $_POST['otherName']);
	$dob = mysqli_real_escape_string($con, $_POST['dob']);
	$nrc = mysqli_real_escape_string($con, $_POST['nrc']);
	$address = mysqli_real_escape_string($con, $_POST['address']);
	$nextToKin = mysqli_real_escape_string($con, $_POST['nextKin']);
	$phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
	$pID = getNewID('P','patients');
    $gender = mysqli_real_escape_string($con, $_POST['gender']);


	$fullName = '';

	//check if other name is provided
	if ($otherName != null || $otherName != '') {
		# code...
		$fullName = $firstName." ".$otherName." ".$lastName;
	} else {
		$fullName = $firstName." ".$lastName;
	}
    
    //Select query for getting the files 
    
    $selectQuery = "SELECT * FROM patients WHERE nrc = '$nrc'";
    $mysqlResult = mysqli_query($con, $selectQuery);
    if(mysqli_num_rows($mysqlResult) == 1){
        echo 'User is a user';
        $_SESSION['message'] = 'Patient with the provided NRC is already in the system '.$nrc;
    }else {
        $age = date('Y-m-d') - $dob;

	$sql = "INSERT INTO patients(fullname, dob, nrc,gender, phoneNumber,physicalAddress,nextToKin,uniqueID,age,dateRegistered) VALUES ('$fullName','$dob','$nrc','$gender','$phoneNumber','$address','$nextToKin','$pID','$age','$timestamp') ";

	if (RunMysqliQuery($con, $sql)) {
		# code...
		echo "It worked";
		$_SESSION['pID'] = $pID;
		header('location: ../views/viewPage.php');
	} else {
		echo "Error: "+mysqli_error($con);
        $_SESSION['message'] = 'We encounter some errors';

	}
    }
    
	



}  else if (isset($_POST['staffSubmit'])){
	$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
	$otherName = mysqli_real_escape_string($con, $_POST['otherName']);
	$dob = mysqli_real_escape_string($con, $_POST['dob']);
	$nrc = mysqli_real_escape_string($con, $_POST['nrc']);
	$address = mysqli_real_escape_string($con, $_POST['address']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$staffNumber = '';

 	if ($title == 'Clinic Officer') {
		# code...
		$staffNumber = getNewID('CO','staff');
	}else if($title == 'Nurse') {
		$staffNumber = getNewID('N','staff');
	}else if ($title == 'Pharmacist') {
		# code...
		$staffNumber = getNewID('PH','staff');
	}else if ($title == 'Lab Tech') {
		# code...
		$staffNumber = getNewID('LT','staff');
	}


	$fullName = '';

	//check if other name is provided
	if ($otherName != null || $otherName != '') {
		# code...
		$fullName = $firstName." ".$otherName." ".$lastName;
	} else {
		$fullName = $firstName." ".$lastName;
	}
      $selectQuery = "SELECT * FROM staff WHERE nrc = '$nrc'";
    $mysqlResult = mysqli_query($con, $selectQuery);
    if(mysqli_num_rows($mysqlResult) == 1){
        echo 'Staff entered is already a staff';
        $_SESSION['message'] = 'Staff Already exisits with'.$nrc;
    }else {

        $sql = "INSERT INTO staff(staffName,staffNumber,staffAddress, staffTitle, staffEmail,nrc,staffDOB,password,dateRegistered) VALUES ('$fullName','$staffNumber','$address','$title','$email','$nrc','$dob','1234','$timestamp')";

        if (RunMysqliQuery($con, $sql)) {
            # code...
            echo "It worked";
        } else {
            echo "Nah";
        }
        
    }



}



//Functions to be called 
// RUn the mysql from somewhere and just return true/false

function RunMysqliQuery($con, $sql){
	# code...

	$mysqliRunner = mysqli_query($con, $sql);
	if ($mysqliRunner) 
		return true;
	else {
		echo "".mysqli_error($con);;
		return false;
	}
}



?>