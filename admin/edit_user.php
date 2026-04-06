<?php
include '../koneksi.php';
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE id_admin='$id'"));

if(isset($_POST['update'])){
    $user = $_POST['username'];
    $role = $_POST['role'];

    mysqli_query($conn, "
    UPDATE admin SET username='$user', role='$role'
    WHERE id_admin='$id'
    ");

    echo "<script>
    alert('User berhasil diupdate!');
    window.location='user.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>
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
    <h4>✏️ Edit User</h4>
    <button onclick="history.back()" class="btn btn-back btn-sm">
        ← Kembali
    </button>
</div>

<form method="POST">

<div class="mb-3">
    <label>Username</label>
    <input name="username" value="<?= $data['username']; ?>" class="form-control" required>
</div>

<div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-control">
        <option value="admin" <?= $data['role']=='admin'?'selected':'' ?>>Admin</option>
        <option value="editor" <?= $data['role']=='editor'?'selected':'' ?>>Editor</option>
    </select>
</div>

<button name="update" class="btn btn-custom w-100">
    💾 Update User
</button>

</form>

</div>

</body>
</html>