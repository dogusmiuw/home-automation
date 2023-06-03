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

?>