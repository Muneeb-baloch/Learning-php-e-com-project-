<?php
session_start();
if (!isset($_SESSION["user_id"])) { header("Location: login.php"); exit(); }
include("db.php");

if (isset($_POST["submitNow"])) {
    $name     = mysqli_real_escape_string($conn, $_POST["u_fullname"]);
    $email    = mysqli_real_escape_string($conn, $_POST["u_email"]);
    $password = mysqli_real_escape_string($conn, $_POST["u_password"]);

    $qry = "INSERT INTO tbl_user_registration (user_full_name, user_email, user_password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $qry)) {
        header("Location: users_normal.php?success=User added successfully!");
    } else {
        header("Location: users_normal.php?error=Failed to add user.");
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <a href="dashboard.php" class="navbar-brand">User<span>Panel</span></a>
    <div class="navbar-right">
        <a href="users_normal.php" style="color:#ccc;">← Back to Users</a>
        <a href="logout.php" class="nav-logout">Logout</a>
    </div>
</nav>

<div class="container form-narrow" style="margin-top:35px;">
    <div class="card">
        <div class="header">
            <h1>Add New User</h1>
        </div>
        <form method="POST">
            <div class="row">
                <label>Full Name:</label>
                <input type="text" name="u_fullname" placeholder="Enter full name" required>
            </div>
            <div class="row">
                <label>Email:</label>
                <input type="email" name="u_email" placeholder="Enter email" required>
            </div>
            <div class="row">
                <label>Password:</label>
                <input type="password" name="u_password" placeholder="Enter password" required>
            </div>
            <div class="actions">
                <button type="submit" name="submitNow">Add User</button>
            </div>
        </form>
        <p style="text-align:center;margin-top:15px;">
            <a href="users_normal.php" style="color:#4a90e2;font-weight:600;font-size:14px;">Back to Users</a>
        </p>
    </div>
</div>

</body>
</html>
