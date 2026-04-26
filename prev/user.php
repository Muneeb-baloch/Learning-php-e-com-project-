<?php
include("db.php");

$qry = "SELECT * FROM tbl_user_registration;";
$result = mysqli_query($conn, $qry);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>User List</h1>
    </div>

    <div class="card tableWrap">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row = mysqli_fetch_assoc($result)) { 
                    $userId = $row["user_id"];
                ?>
                <tr>
                    <td><?php echo $userId; ?></td>
                    <td><?php echo $row["user_full_name"]; ?></td>
                    <td><?php echo $row["user_email"]; ?></td>
                    <td> 
                        <a href="update.php?user_id=<?php echo $userId; ?>" class="btn btnEdit">Edit</a>
                    </td>
                    <td> 
                        <a href="delete.php?userDlt_id=<?php echo $userId; ?>" class="btn btnDel">Delete</a>
                    </td>
                </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>