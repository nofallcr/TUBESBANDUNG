<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h2 id="formTitle">Login Admin</h2>
            <img src ="foto/LogoExploreBandung.jpeg" alt="Logo Explore Bandung" class="logo-image">

            <form id="adminAuthForm" autocomplete="off">
                <p id="errorMessage" style="color: red; margin-top: 10px;"></p>
                
                <div class="form-group">
                    <label for="username">Username Admin</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username Admin" required value="Farel123">
                </div>

                <div class="form-group password-group">
                    <label for="adminPassword">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="adminPassword" name="password" placeholder="Masukkan Kata Sandi" required value="adminganteng">
                        <span id="toggleAdminPassword" class="toggle-icon"><i class="fas fa-eye-slash"></i></span>
                    </div>
                </div>

                <button type="submit" id="adminSubmitBtn">Login Admin</button>

                <p class="switch-text" style="margin-top: 15px;">
                    <a href="login.php" class="user-login-link">Login Pengguna</a>
                </p>
            </form>
            <a href="beranda.php" class="back-btn">← Kembali ke Beranda</a>

        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const authForm = document.getElementById("adminAuthForm");
            const submitBtn = document.getElementById("adminSubmitBtn");
            const passwordInput = document.getElementById("adminPassword");
            const togglePassword = document.getElementById("toggleAdminPassword");
            const errorMessage = document.getElementById("errorMessage"); 
            
            function displayError(msg = "") {
                errorMessage.textContent = msg;
            }

           
            if (togglePassword) {
                togglePassword.addEventListener('click', function () {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('fa-eye');
                        icon.classList.toggle('fa-eye-slash');
                    }
                });
            }

            
            authForm.addEventListener("submit", function(e){
                e.preventDefault();
                displayError(""); 
                
                const username = document.getElementById("username").value.trim();
                const password = passwordInput.value;

                if (!username || !password) {
                    displayError("Username dan Password wajib diisi.");
                    return; 
                }
                
                const formData = new FormData();
                formData.append("username", username);
                formData.append("password", password);
                

                submitBtn.disabled = true; 
                submitBtn.textContent = "Memproses...";

                
                fetch("admin_auth.php", {method: "POST", body: formData})
                .then(res => res.text()) 
                .then(data => {
                    submitBtn.disabled = false; 
                    
                    
                    if(data.trim() === "Login Admin berhasil"){
                        
                        window.location.href = "dashboard_admin.php";
                    } else {
                        
                        displayError(data); 
                    }
                    
                    submitBtn.textContent = 'Login Admin';

                })
                .catch(error => {
                    displayError("Terjadi kesalahan jaringan atau server tidak merespons.");
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Login Admin';
                    console.error('Error:', error);
                });
            });
        }); 
    </script>
</body>
</html>