<?php
include("db.php");


$qry = "SELECT * FROM tbl_user_registration;";
$result = mysqli_query($conn, $qry);


?>


<h1> user List </h1>
<table border=1>
    <tr>
        <th> User ID </th>
        <th> User Full Name </th>
        <th> User Email </th>
        <th>  Update     </th>
    </tr>

    

   
<?php
    while($row = mysqli_fetch_assoc($result)){ 
        
        $userId = $row["user_id"];
        $userFullName = $row["user_full_name"];
        $userEmail = $row["user_email"];

        
        
        ?>

     <tr>
        <th><?php echo $userId ?> </th>
        <th><?php echo $userFullName ?> </th>
        <th><?php echo $userEmail  ?> </th>
        <td> 
        <a href="update.php?user_id=<?php echo $userId ?>"> Edit </a>
    </td>
      
    </tr>

    
        
    <?php
    }?>

    </table>

