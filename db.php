<?php
$host="localhost";
$user="root";
$pass="";
$db="ecom_project";
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    echo "connection failed";
    die("Database connection failed: " . mysqli_connect_error());
}
else
    {
        echo "connection successful";
    
    }
	
	// $query="SELECT * FROM user_registration";
  //   $result=mysqli_query($conn,$query);
  //   while($row=mysqli_fetch_assoc($result)){
  //       echo $row["user_id"]."<br>";
  //       echo $row["user_fullname"]."<br>";
  //       echo $row["user_email"]."<br>";
  //   }
    
?>