<?php 

require_once("../private/config.php");

$articles = newsarticleManager::getAllNews();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../private/components/head.php"; ?>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .news-container {
            max-width: 80%;
            margin: auto;
            background: #E6E6E6;
            margin-top: 4vh;
        }
        .news-item {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }
        .news-article {
            width: calc(33.33% - 20px);
            box-sizing: border-box;
        }
        .news-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .news-content {
            color: #555;
        }
        .news-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        /* Style for the anchor tag */
        .news-article a {
            text-decoration: none; /* Remove underline */
            color: inherit; /* Use the default color (usually black) */
        }
    </style>
</head>
<body>
<?php require_once "../private/components/navbar.php" ?>

<div class="news-container">
    <h1>Laatste nieuws</h1>

    <?php
    echo '<div class="news-item">';

    // Loop through the news articles and display them using foreach
    foreach ($articles as $article) {
        echo '<div class="news-article">';
        echo '<a href="artikel.php?id=' . $article->id . '">';
        echo '<img class="news-image" src="' . $article->imgpath . '" alt="">';
        echo '<div class="news-title">' . $article->Titel . '</div>';
        echo '<div class="news-content">' . $article->author . '</div>';
        echo '</a>';
        echo '</div>';
    }

    echo '</div>';
    ?>
</div>

</body>
</html>