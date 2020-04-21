<?php 

require '../includeFiles/Connection.php';
		require '../includeFiles/header.php';


if (isset($_POST['activeButton'])) {
			# code...

			$pUniqueID = mysqli_real_escape_string($con, $_POST['uniqueID']);
			$timeStarted = date("h:i:sa");
			$dateStarted = date("Y-m-d");
			$nurseID = $_SESSION['nurse'];
			$activeStatus = 'active';

			//query if the instance of the record of the current patient

			$counterSQL = "SELECT * FROM activelog WHERE pUniqueID = '$pUniqueID' AND cpDate = '$dateStarted'";
			$counterQuery = mysqli_query($con, $counterSQL);
			if (mysqli_num_rows($counterQuery)>0) {
				# code...
				echo "Sorry record for the patient already avaliable, direct them to the CO offiec";
			}else {

				$activeSQL = "INSERT INTO activelog(pUniqueID,nurseID,cpDate,cpTimeStarted,activeStatus) VALUES ('$pUniqueID','$nurseID','$dateStarted','$timeStarted','$activeStatus')";

				if (mysqli_query($con, $activeSQL)) {
					# code...

					$_SESSION['message'] = "The clinical process for ".$pUniqueID." has started, the patient needs to progress to the clinical officer(s).";
					header("location: ../staff/index.php");

				}else {
					echo "".mysqli_error($con);
				}

			}	


		}

if (isset($_SESSION['pID'])) {
	# code...
	$pID = $_SESSION['pID'];

	$sql = "SELECT * FROM patients WHERE uniqueID = '$pID'";

	$runQuery = mysqli_query($con, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2>PATIENT CREATED SUCCESSFULLY</h2>
			<div class="card">
				<div class="card-body">
					<?php

						while ($rows = mysqli_fetch_assoc($runQuery)) {
							# code...
						

					?>
					<h3 class="card-title"> Name: <?php echo $rows['fullname']; ?></h3> <h4> Patient Number: <?php echo $pID; ?></h4>
					<p class="card-text"><?php echo $rows['dob'].' <br> '.$rows['phoneNumber'].' <br> '.$rows['physicalAddress']; ?></p>
					<form method="POST" action="">
						<input type="text" name="uniqueID" hidden="" value="<?php echo $pID; ?>">
						<input type="text" name="bpPressure" placeholder="BP">
						<input type="text" name="tempter" placeholder="">
						<button  name="activeButton" class="btn btn-primary">Start Clinic Process</button>
					</form>
					<?php
						}//end of the while loop
						// session_unset($_SESSION['pID']);
					}//end of the if statement
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>