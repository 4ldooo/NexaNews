<?php
include '../koneksi.php';

$id = $_GET['id'];
$today = date('Y-m-d');

// update total views
mysqli_query($conn, "UPDATE artikel SET views = views + 1 WHERE id_artikel='$id'");

// simpan log harian
mysqli_query($conn, "
INSERT INTO views_log (id_artikel, tanggal)
VALUES ('$id', '$today')
");

// TAMBAH VIEWS
mysqli_query($conn, "UPDATE artikel SET views = views + 1 WHERE id_artikel='$id'");

// AMBIL DATA
$data = mysqli_query($conn, "
SELECT artikel.*, kategori.nama_kategori
FROM artikel
JOIN kategori ON artikel.id_kategori = kategori.id_kategori
WHERE artikel.id_artikel='$id'
");

$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $d['judul']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* BODY */
body {
    background: #0f172a;
    color: #f8fafc;
    font-family: 'Segoe UI', sans-serif;
}

/* NAVBAR */
.navbar {
    background: #020617;
    padding: 16px 20px;
    border-bottom: 1px solid #1e293b;
}

.navbar h4 {
    margin: 0;
    color: #f59e0b;
}

/* CONTENT */
.container {
    max-width: 900px;
}

/* TITLE */
.judul {
    font-size: 30px;
    font-weight: 700;
}

/* META */
.meta {
    color: #94a3b8;
    font-size: 14px;
}

/* IMAGE */
.img-artikel {
    width: 100%;
    border-radius: 15px;
    margin: 15px 0;
}

/* ISI */
.isi {
    line-height: 1.8;
    color: #e2e8f0;
    font-size: 16px;
}

/* BUTTON */
.btn-back {
    background: #334155;
    color: white;
    border: none;
}

.btn-back:hover {
    background: #475569;
}

/* FOOTER */
.footer {
    margin-top: 50px;
    padding: 20px;
    text-align: center;
    color: #94a3b8;
}

.isi p {
    margin-bottom: 15px;
}

hr {
    border-color: #334155;
}

</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <h4>📰 Portal Berita</h4>
</div>

<div class="container mt-4">

<!-- BACK BUTTON -->
<button onclick="history.back()" class="btn btn-back mb-3">← Kembali</button>

<!-- JUDUL -->
<h1 class="judul"><?php echo $d['judul']; ?></h1>

<!-- META -->
<p class="meta">
    📂 <?php echo $d['nama_kategori']; ?> |
    👁 <?php echo $d['views']; ?> views
</p>

<!-- GAMBAR -->
<img src="../assets/img/<?php echo $d['gambar']; ?>" class="img-artikel">

<!-- ISI -->
<div class="isi">
<?php echo nl2br($d['isi']); ?>
</div>

</div>

<!-- FOOTER -->
<div class="footer">
    <small>© 2026 Portal Berita | By Aldo</small>
</div>

</body>
</html>