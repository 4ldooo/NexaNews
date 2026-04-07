<?php
include '../koneksi.php';
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../admin/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Kategori</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h3>+ Tambah Kategori</h3>

<form method="POST">

<div class="mb-3">
<label>Nama Kategori</label>
<input type="text" name="nama" class="form-control" required>
</div>

<button type="submit" name="simpan" class="btn btn-success">Simpan</button>

</form>

<?php
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];

    mysqli_query($conn, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");

    echo "<script>alert('Berhasil ditambahkan');window.location='kategori.php';</script>";
}
?>

</div>

</body>
</html>