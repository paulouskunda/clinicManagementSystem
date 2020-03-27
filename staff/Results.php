<!DOCTYPE html>
<html>
<head>
	<title>Results  </title>
	<?php 
		 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
	         $url = "https://";   
	    else  
	         $url = "http://";   
	 
	     
		
		require '../includeFiles/header.php';
		require '../includeFiles/Connection.php';

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

					$_SESSION['message'] = "The clinical process for ".$startedMessage." has started, the patient to progress to the clinical officer(s).";
					header("location: index.php");

				}else {
					echo "".mysqli_error($con);
				}

			}	


		}
		elseif (isset($_GET['searchtext'])) {
			# code...
		// Append the host(domain name, ip) to the URL.   
	    $url.= $_SERVER['HTTP_HOST'];   
	    
	    // Append the requested resource location to the URL   
	    $url.= $_SERVER['REQUEST_URI'];    
	      
			$searchItem = mysqli_real_escape_string($con, $_GET['searchtext']);

			$sql = "SELECT * FROM patients WHERE uniqueID = '$searchItem'";

			$query = mysqli_query($con, $sql);

			$num = mysqli_num_rows($query);

			if ($num > 0) {
				$startedMessage = $searchItem;
				# code...
		
	?>
</head>
<body>
	<h3 style="text-align: center;">Results for the Search patient - number <strong><?php echo $searchItem; ?></strong> </h3>


	<div class="container" style="text-align: center;">
		<?php 
			
			while ($rows = mysqli_fetch_assoc($query)) {
				# code...

		?>
		<div class="row">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title"><?php echo $rows['fullname']; ?></h2>
					<p class="card-text"><?php echo $rows['dob'].' <br> '.$rows['phoneNumber'].' <br> '.$rows['physicalAddress']; ?></p>
					<form method="POST" action="">
						<input type="text" name="uniqueID" hidden="" value="<?php echo $searchItem; ?>">
						<button  name="activeButton" class="btn btn-primary">Start Clinic Process</button>
					</form>
					
				</div>
			</div>
		</div>
		<?php 
		}// closing while loop
	 ?>
	</div>
</body>
<?php
	}
}

?>
</html>