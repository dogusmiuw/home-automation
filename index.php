<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web-proje";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
die("Could not connect to database: " . mysqli_connect_error());
}*/
?>
<!doctype html>
<html lang="en">

<head>
    <?php $page_name = strtoupper(substr(basename($_SERVER['PHP_SELF'], '.php'), 0, 1)) . substr(basename($_SERVER['PHP_SELF'], '.php'), 1); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Automation System |
        <?= $page_name ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body,
        html {
            height: 100vh;
        }

        body {
            background-image: url('consumer/images/background.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center;
            
            display:grid;
            place-items: center;
        }

        a {
            text-decoration: none;
        }

        form {
            width: 80%;
        }

        .img-fluid {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .login-div {
            width: 1000px;
            border: 2px solid #846545;
            border-radius: 10px;
        }

        @media only screen and (max-width: 990px) {
            .col {
                height: 100%;
            }
            .img-fluid {
                height: 100%;
            }
            .col:nth-child(2) {
                padding: 1rem 0;
            }
        }


        @media only screen and (max-width: 600px) {
            .container {
                width: 100vw;
            }
            .login-div {
                flex-direction: column;
            }
            .img-fluid {
                width: 100%;
                height: 250px;
                border-bottom-left-radius: 0;
                margin-bottom: 1rem;
            }
            form {
                width: 90%;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
<?php
$users = array(
    array("consumer", "consumer@mail.com", "12345"),
    array("producer", "producer@mail.com", "12345")
);

$status = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    for ($i = 0; $i < count($users); $i++) {
        if (
            in_array(
                $_POST["email"],
                $users[$i]
            ) &&
            $_POST["user_type"] == $users[$i][0] &&
            $_POST["password"] == $users[$i][2]
        ) {
            $_POST["user_type"] == "producer" ? header("Location: home.php") : header("Location: consumer/home.html");
        } else {
            $status = "Login information is incorrect.";
        }
    }
}
?>
    <div class="container d-flex justify-content-center">
        <div class="login-div row align-items-center bg-light">
            <div class="col" style="padding: 0">
                <img class="img-fluid" src="img/form-cover.jpg" style="object-fit: cover;" alt="Home">
            </div>
            <div class="col d-flex flex-column align-items-center">
                <h1 class="text-center">Welcome</h1>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="user_type" class="form-label">User type</label>
                        <select class="form-select" style="background-color: white !important;" aria-label="User type" id="user_type" name="user_type" required>
                            <option selected>Select user type</option>
                            <option value="consumer">Consumer</option>
                            <option value="producer">Producer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                    </div>
                    <button type="submit" style="background-color: #846545; color: white;" class="btn w-100">Login</button>
                    <p class="text-danger"><?= $status ?></p>
                    <a class="d-block link-offset-2-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                       href="register.php" style="color:#846545;">
                        Register
                    </a>
                </form>
            </div>
        </div>
    </div>
<script src="js/loginFormAutoFill.js"></script>
<?php include '_footer.php' ?>