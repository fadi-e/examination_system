<?php 
session_start();
include "../function.php";
$teacher_ID = $_SESSION['teacher_ID'];


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$testName = cleanstring($_POST['testName']);
	$subject = cleanstring($_POST['subject']);
	$class_ID = !empty($_POST['class_ID'])? test_user_input(($_POST['class_ID'])): null;

   $sql3 = "INSERT into test (testName, subject, teacher_ID, class_ID, examdate) VALUES ('".$testName."', '".$subject."', '".$teacher_ID."', '".$class_ID."', '" . $_POST['examdate'] . "')";
   $conn = dbConnect();
   $res3 = $conn->prepare($sql3);
   $res3->execute();

    $json['message'] = "Test information has been created";
    
//    header('Location: ../view/pages/teacher_area.php');

}
else {
	$json['message'] = "wrong connection";
//	header("location: ../view/pages/teacher_area.php");
}


function cleanstring($value)
{
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}  
echo json_encode($json);
?>