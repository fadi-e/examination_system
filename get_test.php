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
	<?php include "control/select_get_test.php"; ?>
	<form method="GET" action="#">
		<div class="container1 table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Test ID</th>
						<th>Test Name</th>
						<th>Subject</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
    foreach($staticresult as $row){
		$already_exist = 0;
		 foreach($test_data as $test){
			if($test['test_ID'] == $row['test_ID']){
				$already_exist = 1;
			}
		 }	 
      echo "<tr>
        <th><h5>" . $row['test_ID'] . "</h5> </th>
        <th><h5>" . $row['testName'] . "</h5> </th>
        <th><h5>" . $row['subject'] . "</h5></th>
		<th>  ";
		
		if($already_exist != 1){
			echo "<a href='get_question.php?test_ID=" . $row['test_ID']."'>Start Test</a>";
		}else{
			echo "<font color='red'>Test has finished</font>";
		}
		echo "
		</th>
      </tr>";
	}
	?>
				</tbody>
			</table>
		</div>
	</form>
</fieldset>
<?php
include "footer.php";
?>