<?php
	$contentquery = "SELECT teacher_ID, fname, lname, email, password FROM teacher, login WHERE login.login_ID = teacher.login_ID";
    $conn = dbConnect();
    $stmt = $conn->prepare($contentquery);
    $stmt->execute();
    $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>