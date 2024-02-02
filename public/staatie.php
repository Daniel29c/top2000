<?php

require_once("../private/config.php");
require_once "../private/managers/staatieManager.php";

if ($_POST) {
    $search = StaatieManager::searchSong($_POST["name"], $_POST["artist_band_id"]);



    if (isset($search)) {
        header("location: staatie_uitslag.php?song=$search");
        exit();
    } else {
        header("location: staatie_uitslag.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../private/components/head.php" ?>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("img/giphy.gif");
            background-size: 100% 350px;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: top;
            height: 100vh;
            margin: 0;
            background-color: #22282E;
        }

        .logo {
            background-image: url("img/npo_radio2_top2000_logo.svg");
            background-repeat: no-repeat;
            background-position: center;
            width: 500px;
            height: 375px;
            position: absolute;
            top: 23.5%;
            z-index: -1;

        }

        .btn-danger {
            background-color: #DA151A !important;
        }

        .form-group {
            margin-top: 140%;
            z-index: 0;
        }
    </style>
</head>

<body>
    <!-- <?php require_once "../private/components/navbar.php" ?> -->

    <div class="logo"></div>


    <form method="POST">
        <div class="form-group">
            <label for="artiest">Artiest</label>
            <input type="text" class="form-control" id="artiest" name="artist_band_id" placeholder="Artiest">
            <label for="titel">Titel</label>
            <input type="text" class="form-control" id="nummer" name="name" placeholder="Titel">
        </div>
        <div class="btn  group-vertical">
            <button type="submit" class="btn btn-danger btn-lg">Staat ie erin?</button>
        </div>
    </form>

</body>

</html>