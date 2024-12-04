function reorder() {
    alert("Reordering the items in this order.");
}

function contactSupport() {
    alert("Contacting support for this order.");
}
// Function to view order details
function viewOrderDetails(orderId) {
    // Fetch order details from the server
    fetch(`getOrderDetails.php?orderId=${orderId}`)
        .then(response => response.json())
        .then(orderDetails => {
            // Populate the orderDetails div with fetched data
            const orderDetailsDiv = document.getElementById('orderDetails');
            
            // Check if there's an error
            if (orderDetails.error) {
                orderDetailsDiv.innerHTML = `<p>${orderDetails.error}</p>`;
            } else {
                orderDetailsDiv.innerHTML = `
                    <h3>Order Details for ${orderId}</h3>
                    <p>Items: ${orderDetails.items}</p>
                    <p>Total Price: RS ${orderDetails.totalPrice}</p>
                    <p>Status: ${orderDetails.status}</p>
                    <p>Delivery Date: ${orderDetails.deliveryDate}</p>
                `;
            }
        })
        .catch(error => console.error('Error fetching order details:', error));
}

function contactSupport() {
    window.location.href = 'contact.php'; // Redirect to the contact us page
}