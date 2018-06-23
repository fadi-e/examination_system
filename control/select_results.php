<?php
$contentquery = "SELECT student.student_ID, student.fname, student.lname, login.email, class.className, result.result_status, result.result_ID, result.submissiondate 
FROM (((student
INNER JOIN login ON login.login_ID = student.login_ID)
INNER JOIN class ON class.class_ID = student.class_ID)
INNER JOIN result ON student.student_ID = result.student_ID)
";
    $conn = dbConnect();
    $stmt = $conn->prepare($contentquery);
    $stmt->execute();
    $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>