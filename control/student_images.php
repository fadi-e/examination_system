<?php
    session_start();
    include "../function.php";
    $fileTmp = $_FILES['profile_image']['tmp_name'];
    $fileName = date('YmdHis').$_FILES['profile_image']['name'];
    $upload_folder = "../pics/student_pics/".$fileName;
    move_uploaded_file($fileTmp, $upload_folder);
    
    if(!empty($_POST['old_file_name']))
    {
        if (file_exists('../pics/student_pics/'.$_POST['old_file_name'])) {
            unlink('../pics/student_pics/'.$_POST['old_file_name']);
        }
    }
    $conn = dbConnect();
    $sql3 = "UPDATE student SET profile_image = '".$fileName."' WHERE student_ID = '".$_SESSION['student_ID']."' ";
    $res3 = $conn->prepare($sql3);		
    $res3->execute();
    
    header("location: ../student_area.php");
                
?>