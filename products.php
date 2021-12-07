<?php
include_once "php-templates/classes/Product.php";
include_once 'php-templates/unsupported-functions/str_contains_function.php';
function checkCategoryAndSize($str)
{
    $appendToSQL = '';
    if ($str != '') {
        if (str_contains($str, 'eye mask')) {
            $appendToSQL .= 'OR category = 1 ';
        }
        if (str_contains($str, 'pillow case')) {
            $appendToSQL .= 'OR category = 2 ';
        }
        if (str_contains($str, 'shorts')) {
            $appendToSQL .= 'OR category = 3 ';
        }
        if (str_contains($str, 'pajama')) {
            $appendToSQL .= 'OR category = 4 ';
        }
        if (str_contains($str, 'nightdress')) {
            $appendToSQL .= 'OR category = 5 ';
        }
        if (str_contains($str, 'loungewear')) {
            $appendToSQL .= 'OR category = 6 ';
        }
        if (str_contains($str, 'free size')) {
            $appendToSQL .= 'OR size = 0 OR size = 3 OR size = 4 OR size = 6 ';
        }
        if (str_contains($str, 'plus size')) {
            $appendToSQL .= 'OR size = 1 OR size = 3 OR size = 5 OR size = 6 ';
        }
        if (str_contains($str, 'one size')) {
            $appendToSQL .= 'OR size = 2 OR size = 4 OR size = 5 OR size = 6 ';
        }
    }
    return $appendToSQL;
}

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
if (!isset($_GET['search'])) {
    $_GET['search'] = '';
}
$productsArr = [];
// get products from the db 
include 'php-templates/dbconnect.php';
$searchStr = mysqli_real_escape_string($conn, $_GET['search']);
$whereStr = "
WHERE (id LIKE '%$searchStr%' OR
name LIKE '%$searchStr%' OR
description LIKE '%$searchStr%' " . checkCategoryAndSize(strtolower($searchStr)) . ")
";
$filterStr = $_GET['filter'] === 'sleepingessentials' ?
    'AND size IS NULL' : ($_GET['filter'] === 'sleepwear' ?
        'AND (size >= 0 AND size <= 6)' : ('AND category =' . $_GET['filter']));
$getProductsSql = "SELECT * FROM product $whereStr" . ($_GET['filter'] === 'all' ? '' : $filterStr);
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
$filterTitle = '';
switch ($_GET['filter']) {
    case 'all':
        $filterTitle = 'All Products';
        break;
    case 'sleepwear':
        $filterTitle = 'All Sleepwear';
        break;
    case 'sleepingessentials':
        $filterTitle = 'All Sleeping Essentials';
        break;
    case 1:
        $filterTitle = 'Sleeping Essentials - Eye Mask';
        break;
    case 2:
        $filterTitle = 'Sleeping Essentials - Pillowcase';
        break;
    case 3:
        $filterTitle = 'Sleepwear - Shorts';
        break;
    case 4:
        $filterTitle = 'Sleepwear - Pajama';
        break;
    case 5:
        $filterTitle = 'Sleepwear - Loungewear';
        break;
    case 6:
        $filterTitle = 'Sleepwear - Nightdress';
        break;
    default:
        $filterTitle = '';
        break;
}
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
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-9">
            <h1 class="mt-4"><?php echo $filterTitle ?></h1>
        </div>
    </div>
    <div class="row p-0 me-5">
        <?php include 'php-templates/products-sidebar.php'; ?>
        <!-- px-lg-6 ml-4 not in css  -->
        <div class="mt-4 col-md-9 col-12">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-xl-4 p-0 m-0">
                <?php
                if ($prodCount > 0)
                    for ($i = 0; $i < $prodCount; $i++)
                        echo $productsObjArr[$i]->productDisplayStr($i);
                else { ?>
                    <div class="card p-5 w-100 text-center mt-4">
                        <?php echo "No Products Available"; ?>
                    </div>
                <?php  }
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
                <div class="modal-header">
                    <span onclick="document.getElementById('<?php echo "product_modal$i" ?>').style.display='none'" class="close btn-close pull-right"></span>
                </div>
                <div class="modal-body m-3">
                    <h2 class="text-center"><?php echo $prodName ?></h2>
                    <div class="p-3 d-flex list-group-vertical card">
                        <div class="text-center m-3 w-100 ">
                            <img style="max-width: 60%; " src="<?php echo $product->getImg(); ?>" alt="<?php echo "$i$prodName" ?>" />
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
                //    alert('asdf$i')
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
        //     alert('asdf')
        // }
    </script>

</body>

</html>