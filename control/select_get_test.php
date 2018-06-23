<?php
$conn = dbConnect();
$contentquery = "SELECT test_ID, testName, subject FROM test WHERE class_ID = ".$_SESSION['class_ID']." order by test_ID ASC";
	$stu_ID = $_SESSION['student_ID'];
	$test_q= "SELECT test_ID FROM result WHERE student_ID = '$stu_ID'";
	$test_c = $conn->prepare($test_q);
	$test_c->execute();
	$test_data = $test_c->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare($contentquery);
    $stmt->execute();
    $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>