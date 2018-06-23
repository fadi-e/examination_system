<?php
if (!isset($_SESSION)) {
	session_start();
	header('location: index.php');
}
?>
<div class="container">
<div class="col-lg-4"></div>
<div class="col-lg-4">
	<div class="jumbotron" style="margin-top:40px">
	<form method="post" action="control/login_process.php" Data-toggle="validator" role="form" name="theForm">
				
		<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" id="emailput" data-validation="email" placeholder="Please Enter Your Email Address" required>
			
		</div> 

	
		<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password" id="password" placeholder="Please Enter Your Password" required>
		</div> 
		
		<input type="submit" class="btn btn-primary form-control" value="Login" id="login" onClick="startTimeAndSaveLogin()">

		<div class="ui info message"></div>
		<div class="ui error message"></div>
		<script>
			loadLoginDetails();
		</script>
	</form>
	</div>
	</div>
 <div class="col-lg-4"></div>
</div>