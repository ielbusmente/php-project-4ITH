<?php $page = "about";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'php-templates/head.php'; ?>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>About Us</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <?php include "css/styles-css.php" ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Navigation-->
    <?php include 'php-templates/navbar.php'; ?>
    <!-- Header-->
    <header class="bg-light py-2">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center">
                <h1 class="display-4 fw-bolder about-font">About Us</h1>
            </div>
        </div>
    </header>

    <div class="bg-white">
        <div class="container py-5">
            <div class="row h-50 align-items-center py-5">
                <div class="col-lg-6 d-none d-lg-block"><img width="100%" src="assets/img/sleepymoon.png" alt="" class="img-fluid"></div>
                <div class="col-lg-6">
                    <h1 class="display-4">SLEEPY</h1>
                    <p class="lead text-muted mb-0">SLeepy was founded by SL. Because of her love for sleeping and classy sleepwears, she was inspired to launch her own line of high 
                        quality sleeping essentials at an affordable price. All fabrics are hand-picked and sourced locally. Each product are proudly made locally and the quality 
                        is ensured for the comfort of everyone.</p>
                </div>


            </div>
        </div>
    </div>

    <!-- <div class="bg-white py-5">
        <div class="container py-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
            <h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2>
            <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
            </div>
            <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-5 px-5 mx-auto"><img src="https://bootstrapious.com/i/snippets/sn-about/img-2.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
            <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
            <h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2>
            <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
            </div>
        </div>
        </div>
    </div> -->
  
    <div class="bg-light py-5">
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-lg-5">
                    <h2 class="display-4 font-weight-light">Meet the Developers</h2>
                </div>
            </div>

            <div class="row text-center justify-content-center">
                <!-- Team item-->
                <div class="col-xl-4 col-sm-6 mb-5 mt-4">
                    <div class="bg-white rounded shadow py-5 px-4"><img src="assets/devs/daneah.jpg" alt="" width="200" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Daneah Marelle M. Sarmiento</h5><span class="small text-uppercase text-muted"> Developer</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <p class="small text-center text-muted m-4"> Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum
                            necessitatibus praesentium voluptatum deleniti atque corrupti. </p>
                    </div>
                </div>
                <!-- End-->

                <!-- Team item-->
                <div class="col-xl-4 col-sm-6 mb-5 mt-4">
                    <div class="bg-white rounded shadow py-5 px-4"><img src="https://bootstrapious.com/i/snippets/sn-about/avatar-3.png" alt="" width="200" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Edward Daniel J. Busmente</h5><span class="small text-uppercase text-muted"> Developer </span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <p class="small text-center text-muted m-4"> Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum
                            necessitatibus praesentium voluptatum deleniti atque corrupti. </p>
                    </div>
                </div>
                <!-- End-->

                <!-- Team item-->

                <div class="col-xl-4 col-sm-6 mb-5 mt-4">
                    <div class="bg-white rounded shadow py-5 px-4"><img src="https://bootstrapious.com/i/snippets/sn-about/avatar-2.png" alt="" width="200" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Richmond Andrei E. Francisco</h5><span class="small text-uppercase text-muted"> Developer </span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <p class="small text-center text-muted m-4"> Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum
                            necessitatibus praesentium voluptatum deleniti atque corrupti. </p>
                    </div>
                </div>
                <!-- End-->

            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php include 'php-templates/footer.php'; ?>
</body>

</html>