<?php
include '../Includes/header.php';//The Navbar

include '../../db/Conection.php';// Connecting to db

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    <script src='https://cdn.tailwindcss.com'></script>
</head>

<body>

    <div class='row grid grid-cols-3 gap-4 p-4'>
        <div class='row grid grid-cols-3 gap-4 p-4'>
    <?php
        try {
            $stmt = $conn->query('SELECT * FROM articles ORDER BY id DESC');
            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            if (count($articles) === 0) {
                echo "<li class='text-gray-600 text-center'>No articles found.</li>";
            } else {
                foreach ($articles as $article) {
                    echo "<div class='max-w-sm rounded-lg overflow-hidden shadow-lg bg-white p-6 mt-6'>";
                    echo "<div class='mt-4'>";
                    echo "<h2 class='text-xl font-bold text-slate-800 mb-2 underline'>" . htmlspecialchars($article['title']) . '</h2>';
                    echo "<p class='text-gray-600 mt-2 text-justify'>" . nl2br(htmlentities($article['description'])) . '</p>';
                    echo "<a href='edit.php?id=" . $article['id'] . "' class='px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm'><i class='fa fa-edit'></i> Edit</a>";
                    echo "<a href='delete.php?id=" . $article['id'] . "' class='px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm' onclick=\"return confirm('Are you sure you want to delete this article?');\"><i class='fa fa-trash'></i> Delete</a>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        } catch (PDOException $e) {
            echo "<li class='text-red-600'>Error fetching articles: " . $e->getMessage() . '</li>';
        }
    ?>
</div>
    </div>
</body>

</html>