<?php
    require_once "../../private/admin_autoloader.php";
    $users = songlistManager::getUsers();
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
                <th>User</th>
                <th>Bekijk lijst</th>
            </tr>
        </thead>
        <tbody class="h4 text-center">
            <?php
                foreach($users as $user){
                    echo"
                        <tr>
                            <td>$user->songlist_user</td>
                            <td><a class='btn btn-info' href='stemmer_lijst.php?id=$user->user_id'>»</a></td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>


</body>
</html>