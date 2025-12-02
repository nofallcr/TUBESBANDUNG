<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 40px;
    background: linear-gradient(90deg, #0d162b, #131a2e);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.logo {
    display: flex;
    align-items: center;
    gap: 15px;
}

.logo-circle {
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 50%;
    padding: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo-circle img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.logo-text {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}

.logo-text span:first-child {
    font-size: 20px;
    font-weight: 700;
    color: #ffffff;
}

.logo-text .tagline {
    font-size: 13px;
    color: #92a3c7;
}

.nav-links {
    display: flex;
    align-items: center;
    gap: 25px;
}

.nav-links a {
    color: #c9d1d9;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: 0.3s;
}

.nav-links a:hover {
    color: white;
}

.lang-toggle {
    font-weight: 600;
}

.login-btn {
    padding: 8px 18px;
    border-radius: 20px;
    background: #5d5dff;
    color: white !important;
    font-weight: 600;
    transition: 0.3s;
}

.login-btn:hover {
    background: transparent;
    border: 1px solid #5d5dff;
}

.hamburger {
    display: none;
    flex-direction: column;
    cursor: pointer;
    gap: 5px;
}

.hamburger div {
    width: 25px;
    height: 3px;
    background-color: #c9d1d9;
    transition: 0.3s;
}



@media (max-width: 768px) {
    .nav-links {
        position: absolute;
        top: 80px;
        right: 0;
        background: linear-gradient(90deg, #0d162b, #131a2e);
        flex-direction: column;
        width: 200px;
        padding: 20px;
        gap: 15px;
        display: none;
        border-left: 1px solid rgba(255,255,255,0.05);
        border-bottom: 1px solid rgba(255,255,255,0.05);
        z-index: 999; 
    }

    .nav-links.active {
        display: flex;
    }

    .hamburger {
        display: flex;
        z-index: 1000; 
    }
}

</style>
</head>
<body>

<header class="navbar">
    <div class="logo">
        <div class="logo-circle">
            <img src="LogoExploreBandung.jpeg" alt="Bandung Logo">
        </div>
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
    <a href="login_signup.php">Login</a>
    <a href="#" class="lang-toggle">🇮🇩 EN</a>
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
});
</script>

</body>
</html>
