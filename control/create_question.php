<?php 
session_start();
include "../function.php";
$teacher_ID = $_SESSION['teacher_ID'];


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$question = !empty($_POST['question'])? test_user_input(($_POST['question'])): null;
    $question_number = !empty($_POST['question_number'])? test_user_input(($_POST['question_number'])): null;
	$optionA = !empty($_POST['optionA'])? test_user_input(($_POST['optionA'])): null;
    $optionB = !empty($_POST['optionB'])? test_user_input(($_POST['optionB'])): null;
    $optionC = !empty($_POST['optionC'])? test_user_input(($_POST['optionC'])): null;
    $optionD = !empty($_POST['optionD'])? test_user_input(($_POST['optionD'])): null;
    $answer = !empty($_POST['answer'])? test_user_input(($_POST['answer'])): null;
	$test_ID = !empty($_POST['test_ID'])? test_user_input(($_POST['test_ID'])): null;

   $sql3 = "INSERT into question (question, question_number, A, B, C, D, answer, teacher_ID, test_ID) VALUES ('".$question."', '".$question_number."', '".$optionA."', '".$optionB."', '".$optionC."', '".$optionD."', '".$answer."', '".$teacher_ID."', '".$test_ID."')";
   $conn = dbConnect();
   $res3 = $conn->prepare($sql3);
   $res3->execute();

    $_SESSION['message'] = "Question has been created";
    /*header('Location: ../question.php?test_ID='.$_POST['test_ID']);*/
    header('Location: ../teacher_area.php');

}
else {
	$_SESSION['error'] = "wrong connection";
	header("location: ../test.php");
}
?>