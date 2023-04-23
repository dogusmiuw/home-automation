<?php include '_header.php' ?>
<?php include '_navbar.php' ?>
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
                <h1>Living Room</h1>
                <div class="row mb-3">
                    <div class="col-3 mb-3">
                        <div class="card deviceInRoomCard" onclick="lightToggle()">
                            <div class="card-body">
                                <h4>Light</h4>
                                <p class="text-center">
                                    <i id="light" class="text-warning fa-solid fa-lightbulb"
                                        style="font-size:7rem;"></i>
                                </p>
                                <p class="text-center">
                                    <span id="lightStatus" class="fs-5">On</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-3">
                        <div class="card deviceInRoomCard" onclick="acToggle()">
                            <div class="card-body">
                                <h4>AC</h4>
                                <p class="text-center">
                                    <i id="ac" class="text-primary fa-solid fa-fan fa-spin" style="font-size:7rem;"></i>
                                </p>
                                <p class="text-center">
                                    <span id="acStatus" class="fs-5">On</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-3">
                        <div class="card deviceInRoomCard" onclick="tvToggle()">
                            <div class="card-body">
                                <h4>TV</h4>
                                <p class="text-center">
                                    <i id="tv" class="text-primary-emphasis fa-solid fa-tv" style="font-size:7rem;"></i>
                                </p>
                                <p class="text-center">
                                    <span id="tvStatus" class="fs-5">On</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-3">
                        <div class="card deviceInRoomCard" onclick="windowsToggle()">
                            <div class="card-body">
                                <h4>Windows</h4>
                                <p class="text-center">
                                    <i id="windows" class="text-primary fa-solid fa-table-cells-large"
                                        style="font-size:7rem;"></i>
                                </p>
                                <p class="text-center">
                                    <span id="windowsStatus" class="fs-5">Open</span>
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
<script src="js/roomDeviceControl.js"></script>
<?php include '_footer.php' ?>