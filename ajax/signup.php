<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container form-narrow">
    <div class="card">
        <div class="header">
            <h1>Create Account</h1>
        </div>

        <div id="msg" class="msg"></div>

        <form id="signupForm">
            <div class="row">
                <label>Full Name:</label>
                <input type="text" id="u_fullname" placeholder="Enter your full name" required>
            </div>
            <div class="row">
                <label>Email:</label>
                <input type="email" id="u_email" placeholder="Enter your email" required>
            </div>
            <div class="row">
                <label>Password:</label>
                <input type="password" id="u_password" placeholder="Create a password" required>
            </div>
            <div class="actions">
                <button type="submit">Sign Up</button>
            </div>
        </form>

        <p style="text-align:center; margin-top:18px; font-size:14px; color:#666;">
            Already have an account? <a href="login.php" style="color:#4a90e2; font-weight:600;">Login</a>
        </p>
    </div>
</div>

<script>
document.getElementById("signupForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const name     = document.getElementById("u_fullname").value.trim();
    const email    = document.getElementById("u_email").value.trim();
    const password = document.getElementById("u_password").value.trim();
    const msg      = document.getElementById("msg");

    if (!name || !email || !password) {
        showMsg("Please fill all fields.", "error");
        return;
    }

    const fd = new FormData();
    fd.append("u_fullname", name);
    fd.append("u_email", email);
    fd.append("u_password", password);

    fetch("signup_process.php", { method: "POST", body: fd })
        .then(res => res.json())
        .then(data => {
            showMsg(data.message, data.status);
            if (data.status === "success") {
                setTimeout(() => window.location.href = "login.php", 1500);
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
