<?php include '_header.php' ?>
<?php
    $users = array(
        array("consumer","consumer@mail.com","12345"),
        array("producer","producer@mail.com","12345")
    );

    $status = "";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(array_key_exists($_POST["email"], $users) && $_POST["password"] == $users[$_POST["email"]]){
            header("Location: home.php");
        } else {
            $status = "E-mail or password is incorrect.";
        }
    }
?>
    <div class="container d-flex justify-content-center">
        <div class="row align-items-center bg-light" style="width: 1000px;border: 2px solid mediumpurple; border-radius: 10px;">
            <div class="col" style="padding: 0">
                <img class="img-fluid" src="img/form-cover.jpg" style="object-fit: cover; border-bottom-left-radius: 10px; border-top-left-radius: 10px;" alt="Home">
            </div>
            <div class="col d-flex flex-column align-items-center">
                <h1 class="text-center">Welcome</h1>
                <form style="width: 80%" action="" method="POST">
                    <div class="mb-3">
                        <label for="user_type" class="form-label">User type</label>
                        <select class="form-select bg-light" aria-label="User type" id="user_type" name="user_type" required>
                            <option selected>Select user type</option>
                            <option value="consumer">Consumer</option>
                            <option value="producer">Producer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <p class="text-danger"><?= $status ?></p>
                    <a class="d-block link-offset-2-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                       href="register.php">
                        Register
                    </a>
                </form>
            </div>
        </div>
    </div>

<?php include '_footer.php' ?>