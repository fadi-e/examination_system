<?php
    session_start();
    include "../function.php";
    $html = '';
    $contentquery = "SELECT student_ID, fname, lname, email, password, className FROM student, login, class WHERE login.login_ID = student.login_ID AND class.class_ID = student.class_ID order by student_ID asc";
    $conn = dbConnect();
    $stmt = $conn->prepare($contentquery);
    $stmt->execute();
    $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($staticresult);
    
?>