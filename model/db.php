<?php
    function dbConnect() {
        $conn = new PDO("mysql:host=localhost;dbname=examination_system", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
		
		

    }	
	//function getAllLineItems(){
//		
//	$contentquery = "SELECT * FROM login";
//	$conn = dbConnect();
//	$stmt = $conn->prepare($contentquery);
//	$stmt->execute();
//	return $staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
//	}



    







?>