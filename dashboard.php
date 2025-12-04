<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Explore Bandung</title>
<link rel="stylesheet" href="dashboard.css">
</head>

<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="logo">Explore Bandung</div>
    <input type="text" placeholder="Cari di Explore Bandung..." class="search-box">
    <div class="icons">
        <i class="fas fa-shopping-cart"></i>
        <i class="fas fa-user"></i>
        <i class="fas fa-bars"></i>
    </div>
</header>

<!-- CONTAINER -->
<div class="content">

    <!-- AKUN ANDA -->
    <div class="card user-card">
        <img src="foto/default-avatar.png" class="avatar">
        <div class="user-info">
            <h3><?php echo $_SESSION['nama']; ?></h3>
            <p>Email: <?php echo $_SESSION['email']; ?></p>
        </div>

        <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
    </div>

    <!-- PREVIEW -->
    <h3 class="section-title">Preview Anda</h3>

    <div class="stats-container">

        <div class="stat-box green">
            <h4>Pemasukan</h4>
            <p>Rp 0</p>
        </div>

        <div class="stat-box red">
            <h4>Pengeluaran</h4>
            <p>Rp 0</p>
        </div>

        <div class="stat-box green">
            <h4>Penjualan</h4>
            <p>0 Item</p>
        </div>

        <div class="stat-box red">
            <h4>Pembelian</h4>
            <p>0 Item</p>
        </div>

    </div>

    <!-- PRODUK SAYA -->
    <h3 class="section-title">Produk Saya</h3>

    <div class="product-box">
        <p>Belum ada produk.</p>
        <button class="add-btn">+</button>
    </div>

</div>

</body>
</html>
