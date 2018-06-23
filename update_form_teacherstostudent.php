<?php
session_start();
ob_start();
?>
<?php
if ( isset( $_SESSION[ 'user_type' ] ) ) {
	Include_once( 'model/db.php' );
} else {
	logout();
	die();
}
if($_SESSION['user_type'] == 'student'){
	header('location: student_area.php');
}

if($_SESSION['user_type'] == 'admin'){
	header('location: admin_area.php');
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
<fieldset>
	<?php $_SESSION['Student_identifier']= $_GET['studentID']; ?>
	<form method="POST" action="control/update_process_teacherstostudent.php?studentID=<?php echo $_SESSION['Student_identifier']?>">
		<?php include "control/select_update_teacherstostudent.php";?>
		<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Update Form</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
					

					</div>
					<div class="modal-body mx-3">
						<?php 
						foreach($staticresult as $row) {
								echo '<div class="validate">
                <div class="md-form mb-5">
                   	<label data-error="wrong" data-success="right" for="orangeForm-name">First Name</label>
                    <input type="text" id="orangeForm-name" class="form-control validate" name="fname" value="'.$row['fName'].'" required>

                    
                </div>
				 <div class="md-form mb-5">
				 	<label data-error="wrong" data-success="right" for="orangeForm-lname">Last Name</label>
                    <input type="text" id="orangeForm-lname" class="form-control validate" name="lname" value="'.$row['lName'].'" required>
                    
                </div>
				
				
				
                <div class="md-form mb-5">
					<label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                    <input type="email" id="orangeForm-email" class="form-control validate" name="email" value="'.$row['email'].'" required>
               
                </div>

                
					
					
					
					<label>Class</label>
					<select name="className" class="form-control">

					<option value="" name="classA">Please select class</option>';
	
                                        $classA = '';
                                        if($row["className"] == "A"){
                                            $classA = 'selected';
                                        }
                                        echo '<option '.$classA.' value="A" name="classA" id="classA">A</option>';
					
					 $classB = '';
                                        if($row["className"] == "B"){
                                            $classB = 'selected';
                                        }
					 $classC = '';
                                        if($row["className"] == "C"){
                                            $classC = 'selected';
                                        }
					 $classD = '';
                                        if($row["className"] == "D"){
                                            $classD = 'selected';
                                        }
                                        
                                        echo '<option '.$classB.' value="B" name="classB" id="classB">B</option>	

					<option '.$classC.' value="C" name="classC" id="classC">C</option>	

					<option '.$classD.' value="D" name="classD" id="classD">D</option>		
					</select>	
							</div>
							
							<div class="form-group">
						    <input type="submit" class="btn btn-primary form-control" value="Update" id="register">
											</div>';
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</form>
</fieldset>
<div class="text-center">
	<a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Hit to Edit<?php echo $row['fName']?></a>
</div>