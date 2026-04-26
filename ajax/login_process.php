<?php
session_start();
include("db.php");
header("Content-Type: application/json");

if (isset($_POST["u_email"]) && isset($_POST["u_password"])) {
    $email    = mysqli_real_escape_string($conn, $_POST["u_email"]);
    $password = mysqli_real_escape_string($conn, $_POST["u_password"]);

    $qry    = "SELECT * FROM tbl_user_registration WHERE user_email='$email' AND user_password='$password'";
    $result = mysqli_query($conn, $qry);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION["user_id"]    = $user["user_id"];
        $_SESSION["user_email"] = $user["user_email"];
        echo json_encode(["status" => "success", "message" => "Login successful! Redirecting..."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid email or password."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Please fill all fields."]);
}
?>
