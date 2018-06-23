<?php

$test_ID = $_GET['test_ID'];
include "../function.php";
$conn = dbConnect();

$sql="DELETE FROM test WHERE test_ID = $test_ID";
$res = $conn->prepare($sql);
$res->execute();

?>


