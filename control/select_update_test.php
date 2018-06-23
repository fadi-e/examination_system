<?php
if (isset($_GET['test_ID'])) {
	$test_ID = $_GET['test_ID'];
    $conn = dbConnect();

    $query = "SELECT test_ID, testName, subject, class_ID FROM test WHERE test.test_ID =".$test_ID;
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$result = $stmt->fetch();

    $stmt1 = $conn->prepare("SELECT * FROM class");
    $stmt1->execute();
    $results = $stmt1->fetchAll(PDO::FETCH_ASSOC);
}
?>