<?php
/**
* This a connection class that will communicate with the database
*/

//check if the session hasn't started and start one
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$con = mysqli_connect('localhost','root','','clinicsystem');

?>