function trackOrder(orderId) {
    var orderDetails = document.getElementById("orderDetails");
    orderDetails.style.display = "block";
    orderDetails.innerHTML = `
        <h3>Tracking Order ${orderId}</h3>
        <p>Status: Shipped</p>
        <p>Expected Delivery: Oct 10, 2024</p>
        <p>Current Location: SVIMS </p>
    `;
}

function viewOrderDetails(orderId) {
    var orderDetails = document.getElementById("orderDetails");
    orderDetails.style.display = "block";
    orderDetails.innerHTML = `
        <h3>Order Details for ${orderId}</h3>
        <p>Items: 2 Pairs of Sneakers</p>
        <p>Total Price:RS 900.00</p>
        <p>Status: Shipped</p>
        <p>Shipping Address: 123 KOLKATA SWAMI</p>
    `;
}
