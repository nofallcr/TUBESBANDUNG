<?php
$nama = $_POST['nama_pemesan'] ?? '';
$email = $_POST['email_pemesan'] ?? '';
$telp = $_POST['telepon_pemesan'] ?? '';
$jumlah = $_POST['jumlah'] ?? 1;
$total = $_POST['total'] ?? 0;
$paket = $_POST['paket'] ?? '';
$lokasi = $_POST['lokasi'] ?? '';

if (!$nama || !$email || !$telp) {
    die("Data tidak lengkap");
}

function rp($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bayar Tiket</title>
<link rel="stylesheet" href="payment.css?v=<?= filemtime(__DIR__ . '/payment.css') ?>">
</head>
<?php include 'navbar.php'; ?>
<body>

<div class="container">
    

    <h2>Pembayaran Tiket Wisata</h2>

    <div class="info">
        <div class="info-item">
            <span><b>Nama:</b></span>
            <span><?= htmlspecialchars($nama) ?></span>
        </div>
        <div class="info-item">
            <span><b>Email:</b></span>
            <span><?= htmlspecialchars($email) ?></span>
        </div>
        <div class="info-item">
            <span><b>No HP:</b></span>
            <span><?= htmlspecialchars($telp) ?></span>
        </div>
        <div class="info-item">
            <span><b>Jumlah Tiket:</b></span>
            <span><?= $jumlah ?></span>
        </div>
    </div>

    <div class="total">
        <b>Total Bayar: <?= rp($total) ?></b>
    </div>

    <form action="success.php" method="POST">
        <input type="hidden" name="nama" value="<?= htmlspecialchars($nama) ?>">
        <input type="hidden" name="total" value="<?= $total ?>">

        <div class="method">
            <h3>Metode Pembayaran</h3>


       <label class="method-option">
    <input type="radio" name="metode" value="Bayar di Tempat" required>
    Bayar di Tempat (Dilakukan setelah wisata)
</label>


        <button type="submit">
            Konfirmasi Pembayaran
        </button>
    </form>
</div>

</body>
</html>