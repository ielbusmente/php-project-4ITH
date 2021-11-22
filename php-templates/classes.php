<?php
abstract class DBInstance
{
    protected $id;
    protected function idExist($id, $src)
    {
        //check if id exists in
        $exists = false;
        switch ($src) {
            case 'administrator':
                // check id existance in administrator db 
                return $exists;
            case 'product':
                // check id existance in products db 
                return $exists;
            case 'inquiry':
                // check id existance in inquiries db 
                return $exists;
            default:
                return true;
        }
    }
    protected abstract function getID();
}
class Inquiry extends DBInstance
{
    private $message;
    private $date;
    private $name;
    private $senderEmail;
    private $read = [0, NULL]; //bool and time read

    public function __construct($id, $message, $date, $name, $senderEmail)
    {
        if (!$this->idExist($id, 'inquiry'))
            $this->id = $id;
        $this->message = $message;
        $this->date = $date;
        $this->name = $name;
        $this->senderEmail = $senderEmail;
    }
    public function insertStr()
    {
        return "INSERT INTO `inquiry` (
            `id`, `email`, `date`, `name`, `message`, `readBool`, `readDate`) 
            VALUES (" . ((($this->id) === NULL) ? 'NULL' : ($this->id)) . ", '" . $this->senderEmail . "', '" .
            $this->date . "', '" . $this->name  . "', '" .
            $this->message  . "', " . $this->read[0]  .
            ", " . ((($this->read[1]) === NULL) ? 'NULL' : ($this->read[1])) . ")";
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
    public function getID()
    {
        return $this->id;
    }
}
