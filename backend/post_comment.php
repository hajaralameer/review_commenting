<?php
session_start();
require '../autoload.php';

$db = (new Database())->getConnection();
$comment = new Comment($db);

if (Auth::isAuthenticated()) {
    $comment->user_id = Auth::getUserID();
    $comment->content_id = $_POST['content_id'];
    $comment->comment = $_POST['comment'];
    $comment->rating = $_POST['rating'];
    $comment->created_at = date('Y-m-d H:i:s');

    if ($comment->create()) {
        echo "success";
    } else {
        http_response_code(500);
        echo "error";
    }
} else {
    http_response_code(403);
    echo "You must be logged in to post a comment.";
}
?>
