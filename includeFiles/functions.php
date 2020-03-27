<?php



function getNewID($letter,$tableName){
	/**
	* @author Paul and Kasolo
	* @since 29/02/2020
	*  This is a simple method to update the id automatically passed on the previous ID.  
	*  The function gets the total count of students and adds a one to it then adds the rest of the known parameters
	*  <code>echo $newId; </code>
	*/

	require 'Connection.php';

	//Count all the records from the table, in our example tblpupils
	

	$sql = "SELECT COUNT(*) as total FROM ".$tableName;

	$runQuery = mysqli_query($con, $sql);

	//Create a variable to store the newId 
	$newId = '';

	if (mysqli_num_rows($runQuery) > 0) {
		# code...
		while ($rows = mysqli_fetch_assoc($runQuery)) {
			# code...
			//Get the count of variables
			$getTotalCount = $rows['total'];
			//Add a one to the last know
			$num = $getTotalCount + 1;
			if ($getTotalCount < 10) {
				# code...
				$newId = $letter."00".$num;
			}else if ($getTotalCount < 100 && $getTotalCount >=10) {
				# code...
				$newId =  $letter."0".$num;
			}
			

		}
	}else {
		$newId = $letter."01";
	}

	return $newId;
}

?>