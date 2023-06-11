<?php include 'layout/_header.php' ?>
<?php include 'layout/_navbar.php' ?>
<style>
    .deviceInRoomCard:hover {
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="row container-row mt-5">
    <?php
            $room_id = 3;
            $device_type = "light";
            // SQL sorgusu için hazırlık yap
            $sql = "SELECT * FROM devices WHERE room_id = ? AND device_type = ?";
            $stmt = $conn->prepare($sql);
            
            // Değişkenleri bağla
            $stmt->bind_param("is", $room_id, $device_type);
            
            // Sorguyu çalıştır ve sonuçları al
            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_assoc();
        ?>
        <!--            <div class="col-9">-->
        <div class="card"> <!-- main -->
            <div class="card-body">
                <h1>Bedroom</h1>
                <div class="row mb-3">
                    <div class="col-3 mb-3">
                        <div class="card deviceInRoomCard">
                            <div class="card-body">
                                <h4>Light</h4>
                                <p class="text-center">
                                    <i id="light" class="<?= $row["stat"] == "on" ? "text-warning" : "" ?> fa-regular fa-lightbulb"
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