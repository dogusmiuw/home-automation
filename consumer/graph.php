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
<?php
 
 $dataPoints2 = array();
 //Best practice is to create a separate file for handling connection to database
 try{
      // Creating a new connection.
     // Replace your-hostname, your-db, your-username, your-password according to your database
     $link = new \PDO(   "mysql:host=localhost;dbname=web-programming","root","");
     
     $handle = $link->prepare('SELECT device, consumption from consumption where roomId = 1'); 
     $handle->execute(); 
     $result = $handle->fetchAll(\PDO::FETCH_OBJ);
     
         
     foreach($result as $row){
         array_push($dataPoints2, array("label"=> $row->device, "y"=> $row->consumption));
     }
     $link = null;
 }
 catch(\PDOException $ex){
     print($ex->getMessage());
 }
     
 $dataPoints6 = array();
 //Best practice is to create a separate file for handling connection to database
 try{
      // Creating a new connection.
     // Replace your-hostname, your-db, your-username, your-password according to your database
     $link = new \PDO(   "mysql:host=localhost;dbname=web-programming","root","");
     
     $handle = $link->prepare('SELECT device, consumption from consumption where roomId = 2'); 
     $handle->execute(); 
     $result = $handle->fetchAll(\PDO::FETCH_OBJ);
     
         
     foreach($result as $row){
         array_push($dataPoints6, array("label"=> $row->device, "y"=> $row->consumption));
     }
     $link = null;
 }
 catch(\PDOException $ex){
     print($ex->getMessage());
 }

 $dataPoints10 = array();
 //Best practice is to create a separate file for handling connection to database
 try{
      // Creating a new connection.
     // Replace your-hostname, your-db, your-username, your-password according to your database
     $link = new \PDO(   "mysql:host=localhost;dbname=web-programming","root","");
     
     $handle = $link->prepare('SELECT device, consumption from consumption where roomId = 3'); 
     $handle->execute(); 
     $result = $handle->fetchAll(\PDO::FETCH_OBJ);
     
         
     foreach($result as $row){
         array_push($dataPoints10, array("label"=> $row->device, "y"=> $row->consumption));
     }
     $link = null;
 }
 catch(\PDOException $ex){
     print($ex->getMessage());
 }
 ?>

<?php
 
 $dataPoints3 = array();
 //Best practice is to create a separate file for handling connection to database
 try{
      // Creating a new connection.
     // Replace your-hostname, your-db, your-username, your-password according to your database
     $link = new \PDO(   "mysql:host=localhost;dbname=web-programming","root","");
     
     $handle = $link->prepare('SELECT months, bill from bills where roomId = 1'); 
     $handle->execute(); 
     $result = $handle->fetchAll(\PDO::FETCH_OBJ);
     
         
     foreach($result as $row){
         array_push($dataPoints3, array("label"=> $row->months, "y"=> $row->bill));
     }
     $link = null;
 }
 catch(\PDOException $ex){
     print($ex->getMessage());
 }
 
 $dataPoints7 = array();
 //Best practice is to create a separate file for handling connection to database
 try{
      // Creating a new connection.
     // Replace your-hostname, your-db, your-username, your-password according to your database
     $link = new \PDO(   "mysql:host=localhost;dbname=web-programming","root","");
     
     $handle = $link->prepare('SELECT months, bill from bills where roomId = 2'); 
     $handle->execute(); 
     $result = $handle->fetchAll(\PDO::FETCH_OBJ);
     
         
     foreach($result as $row){
         array_push($dataPoints7, array("label"=> $row->months, "y"=> $row->bill));
     }
     $link = null;
 }
 catch(\PDOException $ex){
     print($ex->getMessage());
 }

 $dataPoints11 = array();
 //Best practice is to create a separate file for handling connection to database
 try{
      // Creating a new connection.
     // Replace your-hostname, your-db, your-username, your-password according to your database
     $link = new \PDO(   "mysql:host=localhost;dbname=web-programming","root","");
     
     $handle = $link->prepare('SELECT months, bill from bills where roomId = 3'); 
     $handle->execute(); 
     $result = $handle->fetchAll(\PDO::FETCH_OBJ);
     
         
     foreach($result as $row){
         array_push($dataPoints11, array("label"=> $row->months, "y"=> $row->bill));
     }
     $link = null;
 }
 catch(\PDOException $ex){
     print($ex->getMessage());
 }
 
 ?>
 <?php 
 $dataPoints4 = array();
 //Best practice is to create a separate file for handling connection to database
 try{
      // Creating a new connection.
     // Replace your-hostname, your-db, your-username, your-password according to your database
     $link = new \PDO(   "mysql:host=localhost;dbname=web-programming","root","");
     
     $handle = $link->prepare('SELECT roomTemp, fanTemp from temperature where roomId = 1'); 
     $handle->execute(); 
     $result = $handle->fetchAll(\PDO::FETCH_OBJ);
     
         
     foreach($result as $row){
         array_push($dataPoints4, array("label"=> $row->roomTemp, "y"=> $row->fanTemp));
     }
     $newRoomTemp = 55; // Yeni roomTemp değeri
     $roomId = 1; // Güncellenmek istenen odanın ID'si

$handle = $link->prepare('UPDATE temperature SET roomTemp = :newRoomTemp WHERE roomId = :roomId');
$handle->bindParam(':newRoomTemp', $newRoomTemp);
$handle->bindParam(':roomId', $roomId);
$handle->execute();

     $link = null;
 }
 catch(\PDOException $ex){
     print($ex->getMessage());
 }

 $maxSure = 20; // Süreyi 60 saniye olarak varsayalım
 $baslangicZamani = time(); // Başlangıç zamanını kaydediyoruz
 $roomTemp =32;
 $fanTemp = 22;
 while ($roomTemp == $fanTemp) {
     // Döngü işlemleri burada yapılır
 
     // Süre kontrolü
     $gecenSure = time() - $baslangicZamani;
     if ($gecenSure >= $maxSure) {
         $roomTemp--;

        
     }
 }
 
 
 ?>