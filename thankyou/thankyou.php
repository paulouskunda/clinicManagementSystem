<?php
require '../includeFiles/Connection.php';


?>
<html>
<head>
    <title>Thank you for visiting </title>
    <link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">

</head>
<body>
    
    <?php  
        echo $_SESSION['doneMessage'];
        unset($_SESSION['doneMessage']);
    ?>

</body>
</html>