<?php

session_start();
include("db.php"); 


if(isset($_POST["submitNow"])){
    $useremail = $_POST["u_email"];
    $userpassword = $_POST["u_password"];

    $qry = "SELECT * FROM tbl_user_registration WHERE user_email='$useremail' AND user_password='$userpassword';";

    $result = mysqli_query($conn, $qry);

    if(mysqli_num_rows($result) > 0)
        
        
        
        
        {
        echo "Login Successful";
    } else {
        
        echo "Invalid Email or Password";
    }
}

?>

