<!DOCTYPE html>
<html>
<head>
	<title>Clinic Record Management System || Sunbi Clinic</title>
	<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
</head>
<body>

	<!-- Align on the center -->
	<div class="container">
		<?php
			require '../includeFiles/Connection.php';

			$getName = $_SESSION['nurse'];
			$FullName = null;
			$isDefault = null;

			$sql = "SELECT * FROM staff WHERE staffNumber = '$getName'";

			$runMe = mysqli_query($con,$sql);

			while ($rows = mysqli_fetch_assoc($runMe)) {
				# code...
				$FullName = $rows['staffName'];
				$isDefault = $rows['isDefaultChanged'];

			}

			
		?>
		<div class="col-sm-12">
			
			<?php 
			if(isset($_SESSION['message'])) {
				echo '<p class="alert alert-success d-flex flex-row">';
				echo $_SESSION['message'];
				unset($_SESSION['message']);
				echo "</p>";
			}
			?>


		</div>
	
		<div class="row">
			<?php

				if ($isDefault == 0) {
					# code...
					echo "<h3 class='alert alert-info'> We recommend you change your default password in <a href='../views/Settings.php'>settings</a>.</h3>";
				}

			?>
			<nav>
			</nav>
			<h2 style="text-align: center;">WELCOME <strong> <?php echo $FullName; ?> </strong> TO THE SUNBI CLINIC MANAGEMENT SYSTEM</h2>

			<form method="GET" class="forn-control" action="Results.php">
				 <div class="input-group">
            <input name="searchtext" placeholder="Search" value="" class="form-control" required="" type="text">
            <span class="input-group-btn">
               <button class="btn btn-default" name="search" type="submit" id="addressSearch">
                   <span class="icon-search"></span>
               </button>
            </span>
        </div>
			</form>
			<br><br>

			<div>

				<p style="text-align: center;"> OR <br> Register a <a href="../views/addPatient.php">patient</a> </p>
			</div>
		</div>
	</div>
</body>
</html>