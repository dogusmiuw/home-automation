<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $onof = $_POST["onof"];
    print_r($onof);
    include 'connect.php';
    $sql = "SELECT * FROM `kitchen` where `kitchenId` =1";
    $queryKitchen = $db->prepare($sql);
    $queryKitchen->execute();
    $kitchen = $queryKitchen->fetch(PDO::FETCH_ASSOC);
    if ($kitchen['lightStatus'] == 1) {
        $newLightStatus = 0;
        $kitchenId = 1;
        $handle = $db->prepare('UPDATE kitchen SET lightStatus = :newLightStatus WHERE kitchenId = :kitchenId');
        $handle->bindParam(':newLightStatus', $newLightStatus);
        $handle->bindParam(':kitchenId', $kitchenId);
        $handle->execute();
        $db = null;
    } else {
        $newLightStatus = 1;
        $kitchenId = 1;
        $handle = $db->prepare('UPDATE kitchen SET lightStatus = :newLightStatus WHERE kitchenId = :kitchenId');
        $handle->bindParam(':newLightStatus', $newLightStatus);
        $handle->bindParam(':kitchenId', $kitchenId);
        $handle->execute();
        $db = null;
    }





}

?>