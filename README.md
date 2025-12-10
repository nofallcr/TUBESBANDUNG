# 🗺️ ExploreBandung: Web Pemesanan Paket Wisata Bandung

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Status: Development](https://img.shields.io/badge/Status-In%20Development-blue)](https://github.com/yourusername/explorebandung/commits/main)

## Deskripsi Proyek

**ExploreBandung** adalah platform web yang dirancang untuk memudahkan pengguna dalam menjelajahi dan memesan berbagai paket wisata di area Bandung dan sekitarnya. Aplikasi ini mendukung fitur pendaftaran pengguna, pemesanan paket, dan pengelolaan sistem oleh Admin.

## Fitur Utama

### Untuk Pengguna (User & Guest)
* **Pencarian & Eksplorasi:** Pengguna dapat melihat beranda dan galeri, destinasi, kontak kami, tentang kami serta paket wisata.
* **Pemesanan Paket:** Proses *checkout* yang mudah dan terintegrasi untuk pembelian paket wisata.
* **Autentikasi:** Fitur Register dan Login untuk mengelola riwayat pemesanan.

### Untuk Admin
* **Manajemen Pembayaran:** CRUD (Create, Read, Update, Delete) pembayaran paket wisata.
---

## 🚀 User Flow (Alur Pengguna)

Berikut adalah ringkasan alur pengguna utama dalam sistem (berdasarkan *flowchart* yang telah dibuat):

### 1. Alur Pendaftaran & Akses
1.  **MULAI**
2.  Pengguna memilih **Register** atau **Login**.
3.  Akses diberikan sebagai **Guest**, **User (Pembeli)**, atau **Admin**.

### 2. Alur Pembelian Paket
1.  **User** (setelah Login) memilih **Beli Paket Wisata**.
2.  **Mencari** $\rightarrow$ **Memilih** $\rightarrow$ **Memesan paket wisata (Checkout)**.
3.  Melakukan **Input Data Pemesan & Pembayaran**.
4.  Admin melakukan **Konfirmasi Pembayaran**.

### 3. Alur Guest
1.  **Guest** dapat **Melihat Beranda & Halaman Pencarian Paket**.
2.  Jika ingin **Membeli**, sistem akan mengarahkan kembali ke langkah **Register/Login**.

---

## 🛠️ Instalasi Lokal

Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

### Prasyarat
Pastikan Anda sudah menginstal:
* [Git](https://git-scm.com/)
* Database (Contoh: MySQL, PostgreSQL)
* XAMPP
* Visual Studio Code

### Langkah-langkah
1. **Clone Repositori:**
    ```bash
    git clone [https://github.com/yourusername/explorebandung.git](https://github.com/yourusername/explorebandung.git)
    cd explorebandung
    ```
2. **Instal Dependencies:**
    ```bash
    npm install
    # atau jika menggunakan Yarn
    # yarn install
    ```
3. **Konfigurasi Lingkungan:**
    Buat file `.env` di root direktori dan isi variabel lingkungan Anda (contoh):
    ```
    # .env
    PORT=3000
    DATABASE_URL="mysql://user:password@host:port/dbname"
    JWT_SECRET="super_secret_key"
    ```
4. **Jalankan Aplikasi:**
    ```bash
    npm start
    # atau
    # npm run dev
    ```
Aplikasi akan berjalan di `http://localhost:3000`.

## Kontributor

Terima kasih kepada semua kontributor yang telah berpartisipasi dalam pengembangan proyek ini:
* Farel Yamotaro Hia - 251402069 (Ketua)
* Albariqi Deanda Tarigan - 251402037
* Naufal Muhammad Djaki - 251402128
* Vascha Uli Lumbantoruan - 251402125
* Aulia Syahfira - 251402104
* Cinta Pardame Sihaloho - 251402090
  
## Lisensi

Proyek ini dilisensikan di bawah **MIT License**. Lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.

## 🗺️ Alur Pengguna (User Flow) Web ExploreBandung

Berikut adalah diagram alir yang menunjukkan alur utama pengguna dalam sistem:

```mermaid
flowchart TD
    %% Node Definitions (Terminal/Proses):
    start([MULAI])
    reg[Register]
    login[Login]
    guest[Guest]
    user[User]
    admin[Admin]
    beli[Beli Paket]
    cari[Mencari Paket]
    pilih[Memilih Paket]
    checkout[Membeli Produk]
    input[Input Data & Bayar]
    konf[Konfirmasi Pembayaran]
    endd([SELESAI])
    
    %% Alur Utama
    start --> reg;
    start --> login;
    reg --> login;
    
    login --> guest;
    login --> user;
    login --> admin;

    %% ALUR GUEST
    guest --> g1[Lihat Beranda/Search];
    g1 --> g2[Lihat Detail Paket];
    g2 --> g3{Mau Beli?};
    g3 -- Ya --> reg;
    g3 -- Tidak --> g1;

    %% ALUR USER (PEMBELI)
    user --> beli;
    beli --> cari;
    cari --> pilih;
    pilih --> checkout;
    checkout --> input;
    input --> konf;
    konf --> endd;

    %% ALUR ADMIN
    admin --> d1[Dashboard Admin];
    d1 --> d2[Kelola Pembayaran];
    d2 --> d3[Tambah Transaksi];
    d3 --> d4[Edit Pembayaran];
    d4 --> d5[Detail Pembayaran];
    d5 --> d6[Hapus Pembayaran];
    d6 --> endd;
