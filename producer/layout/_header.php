<?php

if(!(isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == true)) {
    echo "<p>You are not logged in.</p>"."<br>";
    echo "<a href='../index.php'>Go back to home page.</a>";
    die();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "home_auto";
$conn = new mysqli($servername, $username, $password, $dbname);

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
            height: 100%;
        }

        body {
            background-image: url('../consumer/images/background.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center;
        }

        a {
            text-decoration: none;
        }
        
    </style>
    <link rel="stylesheet" href="css/mobile.css">
</head>

<body>