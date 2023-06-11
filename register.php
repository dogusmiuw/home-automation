<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "home_auto";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Could not connect to database: " . mysqli_connect_error());
}

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

            display: grid;
            place-items: center;
        }

        a {
            text-decoration: none;
        }

        form {
            width: 80%;
        }

        .img-fluid {
            height: 100%;
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
                border-top-right-radius: 10px;
                margin-bottom: 1rem;
            }

            form {
                width: 90%;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<?php
    $status = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user_type = $_POST["user_type"];

        $check_sql = "SELECT email FROM users";
        $res = $conn->query($check_sql);
        $arr = array();

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $arr[] = $row['email'];
            }
        }
        
        // var_dump($arr);
        // die();

        if (in_array($email, $arr)) {
            $status = "<p class='text-danger'>"."This e-mail has already been used."."</p>";
        } else {
            $sql = "INSERT INTO users VALUES(NULL, ?, ?, ?, ?);";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param("ssss", $name, $email, $password, $user_type);

            $stmt->execute();

            $stmt->close();
            $conn->close();

            $status = "<p class='text-success'>"."Profile succesfully created."."</p>";
        }


    }
    ?>

<body>
    <div class="container d-flex justify-content-center">
        <div class="login-div row align-items-center bg-light">
            <div class="col" style="padding: 0; height: 100%;">
                <img class="img-fluid" src="img/form-cover.jpg" style="object-fit: cover;" alt="Home">
            </div>
            <div class="col d-flex flex-column align-items-center pt-5 pb-5">
                <h1 class="text-center">Welcome</h1>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="user_type" class="form-label">User type</label>
                        <select class="form-select" style="background-color: white !important;" aria-label="User type"
                            id="user_type" name="user_type" required>
                            <option selected>Select user type</option>
                            <option value="consumer">Consumer</option>
                            <option value="producer">Producer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name Surname</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="johndoe@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********"
                            required>
                    </div>
                    <button type="submit" style="background-color: #846545; color: white;"
                        class="btn w-100">Register</button>                    
                        <?= $status ?>
                    <a class="mt-3 d-block link-offset-2-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="index.php" style="color:#846545;">
                        Login
                    </a>
                </form>
            </div>
        </div>
    </div>
    
    <?php include 'producer/layout/_footer.php' ?>