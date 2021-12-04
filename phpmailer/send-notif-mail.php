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
    //add recipients
    $adminCount = count($adminUsersObjArr);
    for ($i = 0; $i <  $adminCount; $i++)
        $mail->addAddress($adminUsersObjArr[$i]->getEmail());

    $mail->isHTML(true);
    $mail->Subject = 'SleepyPH Notification - There is an Inquiry to check.';

    //kung itest lagay niyo ung url ng login.php niyo
    // http://localhost/php-project/LabActivity4_Group3/admin/login.php
    $mail->Body =
        "<h3>From SleepyPH - This is notification.</h3>
        <br/><p>Please login to the admin site of 
        <a href='https://sleepyph.000webhostapp.com/admin/login.php'>SleepyPH</a></p><br/>
        <p>Have a nice day!</p>";
    $mail->send();
} catch (Exception $e) {
}
