<?php
// koneksi.php
$host = "localhost";
$db_user = "root";       // <-- HARUS 'root' jika Anda menggunakan XAMPP default
$db_pass = "";           // <-- HARUS KOSONG "" jika Anda menggunakan XAMPP default
$db_name = "db_wisata";  // <-- Pastikan nama database Anda benar

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// ... (lanjutan kode koneksi)
?>
