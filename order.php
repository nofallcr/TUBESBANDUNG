<?php
$namaPaket = isset($_GET['paket']) ? $_GET['paket'] : 'Explore Bandung';
$hargaOrang = isset($_GET['harga']) ? intval($_GET['harga']) : 75000;
$lokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : 'Braga, Lembang, Asia Afrika';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout Paket Wisata</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

  <style>
   /* Reset & Font */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Inter', sans-serif;
}

body {
  background: #f3f4f6;
  color: #1f2937;
}

/* Container */
.container {
  max-width: 960px;
  margin: 50px auto;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  overflow: hidden;
}

/* Header */
.header {
  padding: 24px 32px;
  border-bottom: 1px solid #e5e7eb;
}
.header h1 {
  font-size: 24px;
  font-weight: 600;
  color: #111827;
}
.header p {
  margin-top: 4px;
  font-size: 14px;
  color: #6b7280;
}

/* Layout */
.content {
  display: flex;
  flex-wrap: wrap;
}
.left {
  flex: 1 1 60%;
  padding: 32px;
  border-right: 1px solid #e5e7eb;
}
.right {
  flex: 1 1 40%;
  padding: 32px;
}

/* Sections */
.section {
  margin-bottom: 32px;
}
.section h2 {
  font-size: 18px;
  font-weight: 500;
  margin-bottom: 16px;
  color: #111827;
}

/* Forms */
label {
  display: block;
  font-size: 14px;
  color: #374151;
  margin-bottom: 6px;
}
input, select {
  width: 100%;
  padding: 10px 12px;
  font-size: 14px;
  margin-bottom: 16px;
  border: 1px solid #d1d5db;
  border-radius: 4px;
  background: #f9fafb;
}
input:focus, select:focus {
  border-color: #3b82f6;
  outline: none;
  background: #fff;
}

/* Passenger Card */
.passenger {
  margin-bottom: 24px;
  padding: 16px;
  border: 1px solid #e5e7eb;
  border-radius: 6px;
  background: #fafafa;
}
.passenger h3 {
  margin-bottom: 12px;
  font-size: 16px;
  color: #3b82f6;
}

/* Summary */
.summary {
  padding: 24px 16px;
  border: 1px solid #e5e7eb;
  border-radius: 6px;
  background: #fafafa;
}
.summary .item {
  display: flex;
  justify-content: space-between;
  margin-bottom: 12px;
  font-size: 14px;
}
.summary .item:last-child {
  margin-bottom: 0;
}
.summary .item .value {
  font-weight: 500;
}

/* Button */
.btn-pay {
  display: block;
  width: 100%;
  padding: 14px;
  font-size: 16px;
  font-weight: 500;
  color: #fff;
  background: #3b82f6;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background 0.3s;
}
.btn-pay:hover {
  background: #2563eb;
}


.summary {
  background: #ffffff;
  padding: 24px 20px;
  border-radius: 12px;
  border: 1px solid #e5e7eb;
  box-shadow: 0 6px 20px rgba(0,0,0,0.08);
}

.summary h2 {
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 20px;
  color: #111827;
  border-bottom: 1px solid #e5e7eb;
  padding-bottom: 12px;
}

.summary .item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
  padding: 12px 16px;
  border-radius: 8px;
  background: #f9fafb;
  font-size: 15px;
  font-weight: 500;
  transition: all 0.3s ease;
}

.summary .item:last-child {
  margin-bottom: 0;
}

.summary .item:hover {
  background: #eef2ff;
}

.summary .item .label {
  color: #6b7280;
}

.summary .item .value {
  color: #111827;
  font-weight: 600;
}

.total {
  font-size: 18px;
  font-weight: 700;
  margin-top: 20px;
  text-align: right;
  color: #1e40af;
}




    @media (max-width: 768px) {
      .content { flex-direction: column; }
      .left { border-right: none; }
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">

  <div class="header">
    <h1>Beli Paket Wisata</h1>
    <p>Pastikan data Anda benar sebelum menyelesaikan pemesanan</p>
  </div>

  <div class="content">

    <!-- Form Pemesan & Penumpang -->
    <div class="left">
      <div class="section">
        <h2>Data Pemesan</h2>
        <label>Nama Pemesan</label>
        <input type="text" id="namaPemesan" placeholder="Nama lengkap">

        <label>Email</label>
        <input type="email" id="emailPemesan" placeholder="email@domain.com">

        <label>No Telepon</label>
        <input type="tel" id="teleponPemesan" placeholder="08xxxxxxxx">
      </div>

      <div class="section">
        <h2>Data Penumpang</h2>

        <label>Jumlah Orang</label>
        <input type="number" id="jumlahOrang" value="1" min="1" max="10">

        <div id="formPenumpang"></div>
      </div>
    </div>

<div class="right">
  <div class="summary">
    <h2>Ringkasan Pemesanan</h2>

    <div class="item">
      <div class="label">Paket</div>
      <div class="value" id="paketName"><?php echo $namaPaket; ?></div>
    </div>

    <div class="item">
      <div class="label">Lokasi</div>
      <div class="value" id="lokasiPaket"><?php echo $lokasi; ?></div>
    </div>

    <div class="item">
      <div class="label">Harga / Orang</div>
      <div class="value" id="hargaOrang">Rp <?php echo number_format($hargaOrang,0,",","."); ?></div>
    </div>

    <div class="item total">
      Total: <span id="totalHarga">Rp <?php echo number_format($hargaOrang,0,",","."); ?></span>
    </div>

     <form action="payment.php" method="POST" id="checkoutForm">
        <input type="hidden" name="nama_pemesan" id="sendNama">
        <input type="hidden" name="email_pemesan" id="sendEmail">
        <input type="hidden" name="telepon_pemesan" id="sendTelp">
        <input type="hidden" name="jumlah" id="sendJumlah">
        <input type="hidden" name="total" id="sendTotal">
        <input type="hidden" name="paket" value="<?php echo $namaPaket; ?>">
        <input type="hidden" name="lokasi" value="<?php echo $lokasi; ?>">

        <button type="button" class="btn-pay" onclick="kirimKePembayaran()">
          Lanjutkan ke Pembayaran
        </button>
     </form>

  </div>
</div>

<script>
  const jumlahOrangInput = document.getElementById('jumlahOrang');
  const formPenumpang = document.getElementById('formPenumpang');
  const totalHargaEl = document.getElementById('totalHarga');
  const hargaPerOrang = <?php echo $hargaOrang; ?>;

  function updatePenumpangForm(jumlah) {
    formPenumpang.innerHTML = '';
    for (let i = 1; i <= jumlah; i++) {
      formPenumpang.innerHTML += `
        <div class="passenger">
          <h3>Penumpang ${i}</h3>
          <label>Nama Lengkap</label>
          <input type="text" name="nama_penumpang_${i}" placeholder="Nama lengkap">

          <label>Umur</label>
          <input type="number" name="umur_penumpang_${i}" placeholder="Umur">

          <label>Jenis Kelamin</label>
          <select name="jk_penumpang_${i}">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      `;
    }

    const total = hargaPerOrang * jumlah;
    totalHargaEl.innerText = `Rp ${total.toLocaleString('id-ID')}`;
  }

  jumlahOrangInput.addEventListener('input', () => {
    const val = parseInt(jumlahOrangInput.value) || 1;
    updatePenumpangForm(val);
  });

  updatePenumpangForm(1);

  function kirimKePembayaran() {
    const nama = document.getElementById("namaPemesan").value;
    const email = document.getElementById("emailPemesan").value;
    const telp = document.getElementById("teleponPemesan").value;
    const jumlah = document.getElementById("jumlahOrang").value;

    if(nama === "" || email === "" || telp === ""){
      alert("Lengkapi dulu data pemesan");
      return;
    }

    const total = hargaPerOrang * parseInt(jumlah);

    document.getElementById("sendNama").value   = nama;
    document.getElementById("sendEmail").value  = email;
    document.getElementById("sendTelp").value   = telp;
    document.getElementById("sendJumlah").value = jumlah;
    document.getElementById("sendTotal").value  = total;

    // Submit form
    document.getElementById("checkoutForm").submit();
  }
</script>

</body>
</html>