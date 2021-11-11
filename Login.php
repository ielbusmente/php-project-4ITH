<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sleepy Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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



