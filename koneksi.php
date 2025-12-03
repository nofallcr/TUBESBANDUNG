<?php
$host = "localhost";
$user = "root";
$pass = ""; // kosong jika default XAMPP
$db   = "login"; // nama database

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
