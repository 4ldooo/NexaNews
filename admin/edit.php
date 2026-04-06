<?php
include '../koneksi.php';

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];

// ambil data artikel
$data = mysqli_query($conn, "SELECT * FROM artikel WHERE id_artikel='$id'");
$d = mysqli_fetch_assoc($data);

// ambil kategori
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Artikel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body {
    background: #0f172a;
    color: #f8fafc;
}

/* CARD */
.card-modern {
    background: #1e293b;
    border-radius: 18px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

/* INPUT */
.form-control, .form-select {
    background: #020617;
    color: white;
    border: 1px solid #334155;
}

.form-control:focus {
    border-color: #f59e0b;
    box-shadow: none;
}

/* BUTTON */
.btn-primary {
    background: #f59e0b;
    border: none;
    color: black;
}

.btn-primary:hover {
    background: #d97706;
}

/* IMAGE */
.preview-img {
    border-radius: 12px;
    margin-top: 10px;
    max-width: 200px;
}

/* LABEL */
label {
    font-weight: 500;
    margin-bottom: 5px;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card-modern">

<h4 class="mb-4">✏️ Edit Artikel</h4>

<form method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $d['id_artikel']; ?>">

<!-- KATEGORI -->
<div class="mb-3">
<label>Kategori</label>
<select name="kategori" class="form-select" required>

<?php while($k = mysqli_fetch_assoc($kategori)) { ?>
<option value="<?= $k['id_kategori']; ?>"
<?= ($d['id_kategori'] == $k['id_kategori']) ? 'selected' : '' ?>>
<?= $k['nama_kategori']; ?>
</option>
<?php } ?>

</select>
</div>

<!-- JUDUL -->
<div class="mb-3">
<label>Judul</label>
<input type="text" name="judul" value="<?= $d['judul']; ?>" class="form-control" required>
</div>

<!-- ISI -->
<div class="mb-3">
<label>Isi Artikel</label>
<textarea name="isi" id="editor"><?= $d['isi']; ?></textarea>
</div>

<!-- GAMBAR -->
<div class="mb-3">
<label>Gambar Sekarang</label><br>
<img src="../assets/img/<?= $d['gambar']; ?>" class="preview-img" id="previewOld">
</div>

<div class="mb-3">
<label>Ganti Gambar</label>
<input type="file" name="gambar" class="form-control" onchange="previewImage(event)">
<img id="previewNew" class="preview-img d-none">
</div>

<!-- BUTTON -->
<div class="d-flex gap-2">
<button type="submit" name="update" class="btn btn-primary">💾 Update</button>
<button type="button" onclick="history.back()" class="btn btn-secondary">↩ Kembali</button>
</div>

</form>

<?php
if(isset($_POST['update'])){

    $id       = $_POST['id'];
    $kategori = $_POST['kategori'];
    $judul    = $_POST['judul'];
    $isi      = $_POST['isi'];

    $gambar = $_FILES['gambar']['name'];

    if($gambar != ""){
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, "../assets/img/".$gambar);

        mysqli_query($conn, "
        UPDATE artikel SET 
        id_kategori='$kategori',
        judul='$judul',
        isi='$isi',
        gambar='$gambar'
        WHERE id_artikel='$id'
        ");
    } else {
        mysqli_query($conn, "
        UPDATE artikel SET 
        id_kategori='$kategori',
        judul='$judul',
        isi='$isi'
        WHERE id_artikel='$id'
        ");
    }

    echo "<script>alert('Artikel berhasil diupdate');window.location='dashboard.php';</script>";
}
?>

</div>
</div>

<!-- JS PREVIEW -->
<script>
function previewImage(event){
    const input = event.target;
    const preview = document.getElementById('previewNew');

    preview.src = URL.createObjectURL(input.files[0]);
    preview.classList.remove('d-none');
}
</script>

<!-- CKEDITOR -->
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace('editor');
</script>

</body>
</html>