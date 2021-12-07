<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once('Exception.php');
require_once('PHPMailer.php');
require_once('SMTP.php');

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'officialsleepyph@gmail.com';
    $mail->Password = 'A very hard password!';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';
    $mail->setFrom('officialsleepyph@gmail.com');
    $mail->addAddress($_POST['email']);

    $mail->isHTML(true);
    $mail->Subject = 'SleepyPH Reset Password - Continue through the given link.';
    // http://localhost/php-project/LabActivity4_Group3/admin/login.php
    //   https://sleepyph.000webhostapp.com/admin
    $mail->Body =
        "<h3>Click the link below to continue password reset.</h3>
        <br/><p>Please login to the admin site of 
        <a href='http://localhost/php-project/LabActivity4_Group3/admin/reset-password.php?code=$code&e=" . $_POST['email'] . "'>Click Here</a> ";
    $mail->send();
} catch (Exception $e) {
}
