<?php
$nama   = $_POST['nama'];
$total  = $_POST['total'];
$metode = $_POST['metode'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Pemesanan Berhasil</title>
<link rel="stylesheet" href="success.css?v=<?= filemtime(__DIR__ . '/success.css') ?>">
</head>
<body>

<div class="box">
<h2>✅ Pemesanan Berhasil</h2>

<p><b>Nama:</b> <?= $nama ?></p>
<p><b>Total Bayar:</b> Rp <?= number_format($total,0,",",".") ?></p>
<p><b>Metode Pembayaran:</b> <?= $metode ?></p>

<hr>

<p>Pembayaran dilakukan setelah kegiatan wisata selesai.</p>

<a href="beranda.php" class="back">Kembali</a>
</div>

</body>
</html>
