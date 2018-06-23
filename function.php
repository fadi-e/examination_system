<?php
//header('content-type: application/json');

include "model/db.php";


function getOneItem($student_id){
	
	$contentquery = "SELECT * FROM student WHERE student_id = :id";
	$conn = dbConnect();
	$stmt = $conn->prepare($contentquery);
	$stmt->bindparam(':id', $student_id);
	$stmt->execute();
	return $staticresult = $stmt->fetch(PDO::FETCH_ASSOC);
}



function deleteOneItem($student_id){
	
	$contentquery = "DELETE FROM student WHERE student_id = :id";
	$conn = dbConnect();
	$stmt = $conn->prepare($contentquery);
	$stmt->bindparam(':id', $student_id);
	$stmt->execute();
	return true;
}


	function test_user_input($data) {
		$data = trim($data);
		$data= stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}






function deleteUser($user){
	//		if ($_REQUEST['action_type'] =='get'){
             		 $sql_delete='DELETE FROM student WHERE student_ID = '.$user; 
                     $res = $conn->prepare($deleteUser); 
                     $res->execute();
                     return true;
				//header("location: teacher_area.php");	
 		}


//////  Update /////





?>