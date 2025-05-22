<?php
include '../Includes/header.php'; // The Navbar
include '../../db/Conection.php'; // Connecting to db

// Check if an ID has been passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the article for editing
    $stmt = $conn->prepare('SELECT * FROM articles WHERE id = ?');
    $stmt->execute([$id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    // If the article does not exist, redirect
    if (!$article) {
        echo "<script>alert('Article not found.'); window.location.href='articles.php';</script>";
        exit;
    }
}

// Handle form submission for updating the article
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Update logic
    $stmt = $conn->prepare('UPDATE articles SET title = ?, description = ? WHERE id = ?');
    $stmt->execute([$title, $description, $id]);
    echo "<script>alert('Article updated successfully.'); window.location.href='articles.php';</script>";
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Edit Article</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    <script src='https://cdn.tailwindcss.com'></script>
</head>

<body>
    <div class='container mx-auto p-4'>
        <h2 class='text-2xl font-bold mb-4'>Edit Article</h2>
        <form method='POST' class='bg-white p-6 rounded-lg shadow-lg'>
            <div class='mb-4'>
                <label class='block text-gray-700 text-sm font-bold mb-2' for='title'>Title</label>
                <input type='text' name='title' id='title' value='<?php echo htmlspecialchars($article['title']); ?>' required class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' />
            </div>
            <div class='mb-4'>
                <label class='block text-gray-700 text-sm font-bold mb-2' for='description'>Description</label>
                <textarea name='description' id='description' required class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'><?php echo htmlspecialchars($article['description']); ?></textarea>
            </div>
            <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Update Article</button>
            <a href="delete.php?id=<?php echo $article['id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Article</a>
        </form>
    </div>
</body>

</html>