<?php
include '../php-templates/classes/Administrator.php';
//check user db if there is a user 
include '../php-templates/dbconnect.php';

$sql = "SELECT * FROM adminuser";

$result = $conn->query($sql);
if ($result->num_rows === 0) {
  $newUser = new Administrator(null, 'admin@test.test', 'Admin123', 'Admin', 'Admin');
  $newUser->addUser();
}
$conn->close();

session_start();
if (isset($_SESSION['sessionId'])) {
  header('Location: inquiries.php');
}
// echo $admin;
if (isset($_POST['submit'])) {
  if (!empty($_POST['id']) && !empty($_POST['password'])) {
    include '../php-templates/dbconnect.php';

    $user = new Administrator($_POST['id'], null, $_POST['password'], null, null);
    $status = $user->login();
    // $username = mysqli_real_escape_string($conn, );
    // $password = mysqli_real_escape_string($conn, );
    // $_SESSION['username'] = htmlentities($_POST['username']);
    // $_SESSION['password'] = htmlentities($_POST['password']);
    // $token = "d93jkdg23jkds";
    // setcookie("session-token", $token, time() + 24 * 60 * 60);

    //invalid cred
    if ($status !== 'Logged In') {
      setcookie('error', $status, time() + 60);
      return header('Location: login.php');
    }
    //pasok
    setcookie('error', '', time() - 1);
    $_SESSION['sessionId'] = htmlentities($_POST['id']);
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
      <?php
      if (isset($_COOKIE['error'])) {
        echo
        "<div class=\"alert alert-danger mx-4\">
            <span>" . $_COOKIE['error'] . "</span>
        </div>";
      }
      ?>
      <form method="POST">
        <input type="text" id="id" class="fadeIn second" name="id" placeholder="ID" required>
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