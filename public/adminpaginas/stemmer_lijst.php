<?php
    require_once "../../private/admin_autoloader.php";

    $id = $_GET["id"];

    $userstemmen = songlistManager::getUserById($id);
?>

<html>
<head>
    <?php require_once "../../private/components/head.php" ?>
</head>
<body>
    <?php
    require_once "../../private/components/adminnavbar.php"; 
    
    ?>


    <!-- tabel met alle stemmers -->
    <table class="table table-striped">
        <thead class="table-dark text-center h2">
            <tr>
                <th>Positie</th>
                <th>Nummer</th>
            </tr>
        </thead>
        <tbody class="h4 text-center">
            <?php
                foreach($userstemmen as $userstem){
                    echo"
                        <tr>
                            <td>$userstem->positie</td>
                            <td>$userstem->song_name</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>


</body>
</html>