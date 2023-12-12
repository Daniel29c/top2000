<?php
require_once "../../private/admin_autoloader.php";

//als submit is geklikt voeg artiest toe
if ($_POST) {
    $name = $_POST["name"];
    $imgpath = '../img/djs/' . $_FILES["image"]["name"];
    
    move_uploaded_file($_FILES["image"]['tmp_name'], $imgpath);
    djManager::addDj($name, $imgpath);
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

    <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data">
            <h3 class="mb-3">Voeg een Dj toe</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Dj naam</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Dj naam</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>


</body>