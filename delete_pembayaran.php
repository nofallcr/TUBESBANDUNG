<?php
session_start();
include "koneksi.php";

// Verifikasi Admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    // Perintah SQL untuk DELETE
    $query = "DELETE FROM pembayaran WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        $status = "success_delete";
    } else {
        $status = "error_delete";
    }
} else {
    $status = "error_id";
}

mysqli_close($conn);

// Redirect kembali ke dashboard dengan status
header("Location: admin_dashboard.php?status=" . $status);
exit;
?>