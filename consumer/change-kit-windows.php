<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $onof = $_POST["onof"];
    print_r($onof);
    include 'connect.php';
    $sql = "SELECT * FROM `kitchen` where `kitchenId` =1";
    $queryLiving = $db->prepare($sql);
    $queryLiving->execute();
    $living = $queryLiving->fetch(PDO::FETCH_ASSOC);
    if ($living['windowStatus'] == 1) {
        $newWindowStatus = 0;
        $kitchenId = 1;
        $handle = $db->prepare('UPDATE kitchen SET windowStatus = :newWindowStatus WHERE kitchenId = :kitchenId');
        $handle->bindParam(':newWindowStatus', $newWindowStatus);
        $handle->bindParam(':kitchenId', $kitchenId);
        $handle->execute();
        $db = null;
    } else {
        $newWindowStatus = 1;
        $kitchenId = 1;
        $handle = $db->prepare('UPDATE kitchen SET windowStatus = :newWindowStatus WHERE kitchenId = :kitchenId');
        $handle->bindParam(':newWindowStatus', $newWindowStatus);
        $handle->bindParam(':kitchenId', $kitchenId);
        $handle->execute();
        $db = null;
    }





}

?>