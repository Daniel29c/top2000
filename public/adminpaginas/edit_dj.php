<?php
    require_once "../../private/admin_autoloader.php";


    //id van dj die wordt bewerkt
    $id = $_GET['id'];

    $dj = djManager::getDjById($id);

    //als submit is geklikt voeg dj toe
    if($_POST){
        $name = $_POST["name"];
        
        if($_FILES["image"]["name"] == null){
            $imgpath = $dj->imgpath;
        } else {
            $imgpath = '../public/img/djs/' . $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]['tmp_name'], $imgpath);
        }
        
        djManager::editDj($id, $name, $imgpath);
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
            <h3 class="mb-3">Bewerk dj </h3>
            <div class="mb-3">
                <label for="name" class="form-label">Dj naam</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $dj->name ?>" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Dj naam</label>
                <br>als je de foto niet wilt veranderen voeg dan geen foto toe
                <input type="file" class="form-control" id="image" name="image" accept="image/*" >
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>


</body>