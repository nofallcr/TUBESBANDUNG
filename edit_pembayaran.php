<?php
session_start();
include "koneksi.php";

// Verifikasi Admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$message = "";
$data = null;

// PROSES UPDATE DATA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $nama_pemesan = mysqli_real_escape_string($conn, $_POST['nama_pemesan']);
    $email_pemesan = mysqli_real_escape_string($conn, $_POST['email_pemesan']);
    $telepon_pemesan = mysqli_real_escape_string($conn, $_POST['telepon_pemesan']);
    $jumlah_tiket = (int)$_POST['jumlah_tiket'];
    $paket_wisata = mysqli_real_escape_string($conn, $_POST['paket_wisata']);
    $lokasi_wisata = mysqli_real_escape_string($conn, $_POST['lokasi_wisata']);
    $total_bayar = (float)$_POST['total_bayar'];
    $metode_pembayaran = mysqli_real_escape_string($conn, $_POST['metode_pembayaran']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    // Perintah SQL untuk UPDATE
    $query_update = "UPDATE pembayaran SET 
                     nama_pemesan='$nama_pemesan', email_pemesan='$email_pemesan', telepon_pemesan='$telepon_pemesan', 
                     jumlah_tiket=$jumlah_tiket, paket_wisata='$paket_wisata', lokasi_wisata='$lokasi_wisata', 
                     total_bayar=$total_bayar, metode_pembayaran='$metode_pembayaran', status='$status'
                     WHERE id=$id";
    
    if (mysqli_query($conn, $query_update)) {
        header("Location: dashboard_admin.php?status=success_update");
        exit;
    } else {
        $message = "<div style='color:red; text-align:center;'>Error saat memperbarui data: " . mysqli_error($conn) . "</div>";
    }
}

// AMBIL DATA LAMA (untuk ditampilkan di form)
if ($id > 0) {
    $query_select = "SELECT * FROM pembayaran WHERE id = $id";
    $result_select = mysqli_query($conn, $query_select);
    $data = mysqli_fetch_assoc($result_select);
}

if (!$data) {
    echo "ID Transaksi tidak valid atau tidak ditemukan.";
    mysqli_close($conn);
    exit;
}

// Menutup koneksi hanya setelah semua data diambil dan diproses
// Perhatikan bahwa jika POST berhasil, koneksi ditutup secara otomatis saat script selesai.
// Jika di GET, koneksi ditutup di akhir script ini.

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi Pembayaran</title>
    <link rel="stylesheet" href="dashboard.css">
    <style> .form-group { margin-bottom: 15px; } input[type="text"], input[type="email"], input[type="number"], select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; } </style>
</head>
<body>
<div class="container" style="max-width: 600px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h2 style="text-align: center;">Edit Transaksi ID #<?= $data['id'] ?></h2>
    <?= $message ?>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        
        <div class="form-group"><label>Nama Pemesan:</label><input type="text" name="nama_pemesan" value="<?= htmlspecialchars($data['nama_pemesan']) ?>" required></div>
        <div class="form-group"><label>Email Pemesan:</label><input type="email" name="email_pemesan" value="<?= htmlspecialchars($data['email_pemesan']) ?>" required></div>
        <div class="form-group"><label>Telepon:</label><input type="text" name="telepon_pemesan" value="<?= htmlspecialchars($data['telepon_pemesan']) ?>"></div>
        <div class="form-group"><label>Jumlah Tiket:</label><input type="number" name="jumlah_tiket" min="1" value="<?= htmlspecialchars($data['jumlah_tiket']) ?>" required></div>
        <div class="form-group"><label>Paket Wisata:</label><input type="text" name="paket_wisata" value="<?= htmlspecialchars($data['paket_wisata']) ?>" required></div>
        <div class="form-group"><label>Lokasi Wisata:</label><input type="text" name="lokasi_wisata" value="<?= htmlspecialchars($data['lokasi_wisata']) ?>" required></div>
        <div class="form-group"><label>Total Bayar (Rp):</label><input type="number" step="0.01" name="total_bayar" value="<?= htmlspecialchars($data['total_bayar']) ?>" required></div>
        
        <div class="form-group">
            <label>Metode Pembayaran:</label>
            <select name="metode_pembayaran" required>
                <option value="transfer" <?= ($data['metode_pembayaran'] == 'transfer') ? 'selected' : '' ?>>Transfer</option>
                <option value="ewallet" <?= ($data['metode_pembayaran'] == 'ewallet') ? 'selected' : '' ?>>E-Wallet</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Status:</label>
            <select name="status" required>
                <option value="pending" <?= ($data['status'] == 'pending') ? 'selected' : '' ?>>pending</option>
                <option value="paid" <?= ($data['status'] == 'paid') ? 'selected' : '' ?>>paid</option>
                <option value="cancelled" <?= ($data['status'] == 'cancelled') ? 'selected' : '' ?>>cancelled</option>
            </select>
        </div>
        
        <button type="submit" style="background: #ffc107; color: #333; padding: 10px; border: none; border-radius: 4px; width: 100%; margin-top: 10px;">Update Transaksi</button>
        <a href="dashboard_admin.php" style="display: block; text-align: center; margin-top: 10px;">← Kembali ke Dashboard</a>
    </form>
</div>
</body>
</html>
<?php mysqli_close($conn); ?>