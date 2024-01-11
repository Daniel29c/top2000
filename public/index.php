<?php require_once("../private/config.php"); 

$articles = newsarticleManager::getAllNews();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../private/components/head.php" ?>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            /* margin: 0; */
        }
        .img {
            text-align: center;
        }
        .img img {
            display: block;
            margin-top: 2%;
            margin-left: auto;
            margin-right: auto;
            max-width: 100%; /* Make sure the image doesn't exceed its container's width */
            height: auto; /* Maintain aspect ratio */
        }
        .background {
            background-color: #22282E;
            width: 100%;
            height: 55%;
            position: absolute;
        }
        .container {
            position: relative;
        }
        .img,
        .logo {
            display: block;
            width: 100%;
            height: auto;
            position: absolute;
            top: 0;
            left: 0;
        }
        .logo {
            width: 44%; 
            max-width: 500px; 
            height: auto;
            top: 80%;
            left: 50%;
            transform: translate(-50%, 100%); 
        }
        .news{
            background-color: #E6E6E6;
            width: 100%;
            height: 30%;
            position: absolute;
            top: 104%;
        }
        .article1{
            width: 35%;
            height: 35%;
            background-color: white;
            position: absolute;
            top: 10%;
            left: 12.5%;
        }
        .article2{
            width: 35%;
            height: 35%;
            background-color: white;
            position: absolute;
            top: 10%;
            left: 52.5%;
        }

        .news-container {
            max-width: 80%;
            margin: auto;
            background: #E6E6E6;
            margin-top: 62vh;
            position: relative;
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
    <div class="background">
        <div class="container">
            <div class="img">
                <img src="img/top-2000-home.jpg" class="img-fluid" width="1150" height="550" />
            </div>
            <img src="img/npo_radio2_top2000_logo.svg" class="logo img-fluid" width="20%" height="auto" />
        </div>
    </div>
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
