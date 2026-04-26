<?php
include("db.php");

if (isset($_GET["submitNow"])) {
    $userName = $_GET["u_fullname"];
    $userEmail = $_GET["u_email"];
    $userPassword = $_GET["u_password"];

    $query = "INSERT INTO tbl_user_registration (user_full_name, user_email, user_password) VALUES ('$userName', '$userEmail', '$userPassword')";
    $result = mysqli_query($conn, $query);

    echo "<h1>Data Inserted Successfully!</h1>";
    echo "Name: " . $userName . "<br>";
    echo "Email: " . $userEmail . "<br>";
} else {
    echo "No data submitted.";
}
?>