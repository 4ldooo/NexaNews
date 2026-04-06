<?php
include '../koneksi.php';

// SET TIMEZONE (biar aman)
date_default_timezone_set('Asia/Jakarta');

// AMBIL DATA
$judul     = $_POST['judul'];
$isi       = $_POST['isi'];
$kategori  = $_POST['kategori'];

// UPLOAD GAMBAR
$gambar = $_FILES['gambar']['name'];
$tmp    = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp, "../assets/img/".$gambar);

// QUERY INSERT (PAKAI NOW() 🔥)
$query = "
INSERT INTO artikel 
(judul, isi, gambar, id_kategori, tanggal, views)
VALUES 
('$judul','$isi','$gambar','$kategori', NOW(), 0)
";

// EKSEKUSI + DEBUG
$result = mysqli_query($conn, $query);

if(!$result){
    die("ERROR INSERT: " . mysqli_error($conn));
} else {
    header("Location: dashboard.php");
    exit;
}