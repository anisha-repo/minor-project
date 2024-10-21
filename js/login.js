function openTab(tabName) {
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
    event.currentTarget.classList.add("active");
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
    alert("Signed in successfully!");
    return true;
}
function validateSignUpForm() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email-signup").value;
    var password = document.getElementById("password-signup").value;
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

    alert("Account created successfully!");
    return true;
}
