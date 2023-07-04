<?php include 'layout/_header.php' ?>
<?php include 'layout/_navbar.php' ?>
<?php
$house_sql = "SELECT home_id FROM houses";
$house_res = $conn->query($house_sql);
$house_arr = $house_res->fetch_array();

if(!isset($_GET["house"]) || empty($_GET["house"]) || !in_array($_GET["house"], $house_arr)){
    header("Location: home.php");
}

$_SESSION["home_id"] = $_GET["house"];
?>
<div class="container">
    <div class="row container-row mt-5">
        <div class="card"> <!-- main -->
            <div class="card-body">
                <h1>Devices</h1>
                <div class="row mb-3">
                    <div>
                        <a href="#" onclick="device_form_toggle()" class="btn active"
                            style="background-color: #846545; color: white;"><i class="fa-solid fa-plus"></i>
                             Add device</a>
                    </div>
                    <form action="?house=<?=$_SESSION["home_id"]?>&action=add_device" method="post" class="mt-3 mb-3 d-none" id="addDeviceForm">
                        <div class="mb-3">
                            <label for="device_type" class="form-label">Device type</label>
                            <select class="form-select" id="device_type" name="device_type">
                                <option selected>Select device type</option>
                                <option value="light">Light</option>
                                <option value="ac">AC</option>
                                <option value="tv">TV</option>
                                <option value="window">Window</option>
                                <option value="oven">Oven</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="device_name" class="form-label">Device Name</label>
                            <input type="text" class="form-control" id="device_name" name="device_name"
                                placeholder="my ring light">
                        </div>
                        <div class="mb-3">
                            <label for="room" class="form-label">Select room</label>
                            <select class="form-select" id="room" name="room_id">
                                <option selected>Select room</option>
                                <?php 
                                $sql = "SELECT * FROM rooms";
                                $res = $conn->query($sql);
                                if ($res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                ?>
                                <option value="<?= $row["room_id"] ?>"><?= $row["room_name"] ?></option>
                                <?php 
                                    }}
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ipAddress" class="form-label">Device IP</label>
                            <input type="text" class="form-control" id="ipAddress" name="ipAddress"
                                placeholder="ex: 192.168.2.110">
                        </div>
                        <button type="submit" style="background-color: #846545; color: white;"
                            class="btn submit-btn">Submit</button>
                    </form>
                </div>

                <div class="row">
                    <div class="col-3 mb-3 device-group">
                        <div class="card">
                            <div class="card-body">
                                <h4>Lights</h4>
                                <?php

                                $device_type = "light";

                                $sql = "SELECT * FROM devices WHERE device_type = '$device_type'";

                                // Sorguyu çalıştır ve sonuçları al
                                $result = $conn->query($sql);

                                ?>
                                <ul class="list-group">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // Her bir satırı döngüyle al
                                        while ($row = $result->fetch_assoc()) {
                                            $room_id = $row["room_id"];
                                            $room_sql = "SELECT * FROM rooms WHERE room_id = $room_id";
                                            $room_result = $conn->query($room_sql);
                                            $room_row = $room_result->fetch_assoc();
                                            ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?= $row["device_name"] ?><br><?= "[".$room_row["room_name"]."]" ?><a href="#" onclick="remove_device(<?= $row['device_id'] ?>, <?= $_SESSION['home_id'] ?>)"
                                                    data-home-id="<?= $_SESSION["home_id"] ?>"
                                                    data-device-id="<?= $row["device_id"] ?>" class="btn btn-danger active"><i
                                                        class="fa-solid fa-minus"></i></a>
                                            </li>
                                        <?php }
                                    } else {
                                        echo "<p>There is no device in that type.</p>";
                                    }

                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-3 device-group">
                        <div class="card">
                            <div class="card-body">
                                <h4>ACs</h4>
                                <?php

                                $device_type = "ac";

                                $sql = "SELECT * FROM devices WHERE device_type = '$device_type'";

                                // Sorguyu çalıştır ve sonuçları al
                                $result = $conn->query($sql);

                                ?>
                                <ul class="list-group">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // Her bir satırı döngüyle al
                                        while ($row = $result->fetch_assoc()) {
                                            $room_id = $row["room_id"];
                                            $room_sql = "SELECT * FROM rooms WHERE room_id = $room_id";
                                            $room_result = $conn->query($room_sql);
                                            $room_row = $room_result->fetch_assoc();
                                            ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?= $row["device_name"] ?><br><?= "[".$room_row["room_name"]."]" ?><a href="#" onclick="remove_device(<?= $row['device_id'] ?>, <?= $_SESSION['home_id'] ?>)"
                                                    data-home-id="<?= $_SESSION["home_id"] ?>"
                                                    data-device-id="<?= $row["device_id"] ?>" class="btn btn-danger active"><i
                                                        class="fa-solid fa-minus"></i></a>
                                            </li>
                                        <?php }
                                    } else {
                                        echo "<p>There is no device in that type.</p>";
                                    }

                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-3 device-group">
                        <div class="card">
                            <div class="card-body">
                                <h4>TVs</h4>
                                <?php

                                $device_type = "tv";

                                $sql = "SELECT * FROM devices WHERE device_type = '$device_type'";

                                // Sorguyu çalıştır ve sonuçları al
                                $result = $conn->query($sql);

                                ?>
                                <ul class="list-group">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // Her bir satırı döngüyle al
                                        while ($row = $result->fetch_assoc()) {
                                            $room_id = $row["room_id"];
                                            $room_sql = "SELECT * FROM rooms WHERE room_id = $room_id";
                                            $room_result = $conn->query($room_sql);
                                            $room_row = $room_result->fetch_assoc();
                                            ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?= $row["device_name"] ?><br><?= "[".$room_row["room_name"]."]" ?><a href="#" onclick="remove_device(<?= $row['device_id'] ?>, <?= $_SESSION['home_id'] ?>)"
                                                    data-home-id="<?= $_SESSION["home_id"] ?>"
                                                    data-device-id="<?= $row["device_id"] ?>" class="btn btn-danger active"><i
                                                        class="fa-solid fa-minus"></i></a>
                                            </li>
                                        <?php }
                                    } else {
                                        echo "<p>There is no device in that type.</p>";
                                    }

                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-3 device-group">
                        <div class="card">
                            <div class="card-body">
                                <h4>Windows</h4>
                                <?php

                                $device_type = "window";

                                $sql = "SELECT * FROM devices WHERE device_type = '$device_type'";

                                // Sorguyu çalıştır ve sonuçları al
                                $result = $conn->query($sql);

                                ?>
                                <ul class="list-group">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // Her bir satırı döngüyle al
                                        while ($row = $result->fetch_assoc()) {
                                            $room_id = $row["room_id"];
                                            $room_sql = "SELECT * FROM rooms WHERE room_id = $room_id";
                                            $room_result = $conn->query($room_sql);
                                            $room_row = $room_result->fetch_assoc();
                                            ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?= $row["device_name"] ?><br><?= "[".$room_row["room_name"]."]" ?><a href="#" onclick="remove_device(<?= $row['device_id'] ?>, <?= $_SESSION['home_id'] ?>)"
                                                    data-home-id="<?= $_SESSION["home_id"] ?>"
                                                    data-device-id="<?= $row["device_id"] ?>" class="btn btn-danger active"><i
                                                        class="fa-solid fa-minus"></i></a>
                                            </li>
                                        <?php }
                                    } else {
                                        echo "<p>There is no device in that type.</p>";
                                    }

                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-3 device-group">
                        <div class="card">
                            <div class="card-body">
                                <h4>Ovens</h4>
                                <?php

                                $device_type = "oven";

                                $sql = "SELECT * FROM devices WHERE device_type = '$device_type'";

                                // Sorguyu çalıştır ve sonuçları al
                                $result = $conn->query($sql);

                                ?>
                                <ul class="list-group">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // Her bir satırı döngüyle al
                                        while ($row = $result->fetch_assoc()) {
                                            $room_id = $row["room_id"];
                                            $room_sql = "SELECT * FROM rooms WHERE room_id = $room_id";
                                            $room_result = $conn->query($room_sql);
                                            $room_row = $room_result->fetch_assoc();
                                            ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?= $row["device_name"] ?><br><?= "[".$room_row["room_name"]."]" ?><a href="#" onclick="remove_device(<?= $row['device_id'] ?>, <?= $_SESSION['home_id'] ?>)"
                                                    data-home-id="<?= $_SESSION["home_id"] ?>"
                                                    data-device-id="<?= $row["device_id"] ?>" class="btn btn-danger active"><i
                                                        class="fa-solid fa-minus"></i></a>
                                            </li>
                                        <?php }
                                    } else {
                                        echo "<p>There is no device in that type.</p>";
                                    }

                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-3 device-group">
                        <div class="card">
                            <div class="card-body">
                                <h4>Other</h4>
                                <?php

                                $device_type = "other";

                                $sql = "SELECT * FROM devices WHERE device_type = '$device_type'";

                                // Sorguyu çalıştır ve sonuçları al
                                $result = $conn->query($sql);

                                ?>
                                <ul class="list-group">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // Her bir satırı döngüyle al
                                        while ($row = $result->fetch_assoc()) {
                                            $room_id = $row["room_id"];
                                            $room_sql = "SELECT * FROM rooms WHERE room_id = $room_id";
                                            $room_result = $conn->query($room_sql);
                                            $room_row = $room_result->fetch_assoc();
                                            ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?= $row["device_name"] ?><br><?= "[".$room_row["room_name"]."]" ?><a href="#" onclick="remove_device(<?= $row['device_id'] ?>, <?= $_SESSION['home_id'] ?>)"
                                                    data-home-id="<?= $_SESSION["home_id"] ?>"
                                                    data-device-id="<?= $row["device_id"] ?>" class="btn btn-danger active"><i
                                                        class="fa-solid fa-minus"></i></a>
                                            </li>
                                        <?php }
                                    } else {
                                        echo "<p>There is no device in that type.</p>";
                                    }

                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- main end -->
        <div class="card my-3">
            <div class="card-body">
                <h1>Usage Chart</h1>
                <div id="chart_div" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Light', 'AC', 'TV', 'Oven', 'Other'],
            ['January', 90, 512, 370, 100, 200],
            ['February', 80, 550, 362, 80, 100],
            ['March', 85, 600, 390, 102, 0],
            ['April', 110, 500, 300, 95, 0],
            ['May', 100, 700, 310, 80, 10],
            ['June', 120, 676, 195, 85, 0],
        ]);

        var options = {
            title: 'Device Usage (kWh)',
            hAxis: { title: 'Last 6 months', titleTextStyle: { color: '#333' } },
            vAxis: { minValue: 0 }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<?php

if (isset($_GET["action"])) {
    if ($_GET['action'] == 'add_device') {
        $submitted_device_type = $_POST["device_type"];
        $submitted_room_id = $_POST["room_id"];
        $submitted_device_ip = $_POST["ipAddress"];
        $submitted_device_name = $_POST["device_name"];
        
        $_SESSION["house"] = $_GET["house"];
        $home_id = $_SESSION["house"];

        if(empty($submitted_device_ip) || $submitted_device_ip == "" || !isset($submitted_device_ip)){
            $sql = "INSERT INTO devices (device_id, device_name, device_type, stat, device_ip, room_id, home_id)
                    VALUES (NULL, '$submitted_device_name','$submitted_device_type','off', NULL, '$submitted_room_id', '$home_id')";
        }else {
            $sql = "INSERT INTO devices (device_id, device_name, device_type, stat, device_ip, room_id, home_id)
                    VALUES (NULL, '$submitted_device_name','$submitted_device_type','off', '$submitted_device_ip', '$submitted_room_id', '$home_id')";
        }
        
        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                var path = window.location.pathname;
                var page = path.split("/").pop();
                page += "?house="+<?= $_SESSION["home_id"] ?>;
                // alert( page );
                window.location.href = page;
            </script>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>


<script src="../js/device_form.js"></script>
<?php include 'layout/_footer.php'; ?>