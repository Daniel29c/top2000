<?php

require_once("../private/config.php");
require_once "../private/managers/CafeManager.php";

if($_POST){
    CafeManager::createTicket($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["gender"], $_POST["time"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../private/components/head.php" ?>
    <style>
        .img {
            background-image: url("../img/cafe.jpg");
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
                            <select id="inputState" name="time" class="form-control">
                                <option selected>01:00 t/m 02:00</option>
                                <option>02:00 t/m 03:00</option>
                                <option>03:00 t/m 04:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Verkrijg kaart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
    </body>
</html>