<?php
require '../includeFiles/Connection.php';


$sql = "SELECT activelog.id, patients.uniqueID, activelog.coID, activelog.pUniqueID,staff.staffNumber, activelog.cpTimeStarted, staff.staffName, activelog.nurseID, patients.fullname FROM activelog , patients, staff  WHERE activelog.activeStatus = 'pending' AND patients.uniqueID = activelog.pUniqueID AND staff.staffNumber = activelog.coID ";
$query = mysqli_query($con, $sql);


?>
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

                    if (!isset($_SESSION['pharmacist'])) {
                # code...
                    header('Location: ../');
                    }

                    $getName = $_SESSION['pharmacist'];
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
                

                if ($isDefault == 0) {
                    # code...
                    echo "<h3 class='alert alert-info'> We recommend you change your default password in <a href='../views/Settings.php'>settings</a>.</h3>";
                }
    ?>
    
        <p align="left" style="margin-top: 0.5%"> <i class="fa fa-warning"></i><a href="../logout.php">Logout</a></p>
		<div class="row">
			<h2 style="text-align: center;">WELCOME NAME OF THE SUNBI CLINIC</h2>
			<table class="table">
				<thead style="font-style: bond;">
				
						<td><strong>Patient Name</strong></td>
						<td><strong>Patient ID</strong></td>
						<td><strong>Clinical Officer Name</strong></td>
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
					<td><?php echo $rows['staffName']; ?></td>
					<td><?php echo $rows['cpTimeStarted']; ?></td>
					<td><?php echo $rows['nurseID']; ?></td>
					<td><a href="<?php echo 'giveDrugs.php?id='.$rows['pUniqueID'].'&aId='.$rows['id'].'&coID='.$rows['coID']; ?>"><button class="btn btn-primary">Attend</button></a></td>
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
			
		</div>
	</div>
</body>
</html>