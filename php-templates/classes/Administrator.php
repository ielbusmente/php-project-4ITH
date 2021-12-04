<?php
include_once 'DBInstance.php';

class Administrator extends DBInstance
{
    private $email;
    private $firstName;
    private $lastName;
    private $password;

    public function __construct($id, $email, $password, $firstName, $lastName)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    public function login()
    {
        include '../php-templates/dbconnect.php';
        $status = '';
        $userEmail = mysqli_real_escape_string($conn, $this->email);
        $userPassword = mysqli_real_escape_string($conn, $this->password);
        // echo $userId . "<br/>";
        if (!empty($userEmail) && !empty($userPassword)) {
            $sql = "SELECT id, password FROM adminuser WHERE email = '$userEmail'";
            $result = $conn->query($sql);
            // print_r($result);
            if (!$result ? $result : $result->num_rows > 0) {
                //there is a user matched 
                $rec = $result->fetch_assoc();
                // echo md5($rec['password']);
                // echo $rec['id'] . "<br/>";
                // echo $rec['password'] . "<br/>";
                //encrypt input then get pass from db 
                $inputPass = md5($userPassword);
                $encryptedPass = $rec['password'];
                // echo $rec['password'];
                $status = $inputPass === $encryptedPass ? "Logged In " . $rec['id'] : "ID or Password is Incorrect!";
            } else {
                // no user found 
                $status = 'Email or Password is Incorrect!';
            }
        }
        $conn->close();
        return $status;
    }
    public function addUser()
    {
        include '../php-templates/dbconnect.php';
        $id = $this->id !== null ? (mysqli_real_escape_string($conn, $this->id)) : 'null';
        $fname = mysqli_real_escape_string($conn, $this->firstName);
        $lname = mysqli_real_escape_string($conn, $this->lastName);
        $email = mysqli_real_escape_string($conn, $this->email);
        $pass = mysqli_real_escape_string($conn, md5($this->password));

        $sql = "INSERT INTO `adminuser` (`id`, `firstName`, `lastName`, `email`, `password`) 
            VALUES ($id, '" . $fname . "', '" . $lname  . "', '" . $email  . "', '" . $pass . "')";
        $conn->query($sql);
        // echo $sql;
        $conn->close();
    }
    public function updateStr()
    {
        $changes = '';
        include '../php-templates/dbconnect.php';
        $id = mysqli_real_escape_string($conn, ($this->id));
        $changes .=  $this->firstName === null ? '' : '`firstName` = ' . "'" . mysqli_real_escape_string($conn, $this->firstName) . "', ";
        $changes .=  $this->lastName === null ? '' : '`lastName` = ' . "'" . mysqli_real_escape_string($conn, $this->lastName) . "', ";
        $changes .=  $this->email === null ? '' : '`email` = ' . "'" . mysqli_real_escape_string($conn, $this->email) . "', ";
        $changes .=  $this->password === null ? '' : '`password` = ' . "'" . mysqli_real_escape_string($conn, md5($this->password)) . "', ";
        $conn->close();
        $sql = "UPDATE `adminuser` SET " . substr($changes, 0, strlen($changes) - 2) . " WHERE `adminuser`.`id` = $id";
        return $sql;
    }
    public function getFirstName()
    {
        return htmlentities($this->firstName);
    }
    public function getLastName()
    {
        return htmlentities($this->lastName);
    }
    public function getEmail()
    {
        return htmlentities($this->email);
    }
    public function getPassword()
    {
        return htmlentities($this->password);
    }
}
