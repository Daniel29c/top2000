<?php
    require_once "../../private/admin_autoloader.php";

?>

<html>
<head>
    <?php require_once "../../private/components/head.php" ?>
    
</head>
<body>
    <?php
    require_once "../../private/components/adminnavbar.php"; 

    $tijdsloten = programManager::getProgram();
    ?>

    <a class="btn btn-primary m-2 p-2" href="add_program.php">voeg een tijdslot toe</a>
     
    <table class="table table-striped">
        <thead class="h2 text-center table-dark">
            <tr>
                <th>Tijdslot start-tijd</th>
                <th>Tijdslot eind-tijd</th>
                <th>Tijdslot dj</th>
                <th>acties</th>
            </tr>
        </thead>
        <tbody class="h4 text-center">
                <?php
                foreach($tijdsloten as $tijdslot){
                    echo("
                    <tr>
                    <td>$tijdslot->starttime</td>
                    <td>$tijdslot->endtime</td>
                    <td>$tijdslot->name</td>
                    <td><a class='btn btn-info' href='edit_program.php?id=$tijdslot->id'>bewerk tijdslot</a></td>
                    </tr>
                    ");
                }
                ?>
        </tbody>
    </table>
</body>
</html>