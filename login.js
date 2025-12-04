document.addEventListener("DOMContentLoaded", function() {
    const authForm = document.getElementById("authForm");
    const submitBtn = document.getElementById("submitBtn");
    const switchModeLink = document.getElementById("switchModeLink");
    const nameGroup = document.getElementById("nameGroup");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email"); 
    const passwordInput = document.getElementById("password");
    const formTitle = document.getElementById("formTitle");
    const switchText = document.getElementById("switchText");
    const errorMessage = document.createElement("p"); 

<<<<<<< HEAD
    errorMessage.style.color = "red";
    errorMessage.style.marginTop = "10px";
    errorMessage.id = "errorMessage";
    authForm.prepend(errorMessage);

    /**
     * @param {string} msg 
     */
    function displayError(msg = "") {
        errorMessage.textContent = msg;
    }

    // --- Penanganan Pengalihan Mode (Login/Register) ---
=======
>>>>>>> 94855c63d413103ee4e77922e8fb5e71d0dbf950
    
    switchModeLink.addEventListener("click", function(e){
        e.preventDefault();
        displayError(""); // Bersihkan pesan error saat mode berubah
        
        // Ambil mode saat ini, default ke 'login' jika tidak ada
        const currentMode = switchModeLink.getAttribute("data-mode") || "login"; 
        
        // Mode berikutnya adalah kebalikan dari mode saat ini
        const newMode = currentMode === "login" ? "register" : "login";
        
        switchModeLink.setAttribute("data-mode", newMode);

        if(newMode === "register"){
            formTitle.textContent = "Daftar Explore Bandung";
            submitBtn.textContent = "Daftar Sekarang";
            nameGroup.style.display = "block";
            switchText.textContent = "Sudah punya akun?";
            switchModeLink.textContent = "Login";
            nameInput.required = true; // Set field Nama wajib diisi
        } else { // Mode login
            formTitle.textContent = "Login Explore Bandung";
            submitBtn.textContent = "Login";
            nameGroup.style.display = "none";
            switchText.textContent = "Belum punya akun?";
            switchModeLink.textContent = "Daftar";
            nameInput.required = false; // Set field Nama tidak wajib diisi
        }
    });


    authForm.addEventListener("submit", function(e){
        e.preventDefault();
        displayError(""); 
        const mode = switchModeLink.getAttribute("data-mode") || "login"; 
        const email = emailInput.value.trim();
        const password = passwordInput.value;
        const name = nameInput.value.trim();

        if (!email || !password) {
            displayError("Email dan Password wajib diisi.");
            return; 
        }
        if (mode === "register" && !name) {
            displayError("Nama wajib diisi untuk Pendaftaran.");
            return; 
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            displayError("Format email tidak valid.");
            return;
        }
       
        const formData = new FormData();
        formData.append("mode", mode);
        formData.append("email", email);
        formData.append("password", password);
        
        if(mode === "register"){
            formData.append("name", name);
        }

        submitBtn.disabled = true; 
        submitBtn.textContent = "Memproses...";

        fetch("auth.php", {method: "POST", body: formData})
        .then(res => res.text())
        .then(data => {
          
            
            submitBtn.disabled = false; 
            
            if(data.includes("Login berhasil")){
                window.location.href = "dashboard.php";
            } else if(data.includes("Registrasi berhasil")){
<<<<<<< HEAD
                displayError("Registrasi berhasil! Silakan Login.");
                
                
                switchModeLink.click(); 
                
                emailInput.value = "";
                passwordInput.value = "";
                nameInput.value = "";
            } else {
                displayError(data); 
=======
                switchModeLink.click(); 
>>>>>>> 94855c63d413103ee4e77922e8fb5e71d0dbf950
            }
            
            submitBtn.textContent = mode === 'login' ? 'Login' : 'Daftar Sekarang';

        })
        .catch(error => {
            displayError("Terjadi kesalahan jaringan atau server tidak merespons.");
            submitBtn.disabled = false;
            submitBtn.textContent = mode === 'login' ? 'Login' : 'Daftar Sekarang';
            console.error('Error:', error);

        
        });
    });
});