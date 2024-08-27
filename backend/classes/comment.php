<?php

class Comment {
    private $conn;
    private $table_name = 'comments';

    public $id;
    public $user_id;
    public $content_id;
    public $comment;
    public $rating;
    public $created_at;
    public $likes = 0;
    public $dislikes = 0;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (user_id, content_id, comment, rating, created_at) VALUES (:user_id, :content_id, :comment, :rating, :created_at)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':content_id', $this->content_id);
        $stmt->bindParam(':comment', $this->comment);
        $stmt->bindParam(':rating', $this->rating);
        $stmt->bindParam(':created_at', $this->created_at);

        return $stmt->execute();
    }

    public function readByContent($content_id) {
        $query = "SELECT c.*, u.username FROM " . $this->table_name . " c LEFT JOIN users u ON c.user_id = u.id WHERE content_id = :content_id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':content_id', $content_id);
        $stmt->execute();

        return $stmt;
    }
}
?>
