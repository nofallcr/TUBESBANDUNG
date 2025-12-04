<?php
session_start();
include "koneksi.php";

$mode = $_POST['mode'] ?? ''; 
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if($mode == "register"){
    $nama = $_POST['name'] ?? '';
    
    
    if(empty($nama) || empty($email) || empty($password)){
        echo "Semua kolom harus diisi!";
        exit;
    }
    
    
    $check = $conn->query("SELECT * FROM users WHERE email='$email'")->num_rows;
    if($check > 0){
        echo "Email sudah terdaftar!";
        exit;
    }

    
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users (nama,email,password) VALUES ('$nama','$email','$hashedPass')");
    echo "Registrasi berhasil! Silahkan login.";

} else if($mode == "login"){
    
    
    if(empty($email) || empty($password)){
        echo "Email dan Password harus diisi!";
        exit;
    }
    
    
    $result = $conn->query("SELECT * FROM users WHERE email='$email'")->fetch_assoc();
    
    if(!$result){
        echo "Email belum terdaftar!";
        exit;
    }
    
    if(!password_verify($password, $result['password'])){
        echo "Password salah!";
        exit;
    }

    
    $_SESSION['user_id'] = $result['id'];
    $_SESSION['nama'] = $result['nama'];
    $_SESSION['email'] = $result['email']; 
    echo "Login berhasil! Selamat datang, ".$result['nama'];
    

}
?>