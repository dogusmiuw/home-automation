<?php include '_header.php' ?>
<?php include '_navbar.php' ?>

    <div class="container">
        <div class="row container-row mt-5">
            <div class="card"> <!-- main -->
                <div class="card-body">
                    <h1>Devices</h1>
                    <div class="row mb-3">
                        <div>
                            <a href="#" onclick="device_form_toggle()" class="btn active" style="background-color: #846545; color: white;"><i class="fa-solid fa-plus"></i> Add device</a>
                        </div>
                        <form action="?action=add_device" method="post" class="mt-3 mb-3 d-none" id="addDeviceForm">
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
                                <label for="room" class="form-label">Select room</label>
                                <select class="form-select" id="room" name="room_id">
                                    <option selected>Select room</option>
                                    <option value="1">Living Room</option>
                                    <option value="2">Kitchen</option>
                                    <option value="3">Bedroom</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ipAddress" class="form-label">Device IP</label>
                                <input type="text" class="form-control" id="ipAddress" name="ipAddress" placeholder="ex: 192.168.2.110">
                            </div>
                            <button type="submit" style="background-color: #846545; color: white;" class="btn submit-btn">Submit</button>
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
                                            <?= $room_row["room_name"] ?><a href="#" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a>
                                        </li>
                                        <?php }} ?>
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
                                            <?= $room_row["room_name"] ?><a href="#" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a>
                                        </li>
                                        <?php }} ?>
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
                                            <?= $room_row["room_name"] ?><a href="#" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a>
                                        </li>
                                        <?php }} ?>
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
                                            <?= $room_row["room_name"] ?><a href="#" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a>
                                        </li>
                                        <?php }} ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- main end -->
        </div>
    </div>

    <?php 

    if (isset($_GET["action"]))
    {
        if($_GET['action'] == 'add_device')
        {
            $submitted_device_type = $_POST["device_type"];
            $submitted_room_id = $_POST["room_id"];
            $submitted_device_ip = $_POST["ipAddress"];
    
            $sql = "INSERT INTO devices (device_id, device_type, stat, room_id, device_ip)
                    VALUES (NULL, '$submitted_device_type', 'off', '$submitted_room_id', '$submitted_device_ip')";
    
            if ($conn->query($sql) === TRUE) {
                echo "<p>New device added.</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    ?>


    <!-- <script src="js/removeDevice.js"></script> -->
<?php include '_footer.php' ?>