const sneakers = [
    { id: 1, name: "AIR FORCE 1'07 LV8", price: 10795, image: "sneaker1.jpg" },
    { id: 2, name: "AIR JORDAN 1 LOW 85", price: 15995, image: "sneaker2.jpg" },
    { id: 3, name: "AIR JORDAN 1 LOW RETRO (GS)", price: 8995, image: "sneaker3.jpg" },
    { id: 4, name: "WMN'S DUNK LOW RETRO LX", price: 11895, image: "sneaker4.jpg" },
    { id: 5, name: "DUNK LOW RETRO PREMIUM", price: 10795, image: "sneaker5.jpg" },
    { id: 6, name: "FULL FORCE LOW", price: 8495, image: "sneaker6.jpg" },
    { id: 7, name: "INTIATOR", price: 8495, image: "sneaker7.jpg" },
    { id: 8, name: "LUKA 3 PF MOTORSPORT", price: 11895, image: "sneaker8.jpg" },
    { id: 9, name: "NIKE AIRFORCE 1 HIGH '07", price: 14959, image: "sneaker9.jpg" },
    { id: 10, name: "AIR JORDAN 4  RETRO (GS)", price: 16462, image: "sneaker10.jpg" },
    { id: 11, name: "WMN'S AIR JORDAN 1 RETRO HIGH  OG FIRST FLIGHT", price: 16995, image: "sneaker11.jpg" },
    
];

function loadProducts() {
    const productList = document.getElementById('product-list');

    // sneakers.forEach(sneaker => {
    //     const productItem = document.createElement('div');
    //     productItem.classList.add('product-item');

    //     productItem.innerHTML = `
    //         <img src="images/${sneaker.image}" alt="${sneaker.name}">
    //         <h3>${sneaker.name}</h3>
    //         <p>$${sneaker.price}</p>
    //         <button onclick="addToCart(${sneaker.id})">Add to Cart</button>
    //     `;

        productList.appendChild(productItem);
    };

let cartCount = 0;

function addToCart(id) {
    cartCount++;
    document.getElementById('cart-count').textContent = cartCount;
    alert(`Added ${sneakers.find(sneaker => sneaker.id === id).name} to the cart!`);
}
document.addEventListener('DOMContentLoaded', function () {
    const wishButtons = document.querySelectorAll('.wish');
    
    wishButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default form submission

            const productId = button.getAttribute('data-product-id'); // Get the product ID
            const formId = 'form-' + productId; // Get form ID dynamically
            const form = document.getElementById(formId); // Get the form by ID

            // Store the current scroll position
            sessionStorage.setItem('scrollPosition', window.scrollY);

            // Send AJAX request to add to wishlist
            fetch('add_to_wishlist.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(new FormData(form)) // Serialize form data
            })
            .then(response => response.json()) // Expect a JSON response
            .then(data => {
                if (data.success) {
                    // Update heart icon class to reflect it's added to wishlist
                    const heartIcon = button.querySelector('i');
                    heartIcon.classList.add('added'); // Add 'added' class to color the heart
                    heartIcon.classList.remove('fa-regular'); // Remove 'fa-regular'
                    heartIcon.classList.add('fa-solid'); // Add 'fa-solid'
                }
                /* else {
                    alert('Failed to add to wishlist.');
                }*/
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });

    // Restore the scroll position after the page reloads
    window.onload = function () {
        const scrollPosition = sessionStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
            sessionStorage.removeItem('scrollPosition');
        }
    };
});




window.onload = loadProducts;