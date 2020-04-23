<!DOCTYPE html>
<html>
<head>
	<title>Clinic Record Management System || SUMBU Clinoc</title>
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="column" style="margin-left:20%; margin-right:20%"><br><br>
            <h1 align="center">SUMBU CLINIC RECORD MANAGEMENT SYSTEM</h1>

		<h4 style="text-align: center;">LOGIN-SCREEN</h4>
		<form class="form-group" action="" method="POST">
			<label>Staff Number:</label>
			<input type="text" name="username" required placeholder="Staff Number" class="form-control">
			<label>Password</label>
			<input type="password" name="password" required placeholder="Password" class="form-control">
			<br>
			<input type="submit" name="submit" value="Login" class="form-control btn btn-primary" style="width: 20%;">

		</form>
	</div>
    
    <?php
        if(isset($_SESSION['message'])){
        echo '<div class="alert alert-success"> '.$_SESSION['message'].' </div>';
        unset($_SESSION['message']);
        }
    ?>
</div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
	# code...

	require 'includeFiles/Connection.php';

	$staffNumber = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$sql = "SELECT * FROM staff WHERE staffNumber = '$staffNumber' AND password = '$password'";
	$runQuery = mysqli_query($con, $sql);

	if (mysqli_num_rows($runQuery) > 0) {
		# code...
		while ($rows = mysqli_fetch_assoc($runQuery)) {
			# code...
			$level = $rows['staffTitle'];

			if ($level == 'Clinic Officer') {
				# code...
				$_SESSION['co'] = $staffNumber;
				$_SESSION['staffID'] = $rows['id'];
				header('location: clinical-officer/');
			}else if ($level == 'Lab Tech') {
				# code...
				$_SESSION['labtech'] = $staffNumber;
				$_SESSION['staffID'] = $rows['id'];
				header('location: labTech/');

			}else if ($level == 'Nurse'){
				$_SESSION['nurse'] = $rows['staffNumber'];
				$_SESSION['staffID'] = $rows['id'];
				header('location: staff/');

			}else if ($level == 'Pharmacist') {
				# code...
				$_SESSION['pharmacist'] = $staffNumber;
				$_SESSION['staffID'] = $rows['id'];
				header('location: pharmacy/');
			}else  {
				# code...
              // echo "Please check the log in details.";
                
			}
		}
	} else {
        echo 'Well;';
       $_SESSION['message'] = 'Please check your login details';
    }

	// header("location: admin/");

}
?>