<?php

session_start();
include "../function.php";

	
	$email = !empty($_POST['email'])? test_user_input(($_POST['email'])): null;
	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;

	$hashpassword = password_hash($password, PASSWORD_DEFAULT);

	
	
	$insert_sql_login = "INSERT INTO login (email, password, user_type) VALUES ( '" . $_POST['email'] . "', '" . $hashpassword . "', '" . $_POST['admin'] . "');";
    $conn = dbConnect();
    $stmt = $conn->prepare($insert_sql_login);
    $stmt->execute();
    

	//echo "login inserted";
    
	$lastLoginID = $conn->lastInsertId();
    //echo $lastLoginID;



	$insert_sql_admin = "INSERT INTO admin (login_ID) VALUES ( " . $lastLoginID . ");";
    $stmt2 = $conn->prepare($insert_sql_admin);
    $stmt2->execute();
    //echo "admin entered";


	//print $conn->lastInsertId();
	if($stmt && $stmt2->rowcount() == 0) {
        $_SESSION['error'] = "Wrong inserted";
        header('Location: ../admin_area.php');
    } else {
        $_SESSION['message'] = "New admin has been inserted";
        header('Location: ../admin_area.php');
    }
	

?>