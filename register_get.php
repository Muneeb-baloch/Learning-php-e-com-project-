<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        
        <div class="card">
            
            <div class="header">
                <h1>Registration</h1>
            </div>

            <form method="POST" action="result_post.php">
                
                <div class="row">
                    <label>Full Name:</label>
                    <input type="text" name="u_fullname" required>
                </div>
                
                <div class="row">
                    <label>Email:</label>
                    <input type="email" name="u_email" required>
                </div>
                
                <div class="row">
                    <label>Password:</label>
                    <input type="password" name="u_password" required>
                </div>
                
                <div class="actions">
                    <button type="submit" name="submitNow">Register Now</button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>