<?php

require '../includeFiles/Connection.php';
require '../includeFiles/header.php'; 



$getPatientID = $_GET['pID'];
$getAID = $_GET['aID'];
$coID = $_SESSION['co'];
//update activeLog

$updateQuery = "UPDATE activelog SET coID = '$coID', pFeelings = 'N/A', coFinding = 'N/A' WHERE id = '$getAID'";
if(mysqli_query($con, $updateQuery)){
    echo '<script>
            console.log("Updated");
         </script>';
}


if(isset($_POST['submit'])){
    $diseaseName = $_POST['diseaseName'];
    $timestamp = date("Y-m-d H:i:s"); 
    $pID = $_POST['pID'];
    $activeID = $_POST['aID'];
    
    //Insert into the ref database 
    
    $SQL = "INSERT INTO ref (pID, aID, dateSent, diseaseName) VALUES ('$pID','$activeID', '$timestamp', '$diseaseName')";
    
    if(mysqli_query($con, $SQL)){
        $_SESSION['refPid'] = $pID;
         $_SESSION['refDiseaseName'] = $diseaseName;
         $_SESSION['refAID'] = $activeID;
         $_SESSION['refTime'] = $timestamp;
        header('location: ref.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
    <div class="container">
        <div class="row">
           
            <h3 align="center">CREATE REF LETTER</h3>

            <form class="form-group" action="" method="post">
                <input type="text" name="pID" value="<?php echo $getPatientID; ?>" hidden="">
                <input type="text" name="aID" value="<?php echo $getAID; ?>" hidden="">
                <textarea class="form-control" type="text" name="diseaseName" placeholder="Reason for creating a referal letter" ></textarea><br>
                <input class="btn btn-success" type="submit" name="submit"/>
            </form>
        
        </div>
    </div>
 
</body>
</html>