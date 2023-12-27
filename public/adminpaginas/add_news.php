<?php
    require_once "../../private/admin_autoloader.php";
    $imgpath = "public/";
    if($_POST){
        var_dump($_POST); 
        $replaced_Article = str_replace(["\n", "<br />", "<br>", "/n", "\r\n", "\r \n"], "<br />", $_POST["artikel"]);
        var_dump($replaced_Article);
        newsarticleManager::addArticle($_POST["title"], $replaced_Article, $imgpath, $_POST["author"]);
    }
    

    // $artikel = "dit is een lijn\n dit is een nieuwe lijn";
    // var_dump($artikel);

?>

<html>
<head>
    <?php require_once "../../private/components/head.php" ?>
    <style>
        #top-container{
            margin-top: 20px;
            display: flex;
            justify-content: space-around ;
            
        }
    </style>
</head>
<body>
    <?php
        require_once "../../private/components/adminnavbar.php"; 
    ?>

    <form method="post">
        <div id="top-container">
        <div><label for="title">Titel: </label> <input type="text" name="title" required /></div><div><label for="author">Naam author: </label> <input type="text" name="author" required /></div></div>
        <label for="titel">Artikel: </label><textarea style="height: 400px; width: 300px;" required name="artikel"></textarea>
        <input type="submit" />
    </form>
    
</body>
