<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="pageTitle">Login Explore Bandung</title>
    <link rel="stylesheet" href="login.css?v=<?= filemtime(__DIR__ . '/login.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="login-container">
        
        <div class="login-card" id="authCard"> 
            
            <div class="header-logo">
                <div class="logo-text">
                    <h2 id="mainTitle">Explore Bandung</h2> 
                    <p id="subTitle">Login Explore Bandung</p>
                </div>
                <img src="foto/LogoExploreBandung.jpeg" alt="Logo Explore Bandung" class="logo-img">
            </div>
            
            <form id="authForm">
                <div class="form-group" id="nameGroup" style="display:none;">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" placeholder="Masukkan Nama Anda">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Masukkan Email Anda" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" id="password" placeholder="Masukkan Kata Sandi" required>
                        <i class="fas fa-eye" id="togglePassword"></i>
                    </div>
                </div>

                <button type="submit" id="submitBtn" class="login-btn">
                    Login
                </button>

                <div class="register-link">
                    <span id="switchText">Belum punya akun?</span> 
                    <a href="" id="switchModeLink" data-mode="login">Daftar</a>
                  
                </div>
                
                <div class="back-home">
                  <a href="beranda.php">Kembali ke Beranda</a>
                </div>
                
            </form>
    </div>
    <script src="login.js"></script> 
</body>
</html>