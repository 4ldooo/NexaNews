<?php
session_start();
?>

<div class="sidebar">
<h4>📰 Kelola Berita</h4>


<?php if($_SESSION['role'] == 'admin'){ ?>
<a href="user.php">👤 Kelola Admin</a>
<?php } ?>
<a href="dashboard.php">🏠 Dashboard</a>
<a href="artikel.php">📰 Artikel</a>
<a href="kategori.php">📂 Kategori</a>

<hr style="border-color:#334155;">

<a href="../index.php" target="_blank">🌐 Lihat Website</a>

<a href="../admin/logout.php">🚪 Logout</a>
</div>