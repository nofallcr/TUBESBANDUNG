<?php
session_start();
include "koneksi.php"; 

// 1. === VERIFIKASI ADMIN ===
// Memastikan admin sudah login (session 'user_type' = 'admin' diset oleh admin_auth.php)
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') { 
    header("Location: login.php");
    exit;
}

$admin_id = $_SESSION['user_id']; 
$admin_nama = $_SESSION['nama']; 

// 2. === LOGIKA PHP UNTUK ADMIN DASHBOARD ===
// Mengambil semua data pembayaran untuk CRUD/Monitoring
$query_pembayaran = "
    SELECT 
        id, nama_pemesan, paket_wisata, total_bayar, status, tanggal_transaksi
    FROM 
        pembayaran 
    ORDER BY 
        tanggal_transaksi DESC";

$result_pembayaran = mysqli_query($conn, $query_pembayaran);

// Mengambil total semua pesanan
$query_count = "SELECT COUNT(id) as total_pesanan FROM pembayaran";
$result_count = mysqli_query($conn, $query_count);
$total_pesanan = 0;
if ($result_count) {
    $data_count = mysqli_fetch_assoc($result_count);
    $total_pesanan = $data_count['total_pesanan'];
}

// 3. LOGIKA PESAN STATUS (Penting untuk feedback CRUD)
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

// Menutup koneksi database setelah semua data diambil
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
<style>
/* Styling tambahan dari kode Anda */
.data-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: white;
}
.data-table th, .data-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
    font-size: 14px;
}
.data-table th {
    background-color: #f2f2f2;
    text-align: center;
}
.action-btn-group button {
    margin: 2px;
    padding: 5px 10px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
    font-size: 12px;
}
.edit-btn { background-color: #ffc107; color: #333; }
.delete-btn { background-color: #dc3545; color: white; }
.status-paid { color: white; background-color: green; padding: 4px 8px; border-radius: 4px; }
.status-pending { color: white; background-color: orange; padding: 4px 8px; border-radius: 4px; }
.status-cancelled { color: white; background-color: red; padding: 4px 8px; border-radius: 4px; }

/* Styling untuk pesan status */
.alert {
    padding: 15px;
    border-radius: 4px;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
}
.alert.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}
.alert.danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
</style>
</head>

<body>

<div class="logo-header">
    <img src="foto/LogoExploreBandung.jpeg" alt="Logo Explore Bandung" class="dashboard-logo"> 
</div>

<div class="user-widgets">
    <div class="card user-card" style="background: #17a2b8; color: white;">
        <div class="user-info">
            <h3>Selamat Datang, Admin <?php echo htmlspecialchars($admin_nama); ?>!</h3>
            <p>Role: Administrator</p>
        </div>
        
        <div class="action-group"> 
            <button class="beranda-btn" onclick="window.location.href='beranda.php'">Lihat Situs</button>
            <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>
</div>

<div class="riwayat-container" style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-top: 20px;">
    
    <?= $status_message ?>

    <h3 class="section-title" style="color: #333;">📊 Ringkasan Data Pembayaran</h3>
    
    <div class="summary-card" style="padding: 15px; background: #fff; border: 1px solid #dee2e6; border-radius: 6px; text-align: center;">
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
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Tgl Transaksi</th>
                    <th style="width: 150px;">Aksi CRUD</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($result_pembayaran)): ?>
                    <?php $status = strtolower($data['status']); ?>
                    <tr>
                        <td style="text-align: center;"><?= htmlspecialchars($data['id']) ?></td>
                        <td><?= htmlspecialchars($data['nama_pemesan']) ?></td>
                        <td><?= htmlspecialchars($data['paket_wisata']) ?></td>
                        <td><?= rp($data['total_bayar']) ?></td>
                        <td style="text-align: center;">
                            <span class="status-<?= $status ?>"><?= htmlspecialchars($data['status']) ?></span>
                        </td>
                        <td><?= date('d M Y H:i', strtotime($data['tanggal_transaksi'])) ?></td>
                        <td class="action-btn-group">
                            <button class="edit-btn" onclick="window.location.href='edit_pembayaran.php?id=<?= $data['id'] ?>'">Edit</button>
                            <button class="delete-btn" onclick="if(confirm('Yakin ingin menghapus transaksi ID <?= $data['id'] ?>?')) window.location.href='delete_pembayaran.php?id=<?= $data['id'] ?>'">Hapus</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="padding: 15px; background: #ffebee; border: 1px solid #f44336; color: #333; border-radius: 4px;">Tidak ada data transaksi pembayaran yang ditemukan.</p>
    <?php endif; ?>

    <p style="text-align: center; margin-top: 30px;">
        <a href="create_pembayaran.php" style="background: #28a745; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;">+ Tambah Transaksi Baru</a>
    </p>

</div>

</body>
</html>