<?php 
	require '../includeFiles/Connection.php';
	require '../includeFiles/header.php';

	// $_SESSION['labtech'] = "LT1234";

//    $get

	if (isset($_POST['labTestSubmit'])) {
		# code...
		$labDetails = mysqli_real_escape_string($con, $_POST['labDetails']);

		$labID = $_SESSION['labtech'];
		$id = $_GET['id'];
		$getAID = $_GET['aID'];

		$timeSentBack = date("h:i:sa");

		$SQL = "UPDATE labtech SET labTechID = '$labID', labResults = '$labDetails', timeSentBack = '$timeSentBack', status = 'Done' WHERE id = '$id' ";

		echo $labDetails . ' '.$id ;
		if (mysqli_query($con, $SQL)) {
			# code...
			echo "It worked ayi";

			//Update the activityLog
			$updateActivityLog = "UPDATE activelog SET activeStatus = 'waiting' WHERE id = '$getAID' ";
			
			if (mysqli_query($con, $updateActivityLog)) {
				# code...
                $_SESSION['redirectMessage'] = "The Patient records have been sent to the lab <br> This page will be redirected in 	";			
            } else {
				echo " "+mysqli_error($con);
			}


		} else {
			echo ""+mysqli_error($con);
		}


	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	<div class="container">
		<div class="row">
			<br><h4 style="text-align: center">Here the Patient Id will be displayed </h4>
			<hr>
		
            <?php

                    if (isset($_SESSION['redirectMessage'])) {
                        # code...
                        echo '<p class="alert alert-success d-flex flex-row"> '.$_SESSION['redirectMessage'].'<span id="count">5</span> seconds...</p>';
                        unset($_SESSION['redirectMessage']);
                        header('Refresh: 5; URL=index.php');
                    }

                ?>
			<form class="form-group" action="" method="POST">
				<div class="col-md-12">
					
						<h4 style="text-align: center;">Lab Test Finding </h4>
						<textarea rows="6" name="labDetails" class="form-control" placeholder="What the clinical officer found from the patient"></textarea>
				
					
				</div>
				<br>
				<div class="col-md-6">
					<input type="submit" name="labTestSubmit" value="Submit" class="btn btn-success">
				</div>
			</form>
	
		</div>
	</div>
    
<script type="text/javascript">

window.onload = function(){

(function(){
  var counter = 5;

  setInterval(function() {
    counter--;
    if (counter >= 0) {
      span = document.getElementById("count");
      span.innerHTML = counter;
    }
    // Display 'counter' wherever you want to display it.
    if (counter === 0) {
    //    alert('this is where it happens');
        clearInterval(counter);
    }

  }, 1000);

})();

}
</script>
</body>
</html>