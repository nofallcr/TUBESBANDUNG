<?php
// Tangkap data dari checkout
$nama = isset($_POST['nama_pemesan']) ? $_POST['nama_pemesan'] : '';
$email = isset($_POST['email_pemesan']) ? $_POST['email_pemesan'] : '';
$telp = isset($_POST['telepon_pemesan']) ? $_POST['telepon_pemesan'] : '';
$jumlah = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 1;
$total = isset($_POST['total']) ? intval($_POST['total']) : 0;
$paket = isset($_POST['paket']) ? $_POST['paket'] : '';
$lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : '';

// Cek data (sesuai kebutuhan Anda)
if ($nama === '' || $email === '' || $telp === '') {
    header('Content-Type: text/html; charset=utf-8');
    echo '<!DOCTYPE html><html lang="id"><head><title>Kesalahan</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head><body>';
    echo '<div class="container mt-5"><div class="alert alert-danger" role="alert">Data pemesan tidak lengkap. Mohon isi data dengan benar.</div></div>';
    echo '</body></html>';
    exit;
}

// Fungsi untuk memformat mata uang Rupiah
// Karena referensi Anda menampilkan "Harga / Orang", kita asumsikan harga per orang adalah Total / Jumlah
$harga_per_orang = ($jumlah > 0) ? round($total / $jumlah) : 0;
function formatRupiah($angka) {
    return 'Rp' . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Paket Wisata</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<?php include 'navbar.php'; ?>
<style>

:root {
    --bs-blue: #0d6efd; /* Warna biru Bootstrap */
    --main-bg: #f5f6f8; /* Background Abu-abu Lembut */
    --card-bg: #ffffff;
    --text-dark: #1f2937;
    --text-muted: #6b7280;
}

body {
    font-family: 'Inter', sans-serif;
    background-color: var(--main-bg);
}



/* Main Content Area */
.main-content {
    padding-top: 50px;
    padding-bottom: 50px;
}

/* Card Utama Review & Bayar */
.review-card {
    background-color: var(--card-bg);
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); /* Shadow yang bersih */
}

.review-header h2 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-dark);
}
.review-header p {
    color: var(--text-muted);
    font-size: 0.95rem;
    margin-bottom: 30px;
}

/* Kolom Kiri: Data Pemesan/Penumpan (Tanpa border) */
.data-form-section .form-label {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 5px;
}
.data-form-section .form-control {
    border: 1px solid #d1d5db;
    border-radius: 6px;
    padding: 10px 15px;
    font-size: 0.95rem;
    margin-bottom: 15px;
}

/* Card Ringkasan Pesanan (Kolom Kanan) */
.summary-card {
    background-color: var(--card-bg);
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 25px;
    box-shadow: none; /* Dibuat lebih tipis dari card utama */
    position: sticky;
    top: 50px;
}

.summary-card h4 {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 20px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    font-size: 0.95rem;
}

.summary-item.total-row {
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #e5e7eb;
}

.summary-item .label {
    color: var(--text-muted);
}
.summary-item .value {
    font-weight: 500;
    color: var(--text-dark);
}

.summary-item.total-row .label {
    font-weight: 600;
    color: var(--bs-blue);
}
.summary-item.total-row .value {
    font-weight: 700;
    color: var(--bs-blue);
}

/* Tombol Biru (Seperti referensi) */
.btn-primary-custom {
    background-color: var(--bs-blue);
    border-color: var(--bs-blue);
    padding: 12px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 6px;
    transition: background-color 0.2s;
}
.btn-primary-custom:hover {
    background-color: #0b5ed7;
    border-color: #0b5ed7;
}

</style>

</head>
<body>



<div class="container main-content">
    <div class="card review-card p-4 p-lg-5">
        
        <div class="review-header">
            <h2>Review & Bayar Paket Wisata</h2>
            <p>Pastikan data Anda benar sebelum menyelesaikan pemesanan</p>
        </div>

        <div class="row g-5">
            <div class="col-lg-7 data-form-section">
                
                <form action="success.php" method="POST">
                    
                    <h5 class="mb-3" style="font-weight: 600; color: var(--text-dark);">Data Pemesan</h5>
                    
                    <div class="mb-3">
                        <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nama_pemesan" name="nama" value="<?= htmlspecialchars($nama) ?>" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email_pemesan" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email_pemesan" name="email" value="<?= htmlspecialchars($email) ?>" readonly>
                    </div>
                    
                    <div class="mb-4">
                        <label for="telepon_pemesan" class="form-label">No Telepon</label>
                        <input type="tel" class="form-control" id="telepon_pemesan" name="telp" value="<?= htmlspecialchars($telp) ?>" readonly>
                    </div>

                    <h5 class="mb-3" style="font-weight: 600; color: var(--text-dark);">Data Penumpang</h5>
                    
                    <div class="mb-3">
                        <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
                        <input type="number" class="form-control" id="jumlah_orang" name="jumlah" value="<?= $jumlah ?>" readonly>
                    </div>

                    <?php for ($i = 1; $i <= $jumlah; $i++): ?>
                        <div class="mb-3">
                            <label class="form-label text-primary">Penumpang <?= $i ?></label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($nama) ?> (Pemesan)" readonly>
                        </div>
                    <?php endfor; ?>
                    
                    <input type="hidden" name="total" value="<?= $total ?>">
                    <input type="hidden" name="paket" value="<?= htmlspecialchars($paket) ?>">
                    <input type="hidden" name="lokasi" value="<?= htmlspecialchars($lokasi) ?>">
                    
                    </form>

            </div>

            <div class="col-lg-5">
                <div class="summary-card">
                    <h4>Ringkasan Pemesanan</h4>
                    
                    <div class="summary-list">
                        <div class="summary-item">
                            <span class="label">Paket</span>
                            <span class="value"><?= htmlspecialchars($paket) ?></span>
                        </div>
                        <div class="summary-item">
                            <span class="label">Lokasi</span>
                            <span class="value"><?= htmlspecialchars($lokasi) ?></span>
                        </div>
                        <div class="summary-item">
                            <span class="label">Harga / Orang</span>
                            <span class="value"><?= formatRupiah($harga_per_orang) ?></span>
                        </div>
                        
                        <div class="summary-item total-row">
                            <span class="label">Total:</span>
                            <span class="value"><?= formatRupiah($total) ?></span>
                        </div>
                    </div>

                    <button type="submit" form="paymentForm" class="btn btn-primary-custom w-100 mt-4">
                        Lanjutkan ke Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Catatan: Karena halaman ini adalah halaman review dan pembayaran,
// tombol 'Lanjutkan ke Pembayaran' seharusnya mengarahkan ke langkah selanjutnya (misal: halaman pilih metode bayar)
// Di kode ini, tombol akan men-submit form yang ada di kolom kiri (form action="success.php").
</script>

</body>
</html>