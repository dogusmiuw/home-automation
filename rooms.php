<?php include '_header.php' ?>
<?php include '_navbar.php' ?>
<style>
    .col-3.mb-3 > a > .card:hover{
        scale: 1.05;
        transition: 300ms;
    }
    .col-3.mb-3 > a > .card:not(:hover){
        transition: 300ms;
    }
</style>
<div class="container">
    <div class="row container-row mt-5">

        <!--            <div class="col-9">-->
        <div class="card"> <!-- main -->
            <div class="card-body">
                <h1>Rooms</h1>
                <div class="row mb-3">
                <?php
                        $sql = "SELECT * FROM rooms";
                        // Sorguyu çalıştır ve sonuçları al
                        $result = $conn->query($sql);
                        
                        // Sonuçları kontrol et
                        if ($result->num_rows > 0) {
                            // Her bir satırı döngüyle al
                            while ($row = $result->fetch_assoc()) {
                                // Veriyi kullanmak için burada işlemler yapabilirsiniz
                                ?>
                    <div class="col-3 mb-3">
                        <a href="<?= $row["url"] ?>">
                            <div class="card">
                                <div class="card-body">
                                    <h4><?= $row["room_name"] ?></h4>
                                    <p><i class="fs-4 text-danger fa-solid fa-temperature-quarter"></i><span
                                            class="fs-5">
                                            <?= $row["room_temp"] ?>°C</span></p>

                                            <?php 
                                            $room_id = $row["room_id"];
                                            $device_type = "light";
                                            
                                            // SQL sorgusu için hazırlık yap
                                            $sql2 = "SELECT * FROM devices WHERE room_id = ? AND device_type = ?";
                                            $stmt = $conn->prepare($sql2);
                                            
                                            // Değişkenleri bağla
                                            $stmt->bind_param("is", $room_id, $device_type);
                                            
                                            // Sorguyu çalıştır ve sonuçları al
                                            $stmt->execute();
                                            $result2 = $stmt->get_result();

                                            $row2 = $result2->fetch_assoc();
                                        ?>
                                    <p><i class="fs-4 <?= $row2["stat"] == "on" ? "text-warning" : "" ?> fa-solid fa-lightbulb"></i><span class="fs-5">
                                            <?= ucfirst($row2["stat"]) ?></span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                            }
                        } else {
                            echo "<p>No rooms.</p>";
                        }
                        ?>
                </div>
            </div>
        </div> <!-- main end -->
        <!--            </div>-->
    </div>
</div>

<?php include '_footer.php' ?>