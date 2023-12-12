<?php
require_once "../../private/admin_autoloader.php";

//als submit is geklikt voeg artiest toe
if ($_POST) {
    $author = $_POST["athor_name"];
    $Titel = $_POST["news_title"];
    $tekst = $_POST["news_text"];

    $imgpath = '../public/img/news/' . $_FILES["image"]["name"];
    
    move_uploaded_file($_FILES["image"]['tmp_name'], '../' . $imgpath);
    newsarticleManager::addArticle($tekst, $imgpath, $author, $Titel);
    header("location: news_admin.php");
}
?>

<html>

<head>
    <?php require_once "../../private/components/head.php" ?>

</head>

<body>
    <?php
    require_once "../../private/components/adminnavbar.php";

    ?>

    <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data">
            <h3 class="mb-3">Voeg een nieuws artiekel toe</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Autheur naam</label>
                <input type="text" class="form-control" id="athor_name" name="athor_name" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nieuws titel</label>
                <input type="text" class="form-control" id="news_title" name="news_title" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nieuws tekst</label>
                <textarea rows="4" cols="50" class="form-control" id="news_text" name="news_text" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">nieuws artiekel foto</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>


</body>
</html>