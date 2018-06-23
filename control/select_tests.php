<?php
$conn = dbConnect();

$stmt1 = $conn->prepare("SELECT * FROM class");
$stmt1->execute();
$results = $stmt1->fetchAll(PDO::FETCH_ASSOC);
?>