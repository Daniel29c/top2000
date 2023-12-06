<?php
require_once "../../private/admin_autoloader.php";

$users = userManager::getAllUsers();


//remove user als remove id in de search bar zit 
if(isset($_GET['remove_id'])){
    $id = $_GET['remove_id'];
    userManager::removeUser($id);
    header("location: user_admin.php");
} 

?>

<html>
<head>
    <?php require_once "../../private/components/head.php" ?>
</head>
<body>
    <?php require_once "../../private/components/adminnavbar.php"; ?>

    <!-- Table with all users -->
    <table class="table table-striped">
        <thead class="table-dark text-center h2">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Is Admin</th>
                <th>acties</th>
            </tr>
        </thead>
        <tbody class="h4 text-center">
            <?php
                foreach ($users as $user) {
                    
                    $isadmin = "nee";
                    if($user->isadmin == 1){
                        $isadmin = "ja";
                    } 

                    echo "
                        <tr>
                            <td>$user->name</td>
                            <td>$user->email</td>
                            <td>$isadmin</td>
                            <td>
                                <a class='btn btn-info' href='edit_user.php?id=$user->id'>Edit</a>
                                <a class='btn btn-danger' href='?remove_id=$user->id' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a>
                            </td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>