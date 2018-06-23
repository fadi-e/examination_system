<?php

$test_ID = $_GET['test_ID'];
$contentquery = "SELECT * FROM question WHERE test_ID = ".$test_ID." order by question_number ASC";
    $conn = dbConnect();
    $stmt = $conn->prepare($contentquery);
    $stmt->execute();
    $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  ?>
