<?php

include "../php-templates/classes/Administrator.php";

// input data here 
$email = $_GET['inputEmail'];
$password = $_GET['inputPassword'];
$firstName = $_GET['inputFirstName'];
$lastName = $_GET['inputLastName'];

$newUser = new Administrator(null, $email, $password, $firstName, $lastName);
$newUser->addUser();
print_r($newUser);

// use:
// sql/add-user-script.php?inputEmail=officialsleepyph@gmail.com&inputPassword=123&inputFirstName=Sleepy&inputLastName=PH
// https://sleepyph.000webhostapp.com/sql/add-user-script.php?inputEmail=officialsleepyph@gmail.com&inputPassword=123&inputFirstName=Sleepy&inputLastName=PH
