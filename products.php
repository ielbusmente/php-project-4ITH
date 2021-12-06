<?php
include_once "php-templates/classes/Product.php";
$page = "products";
if (!isset($_GET['filter']))
    $_GET['filter'] = 'all';
else {
    switch ($_GET['filter']) {
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:
        case 6:
        case 'sleepingessentials':
        case 'sleepwear':
        case 'all':
            break;
        default:
            $_GET['filter'] = 'all';
    }
}
$productsArr = [];
// get products from the db 
include 'php-templates/dbconnect.php';
$whereSize = $_GET['filter'] === 'sleepwear' ?
    'WHERE size IS NULL' : ($_GET['filter'] === 'sleepingessentials' ?
        'WHERE size >= 0 AND size <= 6' : ('WHERE category =' . $_GET['filter']));
$getProductsSql = "SELECT * FROM product " . ($_GET['filter'] === 'all' ? '' : $whereSize);
// echo $getProductsSql;
$result = $conn->query($getProductsSql);
if ($result->num_rows > 0)
    while ($row = $result->fetch_assoc())
        array_push($productsArr, $row);
$conn->close();

// print_r($productsArr);
// create product objects  
$prodCount = count($productsArr);
$productsObjArr = [];
if ($prodCount > 0) {
    foreach ($productsArr as $key => $value) {
        // echo "$key: " . $value['id'] . " " . $value['name'] . " " . $value['description'] . " " . $value['price'] . " " . $value['category'] . " " . $value['size'] . " " . $value['img'] . " ";
        if ($value['size'] === null)
            $product = new SleepingEssential($value['id'], $value['name']);
        else {
            $product = new SleepWear($value['id'], $value['name']);
            $product->setSize($value['size']);
        }
        $product->setDetails([$value['price'], $value['img'], $value['category'], $value['description']]);
        array_push($productsObjArr, $product);
    }
}
// print_r($productsObjArr);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'php-templates/head.php'; ?>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Products</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <?php include "css/products-css.php" ?>
    <?php
    //include "css/styles-css.php"
    ?>
</head>

<body>
    <!-- Navigation-->
    <?php include 'php-templates/navbar.php'; ?>
    <!-- Header-->
    <?php include 'php-templates/products-header.php'; ?>
    <!-- Sidebar -->

    <h1 class="mt-4" style="margin-left:20%; margin-bottom:20px;">All Sleepwear</h1>
    <div class="row p-0 m-0">
        <?php include 'php-templates/products-sidebar.php'; ?>
        <!-- px-lg-6 ml-4 not in css  -->
        <div class="mt-4 col-md-8 col-12">
            <div class="row gx-4 gx-lg-5 row-cols-md-3 row-cols-2  row-cols-xl-4 justify-content-center p-0 m-0">
                <?php for ($i = 0; $i < $prodCount; $i++)
                    echo $productsObjArr[$i]->productDisplayStr($i);
                ?>
            </div>
        </div>
    </div>
    <!-- modal  -->
    <?php foreach ($productsObjArr as $i => $product) {
        $prodName = $product->getName();
    ?>
        <div id="<?php echo "product_modal$i" ?>" class="modal">
            <div class="modal-content">
                <div class="modal-body m-3">
                    <h2 class="text-center"><?php echo $prodName ?></h2>
                    <div class="p-3 d-flex list-group-vertical card">
                        <div class="text-center m-3 w-100 ">
                            <img style="max-width: 80%;    " src="<?php echo $product->getImg(); ?>" alt="<?php echo "$i$prodName" ?>" />
                        </div>
                        <div class="m-3">
                            <p><b>Php <?php echo $product->getPrice(); ?></b></p>
                            <?php echo $product->getDescription() == null ? '' : '<p><b>Description:</b> <br />' . $product->getDescription() . ' </p>'; ?>
                            <p><b>Category:</b> <?php echo $product->getCategory(); ?></p>
                            <?php
                            try {
                                echo "<p><b>Size: </b>" . $product->getSize() . "</p>";
                            } catch (Error $e) {
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php  } ?>


    <!-- Footer-->
    <?php include 'php-templates/footer.php'; ?>
    <script>
        <?php
        for ($i = 0; $i < $prodCount; $i++) {
            echo "
            const modal$i = document.getElementById('product_modal$i');
            const productView$i = document.getElementById('product_view_$i') 
            productView$i.onclick = function() {
                //    alert('fuck$i')
                modal$i.style.display = \"block\";
            } 
            
            ";
        }
        ?>
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            <?php
            for ($i = 0; $i < $prodCount; $i++) {
                echo "
                if (event.target == modal$i) {
                    modal$i.scrollTo(0,0);
                    modal$i.style.display = \"none\";
                } 
                ";
            }
            ?>
        }
        // const butt = document.getElementById('product_view_0')
        // butt.onclick = function() {
        //     alert('fuck')
        // }
    </script>

</body>

</html>