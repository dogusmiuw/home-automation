<?php global $page_name;

if($page_name != "About"){
    if(!empty($_GET["house"]) || !isset($_GET["house"]) || $_GET["house"] != "") {
        $_SESSION["home_id"] = $_GET["house"];
    }
}

?>

<style>
        .nav-item a.nav-link{
            color: white !important;
        }
    </style>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #846545 !important;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-around" style="width: 100% !important;">
                <li class="nav-item">
                    <a class="nav-link fs-3 <?= $page_name == 'Rooms' ? 'active' : '' ?>" href="rooms.php?house=<?= $_SESSION["home_id"] ?>">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3 <?= $page_name == 'Devices' ? 'active' : '' ?>" href="devices.php?house=<?= $_SESSION["home_id"] ?>">Devices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3 <?= $page_name == 'Contact' ? 'active' : '' ?>" href="contact.php?house=<?= $_SESSION["home_id"] ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3 <?= $page_name == 'About' ? 'active' : '' ?>" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3 px-3" style="border: 1px solid white;" href="../index.php?logout=1">Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>