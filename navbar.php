<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$is_logged_in = isset($_SESSION['user_id']); 
$user_type = $_SESSION['user_type'] ?? 'user'; 

if ($user_type === 'admin') {
    $dashboard_link = 'dashboard_admin.php';
} else {
    $dashboard_link = 'dashboard.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar | Explore Bandung</title> 
<link rel="stylesheet" href="navbar.css">
</head>
<body>

<header class="navbar">
    <div class="logo">
        <div class="logo-circle">
            <img src="foto/LogoExploreBandung.jpeg" alt="Logo Explore Bandung"> </div>
        <div class="logo-text">
            <span>Explore Bandung</span>
            <span class="tagline">Bandung Tour</span>
        </div>
    </div>

    <nav class="nav-links">
        <a href="beranda.php">Beranda</a>
        <a href="paket.php">Paket Wisata</a>
        <a href="galeri.php">Galeri</a>
        <a href="Destinasi.php" >Destinasi</a>
        <a href="tentang_kami.php">Tentang Kami</a>
        <a href="hubungi.php">Kontak Kami</a>
        
        <?php if ($is_logged_in): ?>
            <a href="<?= $dashboard_link ?>" class="nav-dashboard-btn">Dashboard</a>
            <a href="logout.php" class="nav-logout-btn">Logout</a>
        <?php else: ?>
            <a href="login.php" class="nav-login-btn">Login</a>
        <?php endif; ?>
        </nav>

        

    
    <div class="hamburger" id="hamburger">
        <div></div>
        <div></div>
        <div></div>
    </div>

</header>

<script>
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.querySelector('.nav-links');

    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        document.body.classList.toggle('no-scroll');
    });
</script>

</body>
</html>