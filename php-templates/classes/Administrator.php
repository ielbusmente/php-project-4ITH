<?php
include 'DBInstance.php';

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
        $userId = mysqli_real_escape_string($conn, $this->id);
        $userPassword = mysqli_real_escape_string($conn, $this->password);
        // echo $userId . "<br/>";
        if (!empty($userId) && !empty($userPassword)) {
            $sql = "SELECT id, password FROM adminuser WHERE id = " . $userId;
            $result = $conn->query($sql);
            // print_r($result);
            if (!$result ? $result : $result->num_rows > 0) {
                //there is a user matched 
                $rec = $result->fetch_assoc();
                // echo md5($rec['password']);
                // echo "<br/>" . $rec['id'] . "<br/>";
                // echo $rec['password'] . "<br/>";
                //encrypt input then get pass from db 
                $inputPass = md5($userPassword);
                $encryptedPass = $rec['password'];
                $status = $inputPass === $encryptedPass ? "Logged In" : "ID or Password is Incorrect!";
            } else {
                // no user found 
                $status = 'ID or Password is Incorrect!';
            }
        }
        $conn->close();
        return $status;
    }
    public function addUser()
    {
        include '../php-templates/dbconnect.php';

        $fname = mysqli_real_escape_string($conn, $this->firstName);
        $lname = mysqli_real_escape_string($conn, $this->lastName);
        $email = mysqli_real_escape_string($conn, $this->email);
        $pass = mysqli_real_escape_string($conn, md5($this->password));

        $sql = "INSERT INTO `adminuser` (`id`, `firstName`, `lastName`, `email`, `password`) 
            VALUES (NULL, '" . $fname . "', '" . $lname  . "', '" . $email  . "', '" . $pass . "')";
        $conn->query($sql);

        $conn->close();
    }
    public function getID()
    {
        return $this->id;
    }
}
