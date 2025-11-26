<?php
$nama   = $_POST['nama'];
$total  = $_POST['total'];
$metode = $_POST['metode'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Pemesanan Berhasil</title>
<style>
body{
    font-family:Arial;
    background:#f9fafb;
}
.box{
    max-width:600px;
    margin:80px auto;
    background:white;
    padding:40px;
    border-radius:8px;
    text-align:center;
}
h2{
    color:green;
}
</style>
</head>
<body>

<div class="box">
<h2>✅ Pemesanan Berhasil</h2>

<p><b>Nama:</b> <?= $nama ?></p>
<p><b>Total Bayar:</b> Rp <?= number_format($total,0,",",".") ?></p>
<p><b>Metode Pembayaran:</b> <?= $metode ?></p>

<hr>

<p>Silakan lakukan pembayaran sesuai metode pilihan Anda.</p>

<a href="index.php">Kembali ke Beranda</a>
</div>

</body>
</html>
