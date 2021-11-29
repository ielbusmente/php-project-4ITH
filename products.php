<?php $page = "products";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'php-templates/head.php'; ?>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Products</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/products.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <?php include 'php-templates/navbar.php'; ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Products</h1>
                <!-- <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p> -->
            </div>
        </div>
    </header>

    <section id="sidebar">
        <div>
            <h6 class="p-1 border-bottom  mt-4">Shop By Sleepwear</h6>
            <ul>
                <li><a href="#">All</a></li>
                <li><a href="#">Shorts</a></li>
                <li><a href="#">Pajama</a></li>
                <li><a href="#">Loungewear</a></li>
                <li><a href="#">Nightdress</a></li>
            </ul>
        </div>
        <div>
            <h6 class="p-1 border-bottom">Shop By Essentials</h6>
            <ul>
                <li><a href="#">Eyemask</a></li>
                <li><a href="#">Pillowcase</a></li>

            </ul>
        </div>
    </section>
    <!-- Section-->
    <section class="py-5 products">
        <div class="container px-4 px-lg-6 mt-4">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-4 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="assets/img/midnightblue.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Midnight Blue Luxe Nightdress</h5>
                                <!-- Product price-->
                                Php 348
                            </div>
                        </div>
                        <!-- Product actions-->
                        <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div> -->
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                        <!-- Product image-->
                        <img class="card-img-top" src="assets/img/blushluxe.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Blush Luxe Nightdress</h5>
                                <!-- Product reviews-->
                                <!-- <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div> -->
                                <!-- Product price-->
                                <!-- <span class="text-muted text-decoration-line-through">$20.00</span> -->
                                Php 348
                            </div>
                        </div>
                        <!-- Product actions-->
                        <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div> -->
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                        <!-- Product image-->
                        <img class="card-img-top" src="assets/img/pearlwhite.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Pearl White Luxe PJs</h5>
                                <!-- Product price-->
                                <!-- <span class="text-muted text-decoration-line-through">$50.00</span> -->
                                Php 348
                            </div>
                        </div>
                        <!-- Product actions-->
                        <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div> -->
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                        <!-- Product image-->
                        <img class="card-img-top" src="assets/img/1.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Pearl White Luxe PJs</h5>
                                <!-- Product price-->
                                <!-- <span class="text-muted text-decoration-line-through">$50.00</span> -->
                                Php 348
                            </div>
                        </div>
                        <!-- Product actions-->
                        <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div> -->
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                        <!-- Product image-->
                        <img class="card-img-top" src="assets/img/2.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Pearl White Luxe PJs</h5>
                                <!-- Product price-->
                                <!-- <span class="text-muted text-decoration-line-through">$50.00</span> -->
                                Php 348
                            </div>
                        </div>
                        <!-- Product actions-->
                        <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div> -->
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                        <!-- Product image-->
                        <img class="card-img-top" src="assets/img/3.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Nightdress</h5>
                                <!-- Product price-->
                                <!-- <span class="text-muted text-decoration-line-through">$50.00</span> -->
                                Php 348
                            </div>
                        </div>
                        <!-- Product actions-->
                        <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div> -->
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                        <!-- Product image-->
                        <img class="card-img-top" src="assets/img/4.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Pearl White Luxe PJs</h5>
                                <!-- Product price-->
                                <!-- <span class="text-muted text-decoration-line-through">$50.00</span> -->
                                Php 348
                            </div>
                        </div>
                        <!-- Product actions-->
                        <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div> -->
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                        <!-- Product image-->
                        <img class="card-img-top" src="assets/img/5.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Pearl White Luxe PJs</h5>
                                <!-- Product price-->
                                <!-- <span class="text-muted text-decoration-line-through">$50.00</span> -->
                                Php 348
                            </div>
                        </div>
                        <!-- Product actions-->
                        <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div> -->
                    </div>
                </div>





            </div>
        </div>
    </section>
    <!-- Footer-->
    <?php include 'php-templates/footer.php'; ?>
</body>

</html>