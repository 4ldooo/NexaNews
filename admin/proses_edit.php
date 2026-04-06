<?php
include '../koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];

$gambar = $_FILES['gambar']['name'];

if($gambar != ""){
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/img/".$gambar);

    mysqli_query($conn, "UPDATE artikel SET judul='$judul', isi='$isi', gambar='$gambar' WHERE id_artikel='$id'");
}else{
    mysqli_query($conn, "UPDATE artikel SET judul='$judul', isi='$isi' WHERE id_artikel='$id'");
}

header("Location: dashboard.php");