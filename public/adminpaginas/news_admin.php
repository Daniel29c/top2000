<?php
    require_once "../../private/admin_autoloader.php";

    $article = newsarticleManager::getArticleById(1);
    var_dump($article);

    

?>

<html>
<head>
    <?php require_once "../../private/components/head.php" ?>
</head>
<body>
    <?php
        require_once "../../private/components/adminnavbar.php"; 
    ?>

<?php echo $article->tekst; ?>
    

<img src=" />
</body>
