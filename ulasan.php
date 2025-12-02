<?php include 'testimoni.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan-Pengguna</title>
    <link rel="stylesheet" href="ulasan_style.css?v=<?= filemtime(__DIR__ . '/ulasan_style.css') ?>">
</head>
<body>
    <section class="ulasan-section">
    <h2 class="judul-ulasan">Ulasan</h2>
    <p class="sub-judul">Gabung bersama ratusan pelanggan puas kami.</p>

    <div class="ulasan-container">
        <?php foreach ($testimoni as $t): ?>
        <div class="ulasan-card">
            <div class="avatar" style="background: <?= $t['avatar_color']; ?>">
                <?= $t['nama']; ?>
            </div>
            
            <div class="stars">
                ★★★★★
            </div>

            <p class="pesan">"<?= $t['pesan']; ?>"</p>

            <h4 class="nama"><?= $t['tambahan']; ?></h4>
            <p class="lokasi"><?= $t['lokasi']; ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>
</body>

<script src="ulasan.js"></script>
</html>



