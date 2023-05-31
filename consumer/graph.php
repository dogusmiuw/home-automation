<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   "mysql:host=localhost;dbname=web-programming","root","");
	
    $handle = $link->prepare('SELECT months, val from graphs'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    
		
    foreach($result as $row){
        array_push($dataPoints, array("label"=> $row->months, "y"=> $row->val));
    }
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>