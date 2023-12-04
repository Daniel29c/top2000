<?php
    require_once "../../private/admin_autoloader.php";

    $artiesten = artist_bandManager::getAllArtist();

    //als submit is geklikt voeg artiest toe
    if($_POST){
        $name = $_POST["name"];
        $artiestId = $_POST["artiestId"];
        songManager::addSong($name, $artiestId);
        header("location: nummer_admin.php");
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
        <form method="POST">
            <h3 class="mb-3">Voeg een nummer toe</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Nummer</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <label for="artiestId" class="form-label">Artiest</label>
                <select class="form-select mt-3" name="artiestId" required>
                    <?php
                        foreach($artiesten as $artiest){
                            echo "
                                <option value='$artiest->id'>$artiest->name</option>
                            ";
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>


</body>