<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - ExploreBandung</title>
    <link rel="stylesheet" href="hubungi.css?v=<?= filemtime(__DIR__ . '/hubungi.css') ?>">
</head>
<?php include 'navbar.php'; ?>
<body>
    <div class="container">
        <header>
            <h1>Hubungi kami</h1>
            <h3>hubungi kami untuk menanyakan informasi lebih lanjut</h3>
        </header>

        <section class="contact-info">
            <div class="contact-section">
                <h3>WhatsApp</h3>
                <div class="contact-item">
                    <span>No. WhatsApp</span>
                    <a href="https://wa.me/628116550600" target="_blank"><u>+62 811-6550-600</u></a>
                </div>

            <div class="contact-section">
                <h3>Email</h3>
                <div class="contact-item">
                    <a href="mailto:naufalmuhdzaki@gmail.com"><u>Bandung@explore.com</u></a>
                </div>
            </div>
        </section>

        <hr>

        <section class="location-info">
            <h3>Lokasi Kami</h3>
            
            <div class="location-section">
                <h4>Medan</h4>
                <p>North Sumatra of University, Medan</p>
                <a href="https://maps.app.goo.gl/3TuMQWFyogWArFmw7" class="map-link"><u>View larger map</u></a>
            </div>

        </section>
    </div>

    <script src="hubungi.js"></script>
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