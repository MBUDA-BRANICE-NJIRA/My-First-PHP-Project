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

    <div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-8 bg-gray-100 min-h-50'> 
    <?php
        try {
            $stmt = $conn->query('SELECT * FROM articles ORDER BY id DESC');
            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($articles) === 0) {
                echo "<div class='col-span-3 text-gray-600 text-center'>No articles found.</div>";
            } else {
                foreach ($articles as $article) {
                    echo "<div class='rounded-xl overflow-hidden shadow-lg bg-white p-6 hover:shadow-2xl transition-shadow duration-300 flex flex-col justify-between'>";
                    // Optional: Add an icon or image
                    echo "<div class='flex items-center justify-center mb-4'><i class='fa fa-newspaper text-4xl text-blue-400'></i></div>";
                    echo "<h2 class='text-2xl font-bold text-slate-800 mb-2 underline'>" . htmlspecialchars($article['title']) . "</h2>";
                    echo "<p class='text-gray-600 mb-4 text-justify'>" . nl2br(htmlentities($article['description'])) . "</p>";
                    echo "<div class='flex gap-4 mt-auto'>";
                    echo "<a href='edit.php?id=" . $article['id'] . "' class='flex items-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm transition'><i class='fa fa-edit mr-2'></i>Edit</a>";
                    echo "<a href='delete.php?id=" . $article['id'] . "' class='flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm transition' onclick=\"return confirm('Are you sure you want to delete this article?');\"><i class='fa fa-trash mr-2'></i>Delete</a>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        } catch (PDOException $e) {
            echo "<div class='col-span-3 text-red-600'>Error fetching articles: " . $e->getMessage() . "</div>";
        }
    ?>
</div>
    </div>
</body>

</html>