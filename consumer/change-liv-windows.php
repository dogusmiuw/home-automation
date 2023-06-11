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
    if ($living['windowStatus'] == 1) {
        $newWindowStatus = 0;
        $livId = 1;
        $handle = $db->prepare('UPDATE livingroom SET windowStatus = :newWindowStatus WHERE livId = :livId');
        $handle->bindParam(':newWindowStatus', $newWindowStatus);
        $handle->bindParam(':livId', $livId);
        $handle->execute();
        $db = null;
    } else {
        $newWindowStatus = 1;
        $livId = 1;
        $handle = $db->prepare('UPDATE livingroom SET windowStatus = :newWindowStatus WHERE livId = :livId');
        $handle->bindParam(':newWindowStatus', $newWindowStatus);
        $handle->bindParam(':livId', $livId);
        $handle->execute();
        $db = null;
    }





}

?>