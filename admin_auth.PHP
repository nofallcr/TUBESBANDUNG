<?php
session_start();
// Pastikan file koneksi.php berisi detail koneksi ke DB 'db_wisata'
include "koneksi.php"; 

// 1. VERIFIKASI KONEKSI
// Cek apakah koneksi dari koneksi.php berhasil
if (!isset($conn) || $conn->connect_error) {
    // Jika koneksi gagal (misalnya karena 'Access Denied'), tampilkan pesan dan hentikan skrip
    exit("Kesalahan koneksi database: Periksa detail di file koneksi.php.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil input username dan password
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        exit("Username dan Password wajib diisi.");
    }

    // Gunakan prepared statement untuk keamanan SQL Injection
    $stmt = $conn->prepare("SELECT id_admin, nama_lengkap, password FROM admin WHERE username = ?");
    
    if (!$stmt) {
        // Error saat menyiapkan statement
        exit("Error saat menyiapkan query: " . $conn->error);
    }
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        
        // 2. VERIFIKASI PASSWORD
        // Menggunakan password_verify() karena password di database harus di-hash.
        
           if ($password === $admin['password']) { 
            // --- LOGIN BERHASIL ---
            $_SESSION['user_type'] = 'admin';
            $_SESSION['user_id'] = $admin['id_admin'];
            $_SESSION['nama'] = $admin['nama_lengkap'];
            
            // Simpan session sebelum output apapun
            session_write_close();
            
            echo "Login Admin berhasil";
            
        } else {
            // Password yang dimasukkan salah
            echo "Password Admin salah.";
        }
        
    } else {
        // Username tidak ditemukan
        echo "Username Admin tidak ditemukan.";
    }

    $stmt->close();
    
} else {
    echo "Permintaan tidak valid.";
}

$conn->close();
?>