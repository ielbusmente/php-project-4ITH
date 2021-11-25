<?php
$page = 'profile';
include 'php-templates/base.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../php-templates/meta.php';
    include '../php-templates/adminhead.php';
    include 'php-templates/private-head.php';
    ?>
    <title>Sleepy Profile</title>
</head>

<body>
    <?php include 'php-templates/nav.php' ?>
    <div class='container card-body watafak'> Profile

        <form method="post">
            <input type="text" placeholder="Current Password" class=" form-control-plaintext" />
            <input type="text" placeholder="New Password" class="form-control-plaintext" />
            <input type="text" placeholder="Confirm Password" class="form-control-plaintext" />
            <button class="btn" type="submit">
                Change Password
            </button>
        </form>

    </div>
</body>

</html>