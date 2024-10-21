document.addEventListener('DOMContentLoaded', function() {
    const wishlistButtons = document.querySelectorAll('.wish');

    wishlistButtons.forEach(button => {
        const icon = button.querySelector('.wishlist');
        const productId = button.dataset.productId;

        // Restore active state from localStorage
        if (localStorage.getItem(`wishlist-${productId}`) === 'true') {
            icon.classList.add('active');
        }

        button.addEventListener('click', function() {
            icon.classList.toggle('active'); // Toggle active class
            localStorage.setItem(`wishlist-${productId}`, icon.classList.contains('active')); // Save state
        });
    });
});
