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
                    <div class="col-3 mb-3">
                        <a href="livingRoom.php">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Living Room</h4>
                                    <p><i class="fs-4 text-danger fa-solid fa-temperature-quarter"></i><span
                                            class="fs-5">
                                            24.5°C</span></p>
                                    <p><i class="fs-4 text-warning fa-solid fa-lightbulb"></i><span class="fs-5">
                                            On</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mb-3">
                        <a href="bedroom.php">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Bedroom</h4>
                                    <p><i class="fs-4 text-danger fa-solid fa-temperature-quarter"></i><span
                                            class="fs-5">
                                            26.5°C</span></p>
                                    <p><i class="fs-4 text-warning fa-regular fa-lightbulb"></i><span class="fs-5">
                                            Off</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mb-3">
                        <a href="kitchen.php">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Kitchen</h4>
                                    <p><i class="fs-4 text-danger fa-solid fa-temperature-quarter"></i><span
                                            class="fs-5">
                                            28°C</span></p>
                                    <p><i class="fs-4 text-warning fa-solid fa-lightbulb"></i><span class="fs-5">
                                            On</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- main end -->
        <!--            </div>-->
    </div>
</div>

<?php include '_footer.php' ?>