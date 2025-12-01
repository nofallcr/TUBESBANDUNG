document.addEventListener('DOMContentLoaded', () => {
            const header = document.querySelector('.page-header');
            const container = document.querySelector('.container');
            
            if (header) {
                setTimeout(() => {
                    header.style.opacity = '1';
                    header.style.transform = 'translateY(0)';
                }, 100); 
            }

            if (container) {
                setTimeout(() => {
                    container.style.opacity = '1';
                    container.style.transform = 'translateY(0)';
                }, 500); 
            }
            
            console.log("Halaman Tentang Kami dimuat dan animasi siap.");
        });