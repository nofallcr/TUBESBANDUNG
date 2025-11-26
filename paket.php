<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Paket Wisata</title>
    <link rel="stylesheet" href="paket.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <header class="hero-section">
            <h1> Paket Tiket Wisata Unggulan</h1>
            <p>Pilih paket terbaik untuk petualangan seru Anda di Bandung!</p>
        </header>

        <nav class="category-nav">
            <button class="active">Semua Paket</button>
            <button>Paket Harian</button>
            <button>Paket Keluarga</button>
            <button>Paket Promo</button>
        </nav>

        <div class="package-grid">

            <div class="package-card">
                <img src="uenk4abchnt8ey6hoajk (1).webp" alt="Gambar Braga">
                <div class="card-content">
                    <span class="package-type">Reguler</span>
                    <h3>Braga - Kenangan Lama</h3>
                    <p class="description">Tiket masuk utama dan akses ke spot foto premium. Cocok untuk wisatawan solo atau berpasangan.</p>
                    <div class="card-info">
                        <div class="rating">
                            <i class="fas fa-star"></i> 4.5
                        </div>
                        <div class="price">
                            Rp 75.000
                        </div>
                    </div>
<button class="buy-button" type="button"
    onclick="location.href='order.php?paket=Braga&harga=75000&lokasi=Braga'">
    <i class="fas fa-shopping-cart"></i> Pesan Sekarang
</button>
                </div>
            </div>

            <div class="package-card">
                <img src="uenk4abchnt8ey6hoajk (1).webp" alt="Gambar The Great Asia Africa">
                <div class="card-content">
                    <span class="package-type premium">Premium</span>
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
                   <!-- Contoh Paket 2 -->
<button class="buy-button" type="button"
    onclick="location.href='order.php?paket=Asia Africa&harga=150000&lokasi=Asia Afrika'">
    <i class="fas fa-shopping-cart"></i> Pesan Sekarang
</button>
                </div>
            </div>

            <div class="package-card">
                <img src="uenk4abchnt8ey6hoajk (1).webp" alt="Gambar Dusun Bambu Lembang">
                <div class="card-content">
                    <span class="package-type family">Keluarga (4 Pax)</span>
                    <h3>Dusun Bambu - Damai Alam</h3>
                    <p class="description">Paket 4 orang termasuk voucher makan senilai Rp 50.000. Liburan hemat untuk keluarga kecil.</p>
                    <div class="card-info">
                        <div class="rating">
                            <i class="fas fa-star"></i> 4.7
                        </div>
                        <div class="price">
                            Rp 220.000
                        </div>
                    </div>
                   <button class="buy-button" type="button"
    onclick="location.href='order.php?paket=Dusun Bambu&harga=220000&lokasi=Dusun Bambu Lembang'">
    <i class="fas fa-shopping-cart"></i> Pesan Sekarang
</button>
                    </button>
                </div>
            </div>

            </div>
    </div>
    
    <script src ="paket.js"></script>
</body>
</html>