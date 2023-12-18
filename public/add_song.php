<?php
    require_once("../private/config.php");

    if ($_POST) {
        $nummer = $_POST["nummer"];
        $artiest = $_POST["artiest"];
        songManager::addSongAndArtist($nummer, $artiest);

        header("location: stemwijzer.php");
    }


?>
<html>
<head>
    <?php require_once "../private/components/head.php" ?>
    
</head>
<body>
<div class="container">
        <a href="stemwijzer.php" class="btn btn-warning mt-3">Terug</a>
        <h1 class="text-center my-4">Andere nummer toevoegen</h1>
        <form method="POST">
            <div class="form-group">
                <label for="artiest">Artiest:</label>
                <input type="text" name="artiest" class="form-control">
            </div>
            <div class="form-group">
                <label for="nummer">Nummer:</label>
                <input type="text" name="nummer" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>