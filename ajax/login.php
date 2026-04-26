<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container form-narrow">

    <div class="tabs">
        <a href="login.php" class="active">Ajax Login</a>
        <a href="login_normal.php">Normal Login</a>
    </div>

    <div class="card">
        <div class="header">
            <h1>Login</h1>
        </div>

        <div id="msg" class="msg"></div>

        <form id="loginForm">
            <div class="row">
                <label>Email:</label>
                <input type="email" id="u_email" placeholder="Enter your email" required>
            </div>
            <div class="row">
                <label>Password:</label>
                <input type="password" id="u_password" placeholder="Enter your password" required>
            </div>
            <div class="actions">
                <button type="submit">Login</button>
            </div>
            <div class="spinner" id="spinner">Logging in...</div>
        </form>

        <p style="text-align:center; margin-top:18px; font-size:14px; color:#666;">
            Don't have an account? <a href="signup.php" style="color:#4a90e2; font-weight:600;">Sign Up</a>
        </p>
    </div>
</div>

<script>
document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const email    = document.getElementById("u_email").value.trim();
    const password = document.getElementById("u_password").value.trim();
    const spinner  = document.getElementById("spinner");

    spinner.style.display = "block";

    const fd = new FormData();
    fd.append("u_email", email);
    fd.append("u_password", password);

    fetch("login_process.php", { method: "POST", body: fd })
        .then(res => res.json())
        .then(data => {
            spinner.style.display = "none";
            showMsg(data.message, data.status);
            if (data.status === "success") {
                setTimeout(() => window.location.href = "dashboard.php", 1000);
            }
        });
});

function showMsg(text, type) {
    const msg = document.getElementById("msg");
    msg.textContent = text;
    msg.className = "msg msg-" + (type === "success" ? "success" : "error");
    msg.style.display = "block";
}
</script>

</body>
</html>
