<head>
    <link rel="stylesheet" href="style.css">
</head>


<div class="container form-narrow">
    <div class="card">
        <div class="header">
            <h1>Login</h1>
        </div>

        <form method="POST" action="login_process_session.php">
            <div class="row">
                <label>Email:</label>
                <input type="email" name="u_email" required>
            </div>
            
            <div class="row">
                <label>Password:</label>
                <input type="password" name="u_password" required>
            </div>
            
            <div class="actions">
                <button type="submit" name="submitNow">Login</button>
            </div>
        </form>
    </div>
</div>