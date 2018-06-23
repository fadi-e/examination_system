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


if(!($_SESSION['user_type'] == 'admin')){
	header('location: ' . $_SESSION['user_type'] . '_area.php');
}



function logout() {
	header( 'location:index.php' );
	ob_end_flush();
	die();
}
?>
<?php
include "header.php";
?>

<nav class="navbar-inverse navbar-light" style="background-color: #00022A; margin-bottom: 30px;  position: relative; z-index: 10000; ">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
            </div>

            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav" style="background-color: #00022A;">
                    <li><a href="#section_one" onClick="dosection_one()">New User</a> </li>
		<li><a href="#section_two" onClick="dosection_two()">Modify</a> </li>
		<li><a href="logout.php">Logout</a>
		</li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </nav>

<div id="section_one">
	<div class="text-center">
		<a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#new_teacher">New Teacher</a>
	</div>
	<div class="text-center">
		<a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#new_admin">New Admin</a>
	</div>
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
                                                        <input type="hidden"   name="teacher" value="teacher">
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
                                                        <input type="password" name="password" id="orangeForm-pass" class="form-control validate" password="password" required>
                                                        <input type="hidden" name="admin" value="admin">
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
<fieldset id="section_two">
	<form action="#" method="get">
		<?php include "control/select_modifyformadmin.php"; ?>
		<div class="container table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Teacher ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
	foreach($staticresult as $row){
      echo "<tr>
        <th><h5>" . $row['teacher_ID'] . "</h5> </th>
        <th><h5>" . $row['fname'] . "</h5></th>
        <th><h5>" . $row['lname'] . "</h5></th>
        <th><h5>" . $row['email'] . "</h5></th>
	<th>  <a href='update_form_admintoteacher.php?teacherID=" . $row['teacher_ID']."'>Edit</a>
                            </tr>";}
	  ?>
<div  id="loading-image" style="display: none;">
                    <img  src="pics/ajax-loader.gif">
               </div>
				</tbody>
			</table>
		</div>
	</form>
</fieldset>
<?php
include "footer.php";
?>