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
    $mail->addAddress($emailOfInqSender);
    $mail->isHTML(true);
    $mail->Subject = 'Reply from SleepyPH';
    $mail->Body =
        "<h3>From SleepyPH - This is a reply to your inquiry from $dateOfInq.</h3>
        <br/><p>" . nl2br($msg) . "</p><br/>
        <p>Thank you for contacting us. Have a nice day!</p>";
    $mail->send();

    // $replyAlert =  "<div class=\"alert-success\"><span>Message Sent!</span></div>"; 
    // update database
    $sqlUpdateReply = $inquiriesObjArr[$theId]->replyStr($msg);
    include '../php-templates/dbconnect.php';
    $conn->query($sqlUpdateReply);
    // echo $sqlUpdateReply;
    $conn->close();

    // echo $_GET['id'] . "<br/>";
    // echo $inquiriesObjArr[$_GET['id']]->getName() . "<br/>";
    // echo $inquiriesObjArr[$_GET['id']]->getSenderEmail() . "<br/>";

    header("Location:inquiries.php?id=$theId&read=1");
} catch (Exception $e) {
    $replyAlert =  "<div class=\"alert-danger\"><span>Something went wrong! " .
        $e->getMessage() . "</span></div>";
}
