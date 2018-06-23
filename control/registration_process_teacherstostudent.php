<?php
session_start();
include "../function.php";
    
//echo $_POST['email'];
//echo $_POST['password'];
//echo $_POST['student'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$email = !empty($_POST['email'])? test_user_input(($_POST['email'])): null;
	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;

	
	$hashpassword = password_hash($password, PASSWORD_DEFAULT);

	$insert_sql_login = "INSERT INTO login (email, password, user_type) VALUES ( '" . $_POST['email'] . "', '" . $hashpassword . "', '" . $_POST['student'] . "');";
    $conn = dbConnect();
    $stmt = $conn->prepare($insert_sql_login);
    $stmt->execute();
    

	//echo "login inserted";
    
	$lastLoginID = $conn->lastInsertId();
    //echo $lastLoginID;

//getting class id 
    $getClass = "SELECT class_ID FROM class WHERE className = '".$_POST['className']."';";
     $conn = dbConnect();
	 $stmt1 = $conn->prepare($getClass);
     $stmt1->execute();
     $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) {
        $classID = $row['class_ID'];
    }
    

// insert into student table
   $insert_sql_student = "INSERT INTO student (fname, lname, login_ID, class_ID) VALUES ( '" . $_POST['fname'] . "',  '" . $_POST['lname'] . "', " . $lastLoginID . ",  " . $classID. ");";
    $conn = dbConnect();
	$stmt2 = $conn->prepare($insert_sql_student);
    $stmt2->execute();
    //echo "student entered";


	//print $conn->lastInsertId(); 



	if($stmt && $stmt1 && $stmt2->rowcount() == 0) {
        $json['error'] = "Wrong inserted";
//        header('Location: ../view/pages/teacher_area.php');
    } else {
        $json['message'] = "New student has been inserted";
//        header('Location: ../view/pages/teacher_area.php');
    }

	//header('location: teacher_area.php');
	
}

echo json_encode($json)
?>