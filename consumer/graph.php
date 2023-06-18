<?php
$dataPoints = array();
try {
    
    $link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");
    
    $handle = $link->prepare('SELECT device,sum(consumption) as cons FROM consumption WHERE roomId = 1');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);


    foreach ($result as $row) {
        array_push($dataPoints, array("label" => "Livingroom", "y" => $row->cons));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

$dataPoints5 = array();
try {
    
    $link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");
    $handle = $link->prepare('SELECT device,sum(consumption) as cons1 FROM consumption WHERE roomId = 2');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);


    foreach ($result as $row) {
        array_push($dataPoints5, array("label" => "Kitchen", "y" => $row->cons1));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

$dataPoints9 = array();
try {
    
    $link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");
    $handle = $link->prepare('SELECT device,sum(consumption) as cons FROM consumption WHERE roomId = 3');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);


    foreach ($result as $row) {
        array_push($dataPoints9, array("label" => "Bedroom", "y" => $row->cons));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}
?>
<?php
$dataPoints2 = array();
try {
    
    $link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");

    $handle = $link->prepare('SELECT device, consumption from consumption where roomId = 1');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);


    foreach ($result as $row) {
        array_push($dataPoints2, array("label" => $row->device, "y" => $row->consumption));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

$dataPoints6 = array();
try {
    $link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");

    $handle = $link->prepare('SELECT device, consumption from consumption where roomId = 2');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);


    foreach ($result as $row) {
        array_push($dataPoints6, array("label" => $row->device, "y" => $row->consumption));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

$dataPoints10 = array();
try { 
    $link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");

    $handle = $link->prepare('SELECT device, consumption from consumption where roomId = 3');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);


    foreach ($result as $row) {
        array_push($dataPoints10, array("label" => $row->device, "y" => $row->consumption));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}
?>

<?php

$dataPoints3 = array();
try {  
    $link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");

    $handle = $link->prepare('SELECT months, bill from bills where roomId = 1');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);


    foreach ($result as $row) {
        array_push($dataPoints3, array("label" => $row->months, "y" => $row->bill));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

$dataPoints7 = array();
try {
    $link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");

    $handle = $link->prepare('SELECT months, bill from bills where roomId = 2');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);


    foreach ($result as $row) {
        array_push($dataPoints7, array("label" => $row->months, "y" => $row->bill));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

$dataPoints11 = array();
try { 
    $link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");

    $handle = $link->prepare('SELECT months, bill from bills where roomId = 3');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);


    foreach ($result as $row) {
        array_push($dataPoints11, array("label" => $row->months, "y" => $row->bill));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

?>
<?php
$dataPoints4 = array();
$dataPoints4_ = array();
try {
    $link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");

    $handle = $link->prepare('SELECT roomTemp,time_ FROM logs ORDER BY id DESC LIMIT 10  ');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);


    foreach ($result as $row) {
        array_push($dataPoints4, array("label" => $row->time_, "y" => $row->roomTemp));
    }
    $dataPoints4 = array_reverse($dataPoints4);
    //  $newRoomTemp = 35; // Yeni roomTemp değeri
    //  $roomId = 1; // Güncellenmek istenen odanın ID'si

    // $handle = $link->prepare('UPDATE temperature SET roomTemp = :newRoomTemp WHERE roomId = :roomId');
    // $handle->bindParam(':newRoomTemp', $newRoomTemp);
    // $handle->bindParam(':roomId', $roomId);
    // $handle->execute();

    $handle_ = $link->prepare('SELECT fanTemp,time_ from logs ORDER BY id DESC LIMIT 10 ');
    $handle_->execute();
    $result_ = $handle_->fetchAll(\PDO::FETCH_OBJ);
    foreach ($result_ as $row) {
        array_push($dataPoints4_, array("label" => $row->time_, "y" => $row->fanTemp));
    }
    $dataPoints4_ = array_reverse($dataPoints4_);

    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}




?>

<?php
$link = new \PDO("mysql:host=localhost;dbname=web-programming", "root", "");
$handle = $link->prepare('SELECT roomTemp, fanTemp from temperature where roomId = 1');
$handle->execute();
$result = $handle->fetch(\PDO::FETCH_ASSOC);
print_r($result);


$sql = "SELECT MAX(id) as max_id FROM logs";
$resultt = $link->prepare($sql);
$resultt->execute();
$row = $resultt->fetch(PDO::FETCH_ASSOC);
print_r($row);
$last_id = $row['max_id'];
$last_id++;
echo $last_id;


$roomTemp = $result["roomTemp"];
$fanTemp = $result["fanTemp"];

if ($fanTemp > 0) {
    if ($roomTemp > $fanTemp) {
        $newRoomTemp = $roomTemp - 1; // Yeni roomTemp değeri
        $roomId = 1; // Güncellenmek istenen odanın ID'si
        $handle = $link->prepare('UPDATE temperature SET roomTemp=:newRoomTemp WHERE roomId = :roomId');
        $handle->bindParam(':newRoomTemp', $newRoomTemp);
        $handle->bindParam(':roomId', $roomId);
        $handle->execute();
        $query = $link->prepare("INSERT INTO logs (id, roomTemp, time_,fanTemp) VALUES (:id, :roomTemp, :time_, :fanTemp)");
        $query->bindParam(':id', $last_id);
        $query->bindParam(':roomTemp', $newRoomTemp);
        $currentTime = date("H:i:s");
        $query->bindParam(':time_', $currentTime);
        $query->bindParam(':fanTemp', $fanTemp);
        $insert = $query->execute();

        if ($insert) {
            echo "Veriler başarıyla eklendi.";
        } else {
            echo "Veri ekleme hatası.";
        }


    } else {
        $newRoomTemp = $roomTemp + 1; // Yeni roomTemp değeri
        $roomId = 1; // Güncellenmek istenen odanın ID'si
        $handle = $link->prepare('UPDATE temperature SET roomTemp=:newRoomTemp WHERE roomId = :roomId');
        $handle->bindParam(':newRoomTemp', $newRoomTemp);
        $handle->bindParam(':roomId', $roomId);
        $handle->execute();
        $query = $link->prepare("INSERT INTO logs (id, roomTemp, time_,fanTemp) VALUES (:id, :roomTemp, :time_, :fanTemp)");
        $query->bindParam(':id', $last_id);
        $query->bindParam(':roomTemp', $newRoomTemp);
        $currentTime = date("H:i:s");
        $query->bindParam(':time_', $currentTime);
        $query->bindParam(':fanTemp', $fanTemp);
        $insert = $query->execute();
    }

}
$link = null;

?>