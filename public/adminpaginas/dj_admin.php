<?php
require_once "../../private/admin_autoloader.php";

$djs = djManager::getAllDjs();

//remove user als remove id in de search bar zit 
if (isset($_GET['remove_id'])) {
    $id = $_GET['remove_id'];
    djManager::removeDj($id);
    header("location: dj_admin.php");
}

?>

<html>

<head>
    <?php require_once "../../private/components/head.php" ?>
</head>

<body>
    <?php
    require_once "../../private/components/adminnavbar.php";
    ?>

    <a class="btn btn-primary m-2 p-2" href="add_dj.php">voeg dj toe</a>

    <table class="table table-striped">
        <thead class="h2 text-center table-dark">
            <tr>
                <th>Dj naam</th>
                <th>Dj foto</th>
                <th>acties</th>
            </tr>
        </thead>
        <tbody class="h4 text-center">
            <?php
            foreach ($djs as $dj) {
                echo ("
                    <tr>
                    <td>$dj->name</td>
                    <td><img src='$dj->imgpath' width='100' height='100'></td>
                    <td>
                        <a class='btn btn-info' href='edit_dj.php?id=$dj->id'>Edit</a>
                        <a class='btn btn-danger' href='?remove_id=$dj->id' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a>
                    </td>
                    </tr>
                    ");
            }
            ?>
        </tbody>
    </table>
</body>

</html>