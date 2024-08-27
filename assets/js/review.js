$(document).ready(function () {
    const contentId = 1; // Fake content ID for demonstration

    // Load reviews when the page loads
    loadReviews();

    // Submit new review
    $('#review-form').on('submit', function (e) {
        e.preventDefault();

        const comment = $('#comment').val();
        const rating = $('#rating').val();

        $.ajax({
            url: '../backend/post_comment.php',
            method: 'POST',
            data: {
                content_id: contentId,
                comment: comment,
                rating: rating
            },
            success: function (response) {
                $('#feedback').text('Your review was submitted successfully!').css('color', 'green');
                loadReviews(); // Reload the reviews after submission
            },
            error: function () {
                $('#feedback').text('Failed to submit your review. Please try again.').css('color', 'red');
            }
        });
    });

    // Load reviews
    function loadReviews() {
        $.ajax({
            url: '../backend/get_reviews.php',
            method: 'GET',
            data: {
                content_id: contentId
            },
            success: function (response) {
                $('#review-list').html(response);
            },
            error: function () {
                $('#review-list').html('<p>Failed to load reviews.</p>');
            }
        });
    }
});
