<?php
    require_once "../../private/admin_autoloader.php";


    //id van artiest die wordt bewerkt
    $id = $_GET['id'];
    $program = programManager::getProgramById($id);
    $djs = djManager::getAllDjs();

    //als submit is geklikt voeg artiest toe
    if($_POST){
        $djId = $_POST["dj"];
        $starttime = $_POST["starttime"];
        $endtime = $_POST["endtime"];
        
        programManager::editProgram($djId, $starttime, $endtime, $id);
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
            <h3 class="mb-3">Bewerk een tijdslot</h3>
            <div class="mb-3">
                <label for="dj" class="form-label">Dj</label>
                <select class="form-control" name="dj">
                    <?php
                        foreach($djs as $dj){
                            if($dj->id == $program->djs_id){
                                echo"
                                <option value='$dj->id' selected>$dj->name</option>
                                ";
                            } else{
                                echo"
                                <option value='$dj->id'>$dj->name</option>
                                ";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">start tijd</label>
                <input type="datetime-local" id="starttime" name="starttime" value="<?php echo $program->starttime; ?>">
            </div>
            <div class="mb-3">
                <label for="eind" class="form-label">eind tijd</label>
                <input type="datetime-local" id="endtime" name="endtime" value="<?php echo $program->endtime; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>


</body>