<?php
include '../koneksi.php';
include 'layout/header.php';
include 'layout/sidebar.php';

if(!isset($_SESSION['login'])){
    header("Location: ../admin/login.php");
    exit;
}

// 🔥 QUERY (SORT BY VIEWS TERBANYAK)
$data = mysqli_query($conn, "
SELECT artikel.*, kategori.nama_kategori
FROM artikel
JOIN kategori ON artikel.id_kategori = kategori.id_kategori
ORDER BY artikel.views DESC
");

// BADGE
function getBadge($views, $tanggal){
    $today = date('Y-m-d');
    $diff = (strtotime($today) - strtotime($tanggal)) / (60*60*24);

    if($views > 500){
        return '<span class="badge bg-danger">🔥 Viral</span>';
    } elseif($views > 100){
        return '<span class="badge bg-warning text-dark">🚀 Trending</span>';
    } elseif($diff <= 3){
        return '<span class="badge bg-info text-dark">🆕 Baru</span>';
    }
    return '';
}
?>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>📰 Data Artikel</h3>

    <a href="tambah.php" class="btn btn-warning">
        ➕ Tambah Artikel
    </a>
</div>

<div class="card-modern p-4">

<table id="datatable" class="table table-dark table-hover align-middle">
<thead>
<tr>
<th>No</th>
<th>Judul</th>
<th>Kategori</th>
<th>Views</th>
<th>Tanggal</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; while($d=mysqli_fetch_assoc($data)){ ?>
<tr>

<td><?= $no++; ?></td>

<td>
<div style="font-weight:600;">
<?= $d['judul']; ?>
</div>

<div class="mt-1">
<?= getBadge($d['views'], $d['tanggal']); ?>
</div>

<small style="color:#94a3b8;">
<?= $d['tanggal']; ?>
</small>
</td>

<td>
<span class="badge bg-warning text-dark">
<?= $d['nama_kategori']; ?>
</span>
</td>

<td>
<span class="<?= $d['views'] > 100 ? 'text-warning fw-bold' : '' ?>">
👁 <?= number_format($d['views']); ?>
</span>
</td>

<td><?= $d['tanggal']; ?></td>

<td>
<div class="d-flex gap-2">

<a href="edit.php?id=<?= $d['id_artikel']; ?>" class="btn btn-primary btn-sm">
✏️
</a>

<?php if($_SESSION['role'] == 'admin'){ ?>
<a href="hapus.php?id=<?= $d['id_artikel']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin mau hapus artikel ini?')">
🗑
</a>
<?php } ?>

</div>
</td>

</tr>
<?php } ?>
</tbody>

</table>

</div>
</div>

<!-- DATATABLE -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function(){

    $('#datatable').DataTable({
        "order": [[3, "desc"]],
        "pageLength": 5,
        "columnDefs": [
            { "type": "num", "targets": 3 }
        ],
        "language": {
            "search": "🔎 Cari:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
            "paginate": {
                "next": "→",
                "previous": "←"
            }
        }
    });

});
</script>

<?php include 'layout/footer.php'; ?>