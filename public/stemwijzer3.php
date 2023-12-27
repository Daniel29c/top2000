<?php
require_once("../private/config.php");

$songs = songManager::getAllSongs();

if ($_POST) {

    $_SESSION['user_name'] = $_POST['name'];
    $_SESSION['user_email'] = $_POST['email'];
    $_SESSION['user_gender'] = $_POST['gender'];

    $check_email = songManager::checkEmail($_SESSION['user_email']);


    if ($check_email == false) {
        header('location: stemwijzer4.php');
    } else {
        echo '<script>
            alert("Deze email heeft al gestemd");
            </script>';
    }

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
        }
    </style>
</head>

<body>
    <!-- de navbar -->
    <?php require_once "../private/components/navbar.php" ?>
    <div class="stemwijzer-container">
        <div class="header">

        </div>



        <div class="nummer-lijst-container">
            <div class="toplijst">
                <div class="stap">Stap 3</div>
                <p>Jouw gegevens</p>
                <p>vul hier je gegevens in zodat we weten wie er gestemt heeft.
                    Daarnaast hebben we nog wat aanvullende vragen voor</p>

            </div>



            <div class="nummers">
                <div class="container mt-5">
                    <form method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Naam</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Geslacht</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="male">Man</option>
                                <option value="female">Vrouw</option>
                            </select>
                        </div>
                </div>

                <div style="text-align: center; margin-top: 100px;">
                    <a class="btn stap2-btn" style="width: 45%;" href="stemwijzer2.php">&#8592; Vorige</a>
                    <button type="submit" class="btn stap2-btn" style="width: 45%;" href="stemwijzer4.php">Stap 4 | Stemlijst &#8594;</button>
                </div>
                </form>
            </div>


        </div>
    </div>
</body>

</html>