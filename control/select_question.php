<?php
$conn = dbConnect();

$stmt1 = $conn->prepare("SELECT * FROM test where teacher_ID=".$_SESSION['teacher_ID']);

/*$stmt1 = $conn->prepare("SELECT * FROM test");*/
$stmt1->execute();
$results = $stmt1->fetchAll(PDO::FETCH_ASSOC);
?>