document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    const destinationCards = document.querySelectorAll('.destinations-grid .card');
    
    function handleFilterClick(button) {
        
        const filterValue = button.getAttribute('data-filter') || 'all';

        filterButtons.forEach(btn => btn.classList.remove('active'));
        
        button.classList.add('active');
        
        destinationCards.forEach(card => {
            
            const cardCategory = card.getAttribute('data-category');
            
            if (!cardCategory) {
                console.warn('Card missing data-category attribute:', card);
                return; 
            }
            
            const categories = cardCategory.split(' '); 

            if (filterValue === 'all' || categories.includes(filterValue)) {
                card.style.display = 'block'; 
            } else {
                card.style.display = 'none'; 
            }
        });
    }

    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            handleFilterClick(this);
        });
    });

    if (filterButtons.length > 0) {
        handleFilterClick(filterButtons[0]);
    }
});