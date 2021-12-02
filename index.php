<?php $page = "home";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'php-templates/head.php'; ?>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Home</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
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
                    <div class="col-md-7 col-12 order-md-1 order-2">
                    <h4>High-Quality <br>
                        Sleeping Essentials <br>Just For You</h4>
                    <p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
                        necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
                    <a href="products.php">View Products</a> </div>
                    <div class="mySlides fade col-md-5 col-12 order-md-2 order-1"><img src="assets/img/banner/banner-1.jpg" class="mx-auto" style="height: 650px;" alt="slide"></div>
                    <div class="mySlides fade col-md-5 col-12 order-md-2 order-1"><img src="assets/img/banner/banner-2.jpg" class="mx-auto" style="height: 650px;" alt="slide"></div>
                    <div class="mySlides fade col-md-5 col-12 order-md-2 order-1"><img src="assets/img/banner/banner-3.jpg" class="mx-auto" style="height: 650px;" alt="slide"></div>
                    <div class="mySlides fade col-md-5 col-12 order-md-2 order-1"><img src="assets/img/banner/banner-4.jpg" class="mx-auto" style="height: 650px;" alt="slide"></div>
                    <div class="mySlides fade col-md-5 col-12 order-md-2 order-1"><img src="assets/img/banner/banner-5.jpg" class="mx-auto" style="height: 650px;" alt="slide"></div>
                    <div style="text-align:center">
                        <span class="dot"></span> 
                        <span class="dot"></span> 
                        <span class="dot"></span> 
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
					<h2> Product Category </h2>
				</div>
			</div>
			<div class="col-md-6">
				<div class="category-box">
					<a href="products.php">
						<img src="assets/img/2.jpg" alt="" />
						<div class="content">
							<h3>Sleepwear</h3>
							<!-- <p>Shop New Season Clothing</p> -->
						</div>
					</a>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="category-box">
					<a href="products.php">
						<img src="assets/img/pillowcase3.jpg" alt="" />
						<div class="content">
							<h3>Essentials</h3>
							<!-- <p>Special Design Comes First</p> -->
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
                        <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                        <h3>Fully Responsive</h3>
                        <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                        <h3>Bootstrap 5 Ready</h3>
                        <p class="lead mb-0">Featuring the latest build of the new Bootstrap 5 framework!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                        <h3>Easy to Use</h3>
                        <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <?php include 'php-templates/footer.php'; ?>

    <script>
        var myIndex = 0; 
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 5000); // Change image every 2 seconds
        }
    </script>

</body>

</html>