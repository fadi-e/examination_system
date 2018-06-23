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
include "menuforteacher.php";
?>
<fieldset>
    <div class="container">
        <div class="col-lg-4">
            <div class="jumbotron">
					<fieldset>
        <legend>Update Form</legend>
            <?php include "control/select_update_test.php" ?>
                <form method="POST" action="control/update_test.php?test_ID=<?php echo $test_ID; ?>">
                        <div class="form-group">
                        <label>Test Name</label>
                        <input type="text" class="form-control" name="testName" id="testName" value="<?php echo $result['testName']; ?>" required>
                        </div>
                        <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" value="<?php echo $result['subject']; ?>" required>
                        </div>
                        <div class="form-group">
                        <label>Class</label>
                        <select name="class_ID" class="form-control" required>
                            <option value="">Please select class</option>
                            <?php
                            foreach($results as $row){ ?>
                            <option <?php if($row["class_ID"] == $result["class_ID"]){ echo "selected='selected'"; } ?> value="<?php echo $row['class_ID']; ?>" name="class_ID" ><?php echo $row['className']; ?></option>
                            <?php } ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary form-control" value="Update" id="register">
                        </div>
                    </form>
						</div>
						</div>
						</div>
			</fieldset>
			<?php
			include "footer.php";
			  ?>