<?php
function dbconnect($act, $inp)
{
    //local code
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'sleepyDB';
    //prod code
    // $dbhost = '';
    // $dbuser = '';
    // $dbpass = '';
    // $dbname = 'sleepyDB';
    $conn = mysqli_connect($dbhost, $dbuser,  $dbpass, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
        echo "DB Connection Failed" . $conn->connect_error;
    }

    if ($act === 'insert') {
        $inq = new Inquiry(null, $inp[2], date("Y-m-d"), $inp[0], $inp[1]);
        $conn->query($inq->insertStr());
        // echo $inq->insertStr();
        // echo "DB Connection Failed";
    }
    $conn->close();
}
