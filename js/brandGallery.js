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

window.onload = loadProducts;