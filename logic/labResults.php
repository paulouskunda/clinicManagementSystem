<?php

/**
* 
*/
//Obtain the connection 
require_once '../includeFiles/Connection.php';


if (isset($_POST['submit'])) {
	# code...
	$patientFeelings = mysqli_real_escape_string($con, $_POST['patientFeelings']);
	$coFindings = mysqli_real_escape_string($con, $_POST['coFindings']);
	$possibleDisease = mysqli_real_escape_string($con, $_POST['possibleDisease']);
	$coID = $_SESSION['co'];
	$pUniqueID =  mysqli_real_escape_string($con, $_POST['pID']);
	$aID = mysqli_real_escape_string($con, $_POST['aID']);
	$activeStatus = 'pending';
	$drugsName = mysqli_real_escape_string($con, $_POST['drugs']);

	echo $coID;

	$sqlUPDATE = "UPDATE activeLog SET coID = '$coID', pFeelings = '$patientFeelings', coFinding = '$coFindings', activeStatus = '$activeStatus' WHERE pUniqueID = '$pUniqueID' AND id = '$aID' ";
	if(mysqli_query($con, $sqlUPDATE)){
		echo "It worked ";

		//Call the function to check if the data about to be passed is not already avaliable
		if (checkIfPresent($con, $aID, $possibleDisease, $pUniqueID)) {
			# code...
			echo "Sorry you alread recorded for this ";
		}else {
			//Insert Into disease and the drug table

			$sqlDisease = "INSERT INTO diseaseRecord (pID,coID,diseaseName,aID) VALUES ('$pUniqueID','$coID','$possibleDisease','$aID')";

			if (mysqli_query($con, $sqlDisease)) {
				# code...
				$sqlDrugs = "INSERT INTO drugsprescription (aid,drugName) VALUES ('$aID','$drugsName')";
				if (mysqli_query($con, $sqlDrugs)) {
					# code...
					$_SESSION['redirectMessage'] = "The Patient records have been sent to the lab <br> This page will be redirected in 	";
					header('location: ../clinical-officer/patientCon.php?id='.$pUniqueID.'&aId='.$aID);

				} else {
					echo mysqli_error($con);
				}
			}
		}
		

	}else {
		echo "".mysqli_error($con);
	}






}else if (isset($_POST['isWaiting'])) {
	# code...
	 
	//Query if the labtech is done with the 
	// echo "Still Waiting Nigga";
	$patientFeelings = mysqli_real_escape_string($con, $_POST['patientFeelings']);
	$coFindings = mysqli_real_escape_string($con, $_POST['coFindings']);
	$possibleDisease = mysqli_real_escape_string($con, $_POST['possibleDisease']);
	$coID = $_SESSION['co'];
	$pUniqueID =  mysqli_real_escape_string($con, $_POST['pID']);
	$aID = mysqli_real_escape_string($con, $_POST['aID']);
	$activeStatus = 'pending';
	$drugsName = mysqli_real_escape_string($con, $_POST['drugs']);

	$sqlUPDATE = "UPDATE activeLog SET coID = '$coID', pFeelings = '$patientFeelings', coFinding = '$coFindings', activeStatus = '$activeStatus' WHERE pUniqueID = '$pUniqueID' AND id = '$aID' ";
	if(mysqli_query($con, $sqlUPDATE)){
		echo "It worked ";

		//Call the function to check if the data about to be passed is not already avaliable
		if (checkIfPresent($con, $aID, $possibleDisease, $pUniqueID)) {
			# code...
			echo "Sorry you alread recorded for this ";
		}else {
			//Insert Into disease and the drug table

			$sqlDisease = "INSERT INTO diseaseRecord (pID,coID,diseaseName,aID) VALUES ('$pUniqueID','$coID','$possibleDisease','$aID')";

			if (mysqli_query($con, $sqlDisease)) {
				# code...
				$sqlDrugs = "INSERT INTO drugsprescription (aid,drugName) VALUES ('$aID','$drugsName')";
				if (mysqli_query($con,$sqlDrugs)) {
					# code...
					$_SESSION['redirectMessage'] = "The Patient records have been sent to the lab <br> This page will be redirected in 	";
					header('location: ../clinical-officer/patientCon.php?id='.$pUniqueID.'&aId='.$aID);

				}
			}
		}
		

	}else {
		echo "".mysqli_error($con);
	}




} else if (isset($_POST['sentLabTech'])) {
	# code...

	$coID = $_SESSION['co'];
	$pUniqueID = mysqli_real_escape_string($con, $_POST['pID']);
	$status = 'labTech';
	$patientFeelings = mysqli_real_escape_string($con, $_POST['patientFeelings']);
	$coFindings = mysqli_real_escape_string($con, $_POST['coFindings']);
	// $possibleDisease = mysqli_real_escape_string($con, $_POST['possibleDisease']);
	$aID = mysqli_real_escape_string($con, $_POST['aID']);
	$testFor = mysqli_real_escape_string($con, $_POST['testFor']);


	//update the activity log tab
	$sqlUPDATE = "UPDATE activeLog SET coID = '$coID', pFeelings = '$patientFeelings', coFinding = '$coFindings', activeStatus = 'labtech' WHERE pUniqueID = '$pUniqueID' AND id = '$aID' ";
	// $sqlUPDATE = "UPDATE activeLog SET activeStatus = 'waiting' WHERE  id = '$aID' ";

	echo $aID." ".$pFeelings;

	if(mysqli_query($con, $sqlUPDATE)){
		echo "It worked ";
		$timeSentToLab = date("h:i:sa");

		//Insert into the labTech table
		$sql = "INSERT INTO labtech(pUniqueID,coID,status, aID, timeSentToLab, testFor) VALUES('$pUniqueID','$coID','$status','$aID','$timeSentToLab', '$testFor')";

		if (mysqli_query($con, $sql)) {
			# code...
			$_SESSION['isLabClicked'] = true;
			$_SESSION['redirectMessage'] = "The Patient records have been sent to the lab <br> This page will be redirected in	";
			header('location: ../clinical-officer/patientCon.php?id='.$pUniqueID.'&aId='.$aID);


		}else {
			//Change with session error

			echo "".mysqli_error($con);
		}

	}else {
		echo "".mysqli_error($con);
	}
	

}


//THis is a method to check if the is any record for the patient already in the database.

function checkIfPresent($con, $aID, $likelyDisease, $pID){
	$queyStatus = "SELECT * FROM diseaseRecord WHERE aID = '$aID' AND diseaseName = '$likelyDisease' AND pID = '$pID'";
	$check = mysqli_query($con, $queyStatus);
	// $returnValue = false;
	if (($num = mysqli_num_rows($check)) > 0) {
		# code...
		return true;
	}else
		return false;
}


?>