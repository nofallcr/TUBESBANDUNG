// Menangani pengiriman formulir booking
document.getElementById('bookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Mengambil nilai dari formulir
    const fullName = document.getElementById('fullName').value;
    const travelDate = document.getElementById('travelDate').value;
    const peopleCount = document.getElementById('peopleCount').value;
    const pickupLocation = document.getElementById('pickupLocation').value;
    const package = document.getElementById('package').value;
    
    // Validasi sederhana
    if (!fullName || !travelDate || !peopleCount || !pickupLocation || !package) {
        alert('Harap isi semua field yang diperlukan!');
        return;
    }
    
    // Format pesan untuk WhatsApp
    const message = `Halo Toba Travel, saya ingin melakukan booking dengan detail sebagai berikut:
    
Nama: ${fullName}
Tanggal Perjalanan: ${formatDate(travelDate)}
Jumlah Orang: ${peopleCount}
Lokasi Jemput: ${getLocationText(pickupLocation)}
Paket: ${getPackageText(package)}

Terima kasih.`;
    
    // Encode pesan untuk URL
    const encodedMessage = encodeURIComponent(message);
    
    // Membuka WhatsApp dengan pesan yang sudah diformat
    const whatsappURL = `https://wa.me/6281397606622?text=${encodedMessage}`;
    
    // Membuka jendela baru untuk WhatsApp
    window.open(whatsappURL, '_blank');
    
    // Reset formulir setelah pengiriman
    this.reset();
});

// Fungsi untuk memformat tanggal
function formatDate(dateString) {
    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', options);
}

// Fungsi untuk mendapatkan teks lokasi
function getLocationText(locationValue) {
    const locations = {
        'hotel': 'Hotel',
        'airport': 'Bandara',
        'other': 'Lokasi Lainnya'
    };
    return locations[locationValue] || locationValue;
}

// Fungsi untuk mendapatkan teks paket
function getPackageText(packageValue) {
    const packages = {
        'city-tour': 'City Tour Medan',
        'lake-toba': 'Danau Toba',
        'bukit-lawang': 'Bukit Lawang',
        'berastagi': 'Berastagi',
        'custom': 'Paket Kustom'
    };
    return packages[packageValue] || packageValue;
}

// Menambahkan tanggal minimum untuk input tanggal (hari ini)
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    const formattedDate = today.toISOString().split('T')[0];
    document.getElementById('travelDate').setAttribute('min', formattedDate);
});