<?php
require_once "../../private/admin_autoloader.php";

if (isset($_GET['id'])) {
    $user = userManager::getUserById($_GET['id']);
}

if ($_POST) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    if($_POST["isadmin"] == 'on'){
        $isAdmin = 1;
    } else {
        $isAdmin = 0;
    }
    $verify = 1;

    userManager::editUser($name, $email, $verify, $isAdmin, $user->id);
    header("location: user_admin.php");
}
?>

<html>
<head>
    <?php require_once "../../private/components/head.php" ?>
</head>
<body>
    <?php require_once "../../private/components/adminnavbar.php"; ?>


    <div class="container mt-5">
        <h3>Edit User</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user->username; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>" required>
            </div>
            <div class="mb-3">
                <label for="isadmin" class="form-label">Is Admin</label>
                <input type="checkbox" id="isadmin" name="isadmin" <?php echo ($user->isadmin) ? 'checked' : ''; ?>>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>