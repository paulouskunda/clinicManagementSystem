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
		$_SESSION['success_message'] = "Patient Was added successfully";
		header('location: addPatient.php');
	} else {
		$_SESSION['error_message'] = "Patient wasn't added ".mysqli_error($con);
		header('location: addPatient.php');
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

	$hashPassword = md5("1234");

	$fullName = '';

	//check if other name is provided
	if ($otherName != null || $otherName != '') {
		# code...
		$fullName = $firstName." ".$otherName." ".$lastName;
	} else {
		$fullName = $firstName." ".$lastName;
	}
	
	//check if the staff with the provided nrc is in the system already
	$selectQuery = "SELECT * FROM staff WHERE nrc = '$nrc'";
    $mysqlResult = mysqli_query($con, $selectQuery);
    if(mysqli_num_rows($mysqlResult) == 1){
        echo 'Staff entered is already a staff';
        $_SESSION['error_message'] = 'Staff Already exisits with the same NRC "'.$nrc.'"';
        header('location: addStaff.php');
    }else {

		$sql = "INSERT INTO staff(staffName,staffNumber,staffAddress, staffTitle, staffEmail,nrc,staffDOB,password) VALUES ('$fullName','$staffNumber','$address','$title','$email','$nrc','$dob','$hashPassword')";
			
		if (RunMysqliQuery($con, $sql)) {
			# code...
			echo "It worked";
			$_SESSION['success_message'] = "".$firstName." was successfully added";
			header('location: addStaff.php');
		} else {
			$_SESSION['error_message'] = "Sorry staff not add, try again later.";
			header('location: addStaff.php');
			echo "Nah";
		}
    }




}else if (isset($_POST['drugsSubmit'])) {
	# code...
	$drugsName = mysqli_real_escape_string($con, $_POST['drugsName']);

	$sqlDrugs = "INSERT INTO drugs (drugName,addBy) VALUES ('$drugsName','admin')";

	if (RunMysqliQuery($con, $sqlDrugs)) {
		# code...
		echo "It Worked";
		$_SESSION['messageAddDrug'] = "Drug was added successfully";
		header("location: addDrugs.php");
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