<?php
require '../includeFiles/Connection.php';


?>
<html>
<head>
    <title>Thank you for visiting </title>
    <link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
    	<div class="card">
    		<div class="card-body">
    			<div class="card-title">Thank You, Get Well Soon.</div>

    			<?php  
			        echo $_SESSION['doneMessage'];
			        unset($_SESSION['doneMessage']);
   				 ?>
    		</div>
    	</div>


    	


    </div>
    

</body>
</html>