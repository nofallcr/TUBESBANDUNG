<?php
$conn = mysqli_connect("localhost", "root", "", "db_wisata");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM pembayaran ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pesanan</title>
    <style>
        body{
            font-family: Arial;
            background: #1a233b;
        }
        .container{
            max-width:1000px;
            margin:30px auto;
            background:white;
            padding:25px;
            border-radius:8px;
        }
        table{
            width:100%;
            border-collapse: collapse;
            margin-top:20px;
        }
        th, td{
            border:1px solid #ddd;
            padding:10px;
            text-align:center;
        }
        th{
            background:#2d89ef;
            color:white;
        }
        tr:nth-child(even){
            background:#f8f8f8;
        }
        .status{
            padding:6px 10px;
            border-radius:5px;
            color:white;
            font-weight:bold;
        }
        .pending{ background:#d8930f; }
        .paid{ background:#28a745; }
        .cancelled{ background:#dc3545; }
    </style>
    <?php include 'navbar.php'; ?>
</head>
<body>

<div class="container">
    <h2>📋 Daftar Pesanan Masuk</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Paket</th>
            <th>Lokasi</th>
            <th>Tiket</th>
            <th>Total Bayar</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_pemesan'] ?></td>
            <td><?= $row['paket_wisata'] ?></td>
            <td><?= $row['lokasi_wisata'] ?></td>
            <td><?= $row['jumlah_tiket'] ?></td>
            <td>Rp <?= number_format($row['total_bayar'], 0, ",", ".") ?></td>
            <td><?= $row['metode_pembayaran'] ?></td>
            <td>
                <span class="status <?= $row['status'] ?>">
                    <?= ucfirst($row['status']) ?>
                </span>
            </td>
            <td><?= $row['tanggal_transaksi'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
