<?php require_once("../private/config.php"); 

$articles = newsarticleManager::getAllNewsLimit3();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../private/components/head.php" ?>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
        }

        .img {
            text-align: center;
        }

        .img img {
            display: block;
            margin-top: 2%;
            margin-left: auto;
            margin-right: auto;
            max-width: 100%; /* Make sure the image doesn't exceed its container's width */
            height: auto; /* Maintain aspect ratio */
        }

        .background {
            background-color: #22282E;
            width: 100%;
            height: 55%;
            position: absolute;
        }

        .container {
            position: relative;
        }

        .img,
        .logo {
            display: block;
            width: 100%;
            height: auto;
            position: absolute;
            top: 0;
            left: 0;
        }

        .logo {
            width: 44%;
            max-width: 500px;
            height: auto;
            top: 80%;
            left: 50%;
            transform: translate(-50%, 100%);
        }

        .news {
            background-color: #E6E6E6;
            width: 100%;
            height: 30%;
            position: absolute;

        }
    </style>
</head>

<body>
    <?php require_once "../private/components/navbar.php" ?>
    <div class="background">
        <div class="container">
            <div class="img">
                <img src="img/top-2000-home.jpg" class="img-fluid" width="1150" height="550">
            </div>
            <img src="img/npo_radio2_top2000_logo.svg" class="logo img-fluid" width="20%" height="auto">

        </div>
    </div>
    <div class="news">
            <div class="article1">Nieuws over Top2000</div>
            <div class="article2">Nieuws over Top2000</div>
    </div>


</body>

</html>