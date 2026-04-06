<?php
date_default_timezone_set('Asia/Jakarta');
$conn = mysqli_connect("localhost", "root", "", "portal_berita");
mysqli_query($conn, "SET time_zone = '+07:00'");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>