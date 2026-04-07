<?php
include '../koneksi.php';
include 'layout/header.php';
include 'layout/sidebar.php';

function waktu_lalu($datetime){
    $time = time() - strtotime($datetime);

    if($time < 60){
        return $time . " detik lalu";
    } elseif($time < 3600){
        return floor($time/60) . " menit lalu";
    } elseif($time < 86400){
        return floor($time/3600) . " jam lalu";
    } elseif($time < 2592000){
        return floor($time/86400) . " hari lalu";
    } else {
        return date('d M Y', strtotime($datetime));
    }
}

if(!isset($_SESSION['login'])){
    header("Location: ../admin/login.php");
    exit;
}

// SIMPAN
if(isset($_POST['simpan'])){

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];
$tanggal = date('Y-m-d H:i:s');

    // UPLOAD GAMBAR
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if($gambar != ""){
        move_uploaded_file($tmp, "../assets/img/".$gambar);
    }

    mysqli_query($conn, "
    INSERT INTO artikel (judul, isi, id_kategori, gambar, tanggal, views)
    VALUES ('$judul','$isi','$kategori','$gambar','$tanggal',0)
    ");

    echo "<script>
    alert('Artikel berhasil ditambahkan!');
    window.location='artikel.php';
    </script>";
}

// KATEGORI
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
?>

<style>
 .form-control {
    background: #020617;
    border: 1px solid #334155;
    color: white;
}

.form-control:focus {
    border-color: #f59e0b;
    box-shadow: none;
}
</style>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>✍️ Tambah Artikel</h3>

    <button onclick="history.back()" class="btn btn-secondary">
        ← Kembali
    </button>
</div>

<div class="card-modern p-4">

<form method="POST" enctype="multipart/form-data">

<!-- JUDUL -->
<div class="mb-3">
<label>Judul Artikel</label>
<input type="text" name="judul" class="form-control" required>
</div>

<!-- KATEGORI -->
<div class="mb-3">
<label>Kategori</label>
<select name="kategori" class="form-control">
<?php while($k=mysqli_fetch_assoc($kategori)){ ?>
<option value="<?= $k['id_kategori'] ?>">
<?= $k['nama_kategori'] ?>
</option>
<?php } ?>
</select>
</div>

<!-- GAMBAR -->
<div class="mb-3">
<label>Upload Gambar</label>
<input type="file" name="gambar" class="form-control">
</div>

<!-- PREVIEW GAMBAR -->
<img id="preview" style="max-width:200px; display:none; margin-bottom:10px;">

<!-- ISI -->
<div class="mb-3">
<label>Isi Artikel</label>
<textarea name="isi" id="editor"></textarea>
</div>

<!-- BUTTON -->
<button name="simpan" class="btn btn-warning">
💾 Simpan Artikel
</button>

</form>

</div>

</div>

<!-- CKEDITOR -->
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace('editor');
</script>

<!-- PREVIEW GAMBAR -->
<script>
document.querySelector('input[name="gambar"]').addEventListener('change', function(e){
    const file = e.target.files[0];
    const preview = document.getElementById('preview');

    if(file){
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
});
</script>

<?php include 'layout/footer.php'; ?>