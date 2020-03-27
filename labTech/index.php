<?php

//Obtain the connection 
require_once '../includeFiles/Connection.php';

$SQL = "SELECT patients.fullname, labtech.id, labtech.aID, staff.staffName, patients.uniqueID, labtech.testFor FROM labtech, staff, patients WHERE labtech.coID = staff.staffNumber AND labtech.pUniqueID = patients.uniqueID AND status = 'labTech'";
$query = mysqli_query($con, $SQL);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Clinic Record Management System || SUMBU Clinic</title>
	<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
</head>
<body>

	<!-- Align on the center -->
	<div class="container">
		       <?php

                    if (isset($_SESSION['redirectMessage'])) {
                        # code...
                        echo '<p class="alert alert-success d-flex flex-row"> '.$_SESSION['redirectMessage'].'<span id="count">10</span> seconds...</p>';
                        unset($_SESSION['redirectMessage']);
                        header('Refresh: 5; URL=index.php');
                    }

                ?>
		<div class="row">
			<h2 style="text-align: center;">WELCOME NAME OF THE SUMBU CLINIC</h2>
			<table class="table">
				<thead style="font-style: bond;">
				
						<td><strong>Patient Name</strong></td>
						<td><strong>Patient ID</strong></td>
						<td><strong>Clinical Officer Name</strong></td>
						<td><strong>Lab Test</strong></td>
					</strong>
				</thead>

				<tbody>

					<!-- While Loop will started and will have the data below in it -->
					<?php
						if (mysqli_num_rows($query) > 0) {
							# code...
							
							while ($rows = mysqli_fetch_assoc($query)) {
								?>
								<tr>
									<td><?php echo $rows['fullname']; ?></td>
									<td><?php echo $rows['uniqueID']; ?></td>
									<td><?php echo $rows['staffName']; ?></td>
									<td><a href="<?php echo 'labTest.php?id='.$rows['id'].'&aID='.$rows['aID']; ?>"><button class="btn btn-primary">Attend</button></a></td>
								</tr>
								<?php
							}
						}else {
							?>
							<tr><td colspan="4" align="center">NO DATA</td></tr>
							<?php
						}

					 ?>
					
				</tbody>
			</table>
			<br><br>

		</div>
	</div>
</body>
</html>