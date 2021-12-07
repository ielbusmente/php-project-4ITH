<section class='col-md-3 col-12 p-5'>
    <div style="margin-top: 30px;">
        <form method="get" class='d-flex w-100' title='Press Enter after typing'>
            <input id="search-box" type="search" class="p-2" name='search' placeholder="Search and Press Enter" value="<?php echo $searchStr ?>">
            <button type="submit" class="btn search-icon"><i class="bi bi-search w-100"></i></button>
        </form>
    </div>
    <div>
        <h6 class="p-1 border-bottom mt-4">All Products</h6>
        <ul>
            <li><a class="<?php echo $_GET['filter'] === "all" ? "active disabled" : "" ?>" href="products.php?filter=all&search=<?php echo $searchStr ?>">No Filter</a></li>
        </ul>
    </div>
    <div>
        <h6 class="p-1 border-bottom mt-4">Shop By Sleepwear</h6>
        <ul>
            <li><a class="<?php echo $_GET['filter'] === "sleepwear" ? "active disabled" : "" ?>" href="products.php?filter=sleepwear&search=<?php echo $searchStr ?>">All</a></li>
            <li><a class="<?php echo $_GET['filter'] === "3" ? "active disabled" : "" ?>" href="products.php?filter=3&search=<?php echo $searchStr ?>">Shorts</a></li>
            <li><a class="<?php echo $_GET['filter'] === "4" ? "active disabled" : "" ?>" href="products.php?filter=4&search=<?php echo $searchStr ?>">Pajama</a></li>
            <li><a class="<?php echo $_GET['filter'] === "5" ? "active disabled" : "" ?>" href="products.php?filter=5&search=<?php echo $searchStr ?>">Loungewear</a></li>
            <li><a class="<?php echo $_GET['filter'] === "6" ? "active disabled" : "" ?>" href="products.php?filter=6&search=<?php echo $searchStr ?>">Nightdress</a></li>
        </ul>
    </div>
    <div>
        <h6 class="p-1 border-bottom">Shop By Essentials</h6>
        <ul>
            <li><a class="<?php echo $_GET['filter'] === "sleepingessentials" ? "active disabled" : "" ?>" href="products.php?filter=sleepingessentials&search=<?php echo $searchStr ?>">All</a></li>
            <li><a class="<?php echo $_GET['filter'] === "1" ? "active disabled" : "" ?>" href="products.php?filter=1&search=<?php echo $searchStr ?>">Eyemask</a></li>
            <li><a class="<?php echo $_GET['filter'] === "2" ? "active disabled" : "" ?>" href="products.php?filter=2&search=<?php echo $searchStr ?>">Pillowcase</a></li>
        </ul>
    </div>
</section>