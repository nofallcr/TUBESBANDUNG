document.addEventListener("DOMContentLoaded", function() {
    const authForm = document.getElementById("authForm");
    const submitBtn = document.getElementById("submitBtn");
    const switchModeLink = document.getElementById("switchModeLink");
    const nameGroup = document.getElementById("nameGroup");
    const nameInput = document.getElementById("name");
    const formTitle = document.getElementById("formTitle");
    const switchText = document.getElementById("switchText");
    const passwordInput = document.getElementById("password");

    // switch mode login/register
    switchModeLink.addEventListener("click", function(e){
        e.preventDefault();
        const mode = switchModeLink.getAttribute("data-mode");
        if(mode === "login"){
            switchModeLink.setAttribute("data-mode","register");
            formTitle.textContent = "Daftar Explore Bandung";
            submitBtn.textContent = "Daftar Sekarang";
            nameGroup.style.display = "block";
            switchText.textContent = "Sudah punya akun?";
            switchModeLink.textContent = "Login";
        } else {
            switchModeLink.setAttribute("data-mode","login");
            formTitle.textContent = "Login Explore Bandung";
            submitBtn.textContent = "Login";
            nameGroup.style.display = "none";
            switchText.textContent = "Belum punya akun?";
            switchModeLink.textContent = "Daftar";
        }
    });

    // submit form
    authForm.addEventListener("submit", function(e){
        e.preventDefault();
        const mode = switchModeLink.getAttribute("data-mode");
        const email = document.getElementById("email").value;
        const password = passwordInput.value;
        const formData = new FormData();
        formData.append("mode", mode);
        formData.append("email", email);
        formData.append("password", password);
        if(mode === "register"){
            const name = nameInput.value;
            formData.append("name", name);
        }

        fetch("auth.php", {method:"POST", body:formData})
        .then(res=>res.text())
        .then(data=>{
            alert(data);
            if(data.includes("Login berhasil")){
                window.location.href = "beranda.php";
            } else if(data.includes("Registrasi berhasil")){
                switchModeLink.click(); // balik ke login
            }
        });
    });
});
