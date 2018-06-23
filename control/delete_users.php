<?php 

 function deleteUser(){
	 //require "../modify_form_teacherstostudent.php";
	 //echo $studentid;
	
		//DB CONNECTION
		include "../model/db.php";
		$conn = dbConnect();
		$stu_id= $_REQUEST['userid'];
                $tech_id= $_REQUEST['teacherid'];
		
		// SELECT LOGIN ID for student
		$profile_q = $conn->query("SELECT profile_image FROM student WHERE student_ID = '$stu_id'");
		$profile_image = $profile_q->fetchColumn();
                
                if(!empty($profile_image))
                {
                      if (file_exists('../pics/student_pics/'.$profile_image)) {
                          unlink('../pics/student_pics/'.$profile_image);
                      }
                }
                
                
		$q = $conn->query("SELECT login_ID FROM student WHERE student_ID = '$stu_id'");
		$log_ID = $q->fetchColumn();

         
		// DELETE FROM RESULT TABLE
		$sql_deleteUser3="DELETE FROM result WHERE student_ID = $stu_id"; 
		$res3 = $conn->prepare($sql_deleteUser3); 
		$res3->execute(); 

		// DELETE FROM RESULT QUESTION TABLE
		$sql_deleteUser2="DELETE FROM result_questions WHERE student_ID = $stu_id"; 
		$res2 = $conn->prepare($sql_deleteUser2); 
		$res2->execute();
		
		// DELETE FROM LOGIN TABLE for student
		$sql_deleteUser1="DELETE FROM login WHERE login_ID = $log_ID"; 
		$res1 = $conn->prepare($sql_deleteUser1); 
		$res1->execute();

		
 
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

exit;
 ?>