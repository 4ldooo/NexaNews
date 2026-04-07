<?php
include '../koneksi.php';
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../admin/login.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM admin WHERE id_admin='$id'");

echo "<script>
alert('User berhasil dihapus!');
window.location='user.php';
</script>";