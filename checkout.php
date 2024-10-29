<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Sneaker Store</title>
    <link rel="stylesheet" href="styles/checkout.css">
</head>
<body>
    <div class="checkout-container">
        <h2>Checkout</h2>

        <form id="checkoutForm" onsubmit="return validateCheckoutForm()">
            <h3>Select Payment Method</h3>

            <div class="payment-option">
                <input type="radio" id="cod" name="payment-method" value="COD" checked>
                <label for="cod">Cash on Delivery (COD)</label>
            </div>

            <div class="payment-option">
                <input type="radio" id="card" name="payment-method" value="Card">
                <label for="card">Debit / Credit Card</label>
                <div id="card-details" class="payment-details hidden">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card-number" placeholder="XXXX-XXXX-XXXX-XXXX">

                    <label for="card-name">Name on Card</label>
                    <input type="text" id="card-name" name="card-name" placeholder="Cardholder's Name">

                    <label for="card-expiry">Expiry Date</label>
                    <input type="text" id="card-expiry" name="card-expiry" placeholder="MM/YY">

                    <label for="card-cvv">CVV</label>
                    <input type="text" id="card-cvv" name="card-cvv" placeholder="XXX">
                </div>
            </div>

            <div class="payment-option">
                <input type="radio" id="netbanking" name="payment-method" value="NetBanking">
                <label for="netbanking">Net Banking</label>
                <div id="netbanking-details" class="payment-details hidden">
                    <label for="bank-name">Select Bank</label>
                    <select id="bank-name" name="bank-name">
                        <option value="">Select Bank</option>
                        <option value="hdfc">HDFC Bank</option>
                        <option value="icici">ICICI Bank</option>
                        <option value="sbi">State Bank of India</option>
                        <option value="axis">Axis Bank</option>
                    </select>
                </div>
            </div>

            <div class="payment-option">
                <input type="radio" id="emi" name="payment-method" value="EMI">
                <label for="emi">EMI (Easy Installments)</label>
                <div id="emi-details" class="payment-details hidden">
                    <label for="emi-bank">Select Bank for EMI</label>
                    <select id="emi-bank" name="emi-bank">
                        <option value="">Select Bank</option>
                        <option value="hdfc">HDFC Bank</option>
                        <option value="icici">ICICI Bank</option>
                        <option value="sbi">State Bank of India</option>
                    </select>

                    <label for="emi-tenure">Select Tenure</label>
                    <select id="emi-tenure" name="emi-tenure">
                        <option value="">Select Tenure</option>
                        <option value="3">3 months</option>
                        <option value="6">6 months</option>
                        <option value="12">12 months</option>
                    </select>
                </div>
            </div>

            <button class="place-order"type="submit">Place Order</button>
        </form>
    </div>

    <script src="styles/checkout.css"></script>
</body>
</html>
