document.addEventListener('DOMContentLoaded', function() {
    // Mengambil semua tombol filter
    const filterButtons = document.querySelectorAll('.filter-btn');
    // Mengambil semua kartu destinasi. Nama kelas kartu di HTML baru adalah '.card'.
    const destinationCards = document.querySelectorAll('.destinations-grid .card');
    
    // Fungsi utama yang menangani proses penyaringan
    function handleFilterClick(button) {
        // Mendapatkan nilai filter dari atribut data-filter (misalnya 'perkotaan')
        // Jika tombol tidak memiliki data-filter, kita asumsikan ini adalah 'all' (Semua)
        const filterValue = button.getAttribute('data-filter') || 'all';

        // 1. Menghapus kelas 'active' dari semua tombol
        filterButtons.forEach(btn => btn.classList.remove('active'));
        
        // 2. Menambahkan kelas 'active' ke tombol yang diklik (untuk styling)
        button.classList.add('active');
        
        // 3. Menyaring kartu destinasi
        destinationCards.forEach(card => {
            // Mengambil kategori kartu dari atribut data-category
            const cardCategory = card.getAttribute('data-category');
            
            // Jika kartu tidak memiliki data-category, lewati atau asumsikan 'all'
            if (!cardCategory) {
                console.warn('Card missing data-category attribute:', card);
                return; // Lewati kartu ini
            }
            
            // Memisahkan kategori kartu (data-category="perkotaan sejarah campuran")
            const categories = cardCategory.split(' '); 

            // Logika: Jika filter 'all' atau jika filterValue ada di daftar kategori kartu
            if (filterValue === 'all' || categories.includes(filterValue)) {
                card.style.display = 'block'; // Tampilkan kartu
            } else {
                card.style.display = 'none'; // Sembunyikan kartu
            }
        });
    }

    // Loop melalui setiap tombol filter untuk menambahkan event listener
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            handleFilterClick(this);
        });
    });

    // Inisialisasi: Buat tombol 'Semua' palsu untuk memuat semua kartu saat pertama kali dimuat
    // Kita harus mencari tombol yang akan menjadi default 'Semua' (misalnya, tombol pertama 'Campuran')
    // atau jika Anda ingin 'Semua' secara eksplisit, Anda harus menambahkannya di HTML.
    
    // Karena HTML Anda tidak memiliki tombol 'Semua' eksplisit, mari kita aktifkan tombol pertama ('Campuran') secara default
    if (filterButtons.length > 0) {
        handleFilterClick(filterButtons[0]);
    }
});