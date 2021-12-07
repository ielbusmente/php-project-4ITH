<?php $page = "home"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'php-templates/head.php'; ?>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Home</title>
    <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <?php include "css/index-css.php" ?>
    <!-- Core theme CSS (includes Bootstrap)-->
    <?php include "css/styles-css.php" ?>
</head>

<body>
    <!-- Navigation -->
    <?php include 'php-templates/navbar.php'; ?>
    <!-- Header-->
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="mask flex-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-7 col-12 order-md-1 order-2" style="top: 190px;">
                                <h4>High-Quality <br>
                                    Sleeping Essentials <br>Just For You</h4>
                                <p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
                                    necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
                                <a href="products.php">View Products</a>
                            </div>
                            <div class="mySlides fadein col-md-5 col-12 order-md-2 order-1 ">
                                <?php
                                // display images from directory
                                $dir = "assets/img/banner/";

                                $scan_dir = scandir($dir); //list files inside the directory
                                foreach ($scan_dir as $img) :
                                    if (in_array($img, array('.', '..'))) {
                                        continue;
                                    }
                                ?>
                                    <img src="<?php echo $dir . $img ?>" class="mx-auto" style="height: 640px;" alt="<?php echo $img ?>">
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--slide end-->

        <section class="product-category section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title text-center">
                            <h2> Product Categories </h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-box">
                            <a href="products.php">
                                <img src="assets/img/2.jpg" alt="" />
                                <div class="content">
                                    <h3>Sleepwear</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-box">
                            <a href="products-essentials.php">
                                <img src="assets/img/pillowcase3.jpg" alt="" />
                                <div class="content">
                                    <h3>Essentials</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="hover-spin features-icons-icon d-flex mb-4"><img src="assets/icons/handwash.png" width="100" class="m-auto text-primary" alt=""></div>
                            <h3 style="color: #bfad6d">hand wash only</h3>
                            <!-- <p class="lead mb-0">hand wash only</p> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="hover-spin features-icons-icon d-flex mb-4"><img src="assets/icons/detergent.png" width="100" class="m-auto text-primary" alt=""></div>
                            <h3 style="color: #bfad6d">use mild detergent</h3>
                            <!-- <p class="lead mb-0">use mild detergent</p> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="hover-spin features-icons-icon d-flex mb-4"><img src="assets/icons/bleach.png" width="100" class="m-auto text-primary" alt=""></div>
                            <h3 style="color: #bfad6d">no bleach</h3>
                            <!-- <p class="lead mb-0">no bleach</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <?php include 'php-templates/footer.php'; ?>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script>
            $(function() {
                $('.fadein img:gt(0)').hide();
                setInterval(function() {
                    $('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');
                }, 5000);
            });
        </script>

</body>

</html>