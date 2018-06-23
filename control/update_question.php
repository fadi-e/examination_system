<?php 
session_start();
include "../function.php";
$question_ID = $_GET['question_ID'];
$test_ID = $_GET['test_ID'];


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$question = !empty($_POST['question'])? test_user_input(($_POST['question'])): null;
    $question_number = !empty($_POST['question_number'])? test_user_input(($_POST['question_number'])): null;
	$optionA = !empty($_POST['optionA'])? test_user_input(($_POST['optionA'])): null;
    $optionB = !empty($_POST['optionB'])? test_user_input(($_POST['optionB'])): null;
    $optionC = !empty($_POST['optionC'])? test_user_input(($_POST['optionC'])): null;
    $optionD = !empty($_POST['optionD'])? test_user_input(($_POST['optionD'])): null;
    $answer = !empty($_POST['answer'])? test_user_input(($_POST['answer'])): null;

     $sql3 = "UPDATE question SET question = '".$question."', question_number ='".$question_number."', A ='".$optionA."', B ='".$optionB."', C ='".$optionC."', D ='".$optionD."', answer ='".$answer."' WHERE question_ID=".$question_ID;
   $conn = dbConnect();
   $res3 = $conn->prepare($sql3);
   $res3->execute();

    $_SESSION['message'] = "Question has been updated";
    header('Location: ../question.php?test_ID='.$test_ID);

}
else {
	$_SESSION['error'] = "wrong connection";
	header("location: ../test.php");
}
?>