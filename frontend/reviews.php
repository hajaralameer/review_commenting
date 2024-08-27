<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <div class="container mt-5">
        <h1>Content Title</h1>
        <p>Content description goes here.</p>

        <div id="reviews">
            <h3>Comments & Reviews</h3>
            <div id="review-list" class="mb-4">
                <!-- Reviews will be loaded here dynamically -->
            </div>
            <form id="review-form">
                <h4>Leave a Comment</h4>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment:</label>
                    <textarea id="comment" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating:</label>
                    <select id="rating" class="form-select" required>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit Review</button>
                <div id="feedback" class="mt-3"></div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/review.js"></script>
</body>
</html>
