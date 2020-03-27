<?php
include('includes/connection.php');
$autoid = mysqli_real_escape_string($con, $_POST['hid']);
$un = mysqli_real_escape_string($con, $_POST['txtusername']);
$pw = mysqli_real_escape_string($con, $_POST['txtrealname']);
$active = mysqli_real_escape_string($con, $_POST['active']);
$email = mysqli_real_escape_string($con, $_POST['txtemail']);
$dateactivated = mysqli_real_escape_string($con, $_POST['dateactivated']);
$addDays = mysqli_real_escape_string($con, $_POST['month']);
$expire =   mysqli_real_escape_string($con, $_POST['expires']);;


$sql = "UPDATE accounts SET artistname='$un', realname='$pw', active='$active', email='$email', dateactivated ='$dateactivated', datedue = '$expire' WHERE id='$autoid'";

if(mysqli_query($con,$sql))
{
	header('location:users.php');
}
else
{
	die('Unable to update record: ' .mysqli_error($con));
}
?>