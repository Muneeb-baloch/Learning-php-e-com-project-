<?php
session_start();
if (!isset($_SESSION["user_id"])) { header("Location: login.php"); exit(); }
include("db.php");

if (!isset($_GET["id"])) { header("Location: users_normal.php"); exit(); }

$id = (int) $_GET["id"];
if (mysqli_query($conn, "DELETE FROM tbl_user_registration WHERE user_id=$id")) {
    header("Location: users_normal.php?success=User deleted successfully!");
} else {
    header("Location: users_normal.php?error=Failed to delete user.");
}
exit();
?>
