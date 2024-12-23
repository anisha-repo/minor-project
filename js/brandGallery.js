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
$(document).ready(function() {
    alert("Document is ready!");
  });
document.querySelectorAll('.wish').forEach(button => {
    button.addEventListener('click', function() { 
        console.log('clicked')
        const productId = this.getAttribute('data-product-id');
        const heartIcon = document.getElementById(`wishlist ${productId}`);
        
        // Toggle the 'active' class for heart icon
        heartIcon.classList.toggle('active');

        // Fetch request to add/remove from wishlist
        if (heartIcon.classList.contains('active')) {
            // If heart is active, send a request to add to wishlist
            fetch('add_to_wishlist.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `product_id=${productId}`
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('message').innerText = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
            // If heart is inactive, send a request to remove from wishlist
            fetch('remove_from_wishlist.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `product_id=${productId}`
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('message').innerText = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
});


window.onload = loadProducts;