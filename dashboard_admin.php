<?php
session_start();
include "koneksi.php"; 


if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') { 
    header("Location: login.php");
    exit;
}

$admin_id = $_SESSION['user_id'] ?? 'AdminIDNotFound'; 
$admin_nama = $_SESSION['nama'] ?? 'Administrator'; 

$query_pembayaran = "
    SELECT 
        id, nama_pemesan, paket_wisata, lokasi_wisata, jumlah_tiket, total_bayar, status, tanggal_transaksi
    FROM 
        pembayaran 
    ORDER BY 
        tanggal_transaksi DESC";

$result_pembayaran = mysqli_query($conn, $query_pembayaran);


$query_count = "SELECT COUNT(id) as total_pesanan FROM pembayaran";
$result_count = mysqli_query($conn, $query_count);
$total_pesanan = 0;
if ($result_count) {
    $data_count = mysqli_fetch_assoc($result_count);
    $total_pesanan = $data_count['total_pesanan'];
}

$status_message = '';
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status == 'success_create') {
        $status_message = "<div class='alert success'>✅ Transaksi baru berhasil ditambahkan!</div>";
    } elseif ($status == 'success_update') {
        $status_message = "<div class='alert success'>✅ Data transaksi berhasil diperbarui!</div>";
    } elseif ($status == 'success_delete') {
        $status_message = "<div class='alert danger'>🗑️ Transaksi berhasil dihapus.</div>";
    } elseif ($status == 'error_delete' || $status == 'error_create' || $status == 'error_update') {
        $status_message = "<div class='alert danger'>❌ Terjadi kesalahan saat memproses data.</div>";
    }
}



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
<title>Admin Dashboard | Explore Bandung</title>
<link rel="stylesheet" href="dashboard.css?v=<?= filemtime(__DIR__ . '/dashboard.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

<div class="logo-header">
    
    <img src="foto/LogoExploreBandung.jpeg" alt="Logo Explore Bandung" class="dashboard-logo"> 
</div>

<div class="user-widgets">
    <div class="card user-card">
        <div class="user-info">
            <h3>Selamat Datang, Admin <?php echo htmlspecialchars($admin_nama); ?>!</h3>
            <p>Role: Administrator (ID: <?php echo htmlspecialchars($admin_id); ?>)</p>
        </div>
        
        <div class="action-group"> 
            <button class="beranda-btn" onclick="window.location.href='beranda.php'">Lihat Situs</button>
            <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>
</div>

<div class="riwayat-container">
    
    <?= $status_message ?>

    <h3 class="section-title" style="color: #333;">📊 Ringkasan Data Pembayaran</h3>
    
    <div class="summary-card">
        <h4>Total Semua Pesanan</h4>
        <p style="font-size: 2em; font-weight: bold; color: #007bff;"><?= $total_pesanan ?></p>
    </div>

    <h3 class="section-title" style="margin-top: 30px; color: #333;">📋 Data Transaksi Pembayaran</h3>
    <p style="margin-bottom: 15px;">Berikut adalah daftar semua transaksi yang masuk.</p>
    
    <?php if ($result_pembayaran && mysqli_num_rows($result_pembayaran) > 0): ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pemesan</th>
                    <th>Paket Wisata</th>
                    <th style="text-align: center;">Jml Tiket</th>
                    <th>Lokasi Wisata</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Tgl Transaksi</th>
                    <th style="width: 200px; text-align: center;">Aksi CRUD</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($result_pembayaran)): ?>
                    <?php $status = strtolower($data['status']); ?>
                    <tr>
                        <td style="text-align: center;"><?= htmlspecialchars($data['id']) ?></td>
                        <td><?= htmlspecialchars($data['nama_pemesan']) ?></td>
                        <td><?= htmlspecialchars($data['paket_wisata']) ?></td>
                        <td style="text-align: center;"><?= htmlspecialchars($data['jumlah_tiket']) ?></td>
                        <td><?= htmlspecialchars($data['lokasi_wisata']) ?></td>
                        <td><?= rp($data['total_bayar']) ?></td>
                        <td style="text-align: center;">
                            <span class="status-<?= $status ?>"><?= htmlspecialchars($data['status']) ?></span>
                        </td>
                        <td><?= date('d M Y H:i', strtotime($data['tanggal_transaksi'])) ?></td>
                        <td class="action-btn-group">
                            <button class="detail-btn" 
                                onclick="window.location.href='detail_pembayaran.php?id=<?= $data['id'] ?>'"
                            >
                                <i class="fas fa-info-circle"></i> Detail
                            </button>
                            <button class="edit-btn" onclick="window.location.href='edit_pembayaran.php?id=<?= $data['id'] ?>'">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="delete-btn" onclick="if(confirm('Yakin ingin menghapus transaksi ID <?= $data['id'] ?>? Data akan hilang permanen.')) window.location.href='delete_pembayaran.php?id=<?= $data['id'] ?>'">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="padding: 15px; background: #fff3cd; border: 1px solid #101010ff; color: #112277ff; border-radius: 4px;">Tidak ada data transaksi pembayaran yang ditemukan.</p>
    <?php endif; ?>

    <p style="text-align: center; margin-top: 30px;">
        <a href="create_pembayaran.php" style="background: #28a745; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;">+ Tambah Transaksi Baru</a>
    </p>

</div>

</body>
</html>