<?php
session_start();
if (!isset($_SESSION["user_id"])) { header("Location: login.php"); exit(); }
include("db.php");

if (!isset($_GET["id"])) { header("Location: users_normal.php"); exit(); }

$id     = (int) $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM tbl_user_registration WHERE user_id=$id");
$user   = mysqli_fetch_assoc($result);

if (!$user) { header("Location: users_normal.php?error=User not found."); exit(); }

if (isset($_POST["submitNow"])) {
    $name     = mysqli_real_escape_string($conn, $_POST["u_fullname"]);
    $email    = mysqli_real_escape_string($conn, $_POST["u_email"]);
    $password = mysqli_real_escape_string($conn, $_POST["u_password"]);

    $qry = "UPDATE tbl_user_registration SET user_full_name='$name', user_email='$email', user_password='$password' WHERE user_id=$id";
    if (mysqli_query($conn, $qry)) {
        header("Location: users_normal.php?success=User updated successfully!");
    } else {
        header("Location: users_normal.php?error=Failed to update user.");
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
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
            <h1>Edit User</h1>
        </div>
        <form method="POST">
            <div class="row">
                <label>Full Name:</label>
                <input type="text" name="u_fullname" value="<?php echo htmlspecialchars($user["user_full_name"]); ?>" required>
            </div>
            <div class="row">
                <label>Email:</label>
                <input type="email" name="u_email" value="<?php echo htmlspecialchars($user["user_email"]); ?>" required>
            </div>
            <div class="row">
                <label>Password:</label>
                <input type="password" name="u_password" value="<?php echo htmlspecialchars($user["user_password"]); ?>" required>
            </div>
            <div class="actions">
                <button type="submit" name="submitNow">Update User</button>
            </div>
        </form>
        <p style="text-align:center;margin-top:15px;">
            <a href="users_normal.php" style="color:#4a90e2;font-weight:600;font-size:14px;">Back to Users</a>
        </p>
    </div>
</div>

</body>
</html>
