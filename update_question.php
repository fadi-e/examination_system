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
                <?php include "control/select_update_question.php"; ?>
					<legend>Update Question</legend>

                    <form method="POST" action="control/update_question.php?question_ID=<?php echo $question_ID; ?>&test_ID=<?php echo $result["test_ID"]; ?>">
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" class="form-control" name="question" value="<?php echo $result['question']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Question Number</label>
                            <input type="text" class="form-control" name="question_number" value="<?php echo $result['question_number']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Option A</label>
                            <input type="text" class="form-control" name="optionA" value="<?php echo $result['A']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Option B</label>
                            <input type="text" class="form-control" name="optionB" value="<?php echo $result['B']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Option C</label>
                            <input type="text" class="form-control" name="optionC" value="<?php echo $result['C']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Option D</label>
                            <input type="text" class="form-control" name="optionD"  value="<?php echo $result['D']; ?>"required>
                        </div>
                        <div class="form-group">
                            <label>Answers</label>
                            <input type="text" class="form-control" name="answer"  value="<?php echo $result['answer']; ?>"placeholder="A,B,C,D" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary form-control" value="Update" id="">
                        </div>
				</form>
			</div>
			</div>
			</div>
			</fieldset>
			<?php
			include "footer.php";
			  ?>