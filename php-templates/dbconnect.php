<?php
//local code
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'sleepyDB';
//prod code
// $dbhost = '';
// $dbuser = 'id18063116_admin';
// $dbpass = '<6rePiXHfC}L*(y#';
// $dbname = 'id18063116_sleepyph';
// id18063116_sleepyph
$conn = mysqli_connect($dbhost, $dbuser,  $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
    echo "DB Connection Failed" . $conn->connect_error;
}
