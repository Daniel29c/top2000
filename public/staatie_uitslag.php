<?php
require_once("../private/config.php");
require_once "../private/managers/staatieManager.php";

if (isset($_GET["song"])) {
    $songId = $_GET["song"];
    $song = songManager::getSongById($songId);
    if (isset($song) && $song == true) {
        $search = true;
    } else {
        $search = false;
    }
} else {
    $search = false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../private/components/head.php" ?>
    <style>
        body {
            background-color: #22282E;
        }

        .staatie_img {
            background-color: white;
            margin: 2% 20%;
            width: 60%;
            height: 40vw;
            background-repeat: no-repeat, repeat;
            background-color: white;
            background-size: cover;
            border-radius: 20px;
            background-position: center;
        }

        .info {
            color: white;
            text-align: center;
            font-size: 50px;
        }
    </style>
</head>

<body>
    <img class="staatie_img" src="<?php echo $search ? 'img/yes.jpg' : 'img/no.jpg'; ?>">
    
    </img>
    <div class="info">
        <?php
        if ($search == true) {
            echo "<style>background-image: url('img/yes.jpg');</style>";
            echo "Het nummer: " . $song->name . " Staat er in met artiest: " . $song->artist_band_name;
        } else {
            echo "Het nummer/artiest waar u naar zoekt staat niet in de top2000";
        }
        ?>
    </div>
</body>

</html>