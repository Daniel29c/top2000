<?php
require_once "../../private/admin_autoloader.php";

$djs = djManager::getAllDjs();

//als submit is geklikt voeg artiest toe
if ($_POST) {
    var_dump($_POST);

    $dj = $_POST["dj"];
    $starttime = $_POST["starttime"];
    $endtime = $_POST["endtime"];

    programManager::addProgram($dj, $starttime, $endtime);
    header("location: program_admin.php");
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
            <h3 class="mb-3">Voeg een tijdslot toe</h3>
            <div class="mb-3">
                <label for="dj" class="form-label">Dj</label>
                <select class="form-control" name="dj">
                    <?php
                        foreach($djs as $dj){
                            echo"
                                <option value='$dj->id'>$dj->name</option>
                            ";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">start tijd</label>
                <input type="datetime-local" id="starttime" name="starttime">
            </div>
            <div class="mb-3">
                <label for="eind" class="form-label">eind tijd</label>
                <input type="datetime-local" id="endtime" name="endtime">
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>


</body>