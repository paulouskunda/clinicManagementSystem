<!DOCTYPE html>
<html>
<head>
	<title>Add Patient</title>
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">

</head>
<body>
<div class="container">
	<div class="column"><br><br>
		<h4 style="text-align: center;">Add Patient</h4>
		<form class="form-group" action="../logic/addFile.php" method="POST">
			<div class="col-sm-6">
				<label>First Name</label>
				<input type="text" name="firstName" placeholder="First-Name" class="form-control">

			</div>
			<div class="col-sm-6">
				<label>Last Name</label>
				<input type="text" name="lastName" placeholder="Last-Name" class="form-control">

			</div> 
			<br><br><br>
			<div class="col-sm-6">
				<label>Other Name</label>
				<input type="text" name="otherName" placeholder="Other-Name [Middle Name]" class="form-control">

			</div>
			<div class="col-sm-6">
				<label>Date of Birth</label>
				<input type="date" name="dob" placeholder="Date of Birth" class="form-control">

			</div>
			<br><br><br>
				<div class="col-sm-12">
					<label>Gender</label>
					<select class="form-control" name="gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
			</div> <br>
			<div class="col-sm-6">
				<label>Nrc Number <sup>Optional for younger patients</sup></label>
				<input type="text" name="nrc" placeholder="Nrc Number" class="form-control">

			</div>

			<div class="col-sm-6">
				<label>Physical Address</label>
				<input type="text" name="address" placeholder="Address" class="form-control">

			</div>
			<br><br><br>
			<div class="col-sm-6"><br>
				<label>Phone Number <sup>for younger patients using next to Kin contact</sup></label>
				<input type="text" name="phoneNumber" placeholder="Phone Number" class="form-control">
			</div>
			<div class="col-sm-6">
				<br>
				<label>Next to Kin</label>	
				<input type="text" name="nextKin" placeholder="Next to Kin" class="form-control">
			</div>
			<br>
			<br><br><br>
			<hr>
			<div class="col-sm-12">
				<input type="submit" name="patientSubmit" value="Add Patient" class="form-control btn btn-primary" style="width: 20%;">
			</div>
			

		</form>
	</div>
</body>
</html>