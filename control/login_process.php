<?php
session_start();

include "../function.php";
if(!isset($_SESSION['user_type'])) {
       $_SESSION['user_type'] = 0;
		header('location: ../index.php');
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = !empty($_POST['email'])? test_user_input(($_POST['email'])): null;
	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;	
try {
			$conn = dbConnect();
			$stmt = $conn->prepare("SELECT login_ID, password, user_type FROM login WHERE email=:user");
			$stmt->bindParam(':user', $email);
			$stmt->execute();
			$result = $stmt -> fetch();
			$_SESSION["user_type"] = $result["user_type"];
//
 //   $conn = dbConnect();
//    $stmt = $conn->prepare($login_sql);
//  $stmt->execute();
//    $result = $stmt->fetch();


//if($result){



		if(password_verify($password, $result['password'])){


	
	//$_SESSION['email'] = $result['email'];
//	$_SESSION['password'] = $result['password'];
//    $_SESSION['user_type'] = $result['user_type'];
//		
		
	if($result['user_type']=='student')
	{
        $stmt1 = $conn->prepare("SELECT student_ID, fname, class_ID FROM student WHERE login_ID=:user");
        $stmt1->bindParam(':user', $result['login_ID']);
        $stmt1->execute();
        $result1 = $stmt1 -> fetch();

        $_SESSION['message'] = "Login successful";
        $_SESSION['fname'] = $result1['fname'];
        $_SESSION['student_ID'] = $result1['student_ID'];
        $_SESSION['class_ID'] = $result1['class_ID'];
    //    $_SESSION['user_type'] = $result1['student_ID'];
        header('Location: ../student_area.php');
	}
	else if($result['user_type']=='teacher')
    {
        $stmt1 = $conn->prepare("SELECT teacher_ID, fname FROM teacher WHERE login_ID=:user");
        $stmt1->bindParam(':user', $result['login_ID']);
        $stmt1->execute();
        $result1 = $stmt1 -> fetch();

        $_SESSION['message'] = "Login successful";
        $_SESSION['fname'] = $result1['fname'];
        $_SESSION['teacher_ID'] = $result1['teacher_ID'];
//		       $_SESSION['user_type'] = $result1['teacher_ID'];
		header('Location: ../teacher_area.php');
    }
    else if($result['user_type']=='admin')
    {
        $_SESSION['message'] = "Login successful";
		header('Location: ../admin_area.php');
    }
			}
    else
	{
         $_SESSION['error'] = "Login invalid please try again";
		header('location: ../index.php');
	}

} catch (Exception $e) {
		
	}
}
//else {
	//echo "wrong username or password";
			
?>