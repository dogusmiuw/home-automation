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

    $home_id = $_SESSION["home_id"];
    $sql = "SELECT * FROM houses WHERE home_id=$home_id";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    ?>
    <div class="container">
        <div class="row container-row mt-5">
                <div class="card"> <!-- main -->
                    <div class="card-body">
                        <h1>Contact</h1>
                        <div class="row">
                            <p><span class="fw-semibold">Consumer:</span> <?= $row["owner"] ?><br>
                                <span class="fw-semibold">Address:</span> <?= $row["address"] ?>
                            </p>
                            <div>
                                <a href="tel:<?= $row["tel"] ?>" style="background-color: #846545; color: white;" class="btn contact-btn"><i class="fa-solid fa-phone"></i> Call</a>
                                <a href="mailto:<?= $row["email"] ?>" style="background-color: #846545; color: white;" class="btn contact-btn"><i class="fa-solid fa-envelope"></i> Send E-mail</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- main end -->
        </div>
    </div>

<?php include 'layout/_footer.php' ?>