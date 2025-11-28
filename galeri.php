<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="galeri.css?v=<?= filemtime(__DIR__ . '/galeri.css') ?>">
</head>
<?php include 'navbar.php'; ?>
<body>
    <div class = "container">

        <h1 class="title">Galeri Perjalanan Kami</h1>
        <p class="subtitle">Momen Indah Pelanggan di Tempat Wisata Bandung</p>

        <div class="galeri">
            <img src="1.jpeg" onclick="openLightbox(this.src)">
            <img src="2.jpeg" onclick="openLightbox(this.src)">
            <img src="3.jpg" onclick="openLightbox(this.src)">
            <img src="4.jpeg" onclick="openLightbox(this.src)">
            <img src="5.jpg" onclick="openLightbox(this.src)">
            <img src="6.jpeg" onclick="openLightbox(this.src)">
            <img src="7.webp" onclick="openLightbox(this.src)">
            <img src="8.avif" onclick="openLightbox(this.src)">
            <img src="9.webp" onclick="openLightbox(this.src)">
            <img src="10.webp" onclick="openLightbox(this.src)">
            <img src="11.webp" onclick="openLightbox(this.src)">
            <img src="12.webp" onclick="openLightbox(this.src)">
            <img src="13.jpg" onclick="openLightbox(this.src)">
            <img src="14.webp" onclick="openLightbox(this.src)">
            <img src="15.jpeg" onclick="openLightbox(this.src)">
            <img src="16.webp" onclick="openLightbox(this.src)">
            <img src="17.jpg" onclick="openLightbox(this.src)">
            <img src="18.jpg" onclick="openLightbox(this.src)">
            <img src="19.webp" onclick="openLightbox(this.src)">
            <img src="20.jpeg" onclick="openLightbox(this.src)">
            <img src="21.webp" onclick="openLightbox(this.src)">
            <img src="22.webp" onclick="openLightbox(this.src)">
            <img src="23.jpg" onclick="openLightbox(this.src)">
            <img src="24.jpg" onclick="openLightbox(this.src)">
            <img src="25.webp" onclick="openLightbox(this.src)">
            <img src="26.png" onclick="openLightbox(this.src)">
            <img src="27.jpeg" onclick="openLightbox(this.src)">
            <img src="28.jpg" onclick="openLightbox(this.src)">
           
        </div>
    </div>
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