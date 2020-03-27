<?php
if(isset($_POST['submit'])){
include('includes/connection.php');
$un = mysqli_real_escape_string($con, $_POST['txtusername']);
$pw = mysqli_real_escape_string($con, $_POST['txtpassword']);
$fn = mysqli_real_escape_string($con, $_POST['txtfirstname']);
$ln = mysqli_real_escape_string($con, $_POST['txtlastname']);
$email = mysqli_real_escape_string($con, $_POST['txtemail']);

$sql1 = "SELECT * FROM tblusers WHERE email = '$email'";
$result = mysqli_query($con, $sql1);
$num = mysqli_num_rows($result);
if ($num > 0) {
	# code...
	echo "Sorry that email already exists";
} else{

$sql = "INSERT INTO tblusers VALUES(NULL,'$un','$pw','$fn','$ln','$email')";

if (mysqli_query($con, $sql))
{
	header('location:users.php');
}
else
{
	die('Unable to insert data:' .mysqli_error($con));
}
 }
}
?>