<?php
session_start();
include "koneksi.php";

// Verifikasi Admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$message = "";

// PROSES INSERT DATA
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan sanitasi semua input
    $nama_pemesan = mysqli_real_escape_string($conn, $_POST['nama_pemesan']);
    $email_pemesan = mysqli_real_escape_string($conn, $_POST['email_pemesan']);
    $telepon_pemesan = mysqli_real_escape_string($conn, $_POST['telepon_pemesan']);
    $jumlah_tiket = (int)$_POST['jumlah_tiket'];
    $paket_wisata = mysqli_real_escape_string($conn, $_POST['paket_wisata']);
    $lokasi_wisata = mysqli_real_escape_string($conn, $_POST['lokasi_wisata']);
    $total_bayar = (float)$_POST['total_bayar'];
    $metode_pembayaran = mysqli_real_escape_string($conn, $_POST['metode_pembayaran']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    // Perintah SQL untuk INSERT
    $query = "INSERT INTO pembayaran 
              (nama_pemesan, email_pemesan, telepon_pemesan, jumlah_tiket, paket_wisata, lokasi_wisata, total_bayar, metode_pembayaran, status) 
              VALUES 
              ('$nama_pemesan', '$email_pemesan', '$telepon_pemesan', $jumlah_tiket, '$paket_wisata', '$lokasi_wisata', $total_bayar, '$metode_pembayaran', '$status')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: admin_dashboard.php?status=success_create");
        exit;
    } else {
        $message = "<div style='color:red;'>Error saat menambahkan data: " . mysqli_error($conn) . "</div>";
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi Pembayaran</title>
    <link rel="stylesheet" href="dashboard.css">
    <style> .form-group { margin-bottom: 15px; } input[type="text"], input[type="email"], input[type="number"], select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; } </style>
</head>
<body>
<div class="container" style="max-width: 600px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h2 style="text-align: center;">Tambah Transaksi Pembayaran Baru</h2>
    <?= $message ?>
    <form method="POST">
        <div class="form-group"><label>Nama Pemesan:</label><input type="text" name="nama_pemesan" required></div>
        <div class="form-group"><label>Email Pemesan:</label><input type="email" name="email_pemesan" required></div>
        <div class="form-group"><label>Telepon:</label><input type="text" name="telepon_pemesan"></div>
        <div class="form-group"><label>Jumlah Tiket:</label><input type="number" name="jumlah_tiket" min="1" required></div>
        <div class="form-group"><label>Paket Wisata:</label><input type="text" name="paket_wisata" required></div>
        <div class="form-group"><label>Lokasi Wisata:</label><input type="text" name="lokasi_wisata" required></div>
        <div class="form-group"><label>Total Bayar (Rp):</label><input type="number" step="0.01" name="total_bayar" required></div>
        <div class="form-group">
            <label>Metode Pembayaran:</label>
            <select name="metode_pembayaran" required>
                <option value="transfer">Transfer</option>
                <option value="ewallet">E-Wallet</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <select name="status" required>
                <option value="pending">pending</option>
                <option value="paid">paid</option>
                <option value="cancelled">cancelled</option>
            </select>
        </div>
        <button type="submit" style="background: #28a745; color: white; padding: 10px; border: none; border-radius: 4px; width: 100%; margin-top: 10px;">Simpan Transaksi</button>
        <a href="admin_dashboard.php" style="display: block; text-align: center; margin-top: 10px;">← Kembali ke Dashboard</a>
    </form>
</div>
</body>
</html>