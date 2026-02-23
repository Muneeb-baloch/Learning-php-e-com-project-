<?php
include("db.php");


if(!isset($_GET["user_id"])){

die("user ID not Found");
}
$userid = $_GET["user_id"];

$qry = "SELECT * FROM tbl_user_registration WHERE user_id = $userid;";
$result = mysqli_query($conn, $qry);

$user = mysqli_fetch_assoc($result);


if(!$user){
    die("user not Found");
}

    $username = $user["user_full_name"];
$useremail = $user["user_email"];      
$userpassword = $user["user_password"];


if(isset($_POST["updateBTN"])){
    $username = $_POST["u_fullname"];
    $useremail = $_POST["u_email"];
    $userpassword = $_POST["u_password"];

    $updateQry = "UPDATE tbl_user_registration 
    SET user_full_name='$username', 
    user_email='$useremail',
     user_password='$userpassword'
    WHERE user_id=$userid;";


$upddaResult = mysqli_query($conn, $updateQry);

if($upddaResult){
    echo "User Updated Successfully";
    header("Location: user.php");
    exit();


}

else {
    echo "Error Updating User: " . mysqli_error($conn);
}




    if(mysqli_query($conn, $updateQry)){
        echo "User Updated Successfully";
        
    }else{
        echo "Error Updating User: " . mysqli_error($conn);
    }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Password</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <form method="POST" action="">
        Full Name:<br>
        <input type="text" name="u_fullname"  value = <?php echo $user["user_full_name"] ?> ><br>
        
        Email:<br>
        <input type="email" name="u_email" value = <?php echo $user["user_email"] ?>    ><br>
        
        Password:<br>
        <input type="password" name="u_password"value = <?php echo $user["user_password"] ?> ><br>
        
        <input type="submit" name="updateBTN" value="Update"> 
    </form>
</body>
</html>