<?php
$host = "localhost";
$db_user = "root";       
$db_pass = "";           
$db_name = "db_wisata";  

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
