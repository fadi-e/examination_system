<?php 
session_start();
include "../function.php";
$studentid = $_GET['studentID'];


if ($_SERVER["REQUEST_METHOD"] == "POST")
{


	
	$fname = !empty($_POST['fname'])? test_user_input(($_POST['fname'])): null;
	$lname = !empty($_POST['lname'])? test_user_input(($_POST['lname'])): null;
	$email = !empty($_POST['email'])? test_user_input(($_POST['email'])): null;
	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;
	$className = !empty($_POST['className'])? test_user_input(($_POST['className'])): null;
	$classID = !empty($_POST['className'])? test_user_input(($_POST['className'])): null;
	
//	echo $className;
		$sql = "SELECT login_ID FROM student WHERE student_ID =".$studentid.";";
		$conn = dbConnect();
		$res = $conn->prepare($sql);	
	    $res->execute();
	    $staticresult = $res->fetchAll(PDO::FETCH_ASSOC);
	    foreach($staticresult as $row){
        $loginID = $row['login_ID'];
			//echo $loginID;
		}
	    
	    $sql1 = "SELECT class_ID from class WHERE className ='".$className."';";
		$conn = dbConnect();
		$res1 = $conn->prepare($sql1);	
	    $res1->execute();
	    $staticresult1 = $res1->fetchAll(PDO::FETCH_ASSOC);
	    foreach($staticresult1 as $row1){
          $classID = $row1['class_ID'];
//			echo $classID;
		}
		
	
	

	   
	   //updating student table
	   $sql3 = "UPDATE student SET fName = '".$fname."', lName ='".$lname."', class_ID=".$classID." WHERE student_ID=".$studentid.";";
	   $conn = dbConnect();
	   $res3 = $conn->prepare($sql3);	
	   $res3->execute();
//	   echo "student updated";
		
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
		
	  $sql4 = "UPDATE login SET email = '".$email."',password = '" . $hashpassword . "' WHERE login_ID=".$loginID.";";
	  $conn = dbConnect();
	  $res4 = $conn->prepare($sql4);		
	  $res4->execute();
//	  echo "login updated";
} else {
	$_SESSION['error'] = "wrong connection";
	header("location: ../modify_form_teacherstostudent.php");
}
	if($res && $res1 && $res2 && $res4->rowcount() == 0) {
        $_SESSION['error'] = "Wrong Updateing";
        header('Location: ../teacher_area.php');
    } else {
        $_SESSION['message'] = "Student information has been updated";
        header('Location: ../teacher_area.php');
    }	
?>