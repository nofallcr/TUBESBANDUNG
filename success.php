<?php
if (isset($_GET['id'])) {
    $conn = mysqli_connect("localhost", "root", "", "db_wisata");
    if (!$conn) die("Koneksi gagal");

    $id = $_GET['id'];
    $q  = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id = '$id'");
    $data = mysqli_fetch_assoc($q);

    $nama   = $data['nama_pemesan'];
    $total  = $data['total_bayar'];
    $metode = $data['metode_pembayaran'];

    mysqli_close($conn);


} else {
    $nama   = $_POST['nama'] ?? '';
    $total  = $_POST['total'] ?? 0;
    $metode = $_POST['metode'] ?? '';
}
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
<p><b>Total Bayar:</b> Rp <?= number_format($total, 0, ",", ".") ?></p>
<p><b>Metode Pembayaran:</b> <?= ucfirst($metode) ?></p>

<hr>

<p>Pembayaran dilakukan setelah kegiatan wisata selesai.</p>

<a href="pesanan.php" class="back">Lihat Pesanan</a>
</div>

</body>
</html>
