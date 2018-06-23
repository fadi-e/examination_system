<?php
    $contentquery = "SELECT * FROM student WHERE  student_ID = '".$_SESSION['student_ID']."' ";
    $conn = dbConnect();
    $stmt = $conn->prepare($contentquery);
    $stmt->execute();
    $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
?>