<?php
include '../koneksi.php';
include 'layout/header.php';
include 'layout/sidebar.php';

if(!isset($_SESSION['login'])){
    header("Location: ../admin/login.php");
    exit;
}

// TAMBAH KATEGORI
if(isset($_POST['tambah'])){
    $nama = htmlspecialchars($_POST['nama']);

    if($nama != ''){
        mysqli_query($conn, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");
        echo "<script>alert('Kategori berhasil ditambahkan!');window.location='kategori.php';</script>";
    }
}

// SEARCH
$search = $_GET['search'] ?? '';

$data = mysqli_query($conn, "
SELECT * FROM kategori
WHERE nama_kategori LIKE '%$search%'
");
?>

<style>
    .card-modern {
    background: #1e293b;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

.btn-warning {
    background: #f59e0b;
    border: none;
}
</style>

<div class="content">

<h3 class="mb-4">📂 Kelola Kategori</h3>

<!-- FORM TAMBAH -->
<div class="card-modern p-4 mb-4">
<h5>➕ Tambah Kategori</h5>

<form method="POST" class="row g-2 mt-2">
<div class="col-md-9">
<input type="text" name="nama" class="form-control" placeholder="Masukkan nama kategori..." required>
</div>

<div class="col-md-3">
<button type="submit" name="tambah" class="btn btn-warning w-100">
Tambah
</button>
</div>
</form>

</div>

<!-- SEARCH -->
<form method="GET" class="mb-3">
<input type="text" name="search" placeholder="Cari kategori..." class="form-control">
</form>

<!-- TABLE -->
<div class="card-modern p-3">

<table class="table table-dark table-hover align-middle">
<thead>
<tr>
<th>No</th>
<th>Nama Kategori</th>
<th width="200">Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; while($d=mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?= $no++; ?></td>

<td>
<span class="badge bg-warning text-dark px-3 py-2">
<?= $d['nama_kategori']; ?>
</span>
</td>

<td>
<a href="edit_kategori.php?id=<?= $d['id_kategori']; ?>" class="btn btn-sm btn-primary">Edit</a>

<a href="hapus_kategori.php?id=<?= $d['id_kategori']; ?>" 
class="btn btn-sm btn-danger"
onclick="return confirm('Yakin mau hapus?')">
Hapus
</a>
</td>

</tr>
<?php } ?>
</tbody>

</table>

</div>

</div>

<?php include 'layout/footer.php'; ?>