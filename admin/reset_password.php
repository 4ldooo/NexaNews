<?php
include '../koneksi.php';
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../admin/login.php");
    exit;
}

$id = $_GET['id'];

if(isset($_POST['reset'])){
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn, "
    UPDATE admin SET password='$pass'
    WHERE id_admin='$id'
    ");

    echo "<script>
    alert('Password berhasil direset!');
    window.location='user.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
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
    <h4>🔒 Reset Password</h4>
    <button onclick="history.back()" class="btn btn-back btn-sm">
        ← Kembali
    </button>
</div>

<form method="POST">

<div class="mb-3 position-relative">
    <label>Password Baru</label>
    <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan password baru" required>

    <span onclick="togglePassword()" 
    style="position:absolute; right:15px; top:31px; cursor:pointer;">
        👁️
    </span>
</div>

<button name="reset" class="btn btn-custom w-100">
    🔄 Reset Password
</button>

</form>

</div>

<script>
function togglePassword(){
    const pw = document.getElementById("password");
    pw.type = (pw.type === "password") ? "text" : "password";
}
</script>

</body>
</html>