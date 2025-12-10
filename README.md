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
