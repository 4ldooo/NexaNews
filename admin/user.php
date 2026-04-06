<?php
include '../koneksi.php';
include 'layout/header.php';
include 'layout/sidebar.php';

$data = mysqli_query($conn, "SELECT * FROM admin");
?>

<div class="content">

<h3>👤 Kelola Admin</h3>

<a href="tambah_user.php" class="btn btn-warning mb-3">+ Tambah Admin</a>

<table class="table table-dark">
<tr>
<th>No</th>
<th>Username</th>
<th>Role</th>
<th>Aksi</th>
</tr>

<?php $no=1; while($d=mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?= $no++; ?></td>
<td><?= $d['username']; ?></td>
<td><?= $d['role']; ?></td>
<td>
<a href="edit_user.php?id=<?= $d['id_admin']; ?>" class="btn btn-sm btn-primary">Edit</a>
<a href="hapus_user.php?id=<?= $d['id_admin']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin mau hapus user ini?')">
Hapus
</a>
<a href="reset_password.php?id=<?= $d['id_admin']; ?>" 
class="btn btn-warning btn-sm">
🔑 Reset
</a>
</td>
</tr>
<?php } ?>

</table>

</div>

<?php include 'layout/footer.php'; ?>