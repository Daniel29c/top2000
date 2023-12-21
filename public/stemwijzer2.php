<?php
require_once("../private/config.php");

$songs = songManager::getAllSongs();

if($_POST){ 
    $_SESSION['motivatie'][$_POST['key']] = $_POST['text'];
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
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    
    if(isset($_GET['motivatie_id'])) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector(".motivatie_row_' . $_GET['motivatie_id'] . '").style.display = "table-row";
            });
          </script>';
    }

    ?>

    <!-- de navbar -->
    <?php require_once "../private/components/navbar.php" ?>
    <div class="stemwijzer-container">
        <div class="header">

        </div>



        <div class="nummer-lijst-container">
            <div class="toplijst">
                <div class="stap">Stap 2</div>
                <p>Motiveer je keuzen</p>
                <p>waarom heb je voor deze platen gekozen?</p>

            </div>



            <div class="nummers">
                <table class="table table-secondary table-all" style="width: 100%;">
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
                                    echo "<td><a class='btn' href='?motivatie_id=" . $key . "'>geef motivatie</a></td> ";
                                    echo "</tr>";
                                     
                                    echo "<tr name='motivatie_row_" . $key . "' class='motivatie_row_" . $key . "' style='display: none;'>";
                                    echo "<td>";
                                    echo "<form method='post' name='motivatie'> 
                                            <textarea name='text' rows='4' cols='30'>";  
                                            if(isset($_SESSION['motivatie'][$key])){
                                                echo $_SESSION['motivatie'][$key];
                                            }   
                                    echo "</textarea> <input type='hidden' name='key' value='" . $key . "'>";
                                    echo "</td>";
                                    echo "<td><input type='submit'></form></td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }
                    ?>
                </table>
                <div style="text-align: center;">
                    <a class="btn stap2-btn" style="width: 45%;" href="stemwijzer1.php">&#8592; Vorige</a>
                    <a class="btn stap2-btn" style="width: 45%;" href="stemwijzer3.php">Stap 3 | Jouw gegevens &#8594;</a>
                </div>
            </div>


        </div>
    </div>
</body>

</html>
<?php
// session_destroy();
?>