<?php
include("db.php");

if (isset($_POST["submitNow"])) {
    $userName = $_POST["u_fullname"];
    $userEmail = $_POST["u_email"];
    $userPassword = $_POST["u_password"];

    $query = "INSERT INTO tbl_user_registration (user_full_name, user_email, user_password) VALUES ('$userName', '$userEmail', '$userPassword')";
    $result = mysqli_query($conn, $query);

    echo "<h1>Data Inserted Successfully!</h1>";
    echo "Welcome: " . $userName . "<br>";
    echo "Your Email: " . $userEmail . "<br>";
} else {
    echo "No data submitted.";
}
?>