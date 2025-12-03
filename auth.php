<?php
session_start();
include "koneksi.php";

$mode = $_POST['mode']; // login atau register
$email = $_POST['email'];
$password = $_POST['password'];

if($mode == "register"){
    $nama = $_POST['name'];
    
    // cek email sudah terdaftar
    $check = $conn->query("SELECT * FROM users WHERE email='$email'")->num_rows;
    if($check > 0){
        echo "Email sudah terdaftar!";
        exit;
    }

    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users (nama,email,password) VALUES ('$nama','$email','$hashedPass')");
    echo "Registrasi berhasil! Silahkan login.";

} else if($mode == "login"){
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
    $conn->query("UPDATE users SET is_logged_in=1 WHERE id=".$result['id']);
    echo "Login berhasil! Selamat datang, ".$result['nama'];
}
?>
