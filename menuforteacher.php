<?php
if (!isset($_SESSION)) {
	session_start();	
}
?>
<?php


if(!($_SESSION['user_type'] == 'teacher')){
	header('location: index.php');
}



if($_SESSION['user_type'] == 'student'){
	header('location: student_area.php');
}

if($_SESSION['user_type'] == 'admin'){
	header('location: admin_area.php');
}

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
        <li><a  href="teacher_area.php" onClick="dosection_one()">Teacher Area</a> </li>
        <li><a  href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </nav>
<section>