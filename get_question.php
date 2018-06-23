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

if($_SESSION['user_type'] == 'teacher'){
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
include "menuforstudent.php";
?>
<fieldset>
	<p style="font-weight: bold; font-size: 40px;">Test</p><br>
	<?php	include "control/select_get_question.php";?>
	<form method="POST" action="control/calculate_result.php?test_ID=<?php echo $_GET['test_ID']; ?>">
		<div class="container" style="font-weight: bold; text-align: left">
			<div class="container" style="font-weight: bold; text-align: left">
				<?php 
	foreach($staticresult as $row){
      echo "
        <p>".$row['question_number'].": ".$row['question']."</p>
        <p> 
            <input type='checkbox' name='".$row['question_ID']."[]' value='A'> ".$row['A']."
            <input type='checkbox' name='".$row['question_ID']."[]' value='B'> ".$row['B']."
            <input type='checkbox' name='".$row['question_ID']."[]' value='C'> ".$row['C']."
            <input type='checkbox' name='".$row['question_ID']."[]' value='D'> ".$row['D']."
        </p>
        ";
	} ?>
				<br>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</div>
		</div>
	</form>
</fieldset>
<?php
include "footer.php";
?>