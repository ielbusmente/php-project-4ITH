<?php
$page = "contact";
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
        echo "DB Connection Failed";
    }

    if ($act === 'insert') {
        $inq = new Inquiry(null, $inp[2], date("Y-m-d"), $inp[0], $inp[1]);
        $conn->query($inq->insertStr());
        // echo $inq->insertStr();
        echo "DB Connection Failed";
    }
    $conn->close();
}

if (isset($_POST['insert'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        dbconnect('insert', [$_POST['name'], $_POST['email'], $_POST['message']]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Contact Us</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/contact.css" rel="stylesheet" />
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</head>

<body>
    <!-- Navigation-->
    <?php include 'navbar.php'; ?>
    <!-- Contact section-->
    <section class="bg-light py-5">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <div class="feature bg-gradient text-white rounded-3 mb-3" style="background-color: #d8c47f !important;"><i class="bi bi-envelope"></i></div>
                <h2 class="fw-bolder">Contact Us!</h2>
                <p class="lead mb-0">We'd love to hear from you</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <!-- data-sb-form-api-token="API_TOKEN" -->
                    <form id="contactForm" method="post">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <br>
                                <div class="fw-bolder">Inquiry Submitted!</div>

                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending inquiry!</div>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" name='insert' type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
            <br><br><br>
        </section>
        <!-- Footer-->
        <?php include 'footer.php';?>
    </body>
</html>
