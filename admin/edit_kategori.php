<?php
include '../koneksi.php';

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Kategori</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h3>✏️ Edit Kategori</h3>

<form method="POST">

<input type="hidden" name="id" value="<?= $d['id_kategori']; ?>">

<div class="mb-3">
<label>Nama Kategori</label>
<input type="text" name="nama" value="<?= $d['nama_kategori']; ?>" class="form-control" required>
</div>

<button type="submit" name="update" class="btn btn-primary">Update</button>
<button onclick="history.back()" class="btn btn-secondary">Kembali</button>

</form>

<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    mysqli_query($conn, "UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori='$id'");

    echo "<script>alert('Kategori berhasil diupdate');window.location='kategori.php';</script>";
}
?>

</div>

</body>
</html>