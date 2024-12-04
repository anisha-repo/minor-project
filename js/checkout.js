document.addEventListener("DOMContentLoaded", function() {
    const paymentOptions = document.querySelectorAll('input[name="payment-method"]');

    paymentOptions.forEach(option => {
        option.addEventListener("change", function() {
            togglePaymentDetails(this.value);
        });
    });
});

function togglePaymentDetails(selectedMethod) {
    const cardDetails = document.getElementById("card-details");
    const netbankingDetails = document.getElementById("netbanking-details");
    const emiDetails = document.getElementById("emi-details");

    cardDetails.classList.add("hidden");
    netbankingDetails.classList.add("hidden");
    emiDetails.classList.add("hidden");

    if (selectedMethod === "Card") {
        cardDetails.classList.remove("hidden");
    } else if (selectedMethod === "NetBanking") {
        netbankingDetails.classList.remove("hidden");
    } else if (selectedMethod === "EMI") {
        emiDetails.classList.remove("hidden");
    }
}

function validateCheckoutForm() {
    const selectedMethod = document.querySelector('input[name="payment-method"]:checked').value;

    if (selectedMethod === "Card") {
        const cardNumber = document.getElementById("card-number").value;
        const cardName = document.getElementById("card-name").value;
        const cardExpiry = document.getElementById("card-expiry").value;
        const cardCvv = document.getElementById("card-cvv").value;

        if (!cardNumber || !cardName || !cardExpiry || !cardCvv) {
            alert("Please fill all card details.");
            return false;
        }
    } else if (selectedMethod === "NetBanking") {
        const bankName = document.getElementById("bank-name").value;
        if (!bankName) {
            alert("Please select a bank for net banking.");
            return false;
        }
    } else if (selectedMethod === "EMI") {
        const emiBank = document.getElementById("emi-bank").value;
        const emiTenure = document.getElementById("emi-tenure").value;

        if (!emiBank || !emiTenure) {
            alert("Please select a bank and tenure for EMI.");
            return false;
        }
    }

   
}
function validateCheckoutForm() {
    // Get form field values
    var address = document.getElementById('user-address').value;
    var phoneNumber = document.getElementById('user-phone-number').value;

    // Check if address and phone number are filled out
    if (address === "" || phoneNumber === "") {
        alert("Address and Phone Number are required.");
        return false; // Prevent form submission
    }

    // Optionally, check for phone number format
    var phoneRegex = /^[0-9]{10}$/; // Simple check for 10-digit phone number
    if (!phoneRegex.test(phoneNumber)) {
        alert("Please enter a valid 10-digit phone number.");
        return false; // Prevent form submission
    }

    // If everything is valid, allow the form to submit
    return true;
}
// Attach the validateAddressForm function to the Next button
document.addEventListener("DOMContentLoaded", function() {
    const nextButton = document.querySelector('.next-button');
    if (nextButton) {
        nextButton.addEventListener('click', validateAddressForm);
    }
});