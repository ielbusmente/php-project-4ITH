<?php
session_start();
if (isset($_SESSION['sessionId'])) {
    header('Location: inquiries.php');
}
include '../php-templates/classes/Administrator.php';
if (!isset($_COOKIE['code_sleepyph']))
    setcookie('code_sleepyph', $_GET['code'], time() + 3600);
if (!isset($_COOKIE['email_sleepyph']))
    setcookie('email_sleepyph', $_GET['e'], time() + 3600);
if (isset($_POST['reset-pass'])) {
    $_POST['reset-pass'] = null;
    // echo $_GET['e'];
    $user = new Administrator(null, $_COOKIE['email_sleepyph'], $_POST['pass'], null, null);
    $sqlResetPassowrd = $user->updateStr($_COOKIE['code_sleepyph']);
    include '../php-templates/dbconnect.php';
    if (isset($_COOKIE['error-rp'])) unset($_COOKIE['error-rp']);
    setcookie('error-rp', '', time() - 1);
    $res = $conn->query($sqlResetPassowrd);
    // echo $sqlResetPassowrd . "<br/>";
    // echo $res . "<br/>";
    // echo mysqli_affected_rows($conn) . "<br/>";
    if ($res && (mysqli_affected_rows($conn) > 0)) {
        $conn->close();
        // if (isset($_COOKIE['asdf'])) unset($_COOKIE['asdf']);
        // setcookie('asdf', mysqli_affected_rows($conn), time() + 3600);  
        if (isset($_COOKIE['code_sleepyph'])) unset($_COOKIE['code_sleepyph']);
        setcookie('code_sleepyph', '', time() - 1);
        if (isset($_COOKIE['email_sleepyph'])) unset($_COOKIE['email_sleepyph']);
        setcookie('email_sleepyph', '', time() - 1);
        echo "<script>
            alert('Password Changed Successfully!') 
        </script> 
        ";
        echo "<script> 
            window.location.href = \"index.php\";
        </script> 
        ";
    } else {
        $conn->close();
        if (isset($_COOKIE['error-rp'])) unset($_COOKIE['error-rp']);
        setcookie('error-rp', 'Something went wrong.', time() + 3600);
        header("Location: reset-password.php");
    }


    // echo $sqlResetPassowrd;
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
    <title>Sleepy Reset Password</title>
    <?php include "../css/login-css.php" ?>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <img src="../assets/sleepy.png" id="icon" alt="Icon" />
            </div>
            <?php
            if (isset($_COOKIE['error-rp'])) {
                echo
                "<div class=\"alert alert-danger mx-4\">
                    <span>" . $_COOKIE['error-rp'] . "</span>
                </div>";
            }
            ?>
            <div class="alert alert-danger w-auto m-3" id='error-msg-r' style="display:none  ;">
                Passwords do not match
            </div>
            <p>Enter Your New Password</p>
            <form method="POST">
                <input type="password" id="pass-r" class="fadeIn second" name="pass" placeholder="New Password" required>
                <input type="password" id="conf-pass-r" class="fadeIn second" name="conf-pass" placeholder="Confirm Password" required>
                <input type="submit" id="reset-pass-butt" name="reset-pass" disabled class="fadeIn fourth mt-3" value="Reset Password" style="cursor:no-drop;">
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="index.php">Login</a>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        const newPass = document.getElementById('pass-r')
        const confPass = document.getElementById('conf-pass-r')
        const butt = document.getElementById('reset-pass-butt')
        const errorMsg = document.getElementById('error-msg-r')
        // console.log(butt.disabled)
        if (butt.disabled) {
            newPass.addEventListener('keyup', (e) => {
                validate()
                checkMatch()
            })
            confPass.addEventListener('keyup', (e) => {
                validate()
                checkMatch()
            })
        }

        function validate() {
            if (newPass.value !== '') {
                let disable = (newPass.value !== confPass.value)
                butt.disabled = disable
                if (disable)
                    butt.style.cursor = 'no-drop'
                else
                    butt.style.cursor = 'pointer'
            }

        }

        function checkMatch() {
            errorMsg.style.display = newPass.value !== confPass.value ? 'block' : 'none'

        }
    </script>
</body>

</html>