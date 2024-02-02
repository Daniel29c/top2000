<?php

require_once("../private/config.php");
// require_once "../private/managers/CafeManager.php";
$time = programManager::getProgram();

if ($_POST) {
    $lastId = CafeManager::createTicket($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["gender"], $_POST["program"]);
    header("location: cafeEmail.php?id=$lastId");
}
// var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../private/components/head.php" ?>
    <style>
        .img {
            background-image: url("img/cafe.jpg");
            height: 400px;
            width: 50%;
            padding: 10px;
            margin: auto;
            margin-top: 1%;
            border-radius: 10px;
        }

        .card {
            margin: auto !important;
        }
    </style>
</head>

<body>
    <?php require_once "../private/components/navbar.php" ?>
    <div class="img">

    </div>
    <form method="post">
        <div class="container mt-4">
            <div class="card">
                <div class="card-body"> <!-- Add text-center class here -->
                    <h5 class="card-title text-center">Kaartverkoop</h5>
                    <form method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Voornaam</label>
                                <input type="text" name="firstname" class="form-control" id="inputEmail4" placeholder="Voornaam">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Achternaam</label>
                                <input type="text" name="lastname" class="form-control" id="inputPassword4" placeholder="Achternaam">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputAddress">E-mail</label>
                                <input type="email" name="email" class="form-control" id="inputAddress" placeholder="E-mail">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Geslacht</label>
                                <select id="inputState" name="gender" class="form-control">
                                    <option selected>Man</option>
                                    <option>Vrouw</option>
                                    <option>Anders</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Tijdslot en datum</label>
                                <select id="inputState" name="program" class="form-control">
                                    <?php
                                    foreach ($time as $ti) {
                                        echo "<option value='$ti->id'>$ti->starttime : $ti->endtime</option>";
                                    }
                                    ?>


                                    <!-- <option value="00:00:00">00:00 t/m 01:00</option>
                                    <option value="01:00:00">01:00 t/m 02:00</option>
                                    <option value="02:00:00">02:00 t/m 03:00</option>
                                    <option value="03:00:00">03:00 t/m 04:00</option>
                                    <option value="04:00:00">05:00 t/m 06:00</option>
                                    <option value="05:00:00">06:00 t/m 07:00</option>
                                    <option value="06:00:00">07:00 t/m 08:00</option>
                                    <option value="07:00:00">08:00 t/m 09:00</option>
                                    <option value="08:00:00">09:00 t/m 10:00</option>
                                    <option value="09:00:00">10:00 t/m 11:00</option>
                                    <option value="10:00:00">11:00 t/m 12:00</option>
                                    <option value="11:00:00">12:00 t/m 13:00</option>
                                    <option value="12:00:00">13:00 t/m 14:00</option>
                                    <option value="13:00:00">14:00 t/m 15:00</option>
                                    <option value="14:00:00">15:00 t/m 16:00</option>
                                    <option value="15:00:00">16:00 t/m 17:00</option>
                                    <option value="16:00:00">17:00 t/m 18:00</option>
                                    <option value="17:00:00">18:00 t/m 19:00</option>
                                    <option value="18:00:00">19:00 t/m 20:00</option>
                                    <option value="19:00:00">20:00 t/m 21:00</option>
                                    <option value="20:00:00">21:00 t/m 22:00</option>
                                    <option value="21:00:00">22:00 t/m 23:00</option>
                                    <option value="22:00:00">23:00 t/m 00:00</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</body>

</html>