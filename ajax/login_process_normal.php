<?php
session_start();
include("db.php");

if (isset($_POST["submitNow"])) {
    $email    = mysqli_real_escape_string($conn, $_POST["u_email"]);
    $password = mysqli_real_escape_string($conn, $_POST["u_password"]);

    $qry    = "SELECT * FROM tbl_user_registration WHERE user_email='$email' AND user_password='$password'";
    $result = mysqli_query($conn, $qry);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION["user_id"]    = $user["user_id"];
        $_SESSION["user_email"] = $user["user_email"];
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login_normal.php?error=1");
        exit();
    }
}
?>
