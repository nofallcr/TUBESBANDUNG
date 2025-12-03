document.addEventListener("DOMContentLoaded", function () {
    const authForm = document.getElementById("authForm");
    const submitBtn = document.getElementById("submitBtn");
    const switchModeLink = document.getElementById("switchModeLink");
    const nameGroup = document.getElementById("nameGroup");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");

    const pageTitle = document.getElementById("pageTitle");
    const subTitle = document.getElementById("subTitle");
    const switchText = document.getElementById("switchText");
    const togglePassword = document.getElementById("togglePassword");

    // Toggle Password Visibility Logic
    togglePassword.addEventListener("click", function () {
        const type =
            passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        this.classList.toggle("fa-eye-slash");
        this.classList.toggle("fa-eye");
    });

    // Switch Mode Logic
    switchModeLink.addEventListener("click", function (event) {
        event.preventDefault();
        const currentMode = switchModeLink.getAttribute("data-mode");

        if (currentMode === "login") {
            // SWITCH KE REGISTER
            switchModeLink.setAttribute("data-mode", "register");
            pageTitle.textContent = "Daftar Explore Bandung";
            subTitle.textContent = "Daftar Akun Baru";
            submitBtn.textContent = "Daftar Sekarang";
            submitBtn.style.backgroundColor = "#28a745";
            switchText.textContent = "Sudah punya akun?";
            switchModeLink.textContent = "Login";
            nameGroup.style.display = "block";
            passwordInput.placeholder = "Buat Kata Sandi";
        } else {
            // SWITCH KE LOGIN
            switchModeLink.setAttribute("data-mode", "login");
            pageTitle.textContent = "Login Explore Bandung";
            subTitle.textContent = "Login Explore Bandung";
            submitBtn.textContent = "Login";
            submitBtn.style.backgroundColor = "#007bff";
            switchText.textContent = "Belum punya akun?";
            switchModeLink.textContent = "Daftar";
            nameGroup.style.display = "none";
            passwordInput.placeholder = "Masukkan Kata Sandi";
        }
    });

    // 🔥 LOGIKA UTAMA: Koneksi ke Database via AJAX (Mengirim ke process.php)
    authForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const currentMode = switchModeLink.getAttribute("data-mode");
        const email = emailInput.value;
        const password = passwordInput.value;
        const name = nameInput.value;

        // Validasi
        if (currentMode === "login" && (email === "" || password === "")) {
            alert("❌ Error: Email dan Kata Sandi harus diisi!");
            return;
        }
        if (currentMode === "register" && (name === "" || email === "" || password === "")) {
            alert("❌ Error: Semua kolom harus diisi!");
            return;
        }

        // Siapkan data form
        const formData = new FormData();
        formData.append('email', email);
        formData.append('password', password);
        // Parameter kunci yang memberi tahu process.php apa yang harus dilakukan
        formData.append('mode', currentMode); 
        
        if (currentMode === "register") {
            formData.append('name', name);
        }

        // Target URL selalu process.php
        const targetUrl = 'process.php'; 

        // Lakukan pengiriman data (AJAX/Fetch)
        fetch(targetUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                // Tangkap error 404/500/dll. yang menyebabkan "kesalahan koneksi server"
                throw new Error(`Server respons dengan status: ${response.status} (${response.statusText})`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert(`✅ ${data.message}${data.name ? "\nSelamat datang, " + data.name + "!" : ""}`);
                
                if (currentMode === "login") {
                    window.location.href = "beranda.php";
                } else {
                    emailInput.value = '';
                    passwordInput.value = '';
                    nameInput.value = '';
                    switchModeLink.click(); 
                }
            } else {
                alert(`❌ Error: ${data.message}`);
            }
        })
        .catch(error => {
            console.error('Terjadi kesalahan koneksi:', error);
            alert(`❌ GAGAL KONEKSI SERVER:\n${error.message}\n\nPastikan: \n1. XAMPP/WAMP (Apache & MySQL) berjalan.\n2. File 'process.php' ada di root folder.`);
        });
    });
});