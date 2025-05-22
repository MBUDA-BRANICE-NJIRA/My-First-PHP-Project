<?php
include '../../db/Conection.php'; // Connecting to db

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete statement
    $stmt = $conn->prepare('DELETE FROM articles WHERE id = ?');
    $stmt->execute([$id]);

    // Redirect after deletion
    echo "<script>alert('Article deleted successfully.'); window.location.href='articles.php';</script>";
} else {
    echo "<script>alert('No article ID provided.'); window.location.href='articles.php';</script>";
}
?>