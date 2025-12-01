<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Paket Wisata</title>
    <link rel="stylesheet" href="paket.css?v=<?= filemtime(__DIR__ . '/paket.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">

    <header class="hero-section">
        <h1>Paket Tiket Wisata Unggulan</h1>
        <p>Pilih paket terbaik untuk petualangan seru Anda di Bandung!</p>
    </header>

    <nav class="category-nav">
        <button class="active" data-filter="all">Semua Paket</button>
        <button data-filter="harian">Paket Harian</button>
        <button data-filter="keluarga">Paket Keluarga</button>
        <button data-filter="trip">Paket Trip</button>
    </nav>

    <div class="package-grid">

        <!-- PAKET HARIAN -->
        <div class="package-card" data-category="harian"> 
            <img src="uenk4abchnt8ey6hoajk (1).webp" alt="Gambar Braga">
            <div class="card-content">
                <span class="package-type harian">Paket Harian</span>
                <h3>Braga - Kenangan Lama</h3>
                <p class="description">Tiket masuk utama dan akses ke spot foto premium. Cocok untuk wisatawan solo atau berpasangan.</p>
                <div class="card-info">
                    <div class="rating">
                        <i class="fas fa-star"></i> 4.5
                    </div>
                    <div class="price">
                        Rp 105.000
                    </div>
                </div>

                <button class="buy-button" type="button"
                    onclick="location.href='order.php?paket=Braga&harga=75000&lokasi=Braga'">
                    <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                </button>

            </div>
        </div>

        <div class="package-card" data-category="harian">
            <img src="je3kavfhjhslr3v3cjvm.webp" alt="Gambar The Great Asia Africa">
            <div class="card-content">
                  <span class="package-type harian">Paket Harian</span>
                <h3>Asia Africa - Keliling Dunia</h3>
                <p class="description">Akses penuh ke semua zona, termasuk penyewaan kostum tradisional gratis selama 2 jam.</p>
                <div class="card-info">
                    <div class="rating">
                        <i class="fas fa-star"></i> 4.8
                    </div>
                    <div class="price">
                        Rp 150.000
                    </div>
                </div>

                <button class="buy-button" type="button"
                    onclick="location.href='order.php?paket=Asia Africa&harga=150000&lokasi=Asia Afrika'">
                    <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                </button>

            </div>
        </div>

       
        <div class="package-card" data-category="keluarga">
            <img src="y1ixdq0ldd37mipyyr6d.webp" alt="Gambar Dusun Bambu Lembang">
            <div class="card-content">
                <span class="package-type family">Paket Keluarga</span>
                <h3>Dusun Bambu - Damai Alam</h3>
                <p class="description">Paket 4 orang termasuk makan dan penginapan. Liburan hemat untuk keluarga kecil</p>
                <div class="card-info">
                    <div class="rating">
                        <i class="fas fa-star"></i> 4.7
                    </div>
                    <div class="price">
                        Rp 1.900.000
                    </div>
                </div>

                <button class="buy-button" type="button"
                    onclick="location.href='order.php?paket=Dusun Bambu&harga=220000&lokasi=Dusun Bambu Lembang'">
                    <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                </button>

            </div>
        </div>
                    <div class="package-card" data-category="trip">
            <img src="alam.jpg" alt="alam">
            <div class="card-content">
                <span class="package-type trip">Paket Trip</span>
                <h3>Trip Alam</h3>
                <p class="description">Menyelusuri indahnya alam bandung yang indah dengan diselimuti dinginnya hawa kota Bandung.</p>
                <div class="card-info">
                    <div class="rating">
                        <i class="fas fa-star"></i> 4.7
                    </div>
                    <div class="price">
                        Rp 300.000
                    </div>
                </div>

                <button class="buy-button" type="button"
                    onclick="location.href='order.php?paket=Dusun Bambu&harga=220000&lokasi=Dusun Bambu Lembang'">
                    <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                </button>

            </div>
        </div>
                <div class="package-card" data-category="trip">
            <img src="sejarah.jpg" alt="sejarah bandung">
            <div class="card-content">
               <span class="package-type trip">Paket Trip</span>
                <h3>Trip Sejarah</h3>
                <p class="description">Paket untuk menjelajahi sejarah bandung yang sangat istimewa nan historis yang panjang</p>
                <div class="card-info">
                    <div class="rating">
                        <i class="fas fa-star"></i> 4.5
                    </div>
                    <div class="price">
                        Rp 150.000
                    </div>
                </div>

                <button class="buy-button" type="button"
                    onclick="location.href='order.php?paket=TripSejarah&harga=150000&lokasi=Sekitar Bandung'">
                    <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                </button>

            </div>
        </div>
                <div class="package-card" data-category="keluarga">
            <img src="ranca.jpg" alt="ranca">
            <div class="card-content">
                <span class="package-type family">Paket Keluarga</span>
                <h3>Kampung Cai Ranca Upas</h3>
                <p class="description">tempat yang cocok untuk liburan bersama keluarga dengan penginapan alam.</p>
                <div class="card-info">
                    <div class="rating">
                        <i class="fas fa-star"></i> 4.7
                    </div>
                    <div class="price">
                        Rp 2.200.000
                    </div>
                </div>

                <button class="buy-button" type="button"
                    onclick="location.href='order.php?paket=Dusun Bambu&harga=220000&lokasi=Dusun Bambu Lembang'">
                    <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                </button>

            </div>
        </div>
    </div>
</div>

<script src="paket.js"></script>
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
