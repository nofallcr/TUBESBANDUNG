document.addEventListener("DOMContentLoaded", function () {

    
    const form = document.getElementById('bookingForm');

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const fullName = getValue('fullName');
            const travelDate = getValue('travelDate');
            const peopleCount = getValue('peopleCount');
            const pickupLocation = getValue('pickupLocation');
            const packageVal = getValue('package');

            if (!fullName || !travelDate || !peopleCount || !pickupLocation || !packageVal) {
                alert('Harap isi semua field yang diperlukan!');
                return;
            }

            const message = `Halo Toba Travel, saya ingin melakukan booking:

Nama: ${fullName}
Tanggal Perjalanan: ${formatDate(travelDate)}
Jumlah Orang: ${peopleCount}
Lokasi Jemput: ${getLocationText(pickupLocation)}
Paket: ${getPackageText(packageVal)}

Terima kasih.`;

            const encodedMessage = encodeURIComponent(message);

            
            const whatsappURL = `https://wa.me/6287865865525?text=${encodedMessage}`;
            window.open(whatsappURL, '_blank');

            form.reset();
        });
    }

    
    const waBtn = document.getElementById("waBtn");
    if (waBtn) {
        waBtn.addEventListener("click", function () {
            window.open("https://wa.me/6287865865525", "_blank");
        });
    }

});

function getValue(id) {
    const el = document.getElementById(id);
    return el ? el.value : "";
}

function formatDate(dateString) {
    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', options);
}

function getLocationText(val) {
    const items = {
        'hotel': 'Hotel',
        'airport': 'Bandara',
        'other': 'Lokasi Lainnya'
    };
    return items[val] || val;
}

function getPackageText(val) {
    const items = {
        'city-tour': 'City Tour Medan',
        'lake-toba': 'Danau Toba',
        'bukit-lawang': 'Bukit Lawang',
        'berastagi': 'Berastagi',
        'custom': 'Paket Kustom'
    };
    return items[val] || val;
}
