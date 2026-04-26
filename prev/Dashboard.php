<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: loginSession.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="card dashboard-wrap">
        <h2>Welcome to Dashboard</h2>
        <p>Logged in as: <strong><?php echo $_SESSION["user_email"]; ?></strong></p>
        <p><a href="user.php">View All Users</a></p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</div>

</body>
</html>
