<?php
    require_once "../../private/admin_autoloader.php";

    

?>

<html>
<head>
    <?php require_once "../../private/components/head.php" ?>
</head>
<body>
    <?php
    require_once "../../private/components/adminnavbar.php"; 

    $artiesten = artist_bandManager::getAllArtist();
    ?>

    <a class="btn btn-primary m-2 p-2" href="add_artiest.php">voeg artiest toe</a>
     
    <table class="table table-striped">
        <thead class="h2 text-center table-dark">
            <tr>
                <th>Artiest Naam</th>
                <th>Edit Artiest</th>
            </tr>
        </thead>
        <tbody class="h4 text-center">
                <?php
                foreach($artiesten as $artiest){
                    echo("
                    <tr>
                    <td>$artiest->name</td>
                    <td><a class='btn btn-info' href='edit_artiest.php?id=$artiest->id'>bewerk artiest</a></td>
                    </tr>
                    ");
                }
                ?>
        </tbody>
    </table>
</body>
</html>