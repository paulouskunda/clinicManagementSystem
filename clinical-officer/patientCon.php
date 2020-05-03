<!DOCTYPE html>
<html>
<head>
	<title>CLINICAL OFFICER</title>
	<?php 
	//Obtain the connection 
	require_once '../includeFiles/Connection.php';

	//get the passed uniqueID
	$pID = $_GET['id'];
	$activeID = $_GET['aId'];
	$waitingStatus = false;

	//Check if the parameter is passed or not
	if (isset($_GET['waiting'])) {
		# code...
		$waitingStatus = true;
	}

	//variable for checking if the send to the lab button has been clicked
	// $_SESSION['isLabClicked'] = false;

	require '../includeFiles/header.php';
	

	 // = "1223131";

	//Query for patient name and history later on as the program progress

	$patientSQL = "SELECT * FROM patients WHERE uniqueID = '$pID'";
	$query = mysqli_query($con, $patientSQL);
	$patientName = '';
	$pFeelings = '';
	$coFind = '';
	$labResults = '';
    $pBP = '';
    $pTemp = '';

	if (($num = mysqli_num_rows($query))>0) {
		# code...
		
		while ($pRows = mysqli_fetch_assoc($query)) {
			# code...
			$patientName = $pRows['fullname'];
			


		}

		$aSQL = "SELECT * FROM activelog WHERE pUniqueID = '$pID' AND id = '$activeID'";
		$aQuery = mysqli_query($con, $aSQL);

			if (($num = mysqli_num_rows($aQuery))>0) {
					# code...
					
					while ($aRows = mysqli_fetch_assoc($aQuery)) {
								
						$pFeelings = $aRows['pFeelings'];
						$coFind =  $aRows['coFinding'];
                        $pBP = $aRows['pBP'];
                        $pTemp = $aRows['pTemp'];

					}
			}


		$labResultsFetchSQL = "SELECT * FROM labTech where aID = '$activeID'";

		$labResultsQuery = mysqli_query($con, $labResultsFetchSQL);

		while ($labRows = mysqli_fetch_assoc($labResultsQuery)) {
			# code...
			$labResults = $labRows['labResults'];
		}


	} 
	else {
		echo "".mysqli_error($con);
	}




	?>
</head>
<body>

	<div class="container">
        <div class="row">
            <br><h4 style="text-align: center">Patient - <strong><?php echo $patientName; ?></strong> Unique ID <strong><?php echo $pID; ?></strong>
                  </h4>
                <hr>
            <div class="col-md-8">
                <div class="row">

                <?php

                    if (isset($_SESSION['redirectMessage'])) {
                        # code...
                        echo '<p class="alert alert-success d-flex flex-row"> '.$_SESSION['redirectMessage'].'<span id="count">10</span> seconds...</p>';
                        unset($_SESSION['redirectMessage']);
                        header('Refresh: 5; URL=index.php');
                    }

                ?>
                <div class="col-md-12" >
                    <div class="col-md-6" style="float: left;">
                        <form action="createRef.php" method="GET">
                              <input type="text" name="pID" value="<?php echo $pID; ?>" hidden="">
                            <input type="text" name="aID" value="<?php echo $activeID; ?>" hidden="">
                            Give Patient a referal letter? <button class="btn btn-success">Print Referal Letter</button>
                        </form>
                    </div>

                    </div>
                </div>
                <hr><br><br>
                <div class="col-md-12">
                    <form class="form-group" action="../logic/labResults.php" method="POST">
                    <input type="text" name="pID" value="<?php echo $pID; ?>" hidden="">
                    <input type="text" name="aID" value="<?php echo $activeID; ?>" hidden="">
                    <div class="col-md-6">
                            <h4 style="text-align: center;">Patient Blood Pressure </h4>
                            <input type="text" class="form-control" value="<?php echo $pBP ?>" readonly />

                        </div>
                        <div class="col-md-6">
                            <h4 style="text-align: center;">Patient Temperature </h4>
                          <input type="text" class="form-control" value="<?php echo $pTemp ?>" readonly />

                        </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h4 style="text-align: center;">Patient Complaints </h4>
                            <textarea rows="6" class="form-control" name="patientFeelings" placeholder="The patients complaint"><?php echo $pFeelings; ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <h4 style="text-align: center;">Conditions </h4>
                            <textarea rows="6" class="form-control" name="coFindings" placeholder="What the clinical officer found from the patient"><?php echo $coFind; ?></textarea>
                        </div>
                        &nbsp;

                        <?php

                            $labSql = "SELECT * FROM labTech WHERE aID = '$activeID'";
                            $results = mysqli_query($con, $labSql);
                            if (mysqli_num_rows($results) > 0) {

                                # code...
                                while($labFetch = mysqli_fetch_assoc($results)){
                                        echo '<div class="col-md-12">
                                            <label>Lab Test Results</label>
                                            <input type="text" class="form-control" value="'.$labFetch['testFor'].'" placeholder="Test for" name="testFor" readonly>
                                            </div><br>';
                                }
                            }else {
                                    echo '<div class="col-md-12">
                                            <label>Lab Test for</label>
                                            <input type="text" class="form-control" placeholder="Test for" name="testFor">
                                            </div><br>';
                            }
                        ?>
                        <div class="col-md-12">


                                <textarea rows="6" readonly=""  class="form-control" placeholder="Patient lab results will be displayed here"><?php echo $labResults; ?></textarea>

                            <!-- -->
                        </div>
                    </div><br>
                     

                    <div class="col-md-12">
                        <label>Diagnosis</label>
                        <input type="text" class="form-control" placeholder="Diagnosis disease" name="possibleDisease">
                    </div><br>
                    <div class="col-md-12">
    
                        <label>Treatment </label>
                        <textarea rows="6" name="drugs" id="updateMe" class="form-control" placeholder="Treatment"></textarea>
                    </div><br>

                    <div class="col-md-6">
                        <!-- System need to check if the lab button was clicked and change the massage from submit to pending -->


                            <?php

                            if (!$waitingStatus) {
                                # code...
                            ?>
                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                            <?php
                            }else{
                            ?>
                            <input type="submit" name="isWaiting" value="Submit [With Lab Results]" class="btn btn-success">
                            <?php
                            }

                            if (!$waitingStatus) {

                            ?>
                                <!-- Send patient to the Lab.. -->
                                <input type="submit" name="sentLabTech" value="Send Patient to the Lab" class="btn btn-warning">
                                &nbsp;<br><br>
                            <?php
                            }

                            ?>


                    </div>
                </form><BR><br>
                </div>


            </div>

            <?php
                $getPatientHistory = "SELECT activeLog.cpDate, diseaseRecord.diseaseName, staff.staffName FROM staff, DiseaseRecord, activeLog, patients WHERE patients.uniqueID = '$pID' AND activelog.pUniqueID = '$pID' AND diseaseRecord.pID = '$pID' AND activeLog.id = diseaseRecord.aID AND activelog.activeStatus = 'done' AND diseaserecord.coID = staff.staffNumber";
            ?>

            <div class="col-md-4">
                <div class="col-md-12" style="float: right;">


                    <?php

    //				$SqlHistory = "SELECT diseaseName, activieLoga FROM "
                    ?>
                        <div class="card">
                            <div class="card-title" style="text-align: center;">
                                Patient Historical Data
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <td>Date </td>
                                        <td>Disease Record</td>
                                        <td>Clinical Officer</td>
                                      
                                    </thead>
                                    <tbody>
                                        <?php
                                            $results = mysqli_query($con, $getPatientHistory);
                                            if(mysqli_num_rows($results)>0){
                                                while($rowP = mysqli_fetch_assoc($results)){
                                                  echo '<tr>
                                                        <td>'.$rowP['cpDate'].'</td>
                                                        <td>'.$rowP['diseaseName'].'</td>
                                                        <td>'.$rowP['staffName'].'</td>
                                                        
                                                    </tr>';
                                                }
                                            }else{
                                                echo mysqli_error($con);
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>					
            </div>

        </div>
    </div>
</div>


	<script type="text/javascript">

		function accountSelect(select) {

		var e = document.getElementById("getDrugID");
		var strUser = e.options[e.selectedIndex].value;
		var textarea = document.getElementById("updateMe");
		textarea.append(''+strUser+'\n');

        // document.getElementById('hidden_div');
        if (select.value == 'Paracitamo') {
                // document.getElementById('hidden_div').style.display = "block";
                console.log(select.value);

        }else if (select.value == 'Caffino'){
                // document.getElementById('hidden_date').style.display = "block";
                // document.getElementById('hidden_div').style.display = "block";
                console.log(select.value);

        } else if(select.value == 'list_date' || select.value =='created_on' || select.value == 'single_zesco_bills_dates'){
            // document.getElementById('hidden_date').style.display = "block";
            //     document.getElementById('hidden_div').style.display = "none";
                console.log(select.value);

        } 
        // else {
        //     document.getElementById('hidden_div').style.display = "none";
        //     document.getElementById('hidden_date').style.display = "none";
        // }
    }

    function validDate(){
        var today = new Date().toISOString().split('T')[0];
        var nextWeekDate = new Date(new Date().getTime() + 6 * 24 * 60 * 60 * 1000).toISOString().split('T')[0]
      document.getElementsByName("date")[0].setAttribute('min', today);
      document.getElementsByName("date")[0].setAttribute('max', nextWeekDate)
    }
</script>
	<!-- Javascript to pick the selected med from the drop down and updating it to the textarea for posting  -->

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
</html>