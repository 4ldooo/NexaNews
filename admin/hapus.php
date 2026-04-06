<?php
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM artikel WHERE id_artikel='$id'");

echo "<script>
alert('Artikel berhasil dihapus!');
window.location='artikel.php';
</script>";