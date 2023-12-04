<?php
    require_once "../../private/admin_autoloader.php";

    //als submit is geklikt voeg artiest toe
    if($_POST){
        $name = $_POST["name"];
        artist_bandManager::addArtist_band($name);
        header("location: artiest_admin.php");
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
            <h3 class="mb-3">Voeg een artiest toe</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Artiest naam</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>


</body>