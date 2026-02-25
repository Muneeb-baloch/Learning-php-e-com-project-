<?php
include("db.php"); 

?>


 <form method="POST" action="login_process.php">
            
        
           
                <label>Email:</label>
                <input type="email" name="u_email">
           
            
           
                <label>Password:</label>
                <input type="password" name="u_password">
           
            
           
                <button type="submit" name="submitNow">Login</button>
           
        </form>