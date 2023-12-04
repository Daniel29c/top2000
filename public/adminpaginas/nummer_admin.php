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

    $nummers = songManager::getAllSongs();
    ?>

    <a class="btn btn-primary m-2 p-2" href="add_nummer.php">voeg nummer toe</a>
     
    <table class="table table-striped">
        <thead class="h2 text-center table-dark">
            <tr>
                <th>Naam Nummer</th>
                <th>artiest van nummer</th>
                <th>Edit Nummer</th>
            </tr>
        </thead>
        <tbody class="h4 text-center">
                <?php
                foreach($nummers as $nummer){
                    echo("
                    <tr>
                    <td>$nummer->name</td>
                    <td>$nummer->artist_band_name</td>
                    <td><a class='btn btn-info' href='edit_nummer.php?id=$nummer->id'>bewerk nummer</a></td>
                    </tr>
                    ");
                }
                ?>
        </tbody>
    </table>
</body>
</html>