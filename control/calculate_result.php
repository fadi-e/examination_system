<?php 
session_start();
include "../function.php";
$student_ID = $_SESSION['student_ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $conn = dbConnect();

    $sql1 = "INSERT into result (student_ID, test_ID, result_status, submissiondate) VALUES ('".$student_ID."', '".$_GET['test_ID']."', '', CURDATE())";
    $res1 = $conn->prepare($sql1);
    $res1->execute();

    $result_ID = $conn->lastInsertId();

    $testStaus = 'Pass';
    foreach($_POST as $question_ID => $answers) {

        $query = "SELECT * FROM question WHERE question_ID = '".$question_ID."'  ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch();

        $answerArray = explode(",", $result['answer']);

        
        $resultStaus = 'True';
//        echo "<pre>";
//        print_r($answers);
//        die;
        if(count($answers) == count($answerArray))
        {
            foreach($answers as $answer) {
                if (!in_array($answer, $answerArray)) {
                    $resultStaus = 'False';
                    $testStaus = 'Fail';
                }
            }
        }
        else
        {
            foreach($answers as $answer) {
                if (!in_array($answer, $answerArray)) {
                    $testStaus = 'Fail';
                }
            }
            $testStaus = 'Fail';
        }
        


        $answerString = implode(",",$answers);
        
        if(!empty($answerString))
        {
            $answerString = $answerString;
        }
        else
        {
            $answerString = '';
        }
        
        $sql2 = "INSERT into result_questions (student_ID, result_ID, question_ID, answer, result_status) VALUES ('".$student_ID."', '".$result_ID."', '".$question_ID."', '".$answerString."', '".$resultStaus."')";

        $res2 = $conn->prepare($sql2);
        $res2->execute();
    }

    $sql3 = "Update result set result_status='".$testStaus."' where result_ID = '".$result_ID."' ";
    $res3 = $conn->prepare($sql3);
    $res3->execute();

    $_SESSION['message'] = "You are ".$testStaus;
    header('Location: ../get_test.php');
    exit();
}
else {
	$_SESSION['error'] = "wrong connection";
	header("location: ../get_test.php");
        exit();
}
?>