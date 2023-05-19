<?php include '_header.php' ?>
<?php include '_navbar.php' ?>

    <div class="container">
        <div class="row container-row mt-5">
            <div class="card"> <!-- main -->
                <div class="card-body">
                    <h1>Devices</h1>
                    <div class="row mb-3">
                        <div>
                            <a href="#" onclick="device_form_toggle()" class="btn active" style="background-color: #846545; color: white;"><i class="fa-solid fa-plus"></i> Add device</a>
                        </div>
                        <form class="mt-3 mb-3 d-none" id="addDeviceForm">
                            <div class="mb-3">
                                <label for="device_type" class="form-label">Device type</label>
                                <select class="form-select" id="device_type" name="device_type">
                                    <option selected>Select device type</option>
                                    <option value="light">Light</option>
                                    <option value="ac">AC</option>
                                    <option value="tv">TV</option>
                                    <option value="window">Window</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ipAddress" class="form-label">Device IP</label>
                                <input type="text" class="form-control" id="ipAddress" name="ipAddress" placeholder="ex: 192.168.2.110">
                            </div>
                            <button type="submit" style="background-color: #846545; color: white;" class="btn submit-btn">Submit</button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-3 mb-3 device-group">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Lights</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Living Room<a href="#" onclick="remove_device(this)" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Bedroom<a href="#" onclick="remove_device(this)" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Kitchen<a href="#" onclick="remove_device(this)" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 mb-3 device-group">
                            <div class="card">
                                <div class="card-body">
                                    <h4>ACs</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Living Room<a href="#" onclick="remove_device(this)" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Bedroom<a href="#" onclick="remove_device(this)" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 mb-3 device-group">
                            <div class="card">
                                <div class="card-body">
                                    <h4>TVs</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Living Room<a href="#" onclick="remove_device(this)" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 mb-3 device-group">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Windows</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Living Room<a href="#" onclick="remove_device(this)" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Bedroom<a href="#" onclick="remove_device(this)" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Kitchen<a href="#" onclick="remove_device(this)" class="btn btn-danger active"><i class="fa-solid fa-minus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- main end -->
        </div>
    </div>
    <script src="js/removeDevice.js"></script>
<?php include '_footer.php' ?>