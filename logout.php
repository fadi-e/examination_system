<?php
    session_start();
    session_destroy();
	unset($_SESSION['user_type']);
	
	
	//$conn = "db.php";
	/*unset($_SESSION['error']);
    unset($_SESSION['usertype']);
    $_SESSION['usertype'] = 0;
    $_SESSION['tries'] = 0;
*/
    header('Location: index.php');

//session_destroy();
?>