<?php
require '../autoload.php';

$db = (new Database())->getConnection();
$comment = new Comment($db);

$content_id = $_GET['content_id'];
$reviews = $comment->readByContent($content_id);

$output = '';

while ($row = $reviews->fetch(PDO::FETCH_ASSOC)) {
    $output .= '
    <div class="comment-box">
        <p><strong>' . htmlspecialchars($row['username']) . ':</strong></p>
        <p>' . htmlspecialchars($row['comment']) . '</p>
        <p class="rating-stars">' . str_repeat('★', $row['rating']) . str_repeat('☆', 5 - $row['rating']) . '</p>
        <p><small>' . $row['created_at'] . '</small></p>
        <span class="like-dislike">👍 ' . $row['likes'] . '</span>
        <span class="like-dislike">👎 ' . $row['dislikes'] . '</span>
    </div>';
}

echo $output;
?>
