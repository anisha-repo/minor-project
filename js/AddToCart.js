document.addEventListener('DOMContentLoaded', function () {
  const cartItems = document.querySelectorAll('.quantity-input');

  cartItems.forEach(item => {
      item.addEventListener('change', function () {
          const productId = this.dataset.id;
          const quantity = parseInt(this.value);
          // Send AJAX request to update the cart on the server
          updateCart(productId, quantity);
      });
  });

  document.querySelectorAll('.remove-btn').forEach(btn => {
      btn.addEventListener('click', function () {
          const productId = this.dataset.id;
          removeFromCart(productId);
      });
  });

  document.querySelectorAll('.increase').forEach(btn => {
      btn.addEventListener('click', function () {
          const productId = this.dataset.id;
          const input = document.querySelector(`input[data-id='${productId}']`);
          input.value = parseInt(input.value) + 1;
          updateCart(productId, input.value);
      });
  });

  document.querySelectorAll('.decrease').forEach(btn => {
      btn.addEventListener('click', function () {
          const productId = this.dataset.id;
          const input = document.querySelector(`input[data-id='${productId}']`);
          if (parseInt(input.value) > 1) {
              input.value = parseInt(input.value) - 1;
              updateCart(productId, input.value);
          }
      });
  });

  function updateCart(productId, quantity) {
      // Implement AJAX request to update the cart in the session
      // Example:
      fetch('update_cart.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify({ product_id: productId, quantity: quantity })
      })
      .then(response => response.json())
      .then(data => {
          // Update the total and subtotal based on the response
          // Update UI as needed
      });
  }

  function removeFromCart(productId) {
      // Implement AJAX request to remove item from cart
      fetch('remove_from_cart.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify({ product_id: productId })
      })
      .then(response => response.json())
      .then(data => {
          // Handle the UI update after removal
          // Optionally reload the cart display
      });
  }
});
