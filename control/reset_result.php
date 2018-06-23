<?php 

 function deleteUser(){
	 //require "../modify_form_teacherstostudent.php";
	 //echo $studentid;
	
		//DB CONNECTION
		include "../model/db.php";
		$conn = dbConnect();
		$r_id= $_REQUEST['r_id'];
		
		/* // SELECT LOGIN ID 
		$q= $conn->query("SELECT result_questions_ID FROM student WHERE student_ID = '$r_id'");
		$log_ID = $q->fetchColumn(); */
		
		// DELETE FROM RESULT TABLE
		$sql_deleteUser="DELETE FROM result WHERE result_ID = $r_id"; 
		$res = $conn->prepare($sql_deleteUser); 
		$res->execute(); 

		// DELETE FROM RESULT QUESTION TABLE
		$sql_deleteUser="DELETE FROM result_questions WHERE result_ID = $r_id"; 
		$res = $conn->prepare($sql_deleteUser); 
		$res->execute();
		
		
		/* 
		// DELETE FROM LOGIN TABLE
		$sql_deleteUser="DELETE FROM login WHERE login_ID = $log_ID"; 
		$res = $conn->prepare($sql_deleteUser); 
		$res->execute(); */
		
		
		header("location: ../teacher_area.php");	
 
			/* $qs = "SELECT * FROM student, login WHERE student_ID = $studentid";
			$stmt = $conn->prepare($qs);
			$stmt->execute();
			$resul = $stmt->fetchAll(PDO::FETCH_ASSOC); */
 
 
 
 
			/* $q= $conn->query("SELECT login_ID FROM student WHERE student_ID = $studentid");
			$log_ID = $q->fetchColumn();
			echo $log_ID;

			$sql_deleteUserlogin="DELETE FROM login WHERE login_ID = '$log_ID'"; 
				 $reslogin = $conn->prepare($sql_deleteUserlogin); 
				 $reslogin->execute(); */
	
	
                    
 			
}

deleteUser();
 ?>