<?php
include '../php-templates/classes/Inquiry.php';
include '../php-templates/db.php';
// $inquiries = dbconnect('retrieve', null);

if (isset($_POST['logout'])) {
    session_start();
    // setcookie("session-token", "", time() - 1);
    session_destroy();
    header('Location: login.php');
}

session_start();
if (!(isset($_SESSION['sessionId']))) {
    session_destroy();
    header('Location: login.php');
}
