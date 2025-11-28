<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Bandung</title>
<link rel="stylesheet" href="beranda.css?v=<?= filemtime(__DIR__ . '/beranda.css') ?>">
</head>
<?php include 'navbar.php'; ?>
<body>
<section class="hero">
    <div class="overlay"></div>

    <div class="hero-text">
        <h2>Wisata Aman dan Nyaman</h2>
        <p>Temukan pengalaman tak terlupakan di destinasi wisata terbaik Bandung dengan agen perjalanan terpercaya.</p>

        <a href="https://wa.me/message/7P2VBISZETOPP1?src=qr" class="btn-wa">Contact</a>
    </div>
</section>
</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<footer class="footer">
    <div class="footer-container">

        <div class="footer-col">
            <h3 class="footer-title">Explore Bandung</h3>
            <p class="footer-sub">Wisata Bandung</p>

            <p class="footer-desc">
                Perjalanan Wisata lokal Bandung dengan pilihan unggul dan perjalanan nyaman
            </p>

        <div class="social-icons">
            <a href="https://www.facebook.com/profile.php?id=61584332882956" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/explo_rebandung?igsh=MWFreGgxY2c3aHUwbQ==" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        </div>
        </div>

        <div class="footer-col">
            <h3 class="footer-title">Navigasi</h3>
            <ul>
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="paket.php">Paket Wisata</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="Destinasi.php">Destinasi</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h3 class="footer-title">Layanan</h3>
            <ul>
                <li>✔ Tour Terpercaya</li>
                <li>✔ Driver Berpengalaman</li>
                <li>✔ Kendaraan Nyaman</li>
                <li>✔ Panduan Unggulan</li>
                <li>✔ Konsultasi Gratis</li>
                <li>✔ Harga Transparan</li>
            </ul>
        </div>

        <div class="footer-col">
            <h3 class="footer-title">Kontak</h3>

            <p>📍 Jalan Dr. Mansyur, Padang Bulan<br>
            Kota Medan, Sumatera Utara</p>
            <p>📞 +62 822-7784-8855</p>
            <p>📧 info@ExploreBandung.com</p>
            <p>💬 Dukungan 24/7</p>

            <a href="https://wa.me/message/7P2VBISZETOPP1?src=qr" class="wa-btn" target="_blank">
                Konsultasi via WhatsApp
            </a>
        </div>

    </div>

    <div class="footer-bottom">
        <p>Hak Cipta © <?php echo date("Y"); ?> Explore Bandung Kelompok 7. Semua Hak Dilindungi.</p>
        <p>Wisata Tenang & Nyaman – Your Trusted Explorer Companion</p>
    </div>
</footer>
</html>
