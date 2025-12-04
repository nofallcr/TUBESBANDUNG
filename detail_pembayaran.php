<?php
session_start();
include "koneksi.php"; 

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') { 
    header("Location: login.php");
    exit;
}

$payment_id = $_GET['id'] ?? null;
$error_message = '';
$payment_data = null;

if ($payment_id) {
    $query_detail = "
        SELECT 
            id, 
            nama_pemesan, 
            email_pemesan, 
            telepon_pemesan, 
            jumlah_tiket,
            paket_wisata, 
            lokasi_wisata,
            total_bayar, 
            metode_pembayaran,  
            status,
            tanggal_transaksi, 
            tanggal_bayar,
            catatan 
        FROM 
            pembayaran 
        WHERE 
            id = ?
    ";
    
    
    if ($stmt = mysqli_prepare($conn, $query_detail)) {
        mysqli_stmt_bind_param($stmt, "i", $payment_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $payment_data = mysqli_fetch_assoc($result);
        } else {
            $error_message = "Data Pembayaran dengan ID #$payment_id tidak ditemukan atau tidak valid.";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        $error_message = "Kesalahan dalam menyiapkan query: " . mysqli_error($conn);
    }
} else {
    $error_message = "ID Pembayaran tidak spesifik. Silakan kembali ke daftar dashboard admin.";
}

mysqli_close($conn); 


function rp($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}


$status_key = 'status';
$tanggal_transaksi_key = 'tanggal_transaksi';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran #<?= htmlspecialchars($payment_id) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f9;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .payment-card {
            max-width: 650px;
            width: 100%;
            padding: 30px;
            background: #ffffff; 
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
            text-align: left;
        }

        .payment-info {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background-color: #fcfcfc;
        }
        
        .payment-info.package-details {
            border: 2px solid var(--primary-color); 
            background-color: var(--primary-color-light);
        }

        .payment-info h4 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 8px;
            margin-top: 0;
            color: var(--primary-color);
            font-size: 1.2em;
        }

        .payment-info p {
            margin: 10px 0;
            font-size: 1em;
            display: flex;
            justify-content: space-between;
        }
        
        .payment-info strong {
            font-weight: 600;
            color: #495057;
        }
        
        .payment-info span {
            font-weight: 500;
            text-align: right;
            max-width: 60%;
            color: #333;
        }

        .status-badge {
            padding: 4px 10px;
            border-radius: 15px;
            font-weight: bold;
            font-size: 0.9em;
            display: inline-block;
        }

        .status-pending { background-color: #ffc107; color: #333; } 
        .status-paid { background-color: #28a745; color: white; } 
        .status-cancelled { background-color: #dc3545; color: white; } 

        .action-links {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }
        .action-links a {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .edit-link a {
            background-color: var(--primary-color); 
            color: #333;
        }
        .edit-link a:hover {
             background-color: #e0a800;
        }
        
        .back-btn-link {
            background-color: #6c757d;
            color: white;
        }
        .back-btn-link:hover {
            background-color: #5a6268;
        }
        .catatan-box {
            background-color: #fff8e1;
            border: 1px solid #ffd54f;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .catatan-box p {
            margin: 0;
            white-space: pre-wrap; 
        }
    </style>
</head>
<body>
    <div class="payment-card">
        
        <h2 id="formTitle" style="color: #007bff; text-align: center; margin-bottom: 20px;">Detail Transaksi #<?= htmlspecialchars($payment_id) ?></h2>
        
        <?php if (!empty($error_message)): ?>
            <div class="message error-message" style="display: block; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 15px; border-radius: 4px; text-align: center;">❌ <?= htmlspecialchars($error_message) ?></div>
            <div class="action-links" style="justify-content: center;">
                 <a href="dashboard_admin.php" class="back-btn-link"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
            </div>
        <?php elseif ($payment_data): 
            $status_lower = strtolower($payment_data[$status_key]);
        ?>
            <div class="payment-info package-details">
                <h4><i class="fas fa-route"></i> Informasi Pesanan</h4>
                <p><strong>ID Transaksi:</strong> <span><?= htmlspecialchars($payment_data['id']) ?></span></p>
                <p><strong>Paket Wisata:</strong> <span><?= htmlspecialchars($payment_data['paket_wisata']) ?></span></p>
                <p><strong>Lokasi Wisata:</strong> <span><?= htmlspecialchars($payment_data['lokasi_wisata'] ?? '-') ?></span></p>
                <p><strong>Jumlah Tiket:</strong> <span><?= htmlspecialchars($payment_data['jumlah_tiket']) ?></span></p>
                <p><strong>Tanggal Transaksi:</strong> <span><?= date('d M Y H:i:s', strtotime($payment_data[$tanggal_transaksi_key])) ?></span></p>
            </div>
               <div class="payment-info">
                <h4><i class="fas fa-user"></i> Data Pemesan</h4>
                <p><strong>Nama Pemesan:</strong> <span><?= htmlspecialchars($payment_data['nama_pemesan']) ?></span></p>
                <p><strong>Email:</strong> <span><?= htmlspecialchars($payment_data['email_pemesan']) ?></span></p>
                <p><strong>Telepon:</strong> <span><?= htmlspecialchars($payment_data['telepon_pemesan'] ?? '-') ?></span></p>
            </div>
            <div class="payment-info">
                <h4><i class="fas fa-receipt"></i> Detail Pembayaran</h4>
                <p><strong>Total Bayar:</strong> <span style="font-weight: bold; color: #dc3545;"><?= rp($payment_data['total_bayar']) ?></span></p>
                <p><strong>Metode Bayar:</strong> <span><?= htmlspecialchars($payment_data['metode_pembayaran'] ?? 'Belum terdefinisi') ?></span></p>
                <p><strong>Status Pembayaran:</strong> 
                    <span class="status-badge status-<?= $status_lower ?>">
                        <?= htmlspecialchars($payment_data[$status_key]) ?>
                    </span>
                </p>
            </div>
            <?php if (!empty($payment_data['catatan'])): ?>
                <div class="catatan-box">
                    <h4 style="color: var(--primary-color); border-bottom: 1px solid var(--primary-color); padding-bottom: 5px; margin-top: 0;"><i class="fas fa-sticky-note"></i> Catatan Pemesan</h4>
                    <p><?= nl2br(htmlspecialchars($payment_data['catatan'])) ?></p>
                </div>
            <?php endif; ?>

            <div class="action-links">
                <a href="dashboard_admin.php" class="back-btn-link"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
                <a href="edit_pembayaran.php?id=<?= htmlspecialchars($payment_data['id']) ?>" class="edit-link">
                    <i class="fas fa-edit"></i> Edit Status
                </a>
            </div>

        <?php endif; ?>

    </div>
</body>
</html>