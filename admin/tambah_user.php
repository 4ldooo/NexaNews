<?php
include '../koneksi.php';
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../admin/login.php");
    exit;
}

if(isset($_POST['simpan'])){
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    mysqli_query($conn, "
    INSERT INTO admin(username,password,role)
    VALUES('$user','$pass','$role')
    ");

    echo "<script>
    alert('User berhasil ditambahkan!');
    window.location='user.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah User</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #0f172a;
    color: #f8fafc;
    font-family: 'Segoe UI', sans-serif;
}

.card-modern {
    background: #1e293b;
    border-radius: 15px;
    padding: 30px;
    max-width: 450px;
    margin: 80px auto;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

.form-control {
    background: #020617;
    border: 1px solid #334155;
    color: white;
}

.form-control:focus {
    border-color: #f59e0b;
    box-shadow: none;
}

.btn-custom {
    background: #f59e0b;
    border: none;
    color: black;
    font-weight: 500;
}

.btn-custom:hover {
    background: #d97706;
}

.btn-back {
    background: #334155;
    border: none;
    color: white;
}
</style>

</head>

<body>

<div class="card-modern">

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>👤 Tambah User</h4>
    <button onclick="history.back()" class="btn btn-back btn-sm">
        ← Kembali
    </button>
</div>

<form method="POST">

<div class="mb-3">
    <label>Username</label>
    <input name="username" class="form-control" placeholder="Masukkan username" required>
</div>

<div class="mb-3 position-relative">
    <label>Password</label>
    <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan password" required>

    <span onclick="togglePassword()" 
    style="position:absolute; right:15px; top:31px; cursor:pointer;">
        👁️
    </span>
</div>

<div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-control">
        <option value="admin">Admin</option>
        <option value="editor">Editor</option>
    </select>
</div>

<button name="simpan" class="btn btn-custom w-100">
    💾 Simpan User
</button>

</form>

</div>

<script>
function togglePassword() {
    const pw = document.getElementById("password");

    if (pw.type === "password") {
        pw.type = "text";
    } else {
        pw.type = "password";
    }
}
</script>

</body>
</html>