const filterButtons = document.querySelectorAll('.category-nav button');
const packages = document.querySelectorAll('.package-card');

filterButtons.forEach(button => {
    button.addEventListener('click', () => {

        filterButtons.forEach(btn => btn.classList.remove('active'));

        button.classList.add('active');

        const filter = button.getAttribute('data-filter');

        packages.forEach(pkg => {
            const category = pkg.getAttribute('data-category');

            if (filter === 'all') {
                pkg.style.display = 'block';
            } 
            else if (category === filter) {
                pkg.style.display = 'block';
            } 
            else {
                pkg.style.display = 'none';
            }
        });
    });
});
