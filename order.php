<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "db_wisata");
    if (!$conn) die("Koneksi gagal: " . mysqli_connect_error());

    $nama    = $_POST['nama_pemesan'];
    $email   = $_POST['email_pemesan'];
    $telepon = $_POST['telepon_pemesan'];
    $jumlah  = $_POST['jumlah_tiket'];
    $paket   = $_POST['paket_wisata'];
    $lokasi  = $_POST['lokasi_wisata'];
    $total   = $_POST['total_bayar'];
    $metode  = $_POST['metode_pembayaran'];

    $sql = "INSERT INTO pembayaran 
            (nama_pemesan, email_pemesan, telepon_pemesan, jumlah_tiket, paket_wisata, lokasi_wisata, total_bayar, metode_pembayaran)
            VALUES 
            ('$nama','$email','$telepon','$jumlah','$paket','$lokasi','$total','$metode')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pemesanan berhasil!');</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: ". mysqli_error($conn) ."');</script>";
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Pemesanan Wisata</title>
<style>

* { 
  margin:0;
  padding:0; 
  box-sizing:border-box; 
  font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

body { 
  background-color:#1a233b; 
  color:#b9d0fb; 
  padding:20px; }

.container { 
  max-width:600px; 
  margin:30px auto; 
  background-color:#252f4a; 
  padding:30px; 
  border-radius:15px; 
  box-shadow:0 0 15px rgba(0,0,0,0.5); }

h2 { 
  text-align:center; 
  margin-bottom:20px; 
  color:#76c7ff; }

label { 
  display:block; 
  margin-bottom:5px; 
  color:#cce0ff; }

input, select, button { 
  width:100%; 
  padding:10px; 
  margin-bottom:15px; 
  border-radius:8px; 
  border:none; 
  font-size:16px; }

input, select { 
  background-color:#1a233b; 
  color:#b9d0fb; 
  border:1px solid #3a4563; }

input:focus, select:focus { 
  outline:none; 
  border:1px solid #76c7ff; }

button { 
  background-color:#76c7ff; 
  color:#1a233b; 
  font-weight:bold; 
  cursor:pointer; 
  transition:0.3s; }

button:hover { 
  background-color:#5aa0e0; }

option { 
  background-color:#1a233b; 
  color:#b9d0fb; }
  
</style>
</head>
<body>

<div class="container">
<h2>Form Pemesanan Paket Wisata</h2>

<form action="" method="POST">

    <label>Nama Pemesan:</label>
    <input type="text" name="nama_pemesan" required>

    <label>Email:</label>
    <input type="email" name="email_pemesan">

    <label>No Telepon:</label>
    <input type="text" name="telepon_pemesan">

    <label>Jumlah Tiket:</label>
    <input type="number" name="jumlah_tiket" value="1" min="1">

    <label>Pilih Paket Wisata:</label>
    <select id="pilihPaket" onchange="updatePaket()">
        <option value="">-- Pilih Paket --</option>
        <option value="1" data-nama="Braga - Kenangan Lama" data-paket="Paket Harian" data-harga="105000">Braga - Kenangan Lama - Rp105.000</option>
        <option value="2" data-nama="Asia Africa - Keliling Dunia" data-paket="Paket Harian" data-harga="150000">Asia Africa - Keliling Dunia - Rp150.000</option>
        <option value="3" data-nama="Dusun Bambu - Damai Alam" data-paket="Paket Keluarga" data-harga="1900000">Dusun Bambu - Damai Alam - RpRp 1.900.000</option>
        <option value="4" data-nama="Trip Alam" data-lokasi="Paket Trip" data-paket="300000">Trip Alam - Rp300.000</option>
        <option value="5" data-nama="Trip Sejarah" data-lokasi="Paket Trip" data-paket="150000">Trip Sejarah - Rp150.000</option>
        <option value="6" data-nama="Kampung Cai Ranca Upas" data-lokasi="Paket Keluarga" data-paket="2200000">Kampung Cai Ranca Upas - Rp2.200.000</option>
      </select>

    <input type="hidden" name="paket_wisata" id="paket_wisata">
    <input type="hidden" name="lokasi_wisata" id="lokasi_wisata">
    <input type="hidden" name="total_bayar" id="total_bayar">

    <label>Metode Pembayaran:</label>
    <select name="metode_pembayaran" required>
        <option value="transfer">Transfer Bank</option>
        <option value="ewallet">E-Wallet</option>
    </select>

    <button type="submit">Pesan Sekarang</button>
</form>
</div>

<script>
function updatePaket() {
    const pilihan = document.getElementById("pilihPaket");
    const paket = pilihan.options[pilihan.selectedIndex];

    document.getElementById("paket_wisata").value = paket.getAttribute("data-nama");
    document.getElementById("lokasi_wisata").value = paket.getAttribute("data-lokasi");

    const harga = paket.getAttribute("data-harga");
    const jumlah = document.querySelector('input[name="jumlah_tiket"]').value;
    document.getElementById("total_bayar").value = harga * jumlah;
}
</script>

</body>
</html>
