<?php

//$userValues = getOneUser($_SESSION['student_ID']);
if (isset($_GET['studentID'])) {
	$studentid = $_GET['studentID'];
	$query = "SELECT fName, lName, email, password, className FROM student, login, class WHERE class.class_ID = student.class_ID AND login.login_ID = student.login_ID AND student.student_id =".$studentid.";";
	
//	login.login_ID = student.login_ID AND class.class_ID = student.class_ID";

	//student.student_ID =".$studentid.";";

	$conn = dbConnect();
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>