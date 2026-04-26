<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ecom_project";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die(json_encode(["status" => "error", "message" => "DB Connection Failed"]));
}
?>
