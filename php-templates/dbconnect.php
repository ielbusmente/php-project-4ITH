<?php

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
