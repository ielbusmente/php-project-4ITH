<?php
function insertInquiry($inp)
{
    include('dbconnect.php');
    $inq = new Inquiry(null, $inp[2], null, $inp[0], $inp[1]);
    if (!$conn->query($inq->insertStr())) {
        echo "<script>alert('Error: " . $conn->error . "')</script>";
    } else {
        echo "<script>alert('Message Sent!')</script>";
        //get all adminusers
        $adminUsersObjArr = getAdminUserEmails();
        // email them all
        include "phpmailer/send-notif-mail.php";
        // header("Location:contact.php");
    }

    // echo $inq->insertStr();
    // echo "DB Connection Failed"; 
    $conn->close();
}

function getAdminUserEmails()
{
    $adminUsersArr = [];
    include 'dbconnect.php';
    $result = $conn->query("SELECT email from adminuser");
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            array_push($adminUsersArr, $row);
    $conn->close();
    $adminCount = count($adminUsersArr);
    if ($adminCount > 0) {
        // include 'classes/Administrator.php';
        for ($i = 0; $i <  $adminCount; $i++) {
            $adminUsersArr[$i] = new Administrator(
                null,
                $adminUsersArr[$i]['email'],
                null,
                null,
                null,
            );
        }
    }
    // print_r($adminUsersArr);
    return $adminUsersArr;
}
