const cartItems = document.querySelectorAll(".cart-item");
const subtotalElement = document.getElementById("subtotal");
const totalElement = document.getElementById("total");
const shippingCost = 10;

function updateCartTotals() {
  let subtotal = 0;

  cartItems.forEach(item => {
    const price = parseFloat(item.querySelector("p").textContent.replace("$", ""));
    const quantity = parseInt(item.querySelector("input").value);
    subtotal += price * quantity;
  });

  subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
  const total = subtotal + shippingCost;
  totalElement.textContent = `$${total.toFixed(2)}`;
}

cartItems.forEach(item => {
  const decreaseButton = item.querySelector(".decrease");
  const increaseButton = item.querySelector(".increase");
  const quantityInput = item.querySelector("input");
  const removeButton = item.querySelector(".remove-btn");

  decreaseButton.addEventListener("click", () => {
    let quantity = parseInt(quantityInput.value);
    if (quantity > 1) {
      quantityInput.value = quantity - 1;
      updateCartTotals();
    }
  });

  increaseButton.addEventListener("click", () => {
    let quantity = parseInt(quantityInput.value);
    quantityInput.value = quantity + 1;
    updateCartTotals();
  });

  quantityInput.addEventListener("input", updateCartTotals);

  removeButton.addEventListener("click", () => {
    item.remove();
    updateCartTotals();
  });
});


    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');

            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'product_id=' + productId
            })
            .then(response => {
                if (response.ok) {
                    alert('Product added to cart!');
                    // Optionally, update the cart count or UI
                } else {
                    alert('Failed to add product to cart.');
                }
            });
        });
    });



updateCartTotals();
