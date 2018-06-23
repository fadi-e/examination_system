<?php 
session_start();
include "../function.php";
$teacherid = $_GET['teacherID'];
//echo $teacherid;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

	
	$fname = !empty($_POST['fname'])? test_user_input(($_POST['fname'])): null;
	$lname = !empty($_POST['lname'])? test_user_input(($_POST['lname'])): null;
	$email = !empty($_POST['email'])? test_user_input(($_POST['email'])): null;
	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;
	
	
				//$studentid = !empty($_POST['student_ID'])? test_user_input(($_POST['student_ID'])): null;
				//if ($_REQUEST["action_type"] == "POST"){
		$sql = "SELECT login_ID from teacher WHERE teacher_ID =".$teacherid.";";
		$conn = dbConnect();
		$res = $conn->prepare($sql);	
	    $res->execute();
	    $staticresult = $res->fetchAll(PDO::FETCH_ASSOC);
	    foreach($staticresult as $row){
        $loginID = $row['login_ID'];
		}
	    
	    
	   
	   //updating student table
	   $sql2 = "UPDATE teacher SET fName = '".$fname."', lName ='".$lname."' WHERE teacher_ID=".$teacherid.";";
	   $res2 = $conn->prepare($sql2);		
	   $res2->execute();
	  // echo "teacher updated";
	
	
          //$hashpassword = password_hash($password, PASSWORD_DEFAULT);

	  $sql3 = "UPDATE login SET email = '".$email."' WHERE login_ID=".$loginID.";";
	   $res3 = $conn->prepare($sql3);		
	   $res3->execute();
	   //echo "login updated";

			//header("Location: modify_form_teacherstostudent.php");
			//echo "Account has been created";
			
if($res2->rowcount() == 0 || $res3->rowcount() == 0) {
        	$_SESSION['error'] = "Wrong Updateing";
        	header('Location: ../admin_area.php');
    	} else {
        	$_SESSION['message'] = "Teacher information has been updated";
        	header('Location: ../admin_area.php'); 
}	
} else {
	$_SESSION['error'] = "wrong connection";
	header("location: ../admin_area.php");
}		   	    
?>