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
    if ($living['tvStatus'] == 1) {
        $newTvStatus = 0;
        $livId = 1;
        $handle = $db->prepare('UPDATE livingroom SET tvStatus = :newTvStatus WHERE livId = :livId');
        $handle->bindParam(':newTvStatus', $newTvStatus);
        $handle->bindParam(':livId', $livId);
        $handle->execute();
        $db = null;
    } else {
        $newTvStatus = 1;
        $livId = 1;
        $handle = $db->prepare('UPDATE livingroom SET tvStatus = :newTvStatus WHERE livId = :livId');
        $handle->bindParam(':newTvStatus', $newTvStatus);
        $handle->bindParam(':livId', $livId);
        $handle->execute();
        $db = null;
    }





}

?>