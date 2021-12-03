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
        // print_r($this);
        // echo "<br/>";
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
    public function viewInquiryStr($date) //called from inquiries.php
    {
        include '../php-templates/dbconnect.php';
        $sql = "UPDATE `sleepydb`.`inquiry` SET `date` = '" . $this->date . "',`readBool` = 1, `readDate` = '$date' WHERE `inquiry`.id=" .
            mysqli_real_escape_string($conn, $this->id) . "";
        $conn->close();
        return $sql;
    }
    public function replyStr($msg)  //called from inquiries.php 
    {
        include '../php-templates/dbconnect.php';
        $msgAppendedReply = $this->message . "\n\nReplied:\n$msg";
        $repliedMessage = mysqli_real_escape_string($conn, $msgAppendedReply);
        $sql = "UPDATE `sleepydb`.`inquiry` SET `date` = '" .
            $this->date . "', message = '$repliedMessage' WHERE `inquiry`.id=" .
            mysqli_real_escape_string($conn, $this->id) . "";
        $conn->close();
        return $sql;
    }
    public function getName()
    {
        return htmlentities($this->name);
    }
    public function getSenderEmail()
    {
        return htmlentities($this->senderEmail);
    }
    public function getMsg()
    {
        return nl2br(htmlentities($this->message));
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
        // return $this->read[0] == 1;
        return $this->read[0];
    }
    public function getReadDate()
    {
        if ($this->isRead())
            return $this->read[1];
        return "Not Read";
    }
}
