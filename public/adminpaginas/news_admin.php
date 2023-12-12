<?php
    require_once "../../private/admin_autoloader.php";

    if (isset($_GET['remove_id'])) {
        $id = $_GET['remove_id'];
        newsarticleManager::removeArticle($id);
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

    $news = newsarticleManager::getAllNews();
    ?>

    <a class="btn btn-primary m-2 p-2" href="add_news.php">voeg nieuws artiekel toe</a>
     
    <table class="table table-striped">
        <thead class="h2 text-center table-dark">
            <tr>
                <th>Naam autheur</th>
                <th>Nieuws titel</th>
                <th>Nieuws plaatje</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody class="h4 text-center">
                <?php
                foreach($news as $new){
                    echo("
                    <tr>
                    <td>$new->author</td>
                    <td>$new->Titel</td>
                    <td><img src='../$new->imgpath' width='100' height='100'></td>
                    <td>
                    <a class='btn btn-info' href='edit_news.php?id=$new->id'>edit</a>
                    <a class='btn btn-danger' href='?remove_id=$new->id' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a>
                    </td>
                    </tr>
                    ");
                }
                ?>
        </tbody>
    </table>
</body>
</html>