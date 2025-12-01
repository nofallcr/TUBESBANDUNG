<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Explore Bandung</title>
    <link rel="stylesheet" href="style_tentang.css?v=<?= filemtime(__DIR__ . '/style_tentang.css') ?>">
</head>
<?php include 'navbar.php'; ?>
<body>

    <header class="page-header">
        <h1>Tentang Kami</h1>
        <p class="subtitle">Penawaran perjalanan wisata Bandung dengan rekomendasi yang unggul</p>
    </header>

    <main class="about-section">
        <div class="container">
            
            <div class="about-image">
                
                <img src="" 
                     alt="Tim Explore Bandung">
            </div>
            
            
            <div class="about-content">
                <h2 class="section-title">Tentang Kami</h2>
                
                <p class="paragraph">
                    Explore Wisata Bandung yang beragam dengan beberapa paket yang kami sediakan, memberikan pengalaman yang nyaman, asik, dan penuh kekeluargaan bagi pengguna dan pemesan.
                </p>

                <p class="paragraph">
                    Dengan komitmen yang kami bangun, kami akun terus melayani dengan penuh tanggung jawab untuk pengguna kami yang setia.
                </p>

                
                <ul class="features-list">
                    <li><i class="fas fa-check-circle"></i> Destinasi unggulan</li>
                    <li><i class="fas fa-check-circle"></i> Galeri</li>
                    <li><i class="fas fa-check-circle"></i> Paket perjalanan murah</li>
                </ul>
            </div>
        </div>
    </main>
    
    <script src="tentang.js"></script>
</body>
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
                <li><a href="tentang_kami.php">Tentang Kami</a></li>
                <li><a href="hubungi.php">Kontak</a></li>
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