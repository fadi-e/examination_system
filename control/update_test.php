<?php 
session_start();
include "../function.php";
$test_ID = $_GET['test_ID'];


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$testName = !empty($_POST['testName'])? test_user_input(($_POST['testName'])): null;
	$subject = !empty($_POST['subject'])? test_user_input(($_POST['subject'])): null;
	$class_ID = !empty($_POST['class_ID'])? test_user_input(($_POST['class_ID'])): null;

   $sql3 = "UPDATE test SET testName = '".$testName."', subject ='".$subject."', class_ID=".$class_ID." WHERE test_ID=".$test_ID;
   $conn = dbConnect();
   $res3 = $conn->prepare($sql3);
   $res3->execute();

    $_SESSION['message'] = "Test information has been updated";
    header('Location: ../teacher_area.php');

}
else {
	$_SESSION['error'] = "wrong connection";
	header("location: ../teacher_area.php");
}
?>