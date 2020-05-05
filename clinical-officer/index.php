<?php
require '../includeFiles/Connection.php';


$sql = "SELECT patients.fullname, patients.physicalAddress, activelog.pUniqueID, activelog.id, activelog.cpTimeStarted,activelog.nurseID FROM activelog , patients  WHERE activelog.activeStatus = 'active' AND patients.uniqueID = activelog.pUniqueID";
$query = mysqli_query($con, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Clinic Record Management System || Sunbi Clinic</title>
	<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
</head>
<body>
	<?php
			if (!isset($_SESSION['co'])) {
				# code...
				header('Location: ../');
			}

			
			$getName = $_SESSION['co'];
			$FullName = null;
			$isDefault = null;

			$sql = "SELECT * FROM staff WHERE staffNumber = '$getName'";

			$runMe = mysqli_query($con,$sql);

			while ($rows = mysqli_fetch_assoc($runMe)) {
				# code...
				$FullName = $rows['staffName'];
				$isDefault = $rows['isDefaultChanged'];
				$_SESSION['password_changed'] = $isDefault;

			}


	?>
	<!-- Align on the center -->
	<div class="container">
		<div class="row">
<!--            <div class="col-md-8">-->
         
			<?php

				if ($isDefault == 0) {
					# code...
					echo "<h3 class='alert alert-info'> We recommend you change your default password in <a href='../views/Settings.php'>settings</a>.</h3>";
				}

			?>  
             <a href="../logout.php" >Logout</a> 
          
<!--               </div>-->
         
            <div class="col-md-12">
			<h2 style="text-align: center;">WELCOME<strong> <?php echo $FullName; ?> </strong></h2>
			<table class="table">
				<thead style="font-style: bond;">
				
						<td><strong>Patient Name</strong></td>
						<td><strong>Patient ID</strong></td>
						<td><strong>Patient Address</strong></td>
						<td><strong>Time Clinical Process started</strong></td>
						<td><strong>Started By </strong></td>
						<td><strong>Attend</strong></td>
					</strong>
				</thead>

				<tbody>
					<?php

					if (mysqli_num_rows($query) > 0) {



						while ($rows = mysqli_fetch_assoc($query)) {

					
					?>
					<tr>
					<td><?php echo $rows['fullname']; ?></td>
					<td><?php echo $rows['pUniqueID']; ?></td>
					<td><?php echo $rows['physicalAddress']; ?></td>
					<td><?php echo $rows['cpTimeStarted']; ?></td>
					<td><?php echo $rows['nurseID']; ?></td>
					<td><a href="<?php echo 'patientCon.php?id='.$rows['pUniqueID'].'&aId='.$rows['id']; ?>"><button class="btn btn-primary">Attend</button></a></td>
				</tr>
					<?php
						
						}
					} else {
						echo "<td colspan='6'>No Data</td>";
					}
					?>
				
				</tbody>
			</table>
			<br><br>
			<?php


			?>
			<h3>Patient From the Lab with  Results</h3>
			<table class="table">
				<thead style="font-style: bond;">
				
						<td><strong>Patient Name</strong></td>
						<td><strong>Patient ID</strong></td>
						<td><strong>Patient Address</strong></td>
						<!-- <td><strong>COID</strong></td> -->
						<td><strong>Started By </strong></td>
						<td><strong>Attend</strong></td>
					</strong>
				</thead>

				<tbody>
					<?php



					$sql = "SELECT patients.fullname, patients.physicalAddress, activelog.pUniqueID, activelog.id, activelog.cpTimeStarted,activelog.nurseID FROM activelog , patients  WHERE activelog.activeStatus = 'waiting' AND patients.uniqueID = activelog.pUniqueID";
					$query = mysqli_query($con, $sql);

					if (mysqli_num_rows($query) > 0) {



						while ($rows = mysqli_fetch_assoc($query)) {

					
					?>
					<tr>
					<td><?php echo $rows['fullname']; ?></td>
					<td><?php echo $rows['pUniqueID']; ?></td>
					<td><?php echo $rows['physicalAddress']; ?></td>
					<td><?php echo $rows['cpTimeStarted']; ?></td>
					<td><?php echo $rows['nurseID']; ?></td>
					<td><a href="<?php echo 'patientCon.php?id='.$rows['pUniqueID'].'&aId='.$rows['id'].'&waiting'; ?>"><button class="btn btn-primary">Attend</button></a></td>
				</tr>
					<?php
						
						}
					} else {
						echo "<td colspan='6'>No Data</td>";
					}
					?>
				
				</tbody>
			</table>
			<br><br>
		</div>
    
<!--	</div>-->
</body>
</html>