<?php
include '../koneksi.php';
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../admin/login.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori='$id'");

header("location:kategori.php");