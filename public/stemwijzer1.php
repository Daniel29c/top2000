<?php
require_once("../private/config.php");

$songs = songManager::getAllSongs();
$search_songs = songManager::getAllSongs();

if (!isset($_SESSION['nummer_lijst'])) {
    $_SESSION['nummer_lijst'] = [];
}


//voeg een nummer toe
if (isset($_GET['add_id'])) {
    $song_id = $_GET['add_id'];


    //start session en maak een array aan om de nummers in op te slaan
    $_SESSION['nummer_lijst'][] = $song_id;

    header("location: stemwijzer1.php");
}


//verwijder een nummer uit de favorieten
if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];

    $key = array_search($remove_id, $_SESSION['nummer_lijst']);

    unset($_SESSION['nummer_lijst'][$key]);
    header("location: stemwijzer1.php");
}


//zoek naar een nummer
if ($_POST) {
    $search = $_POST["search_text"];

    $search_songs = songManager::searchSong($search);
}



?>
<html>

<head>
    <link href="style/stemwijzer.css" rel="stylesheet">
    <?php require_once "../private/components/head.php" ?>
    <style>
        .table-all {
            border-collapse: separate;
            border-spacing: 0 10px;
            background-color: white;
        }

        .fav-nr {
            width: 90%;
            margin-left: 5%;
            border-spacing: 0 10px;
            border-collapse: separate;
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
                <p>
                    <?php
                    $favArrayCount = count($_SESSION['nummer_lijst']);
                    

                    if ($favArrayCount > 0) {
                        echo "Favorite (" . $favArrayCount . ")";
                    } else {
                        echo "jouw stemlijst";
                    }

                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(MIN 5, MAX 35)</p>
                <!-- nummers in jouw top lijst -->
                <table class="table fav-nr">
                    <?php

                    //als sessie bestaat
                    if (isset($_SESSION['nummer_lijst'])) {
                        //ga door array van sessie nummerlijst
                        foreach ($_SESSION['nummer_lijst'] as $key => $value) {
                            //ga door array van database songs
                            foreach ($songs as $song) {
                                //kijk of database en sessie waarden overeenkomen
                                if ($value == $song->id) {
                                    echo "<tr>";
                                    echo "<td>$song->name<br>";
                                    echo "$song->artist_band_name</td>";
                                    echo "<td><a class='btn btn-secondary' href='?remove_id=$song->id'>x</a></td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }

                    ?>
                </table>
            </div>



            <div class="nummers">
                <form method="POST">
                    <input type="text" name="search_text" style="width: calc(70% - 5px);">
                    <input type="submit" value="zoek" style="width: calc(30% - 5px);">
                    <table class="table table-secondary table-all">
                        <?php
                        foreach ($search_songs as $song) {
                            echo "<tr>";
                            echo "<td>$song->name<br>";
                            echo "$song->artist_band_name</td>";
                            if($favArrayCount < 35){
                                echo "<td><a class='btn btn-secondary' href='?add_id=$song->id'>+</a></td>";
                            } else {
                                echo "<td></td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                        <tr>
                            <td>ander nummer toegvoegen</td>
                            <?php
                            if($favArrayCount < 35){
                                echo "<td><a><a class='btn btn-secondary' href='add_song.php'>+</a></td>";
                            } else {
                                echo "<td></td>";
                            }
                            ?>
                        </tr>
                    </table>
                    <?php
                    if ($favArrayCount >= 5) {
                        echo '<div class="d-grid gap-2">
                            <a class="btn stap2-btn" href="stemwijzer2.php">Stap 2 | Motiveer je keuzen &#8594;</a>
                        </div>';
                    }
                    ?>

            </div>


        </div>
    </div>
</body>
<?php
    // session_destroy();  
?>
</html>