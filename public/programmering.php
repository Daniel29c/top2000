<?php
require_once("../private/config.php");
$date = null;

//selecteer alle tijdsblokken van vandaag
$vandaag = date("Y-m-d");
$morgen = date("Y-m-d", strtotime($vandaag . " +1 day"));

$programs = programManager::getProgramByDate($vandaag, $morgen);


if ($_POST) {
    $date = $_POST["date"];

    $startday = $_POST['date'];
    $endday = date("Y-m-d", strtotime($startday . " +1 day"));


    $programs = programManager::getProgramByDate($startday, $endday);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style/programmering.css">
    <?php require_once "../private/components/head.php" ?>

</head>

<body>
    <?php require_once "../private/components/navbar.php" ?>
    <div class="programmering-head">
        <div class="head-text">
            <strong class="part1">Overzicht</strong><br>
            <strong class="part2">Programmering</strong>
        </div>
    </div>
    <div class="programmering">
        <form method="post" >
            <input class="m-2" type="date" id="date" name="date" <?php
                                                                    if ($date == null) {
                                                                        echo "value='" . date("Y-m-d") . "'";
                                                                    } else {
                                                                        echo "value='$date'";
                                                                    }
                                                                    ?>>
            <br>
            <input class="m-2" type="submit" value="Bekijk deze dag">
        </form>

        <?php

        foreach ($programs as $program) {
            echo '<div class="dj-div">';
            echo '<div class="time">' . substr($program->starttime, 11, 5) . ' - ' . substr($program->endtime, 11, 5) . '</div>';
            echo '<div class="dj-image" style="background-image: url(' . $program->dj_imgpath . ');"></div>';
            echo '<div class="dj-name">' . $program->dj_name . '</div>';
            echo '</div>';
        }

        ?>


    </div>
</body>

</html>