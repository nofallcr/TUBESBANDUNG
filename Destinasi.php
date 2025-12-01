<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi - Bandung</title>
    <link rel="stylesheet" href="Destinasi.css?v=<?= filemtime(__DIR__ . '/Destinasi.css') ?>">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <main class="content">
        <section class="hero">
            <h1>Destinasi Unggulan</h1>
            <p>Jelajahi destinasi kota Bandung dengan beberapa rekomendasi unggulan</p>
        </section>

        <section class="destinations-section">
            <div class="filter-buttons">
                
                <button class="filter-btn" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="campuran">Campuran</button>
                <button class="filter-btn" data-filter="perkotaan">Perkotaan</button>
                <button class="filter-btn" data-filter="alam">Alam</button>
                <button class="filter-btn" data-filter="sejarah">Sejarah</button>
            </div>

            <div class="destinations-grid">
                
                
                <div class="card" data-category="perkotaan sejarah campuran">
                    <div class="card-image">
                        <img src="uenk4abchnt8ey6hoajk (1).webp" alt="Campuran">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>Braga</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 4.8
                            <span>| 15 aktivitas</span>
                        </div>
                        <p>Braga adalah ikon kota Bandung, dan enggak mungkin liburan ke Bandung kalau enggak menyempatkan diri sekadar lewat atau bahkan singgah untuk menikmati hypenya Braga.</p>
                    </div>
                </div>

                
                <div class="card" data-category="sejarah campuran">
                    <div class="card-image">
                        <img src="je3kavfhjhslr3v3cjvm.webp" alt="The Great Asia Africa Lembang">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>The Great Asia Africa Lembang</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 4.7
                            <span>| 12 aktivitas</span>
                        </div>
                        <p>Satu tempat, tapi punya area instagramable bertema banyak negara? Kamu bisa menemukannya di The Great Asia Africa Lembang.</p>
                    </div>
                </div>

                
                <div class="card" data-category="alam campuran">
                    <div class="card-image">
                        <img src="y1ixdq0ldd37mipyyr6d.webp" alt="Dusun Bambu Lembang">
                        <span class="badge halal">STAR</span> 
                        </div>
                    <div class="card-content">
                        <div class="location-tag"></div>
                        <h2>Dusun Bambu Lembang</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 4.6
                            <span>| 10 aktivitas</span>
                        </div>
                        <p>Keindahan alam yang dikemas dengan suasana tradisional ala Sunda. Kombinasi yang pas untuk menghasilkan sebuah tempat wisata di Bandung yang menyenangkan.</p>
                    </div>
                </div>

                
                <div class="card" data-category="alam">
                    <div class="card-image">
                        <img src="yxh6ehzcddmco2ul9iyn.webp" alt="Floating Market Lembang">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>Floating Market Lembang</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 4.5
                            <span>| 8 aktivitas</span>
                        </div>
                        <p>Floating Market Lembang adalah salah satu tempat wisata di Lembang lainnya yang sangat populer! Terletak tak jauh dari Alun-Alun Lembang, Floating Market Lembang langsung populer begitu dibuka pertama kalinya dulu. </p>
                    </div>
                </div>
                
                
                <div class="card" data-category="campuran alam">
                    <div class="card-image">
                        <img src="y68a8lekkwmautpq5l5n.webp" alt="Farmhouse Lembang">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>Farmhouse Lembang</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 5.0
                            <span>| 25 aktivitas</span>
                        </div>
                        <p>Farmhouse Lembang adalah tempat wisata di area Lembang yang menawarkan pengalaman unik: theme park bergaya Eropa! Yup, selain bangunan-bangunannya yang bergaya Belanda, kamu pun bisa mengenakan kostum tradisional ala Belanda yang lucu.</p>
                    </div>
                </div>

                <div class="card" data-category="alam">
                    <div class="card-image">
                        <img src="law9ce4dvwoz0jidvffq.webp" alt="Glamping Lakeside Rancabali">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>Glamping Lakeside Rancabali</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 4.0
                            <span>| 45 aktivitas</span>
                        </div>
                        <p>Terletak enggak jauh dari Kawah Putih Ciwidey maupun Kampung Cai Ranca Upas,  merupakan area glamping yang terletak di sisi Situ Patenggang.</p>
                    </div>
                </div>

                <div class="card" data-category="alam">
                    <div class="card-image">
                        <img src="ranca.jpg" alt="Kampung Cai Ranca Upas">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>Kampung Cai Ranca Upas</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 3.8
                            <span>| 105 aktivitas</span>
                        </div>
                        <p>Jika ingin ke luar kota Bandung, Ciwidey adalah area yang wajib kamu kunjungi! Salah satu tempat wisata paling menarik di Ciwidey adalah Kampung Cai Ranca Upas. Selain punya area perkemahan yang cantik, Kampung Cai Ranca Upas juga punya Peternakan Kuda yang menyenangkan untuk dikunjungi. Selain itu juga ada berbagai permainan outbound yang bisa kamu coba di sana bersama keluarga. Eh, di sini ada kolam pemandian air panas alaminya juga, lho!</p>
                    </div>
                </div>

                <div class="card" data-category="alam">
                    <div class="card-image">
                        <img src="Alam 2.jpg" alt="Kawah Putih Ciwidey">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>Kawah Putih Ciwidey</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 5.0
                            <span>| 30 aktivitas</span>
                        </div>
                        <p>Sering melihat Kawah Putih menjadi latar untuk foto-foto yang Instagramable? Well, memang sepopuler itu tempat wisata di Bandung ini. Buat yang belum pernah ke sini, wajib banget setidaknya sekali seumur hidup lihat pemandangan kawah putih</p>
                    </div>
                </div>
                
                <div class="card" data-category="campuran perkotaan sejarah">
                    <div class="card-image">
                        <img src="perkotaan5.webp" alt="Museum Konfersi Asia Afrika">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>Museum Konfersi Asia Afrika</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 4.0
                            <span>| 200 aktivitas</span>
                        </div>
                        <p>Museum Konferensi Asia Afrika berada di Jl. Asia Afrika No.65, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat, tepat di dalam kompleks Gedung Merdeka. Museum ini menjadi salah satu tempat bersejarah yang penting, karena di sinilah momen besar Konferensi Asia Afrika tahun 1955 diabadikan. Berada di pusat kota, museum ini mudah diakses dan dikelilingi oleh bangunan-bangunan klasik yang menambah kesan sejarah saat kamu mengunjunginya.</p>
                    </div>
                </div>

                <div class="card" data-category="campuran perkotaan sejarah">
                    <div class="card-image">
                        <img src="perkotaan2.jpeg" alt="Gedung Pakuan">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>Gedung Pakuan</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 5.0
                            <span>| 455 aktivitas</span>
                        </div>
                        <p>Pembangunan Gedung Pakuan berlangsung pada tahun 1864-1867. Pada masa kolonial, gedung keresidenan di Bandung tidak memiliki nama istimewa yakni hanya disebut sebagai Woning van Resident te Bandoeng (Kediaman Residen di Bandung). Lokasi Gedung Keresidenan berada di ujung Jalan Karesidenan (Residentweg) yang sekarang dikenal dengan nama Jalan Otto Iskandar Dinata.</p>
                    </div>
                </div>

                <div class="card" data-category="perkotaan sejarah">
                    <div class="card-image">
                        <img src="perkotaan3.webp" alt="Gedung Sate">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>Gedung Sate</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 4.5
                            <span>| 233 aktivitas</span>
                        </div>
                        <p>Gedung Sate, yang terletak di pusat Kota Bandung, tepatnya di Jl. Diponegoro No.22, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat, merupakan salah satu bangunan terkenal yang wajib kamu kunjungi saat berada di kota ini. Bangunan ini dikenal dengan arsitektur uniknya yang memadukan gaya tradisional dan Eropa, ditandai dengan simbol tusuk sate di puncak menaranya yang menjadi ciri khasnya. Daya tarik utama Gedung Sate tidak hanya terletak pada desain arsitekturnya yang klasik, tetapi juga nilai sejarah yang dimilikinya.</p>
                    </div>
                </div>

                <div class="card" data-category="perkotaan sejarah">
                    <div class="card-image">
                        <img src="perkotaan4.webp" alt="Gedung Merdeka">
                        <span class="badge halal">STAR</span>
                    </div>
                    <div class="card-content">
                        <h2>Gedung Merdeka</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i> 3.5
                            <span>| 200 aktivitas</span>
                        </div>
                        <p>Gedung Merdeka, yang terletak di Jl. Asia Afrika No.65, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat, adalah salah satu tempat bersejarah yang menjadi kebanggaan kota ini. Gedung ini dikenal sebagai lokasi penyelenggaraan Konferensi Asia Afrika pada tahun 1955, sebuah peristiwa penting yang mempertemukan negara-negara dari kedua benua untuk memperjuangkan kemerdekaan dan solidaritas di tengah kolonialisme. Lokasinya yang strategis di tengah Kota Bandung, dikelilingi bangunan klasik lainnya, membuat Gedung Merdeka menjadi daya tarik bagi wisatawan yang memiliki minat terhadap sejarah.</p>
                    </div>
                </div>

                
                </div>
                </div>
            </div>
        </section>

    </main>
<script src="Destinasi.js"></script>

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