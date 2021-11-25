<?php
function insertInquiry($inp)
{
    include('dbconnect.php');
    $inq = new Inquiry(null, $inp[2], null, $inp[0], $inp[1]);
    $conn->query($inq->insertStr());
    // echo $inq->insertStr();
    // echo "DB Connection Failed"; 
    $conn->close();
}
