<?php
	$contentquery = "SELECT test_ID, testName, subject, className FROM test, class WHERE class.class_ID = test.class_ID AND teacher_ID	= ".$_SESSION['teacher_ID']." order by test_ID ASC";

		$conn = dbConnect();
		$stmt = $conn->prepare($contentquery);
		$stmt->execute();
		$staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>