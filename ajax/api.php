<?php
include("db.php");
header("Content-Type: application/json");

$action = isset($_GET["action"]) ? $_GET["action"] : (isset($_POST["action"]) ? $_POST["action"] : "");

switch ($action) {

    // READ - get all users
    case "read":
        $qry    = "SELECT user_id, user_full_name, user_email, user_password FROM tbl_user_registration ORDER BY user_id DESC";
        $result = mysqli_query($conn, $qry);
        $users  = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        echo json_encode($users);
        break;

    // CREATE - add new user
    case "create":
        $name     = mysqli_real_escape_string($conn, $_POST["u_fullname"]);
        $email    = mysqli_real_escape_string($conn, $_POST["u_email"]);
        $password = mysqli_real_escape_string($conn, $_POST["u_password"]);

        $qry    = "INSERT INTO tbl_user_registration (user_full_name, user_email, user_password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($conn, $qry);

        if ($result) {
            echo json_encode(["status" => "success", "message" => "User added successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to add user."]);
        }
        break;

    // UPDATE - edit user
    case "update":
        $id       = (int) $_POST["user_id"];
        $name     = mysqli_real_escape_string($conn, $_POST["u_fullname"]);
        $email    = mysqli_real_escape_string($conn, $_POST["u_email"]);
        $password = mysqli_real_escape_string($conn, $_POST["u_password"]);

        $qry    = "UPDATE tbl_user_registration SET user_full_name='$name', user_email='$email', user_password='$password' WHERE user_id=$id";
        $result = mysqli_query($conn, $qry);

        if ($result) {
            echo json_encode(["status" => "success", "message" => "User updated successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update user."]);
        }
        break;

    // DELETE - remove user
    case "delete":
        $id     = (int) $_POST["user_id"];
        $qry    = "DELETE FROM tbl_user_registration WHERE user_id=$id";
        $result = mysqli_query($conn, $qry);

        if ($result) {
            echo json_encode(["status" => "success", "message" => "User deleted successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to delete user."]);
        }
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Invalid action."]);
        break;
}
?>
