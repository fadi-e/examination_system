<?php

$question_ID = $_GET['question_ID'];
include "../function.php";
$conn = dbConnect();

$sql="DELETE FROM question WHERE question_ID = $question_ID";
$res = $conn->prepare($sql);
$res->execute();

?>