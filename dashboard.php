<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Explore Bandung</title>
<link rel="stylesheet" href="dashboard.css?v=<?= filemtime(__DIR__ . '/dashboard.css') ?>">
</head>

<body>
<?php include 'navbar.php'; ?>
<div class="content">
    <div class="card user-card">
        <div class="user-info">
            <h3><?php echo $_SESSION['nama']; ?></h3>
            <p>Email: <?php echo $_SESSION['email']; ?></p>
        </div>

        <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
    </div>

</div>

</body>
</html>
