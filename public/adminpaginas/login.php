<?php

require_once "../../private/managers/userManager.php";
require_once("../../static/database.php");

//$acc = new accountmanager();
//$account = $acc->getAll();

//var_dump($account);

if ($_POST) {
    //var_dump($_POST);
    $result = UserManager::userLogin($_POST["email"], $_POST["passwordhash"]);
    //var_dump($result);
    //die();
    if ($result) {
        session_start();
        $_SESSION["login"] = 1;
        header("Location: nummer_admin.php");
        return;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            background-color: #3b3d3b;
            display: flex;
            align-items: center; 
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            border: 2px solid red;
            padding: 20px;
            border-radius: 10px;
            Height: 300px;
        }

        form {
            width: 300px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group h6 {
            background-color: #3b3d3b;
            color: white;
            font-size: 14px;
            display: inline-block;
            margin-right: 5px;
            padding: 5px; /* added padding for better appearance */
            border-radius: 5px; /* added border-radius for better appearance */
        }

        .form-group label,
        .form-group input,
        .form-group .form-check-label {
   
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-group .form-check-label {
            display: block;
        }

        .form-group small {
            color: white;
            font-size: 12px;
        }

        .btn2 {
            margin-top: 10px;
            background-color: #3b3d3b;
            color: red;
            border: 1px solid red;
            width: 300px;
            position: absolute;
        }
        .btn2.register-btn {
    margin-top: 50px; /* Adjust the margin to create space between the buttons */
}

        .navbar {
            background-color: #DA151A !important;
        }

        body {
            font-family: 'VT323', monospace;
        }

      

        nav {
            font-size: 18px;
            font-weight: 900;
        }
    </style>
</head>
<body>
    <?php

?>
    <div class="login-box">
        <form method="post">
            <div class="form-group">
                <h6>Email address</h6>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <h6>Password</h6>
                <input type="password" class="form-control" id="exampleInputPassword1" name="passwordhash" placeholder="Password">
            </div>

            <button type="submit" class="btn2 btn-danger">Login</button>
        </form>
    </div>
</body>
</html>
