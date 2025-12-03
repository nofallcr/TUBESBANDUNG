<?php
session_start();
include "koneksi.php";

if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $conn->query("UPDATE users SET is_logged_in=0 WHERE id=$id");
}

session_destroy();
header("Location: login.php");
exit;
