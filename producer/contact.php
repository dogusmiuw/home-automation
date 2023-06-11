<?php include 'layout/_header.php' ?>
    <?php include 'layout/_navbar.php' ?>
    <?php
    $sql = "SELECT * FROM houses";
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