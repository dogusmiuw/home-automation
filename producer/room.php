<?php include 'layout/_header.php' ?>
<?php include 'layout/_navbar.php' ?>
<style>
    .deviceInRoomCard:hover {
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="row container-row mt-5">
        
        <!--            <div class="col-9">-->
        <div class="card"> <!-- main -->
            <div class="card-body">
                <?php 
                    $room_id = $_GET["room_id"];
                    $room_sql = "SELECT * FROM rooms WHERE room_id=$room_id";
                    $room_res = $conn->query($room_sql);
                    $room_row = $room_res->fetch_assoc();
                ?>
                <h1><?= $room_row["room_name"] ?></h1>
                <!-- DEVICE LIST START -->
                <?php
                    
                    $device_type = "light";
                    // SQL sorgusu için hazırlık yap
                    $sql = "SELECT * FROM devices WHERE room_id = ?";
                    $stmt = $conn->prepare($sql);
                    
                    // Değişkenleri bağla
                    $stmt->bind_param("i", $room_id);
                    
                    // Sorguyu çalıştır ve sonuçları al
                    $stmt->execute();
                    $result = $stmt->get_result();
?>
                    <div class="row mb-3">
                        <?php 
                            if($result->num_rows == 0) {
                                echo "<p>No devices.</p>";
                            }
                        ?>
                        <?php
                    while($row = $result->fetch_assoc()){
                        $device_name = $row["device_name"];
                        $device_type = $row["device_type"];
                        ?>
                    <div class="col-3 mb-3">
                        <div class="card deviceInRoomCard">
                            <div class="card-body">
                                <h4><?= ucfirst($device_name) ?></h4>
                                <p class="text-center">
                                    <?php 
                                    switch ($device_type) {
                                        case 'light':
                                            ?>
                                            <i id="<?= $device_type ?>" class="<?= $row["stat"] == "on" ? "text-warning" : "" ?> fa-solid fa-lightbulb"
                                        style="font-size:7rem;"></i>
                                            <?php
                                            break;
                                        case 'tv':
                                            ?>
                                            <i id="<?= $device_type ?>" class="<?= $row["stat"] == "on" ? "text-primary-emphasis" : "" ?> fa-solid fa-tv"
                                        style="font-size:7rem;"></i>
                                            <?php
                                            break;
                                        case 'ac':
                                            ?>
                                            <i id="<?= $device_type ?>" class="<?= $row["stat"] == "on" ? "text-primary fa-spin" : "" ?> fa-solid fa-fan"
                                        style="font-size:7rem;"></i>
                                            <?php
                                            break;
                                        case 'oven':
                                            ?>
                                            <i id="<?= $device_type ?>" class="<?= $row["stat"] == "on" ? "text-danger" : "" ?> fa-solid fa-fire"
                                        style="font-size:7rem;"></i>
                                            <?php
                                            break;
                                        case 'window':
                                            ?>
                                            <i id="<?= $device_type ?>" class="<?= $row["stat"] == "open" ? "text-primary" : "" ?> fa-solid fa-table-cells-large"
                                        style="font-size:7rem;"></i>
                                            <?php
                                            break;
                                        case 'other':
                                            ?>
                                            <i id="<?= $device_type ?>" class="<?= $row["stat"] == "on" ? "text-primary" : "" ?> fa-solid fa-server"
                                        style="font-size:7rem;"></i>
                                            <?php
                                            break;
                                        default:
                                            # code...
                                            break;
                                    }
                                    ?>
                                    
                                </p>
                                <p class="text-center">
                                    <span id="<?= $row["device_type"] ?>Status" class="fs-5"><?= ucfirst($row["stat"]) ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                ?>
                    

<?php die() ?>
                    <div class="col-3 mb-3">
                        <div class="card deviceInRoomCard">
                            <div class="card-body">
                                <h4>Light</h4>
                                <p class="text-center">
                                    <i id="light" class="<?= $row["stat"] == "on" ? "text-warning" : "" ?> fa-solid fa-lightbulb"
                                        style="font-size:7rem;"></i>
                                </p>
                                <p class="text-center">
                                    <span id="lightStatus" class="fs-5"><?= ucfirst($row["stat"]) ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $device_type = "ac";

                        $stmt->execute();
                        $result = $stmt->get_result();

                        $row = $result->fetch_assoc();
                    ?>
                    <div class="col-3 mb-3">
                        <div class="card deviceInRoomCard">
                            <div class="card-body">
                                <h4>AC</h4>
                                <p class="text-center">
                                    <i id="ac" class="<?= $row["stat"] == "on" ? "text-primary fa-spin" : "" ?> fa-solid fa-fan" style="font-size:7rem;"></i>
                                </p>
                                <p class="text-center">
                                    <span id="acStatus" class="fs-5"><?= ucfirst($row["stat"]) ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $device_type = "tv";

                        $stmt->execute();
                        $result = $stmt->get_result();

                        $row = $result->fetch_assoc();
                    ?>
                    <div class="col-3 mb-3">
                        <div class="card deviceInRoomCard">
                            <div class="card-body">
                                <h4>TV</h4>
                                <p class="text-center">
                                    <i id="tv" class="<?= $row["stat"] == "on" ? "text-primary-emphasis" : "" ?> fa-solid fa-tv" style="font-size:7rem;"></i>
                                </p>
                                <p class="text-center">
                                    <span id="tvStatus" class="fs-5"><?= ucfirst($row["stat"]) ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $device_type = "window";

                        $stmt->execute();
                        $result = $stmt->get_result();

                        $row = $result->fetch_assoc();
                    ?>
                    <div class="col-3 mb-3">
                        <div class="card deviceInRoomCard">
                            <div class="card-body">
                                <h4>Windows</h4>
                                <p class="text-center">
                                    <i id="windows" class="<?= $row["stat"] == "open" ? "text-primary" : "" ?> fa-solid fa-table-cells-large"
                                        style="font-size:7rem;"></i>
                                </p>
                                <p class="text-center">
                                    <span id="windowsStatus" class="fs-5"><?= ucfirst($row["stat"]) ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- main end -->
        <!--            </div>-->
    </div>
</div>
<?php include 'layout/_footer.php' ?>