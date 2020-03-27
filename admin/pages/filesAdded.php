<?php

require '../../includeFiles/Connection.php';
require '../../includeFiles/functions.php';



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


	$fullName = '';

	//check if other name is provided
	if ($otherName != null || $otherName != '') {
		# code...
		$fullName = $firstName." ".$otherName." ".$lastName;
	} else {
		$fullName = $firstName." ".$lastName;
	}


	$sql = "INSERT INTO patients(fullname, dob, nrc, phoneNumber,physicalAddress,nextToKin,uniqueID) VALUES ('$fullName','$dob','$nrc','$phoneNumber','$address','$nextToKin','$pID') ";

	if (RunMysqliQuery($con, $sql)) {
		# code...
		echo "It worked";
		$_SESSION['pID'] = $pID;
		$_SESSION['message'] = "Patient Was added successfully";
		header('location: addPatient.php');
	} else {
		echo "Error: "+mysqli_error($con);
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

	$sql = "INSERT INTO staff(staffName,staffNumber,staffAddress, staffTitle, staffEmail,nrc,staffDOB,password) VALUES ('$fullName','$staffNumber','$address','$title','$email','$nrc','$dob','1234')";
		
	if (RunMysqliQuery($con, $sql)) {
		# code...
		echo "It worked";
	} else {
		echo "Nah";
	}



}else if (isset($_POST['drugsSubmit'])) {
	# code...
	$drugsName = mysqli_real_escape_string($con, $_POST['drugsName']);

	$sqlDrugs = "INSERT INTO drugs (drugName) VALUES ('$drugsName')";

	if (RunMysqliQuery($con, $sqlDrugs)) {
		# code...
		echo "It Worked";
		$_SESSION['message'] = "Drug was added successfully";
		header("location: addDrugs");
	}else {
		echo "Nah";
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