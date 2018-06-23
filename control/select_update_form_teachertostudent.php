<?php
if (isset($_GET['teacherID'])) {
	$teacherid = $_GET['teacherID'];
	$query = "SELECT fName, lName, email, password FROM teacher, login WHERE login.login_ID = teacher.login_ID AND teacher.teacher_id =".$teacherid.";";

	$conn = dbConnect();
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>