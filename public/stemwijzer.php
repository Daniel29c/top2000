<?php
require_once("../private/config.php");

$songs = songManager::getAllSongs();

if(isset($_GET['add_id'])){
    $song_id = $_GET['add_id'];


    //start session en maak een array aan om de nummers in op te slaan
    session_start();
    $nummer_lijst = [];
    $_SESSION['nummer_lijst'] = $nummer_lijst ;

}

if ($_POST) {
    $search = $_POST["search_text"];

    $songs = songManager::searchSong($search);
}



?>
<html>

<head>
    <link href="style/stemwijzer.css" rel="stylesheet">
    <?php require_once "../private/components/head.php" ?>
    <style>
        .table {
            border-collapse: separate;
            border-spacing: 0 10px;
            background-color: white;
        }
    </style>
</head>

<body>
    <!-- de navbar -->
    <?php require_once "../private/components/navbar.php" ?>
    <div class="stemwijzer-container">
        <div class="header">

        </div>
        <div class="nummer-lijst-container">
            <div class="toplijst">
                <div class="stap">Stap 1</div>
                <p>Wat zijn de beste nummers ooit</p>
                <p>Van 1 tot en met 7 december kan je hier je stem uitbrengen voor de Top 200, editie 2023</p>
                <p>Selecteer minimaal 5 en maximaal 35 nummers.</p>
                <p>jouw stemlijst&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(MIN 5, MAX 35)</p>
            </div>
            <div class="nummers">
                <form method="POST">
                    <input type="text" name="search_text" style="width: calc(70% - 5px);">
                    <input type="submit" value="zoek" style="width: calc(30% - 5px);">
                    <table class="table table-secondary">
                        <?php
                        foreach ($songs as $song) {
                            echo "<tr>";
                            echo "<td>$song->name<br>";
                            echo "$song->artist_band_name</td>";
                            echo "<td><a class='btn btn-secondary' href='?add_id=$song->id'>+</a></td>";
                            echo "</tr>";
                        }
                        ?>
                        <tr>
                            <td>ander nummer toegvoegen</td>
                            <td><a><a class='btn btn-secondary' href='add_song.php'>+</a></td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
</body>

</html>