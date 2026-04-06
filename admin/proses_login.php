<?php
session_start();
include '../koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$data = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user'");
$d = mysqli_fetch_assoc($data);

if($d && password_verify($pass, $d['password'])){

    $_SESSION['login'] = true;
    $_SESSION['id_admin'] = $d['id_admin'];
    $_SESSION['username'] = $d['username'];
    $_SESSION['role'] = $d['role'];

    echo "<script>
    alert('Login berhasil!');
    window.location='../admin/dashboard.php';
    </script>";

}else{
    echo "<script>
    alert('Username atau password salah!');
    window.location='../admin/login.php';
    </script>";
}