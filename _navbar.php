<?php global$page_name; ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="">Home Automation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $page_name == 'Rooms' ? 'active' : '' ?>" aria-current="page" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page_name == 'Devices' ? 'active' : '' ?>" href="devices.php">Devices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page_name == 'Contact' ? 'active' : '' ?>" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page_name == 'About' ? 'active' : '' ?>" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="index.php">Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>