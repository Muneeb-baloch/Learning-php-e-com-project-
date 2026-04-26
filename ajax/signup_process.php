<?php
include("db.php");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = mysqli_real_escape_string($conn, $_POST["u_fullname"]);
    $email    = mysqli_real_escape_string($conn, $_POST["u_email"]);
    $password = mysqli_real_escape_string($conn, $_POST["u_password"]);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT user_id FROM tbl_user_registration WHERE user_email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo json_encode(["status" => "error", "message" => "Email already registered. Please login."]);
        exit();
    }

    $qry    = "INSERT INTO tbl_user_registration (user_full_name, user_email, user_password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($conn, $qry);

    if ($result) {
        echo json_encode(["status" => "success", "message" => "Account created! Redirecting to login..."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Registration failed. Try again."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
