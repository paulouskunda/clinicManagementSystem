<!DOCTYPE html>
<html>
<head>
	<title>Add Staff</title>
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">

</head>
<body>
<div class="container">
	<div class="column"><br><br>
		<h4 style="text-align: center;">Add Staff</h4>
		<form class="form-group" action="../logic/addFile.php" method="POST">
			<div class="col-sm-6">
				<input type="text" name="firstName" placeholder="First-Name" class="form-control">

			</div>
			<div class="col-sm-6">
				<input type="text" name="lastName" placeholder="Last-Name" class="form-control">

			</div> 
			<br><br><br>
			<div class="col-sm-6">
				<input type="text" name="otherName" placeholder="Other-Name [Middle Name]" class="form-control">

			</div>
			<div class="col-sm-6">
				<input type="date" name="dob" placeholder="Date of Birth" class="form-control">

			</div>
			<br><br><br>
			<div class="col-sm-6">
				<input type="text" name="nrc" placeholder="Nrc Number" class="form-control">

			</div>
			<div class="col-sm-6">
				<input type="text" name="address" placeholder="Address" class="form-control">

			</div>
			<br><br><br>
				<div class="col-sm-6">
				<input type="text" name="email" placeholder="Email Address" class="form-control">

			</div>
			<div class="col-sm-6">
			
			<select name="title" class="form-control">
					<option id="clinic-officer">
						Clinic Officer
					</option>
					<option id="nurse">
						Nurse
					</option>
					<option id="pharmacist">
						Pharmacist
					</option>
					<option id="labtech">
						Lab Tech
					</option>
				</select>	
			</div>
			<br><br><br>
			<div class="col-sm-12">	
				
			</div>
			<br><br>
			<div class="col-sm-12">
							<input type="submit" name="staffSubmit" value="Add Staff" class="form-control btn btn-primary" style="width: 20%;">

			</div>

		</form>
	</div>
</body>
</html>