<?php

require_once("../private/config.php");
$artikel = newsarticleManager::getArticleById($_GET["id"]);

var_dump($artikel);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../private/components/head.php" ?>
</head>

<body>
    <?php require_once "../private/components/navbar.php" ?>
    <div class="container">
        <div style=" display: flex; justify-content: space-between;">
            <h2 class="mt-4"><?= $artikel->Titel ?></h2> <img src="<?= $artikel->imgpath ?>">
        </div>

        <div class="article-container">

            <div class="article">
                <b><i>
                        <div class="article-title"><?= $artikel->author ?></div>
                    </i></b>
                <div class="article-content"><?= $artikel->tekst ?></div>
            </div>
            <!-- <img src="<?= $artikel->imgpath ?>"> -->
        </div>
    </div>
</body>

</html>