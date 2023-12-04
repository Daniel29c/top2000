<?php
    require_once "../../private/admin_autoloader.php";


    $nummerId = $_GET['id'];

    $artiesten = artist_bandManager::getAllArtist();
    $nummer = songManager::getSongById($nummerId);
    
    if ($_POST) {
        $name = $_POST["name"];
        $selectedArtiestId = $_POST["artiestId"];
        songManager::editSong($nummerId, $name, $selectedArtiestId );
        header("location: nummer_admin.php");
    }
    ?>

<html>
<head>
    <?php require_once "../../private/components/head.php" ?>
    
</head>
<body>
    <?php require_once "../../private/components/adminnavbar.php"; ?>

    <div class="container mt-5">
        <form method="POST">
            <h3 class="mb-3">Bewerk nummer</h3>
            <div class="mb-3">
                <label for="name" class="form-label"></label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $nummer->name ?>" required>
            </div>
            <div class="mb-3">
                <label for="artiestId" class="form-label">Gekozen artiest</label>
                <select class="form-select" name="artiestId" required>
                    <?php
                    foreach ($artiesten as $artiest) {
                        if($artiest->id == $nummer->artist_band_id){
                            echo "<option value='$artiest->id' selected>$artiest->name</option>";
                        } else{
                            echo "<option value='$artiest->id' >$artiest->name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>