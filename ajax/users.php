<?php session_start(); if (!isset($_SESSION["user_id"])) { header("Location: login.php"); exit(); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users - Ajax CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <a href="dashboard.php" class="navbar-brand">User<span>Panel</span></a>
    <div class="navbar-right">
        <span class="navbar-user">👤 <?php echo $_SESSION["user_email"]; ?></span>
        <a href="logout.php" class="nav-logout">Logout</a>
    </div>
</nav>

<div class="page-wrap">

    <div class="page-topbar">
        <h1>Users <span>⚡ Ajax (no page reload)</span></h1>
        <div class="topbar-actions">
            <a href="users_normal.php" class="btn" style="background:#6c757d;color:#fff;">Switch to Normal</a>
            <a href="dashboard.php" class="btn" style="background:#2c3e50;color:#fff;">Dashboard</a>
        </div>
    </div>

    <div id="msg" class="msg"></div>

    <button class="btnAdd btn" onclick="openAddModal()">+ Add New User</button>

    <div class="card tableWrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <tr><td colspan="5" style="text-align:center;padding:20px;color:#aaa;">Loading...</td></tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal-overlay" id="addModal">
    <div class="modal">
        <button class="modal-close" onclick="closeModal('addModal')">&times;</button>
        <h2>Add New User</h2>
        <div class="row"><label>Full Name:</label><input type="text" id="add_name" placeholder="Enter full name"></div>
        <div class="row"><label>Email:</label><input type="email" id="add_email" placeholder="Enter email"></div>
        <div class="row"><label>Password:</label><input type="password" id="add_password" placeholder="Enter password"></div>
        <div class="actions"><button onclick="addUser()">Add User</button></div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal-overlay" id="editModal">
    <div class="modal">
        <button class="modal-close" onclick="closeModal('editModal')">&times;</button>
        <h2>Edit User</h2>
        <input type="hidden" id="edit_id">
        <div class="row"><label>Full Name:</label><input type="text" id="edit_name"></div>
        <div class="row"><label>Email:</label><input type="email" id="edit_email"></div>
        <div class="row"><label>Password:</label><input type="password" id="edit_password"></div>
        <div class="actions"><button onclick="updateUser()">Update User</button></div>
    </div>
</div>

<script>
loadUsers();

function loadUsers() {
    fetch("api.php?action=read")
        .then(res => res.json())
        .then(data => {
            const tbody = document.getElementById("userTableBody");
            if (data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" style="text-align:center;padding:20px;color:#aaa;">No users found.</td></tr>';
                return;
            }
            tbody.innerHTML = data.map((u, i) => `
                <tr>
                    <td>${i + 1}</td>
                    <td>${u.user_full_name}</td>
                    <td>${u.user_email}</td>
                    <td><button class="btn btnEdit" onclick="openEditModal(${u.user_id}, '${u.user_full_name}', '${u.user_email}', '${u.user_password}')">Edit</button></td>
                    <td><button class="btn btnDel" onclick="deleteUser(${u.user_id})">Delete</button></td>
                </tr>
            `).join("");
        });
}

function openAddModal() {
    document.getElementById("add_name").value = "";
    document.getElementById("add_email").value = "";
    document.getElementById("add_password").value = "";
    document.getElementById("addModal").classList.add("show");
}

function addUser() {
    const name = document.getElementById("add_name").value.trim();
    const email = document.getElementById("add_email").value.trim();
    const password = document.getElementById("add_password").value.trim();
    if (!name || !email || !password) { showMsg("Please fill all fields.", "error"); return; }
    const fd = new FormData();
    fd.append("action", "create"); fd.append("u_fullname", name);
    fd.append("u_email", email); fd.append("u_password", password);
    fetch("api.php", { method: "POST", body: fd })
        .then(res => res.json())
        .then(data => { closeModal("addModal"); showMsg(data.message, data.status); if (data.status === "success") loadUsers(); });
}

function openEditModal(id, name, email, password) {
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_name").value = name;
    document.getElementById("edit_email").value = email;
    document.getElementById("edit_password").value = password;
    document.getElementById("editModal").classList.add("show");
}

function updateUser() {
    const id = document.getElementById("edit_id").value;
    const name = document.getElementById("edit_name").value.trim();
    const email = document.getElementById("edit_email").value.trim();
    const password = document.getElementById("edit_password").value.trim();
    if (!name || !email || !password) { showMsg("Please fill all fields.", "error"); return; }
    const fd = new FormData();
    fd.append("action", "update"); fd.append("user_id", id);
    fd.append("u_fullname", name); fd.append("u_email", email); fd.append("u_password", password);
    fetch("api.php", { method: "POST", body: fd })
        .then(res => res.json())
        .then(data => { closeModal("editModal"); showMsg(data.message, data.status); if (data.status === "success") loadUsers(); });
}

function deleteUser(id) {
    if (!confirm("Are you sure you want to delete this user?")) return;
    const fd = new FormData();
    fd.append("action", "delete"); fd.append("user_id", id);
    fetch("api.php", { method: "POST", body: fd })
        .then(res => res.json())
        .then(data => { showMsg(data.message, data.status); if (data.status === "success") loadUsers(); });
}

function closeModal(id) { document.getElementById(id).classList.remove("show"); }

function showMsg(text, type) {
    const msg = document.getElementById("msg");
    msg.textContent = text;
    msg.className = "msg msg-" + (type === "success" ? "success" : "error");
    msg.style.display = "block";
    setTimeout(() => msg.style.display = "none", 3000);
}
</script>

</body>
</html>
