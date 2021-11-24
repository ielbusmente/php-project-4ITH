<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php"><img class="logo" src="../../assets/sleepy_text.png" height="80" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link <?php echo ($page == "home" ? "active" : "") ?>" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link <?php echo ($page == "products" ? "active" : "") ?>" href="products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link <?php echo ($page == "about" ? "active" : "") ?>" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link <?php echo ($page == "contact" ? "active" : "") ?>" href="contact.php">Contact Us</a></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="https://www.facebook.com/sleepyyyph"> &nbsp;
                        <i class="bi bi-facebook" style="color:#D8C47F;"></i>
                        <!-- <span class="sr-only">(current)</span> -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="https://www.instagram.com/sleepyph_/"> &nbsp;
                        <i class="bi bi-instagram" style="color:#D8C47F;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="https://shopee.ph/sleepyph_"> &nbsp;
                        <i class="bi bi-bag" style="color:#D8C47F;"></i>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>