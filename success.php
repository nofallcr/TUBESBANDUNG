<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_wisata";


$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}

// Fungsi Pembantu Format Rupiah
function rp($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// --- 2. Inisialisasi Variabel Default ---
$nama = 'Pengunjung';
$email = 'N/A';
$telp = 'N/A';
$jumlah = 1;
$total = 0;
$paket = 'N/A';
$lokasi = 'N/A';
$metode = 'Tidak diketahui';
$id_pesanan = null; 

if (isset($_GET['id'])) {
    
    
    $id_pesanan = mysqli_real_escape_string($conn, $_GET['id']);
    $q = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id = '$id_pesanan'");
    
    if (mysqli_num_rows($q) > 0) {
        $data = mysqli_fetch_assoc($q);

        
        $nama   = $data['nama_pemesan'];
        $email  = $data['email_pemesan'] ?? 'N/A'; 
        $telp   = $data['telp_pemesan'] ?? 'N/A';
        $jumlah = $data['jumlah_tiket'] ?? 1;
        $total  = $data['total_bayar'];
        $paket  = $data['nama_paket'] ?? 'N/A';
        $lokasi = $data['lokasi_wisata'] ?? 'N/A';
        $metode = $data['metode_pembayaran'];
    } else {
    
        header("Location: beranda.php");
        exit;
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nama_post = mysqli_real_escape_string($conn, $_POST['nama'] ?? 'Pengunjung');
    $email_post = mysqli_real_escape_string($conn, $_POST['email'] ?? 'N/A');
    $telp_post = mysqli_real_escape_string($conn, $_POST['telp'] ?? 'N/A');
    $jumlah_post = (int)($_POST['jumlah'] ?? 1);
    $total_post = (float)($_POST['total'] ?? 0);
    $paket_post = mysqli_real_escape_string($conn, $_POST['paket'] ?? 'N/A');
    $lokasi_post = mysqli_real_escape_string($conn, $_POST['lokasi'] ?? 'N/A');
    $metode_post = mysqli_real_escape_string($conn, $_POST['metode'] ?? 'Tidak diketahui');
    
    
    $insert_query = "INSERT INTO pembayaran (
        nama_pemesan, email_pemesan, telp_pemesan, 
        jumlah_tiket, total_bayar, nama_paket, 
        lokasi_wisata, metode_pembayaran, tanggal_pesan
    ) VALUES (
        '$nama_post', '$email_post', '$telp_post', 
        $jumlah_post, $total_post, '$paket_post', 
        '$lokasi_post', '$metode_post', NOW()
    )";
    
    if (mysqli_query($conn, $insert_query)) {
       
        $id_pesanan = mysqli_insert_id($conn);

        
        $nama = $nama_post;
        $email = $email_post;
        $telp = $telp_post;
        $jumlah = $jumlah_post;
        $total = $total_post;
        $paket = $paket_post;
        $lokasi = $lokasi_post;
        $metode = $metode_post;
        
    } else {
        
        $nama = $nama_post;
        $total = $total_post;
        $metode = $metode_post;
       
        echo "<script>alert('Gagal menyimpan pesanan: " . mysqli_error($conn) . "');</script>";
    }

} 

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan Berhasil</title>
    <?php include 'navbar.php'; ?>
</head>
<body>

<div style="text-align: center; max-width: 600px; margin: 50px auto; padding: 30px; border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
    <h2>✅ Konfirmasi Pemesanan Berhasil!</h2>
    <p style="font-size: 1.1em; margin-bottom: 30px;">
        Terima kasih, **<?= htmlspecialchars($nama) ?>**! Pemesanan Anda telah berhasil direkam. 
        <?php if ($id_pesanan): ?>
            <br>ID Pesanan Anda adalah: **<?= $id_pesanan ?>**
        <?php endif; ?>
    </p>
    
    <div style="text-align: left; padding: 15px; border-top: 2px solid #007bff; border-bottom: 1px solid #eee;">
        <h3 style="color: #007bff;">Detail Pesanan Anda</h3>
        <p><b>Paket Wisata:</b> <?= htmlspecialchars($paket) ?></p>
        <p><b>Lokasi Tujuan:</b> <?= htmlspecialchars($lokasi) ?></p>
        <p><b>Jumlah Tiket:</b> <?= $jumlah ?></p>
        <p><b>Email Kontak:</b> <?= htmlspecialchars($email) ?></p>
        <p><b>Telepon Kontak:</b> <?= htmlspecialchars($telp) ?></p>
        <p><b>Metode Bayar:</b> <span style="font-weight: bold;"><?= htmlspecialchars($metode) ?></span></p>
    </div>


    <div style="background-color: #f8f9fa; padding: 15px; border-radius: 4px; margin-top: 15px;">
        <p style="font-size: 1.2em; margin: 0;"><b>Total Bayar:</b> <span style="color: green; font-weight: bold;"><?= rp($total) ?></span></p>
    </div>
    
    <p style="margin-top: 30px; color: #6c757d;">Silakan cek email Anda. Tim Explore Bandung akan segera menghubungi Anda.</p>
    
    <a href="beranda.php" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; margin-top: 20px;">
        Kembali ke Beranda
    </a>

    <hr>

    <p style="color: #6c757d; font-size: 0.9em;">Pembayaran dilakukan setelah kegiatan wisata selesai.</p>

    <a href="pesanan.php" class="back" style="color: #007bff; text-decoration: none;">Lihat Pesanan Saya</a>

</div>

</body>
</html>