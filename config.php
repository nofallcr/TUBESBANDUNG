<?php
// config.php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');   
define('DB_PASSWORD', '');       
define('DB_NAME', 'login'); // GANTI DENGAN NAMA DB YANG SAYA LIHAT DI SCREENSHOT
// Jika Anda yakin nama DB Anda hanya 'login', ganti kembali ke 'login'.

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    // Jika XAMPP/MySQL bermasalah, script akan mati di sini dengan pesan error yang jelas (HTML).
    // Ini mungkin menjadi sumber error Anda saat ini.
    die("Koneksi Gagal ke Database: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>