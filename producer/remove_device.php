<?php
if(!isset($_GET["device_id"])){
    die();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "home_auto";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Could not connect to database: " . mysqli_connect_error());
}

$device_id = $_GET["device_id"];

$sql = "DELETE FROM devices WHERE device_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $device_id);

$home_id = $_GET["house"];


if ($stmt->execute()) {
    header("Location: devices.php?house=$home_id");
}

$stmt->close();
$conn->close();

?>