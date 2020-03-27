<?php
$userID = $_GET['uID'];

	include('includes/connection.php');

	$sql ="SELECT * FROM accounts where id = '$userID'";
	$result = mysqli_query($con, $sql);

	$num = mysqli_num_rows($result);

	$i = 0;

	while ($row = mysqli_fetch_assoc($result))
	{
		$autoid = $row['id'];
		$user = $row['artistname'];
		$pass = $row['realname'];
		$active = $row['active'];
		//$ln = $row['Lastname'];
		$email = $row['email'];
		$dateactivated = $row['dateactivated'];
		$expires = $row['datedue'];

		//$i++;
	}

?>
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Update User's Data</h2>
						<div class="box-icon">
							<a href="users.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="update_data.php">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Artistname / Username :</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtusername" id="focusedInput" type="text" placeholder="Username" 
								  value="<?php echo $user; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Real Name:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtrealname" id="focusedInput" type="text" placeholder=""
								  value="<?php echo $pass; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Active Status:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="active" id="focusedInput" type="text" placeholder="Firstname"
								  value="<?php echo $active; ?>">
								   <br>
								   *This is a point you can active or deactive a member
								   <br> 0 means the member is not active <br> 1 means active
								</div>
							  </div>
							    <div class="control-group">
								<label class="control-label" for="focusedInput">Date The Subcription was active:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="dateactivated" id="focusedInput" type="date" placeholder=""
								  value="<?php echo $dateactivated; ?>">
								</div>
							  </div>
							     <div class="control-group">
								<label class="control-label" for="focusedInput">Date The Subcription will expire:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="expires" id="focusedInput" type="date" placeholder=""
								  value="<?php echo $expires; ?>">
								</div>
							  </div>
						<!-- 	    <div class="control-group">
								<label class="control-label" for="focusedInput">Duration Of Subcription:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="month" id="focusedInput" type="text" placeholder="Eg 1">
								   <select>A Month</select> 

								</div>
							  </div> -->
						<!-- 	  <div class="control-group">
								<label class="control-label" for="focusedInput">Lastname:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtlastname" id="focusedInput" type="text" placeholder="Lastname"
								  value="<?php echo $ln; ?>">
								</div>
							  </div> -->
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Email Address:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtemail" id="focusedInput" type="text" placeholder="Email"
								  value="<?php echo $email; ?>">
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary">Save Changes</button>
								<input type="hidden" name="hid" value="<?php echo $autoid; ?>">
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>		

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->