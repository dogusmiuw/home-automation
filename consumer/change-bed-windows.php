<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $onof = $_POST["onof"];
    print_r($onof);
    include 'connect.php';
    $sql = "SELECT * FROM `bedroom` where `bedroomId` =1";
    $queryLiving = $db->prepare($sql);
    $queryLiving->execute();
    $living = $queryLiving->fetch(PDO::FETCH_ASSOC);
    if ($living['windowStatus'] == 1) {
        $newWindowStatus = 0;
        $bedroomId = 1;
        $handle = $db->prepare('UPDATE bedroom SET windowStatus = :newWindowStatus WHERE bedroomId = :bedroomId');
        $handle->bindParam(':newWindowStatus', $newWindowStatus);
        $handle->bindParam(':bedroomId', $bedroomId);
        $handle->execute();
        $db = null;
    } else {
        $newWindowStatus = 1;
        $bedroomId = 1;
        $handle = $db->prepare('UPDATE bedroom SET windowStatus = :newWindowStatus WHERE bedroomId = :bedroomId');
        $handle->bindParam(':newWindowStatus', $newWindowStatus);
        $handle->bindParam(':bedroomId', $bedroomId);
        $handle->execute();
        $db = null;
    }





}

?>