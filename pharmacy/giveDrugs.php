<?php

require '../includeFiles/Connection.php';
require '../includeFiles/header.php';


$activityID = $_GET['aId'];
$pID = $_GET['id'];
$coID = $_GET['coID'];

//Select Patient and Clinical Officer name

$getNameQuery = "SELECT patients.fullname, staff.staffName FROM staff, patients WHERE staff.staffNumber = '$coID' AND patients.uniqueID = '$pID'";

$getName = '';
$getStaffName = '';
$getNameRunner =mysqli_query($con, $getNameQuery);
if (mysqli_num_rows($getNameRunner) > 0) {
	# code...
	while ($getNameRows = mysqli_fetch_assoc($getNameRunner)) {
		# code...
		$getName = $getNameRows['fullname'];
		$getStaffName = $getNameRows['staffName'];
	}
}

$drugsPrecr = "SELECT * FROM drugsprescription WHERE aId = '$activityID'";
$selectIllness = "";
$id = "";

$runQuery = mysqli_query($con, $drugsPrecr);
$drugsToBeTake = '';
while ( $row = mysqli_fetch_assoc($runQuery)) {
	# code...
	$drugsToBeTake .= $row['drugName'];
    $id = $row['id'];
}

if(isset($_POST['finish'])){
    $aID = $_POST['aid'];
    $dpID = $_POST['dpID']; 
    $updateActivity = "UPDATE activelog SET activeStatus = 'done' WHERE id = '$aID'";
    if(mysqli_query($con, $updateActivity)){
        $updateDrugs = "UPDATE drugsprescription SET status = 'done' WHERE id = '$dpID'";
        if(mysqli_query($con, $updateDrugs)){
            $_SESSION['doneMessage'] = "Thanking for Visiting Sunbi Clinic, You local health center... Get well soon and stay blessed";
            header('location: ../thankYou/thankyou.php');
        }else {
            echo mysqli_error($con);
        }
    }else {
            echo mysqli_error($con);
        }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Give Drugs</title>
</head>
<body>
<div class="container">
	<div class="rows">
        <br><br>
		<h4>Patient Name: <strong><?php echo $getName; ?></strong> Attended to by Clincial Officer: <strong> <?php echo $getStaffName; ?></strong></h4>
		<form action="" method="POST">
        <input name="aid" value="<?php echo $activityID; ?>" hidden="true"/>
        <input name="dpID" value="<?php echo $id; ?>" hidden="true"/>
            <label style="font-size:24px">Drugs to be given to the patient</label>
		<textarea rows="6" readonly class="form-control"><?php echo $drugsToBeTake; ?>
		</textarea>
		<br><input type="submit" name="finish" value="Finish Progress" class="btn btn-success">
		</form>
	</div>
</div>

</body>
</html>