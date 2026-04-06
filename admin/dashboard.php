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

// TOTAL
$jml_artikel = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM artikel"));
$jml_kategori = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kategori"));

// TOTAL VIEWS
$total_views = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT SUM(views) as total FROM artikel
"))['total'];

// RECENT
$recent = mysqli_query($conn, "
SELECT * FROM artikel ORDER BY tanggal DESC LIMIT 5
");

// TRENDING
$today = date('Y-m-d');

$trending_today = mysqli_query($conn, "
SELECT artikel.judul, COUNT(views_log.id_artikel) as total
FROM views_log
JOIN artikel ON views_log.id_artikel = artikel.id_artikel
WHERE views_log.tanggal = '$today'
GROUP BY views_log.id_artikel
ORDER BY total DESC
LIMIT 5
");

// CHART
$views_harian = mysqli_query($conn, "
SELECT tanggal, COUNT(*) as total
FROM views_log
GROUP BY tanggal
ORDER BY tanggal DESC
LIMIT 7
");

$label = [];
$data = [];

while($v = mysqli_fetch_assoc($views_harian)){
    $label[] = $v['tanggal'];
    $data[] = $v['total'];
}
?>

<style>
    .card-modern {
    background: #1e293b;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    transition: 0.3s;
}

.card-modern:hover {
    transform: translateY(-3px);
}
</style>

<div class="content">

<h3 class="mb-4">Dashboard</h3>

<!-- SUMMARY -->
<div class="row g-3">

<div class="col-md-4">
<div class="card-modern p-3">
<h6>Total Artikel</h6>
<h3><?= $jml_artikel ?></h3>
</div>
</div>

<div class="col-md-4">
<div class="card-modern p-3">
<h6>Total Kategori</h6>
<h3><?= $jml_kategori ?></h3>
</div>
</div>

<div class="col-md-4">
<div class="card-modern p-3">
<h6>Total Views</h6>
<h3><?= $total_views ?></h3>
</div>
</div>

</div>

<!-- CHART + TRENDING -->
<div class="row mt-4 g-3">

<!-- CHART -->
<div class="col-md-8">
<div class="card-modern p-4">
<h5>📈 Views 7 Hari Terakhir</h5>

<div style="height:300px;">
<canvas id="chartHarian"></canvas>
</div>

</div>
</div>

<!-- TRENDING -->
<div class="col-md-4">
<div class="card-modern p-4">
<h5>🔥 Trending Hari Ini</h5>

<?php while($t = mysqli_fetch_assoc($trending_today)){ ?>
<div class="mb-3">
<strong><?= $t['judul']; ?></strong><br>
<small>👁 <?= $t['total']; ?> views</small>
</div>
<?php } ?>

</div>
</div>

</div>

<!-- RECENT -->
<div class="card-modern p-4 mt-4">
<h5>📰 Artikel Terbaru</h5>

<?php while($r = mysqli_fetch_assoc($recent)){ ?>
<div class="mb-2">
<strong><?= $r['judul']; ?></strong><br>
<small>🕒 <?= waktu_lalu($r['tanggal']); ?></small>
</div>
<?php } ?>

</div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('chartHarian'), {
    type: 'line',
    data: {
        labels: <?= json_encode(array_reverse($label)); ?>,
        datasets: [{
            label: 'Views',
            data: <?= json_encode(array_reverse($data)); ?>,
            borderColor: '#38bdf8',
            backgroundColor: 'rgba(56,189,248,0.1)',
            tension: 0.4,
            fill: true,
            pointRadius: 4,
            pointHoverRadius: 7
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,

        interaction: {
            mode: 'index',
            intersect: false
        },

        plugins: {
            legend: {
                labels: {
                    color: '#fff'
                }
            }
        },

        scales: {
            x: {
                ticks: { color: '#94a3b8' },
                grid: { color: '#1e293b' }
            },
            y: {
                ticks: { color: '#94a3b8' },
                grid: { color: '#1e293b' }
            }
        }
    }
});
</script>

<?php include 'layout/footer.php'; ?>