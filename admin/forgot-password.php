<?php

session_start();
if (isset($_SESSION['sessionId'])) {
    header('Location: inquiries.php');
}
if (isset($_POST['forgot'])) {
    include '../php-templates/dbconnect.php';
    $sql = "SELECT id FROM adminuser WHERE email = '" . $_POST['email'] . "'";
    // echo $sql;
    $res = $conn->query($sql);
    if (isset($_COOKIE['error-fp'])) unset($_COOKIE['error-fp']);
    if ($res->num_rows === 1) {
        $code = rand(100000, 999999);
        include '../php-templates/dbconnect.php';
        $conn->query("UPDATE `adminuser` SET `reset-pass-code` = $code");
        $conn->close();
        if (isset($_COOKIE['code_sleepyph'])) unset($_COOKIE['code_sleepyph']);
        setcookie('code_sleepyph', '', time() - 1);
        if (isset($_COOKIE['email_sleepyph'])) unset($_COOKIE['email_sleepyph']);
        setcookie('email_sleepyph', '', time() - 1);
        include '../phpmailer/send-reset-pass-mail.php';

        echo '<script>alert("Please check your email!")
        window.location.href = "index.php"
        </script>';
        // echo "<a href='http://localhost/php-project/LabActivity4_Group3/admin/reset-password.php?code=$code&e=" . $_POST['email'] . "'>Click Here</a>";
    } else {
        setcookie('error-fp', "No such Email in the Database", time() + 60);
        if (isset($_COOKIE['reset-pass-user-email'])) unset($_COOKIE['reset-pass-user-email']);
        setcookie('reset-pass-user-email',  $_POST['email'], time() + 60);
        header('Location: forgot-password.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../php-templates/meta.php';
    include '../php-templates/adminhead.php'; ?>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <title>Sleepy Forgot Password</title>
    <?php include "../css/login-css.php" ?>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <img src="../assets/sleepy.png" id="icon" alt="Icon" />
            </div>
            <?php
            if (isset($_COOKIE['error-fp'])) {
                echo
                "<div class=\"alert alert-danger mx-4\">
                    <span>" . $_COOKIE['error-fp'] . "</span>
                </div>";
            }
            ?>
            <form method="POST">
                <input type="email" id="email" class="fadeIn second" name="email" placeholder="Email" required value="<?php echo $_COOKIE['reset-pass-user-email'] ?? '' ?>">
                <input type="submit" name="forgot" class="fadeIn fourth" value="Get Reset Password Link">
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="index.php">Login</a>
            </div>

        </div>
    </div>

</body>

</html>