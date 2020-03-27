<?php
require '../includeFiles/Connection.php';

?>
<html>
<head>
    <title>Thank you for visiting </title>
</head>
<body>
    
    <?php  
        echo $_SESSION['doneMessage'];
        unset($_SESSION['doneMessage']);
    ?>

</body>
</html>