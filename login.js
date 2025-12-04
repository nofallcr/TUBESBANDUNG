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
            const togglePassword = document.getElementById("togglePassword"); 

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

            
            if (togglePassword) {
                togglePassword.addEventListener('click', function (e) {
                    
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('fa-eye');
                        icon.classList.toggle('fa-eye-slash');
                    }
                });
            }
            
            
            switchModeLink.addEventListener("click", function(e){
                e.preventDefault();
                displayError(""); 
                
                
                if (passwordInput.type === 'text') {
                    passwordInput.type = 'password';
                    const icon = togglePassword.querySelector('i');
                    if (icon) {
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    }
                }
                
                const currentMode = switchModeLink.getAttribute("data-mode") || "login"; 
                
                const newMode = currentMode === "login" ? "register" : "login";
                
                switchModeLink.setAttribute("data-mode", newMode);

                if(newMode === "register"){
                    formTitle.textContent = "Daftar Explore Bandung";
                    submitBtn.textContent = "Daftar Sekarang";
                    nameGroup.style.display = "block";
                    switchText.textContent = "Sudah punya akun?";
                    switchModeLink.textContent = "Login";
                    nameInput.required = true; 
                } else { 
                    formTitle.textContent = "Login Explore Bandung";
                    submitBtn.textContent = "Login";
                    nameGroup.style.display = "none";
                    switchText.textContent = "Belum punya akun?";
                    switchModeLink.textContent = "Daftar";
                    nameInput.required = false; 
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
                        displayError("Registrasi berhasil! Silakan Login.");
                        
                        
                        switchModeLink.click(); 
                        
                        emailInput.value = "";
                        passwordInput.value = "";
                        nameInput.value = "";
                    } else {
                        displayError(data); 
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