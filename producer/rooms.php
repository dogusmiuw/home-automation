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
                <div class="row">
                    <div>
                        <a href="#" onclick="room_form_toggle()" class="btn active"
                            style="background-color: #846545; color: white;"><i class="fa-solid fa-plus"></i>
                             Add room</a>
                    </div>
                    <form action="?house=<?=$_SESSION["home_id"]?>&action=add_room" method="post" class="mt-3 mb-3 d-none" id="addRoomForm">
                        <div class="mb-3">
                            <label for="room_name" class="form-label">Room Name</label>
                            <input type="text" class="form-control" id="room_name" name="room_name"
                                placeholder="My secret place" required>
                        </div>
                        <button type="submit" style="background-color: #846545; color: white;"
                            class="btn submit-btn">Submit</button>
                    </form>
                </div>
                <div class="row mb-3">
                    <div>
                        <a href="#" onclick="del_room_form_toggle()" class="btn active"
                            style="background-color: #846545; color: white;"><i class="fa-solid fa-plus"></i>
                             Remove room</a>
                    </div>
                    <form action="?house=<?=$_SESSION["home_id"]?>&action=del_room" method="post" class="mt-3 mb-3 d-none" id="delRoomForm">
                        <div class="mb-3">
                            <label for="room_id" class="form-label">Select room to remove</label>
                            <select class="form-select" id="room_id" name="room_id">
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
                        <button type="submit" style="background-color: #846545; color: white;"
                            class="btn submit-btn">Submit</button>
                    </form>
                </div>

                <div class="row mb-3">
                <?php
                        $home_id = $_SESSION["home_id"];
                        $sql = "SELECT * FROM rooms WHERE home_id=$home_id";
                        // Sorguyu çalıştır ve sonuçları al
                        $result = $conn->query($sql);
                        
                        // Sonuçları kontrol et
                        if ($result->num_rows > 0) {
                            // Her bir satırı döngüyle al
                            while ($row = $result->fetch_assoc()) {
                                // Veriyi kullanmak için burada işlemler yapabilirsiniz
                                ?>
                    <div class="col-3 mb-3">
                        <a href="room.php?room_id=<?= $row["room_id"] ?>">
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
                                    <p>
                                              
                                                <i class="fs-4 <?= $row2["stat"] == "on" ? "text-warning" : "" ?> fa-solid fa-lightbulb"></i>
                                                <?php 
                                                if(!empty($row2)){
                                            ?>  
                                                <span class="fs-5">
                                                    <?= ucfirst($row2["stat"]) ?></span>
                                            <?php 
                                            } else {
                                            ?>
                                                <span class="fs-5">
                                                    No light found.</span>
                                            <?php
                                            }
                                            ?>
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

<?php

if (isset($_GET["action"])) {
    if ($_GET['action'] == 'add_room') {
        $room_name = $_POST["room_name"];
        $home_id = $_SESSION["house"];
        
        $rand_temp = rand(16,25);

        $sql = "INSERT INTO rooms (room_id, room_name, room_temp, home_id)
                VALUES (NULL, '$room_name', $rand_temp, $home_id)";
        
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
    } else if ($_GET['action'] == 'del_room') {
            
            $room_id= $_POST["room_id"];
            
            $_SESSION["house"] = $_GET["house"];
            $home_id = $_SESSION["house"];

            $c1 = "SET FOREIGN_KEY_CHECKS = 0";
            $conn->query($c1);
            $sql = "DELETE FROM rooms WHERE room_id = $room_id AND home_id = $home_id";
            $c2 = "SET FOREIGN_KEY_CHECKS = 1";
            
            if ($conn->query($sql) === TRUE) {
                $conn->query($c2);
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

<script src="../js/room_form.js"></script>
<?php include 'layout/_footer.php' ?>