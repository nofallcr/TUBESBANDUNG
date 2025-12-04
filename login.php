<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Explore Bandung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="login.css?v=<?= filemtime(__DIR__ . '/login.css') ?>">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h2 id="formTitle">Login Explore Bandung</h2>
            <img src ="foto/LogoExploreBandung.jpeg" alt="Logo Explore Bandung" class="logo-image">

            <form id="authForm" autocomplete="off">
                <div class="form-group" id="nameGroup" style="display:none;">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan Nama Anda">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>
                </div>

                <div class="form-group password-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi" required>
                        <span id="togglePassword" class="toggle-icon"><i class="fas fa-eye-slash"></i></span>
                    </div>
                </div>

                <button type="submit" id="submitBtn">Login</button>

                <p class="switch-text">
                    <span id="switchText">Belum punya akun?</span>
                    <a href="#" id="switchModeLink" data-mode="login">Daftar</a>
                </p>
            </form>
            <a href="beranda.php" class="back-btn">← Kembali ke Beranda</a>

        </div>
    </div>
    <script src="login.js?v=<?= filemtime(__DIR__ . '/login.js') ?>"></script>
</body>
</html>