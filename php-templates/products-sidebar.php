<section class='col-md-2 col-12 p-5'>
    <div style="margin-top: 30px;">
        <h6 class="p-1 border-bottom mt-4">All Products</h6>
        <ul>
            <li><a class="<?php echo $_GET['filter'] === "all" ? "active disabled" : "" ?>" href="products.php?filter=all">No Filter</a></li>
        </ul>
    </div>
    <div>
        <h6 class="p-1 border-bottom mt-4">Shop By Sleepwear</h6>
        <ul>
            <li><a class="<?php echo $_GET['filter'] === "sleepwear" ? "active disabled" : "" ?>" href="products.php?filter=sleepwear">All</a></li>
            <li><a class="<?php echo $_GET['filter'] === "3" ? "active disabled" : "" ?>" href="products.php?filter=3">Shorts</a></li>
            <li><a class="<?php echo $_GET['filter'] === "4" ? "active disabled" : "" ?>" href="products.php?filter=4">Pajama</a></li>
            <li><a class="<?php echo $_GET['filter'] === "5" ? "active disabled" : "" ?>" href="products.php?filter=5">Loungewear</a></li>
            <li><a class="<?php echo $_GET['filter'] === "6" ? "active disabled" : "" ?>" href="products.php?filter=6">Nightdress</a></li>
        </ul>
    </div>
    <div>
        <h6 class="p-1 border-bottom">Shop By Essentials</h6>
        <ul>
            <li><a class="<?php echo $_GET['filter'] === "sleepingessentials" ? "active disabled" : "" ?>" href="products.php?filter=sleepingessentials">All</a></li>
            <li><a class="<?php echo $_GET['filter'] === "1" ? "active disabled" : "" ?>" href="products.php?filter=1">Eyemask</a></li>
            <li><a class="<?php echo $_GET['filter'] === "2" ? "active disabled" : "" ?>" href="products.php?filter=2">Pillowcase</a></li>

        </ul>
    </div>
</section>