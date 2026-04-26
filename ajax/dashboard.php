<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
include("db.php");

// Get total user count
$countResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM tbl_user_registration");
$countRow    = mysqli_fetch_assoc($countResult);
$totalUsers  = $countRow["total"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <a href="dashboard.php" class="navbar-brand">User<span>Panel</span></a>
    <div class="navbar-right">
        <span class="navbar-user">👤 <?php echo $_SESSION["user_email"]; ?></span>
        <a href="logout.php" class="nav-logout">Logout</a>
    </div>
</nav>

<div class="page-wrap">

    <div class="dash-welcome">
        <h2>Welcome back! 👋</h2>
        <p>Here's what's going on in your panel today.</p>
    </div>

    <!-- Stat Cards -->
    <div class="stat-cards">
        <a href="users.php" class="stat-card blue" style="text-decoration:none;">
            <div class="stat-icon">👥</div>
            <div class="stat-info">
                <h3><?php echo $totalUsers; ?></h3>
                <p>Total Users</p>
            </div>
        </a>
        <a href="users.php" class="stat-card green" style="text-decoration:none;">
            <div class="stat-icon">⚡</div>
            <div class="stat-info">
                <h3>Ajax CRUD</h3>
                <p>No page reload</p>
            </div>
        </a>
        <a href="users_normal.php" class="stat-card orange" style="text-decoration:none;">
            <div class="stat-icon">📄</div>
            <div class="stat-info">
                <h3>Normal CRUD</h3>
                <p>Classic approach</p>
            </div>
        </a>
    </div>

    <!-- Quick Links -->
    <div class="quick-links">
        <h3>Quick Actions</h3>
        <div class="quick-link-btns">
            <a href="users.php" class="ql-btn primary">⚡ Ajax CRUD</a>
            <a href="users_normal.php" class="ql-btn secondary">📄 Normal CRUD</a>
        </div>
    </div>

</div>

</body>
</html>
