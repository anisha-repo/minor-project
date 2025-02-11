// Feedback form submission handler
document.getElementById('feedbackForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get form values
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const rating = document.getElementById('rating').value;
    const comments = document.getElementById('comments').value;

    console.log(name, email, rating, comments); // Debugging

    // Display thank you message
    document.getElementById('thankYouMessage').style.display = 'block';

    // Reset the form
    document.getElementById('feedbackForm').reset();
});
