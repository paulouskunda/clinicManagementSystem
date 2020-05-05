<?php

session_start();
session_destroy();
$home_url ='../../index.php';
header('Location: ' . $home_url);
?>