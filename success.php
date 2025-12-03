<?php
<<<<<<< HEAD

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$nama = $_POST['nama'] ?? 'Pengunjung';
$email = $_POST['email'] ?? 'N/A';
$telp = $_POST['telp'] ?? 'N/A';
$jumlah = $_POST['jumlah'] ?? 1;
$total = $_POST['total'] ?? 0;
$paket = $_POST['paket'] ?? 'N/A';
$lokasi = $_POST['lokasi'] ?? 'N/A';
$metode = $_POST['metode'] ?? 'Tidak diketahui';

function rp($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
=======
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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
</head>
<?php include 'navbar.php'; ?>
<body>

<div style="text-align: center; max-width: 600px; margin: 50px auto; padding: 30px; border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
    <h2>✅ Konfirmasi Pembayaran Berhasil!</h2>
    <p style="font-size: 1.1em; margin-bottom: 30px;">Terima kasih, **<?= htmlspecialchars($nama) ?>**! Pemesanan Anda telah berhasil direkam.</p>
    
    <div style="text-align: left; padding: 15px; border-top: 2px solid #007bff; border-bottom: 1px solid #eee;">
        <h3 style="color: #007bff;">Detail Pesanan</h3>
        <p><b>Paket Wisata:</b> <?= htmlspecialchars($paket) ?></p>
        <p><b>Lokasi Tujuan:</b> <?= htmlspecialchars($lokasi) ?></p>
        <p><b>Jumlah Tiket:</b> <?= $jumlah ?></p>
        <p><b>Metode Bayar:</b> <span style="font-weight: bold;"><?= htmlspecialchars($metode) ?></span></p>
    </div>


    <div style="background-color: #f8f9fa; padding: 15px; border-radius: 4px; margin-top: 15px;">
        <p style="font-size: 1.2em; margin: 0;"><b>Total Bayar:</b> <span style="color: green; font-weight: bold;"><?= rp($total) ?></span></p>
    </div>
    
    <p style="margin-top: 30px; color: #6c757d;">Silakan cek email Anda. Tim Explore Bandung akan segera menghubungi Anda.</p>
    
    <a href="beranda.php" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; margin-top: 20px;">
        Kembali ke Beranda
    </a>

<p><b>Nama:</b> <?= $nama ?></p>
<p><b>Total Bayar:</b> Rp <?= number_format($total, 0, ",", ".") ?></p>
<p><b>Metode Pembayaran:</b> <?= ucfirst($metode) ?></p>

<hr>

<p>Pembayaran dilakukan setelah kegiatan wisata selesai.</p>

<a href="pesanan.php" class="back">Lihat Pesanan</a>

</div>

</body>
</html>