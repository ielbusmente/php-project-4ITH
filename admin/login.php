<?php
$admin = true;
// echo $admin;
if (isset($_POST['submit'])) {
  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    session_start();
    include '../php-templates/dbconnect.php';
    include '../php-templates/classes/Administrator.php';
    // $user = new Administrator($_POST['username'],null,$_POST['password'],null,null);
    // $user->login();
    // $username = mysqli_real_escape_string($conn, );
    // $password = mysqli_real_escape_string($conn, );
    // $_SESSION['username'] = htmlentities($_POST['username']);
    // $_SESSION['password'] = htmlentities($_POST['password']);
    // $token = "d93jkdg23jkds";
    // setcookie("session-token", $token, time() + 24 * 60 * 60);
    header('Location: inquiries.php');
  } else {
    echo "All input fields are required!";
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
  <title>Sleepy Login</title>
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="../assets/sleepy.png" id="icon" alt="Icon" />
      </div>

      <!-- Login Form -->
      <!-- action="<?php //echo $_SERVER['PHP_SELF']; 
                    ?>" -->
      <form method="POST">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" required>
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
        <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Forgot Password -->
      <!-- <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div> -->

    </div>
  </div>

</body>

</html>