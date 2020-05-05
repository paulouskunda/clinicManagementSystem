<?php

    require '../includeFiles/Connection.php';

if (isset($_SESSION['staffID'])) {
            # code...

   $_SESSION['error_message'] = null;
   $_SESSION['success_message'] = null;
        $staffID = $_SESSION['staffID'];

   // $email = $_SESSION['email'];
    
     require '../includeFiles/header.php';

    $isOldChecked = false;
    $oldNeedToChangePassWord = "";




    if (isset($_POST['oldSubmit'])) {
    	# code...
    	
    	$oldPass = $_POST['oldPassword'];
    	$checkSQL = "SELECT * FROM staff where id ='$staffID'";
    	$checkMysql = mysqli_query($con, $checkSQL);
    	if ($checkMysql) {
    		# code...

    		while ($rows = mysqli_fetch_assoc($checkMysql)) {
    			# code...
    			if ($oldPass ==$rows['password']) {
    				# code...
    				$oldNeedToChangePassWord .= $oldPass;
    				$_SESSION['oldPass'] = $oldPass;
					$isOldChecked = true;
					// echo $oldNeedToChangePassWord;
    			} else {
    				$_SESSION['error_message'] = "Wrong Password";

    			}
    		}	
    	} 
    	// $num

    	// $_SESSION['password_changed'] = 0;
    } else if (isset($_POST['newSubmit'])) {
    		# code...
    		 $isOldChecked = true;
    			// echo "Calling me";
    			$old = $_SESSION['oldPass'];
    			// echo $old;
    	 	$new_pass =  $_POST['password'];//"kasolo";
    	 	$confirm_pass = $_POST['cpassword'];//"kasolo";

    	 	if ($new_pass == $confirm_pass) {
    	 		# code...
    	 	 
                //hash the new password 
                // $new_pass = md5($new_pass);


	    		if ($new_pass != $old) {
	    			# code...
	    		   
		    		$checkSQL = "UPDATE staff SET password ='$new_pass', isDefaultChanged=1 where id ='$staffID'";
		    		$checkMysql = mysqli_query($con, $checkSQL);

		    		if ($checkMysql) {
		    			# code...
		    			$_SESSION['password_changed'] = 1;
		    			$_SESSION['success_message'] = "Password successfully changed";
		    		} else {
		    			$_SESSION['error_message'] = "Failed try again later ".mysqli_error($con);
		    		}
	    		}else {
	    			$_SESSION['error_message'] = "Old Password cannot be new Password";
	    		}

	    	} else {
	    			$_SESSION['error_message'] = "Password don't match";
	    	}
    	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Settings </title>
	<meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<h4 style="background-color: #000; color: #fff">
        <?php
        $goBackTo = null;

        if (strpos($staffID, "CO")) {
            # code...
            $goBackTo = '../clinical-officer/';
        } else if (strpos($staffID, "N")) {
            # code...
             $goBackTo = '../staff/';

        } else if (strpos($staffID, "PH")) {
            # code...
            $goBackTo = '../pharmacy/';

        }else if (strpos($staffID, "LT")) {
            # code...
            $goBackTo = '../labTech/';

        }

        ?>
		<a href="<?php echo $goBackTo; ?>" style="margin: 1%;" class="btn btn-primary">DASHBOARD</a>
		<span style="text-align: center;">User <i class="fa fa-lock"></i> Password Management-Settings</span></h4>
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		


	</div>
	<div class="col-sm-4"></div>
	<?php

	 if (isset($_SESSION['error_message'])) {
			# code...
		
			echo "<h4 class='alert alert-danger'  style='margin-left:30%; margin-right:30%'><i class='fa fa-warning'></i> ".$_SESSION['error_message']."</h4>";


			unset($_SESSION['error_message']);
		}
		else if (isset($_SESSION['success_message'])) {
			# code...
		      echo "<h4 class='alert alert-success' style='margin-left:30%; margin-right:30%'><i class='fa fa-success'></i> ".$_SESSION['success_message']."</h4>";

			unset($_SESSION['success_message']);
		}
	?>
   <!-- CHANGE PASSWORD -->
     <?php
            if ($_SESSION['password_changed'] == 0) {
                    # code...
               
               	// $checkOldPassword
                echo "<h3 class='alert alert-info' style='text-align: center;'> We recommend you change your default password.</h3>";
                 }
    ?>


<div class="row">
    <div class="col-sm-4">
    	
   	</div>

   	  <div class="col-sm-4">
    		<?php
    			if (!$isOldChecked) {
    				# code...
    			
    		?>
    		<form action="" method="POST">
    			Enter OLD Password:
    			<input type="password" name="oldPassword" class="form-control"><br>
    			<input type="submit" name="oldSubmit" class="btn btn-success">
    		</form>
    		<?php 
    			} else {
    				?>

    				<form action="" method="POST">
    					<label>New Password</label>
    					<input type="password" name="password" class="form-control"><br>
    					<label>Confirm New Password</label>
    					<input type="password" name="cpassword" class="form-control"><br>
    					<input type="submit" name="newSubmit" class="btn btn-success">

    				</form>
    				<?php
    			}
    		?>
   	</div>

   	  <div class="col-sm-4">
    	
    		
   	</div>
</div>
</body>
</html>
<?php
} else {
	header("location: ../");
}
?>