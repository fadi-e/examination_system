<?php
session_start();
ob_start();
?>
<?php
if (isset( $_SESSION[ 'user_type' ] ) ) {
	Include_once( 'model/db.php' );
} else {
	logout();
	die();
}
if($_SESSION['user_type'] == 'student'){
	header('location: student_area.php');
}

if($_SESSION['user_type'] == 'teacher'){
	header('location: teacher_area.php');
}
function logout() {
	header( 'location:index.php' );
	ob_end_flush();
	die();
}
?>
<?php
include "header.php";
include "control/select_update_form_admintoteacher.php";
$_SESSION['teacher_identifier']= $_GET['teacherID'];
?>
	<div class="container">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<div class="jumbotron">
				<fieldset>
					<legend>Update Form</legend>
					<form method="POST" action="control/update_process_admintoteacher.php?teacherID=<?php echo $_SESSION['teacher_identifier']?>"> 
						<?php 
						foreach($staticresult as $row) {
							echo '<div class="form-group">

							<label>First Name</label>
							<input type="text" class="form-control" name="fname" id="fname" value="'.$row['fName'].'" required>

							</div>

							<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="lname" id="lname" value="'.$row['lName'].'" required>
							</div>


							<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" id="email" value="'.$row['email'].'" required>
							</div>

	
							
							<div class="form-group">
											<input type="submit" class="btn btn-primary form-control" value="Update" id="register">
											</div>';
						}
					?>
				</form>
			</fieldset>
			</div>
			</div>
			</div>
			<?php
			include "footer.php";
			  ?>