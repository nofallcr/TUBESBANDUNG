<?php
session_start();
include "koneksi.php"; 

if (!isset($_SESSION['user_id'])) { 
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id']; 
$user_email = $_SESSION['email']; 

$safe_user_email = mysqli_real_escape_string($conn, $user_email);
$query_count = "SELECT COUNT(id) as total_pesanan FROM pembayaran WHERE email_pemesan = '$safe_user_email'";
$result_count = mysqli_query($conn, $query_count);
$total_pesanan = 0;
if ($result_count) {
    $data_count = mysqli_fetch_assoc($result_count);
    $total_pesanan = $data_count['total_pesanan'];
}

$query_riwayat = "
    SELECT 
        paket_wisata, total_bayar, status, tanggal_transaksi 
    FROM 
        pembayaran 
    WHERE 
        email_pemesan = '$safe_user_email' 
    ORDER BY 
        tanggal_transaksi DESC 
    LIMIT 3";

$result_riwayat = mysqli_query($conn, $query_riwayat);
$riwayat_pesanan = mysqli_fetch_all($result_riwayat, MYSQLI_ASSOC);

mysqli_close($conn); 

function rp($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Explore Bandung</title>
<link rel="stylesheet" href="dashboard.css?v=<?= filemtime(__DIR__ . '/dashboard.css') ?>">
</head>

<body>

<div class="logo-header">
        <img src="foto/LogoExploreBandung.jpeg" alt="Logo Explore Bandung" class="dashboard-logo"> 
    </div>
<div class="user-widgets">
    <div class="card user-card">
        <div class="user-info">
            <h3><?php echo $_SESSION['nama']; ?></h3>
            <p>Email: <?php echo $_SESSION['email']; ?></p>
        </div>
    
    

        <div class="action-group"> 
            <button class="beranda-btn" onclick="window.location.href='beranda.php'">Beranda</button>
            <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>
    </div>
    
    <div class="riwayat-container">
        <h3 class="section-title" style="margin-top: 0; color: white;">Riwayat Pesanan Terbaru</h3>
        
        <?php if (!empty($riwayat_pesanan)): ?>
            <div class="pesanan-list">
                <?php foreach ($riwayat_pesanan as $pesanan): ?>
                    <?php $status = strtolower($pesanan['status']); ?>
                    <div class="pesanan-card-item">
                        <div>
                            <span class="pesanan-status-badge status-<?= $status ?>">
                                <?= htmlspecialchars($pesanan['status']) ?>
                            </span>
                            <h5><?= htmlspecialchars($pesanan['paket_wisata']) ?></h5>
                            <p>Tgl: <?= date('d M Y', strtotime($pesanan['tanggal_transaksi'])) ?></p>
                        </div>
                        <div class="pesanan-total">
                            <?= rp($pesanan['total_bayar']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <p style="text-align: center; margin-top: 15px;">
                <a href="pemesanan.php" style="color: #0d0e0eff; font-weight: bold; text-decoration: none;">Lihat semua riwayat</a>
            </p>
        <?php else: ?>
            <div style="background: white; padding: 20px; border-radius: 8px; text-align: center;">
                <p style="color: #333; margin: 0;">Anda belum memiliki riwayat pemesanan.</p>
                <a href="paket.php" style="color: #007bff; text-decoration: none; font-weight: bold; margin-top: 10px; display: inline-block;">Pesan Sekarang</a>
            </div>
        <?php endif; ?>
    </div>
    </div>

</body>
</html>