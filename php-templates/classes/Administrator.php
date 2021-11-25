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
        include '../dbconnect.php';

        $userId = mysqli_real_escape_string($conn, $this->id);
        $userPassword = mysqli_real_escape_string($conn, $this->password);
        if (!empty($userId) && !empty($userPassword)) {
        }
        $conn->close();
    }
    public function getID()
    {
        return $this->id;
    }
}
