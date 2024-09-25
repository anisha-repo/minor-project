function validateForm() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var address = document.getElementById("address").value;

    if (!fname || !lname || !phone || !email || !password || !address) {
        alert("All fields are required!");
        return false;
    }

    if (phone.length < 10 || isNaN(phone)) {
        alert("Please enter a valid phone number.");
        return false;
    }

    if (password.length < 6) {
        alert("Password should be at least 6 characters.");
        return false;
    }

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        return false;
    }

    alert("Form submitted successfully!");
    return true;
}
