<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    
    <div class="card">
        
        <div class="header">
            <h1>Registration</h1>
        </div>  
        
        <form method="POST" action="register_post.php">
            
            <div class="row">
                <label>Full Name:</label>
                <input type="text" name="u_fullname">
            </div>
            
            <div class="row">
                <label>Email:</label>
                <input type="email" name="u_email">
            </div>
            
            <div class="row">
                <label>Password:</label>
                <input type="password" name="u_password">
            </div>
            
            <div class="actions">
                <button type="submit" name="submitNow">Register Now</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>