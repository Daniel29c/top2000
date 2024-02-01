<?php
require_once "../../static/database.php";

session_start();

if(!isset($_SESSION["login"])) {
    echo(session_status());
 

   header("location: login.php");

}

spl_autoload_register(function ($className) {
    $baseNamespace = 'managers';

    $classFile = str_replace($baseNamespace, '', $className);
    $classFile = str_replace('\\', '/', $classFile);

    $filePath = 'managers/' . $classFile . '.php';

    require_once $filePath;

});

?>