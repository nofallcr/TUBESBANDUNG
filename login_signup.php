<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login dan Signup</title>
<link rel="stylesheet" href="login.css?v=<?= filemtime(__DIR__ . '/login.css') ?>">

</head>

<body>
  <div class="container">
 
    <div class="form-container">
      <div class="tab-buttons">
        <button id="loginBtn">Login</button>
        <button id="signupBtn" class="active">Sign Up</button>
      </div>

      <h2 id="formTitle">Sign Up</h2>

      <form id="form">
        <div class="input-group" id="nameField">
          <i>👤</i>
          <input type="text" placeholder="Nama" />
        </div>
        <div class="input-group">
          <i>📧</i>
          <input type="email" placeholder="Email" />
        </div>
        <div class="input-group">
          <i>🔒</i>
          <input type="password" placeholder="Password" />
          <span class="toggle-pass">👁️</span>
        </div>

        <button type="submit" class="submit-btn">Register</button>
        <a href="beranda.php" class="back">Kembali</a>

       

      </form>
    </div>
  </div>

  <script src="login.js"></script>
</body>
</html>
