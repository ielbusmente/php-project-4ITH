 <?php
    date_default_timezone_set('Asia/Singapore');
    include_once 'php-templates/classes/Inquiry.php';
    include_once 'php-templates/classes/Administrator.php';
    include 'php-templates/db.php';
    $page = "contact";

    if (isset($_POST['insert']))
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']))
            insertInquiry([$_POST['name'], $_POST['email'], $_POST['message']]);
    // echo "<script>alert('hi')</script>";
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <?php include 'php-templates/head.php'; ?>
     <!-- Favicon -->
     <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
     <title>Contact Us</title>
     <!-- Core theme CSS (includes Bootstrap)-->
     <?php include "css/styles-css.php" ?>
     <?php include "css/contact-css.php" ?>
     <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
 </head>

 <body>
     <!-- Navigation-->
     <?php include 'php-templates/navbar.php'; ?>
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
                             <textarea maxlength="255" minlength="1" class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
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
                         <!-- Submit Button-->
                         <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" name='insert' type="submit">Submit</button></div>
                     </form>
                 </div>
             </div>
             <br><br><br>
     </section>
     <!-- Footer-->
     <?php include 'php-templates/footer.php'; ?>
 </body>

 </html>