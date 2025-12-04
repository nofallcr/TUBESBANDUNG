<?php
session_start();

include "koneksi.php"; 


if (!isset($conn) || $conn->connect_error) {
    
    exit("Kesalahan koneksi database: Periksa detail di file koneksi.php.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        exit("Username dan Password wajib diisi.");
    }

   
    $stmt = $conn->prepare("SELECT id_admin, nama_lengkap, password FROM admin WHERE username = ?");
    
    if (!$stmt) {
        exit("Error saat menyiapkan query: " . $conn->error);
    }
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        
        
        
           if ($password === $admin['password']) { 
            
            $_SESSION['user_type'] = 'admin';
            $_SESSION['user_id'] = $admin['id_admin'];
            $_SESSION['nama'] = $admin['nama_lengkap'];
            
            
            session_write_close();
            
            echo "Login Admin berhasil";
            
        } else {
            
            echo "Password Admin salah.";
        }
        
    } else {
        
        echo "Username Admin tidak ditemukan.";
    }

    $stmt->close();
    
} else {
    echo "Permintaan tidak valid.";
}

$conn->close();
?>