<?php 
include ('connect.php');
if(isset($_POST['power'])){
    $handle = $db->prepare('UPDATE temperature SET fanTemp=:fanTemp WHERE roomId = :roomId');
    $number =0;
    $handle->bindParam(':fanTemp', $number);
    $handle->bindParam(':roomId', $_POST['roomId']);
    $handle->execute();
    header("Location:devices.php");
}

if(isset($_POST["up"])){
    if($_POST["fanvalue"]<35){
        $sqlupdate=$db->prepare("UPDATE temperature SET fanTemp=fanTemp+1 WHERE roomID=1");
        $sqlupdate->execute();
        
    }
    header("Location:devices.php");
}
if(isset($_POST["down"])){
    if($_POST["fanvalue"]>16){
        $sqlupdate=$db->prepare("UPDATE temperature SET fanTemp=fanTemp-1 WHERE roomID=1");
        $sqlupdate->execute();
        
    }
    header("Location:devices.php");
}
if(isset($_POST["fan"])){
    if($_POST["fanvalue"]>16){
        $sqlupdate=$db->prepare("UPDATE temperature SET fanTemp=fanTemp WHERE roomID=1");
        $sqlupdate->execute();
        
    }
    header("Location:devices.php");
}



?> 