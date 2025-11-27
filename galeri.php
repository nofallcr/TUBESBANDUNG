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
</html>