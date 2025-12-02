<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Explore Bandung</title>
    <link rel="stylesheet" href="hubungi.css?v=<?= filemtime(__DIR__ . '/hubungi.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php include 'navbar.php'; ?>

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
                    <a href="https://wa.me/6287865865525" target="_blank">
                        <u>+62 878-6586-5525</u>
                    </a>
                </div>
            </div>

            <div class="contact-section">
                <h3>Email</h3>
                <div class="contact-item">
                    <a href="mailto:yamotarohiafarel@gmail.com"><u>Bandung@explore.com</u></a>
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

    <?php $year = date("Y"); ?>

    <footer class="footer">
        <div class="footer-container">

            <div class="footer-brand">
                <div class="brand-icon">
                    <img src="foto/LogoExploreBandung.jpeg" alt="Logo">
                </div>
                <h2>Explore Bandung</h2>
                <p class="brand-sub">Destinasi</p>

                <p class="brand-desc">
                    Destinasi wisata Bandung dengan pilihan unggul dan perjalanan nyaman
                </p>
            </div>

            <div class="footer-col">
                <h3>Pelayanan</h3>
                <ul>
                    <li><a href="paket.php">Paket Harian</a></li>
                    <li><a href="paket.php">Paket Keluarga</a></li>
                    <li><a href="paket.php">Trip Alam</a></li>
                    <li><a href="paket.php">Trip Sejarah</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Contact</h3>
                <ul>
                    <li>WA 1 +62 878-6586-5525</li>
                    <li>📧 Bandung@explore.com</li>
                    <li>📍 Medan, North Sumatra</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>Hak Cipta © <?php echo date("Y"); ?> Explore Bandung Kelompok 7. Semua Hak Dilindungi.</p>
            <p>Wisata Tenang & Nyaman – Your Trusted Explorer Companion</p>
        </div>

        <div class="wa-button" id="waBtn">
            <img src="foto/wa.png" alt="WhatsApp">
        </div>
    </footer>

    <script src="hubungi.js"></script>

</body>
</html>
