<?php
include_once "DBInstance.php";
class Inquiry extends DBInstance
{
    private $message;
    private $date;
    private $name;
    private $senderEmail;
    private $read; //bool and time read

    public function __construct($id, $message, $date, $name, $senderEmail, $read = [0, NULL])
    {
        $this->id = $id;
        $this->message = $message;
        $this->date = $date;
        $this->name = $name;
        $this->senderEmail = $senderEmail;
        $this->read = $read;
    }
    public function insertStr()
    {
        // mysqli_real_escape_string - protection for the database
        include 'php-templates/dbconnect.php';
        $id = mysqli_real_escape_string($conn, (($this->id) === NULL) ? 'NULL' : "'" . $this->id . "'");
        $senderEmail = "'" . mysqli_real_escape_string($conn, $this->senderEmail) . "'";
        $date =  mysqli_real_escape_string($conn, (($this->date) === NULL) ? 'NULL' : "'" . $this->date . "'");
        $name = "'" . mysqli_real_escape_string($conn, $this->name) . "'";
        $message = "'" . mysqli_real_escape_string($conn, $this->message) . "'";
        $readBool = mysqli_real_escape_string($conn, $this->read[0]);
        $readDate = mysqli_real_escape_string($conn, (($this->read[1]) === NULL) ? 'NULL' : "'" . ($this->read[1]) . "'");
        $conn->close();
        return "INSERT INTO `inquiry` (
            `id`, `email`, `date`, `name`, `message`, `readBool`, `readDate`) 
            VALUES ($id, $senderEmail, $date, $name, $message, $readBool, $readDate)";
    }
    // public function viewInquiry($date) {
    //     $this->read = [true,$date]; 
    // }
    // public function inquiryReadStatus() {
    //     return $this->read[0];
    // }
    // public function inquiryReadDate() {
    //     return $this->read[1];
    // }
    // public function getMessageContent() {
    //     return [$this->message, $this->senderEmail];
    // } 
    public function getName()
    {
        return htmlentities($this->name);
    }
    public function getMsg()
    {
        return htmlentities($this->message);
    }
    public function getMonthDate()
    {
        return htmlentities((new DateTime($this->date))->format('M j'));
    }
    public function getMonthDateTime()
    {
        return htmlentities((new DateTime($this->date))->format('M j, Y | g:i A'));
    }
    public function isRead()
    {
        return $this->read === 1;
    }
    // public function getID()
    // {
    //     return $this->id;
    // }
}
