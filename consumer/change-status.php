<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $onof = $_POST["onof"];
    print_r($onof);
    include 'connect.php';
    $sql = "SELECT * FROM `livingroom` where `livId` =1";
    $queryLiving = $db->prepare($sql);
    $queryLiving->execute();
    $living = $queryLiving->fetch(PDO::FETCH_ASSOC);
    if ($living['lightStatus'] == 1) {
        $newLightStatus = 0;
        $livId = 1;
        $handle = $db->prepare('UPDATE livingroom SET lightStatus = :newLightStatus WHERE livId = :livId');
        $handle->bindParam(':newLightStatus', $newLightStatus);
        $handle->bindParam(':livId', $livId);
        $handle->execute();
        $db = null;
    } else {
        $newLightStatus = 1;
        $livId = 1;
        $handle = $db->prepare('UPDATE livingroom SET lightStatus = :newLightStatus WHERE livId = :livId');
        $handle->bindParam(':newLightStatus', $newLightStatus);
        $handle->bindParam(':livId', $livId);
        $handle->execute();
        $db = null;
    }





}

?>