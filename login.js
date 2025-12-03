document.addEventListener("DOMContentLoaded", function () {
  const authForm = document.getElementById("authForm");
  const submitBtn = document.getElementById("submitBtn");
  const switchModeLink = document.getElementById("switchModeLink");
  const nameGroup = document.getElementById("nameGroup");
  const nameInput = document.getElementById("name");

  const pageTitle = document.getElementById("pageTitle");
  const subTitle = document.getElementById("subTitle");
  const switchText = document.getElementById("switchText");
  const passwordInput = document.getElementById("password");

  const togglePassword = document.getElementById("togglePassword");

  togglePassword.addEventListener("click", function () {
    const type =
      passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    this.classList.toggle("fa-eye-slash");
    this.classList.toggle("fa-eye");
  });

  switchModeLink.addEventListener("click", function (event) {
    event.preventDefault();
    const currentMode = switchModeLink.getAttribute("data-mode");

    if (currentMode === "login") {
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

  authForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const currentMode = switchModeLink.getAttribute("data-mode");
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (currentMode === "login") {
      if (email === "" || password === "") {
        alert("❌ Error: Email dan Kata Sandi harus diisi!");
        return;
      }

      // --- Logika Simulasi Login (Cek LocalStorage) ---
      const registeredUser = localStorage.getItem("registeredUser");
      let success = false;
      let userName = "";

      if (registeredUser) {
        const user = JSON.parse(registeredUser);
        if (user.email === email && user.password === password) {
          success = true;
          userName = user.name;
          // Simpan status login di sessionStorage agar bisa dilacak di halaman berikutnya
          sessionStorage.setItem("loggedIn", "true");
          sessionStorage.setItem("userName", userName);
        }
      }

      if (success) {
        alert("✅ Login Berhasil!\nSelamat datang, " + userName + "!");
        // Mengarahkan ke halaman PHP, di mana Session PHP akan diinisialisasi
        window.location.href = "beranda.php";
      } else {
        alert(
          "❌ Error: Email atau Kata Sandi salah, atau akun belum terdaftar."
        );
      }
      // --- Akhir Logika Simulasi Login ---
    } else {
      const name = nameInput.value;
      if (name === "" || email === "" || password === "") {
        alert("❌ Error: Semua kolom harus diisi!");
        return;
      }

      // --- Logika Simulasi Registrasi (Simpan ke LocalStorage) ---
      const userCredentials = {
        name: name,
        email: email,
        password: password,
      };
      localStorage.setItem("registeredUser", JSON.stringify(userCredentials));

      alert(`🎉 Akun ${name} berhasil didaftarkan! Anda dapat login sekarang.`);

      // Alihkan kembali ke mode Login
      switchModeLink.click();
      // --- Akhir Logika Simulasi Registrasi ---
    }
  });
});
