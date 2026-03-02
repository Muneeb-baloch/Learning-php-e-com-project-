<?php
session_start();


if(!isset($_SESSION["user_id"])){
    header("Location: loginSession.php"); // Adjust this name to match your login file
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard With Session</title>
</head>
<body>

<h2>Dashboard (With Using Session)</h2>

<!-- <p>This page does NOT check if you are logged in.</p>
<p>Anyone can open this page directly.</p> -->

<p><a href="loginSession.php">Back to Login</a></p>

<p><a href="logout.php">Logout now</a></p>

    </body>
    </html>