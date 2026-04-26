<?php
session_start();
if (!isset($_SESSION["user_id"])) { header("Location: login.php"); exit(); }
include("db.php");
$qry    = "SELECT * FROM tbl_user_registration ORDER BY user_id DESC";
$result = mysqli_query($conn, $qry);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users - Normal CRUD</title>
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

    <div class="page-topbar">
        <h1>Users <span>📄 Normal (page reload)</span></h1>
        <div class="topbar-actions">
            <a href="users.php" class="btn" style="background:#4a90e2;color:#fff;">Switch to Ajax</a>
            <a href="dashboard.php" class="btn" style="background:#2c3e50;color:#fff;">Dashboard</a>
        </div>
    </div>

    <?php if (isset($_GET["success"])): ?>
        <div class="msg msg-success" style="display:block;"><?php echo htmlspecialchars($_GET["success"]); ?></div>
    <?php endif; ?>
    <?php if (isset($_GET["error"])): ?>
        <div class="msg msg-error" style="display:block;"><?php echo htmlspecialchars($_GET["error"]); ?></div>
    <?php endif; ?>

    <a href="user_add.php" class="btnAdd btn">+ Add New User</a>

    <div class="card tableWrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($row["user_full_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["user_email"]); ?></td>
                    <td><a href="user_edit.php?id=<?php echo $row["user_id"]; ?>" class="btn btnEdit">Edit</a></td>
                    <td><a href="user_delete.php?id=<?php echo $row["user_id"]; ?>" class="btn btnDel" onclick="return confirm('Delete this user?')">Delete</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
