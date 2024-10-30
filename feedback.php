<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="styles/feedback'.css">
</head>
<body>
    <div class="container">
        <h2>We Value Your Feedback</h2>
        <p>Your feedback helps us improve our services and provide you with the best experience possible. Please take a moment to share your thoughts.</p>

        <form id="feedbackForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="" disabled selected>Select a rating</option>
                    <option value="1">1 - Poor</option>
                    <option value="2">2 - Fair</option>
                    <option value="3">3 - Good</option>
                    <option value="4">4 - Very Good</option>
                    <option value="5">5 - Excellent</option>
                </select>
            </div>

            <div class="form-group">
                <label for="comments">Comments:</label>
                <textarea id="comments" name="comments" rows="5" required></textarea>
            </div>

            <button type="submit" class="action-btn">Submit Feedback</button>
        </form>

        <p class="thank-you-message" id="thankYouMessage" style="display:none;">Thank you for your feedback! We appreciate your time.</p>
    </div>

    <script src="js/feedback.js"></script>
</body>
</html>
