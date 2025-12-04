<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_wisata";


$paket_list = [
    "1" => ["nama" => "Braga - Kenangan Lama", "lokasi" => "Kota Bandung", "harga" => 105000, "tipe" => "Paket Harian"],
    "2" => ["nama" => "Asia Africa - Keliling Dunia", "lokasi" => "Kota Bandung", "harga" => 150000, "tipe" => "Paket Harian"],
    "3" => ["nama" => "Dusun Bambu - Damai Alam", "lokasi" => "Ciwidey", "harga" => 1900000, "tipe" => "Paket Keluarga"],
    "4" => ["nama" => "Trip Alam", "lokasi" => "Area Alam", "harga" => 300000, "tipe" => "Paket Trip"],
    "5" => ["nama" => "Trip Sejarah", "lokasi" => "Kawasan Sejarah", "harga" => 150000, "tipe" => "Paket Trip"],
    "6" => ["nama" => "Kampung Cai Ranca Upas", "lokasi" => "Ciwidey", "harga" => 2200000, "tipe" => "Paket Keluarga"]
];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) die("Koneksi gagal: " . mysqli_connect_error());

    
    $nama    = mysqli_real_escape_string($conn, $_POST['nama_pemesan'] ?? '');
    $email   = mysqli_real_escape_string($conn, $_POST['email_pemesan'] ?? '');
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon_pemesan'] ?? '');
    $jumlah  = max(1, (int)($_POST['jumlah_tiket'] ?? 1));
    $paket_id = $_POST['paket_id'] ?? '';

    
    if (!isset($paket_list[$paket_id])) {
        mysqli_close($conn);
        die("Paket tidak valid.");
    }

    
    $paket_info = $paket_list[$paket_id];
    $paket_nama = mysqli_real_escape_string($conn, $paket_info['nama']);
    $paket_lokasi = mysqli_real_escape_string($conn, $paket_info['lokasi']);
    $harga_satuan = (int)$paket_info['harga'];

    
    $total = $harga_satuan * $jumlah;

    $metode  = mysqli_real_escape_string($conn, $_POST['metode_pembayaran'] ?? '');

    $sql = "INSERT INTO pembayaran 
            (nama_pemesan, email_pemesan, telepon_pemesan, jumlah_tiket, paket_wisata, lokasi_wisata, total_bayar, metode_pembayaran)
            VALUES 
            ('$nama','$email','$telepon',$jumlah,'$paket_nama','$paket_lokasi',$total,'$metode')";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        mysqli_close($conn);
        header("Location: success.php?id=" . $last_id);
        exit;
    } else {
        $err = mysqli_error($conn);
        mysqli_close($conn);
        echo "<script>alert('Terjadi kesalahan: " . addslashes($err) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Pemesanan Wisata</title>

<link rel="stylesheet" href="order.css?v=<?= filemtime(__DIR__ . '/order.css') ?>">

</head>
<body>

<div class="container">
<h2>Form Pemesanan Paket Wisata</h2>

<form action="" method="POST" id="formOrder" autocomplete="off">

    <label>Nama Pemesan:</label>
    <input type="text" name="nama_pemesan" required>

    <label>Email:</label>
    <input type="email" name="email_pemesan">

    <label>No Telepon:</label>
    <input type="text" name="telepon_pemesan">

    <label>Jumlah Tiket:</label>
    <input type="number" name="jumlah_tiket" id="jumlah_tiket" value="1" min="1">

    <label>Pilih Paket Wisata:</label>
    <select id="pilihPaket" name="paket_id">
        <option value="">-- Pilih Paket --</option>
        <option value="1" data-nama="Braga - Kenangan Lama" data-lokasi="Kota Bandung" data-harga="105000">Braga - Kenangan Lama - Rp105.000</option>
        <option value="2" data-nama="Asia Africa - Keliling Dunia" data-lokasi="Kota Bandung" data-harga="150000">Asia Africa - Keliling Dunia - Rp150.000</option>
        <option value="3" data-nama="Dusun Bambu - Damai Alam" data-lokasi="Ciwidey" data-harga="1900000">Dusun Bambu - Rp1.900.000</option>
        <option value="4" data-nama="Trip Alam" data-lokasi="Area Alam" data-harga="300000">Trip Alam - Rp300.000</option>
        <option value="5" data-nama="Trip Sejarah" data-lokasi="Kawasan Sejarah" data-harga="150000">Trip Sejarah - Rp150.000</option>
        <option value="6" data-nama="Kampung Cai Ranca Upas" data-lokasi="Ciwidey" data-harga="2200000">Kampung Cai Ranca Upas - Rp2.200.000</option>
    </select>

    <input type="hidden" name="paket_wisata" id="paket_wisata">
    <input type="hidden" name="lokasi_wisata" id="lokasi_wisata">
    <input type="hidden" name="total_bayar" id="total_bayar">

    <label>Metode Pembayaran:</label>
    <select name="metode_pembayaran" required>
        <option value="transfer">Pembayaran setelah kunjungan</option>
    </select>


 <form action="success.php" method="POST">

    <div>
      <strong style="color:#cce0ff;">Estimasi Total:</strong>
      <div id="display_total" style="margin-top:8px; font-size:18px; font-weight:bold; color:#e6f7ff;">Rp0</div>
    </div>

    <br>

    <button type="submit">Pesan Sekarang</button>
</form>
</form>
</div>


<script>

function formatRupiah(n) {
    return 'Rp' + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

const pilihPaket = document.getElementById('pilihPaket');
const jumlahInput = document.getElementById('jumlah_tiket');
const paketHidden = document.getElementById('paket_wisata');
const lokasiHidden = document.getElementById('lokasi_wisata');
const totalHidden = document.getElementById('total_bayar');
const displayTotal = document.getElementById('display_total');

function recalc() {
    const opt = pilihPaket.options[pilihPaket.selectedIndex];
    if (!opt || !opt.dataset.harga) {
        paketHidden.value = '';
        lokasiHidden.value = '';
        totalHidden.value = 0;
        displayTotal.textContent = 'Rp0';
        return;
    }
    const harga = parseInt(opt.dataset.harga) || 0;
    const jumlah = Math.max(1, parseInt(jumlahInput.value) || 1);
    const total = harga * jumlah;

    paketHidden.value = opt.dataset.nama || '';
    lokasiHidden.value = opt.dataset.lokasi || '';
    totalHidden.value = total;

    displayTotal.textContent = formatRupiah(total);
}


pilihPaket.addEventListener('change', recalc);
jumlahInput.addEventListener('input', recalc);


document.getElementById('formOrder').addEventListener('submit', function(e){
    recalc();
});
</script>


</body>
</html>
