<?php
include __DIR__ . '/../koneksi.php';
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
$aktif = $_GET['kategori'] ?? '';
?>

<div class="navbar-main">
<div class="container">
    <h4>📰 Portal Berita</h4>
</div>
</div>

<div class="kategori-bar">
<div class="container kategori-container">

<a href="index.php" class="kategori-item <?= ($aktif=='')?'active':'' ?>">
All
</a>

<?php while($k = mysqli_fetch_assoc($kategori)) { ?>
<a href="index.php?kategori=<?= $k['id_kategori']; ?>"
class="kategori-item <?= ($aktif==$k['id_kategori'])?'active':'' ?>">
<?= $k['nama_kategori']; ?>
</a>
<?php } ?>

</div>
</div>