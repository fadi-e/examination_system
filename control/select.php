<?php
$contentquery = "SELECT student.student_ID, student.fname, student.lname, login.email, class.className, result.result_status 
FROM (((student
INNER JOIN login ON login.login_ID = student.login_ID)
INNER JOIN class ON class.class_ID = student.class_ID)
INNER JOIN result ON student.student_ID = result.student_ID)
WHERE className = 'A'";
    $conn = dbConnect();
    $stmt = $conn->prepare($contentquery);
    $stmt->execute();
    $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);  
?>






<?php
$contentquery = "SELECT student.student_ID, student.fname, student.lname, login.email, class.className, result.result_status 
FROM (((student
INNER JOIN login ON login.login_ID = student.login_ID)
INNER JOIN class ON class.class_ID = student.class_ID)
INNER JOIN result ON student.student_ID = result.student_ID)
WHERE className = 'B'";
    $conn = dbConnect();
    $stmt = $conn->prepare($contentquery);
    $stmt->execute();
    $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);  
?>






<?php
$contentquery = "SELECT student.student_ID, student.fname, student.lname, login.email, class.className, result.result_status 
FROM (((student
INNER JOIN login ON login.login_ID = student.login_ID)
INNER JOIN class ON class.class_ID = student.class_ID)
INNER JOIN result ON student.student_ID = result.student_ID)
WHERE className = 'C'";
    $conn = dbConnect();
    $stmt = $conn->prepare($contentquery);
    $stmt->execute();
    $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);  
?>




<?php
$contentquery = "SELECT student.student_ID, student.fname, student.lname, login.email, class.className, result.result_status 
FROM (((student
INNER JOIN login ON login.login_ID = student.login_ID)
INNER JOIN class ON class.class_ID = student.class_ID)
INNER JOIN result ON student.student_ID = result.student_ID)
WHERE className = 'D'";
    $conn = dbConnect();
    $stmt = $conn->prepare($contentquery);
    $stmt->execute();
    $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);  
?>




	<?php 

	foreach($staticresult as $row){
      echo "<tr>
        <th><h5>" . $row['student_ID'] . "</h5> </th>
        <th><h5>" . $row['fname'] . "</h5></th>
        <th><h5>" . $row['lname'] . "</h5></th>
        <th><h5>" . $row['email'] . "</h5></th>
        <th><h5>" . $row['className'] . "</h5></th>
        <th><h5>" . $row['result_status'] . "</h5></th>
        <th><h5>" . $row['result_status'] . "</h5></th>
		<th><a href='../../control/deleteUser.php?pageid=deletestudent&userid=" . $row['student_ID']."'>Reset</a>
      </tr>";
}
	  ?>
