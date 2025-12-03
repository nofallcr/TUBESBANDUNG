<?php

session_start();
require_once('config.php'); 

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['mode'])) {
    echo json_encode(['success' => false, 'message' => 'Permintaan tidak valid.']);
    exit;
}

$mode = $_POST['mode'];
$email = trim($_POST['email']);
$password = $_POST['password'];
$name = isset($_POST['name']) ? trim($_POST['name']) : ''; 


if ($mode == 'register') {
    if (empty($name) || empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Semua kolom harus diisi!']);
        exit;
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $sql_check = "SELECT id FROM users WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Email sudah terdaftar.']);
    } else {
        
        $sql_insert = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sss", $name, $email, $hashed_password);

        if ($stmt_insert->execute()) {
            echo json_encode(['success' => true, 'message' => "Akun $name berhasil didaftarkan!"]);
        } else {
            echo json_encode(['success' => false, 'message' => "Terjadi kesalahan database."]);
        }
    }
    $conn->close();
    exit;
}


if ($mode == 'login') {
    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Email dan Kata Sandi harus diisi!']);
        exit;
    }
    
    $sql = "SELECT id, name, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            echo json_encode(['success' => true, 'message' => 'Login Berhasil!', 'name' => $user['name']]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Email atau Kata Sandi salah.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Email atau Kata Sandi salah.']);
    }
    $conn->close();
    exit;
}
?>