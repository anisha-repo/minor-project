document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission for validation
    const username = document.getElementById("user_name").value.trim();
    const password = document.getElementById("password").value.trim();
    const errorMessage = document.getElementById("errorMessage");

    // Check for empty fields
    if (!username || !password) {
        errorMessage.textContent = "Please fill out all fields.";
        errorMessage.style.display = "block";
    } else {
        // If fields are valid, submit the form
        errorMessage.style.display = "none";
        this.submit(); // Continue with form submission
    }
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
