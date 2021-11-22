<?php
if (isset($_POST['submit'])) {
  session_start();
  $_SESSION['username'] = htmlentities($_POST['username']);
  $_SESSION['password'] = htmlentities($_POST['password']);
  $token = "d93jkdg23jkds";
  setcookie("session-token", $token, time() + 24 * 60 * 60);
  header('Location: Admin.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'php-templates/meta.php'; ?>
  <?php include 'php-templates/adminhead.php'; ?>
  <title>Sleepy Login</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="assets/sleepy.png" id="icon" alt="Icon" />
      </div>

      <!-- Login Form -->
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
        <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Forgot Password -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>

</body>

</html>