<?php
include 'koneksi.php';

$search = $_GET['search'] ?? '';
$id_kat = $_GET['kategori'] ?? '';

// kategori
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

// WHERE DINAMIS
$where = "WHERE 1=1";

if($search != ''){
    $where .= " AND artikel.judul LIKE '%$search%'";
}

if($id_kat != ''){
    $where .= " AND artikel.id_kategori = '$id_kat'";
}

// HERO
$hero = mysqli_query($conn, "
SELECT artikel.*, kategori.nama_kategori
FROM artikel
JOIN kategori ON artikel.id_kategori = kategori.id_kategori
$where
ORDER BY artikel.tanggal DESC
LIMIT 3
");

// TRENDING
$trending = mysqli_query($conn, "
SELECT artikel.*, kategori.nama_kategori
FROM artikel
JOIN kategori ON artikel.id_kategori = kategori.id_kategori
ORDER BY artikel.views DESC
LIMIT 5
");

// LIST
$data = mysqli_query($conn, "
SELECT artikel.*, kategori.nama_kategori
FROM artikel
JOIN kategori ON artikel.id_kategori = kategori.id_kategori
$where
ORDER BY artikel.tanggal DESC
LIMIT 6
");

// TOTAL
$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>NexaNews</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#0f172a;
    color:white;
    font-family:'Segoe UI';
}

/* NAVBAR */
.navbar{
    background:#020617;
    padding:16px;
    border-bottom:1px solid #1e293b;
}
.navbar h4{
    color:#f59e0b;
}

/* KATEGORI */
.kategori-menu{
    display:flex;
    gap:10px;
    padding:12px;
    background:#020617;
    overflow-x:auto;
}
.kategori-menu a{
    color:#cbd5e1;
    padding:6px 12px;
    border-radius:20px;
    text-decoration:none;
}
.kategori-menu a.active,
.kategori-menu a:hover{
    background:#f59e0b;
    color:black;
}

/* SEARCH */
.input-group input{
    background:#020617;
    color:white;
    border:1px solid #334155;
}
.input-group input:focus{
    border-color:#f59e0b;
}

/* HERO */
.hero-wrapper{
    position:relative;
    border-radius:15px;
    overflow:hidden;
}
.hero-wrapper img{
    width:100%;
    height:400px;
    object-fit:cover;
}
.hero-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(to top,rgba(0,0,0,.9),rgba(0,0,0,.3));
}
.hero-content{
    position:absolute;
    bottom:20px;
    left:20px;
    right:20px;
}
.hero-content h2{
    color:white;
    font-weight:700;
}
.hero-content p{
    color:#e2e8f0;
}

/* CARD */
.card{
    background:#1e293b;
    border:none;
    border-radius:15px;
    overflow:hidden;
}
.card img{
    height:200px;
    object-fit:cover;
}
.card h5{
    color:white;
    font-weight:600;
}
.card p{
    color:#cbd5e1;
}

/* BADGE */
.badge{
    background:#f59e0b;
    color:black;
}

/* BUTTON */
.btn-read{
    background:#f59e0b;
    border:none;
}

/* TRENDING */
.trending-item{
    border-bottom:1px solid #334155;
    padding:10px 0;
}
.trending-item a{
    color:white;
    text-decoration:none;
}
.trending-item a:hover{
    color:#f59e0b;
}

/* EMPTY */
.empty{
    background:#1e293b;
    padding:40px;
    text-align:center;
    border-radius:10px;
    color:#94a3b8;
}

</style>

</head>
<body>

<div class="navbar">
    <h4>📰 NexaNews</h4>
</div>

<div class="container-fluid px-4 mt-3">

<!-- KATEGORI -->
<div class="kategori-menu">
<a href="index.php" class="<?= $id_kat==''?'active':'' ?>">Semua</a>

<?php while($k=mysqli_fetch_assoc($kategori)){ ?>
<a href="?kategori=<?= $k['id_kategori'] ?>"
class="<?= $id_kat==$k['id_kategori']?'active':'' ?>">
<?= $k['nama_kategori'] ?>
</a>
<?php } ?>
</div>

<!-- SEARCH -->
<form method="GET" class="my-3">
<div class="input-group">
<input type="text" name="search" placeholder="Cari berita..."
value="<?= $search ?>" class="form-control">
<button class="btn btn-warning">🔎</button>
</div>
</form>

<div class="row">

<!-- HERO -->
<div class="col-md-8">

<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">

<div class="carousel-inner">

<?php $active=true; while($h=mysqli_fetch_assoc($hero)){ ?>
<div class="carousel-item <?= $active?'active':'' ?>">

<div class="hero-wrapper">
<img src="assets/img/<?= $h['gambar'] ?>">

<div class="hero-overlay"></div>

<div class="hero-content">
<span class="badge"><?= $h['nama_kategori'] ?></span>

<h2><?= $h['judul'] ?></h2>

<p><?= substr($h['isi'],0,120) ?>...</p>

<a href="pages/detail.php?id=<?= $h['id_artikel'] ?>" class="btn btn-read">
Baca
</a>
</div>

</div>

</div>
<?php $active=false; } ?>

</div>

</div>

</div>

<!-- TRENDING -->
<div class="col-md-4">
<h5>🔥 Trending</h5>

<?php while($t=mysqli_fetch_assoc($trending)){ ?>
<div class="trending-item">
<a href="pages/detail.php?id=<?= $t['id_artikel'] ?>">
<?= $t['judul'] ?>
</a>
<br>
<small>👁 <?= $t['views'] ?> views</small>
</div>
<?php } ?>

</div>

</div>

<!-- LIST -->
<div class="row mt-4">

<?php if($total == 0 && $search != ''){ ?>

<div class="empty">
😢 Tidak ada hasil untuk <b>"<?= htmlspecialchars($search) ?>"</b>
</div>

<?php } ?>

<?php while($d=mysqli_fetch_assoc($data)){ ?>
<div class="col-md-4 mb-4">
<div class="card h-100">

<img src="assets/img/<?= $d['gambar'] ?>">

<div class="card-body">

<span class="badge"><?= $d['nama_kategori'] ?></span>

<h5 class="mt-2"><?= $d['judul'] ?></h5>

<p><?= substr($d['isi'],0,100) ?>...</p>

<a href="pages/detail.php?id=<?= $d['id_artikel'] ?>" class="btn btn-read btn-sm">
Baca
</a>

</div>

</div>
</div>
<?php } ?>

</div>

</div>

<div class="text-center mt-5 mb-3">
<?php include 'includes/footer-u.php'; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>