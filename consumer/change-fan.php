<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $onof = $_POST["onof"];
    print_r($onof);
    include 'connect.php';
    $sql = "SELECT * FROM `temperature`";
    $queryFan = $db->prepare($sql);
    $queryFan->execute();
    $fan = $queryFan->fetch(PDO::FETCH_ASSOC);
    if ($fan['fanStatus'] == 1) {
        $newFanStatus = 0;
        $roomId = 1; 
        $handle = $db->prepare('UPDATE temperature SET fanStatus = :newFanStatus WHERE roomId = :roomId');
        $handle->bindParam(':newFanStatus', $newFanStatus);
        $handle->bindParam(':roomId', $roomId);
        $handle->execute();
        $roomId = 3;
        $handle = $db->prepare('UPDATE temperature SET fanStatus = :newFanStatus WHERE roomId = :roomId');
        $handle->bindParam(':newFanStatus', $newFanStatus);
        $handle->bindParam(':roomId', $roomId);
        $handle->execute();
        $db = null;
    } else {
        $newFanStatus = 1;
        $roomId = 1;
        $handle = $db->prepare('UPDATE temperature SET fanStatus = :newFanStatus WHERE roomId = :roomId');
        $handle->bindParam(':newFanStatus', $newFanStatus);
        $handle->bindParam(':roomId', $roomId);
        $handle->execute();
        $roomId = 3;
        $handle = $db->prepare('UPDATE temperature SET fanStatus = :newFanStatus WHERE roomId = :roomId');
        $handle->bindParam(':newFanStatus', $newFanStatus);
        $handle->bindParam(':roomId', $roomId);
        $handle->execute();
        $db = null;
    }





}

?>