function openTab(tabName, element) {
    var i, tabContent, tabLinks;
    tabContent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
    }
    tabLinks = document.getElementsByClassName("tab-link");
    for (i = 0; i < tabLinks.length; i++) {
        tabLinks[i].classList.remove("active");
    }
    document.getElementById(tabName).style.display = "block";
    element.classList.add("active");
}
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("signin").style.display = "block";
});
function validateSignInForm() {
    var email = document.getElementById("email-signin").value;
    var password = document.getElementById("password-signin").value;

    if (!email || !password) {
        alert("Please enter your email and password.");
        return false;
    }
   
    return true;
}

function validateSignUpForm() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email-signup").value;
    var password = document.getElementById("password-signup").value;
    var address = document.getElementById("address").value;

    var errors = [];

    if (!fname || !lname || !phone || !email || !password || !address) {
        errors.push("All fields are required!");
    }

    if (phone.length < 10 || isNaN(phone)) {
        errors.push("Please enter a valid phone number.");
    }

    if (password.length < 8) {
        errors.push("Password should be at least 8 characters.");
    }

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailPattern)) {
        errors.push("Please enter a valid email address.");
    }

    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }

    alert("Account created successfully!");
    return true;
}