<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Normal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container form-narrow">

    <div class="tabs">
        <a href="login.php">Ajax Login</a>
        <a href="login_normal.php" class="active">Normal Login</a>
    </div>

    <div class="card">
        <div class="header">
            <h1>Login</h1>
        </div>

        <?php if (isset($_GET["error"])): ?>
            <div class="msg msg-error" style="display:block;">Invalid email or password.</div>
        <?php endif; ?>

        <form method="POST" action="login_process_normal.php">
            <div class="row">
                <label>Email:</label>
                <input type="email" name="u_email" placeholder="Enter your email" required>
            </div>
            <div class="row">
                <label>Password:</label>
                <input type="password" name="u_password" placeholder="Enter your password" required>
            </div>
            <div class="actions">
                <button type="submit" name="submitNow">Login</button>
            </div>
        </form>

        <p style="text-align:center; margin-top:18px; font-size:14px; color:#666;">
            Don't have an account? <a href="signup.php" style="color:#4a90e2; font-weight:600;">Sign Up</a>
        </p>
    </div>
</div>

</body>
</html>
