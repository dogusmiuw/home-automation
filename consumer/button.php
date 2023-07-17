<?php 
include("connect.php");
$sql = "SELECT * FROM `livingroom` where `livId` =1";
      $queryLiving = $db->prepare($sql);
      $queryLiving->execute();
      $living = $queryLiving->fetch(PDO::FETCH_ASSOC);
if($living["lightStatus"]==1){  
    $sqlupdateliving=$db->prepare("UPDATE livingroom SET lightStatus=0"); 
    $sqlupdateliving->execute();
    $sqlupdatebedroom=$db->prepare("UPDATE bedroom SET lightStatus=0"); 
    $sqlupdatebedroom->execute();
    $sqlupdatekitchen=$db->prepare("UPDATE kitchen SET lightStatus=0"); 
    $sqlupdatekitchen->execute();
    $sqlupdatefan=$db->prepare("UPDATE temperature SET fanstatus=0"); 
    $sqlupdatefan->execute();
}
else{
    $sqlupdateliving=$db->prepare("UPDATE livingroom SET lightStatus=1"); 
    $sqlupdateliving->execute();
    $sqlupdatebedroom=$db->prepare("UPDATE bedroom SET lightStatus=1"); 
    $sqlupdatebedroom->execute();
    $sqlupdatekitchen=$db->prepare("UPDATE kitchen SET lightStatus=1"); 
    $sqlupdatekitchen->execute();
    $sqlupdatefan=$db->prepare("UPDATE temperature SET fanstatus=1"); 
    $sqlupdatefan->execute(); 
}

header("Location:home.php");
?>