<?php
include '../php-templates/classes/Administrator.php';

//check user db if there is a user 
include '../php-templates/dbconnect.php';
$sql = "SELECT id FROM adminuser";
$result = $conn->query($sql);
if ($result->num_rows === 0) {
  $newUser = new Administrator(1, 'admin@test.test', 'Admin123', 'Admin', 'Admin');
  $newUser->addUser();
}
$conn->close();

// redirect when there is a sessionid
session_start();
if (isset($_SESSION['sessionId'])) {
  header('Location: inquiries.php');
}
// login 
if (isset($_POST['submit'])) {
  $_POST['submit'] = null;

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    if (isset($_COOKIE['user-email'])) unset($_COOKIE['user-email']);
    setcookie('user-email', $_POST['email'], time() + 60);

    $user = new Administrator(null, $_POST['email'], $_POST['password'], null, null);
    $status = $user->login();

    //invalid cred
    if (substr($status, 0, 9) !== 'Logged In') {
      if (isset($_COOKIE['error'])) unset($_COOKIE['error']);
      setcookie('error', $status /*. " " . $_POST['email']. " " . md5($_POST['password'])*/, time() + 60);
      return header('Location: index.php');
    }
    //pasok 
    if (isset($_COOKIE['error'])) {
      unset($_COOKIE['error']);
      setcookie('error', '', time() - 3600); // empty value and old timestamp
    }
    $_SESSION['sessionId'] = htmlentities(substr($status, 10));
    if (!isset($_COOKIE['error']))
      echo '<script>
              window.location.href = "inquiries.php";
            </script>';
    // header('Location: inquiries.php'); //error in deployment 
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
  <?php include "../css/login-css.php" ?>
</head>

<body>
  <script>
    localStorage.setItem('scrollpos', 0);
  </script>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="../assets/sleepy.png" id="icon" alt="Icon" />
      </div>

      <!-- Login Form -->
      <!-- action="<?php //echo $_SERVER['PHP_SELF']; 
                    ?>" -->
      <?php
      if (isset($_COOKIE['error'])) {
        echo
        "<div class=\"alert alert-danger mx-4\">
            <span>" . $_COOKIE['error'] . "</span>
        </div>";
      }
      ?>
      <form method="POST">
        <input type="email" id="email" class="fadeIn second" name="email" placeholder="Email" required value="<?php echo $_COOKIE['user-email'] ?? '' ?>">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
        <input type="submit" name="submit" class="fadeIn fourth mt-3" value="Log In">
      </form>
      <div id="formFooter">
        <a class="underlineHover" href="forgot-password.php">Forgot Password?</a>
      </div>

    </div>
  </div>

</body>

</html>