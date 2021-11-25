<?php
session_start();
if (isset($_POST['logout']) || !(isset($_SESSION['sessionId']))) {
    session_destroy();
    header('Location: login.php');
}

// get current user data 
if (
    !isset($_SESSION['current-user-id']) ||
    !isset($_SESSION['current-user-firstName']) ||
    !isset($_SESSION['current-user-lastName']) ||
    !isset($_SESSION['current-user-email']) ||
    !isset($_SESSION['current-user-password'])
) {
    include '../php-templates/classes/Administrator.php';
    $rec = [];
    $sql = "SELECT * from adminuser WHERE id = " . $_SESSION['sessionId'];
    include '../php-templates/dbconnect.php';
    $res = $conn->query($sql);
    if (!$res ? $res : $res->num_rows > 0)
        $rec = $res->fetch_assoc();
    $conn->close();
    // echo $rec['id'] . "<br/>";
    // echo $rec['firstName'] . "<br/>";
    // echo $rec['lastName'] . "<br/>";
    // echo $rec['email'] . "<br/>";
    // echo $rec['password'] . "<br/>";
    $currentUser = new Administrator(
        $rec['id'],
        $rec['email'],
        $rec['password'],
        $rec['firstName'],
        $rec['lastName'],
    );
    $_SESSION['current-user-id'] = $currentUser->getID();
    $_SESSION['current-user-firstName'] = $currentUser->getFirstName();
    $_SESSION['current-user-lastName'] = $currentUser->getLastName();
    $_SESSION['current-user-email'] = $currentUser->getEmail();
    $_SESSION['current-user-password'] = $currentUser->getPassword();
}
