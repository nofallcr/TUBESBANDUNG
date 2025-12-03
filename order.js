function updatePaket() {
    const pilihan = document.getElementById("pilihPaket");
    const paket = pilihan.options[pilihan.selectedIndex];

    document.getElementById("paket_wisata").value = paket.getAttribute("data-nama");
    document.getElementById("lokasi_wisata").value = paket.getAttribute("data-lokasi");

    const harga = paket.getAttribute("data-harga");
    const jumlah = document.querySelector('input[name="jumlah_tiket"]').value;
    document.getElementById("total_bayar").value = harga * jumlah;
}