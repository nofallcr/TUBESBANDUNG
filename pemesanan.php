<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['email'])) {
    header("Location: login.php"); 
    exit;
}


$host = "localhost";
$user = "root";
$pass = "";
$db = "db_wisata";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}


function rp($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}


$user_email = $_SESSION['email'];
$user_nama = $_SESSION['nama'] ?? 'Pengguna'; 




$safe_user_email = mysqli_real_escape_string($conn, $user_email);


$query_pesanan = "
    SELECT 
        id, 
        paket_wisata, 
        lokasi_wisata, 
        jumlah_tiket, 
        total_bayar, 
        metode_pembayaran,
        status, 
        tanggal_transaksi 
    FROM 
        pembayaran 
    WHERE 
        email_pemesan = '$safe_user_email' 
    ORDER BY 
        tanggal_transaksi DESC
";

$result_pesanan = mysqli_query($conn, $query_pesanan);

if (!$result_pesanan) {
    $error_message = "Gagal mengambil data pesanan: " . mysqli_error($conn);
    $pesanan_array = [];
} else {
    $pesanan_array = mysqli_fetch_all($result_pesanan, MYSQLI_ASSOC);
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan Saya - Explore Bandung</title>
    <link rel="stylesheet" href="dashboard.css">
    <?php include 'navbar.php'; ?> 
    
    <style>
       
        .pesanan-container {
            max-width: 960px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        .pesanan-table {
            width: 100%;
            border-collapse: collapse;
        }
        .pesanan-table th, .pesanan-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }
        .pesanan-table th {
            background-color: #f8f8f8;
            color: #333;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.85em;
            font-weight: bold;
            color: white;
            text-transform: capitalize;
        }
        
        .status-pending { background-color: #ffc107; } 
        .status-paid { background-color: #28a745; } 
        .status-cancelled { background-color: #dc3545; }

       .pesanan-container {
        max-width: 960px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

       .pesanan-table {
        width: 100%;
        border-collapse: collapse;
        }

       .pesanan-table th, .pesanan-table td {
       padding: 12px;
       border-bottom: 1px solid #eee;
       text-align: left;
       }

       .pesanan-table th {
       background-color: #f8f8f8;
       color: #333;
       }


       @media screen and (max-width: 600px) {
    
    
       .pesanan-table {
        border: 0;
       }

    
       .pesanan-table thead {
        display: none;
       }

    
       .pesanan-table tr {
        display: block;
        margin-bottom: 10px;
        border: 1px solid #ccc; 
        border-radius: 5px;
        padding: 10px;
       }

    
       .pesanan-table td {
        display: block;
        text-align: right;
        border-bottom: 1px solid #f0f0f0;
        position: relative; 
        padding-left: 50%; 
       }

    
       .pesanan-table td::before {
        content: attr(data-label); 
        position: absolute;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        text-align: left;
        font-weight: bold;
        color: #555;
       }
    
    
    .pesanan-table tr td:last-child {
        border-bottom: 0;
    }
    }
    </style>
</head>
<body>

<div class="pesanan-container">
    <h2>Histori Pemesanan **<?= htmlspecialchars($user_nama) ?>**</h2>
    
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?= $error_message ?></p>
    <?php elseif (empty($pesanan_array)): ?>
        <div style="text-align: center; padding: 30px; border: 1px dashed #ccc; border-radius: 4px;">
            <p>Anda belum memiliki riwayat pemesanan tiket atau paket wisata.</p>
            <a href="beranda.php" style="color: #007bff; text-decoration: none; font-weight: bold;">Pesan Sekarang</a>
        </div>
    <?php else: ?>
        <table class="pesanan-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal Pesan</th>
                    <th>Paket Wisata</th>
                    <th>Lokasi</th>
                    <th>Tiket</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pesanan_array as $pesanan): ?>
                <tr>
                    <td><?= htmlspecialchars($pesanan['id']) ?></td>
                    <td><?= date('d M Y H:i', strtotime($pesanan['tanggal_transaksi'])) ?></td>
                    <td><?= htmlspecialchars($pesanan['paket_wisata']) ?></td>
                    <td><?= htmlspecialchars($pesanan['lokasi_wisata']) ?></td>
                    <td><?= htmlspecialchars($pesanan['jumlah_tiket']) ?></td>
                    <td><span style="color: green; font-weight: bold;"><?= rp($pesanan['total_bayar']) ?></span></td>
                    <td>
                        <?php 
                            $status = strtolower($pesanan['status']);
                        ?>
                        <span class="status-badge status-<?= $status ?>">
                            <?= htmlspecialchars($pesanan['status']) ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <a href="dashboard.php" style="display: inline-block; padding: 10px 0; margin-top: 20px; color: #007bff; text-decoration: none;">
        ← Kembali ke Dashboard
    </a>
</div>

</body>
</html>