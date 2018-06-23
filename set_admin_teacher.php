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
include "menuforadmin.php";
?>
<div class="text-center">
	<a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#new_teacher">New Teacher</a>
</div>
<div class="text-center">
	<a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#new_admin">New Admin</a>
</div>
<fieldset>
	<form method="POST" action="control/registration_process_admintoteacher.php">
		<div class="modal fade" id="new_teacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">New Teacher</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>					
					</div>
					<div class="modal-body mx-3">
                <div class="md-form mb-5">
                   	<label data-error="wrong" data-success="right" for="orangeForm-name">First Name</label>
                    <input type="text" id="orangeForm-name" class="form-control validate" name="fname" required>
                </div>
				 <div class="md-form mb-5">
				 	<label data-error="wrong" data-success="right" for="orangeForm-lname">Last Name</label>
                    <input type="text" id="orangeForm-lname" class="form-control validate" name="lname" required>
                </div>
                <div class="md-form mb-5">
					<label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                    <input type="email" id="orangeForm-email" class="form-control validate" name="email" required>
                </div>
                <div class="md-form mb-4">
					<label data-error="wrong" data-success="right" for="orangeForm-pass">Password</label>
                    <input type="password" id="orangeForm-pass" class="form-control validate" name="password" required>
							</div>
							<div class="form-group">
						    <input type="submit" class="btn btn-primary form-control" value="Register" id="register">
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</fieldset>
<fieldset>
	<form method="POST" action="control/registration_process_admintoadmin.php">
		<div class="modal fade" id="new_admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">New Admin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>				
					</div>
					<div class="modal-body mx-3">					
                <div class="md-form mb-5">
					<label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                    <input type="email" id="orangeForm-email" class="form-control validate" name="email" required>              
                </div>
                <div class="md-form mb-4">
					<label data-error="wrong" data-success="right" for="orangeForm-pass">Password</label>
                    <input type="password" id="orangeForm-pass" class="form-control validate" password="password" required>
							</div>
							<div class="form-group">
						    <input type="submit" class="btn btn-primary form-control" value="Register" id="register">
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</fieldset>
<?php
include "footer.php";
?>