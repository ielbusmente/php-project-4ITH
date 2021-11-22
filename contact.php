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
            VALUES (NULL, '" . $this->senderEmail . "', '" .
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
    }

    if ($act === 'insert') {
        $inq = new Inquiry(null, $inp[2], date("Y-m-d"), $inp[0], $inp[1]);
        $conn->query($inq->insertStr());
        // echo $inq->insertStr();
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
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/contact.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="Products.html">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="About.html">About Us</a></li>
                        <li class="nav-item"><a class="nav-link active" href="Contact.php">Contact Us</a></li>
                    </ul>
                </ul>
                <!-- <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form> -->
            </div>
        </div>
    </nav>
    <!-- Contact section-->
    <section class="bg-light py-5">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <div class="feature bg-gradient text-white rounded-3 mb-3" style="background-color: #d8c47f !important;"><i class="bi bi-envelope" style="background-color: #d8c47f !important;"></i></div>
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
        </div>
        <br><br><br>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-5">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Core theme JS-->
    <!-- <script src="js/scripts.js"></script> -->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
</body>

</html>