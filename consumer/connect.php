<?php
try{
    $db=new PDO("mysql:host=localhost;dbname=web-programming","root","");
    //echo "Connected Succesfully";
}
catch(Exception $e){
    echo "Bir hata oluştu: ".$e->getMessage();
}

?>