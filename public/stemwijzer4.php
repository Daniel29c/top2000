<?php
require_once("../private/config.php");

$songs = songManager::getAllSongs();


if (isset($_GET['opslaan'])) {

    $user_id = userManager::addVotedUser($_SESSION['user_name'], $_SESSION['user_email'], $_SESSION['user_gender']);


    foreach ($_SESSION['nummer_lijst'] as $key => $value) {
        $song_id = $value;
        $position = $key + 1;
        $motivatie = isset($_SESSION['motivatie'][$key]) ? $_SESSION['motivatie'][$key] : '';

        songlistManager::addSongToList($song_id, $user_id, $position, $motivatie);
    }

    //verwijder alle informatie die is aangemaakt tijdens stem procces 
    unset($_SESSION['nummer_lijst']);
    unset($_SESSION['motivatie']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_gender']);

    header('location: index.php');
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
                <div class="stap">Stap 4</div>
                <p>Bedankt voor het stemmen</p>
                <p>Hartelijk dank voor jouw stem op de top 2000!</p>

            </div>



            <div class="nummers">
                <h3 style="font-weight: bold;">Jouw stemlijst</h3>
                <h5>Stemlijst van <?= $_SESSION['user_name'] ?></h5>


                <table class="table table-secondary table-all" >
                    <?php
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
                                    echo "</tr>";
                                     
                                    
                                }
                            }
                        }
                    }
                    ?>
                </table>


                <div style="text-align: center; margin-top: 100px;">
                    <a class="btn stap2-btn" style="width: 100%;" href="?opslaan">Opslaan en sluiten &#8594;</a>
                </div>
            </div>


        </div>
    </div>
</body>

</html>