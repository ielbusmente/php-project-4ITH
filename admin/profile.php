<?php
$page = 'profile';
include 'php-templates/base.php';

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}
if (isset($_POST['profile-mod'])) {
    $_POST['profile-mod'] = null;
    $errors = [];
    //palit pass 
    if ($_POST['new-pass'] !== '') {
        setcookie('error1', '', time() - 1);
        //check current pass input 
        if (!($_POST['new-pass'] === $_POST['conf-pass'] && $_SESSION['current-user-password'] === md5($_POST['curr-pass']))) {

            array_push($errors, 'error1');
            setcookie('error1', 'Failed to Update: Wrong Password', time() + 60 * 60 * 1000);
        }
    }
    if (empty($errors)) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            setcookie('error2', '', time() - 1);
            include '../php-templates/classes/Administrator.php';
            //procede change
            $updatedUser = new Administrator(
                $_SESSION['current-user-id'],
                $_POST['email'] === $_SESSION['current-user-email'] ? null : $_POST['email'],
                $_POST['new-pass'] === '' ? null : $_POST['new-pass'],
                $_POST['fname'] === $_SESSION['current-user-firstName'] ? null : $_POST['fname'],
                $_POST['lname'] === $_SESSION['current-user-lastName'] ? null : $_POST['lname']
            );
            $sql = $updatedUser->updateStr();
            // echo $sql;
            include '../php-templates/dbconnect.php';
            $conn->query($sql);
            $conn->close();
            // update session vars  
            $currentUser = new Administrator(
                null,
                $_POST['email'],
                md5($_POST['new-pass']),
                $_POST['fname'],
                $_POST['lname']
            );
            if (str_contains($sql, "`email` = "))
                $_SESSION['current-user-email'] = $currentUser->getEmail();
            if (str_contains($sql, "`firstName` = "))
                $_SESSION['current-user-firstName'] = $currentUser->getFirstName();
            if (str_contains($sql, "`lastName` = "))
                $_SESSION['current-user-lastName'] = $currentUser->getLastName();
            if (str_contains($sql, "`password` = "))
                $_SESSION['current-user-password'] = $currentUser->getPassword();
        } else {
            setcookie('error2', 'Failed to Update: Invalid Email', time() + 60 * 60 * 1000);
            array_push($errors, 'error2');
        }
    }
    header('Location: profile.php');
}
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
    <h1 class="title">Profile</h1>
    <div class='container '>

        <form method="post" class="form-control m-auto d-flex justify-content-center align-items-center py-5">
            <div class="col-md-8">
                ID
                <div class="form-control w-auto m-3">
                    <input placeholder="ID" name='id' required disabled value="<?php echo $_SESSION['current-user-id'] ?>" class="col-12" />
                </div>
                Name
                <div class="form-control w-auto m-3">
                    <div class="row p-0 m-0">
                        <input placeholder="First Name" name='fname' id='fname' required value="<?php echo $_SESSION['current-user-firstName'] ?>" class="col-md-6 col-12" />
                        <input placeholder="Last Name" name='lname' id='lname' required value="<?php echo $_SESSION['current-user-lastName'] ?>" class="col-md-6 col-12" />
                    </div>
                </div>
                Email
                <div class="form-control w-auto m-3">
                    <input placeholder="Email" required name='email' id='email' value="<?php echo $_SESSION['current-user-email'] ?>" class="col-12" />
                </div>
                Change Password
                <div class="form-control w-auto m-3">
                    <input type="password" name='curr-pass' id='curr-pass' placeholder="Current Password" class="col-12" />
                </div>
                <div class="form-control w-auto m-3">
                    <input type="password" name='new-pass' id='new-pass' placeholder="New Password" class="col-12" />
                </div>
                <div class="form-control w-auto m-3">
                    <input type="password" name='conf-pass' id='conf-pass' placeholder="Confirm Password" class="col-12" />
                </div>
                <div class="alert alert-danger w-auto m-3" id='error-msg' style="display:none  ;"> Passwords do not match
                </div>

                <?php
                if (isset($_COOKIE['error1']))
                    echo   "<div class=\"alert alert-danger w-auto m-3\" 
                >  " . $_COOKIE['error1'] . "
                      </div>";
                if (isset($_COOKIE['error2']))
                    echo   "<div class=\"alert alert-danger w-auto m-3\" 
                        >  " . $_COOKIE['error2'] . "
                  </div>"; ?>

                <button class="btn update-btn w-100 my-3" type="submit" id='up-butt' name='profile-mod' disabled>
                    Update Changes
                </button>

            </div>


        </form>

    </div>
    <script type="text/javascript">
        const fname = document.getElementById('fname')
        const lname = document.getElementById('lname')
        const email = document.getElementById('email')
        const currPass = document.getElementById('curr-pass')
        const newPass = document.getElementById('new-pass')
        const confPass = document.getElementById('conf-pass')
        const butt = document.getElementById('up-butt')
        const errorMsg = document.getElementById('error-msg')
        // console.log(butt.disabled)
        if (butt.disabled) {
            fname.addEventListener('keyup', (e) => {
                butt.disabled = false
                validate()
            })
            lname.addEventListener('keyup', (e) => {
                butt.disabled = false
                validate()
            })
            email.addEventListener('keyup', (e) => {
                butt.disabled = false
                validate()
            })
            newPass.addEventListener('keyup', (e) => {
                validate()
                checkMatch()
            })
            currPass.addEventListener('keyup', (e) => {
                validate()
            })
            confPass.addEventListener('keyup', (e) => {
                validate()
                checkMatch()
            })
        }

        function validate() {
            if (newPass.value !== '')
                butt.disabled = (newPass.value !== confPass.value || currPass.value === '')
        }

        function checkMatch() {
            errorMsg.style.display = newPass.value !== confPass.value ? 'block' : 'none'

        }
        // setInterval(() => {
        //     console.log(`Wow bruh ${newPass.value}`)
        // }, 1000)

        // if ()
    </script>
</body>

</html>