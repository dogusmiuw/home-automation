<?php include 'layout/_header.php' ?>
<style>
    .col-9 .col-3>.card:hover {
        scale: 1.05;
        transition: 300ms;
    }

    .col-9 .col-3>.card:not(:hover) {
        transition: 300ms;
    }

    @media only screen and (max-width: 600px) {
        .container-row {
            flex-direction: column-reverse;
            gap: 1rem;
        }
    }
</style>


<div class="container">
    <div class="row container-row mt-5">
        <div class="col-3">
            <div class="card"> <!-- nav -->
                <div class="card-body">
                    <div class="list-group">
                        <a href="../index.php?logout=1" class="btn btn-light list-group-item list-group-item-action text-danger"
                            role="button">Log out</a>
                    </div>
                </div>
            </div> <!-- nav end-->
        </div>
        <div class="col-9">
            <div class="card"> <!-- main -->
                <div class="card-body">
                    <h1>Houses</h1>
                    <div class="row">
                    <div>
                        <a href="#" onclick="house_form_toggle()" class="btn active"
                            style="background-color: #846545; color: white;"><i class="fa-solid fa-plus"></i>
                             Create new house</a>
                    </div>
                    <form action="?action=create_house" method="post" class="mt-3 mb-3 d-none" id="addHouseForm">
                        <div class="mb-3">
                            <label for="owner" class="form-label">Owner Name</label>
                            <input type="text" pattern="[A-Za-z]+" title="Only letters are accepted." class="form-control" id="owner" name="owner"
                                placeholder="Rachel Amber" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" pattern="[A-Za-z0-9]+" title="Only letters and numbers are accepted." class="form-control" id="address" name="address"
                                placeholder="Neverland, Oregon" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" class="form-control" id="email" name="email"
                                placeholder="example@mail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="tel" name="tel"
                                placeholder="05---" required>
                        </div>
                        <button type="submit" style="background-color: #846545; color: white;"
                            class="btn submit-btn">Submit</button>
                    </form>
                </div>
                <div class="row mb-3">
                    <div>
                        <a href="#" onclick="del_house_form_toggle()" class="btn active btn-danger">
                        <i class="fa-solid fa-minus"></i>
                             Remove house</a>
                    </div>
                    <form action="?action=del_house" method="post" class="mt-3 mb-3 d-none" id="delHouseForm">
                        <div class="mb-3">
                            <label for="home_id" class="form-label">Select house to remove</label>
                            <select class="form-select" id="home_id" name="home_id">
                                <option selected>Select house</option>
                                <?php 
                                $sql = "SELECT home_id, owner FROM houses";
                                $res = $conn->query($sql);
                                if ($res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                ?>
                                <option value="<?= $row["home_id"] ?>"><?= $row["owner"] ?></option>
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
                        $sql = "SELECT * FROM houses";

                        // Sorguyu çalıştır ve sonuçları al
                        $result = $conn->query($sql);

                        // Sonuçları kontrol et
                        if ($result->num_rows > 0) {
                            // Her bir satırı döngüyle al
                            while ($row = $result->fetch_assoc()) {
                                // Veriyi kullanmak için burada işlemler yapabilirsiniz
                                ?>
                                <div class="col-3">
                                    <div class="card">
                                        <a href="rooms.php?house=<?= $row["home_id"] ?>" class="text-decoration-none text-black">
                                            <div class="card-body">
                                                <h4><?= $row["owner"] ?></h4>
                                                <p><?= $row["address"] ?><br>
                                                    <i class="fa-solid fa-warning text-success"></i>
                                                    <span class=""><?= $row["issues"] ?> issues</span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p>No houses.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div> <!-- main end -->
        </div>
    </div>
</div>

<?php

if (isset($_GET["action"])) {
    if ($_GET['action'] == 'create_house') {
        $owner = $_POST["owner"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];

        $c1 = "SET FOREIGN_KEY_CHECKS = 0";
        $conn->query($c1);
        $sql = "INSERT INTO houses (home_id, owner, address, issues, email, tel)
                VALUES (NULL, '$owner', '$address', 0, '$email', '$tel')";
        $c2 = "SET FOREIGN_KEY_CHECKS = 1";

        if ($conn->query($sql) === TRUE) {
            $conn->query($c2);
            ?>
            <script>
                var path = window.location.pathname;
                var page = path.split("/").pop();
                // alert( page );
                window.location.href = page;
            </script>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else if ($_GET['action'] == 'del_house') {

    }
}

?>

<script src="../js/house_form.js"></script>

<?php include 'layout/_footer.php' ?>