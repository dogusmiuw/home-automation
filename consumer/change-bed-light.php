<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $onof = $_POST["onof"];
    print_r($onof);
    include 'connect.php';
    $sql = "SELECT * FROM `bedroom` where `bedroomId` =1";
    $queryBedroom = $db->prepare($sql);
    $queryBedroom->execute();
    $bedroom = $queryBedroom->fetch(PDO::FETCH_ASSOC);
    if ($bedroom['lightStatus'] == 1) {
        $newLightStatus = 0;
        $bedroomId = 1;
        $handle = $db->prepare('UPDATE bedroom SET lightStatus = :newLightStatus WHERE bedroomId = :bedroomId');
        $handle->bindParam(':newLightStatus', $newLightStatus);
        $handle->bindParam(':bedroomId', $bedroomId);
        $handle->execute();
        $db = null;
    } else {
        $newLightStatus = 1;
        $bedroomId = 1;
        $handle = $db->prepare('UPDATE bedroom SET lightStatus = :newLightStatus WHERE bedroomId = :bedroomId');
        $handle->bindParam(':newLightStatus', $newLightStatus);
        $handle->bindParam(':bedroomId', $bedroomId);
        $handle->execute();
        $db = null;
    }





}

?>